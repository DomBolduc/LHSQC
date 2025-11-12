<?php
/**
 * Page de composition d'un nouveau message
 * Permet d'écrire et envoyer de nouveaux messages avec sélection du destinataire
 */

require_once "STHSSetting.php";

// Définir le fichier de base de données pour la messagerie
$MessagesDBFile = "LHSQC-Messages.db";

// Vérifier l'authentification
if ($CookieTeamNumber <= 0 || $CookieTeamNumber > 102) {
    header("Location: Login.php");
    exit();
}

$teams = [];
$errorMessage = "";
$successMessage = "";
$selectedRecipient = isset($_GET['to']) ? (int)$_GET['to'] : 0;

// Traitement de l'envoi du message
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_message'])) {
    try {
        $db = new SQLite3($MessagesDBFile);
        $mainDB = new SQLite3($DatabaseFile);
        
        $recipientId = (int)$_POST['recipient_id'];
        $subject = trim($_POST['subject']);
        $messageBody = trim($_POST['message_body']);
        
        // Validation
        if ($recipientId <= 0 || $recipientId > 100) {
            throw new Exception("Veuillez sélectionner un destinataire valide");
        }
        
        if ($recipientId == $CookieTeamNumber) {
            throw new Exception("Vous ne pouvez pas vous envoyer un message à vous-même");
        }
        
        if (empty($subject)) {
            throw new Exception("Le sujet est obligatoire");
        }
        
        if (empty($messageBody)) {
            throw new Exception("Le message ne peut pas être vide");
        }
        
        // Vérifier que le destinataire existe et a un GM depuis la DB principale
        $recipientQuery = "SELECT Number, Name, GMName FROM TeamProInfo WHERE Number = ? AND GMName != ''";
        $stmt = $mainDB->prepare($recipientQuery);
        $stmt->bindValue(1, $recipientId, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $recipient = $result->fetchArray(SQLITE3_ASSOC);
        
        if (!$recipient) {
            throw new Exception("Destinataire non trouvé ou sans GM assigné");
        }
        
        // Insérer le message
        $insertQuery = "
        INSERT INTO PrivateMessages (SenderTeamID, RecipientTeamID, Subject, MessageBody, ThreadID)
        VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $db->prepare($insertQuery);
        $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
        $stmt->bindValue(2, $recipientId, SQLITE3_INTEGER);
        $stmt->bindValue(3, $subject, SQLITE3_TEXT);
        $stmt->bindValue(4, $messageBody, SQLITE3_TEXT);
        $stmt->bindValue(5, null, SQLITE3_INTEGER); // ThreadID sera mis à jour après insertion

        if ($stmt->execute()) {
            $messageId = $db->lastInsertRowID();

            // Définir le ThreadID comme l'ID du message pour un nouveau thread
            $updateThreadQuery = "UPDATE PrivateMessages SET ThreadID = ? WHERE MessageID = ?";
            $updateStmt = $db->prepare($updateThreadQuery);
            $updateStmt->bindValue(1, $messageId, SQLITE3_INTEGER);
            $updateStmt->bindValue(2, $messageId, SQLITE3_INTEGER);
            $updateStmt->execute();
            
            // Créer une notification pour le destinataire
            $notifQuery = "INSERT INTO MessageNotifications (TeamID, MessageID) VALUES (?, ?)";
            $notifStmt = $db->prepare($notifQuery);
            $notifStmt->bindValue(1, $recipientId, SQLITE3_INTEGER);
            $notifStmt->bindValue(2, $messageId, SQLITE3_INTEGER);
            $notifStmt->execute();
            
            $successMessage = "Message envoyé avec succès à " . htmlspecialchars($recipient['GMName']) . "!";

            // Rediriger vers la messagerie après 2 secondes
            header("refresh:2;url=Messages.php");
        } else {
            throw new Exception("Erreur lors de l'envoi du message");
        }

        $mainDB->close();

    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        if (isset($mainDB)) $mainDB->close();
    }
}

try {
    if (!file_exists($DatabaseFile)) {
        throw new Exception("Base de données principale non trouvée");
    }

    $mainDB = new SQLite3($DatabaseFile);

    // Récupérer la liste des équipes avec GM (excluant l'équipe actuelle)
    $teamsQuery = "
    SELECT Number, Name, GMName
    FROM TeamProInfo
    WHERE Number BETWEEN 1 AND 100
    AND Number != ?
    AND GMName != ''
    ORDER BY Name
    ";

    $stmt = $mainDB->prepare($teamsQuery);
    $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
    $result = $stmt->execute();

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $teams[] = $row;
    }

    // Récupérer les informations de l'équipe actuelle
    $currentTeamQuery = "SELECT Number, Name, GMName FROM TeamProInfo WHERE Number = ?";
    $stmt = $mainDB->prepare($currentTeamQuery);
    $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $currentTeam = $result->fetchArray(SQLITE3_ASSOC);

    $mainDB->close();
    
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}

include "Header.php";
?>

<title><?php echo $LeagueName; ?> - Nouveau Message</title>
<link rel="stylesheet" href="css/components/messaging.css">
</head>

<body>
<?php include "Menu.php"; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <span class="me-2">✏️</span>
                    Nouveau Message
                </h2>
                <a href="Messages.php" class="btn btn-secondary">
                    <span class="me-1">🔙</span>
                    Retour à la messagerie
                </a>
            </div>
            
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($successMessage): ?>
                <div class="alert alert-success">
                    <i class="fa-solid fa-circle-check me-2"></i>
                    <?php echo $successMessage; ?>
                    <br><small>Redirection automatique vers la messagerie...</small>
                </div>
            <?php endif; ?>
            
            <?php if (isset($currentTeam)): ?>
                <div class="alert alert-info">
                    <i class="fa-solid fa-user me-2"></i>
                    Expéditeur: <strong><?php echo htmlspecialchars($currentTeam['GMName']); ?></strong> 
                    (<?php echo htmlspecialchars($currentTeam['Name']); ?>)
                </div>
            <?php endif; ?>
            
            <div class="card">
                <div class="card-header">
                    <h5><span class="me-2">📝</span>Composer un message</h5>
                </div>
                <div class="card-body">
                    <?php if (!$successMessage): ?>
                        <form method="POST" id="messageForm">
                            <div class="mb-3">
                                <label for="recipient_id" class="form-label">
                                    <span class="me-1">👤</span>
                                    Destinataire *
                                </label>
                                <select class="form-select" id="recipient_id" name="recipient_id" required>
                                    <option value="">Sélectionnez un GM...</option>
                                    <?php foreach ($teams as $team): ?>
                                        <option value="<?php echo $team['Number']; ?>" 
                                                <?php echo ($selectedRecipient == $team['Number']) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($team['GMName']); ?> 
                                            (<?php echo htmlspecialchars($team['Name']); ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-text">
                                    Sélectionnez le GM à qui vous souhaitez envoyer le message
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">
                                    <span class="me-1">🏷️</span>
                                    Sujet *
                                </label>
                                <input type="text" class="form-control" id="subject" name="subject" 
                                       placeholder="Entrez le sujet du message" required maxlength="200">
                                <div class="form-text">
                                    Maximum 200 caractères
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="message_body" class="form-label">
                                    <span class="me-1">💬</span>
                                    Message *
                                </label>
                                <textarea class="form-control" id="message_body" name="message_body" 
                                          rows="12" required placeholder="Tapez votre message ici..."></textarea>
                                <div class="form-text">
                                    Rédigez votre message. Soyez respectueux et professionnel.
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Les champs marqués d'un * sont obligatoires
                                    </small>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-outline-secondary me-2" onclick="resetForm()">
                                        <span class="me-1">🔄</span>
                                        Réinitialiser
                                    </button>
                                    <button type="submit" name="send_message" class="btn btn-primary">
                                        <span class="me-1">📤</span>
                                        Envoyer le message
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Conseils d'utilisation -->
            <div class="card mt-4">
                <div class="card-header">
                    <h6><i class="fa-solid fa-lightbulb me-2"></i>Conseils d'utilisation</h6>
                </div>
                <div class="card-body">
                    <ul class="mb-0">
                        <li><strong>Soyez respectueux:</strong> Maintenez un ton professionnel et courtois</li>
                        <li><strong>Soyez clair:</strong> Utilisez un sujet descriptif et un message structuré</li>
                        <li><strong>Réponse rapide:</strong> Les GMs recevront une notification de votre message</li>
                        <li><strong>Confidentialité:</strong> Seuls vous et le destinataire pouvez voir ce message</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "Footer.php"; ?>

<script>
function resetForm() {
    if (confirm('Êtes-vous sûr de vouloir réinitialiser le formulaire ? Toutes les données saisies seront perdues.')) {
        document.getElementById('messageForm').reset();
        document.getElementById('recipient_id').focus();
    }
}

// Validation côté client
document.getElementById('messageForm').addEventListener('submit', function(e) {
    const recipient = document.getElementById('recipient_id').value;
    const subject = document.getElementById('subject').value.trim();
    const message = document.getElementById('message_body').value.trim();
    
    if (!recipient) {
        alert('Veuillez sélectionner un destinataire');
        e.preventDefault();
        return;
    }
    
    if (!subject) {
        alert('Veuillez entrer un sujet');
        e.preventDefault();
        return;
    }
    
    if (!message) {
        alert('Veuillez entrer un message');
        e.preventDefault();
        return;
    }
    
    if (subject.length > 200) {
        alert('Le sujet ne peut pas dépasser 200 caractères');
        e.preventDefault();
        return;
    }
    
    // Confirmation avant envoi
    const recipientText = document.getElementById('recipient_id').options[document.getElementById('recipient_id').selectedIndex].text;
    if (!confirm(`Êtes-vous sûr de vouloir envoyer ce message à ${recipientText} ?`)) {
        e.preventDefault();
    }
});

// Auto-resize du textarea
document.getElementById('message_body').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});
</script>

<style>
.form-label {
    font-weight: 600;
    color: #495057;
}

.form-text {
    font-size: 0.875rem;
}

.card-header h5, .card-header h6 {
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 15px;
    }
    
    .d-flex.justify-content-between .btn {
        width: 100%;
    }
}
</style>

</body>
</html>
