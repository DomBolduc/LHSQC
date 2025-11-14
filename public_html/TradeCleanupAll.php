<?php
/**
 * Script de nettoyage complet des trades
 * Supprime TOUS les trades en attente (pending) de la base de données
 * ATTENTION : Utiliser avec précaution - supprime tous les trades non exécutés
 */

require_once "STHSSetting.php";

$DatabaseFile = "LHSQC-STHS.db";
$TradeApprovalDBFile = "LHSQC-TradeApproval.db";

if (!file_exists($DatabaseFile)) {
    die("❌ Base de données principale non trouvée: " . $DatabaseFile);
}

try {
    $db = new SQLite3($DatabaseFile);
    $db->enableExceptions(true);
    
    echo "<h2>🧹 Nettoyage complet des trades</h2>";
    
    // Compter les trades en attente
    $countQuery = "SELECT COUNT(*) as total FROM Trade";
    $count = $db->querySingle($countQuery, true);
    
    echo "<p><strong>Trades trouvés dans la base de données :</strong> " . $count['total'] . "</p>";
    
    if ($count['total'] > 0) {
        // Afficher les détails des trades
        echo "<h3>Détails des trades :</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>FromTeam</th><th>ToTeam</th><th>ConfirmFrom</th><th>ConfirmTo</th><th>Player</th><th>Prospect</th><th>DraftPick</th></tr>";
        
        $detailQuery = "SELECT FromTeam, ToTeam, ConfirmFrom, ConfirmTo, Player, Prospect, DraftPick FROM Trade";
        $trades = $db->query($detailQuery);
        
        while ($trade = $trades->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $trade['FromTeam'] . "</td>";
            echo "<td>" . $trade['ToTeam'] . "</td>";
            echo "<td>" . $trade['ConfirmFrom'] . "</td>";
            echo "<td>" . $trade['ConfirmTo'] . "</td>";
            echo "<td>" . ($trade['Player'] ?: '-') . "</td>";
            echo "<td>" . ($trade['Prospect'] ?: '-') . "</td>";
            echo "<td>" . ($trade['DraftPick'] ?: '-') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Demander confirmation
        if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
            // Supprimer tous les trades
            $deleteQuery = "DELETE FROM Trade";
            $db->exec($deleteQuery);
            
            // Nettoyer aussi la base d'approbation si elle existe
            if (file_exists($TradeApprovalDBFile)) {
                $approvalDB = new SQLite3($TradeApprovalDBFile);
                $approvalDB->exec("DELETE FROM TradeCommissionerApproval");
                $approvalDB->close();
            }
            
            echo "<h3 style='color: green;'>✅ Tous les trades ont été supprimés !</h3>";
            echo "<p><a href='TradeCleanupAll.php'>Actualiser la page</a></p>";
        } else {
            echo "<h3 style='color: orange;'>⚠️ Attention !</h3>";
            echo "<p>Cette action va supprimer <strong>TOUS</strong> les trades en attente.</p>";
            echo "<p><strong>Êtes-vous sûr ?</strong></p>";
            echo "<p>";
            echo "<a href='TradeCleanupAll.php?confirm=yes' style='background: red; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>OUI, SUPPRIMER TOUS LES TRADES</a> ";
            echo "<a href='Trade.php' style='background: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>NON, ANNULER</a>";
            echo "</p>";
        }
    } else {
        echo "<p style='color: green;'>✅ Aucun trade en attente. La base de données est propre.</p>";
        echo "<p><a href='Trade.php'>Retour à Trade</a></p>";
    }
    
    $db->close();
    
} catch (Exception $e) {
    echo "<h2 style='color: red;'>❌ Erreur: " . htmlspecialchars($e->getMessage()) . "</h2>";
}
?>

