<?php
/**
 * Script pour ajouter la colonne CommissionerApproved à la table Trade
 * À exécuter une seule fois pour mettre à jour la structure de la base de données
 */

require_once "STHSSetting.php";

If (file_exists($DatabaseFile) == false){
    die("Base de données non trouvée: " . $DatabaseFile);
}

try {
    $db = new SQLite3($DatabaseFile);
    $db->enableExceptions(true);
    
    // Vérifier si la colonne existe déjà
    $tableInfo = $db->query("PRAGMA table_info(Trade)");
    $columnExists = false;
    
    while ($row = $tableInfo->fetchArray(SQLITE3_ASSOC)) {
        if ($row['name'] == 'CommissionerApproved') {
            $columnExists = true;
            break;
        }
    }
    
    if (!$columnExists) {
        // Ajouter la colonne CommissionerApproved
        $db->exec("ALTER TABLE Trade ADD COLUMN CommissionerApproved TEXT DEFAULT NULL");
        echo "<h2>✅ Colonne CommissionerApproved ajoutée avec succès à la table Trade!</h2>";
    } else {
        echo "<h2>ℹ️ La colonne CommissionerApproved existe déjà dans la table Trade.</h2>";
    }
    
    // Afficher la structure de la table pour vérification
    echo "<h3>Structure de la table Trade:</h3>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Colonne</th><th>Type</th><th>Nullable</th><th>Default</th></tr>";
    
    $tableInfo = $db->query("PRAGMA table_info(Trade)");
    while ($row = $tableInfo->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['type']) . "</td>";
        echo "<td>" . ($row['notnull'] ? 'NO' : 'YES') . "</td>";
        echo "<td>" . htmlspecialchars($row['dflt_value'] ?? 'NULL') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    $db->close();
    
} catch (Exception $e) {
    echo "<h2 style='color: red;'>❌ Erreur: " . htmlspecialchars($e->getMessage()) . "</h2>";
}
?>

