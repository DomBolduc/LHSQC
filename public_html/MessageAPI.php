<?php
/**
 * API pour les fonctionnalités de messagerie
 * Gère les notifications et vérifications AJAX
 */

require_once "STHSSetting.php";

// Définir le fichier de base de données pour la messagerie
$MessagesDBFile = "LHSQC-Messages.db";

// Désactiver l'affichage des erreurs pour éviter du HTML dans la réponse JSON
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Gestionnaire d'erreur global pour retourner du JSON même en cas d'erreur fatale
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        if (!headers_sent()) {
            header('Content-Type: application/json');
            http_response_code(500);
        }
        echo json_encode(['error' => 'Erreur serveur interne']);
        exit();
    }
});

header('Content-Type: application/json');

// Vérifier l'authentification
if ($CookieTeamNumber <= 0 || $CookieTeamNumber > 102) {
    http_response_code(401);
    echo json_encode(['error' => 'Non autorisé']);
    exit();
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

try {
    if (!file_exists($MessagesDBFile)) {
        throw new Exception("Base de données de messagerie non trouvée");
    }

    $db = new SQLite3($MessagesDBFile);
    
    switch ($action) {
        case 'checkNew':
            // Vérifier s'il y a de nouveaux messages
            $query = "
            SELECT COUNT(*) as newMessages 
            FROM PrivateMessages 
            WHERE RecipientTeamID = ? 
            AND IsRead = 0 
            AND IsDeleted = 0
            ";
            
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
            $result = $stmt->execute();
            $row = $result->fetchArray(SQLITE3_ASSOC);
            
            echo json_encode([
                'success' => true,
                'newMessages' => (int)$row['newMessages']
            ]);
            break;
            
        case 'getNotifications':
            // Récupérer les notifications récentes
            $query = "
            SELECT
                mn.*,
                pm.Subject,
                pm.SenderTeamID
            FROM MessageNotifications mn
            LEFT JOIN PrivateMessages pm ON mn.MessageID = pm.MessageID
            WHERE mn.TeamID = ?
            AND mn.IsRead = 0
            ORDER BY mn.CreatedDate DESC
            LIMIT 10
            ";

            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
            $result = $stmt->execute();

            // Récupérer les infos des équipes depuis la DB principale
            $mainDB = new SQLite3($DatabaseFile);
            $teamsQuery = "SELECT Number, Name, GMName FROM TeamProInfo WHERE Number BETWEEN 1 AND 102";
            $teamsResult = $mainDB->query($teamsQuery);
            $teamsInfo = [];
            while ($team = $teamsResult->fetchArray(SQLITE3_ASSOC)) {
                $teamsInfo[$team['Number']] = $team;
            }
            $mainDB->close();

            $notifications = [];
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $senderInfo = isset($teamsInfo[$row['SenderTeamID']]) ? $teamsInfo[$row['SenderTeamID']] : null;
                $notifications[] = [
                    'id' => $row['NotificationID'],
                    'messageId' => $row['MessageID'],
                    'subject' => $row['Subject'],
                    'senderName' => $senderInfo ? $senderInfo['GMName'] : 'GM inconnu',
                    'senderTeam' => $senderInfo ? $senderInfo['Name'] : 'Équipe inconnue',
                    'date' => $row['CreatedDate']
                ];
            }

            echo json_encode([
                'success' => true,
                'notifications' => $notifications
            ]);
            break;
            
        case 'markNotificationRead':
            // Marquer une notification comme lue
            $notificationId = isset($_POST['notificationId']) ? (int)$_POST['notificationId'] : 0;
            
            if ($notificationId <= 0) {
                throw new Exception("ID de notification invalide");
            }
            
            $query = "
            UPDATE MessageNotifications 
            SET IsRead = 1 
            WHERE NotificationID = ? 
            AND TeamID = ?
            ";
            
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $notificationId, SQLITE3_INTEGER);
            $stmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                throw new Exception("Erreur lors de la mise à jour");
            }
            break;
            
        case 'deleteMessage':
            // Marquer un message comme supprimé (soft delete)
            $messageId = isset($_POST['messageId']) ? (int)$_POST['messageId'] : 0;
            
            if ($messageId <= 0) {
                throw new Exception("ID de message invalide");
            }
            
            // Vérifier que l'utilisateur a le droit de supprimer ce message
            $checkQuery = "
            SELECT MessageID 
            FROM PrivateMessages 
            WHERE MessageID = ? 
            AND (SenderTeamID = ? OR RecipientTeamID = ?)
            ";
            
            $stmt = $db->prepare($checkQuery);
            $stmt->bindValue(1, $messageId, SQLITE3_INTEGER);
            $stmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
            $stmt->bindValue(3, $CookieTeamNumber, SQLITE3_INTEGER);
            $result = $stmt->execute();
            
            if (!$result->fetchArray()) {
                throw new Exception("Message non trouvé ou accès non autorisé");
            }
            
            // Marquer comme supprimé
            $deleteQuery = "UPDATE PrivateMessages SET IsDeleted = 1 WHERE MessageID = ?";
            $stmt = $db->prepare($deleteQuery);
            $stmt->bindValue(1, $messageId, SQLITE3_INTEGER);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                throw new Exception("Erreur lors de la suppression");
            }
            break;

        case 'deleteThread':
            // Supprimer un thread pour l'utilisateur actuel seulement (soft delete par utilisateur)
            $threadId = isset($_POST['threadId']) ? (int)$_POST['threadId'] : 0;

            if ($threadId <= 0) {
                throw new Exception("ID de thread invalide");
            }

            // Vérifier que l'utilisateur a accès à ce thread et qu'il n'est pas déjà supprimé pour lui
            $checkQuery = "
            SELECT
                COUNT(*) as total_count,
                SUM(CASE WHEN (SenderTeamID = ? AND DeletedBySender = 1) OR (RecipientTeamID = ? AND DeletedByRecipient = 1) THEN 1 ELSE 0 END) as already_deleted_count
            FROM PrivateMessages
            WHERE ThreadID = ?
            AND (SenderTeamID = ? OR RecipientTeamID = ?)
            ";

            $stmt = $db->prepare($checkQuery);
            $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
            $stmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
            $stmt->bindValue(3, $threadId, SQLITE3_INTEGER);
            $stmt->bindValue(4, $CookieTeamNumber, SQLITE3_INTEGER);
            $stmt->bindValue(5, $CookieTeamNumber, SQLITE3_INTEGER);
            $result = $stmt->execute();
            $row = $result->fetchArray(SQLITE3_ASSOC);

            if (!$row || $row['total_count'] == 0) {
                throw new Exception("Thread non trouvé ou accès non autorisé");
            }

            // Si déjà supprimé pour cet utilisateur, retourner succès sans rien faire
            if ($row['already_deleted_count'] > 0) {
                echo json_encode(['success' => true, 'message' => 'Thread déjà supprimé de votre boîte de réception']);
                break;
            }

            // Marquer le thread comme supprimé SEULEMENT pour l'utilisateur actuel
            $deleteQuery = "
            UPDATE PrivateMessages
            SET DeletedBySender = CASE WHEN SenderTeamID = ? THEN 1 ELSE DeletedBySender END,
                DeletedByRecipient = CASE WHEN RecipientTeamID = ? THEN 1 ELSE DeletedByRecipient END
            WHERE ThreadID = ?
            ";

            $stmt = $db->prepare($deleteQuery);
            $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
            $stmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
            $stmt->bindValue(3, $threadId, SQLITE3_INTEGER);

            if ($stmt->execute()) {
                // Supprimer les notifications SEULEMENT pour l'utilisateur actuel
                $deleteNotifQuery = "
                DELETE FROM MessageNotifications
                WHERE RecipientTeamID = ?
                AND MessageID IN (
                    SELECT MessageID FROM PrivateMessages WHERE ThreadID = ?
                )
                ";
                $stmt = $db->prepare($deleteNotifQuery);
                $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
                $stmt->bindValue(2, $threadId, SQLITE3_INTEGER);
                $stmt->execute();

                echo json_encode(['success' => true, 'message' => 'Thread supprimé de votre boîte de réception']);
            } else {
                throw new Exception("Erreur lors de la suppression du thread");
            }
            break;

        case 'getStats':
            // Récupérer les statistiques de messagerie
            $queries = [
                'total' => "SELECT COUNT(*) as count FROM PrivateMessages WHERE (SenderTeamID = ? OR RecipientTeamID = ?) AND IsDeleted = 0",
                'unread' => "SELECT COUNT(*) as count FROM PrivateMessages WHERE RecipientTeamID = ? AND IsRead = 0 AND IsDeleted = 0",
                'sent' => "SELECT COUNT(*) as count FROM PrivateMessages WHERE SenderTeamID = ? AND IsDeleted = 0",
                'received' => "SELECT COUNT(*) as count FROM PrivateMessages WHERE RecipientTeamID = ? AND IsDeleted = 0"
            ];
            
            $stats = [];
            foreach ($queries as $key => $query) {
                $stmt = $db->prepare($query);
                if ($key === 'total') {
                    $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
                    $stmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
                } else {
                    $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
                }
                $result = $stmt->execute();
                $row = $result->fetchArray(SQLITE3_ASSOC);
                $stats[$key] = (int)$row['count'];
            }
            
            echo json_encode([
                'success' => true,
                'stats' => $stats
            ]);
            break;
            
        default:
            throw new Exception("Action non reconnue");
    }
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
} finally {
    if (isset($db)) {
        $db->close();
    }
}
?>
