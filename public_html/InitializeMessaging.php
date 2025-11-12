<?php
/**
 * Script d'initialisation de la base de données pour le système de messagerie privée
 * Ce script crée une base de données séparée LHSQC-Messages.db pour la messagerie entre GMs
 */

require_once "STHSSetting.php";

// Définir le fichier de base de données pour la messagerie
$MessagesDBFile = "LHSQC-Messages.db";

// Vérifier si la base de données principale existe (pour récupérer les infos des équipes)
if (!file_exists($DatabaseFile)) {
    die("Erreur: La base de données principale LHSQC-STHS.db n'existe pas.");
}

try {
    // Créer/ouvrir la base de données de messagerie séparée
    $db = new SQLite3($MessagesDBFile);
    
    // Activer les clés étrangères
    $db->exec("PRAGMA foreign_keys = ON");

    echo "<h2>Initialisation du système de messagerie LHSQC</h2>";
    echo "<div style='font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px;'>";
    echo "<p><strong>Base de données:</strong> $MessagesDBFile (séparée)</p>";

    // Table des messages privés (sans clés étrangères vers la DB principale)
    $createMessagesTable = "
    CREATE TABLE IF NOT EXISTS PrivateMessages (
        MessageID INTEGER PRIMARY KEY AUTOINCREMENT,
        ThreadID INTEGER DEFAULT NULL,
        SenderTeamID INTEGER NOT NULL,
        RecipientTeamID INTEGER NOT NULL,
        Subject TEXT NOT NULL,
        MessageBody TEXT NOT NULL,
        SentDate DATETIME DEFAULT CURRENT_TIMESTAMP,
        IsRead BOOLEAN DEFAULT 0,
        IsDeleted BOOLEAN DEFAULT 0,
        ParentMessageID INTEGER DEFAULT NULL,
        FOREIGN KEY (ParentMessageID) REFERENCES PrivateMessages(MessageID)
    )";
    
    if ($db->exec($createMessagesTable)) {
        echo "✅ Table PrivateMessages créée avec succès<br>";
    } else {
        echo "❌ Erreur lors de la création de la table PrivateMessages: " . $db->lastErrorMsg() . "<br>";
    }
    
    // Table des notifications de messages (sans clé étrangère vers la DB principale)
    $createNotificationsTable = "
    CREATE TABLE IF NOT EXISTS MessageNotifications (
        NotificationID INTEGER PRIMARY KEY AUTOINCREMENT,
        TeamID INTEGER NOT NULL,
        MessageID INTEGER NOT NULL,
        NotificationType TEXT DEFAULT 'new_message',
        IsRead BOOLEAN DEFAULT 0,
        CreatedDate DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (MessageID) REFERENCES PrivateMessages(MessageID)
    )";
    
    if ($db->exec($createNotificationsTable)) {
        echo "✅ Table MessageNotifications créée avec succès<br>";
    } else {
        echo "❌ Erreur lors de la création de la table MessageNotifications: " . $db->lastErrorMsg() . "<br>";
    }
    
    // Table des paramètres de messagerie par utilisateur (sans clé étrangère vers la DB principale)
    $createSettingsTable = "
    CREATE TABLE IF NOT EXISTS MessageSettings (
        SettingID INTEGER PRIMARY KEY AUTOINCREMENT,
        TeamID INTEGER NOT NULL UNIQUE,
        EmailNotifications BOOLEAN DEFAULT 1,
        ShowNotificationBadge BOOLEAN DEFAULT 1,
        AutoMarkAsRead BOOLEAN DEFAULT 0
    )";
    
    if ($db->exec($createSettingsTable)) {
        echo "✅ Table MessageSettings créée avec succès<br>";
    } else {
        echo "❌ Erreur lors de la création de la table MessageSettings: " . $db->lastErrorMsg() . "<br>";
    }
    
    // Créer des index pour améliorer les performances
    $indexes = [
        "CREATE INDEX IF NOT EXISTS idx_messages_recipient ON PrivateMessages(RecipientTeamID)",
        "CREATE INDEX IF NOT EXISTS idx_messages_sender ON PrivateMessages(SenderTeamID)", 
        "CREATE INDEX IF NOT EXISTS idx_messages_date ON PrivateMessages(SentDate)",
        "CREATE INDEX IF NOT EXISTS idx_messages_read ON PrivateMessages(IsRead)",
        "CREATE INDEX IF NOT EXISTS idx_notifications_team ON MessageNotifications(TeamID)",
        "CREATE INDEX IF NOT EXISTS idx_notifications_read ON MessageNotifications(IsRead)"
    ];
    
    foreach ($indexes as $index) {
        if ($db->exec($index)) {
            echo "✅ Index créé avec succès<br>";
        } else {
            echo "❌ Erreur lors de la création d'un index: " . $db->lastErrorMsg() . "<br>";
        }
    }
    
    // Initialiser les paramètres par défaut pour les équipes 1-100
    // On doit récupérer les équipes depuis la DB principale
    $mainDB = new SQLite3($DatabaseFile);
    $teamsQuery = "SELECT Number FROM TeamProInfo WHERE Number BETWEEN 1 AND 100";
    $teamsResult = $mainDB->query($teamsQuery);

    $teamsInitialized = 0;
    while ($team = $teamsResult->fetchArray(SQLITE3_ASSOC)) {
        $initQuery = "INSERT OR IGNORE INTO MessageSettings (TeamID, EmailNotifications, ShowNotificationBadge, AutoMarkAsRead) VALUES (?, 1, 1, 0)";
        $stmt = $db->prepare($initQuery);
        $stmt->bindValue(1, $team['Number'], SQLITE3_INTEGER);
        if ($stmt->execute()) {
            $teamsInitialized++;
        }
    }
    $mainDB->close();

    echo "✅ Paramètres par défaut initialisés pour $teamsInitialized équipes<br>";

    echo "<br><h3>Mise à jour de la structure pour les threads...</h3>";

    // Vérifier si la colonne ThreadID existe déjà
    $checkColumn = $db->query("PRAGMA table_info(PrivateMessages)");
    $hasThreadID = false;
    while ($column = $checkColumn->fetchArray(SQLITE3_ASSOC)) {
        if ($column['name'] === 'ThreadID') {
            $hasThreadID = true;
            break;
        }
    }

    if (!$hasThreadID) {
        // Ajouter la colonne ThreadID
        if ($db->exec("ALTER TABLE PrivateMessages ADD COLUMN ThreadID INTEGER DEFAULT NULL")) {
            echo "✅ Colonne ThreadID ajoutée<br>";

            // Initialiser les ThreadID pour les messages existants
            // Les messages sans parent deviennent le début d'un thread
            $initThreads = "
            UPDATE PrivateMessages
            SET ThreadID = MessageID
            WHERE ParentMessageID IS NULL AND ThreadID IS NULL
            ";

            if ($db->exec($initThreads)) {
                echo "✅ ThreadID initialisé pour les messages principaux<br>";

                // Propager les ThreadID aux réponses
                $propagateThreads = "
                UPDATE PrivateMessages
                SET ThreadID = (
                    SELECT ThreadID
                    FROM PrivateMessages parent
                    WHERE parent.MessageID = PrivateMessages.ParentMessageID
                )
                WHERE ParentMessageID IS NOT NULL AND ThreadID IS NULL
                ";

                if ($db->exec($propagateThreads)) {
                    echo "✅ ThreadID propagé aux réponses<br>";
                } else {
                    echo "⚠️ Erreur lors de la propagation des ThreadID<br>";
                }
            } else {
                echo "⚠️ Erreur lors de l'initialisation des ThreadID<br>";
            }
        } else {
            echo "⚠️ Erreur lors de l'ajout de la colonne ThreadID<br>";
        }
    } else {
        echo "✅ Colonne ThreadID déjà présente<br>";
    }

    // Vérifier que les tables ont été créées correctement
    $tables = ['PrivateMessages', 'MessageNotifications', 'MessageSettings'];
    echo "<br><h3>Vérification des tables créées:</h3>";
    
    foreach ($tables as $table) {
        $result = $db->querySingle("SELECT name FROM sqlite_master WHERE type='table' AND name='$table'");
        if ($result) {
            echo "✅ Table $table: OK<br>";
            
            // Compter les enregistrements
            $count = $db->querySingle("SELECT COUNT(*) FROM $table");
            echo "&nbsp;&nbsp;&nbsp;→ $count enregistrement(s)<br>";
        } else {
            echo "❌ Table $table: MANQUANTE<br>";
        }
    }
    
    echo "<br><h3>Structure de la base de données séparée ($MessagesDBFile):</h3>";
    echo "<strong>PrivateMessages:</strong> Stocke tous les messages privés entre GMs<br>";
    echo "<strong>MessageNotifications:</strong> Gère les notifications de nouveaux messages<br>";
    echo "<strong>MessageSettings:</strong> Paramètres personnalisés par équipe/GM<br>";

    echo "<br><div style='background: #d4edda; padding: 15px; border-radius: 5px; border: 1px solid #c3e6cb;'>";
    echo "<strong>✅ Initialisation terminée avec succès!</strong><br>";
    echo "La base de données de messagerie séparée <strong>$MessagesDBFile</strong> a été créée.<br>";
    echo "Le système de messagerie privée est maintenant prêt à être utilisé.";
    echo "</div>";

    echo "<br><a href='Messages.php' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Accéder à la messagerie</a>";
    
} catch (Exception $e) {
    echo "<div style='background: #f8d7da; padding: 15px; border-radius: 5px; border: 1px solid #f5c6cb;'>";
    echo "<strong>❌ Erreur lors de l'initialisation:</strong><br>";
    echo htmlspecialchars($e->getMessage());
    echo "</div>";
} finally {
    if (isset($db)) {
        $db->close();
    }
}

echo "</div>";
?>
