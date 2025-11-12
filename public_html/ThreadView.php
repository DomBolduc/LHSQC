<?php
/**
 * Page de visualisation d'une conversation de messages
 * Permet de lire une conversation et de répondre
 */

require_once "STHSSetting.php";

// Vérifier l'authentification
if ($CookieTeamNumber <= 0 || $CookieTeamNumber > 102) {
    header("Location: Login.php");
    exit();
}

// Récupérer l'ID du thread
$threadId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($threadId <= 0) {
    header("Location: Messages.php");
    exit();
}

$DatabaseFile = "LHSQC-STHS.db";
$MessagesDBFile = "LHSQC-Messages.db";

$thread = [];
$errorMessage = "";
$successMessage = "";

// Traitement de la réponse
// Traitement de la réponse (PRG: redirect après succès)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply'])) {
    try {
        $replyBody = trim($_POST['replyBody']);
        
        if (empty($replyBody)) {
            throw new Exception("Le message de réponse est obligatoire");
        }
        
        $db = new SQLite3($MessagesDBFile);
        
        // Récupérer les informations du thread pour déterminer le destinataire
        $threadQuery = "SELECT * FROM PrivateMessages WHERE ThreadID = ? ORDER BY SentDate ASC LIMIT 1";
        $stmt = $db->prepare($threadQuery);
        $stmt->bindValue(1, $threadId, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $originalMessage = $result->fetchArray(SQLITE3_ASSOC);
        
        if (!$originalMessage) {
            throw new Exception("Thread non trouvé");
        }
        
        // Déterminer le destinataire (l'autre participant du thread)
        $recipientId = ($originalMessage['SenderTeamID'] == $CookieTeamNumber) 
                      ? $originalMessage['RecipientTeamID'] 
                      : $originalMessage['SenderTeamID'];
        
        // Insérer la réponse
        $insertQuery = "
        INSERT INTO PrivateMessages (SenderTeamID, RecipientTeamID, Subject, MessageBody, ThreadID, ParentMessageID)
        VALUES (?, ?, ?, ?, ?, ?)
        ";
        
        $stmt = $db->prepare($insertQuery);
        $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
        $stmt->bindValue(2, $recipientId, SQLITE3_INTEGER);
        $stmt->bindValue(3, "Re: " . $originalMessage['Subject'], SQLITE3_TEXT);
        $stmt->bindValue(4, $replyBody, SQLITE3_TEXT);
        $stmt->bindValue(5, $threadId, SQLITE3_INTEGER);
        $stmt->bindValue(6, $originalMessage['MessageID'], SQLITE3_INTEGER);
        
        if ($stmt->execute()) {
            $replyId = $db->lastInsertRowID();
            
            // Créer une notification pour le destinataire
            $notifQuery = "INSERT INTO MessageNotifications (TeamID, MessageID) VALUES (?, ?)";
            $notifStmt = $db->prepare($notifQuery);
            $notifStmt->bindValue(1, $recipientId, SQLITE3_INTEGER);
            $notifStmt->bindValue(2, $replyId, SQLITE3_INTEGER);
            $notifStmt->execute();
            
            // Redirect vers GET pour éviter double insertion si l'utilisateur rafraîchit
            header('Location: ThreadView.php?id=' . (int)$threadId);
            exit();
        } else {
            throw new Exception("Erreur lors de l'envoi de la réponse");
        }
        
        $db->close();
        
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

    // Récupérer tous les messages du thread (filtrés selon la suppression par utilisateur)
    $threadQuery = "
    SELECT pm.*
    FROM PrivateMessages pm
    WHERE pm.ThreadID = ?
    AND (pm.SenderTeamID = ? OR pm.RecipientTeamID = ? OR ? = 102)
    AND NOT ((pm.SenderTeamID = ? AND pm.DeletedBySender = 1) OR (pm.RecipientTeamID = ? AND pm.DeletedByRecipient = 1))
    ORDER BY pm.SentDate ASC
    ";

    $stmt = $db->prepare($threadQuery);
    $stmt->bindValue(1, $threadId, SQLITE3_INTEGER);
    $stmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
    $stmt->bindValue(3, $CookieTeamNumber, SQLITE3_INTEGER);
    $stmt->bindValue(4, $CookieTeamNumber, SQLITE3_INTEGER);
    $stmt->bindValue(5, $CookieTeamNumber, SQLITE3_INTEGER);
    $stmt->bindValue(6, $CookieTeamNumber, SQLITE3_INTEGER);
    $result = $stmt->execute();

    $thread = [];
    $participantIds = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $thread[] = $row;
        $participantIds[] = $row['SenderTeamID'];
        $participantIds[] = $row['RecipientTeamID'];
    }
    
    if (empty($thread)) {
        throw new Exception("Thread non trouvé ou accès non autorisé");
    }
    
    // Récupérer les informations des équipes participantes
    $participantIds = array_unique($participantIds);
    $placeholders = str_repeat('?,', count($participantIds) - 1) . '?';
    $teamsQuery = "SELECT Number, Name, GMName FROM TeamProInfo WHERE Number IN ($placeholders)";
    $teamsStmt = $mainDB->prepare($teamsQuery);
    foreach ($participantIds as $index => $teamId) {
        $teamsStmt->bindValue($index + 1, $teamId, SQLITE3_INTEGER);
    }
    $teamsResult = $teamsStmt->execute();

    $teamsInfo = [];
    while ($team = $teamsResult->fetchArray(SQLITE3_ASSOC)) {
        $teamsInfo[$team['Number']] = $team;
    }

    // Enrichir les messages avec les informations des équipes - VERSION CORRIGÉE
    foreach ($thread as $index => &$message) {
        // Récupérer les informations de l'expéditeur DIRECTEMENT depuis $teamsInfo
        $senderTeamId = (int)$message['SenderTeamID'];
        $recipientTeamId = (int)$message['RecipientTeamID'];

        // Informations de l'expéditeur
        if (isset($teamsInfo[$senderTeamId])) {
            $message['SenderTeamName'] = $teamsInfo[$senderTeamId]['Name'];
            $message['SenderGMName'] = $teamsInfo[$senderTeamId]['GMName'];
        } else {
            $message['SenderTeamName'] = "Équipe $senderTeamId";
            $message['SenderGMName'] = "GM $senderTeamId";
        }

        // Informations du destinataire
        if (isset($teamsInfo[$recipientTeamId])) {
            $message['RecipientTeamName'] = $teamsInfo[$recipientTeamId]['Name'];
            $message['RecipientGMName'] = $teamsInfo[$recipientTeamId]['GMName'];
        } else {
            $message['RecipientTeamName'] = "Équipe $recipientTeamId";
            $message['RecipientGMName'] = "GM $recipientTeamId";
        }
    }
    unset($message); // Libérer la référence

    // Marquer tous les messages reçus comme lus
    $markReadQuery = "UPDATE PrivateMessages SET IsRead = 1 WHERE ThreadID = ? AND RecipientTeamID = ? AND IsRead = 0";
    $markReadStmt = $db->prepare($markReadQuery);
    $markReadStmt->bindValue(1, $threadId, SQLITE3_INTEGER);
    $markReadStmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
    $markReadStmt->execute();

    // Supprimer les notifications pour ce thread
    $deleteNotifQuery = "DELETE FROM MessageNotifications WHERE MessageID IN (SELECT MessageID FROM PrivateMessages WHERE ThreadID = ?) AND TeamID = ?";
    $deleteNotifStmt = $db->prepare($deleteNotifQuery);
    $deleteNotifStmt->bindValue(1, $threadId, SQLITE3_INTEGER);
    $deleteNotifStmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
    $deleteNotifStmt->execute();

    $mainDB->close();
    $db->close();
    
} catch (Exception $e) {
    $errorMessage = "Erreur: " . $e->getMessage();
}

// Fonction pour formater la date
function formatMessageDate($dateString) {
    $date = new DateTime($dateString);
    $now = new DateTime();
    $diff = $now->diff($date);
    
    if ($diff->days == 0) {
        return "Aujourd'hui à " . $date->format('H:i');
    } elseif ($diff->days == 1) {
        return "Hier à " . $date->format('H:i');
    } elseif ($diff->days < 7) {
        return $date->format('l à H:i');
    } else {
        return $date->format('d/m/Y à H:i');
    }
}
?>

<?php
include "Header.php";
?>

<title><?php echo $LeagueName; ?> - Conversation</title>
<link rel="stylesheet" href="css/components/messaging.css">

<style>
.message-bubble {
    max-width: 70%;
    margin-bottom: 1rem;
}
.message-sent {
    margin-left: auto;
}
.message-received {
    margin-right: auto;
}
.message-content {
    padding: 1rem;
    border-radius: 1rem;
    position: relative;
}
.message-sent .message-content {
    background-color: #007bff;
    color: white;
}
.message-received .message-content {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
}
.message-meta {
    font-size: 0.8rem;
    opacity: 0.7;
    margin-top: 0.5rem;
}
.thread-container {
    height: 60vh;
    overflow-y: auto;
    border: 1px solid #dee2e6;
    border-radius: 0.5rem;
    padding: 1rem;
    background-color: #fafafa;
}
</style>
</head>

<body>
<?php include "Menu.php"; ?>
    
    <div class="container mt-4">
        <?php if ($errorMessage): ?>
            <div class="alert alert-danger">
                <i class=\"fa-solid fa-triangle-exclamation me-2"></i>
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>
        
        <?php if ($successMessage): ?>
            <div class="alert alert-success">
                <i class=\"fa-solid fa-check-circle me-2"></i>
                <?php echo htmlspecialchars($successMessage); ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($thread)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">
                                    <span class="me-2">💬</span>
                                    <?php echo htmlspecialchars($thread[0]['Subject']); ?>
                                </h4>
                                <small class="text-muted">
                                    Conversation entre <?php echo htmlspecialchars($thread[0]['SenderGMName']); ?> et <?php echo htmlspecialchars($thread[0]['RecipientGMName']); ?>
                                </small>
                            </div>
                            <div>
                                <button class="btn btn-outline-danger me-2" onclick="deleteThread(<?php echo $threadId; ?>)">
                                    <span class="me-1">❌</span>
                                    Supprimer
                                </button>
                                <a href="Messages.php" class="btn btn-secondary">
                                    <span class="me-1">🔙</span>
                                    Retour
                                </a>
                            </div>
                        </div>
                        
                        <div class="card-body p-0">


                            <div class="thread-container">
                                <?php foreach ($thread as $index => $message): ?>
                                    <?php
                                    $isCurrentUserSender = ((int)$message['SenderTeamID'] === (int)$CookieTeamNumber);
                                    $bubbleClass = $isCurrentUserSender ? 'message-sent' : 'message-received';
                                    ?>



                                    <div class="message-bubble <?php echo $bubbleClass; ?>">
                                        <div class="message-content">
                                            <div class="message-body">
                                                <?php echo nl2br(htmlspecialchars($message['MessageBody'])); ?>
                                            </div>
                                            <div class="message-meta">
                                                <strong><?php echo htmlspecialchars($message['SenderGMName']); ?></strong>
                                                • <?php echo formatMessageDate($message['SentDate']); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="replyBody" class="form-label">Votre réponse:</label>
                                            <textarea class="form-control" id="replyBody" name="replyBody" rows="3" required placeholder="Tapez votre réponse ici..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="reply" class="btn btn-primary">
                                        <span class="me-1">📤</span>
                                        Envoyer la réponse
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">
                <i class=\"fa-solid fa-triangle-exclamation me-2"></i>
                Conversation non trouvée ou accès non autorisé.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour supprimer un thread
        function deleteThread(threadId) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer cette conversation complète ? Cette action est irréversible.')) {
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
                    window.location.href = 'Messages.php';
                } else {
                    alert('Erreur lors de la suppression: ' + (data.error || 'Erreur inconnue'));
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la suppression de la conversation: ' + error.message);
            });
        }
        
        // Auto-scroll vers le bas de la conversation
        document.addEventListener('DOMContentLoaded', function() {
            const threadContainer = document.querySelector('.thread-container');
            if (threadContainer) {
                threadContainer.scrollTop = threadContainer.scrollHeight;
            }
        });
    </script>

<?php include "Footer.php"; ?>

