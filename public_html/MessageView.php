<?php
/**
 * Page de visualisation d'un message spécifique
 * Permet de lire un message et de répondre
 */

require_once "STHSSetting.php";

// Définir le fichier de base de données pour la messagerie
$MessagesDBFile = "LHSQC-Messages.db";

// Vérifier l'authentification
if ($CookieTeamNumber <= 0 || $CookieTeamNumber > 102) {
    header("Location: Login.php");
    exit();
}

// Récupérer l'ID du message
$messageId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($messageId <= 0) {
    header("Location: Messages.php");
    exit();
}

$message = null;
$errorMessage = "";
$successMessage = "";

// Traitement de la réponse (PRG: redirect après succès)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reply_message'])) {
    try {
        $db = new SQLite3($MessagesDBFile);
        
        $replySubject = trim($_POST['reply_subject']);
        $replyBody = trim($_POST['reply_body']);
        $recipientId = (int)$_POST['recipient_id'];
        
        if (empty($replySubject) || empty($replyBody)) {
            throw new Exception("Le sujet et le message sont obligatoires");
        }
        
        // Récupérer le ThreadID du message original
        $threadQuery = "SELECT ThreadID FROM PrivateMessages WHERE MessageID = ?";
        $threadStmt = $db->prepare($threadQuery);
        $threadStmt->bindValue(1, $messageId, SQLITE3_INTEGER);
        $threadResult = $threadStmt->execute();
        $threadRow = $threadResult->fetchArray(SQLITE3_ASSOC);
        $threadId = $threadRow ? $threadRow['ThreadID'] : $messageId;

        // Insérer la réponse
        $insertQuery = "
        INSERT INTO PrivateMessages (SenderTeamID, RecipientTeamID, Subject, MessageBody, ParentMessageID, ThreadID)
        VALUES (?, ?, ?, ?, ?, ?)
        ";

        $stmt = $db->prepare($insertQuery);
        $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
        $stmt->bindValue(2, $recipientId, SQLITE3_INTEGER);
        $stmt->bindValue(3, $replySubject, SQLITE3_TEXT);
        $stmt->bindValue(4, $replyBody, SQLITE3_TEXT);
        $stmt->bindValue(5, $messageId, SQLITE3_INTEGER);
        $stmt->bindValue(6, $threadId, SQLITE3_INTEGER);
        
        if ($stmt->execute()) {
            $newMessageId = $db->lastInsertRowID();
            
            // Créer une notification pour le destinataire
            $notifQuery = "INSERT INTO MessageNotifications (TeamID, MessageID) VALUES (?, ?)";
            $notifStmt = $db->prepare($notifQuery);
            $notifStmt->bindValue(1, $recipientId, SQLITE3_INTEGER);
            $notifStmt->bindValue(2, $newMessageId, SQLITE3_INTEGER);
            $notifStmt->execute();
            
            // Redirect vers la vue Thread (PRG) pour éviter les doublons à l'actualisation
            header('Location: ThreadView.php?id=' . (int)$threadId);
            exit();
        } else {
            throw new Exception("Erreur lors de l'envoi de la réponse");
        }
        
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

try {
    if (!file_exists($MessagesDBFile)) {
        throw new Exception("Base de données de messagerie non trouvée");
    }

    $db = new SQLite3($MessagesDBFile);
    $mainDB = new SQLite3($DatabaseFile);

    // Récupérer le message principal depuis la DB de messagerie
    $messageQuery = "
    SELECT pm.*
    FROM PrivateMessages pm
    WHERE pm.MessageID = ?
    AND (pm.SenderTeamID = ? OR pm.RecipientTeamID = ? OR ? = 102)
    AND pm.IsDeleted = 0
    ";

    $stmt = $db->prepare($messageQuery);
    $stmt->bindValue(1, $messageId, SQLITE3_INTEGER);
    $stmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
    $stmt->bindValue(3, $CookieTeamNumber, SQLITE3_INTEGER);
    $stmt->bindValue(4, $CookieTeamNumber, SQLITE3_INTEGER); // Admin peut voir tous les messages
    $result = $stmt->execute();
    $message = $result->fetchArray(SQLITE3_ASSOC);

    // Récupérer toutes les réponses à ce message (thread complet)
    $repliesQuery = "
    SELECT pm.MessageID, pm.ThreadID, pm.SenderTeamID, pm.RecipientTeamID,
           pm.Subject, pm.MessageBody, pm.SentDate, pm.IsRead, pm.IsDeleted,
           pm.ParentMessageID
    FROM PrivateMessages pm
    WHERE pm.ThreadID = ?
    AND pm.MessageID != ?
    AND pm.IsDeleted = 0
    ORDER BY pm.SentDate ASC
    ";

    $repliesStmt = $db->prepare($repliesQuery);
    $repliesStmt->bindValue(1, $message['ThreadID'], SQLITE3_INTEGER);
    $repliesStmt->bindValue(2, $messageId, SQLITE3_INTEGER);
    $repliesResult = $repliesStmt->execute();

    $replies = [];
    while ($reply = $repliesResult->fetchArray(SQLITE3_ASSOC)) {
        $replies[] = $reply;
    }

    if ($message) {
        // Récupérer les informations des équipes depuis la DB principale
        $allTeamIds = [$message['SenderTeamID'], $message['RecipientTeamID']];
        foreach ($replies as $reply) {
            $allTeamIds[] = $reply['SenderTeamID'];
            $allTeamIds[] = $reply['RecipientTeamID'];
        }
        $allTeamIds = array_unique($allTeamIds);
        
        $placeholders = str_repeat('?,', count($allTeamIds) - 1) . '?';
        $teamsQuery = "SELECT Number, Name, GMName FROM TeamProInfo WHERE Number IN ($placeholders)";
        $teamsStmt = $mainDB->prepare($teamsQuery);
        foreach ($allTeamIds as $index => $teamId) {
            $teamsStmt->bindValue($index + 1, $teamId, SQLITE3_INTEGER);
        }
        $teamsResult = $teamsStmt->execute();

        $teamsInfo = [];
        while ($team = $teamsResult->fetchArray(SQLITE3_ASSOC)) {
            $teamsInfo[$team['Number']] = $team;
        }

        // Ajouter les informations des équipes au message principal
        $message['SenderTeamName'] = isset($teamsInfo[$message['SenderTeamID']]) ? $teamsInfo[$message['SenderTeamID']]['Name'] : 'Équipe inconnue';
        $message['SenderGMName'] = isset($teamsInfo[$message['SenderTeamID']]) ? $teamsInfo[$message['SenderTeamID']]['GMName'] : 'GM inconnu';
        $message['RecipientTeamName'] = isset($teamsInfo[$message['RecipientTeamID']]) ? $teamsInfo[$message['RecipientTeamID']]['Name'] : 'Équipe inconnue';
        $message['RecipientGMName'] = isset($teamsInfo[$message['RecipientTeamID']]) ? $teamsInfo[$message['RecipientTeamID']]['GMName'] : 'GM inconnu';

        // Ajouter les informations des équipes aux réponses
        foreach ($replies as &$reply) {
            $reply['SenderTeamName'] = isset($teamsInfo[$reply['SenderTeamID']]) ? $teamsInfo[$reply['SenderTeamID']]['Name'] : 'Équipe inconnue';
            $reply['SenderGMName'] = isset($teamsInfo[$reply['SenderTeamID']]) ? $teamsInfo[$reply['SenderTeamID']]['GMName'] : 'GM inconnu';
            $reply['RecipientTeamName'] = isset($teamsInfo[$reply['RecipientTeamID']]) ? $teamsInfo[$reply['RecipientTeamID']]['Name'] : 'Équipe inconnue';
            $reply['RecipientGMName'] = isset($teamsInfo[$reply['RecipientTeamID']]) ? $teamsInfo[$reply['RecipientTeamID']]['GMName'] : 'GM inconnu';
        }
    }

    $mainDB->close();
    
    if (!$message) {
        throw new Exception("Message non trouvé ou accès non autorisé");
    }
    
    // Marquer le message comme lu si c'est le destinataire qui le lit
    if ($message['RecipientTeamID'] == $CookieTeamNumber && !$message['IsRead']) {
        $updateQuery = "UPDATE PrivateMessages SET IsRead = 1 WHERE MessageID = ?";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bindValue(1, $messageId, SQLITE3_INTEGER);
        $updateStmt->execute();
        
        // Marquer les notifications comme lues
        $notifUpdateQuery = "UPDATE MessageNotifications SET IsRead = 1 WHERE MessageID = ? AND TeamID = ?";
        $notifStmt = $db->prepare($notifUpdateQuery);
        $notifStmt->bindValue(1, $messageId, SQLITE3_INTEGER);
        $notifStmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
        $notifStmt->execute();
    }
    
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}

// Fonction pour formater la date
function formatFullDate($dateString) {
    $date = new DateTime($dateString);
    return $date->format('d/m/Y à H:i');
}

// Rediriger vers la page thread pour une expérience de type boîte mail
if ($message && isset($message['ThreadID'])) {
    header('Location: ThreadView.php?id=' . (int)$message['ThreadID']);
    exit();
}

include "Header.php";
?>

<title><?php echo $LeagueName; ?> - Message</title>
</head>

<body>
<?php include "Menu.php"; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <i class=\"fa-solid fa-envelope-open me-2"></i>
                    Message
                </h2>
                <div>
                    <button class="btn btn-outline-danger me-2" onclick="deleteMessage(<?php echo $messageId; ?>)">
                        <i class=\"fa-solid fa-trash me-1"></i>
                        Supprimer
                    </button>
                    <a href="Messages.php" class="btn btn-secondary">
                        <i class=\"fa-solid fa-arrow-left me-1"></i>
                        Retour à la messagerie
                    </a>
                </div>
            </div>
            
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($successMessage): ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars($successMessage); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($message): ?>
                <!-- Message principal -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="mb-1"><?php echo htmlspecialchars($message['Subject']); ?></h5>
                                <div class="text-muted">
                                    <strong>De:</strong> <?php echo htmlspecialchars($message['SenderGMName']); ?> 
                                    (<?php echo htmlspecialchars($message['SenderTeamName']); ?>)
                                    <br>
                                    <strong>À:</strong> <?php echo htmlspecialchars($message['RecipientGMName']); ?> 
                                    (<?php echo htmlspecialchars($message['RecipientTeamName']); ?>)
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <small class="text-muted">
                                    <?php echo formatFullDate($message['SentDate']); ?>
                                </small>
                                <?php if ($message['RecipientTeamID'] == $CookieTeamNumber): ?>
                                    <br>
                                    <span class="badge bg-success">Reçu</span>
                                <?php else: ?>
                                    <br>
                                    <span class="badge bg-primary">Envoyé</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="message-content">
                            <?php echo nl2br(htmlspecialchars($message['MessageBody'])); ?>
                        </div>
                    </div>
                </div>

                <!-- Réponses -->
                <?php if (!empty($replies)): ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">
                                <i class=\"fa-solid fa-comments me-2"></i>
                                Réponses (<?php echo count($replies); ?>)
                            </h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="replies-container" style="max-height: 400px; overflow-y: auto;">
                                <?php foreach ($replies as $index => $reply): ?>
                                    <div class="reply-item p-3 border-bottom <?php echo ($reply['SenderTeamID'] == $CookieTeamNumber) ? 'bg-light' : ''; ?>">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <strong><?php echo htmlspecialchars($reply['SenderGMName']); ?></strong>
                                                <small class="text-muted ms-2">(<?php echo htmlspecialchars($reply['SenderTeamName']); ?>)</small>
                                                <?php if ($reply['SenderTeamID'] == $CookieTeamNumber): ?>
                                                    <span class="badge bg-primary ms-2">Vous</span>
                                                <?php endif; ?>
                                            </div>
                                            <small class="text-muted">
                                                <?php echo formatFullDate($reply['SentDate']); ?>
                                            </small>
                                        </div>
                                        <div class="reply-content">
                                            <?php echo nl2br(htmlspecialchars($reply['MessageBody'])); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Formulaire de réponse -->
                <?php if ($message['RecipientTeamID'] == $CookieTeamNumber || $message['SenderTeamID'] == $CookieTeamNumber): ?>
                    <div class="card">
                        <div class="card-header">
                            <h5><i class=\"fa-solid fa-reply me-2"></i>Répondre</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="recipient_id" value="<?php echo ($message['SenderTeamID'] == $CookieTeamNumber) ? $message['RecipientTeamID'] : $message['SenderTeamID']; ?>">
                                
                                <div class="mb-3">
                                    <label for="reply_subject" class="form-label">Sujet</label>
                                    <input type="text" class="form-control" id="reply_subject" name="reply_subject" 
                                           value="Re: <?php echo htmlspecialchars($message['Subject']); ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="reply_body" class="form-label">Message</label>
                                    <textarea class="form-control" id="reply_body" name="reply_body" rows="8" required 
                                              placeholder="Tapez votre réponse ici..."></textarea>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small class="text-muted">
                                            Réponse à: <strong>
                                            <?php 
                                            if ($message['SenderTeamID'] == $CookieTeamNumber) {
                                                echo htmlspecialchars($message['RecipientGMName']) . ' (' . htmlspecialchars($message['RecipientTeamName']) . ')';
                                            } else {
                                                echo htmlspecialchars($message['SenderGMName']) . ' (' . htmlspecialchars($message['SenderTeamName']) . ')';
                                            }
                                            ?>
                                            </strong>
                                        </small>
                                    </div>
                                    <div>
                                        <button type="submit" name="reply_message" class="btn btn-primary">
                                            <i class=\"fa-solid fa-paper-plane me-1"></i>
                                            Envoyer la réponse
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
                
            <?php else: ?>
                <div class="alert alert-warning">
                    <i class=\"fa-solid fa-triangle-exclamation me-2"></i>
                    Message non trouvé ou accès non autorisé.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "Footer.php"; ?>

<style>
.message-content {
    font-size: 1.1rem;
    line-height: 1.6;
    padding: 20px 0;
    border-bottom: 1px solid #dee2e6;
    margin-bottom: 20px;
}

.card-header h5 {
    margin-bottom: 0;
}

.badge {
    font-size: 0.8rem;
}

.replies-container {
    background-color: #f8f9fa;
}

.reply-item {
    transition: background-color 0.2s;
}

.reply-item:hover {
    background-color: #e9ecef !important;
}

.reply-content {
    font-size: 1rem;
    line-height: 1.5;
}

.reply-item:last-child {
    border-bottom: none !important;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 10px;
    }
    
    .text-end {
        text-align: left !important;
    }
}
</style>

<script>
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
            // Rediriger vers la messagerie après suppression
            window.location.href = 'Messages.php';
        } else {
            alert('Erreur lors de la suppression: ' + (data.error || 'Erreur inconnue'));
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur lors de la suppression du message');
    });
}
</script>

</body>
</html>

