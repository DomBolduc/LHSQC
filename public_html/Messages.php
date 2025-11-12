<?php
/**
 * Page principale de messagerie privée - Boîte de réception
 * Affiche la liste des conversations et messages reçus
 */

require_once "STHSSetting.php";

// Définir le fichier de base de données pour la messagerie
$MessagesDBFile = "LHSQC-Messages.db";

// Vérifier l'authentification
if ($CookieTeamNumber <= 0 || $CookieTeamNumber > 102) {
    header("Location: Login.php");
    exit();
}

// Variables d'initialisation
$messages = [];
$unreadCount = 0;
$currentTeamInfo = null;
$errorMessage = "";

try {
    if (!file_exists($MessagesDBFile)) {
        throw new Exception("Base de données de messagerie non trouvée. Veuillez exécuter InitializeMessaging.php");
    }

    // Ouvrir la base de données de messagerie
    $db = new SQLite3($MessagesDBFile);

    // Ouvrir aussi la base de données principale pour récupérer les infos des équipes
    $mainDB = new SQLite3($DatabaseFile);
    
    // Récupérer les informations de l'équipe actuelle depuis la DB principale
    $teamQuery = "SELECT Number, Name, GMName FROM TeamProInfo WHERE Number = ?";
    $stmt = $mainDB->prepare($teamQuery);
    $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $currentTeamInfo = $result->fetchArray(SQLITE3_ASSOC);

    if (!$currentTeamInfo && $CookieTeamNumber != 102) {
        throw new Exception("Équipe non trouvée");
    }
    
    // Récupérer un seul message (dernier) par thread via un sous-select par ThreadID (mailbox-like)
    // On sélectionne le message ayant le plus grand MessageID pour chaque thread visible par l'utilisateur
    // Filtre selon la suppression par utilisateur (DeletedBySender/DeletedByRecipient)
    $threadsQuery = "
    SELECT
        pm.*,
        CASE WHEN pm.SenderTeamID = :me THEN 'sent' ELSE 'received' END AS MessageType,
        (SELECT COUNT(*) FROM PrivateMessages pm2
         WHERE pm2.ThreadID = pm.ThreadID
         AND NOT ((pm2.SenderTeamID = :me AND pm2.DeletedBySender = 1) OR (pm2.RecipientTeamID = :me AND pm2.DeletedByRecipient = 1))
        ) AS MessageCount,
        (SELECT COUNT(*) FROM PrivateMessages pm3
         WHERE pm3.ThreadID = pm.ThreadID
         AND pm3.RecipientTeamID = :me
         AND pm3.IsRead = 0
         AND NOT ((pm3.SenderTeamID = :me AND pm3.DeletedBySender = 1) OR (pm3.RecipientTeamID = :me AND pm3.DeletedByRecipient = 1))
        ) AS UnreadCount
    FROM PrivateMessages pm
    INNER JOIN (
        SELECT ThreadID, MAX(MessageID) AS LastMessageID
        FROM PrivateMessages
        WHERE (SenderTeamID = :me OR RecipientTeamID = :me)
        AND NOT ((SenderTeamID = :me AND DeletedBySender = 1) OR (RecipientTeamID = :me AND DeletedByRecipient = 1))
        GROUP BY ThreadID
    ) last ON pm.ThreadID = last.ThreadID AND pm.MessageID = last.LastMessageID
    WHERE (pm.SenderTeamID = :me OR pm.RecipientTeamID = :me)
    AND NOT ((pm.SenderTeamID = :me AND pm.DeletedBySender = 1) OR (pm.RecipientTeamID = :me AND pm.DeletedByRecipient = 1))
    ORDER BY pm.SentDate DESC
    LIMIT 50";

    $stmt = $db->prepare($threadsQuery);
    $stmt->bindValue(':me', $CookieTeamNumber, SQLITE3_INTEGER);
    $result = $stmt->execute();

    // Récupérer les infos des équipes depuis la DB principale
    $teamsInfo = [];
    $teamsQuery = "SELECT Number, Name, GMName FROM TeamProInfo WHERE Number BETWEEN 1 AND 102";
    $teamsResult = $mainDB->query($teamsQuery);
    while ($team = $teamsResult->fetchArray(SQLITE3_ASSOC)) {
        $teamsInfo[$team['Number']] = $team;
    }

    $threads = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        // Ajouter les informations des équipes
        $row['SenderTeamName'] = isset($teamsInfo[$row['SenderTeamID']]) ? $teamsInfo[$row['SenderTeamID']]['Name'] : 'Équipe inconnue';
        $row['SenderGMName'] = isset($teamsInfo[$row['SenderTeamID']]) ? $teamsInfo[$row['SenderTeamID']]['GMName'] : 'GM inconnu';
        $row['RecipientTeamName'] = isset($teamsInfo[$row['RecipientTeamID']]) ? $teamsInfo[$row['RecipientTeamID']]['Name'] : 'Équipe inconnue';
        $row['RecipientGMName'] = isset($teamsInfo[$row['RecipientTeamID']]) ? $teamsInfo[$row['RecipientTeamID']]['GMName'] : 'GM inconnu';

        $threads[] = $row;

        // Compter les messages non lus dans ce thread
        $unreadCount += (int)$row['UnreadCount'];
    }

    // Pour la compatibilité avec le reste du code, on garde aussi $messages
    $messages = $threads;

    $mainDB->close();
    
} catch (Exception $e) {
    $errorMessage = "Erreur: " . $e->getMessage();
}

// Fonction pour formater la date
function formatMessageDate($dateString) {
    $date = new DateTime($dateString);
    $now = new DateTime();
    $diff = $now->diff($date);
    
    if ($diff->days == 0) {
        return $date->format('H:i');
    } elseif ($diff->days == 1) {
        return 'Hier ' . $date->format('H:i');
    } elseif ($diff->days < 7) {
        return $diff->days . ' jours';
    } else {
        return $date->format('d/m/Y');
    }
}

// Fonction pour tronquer le texte
function truncateText($text, $length = 100) {
    if (strlen($text) <= $length) {
        return $text;
    }
    return substr($text, 0, $length) . '...';
}

include "Header.php";
?>

<title><?php echo $LeagueName; ?> - Messagerie Privée</title>
<link rel="stylesheet" href="css/components/messaging.css">
</head>

<body>
<?php include "Menu.php"; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <span class="me-2">📧</span>
                    Messagerie Privée
                    <?php if ($unreadCount > 0): ?>
                        <span class="badge bg-danger ms-2"><?php echo $unreadCount; ?></span>
                    <?php endif; ?>
                </h2>
                
                <div>
                    <a href="MessageCompose.php" class="btn btn-primary">
                        <span class="me-1">➕</span>
                        Nouveau Message
                    </a>
                </div>
            </div>
            
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($currentTeamInfo): ?>
                <div class="alert alert-info">
                    <span class="me-2">👤</span>
                    Connecté en tant que: <strong><?php echo htmlspecialchars($currentTeamInfo['GMName']); ?></strong>
                    (<?php echo htmlspecialchars($currentTeamInfo['Name']); ?>)
                </div>
            <?php endif; ?>
            
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="messageTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">
                                Tous les messages
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="received-tab" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab">
                                Reçus <?php if ($unreadCount > 0) echo "($unreadCount)"; ?>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent" type="button" role="tab">
                                Envoyés
                            </button>
                        </li>
                    </ul>
                </div>
                
                <div class="card-body">
                    <div class="tab-content" id="messageTabContent">
                        <!-- Tous les messages -->
                        <div class="tab-pane fade show active" id="all" role="tabpanel">
                            <?php if (empty($messages)): ?>
                                <div class="text-center py-5">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Aucun message</h5>
                                    <p class="text-muted">Vous n'avez encore aucun message.</p>
                                    <a href="MessageCompose.php" class="btn btn-primary">
                                        Envoyer votre premier message
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="list-group list-group-flush">
                                    <?php foreach ($messages as $thread): ?>
                                        <div class="list-group-item <?php echo ($thread['UnreadCount'] > 0) ? 'list-group-item-warning' : ''; ?>">
                                            <div class="d-flex w-100 justify-content-between align-items-start">
                                                <div class="flex-grow-1" style="cursor: pointer;" onclick="window.location.href='ThreadView.php?id=<?php echo $thread['ThreadID']; ?>'">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <?php if ($thread['MessageType'] == 'received'): ?>
                                                            <span class="text-success me-2">📥</span>
                                                            <strong><?php echo htmlspecialchars($thread['SenderGMName']); ?></strong>
                                                            <small class="text-muted ms-2">(<?php echo htmlspecialchars($thread['SenderTeamName']); ?>)</small>
                                                        <?php else: ?>
                                                            <span class="text-primary me-2">📤</span>
                                                            <span>À: <strong><?php echo htmlspecialchars($thread['RecipientGMName']); ?></strong></span>
                                                            <small class="text-muted ms-2">(<?php echo htmlspecialchars($thread['RecipientTeamName']); ?>)</small>
                                                        <?php endif; ?>

                                                        <!-- Badges pour le thread -->
                                                        <?php if ($thread['MessageCount'] > 1): ?>
                                                            <span class="badge bg-secondary ms-2"><?php echo $thread['MessageCount']; ?> messages</span>
                                                        <?php endif; ?>

                                                        <?php if ($thread['UnreadCount'] > 0): ?>
                                                            <span class="badge bg-danger ms-2"><?php echo $thread['UnreadCount']; ?> nouveau<?php echo $thread['UnreadCount'] > 1 ? 'x' : ''; ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <h6 class="mb-1">
                                                        <span class="me-1">📧</span>
                                                        <?php echo htmlspecialchars($thread['Subject']); ?>
                                                    </h6>
                                                    <p class="mb-1 text-muted"><?php echo htmlspecialchars(truncateText(strip_tags($thread['MessageBody']))); ?></p>
                                                    <small class="text-muted">
                                                        <span class="me-1">🕒</span>
                                                        Dernière activité: <?php echo formatMessageDate($thread['SentDate']); ?>
                                                    </small>
                                                </div>
                                                <div class="ms-3 d-flex flex-column gap-1">
                                                    <button class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation(); window.location.href='ThreadView.php?id=<?php echo $thread['ThreadID']; ?>'" title="Voir la conversation">
                                                        <span>👁️</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger" onclick="event.stopPropagation(); deleteThread(<?php echo $thread['ThreadID']; ?>)" title="Supprimer la conversation">
                                                        <span>❌</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Messages reçus -->
                        <div class="tab-pane fade" id="received" role="tabpanel">
                            <div class="list-group list-group-flush">
                                <?php 
                                $receivedMessages = array_filter($messages, function($msg) { return $msg['MessageType'] == 'received'; });
                                if (empty($receivedMessages)): ?>
                                    <div class="text-center py-4">
                                        <i class="fa-solid fa-inbox fa-2x text-muted mb-3"></i>
                                        <p class="text-muted">Aucun message reçu</p>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($receivedMessages as $message): ?>
                                        <a href="ThreadView.php?id=<?php echo (int)$message['ThreadID']; ?>" 
                                           class="list-group-item list-group-item-action <?php echo !$message['IsRead'] ? 'list-group-item-warning' : ''; ?>">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <strong><?php echo htmlspecialchars($message['SenderGMName']); ?></strong>
                                                    <small class="text-muted ms-2">(<?php echo htmlspecialchars($message['SenderTeamName']); ?>)</small>
                                                    <?php if (!$message['IsRead']): ?>
                                                     <span class="badge bg-danger ms-2">Nouveau</span>
                                                    <?php endif; ?>
                                                </div>
                                                <small class="text-muted"><?php echo formatMessageDate($message['SentDate']); ?></small>
                                            </div>
                                            <h6 class="mb-1"><?php echo htmlspecialchars($message['Subject']); ?></h6>
                                            <p class="mb-1 text-muted"><?php echo htmlspecialchars(truncateText(strip_tags($message['MessageBody']))); ?></p>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Messages envoyés -->
                        <div class="tab-pane fade" id="sent" role="tabpanel">
                            <div class="list-group list-group-flush">
                                <?php 
                                $sentMessages = array_filter($messages, function($msg) { return $msg['MessageType'] == 'sent'; });
                                if (empty($sentMessages)): ?>
                                    <div class="text-center py-4">
                                        <i class="fas fa-paper-plane fa-2x text-muted mb-3"></i>
                                        <p class="text-muted">Aucun message envoyé</p>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($sentMessages as $message): ?>
                                        <a href="ThreadView.php?id=<?php echo (int)$message['ThreadID']; ?>" 
                                           class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <span>À: <strong><?php echo htmlspecialchars($message['RecipientGMName']); ?></strong></span>
                                                    <small class="text-muted ms-2">(<?php echo htmlspecialchars($message['RecipientTeamName']); ?>)</small>
                                                </div>
                                                <small class="text-muted"><?php echo formatMessageDate($message['SentDate']); ?></small>
                                            </div>
                                            <h6 class="mb-1"><?php echo htmlspecialchars($message['Subject']); ?></h6>
                                            <p class="mb-1 text-muted"><?php echo htmlspecialchars(truncateText(strip_tags($message['MessageBody']))); ?></p>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "Footer.php"; ?>

<script>
// Auto-refresh pour les nouvelles notifications (optionnel)
setInterval(function() {
    // Vérifier s'il y a de nouveaux messages
    fetch('MessageAPI.php?action=checkNew')
        .then(response => response.json())
        .then(data => {
            if (data.newMessages > 0) {
                // Mettre à jour le badge de notification
                location.reload();
            }
        })
        .catch(error => console.log('Erreur lors de la vérification des nouveaux messages'));
}, 30000); // Vérifier toutes les 30 secondes

// Fonction pour supprimer un message
function deleteMessage(messageId) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer ce message ? Cette action est irréversible.')) {
        return;
    }

    const formData = new FormData();
    formData.append('messageId', messageId);

    fetch('MessageAPI.php?action=deleteMessage', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Recharger la page pour mettre à jour la liste
            location.reload();
        } else {
            alert('Erreur lors de la suppression: ' + (data.error || 'Erreur inconnue'));
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur lors de la suppression du message');
    });
}

// Fonction pour supprimer un thread complet
function deleteThread(threadId) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer cette conversation complète ? Cette action supprimera tous les messages de cette conversation et est irréversible.')) {
        return;
    }

    const formData = new FormData();
    formData.append('threadId', threadId);

    fetch('MessageAPI.php?action=deleteThread', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        // Vérifier si la réponse est OK
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        // Vérifier le content-type
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            // Si ce n'est pas du JSON, lire comme texte pour debug
            return response.text().then(text => {
                console.error('Réponse non-JSON reçue:', text);
                throw new Error('Réponse invalide du serveur');
            });
        }

        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Recharger la page pour mettre à jour la liste
            location.reload();
        } else {
            alert('Erreur lors de la suppression: ' + (data.error || 'Erreur inconnue'));
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur lors de la suppression de la conversation: ' + error.message);
    });
}
</script>

</body>
</html>
