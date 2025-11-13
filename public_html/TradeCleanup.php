<?php
/**
 * Script de nettoyage pour supprimer les trades exécutés
 * Ce script supprime les trades où les deux équipes ont confirmé ET le commissaire a approuvé
 * Ces trades ont normalement été exécutés par le simulateur lors du dernier export
 */

require_once "STHSSetting.php";

$DatabaseFile = "LHSQC-STHS.db";
$TradeApprovalDBFile = "LHSQC-TradeApproval.db";

if (!file_exists($DatabaseFile)) {
    die("❌ Base de données principale non trouvée: " . $DatabaseFile);
}

if (!file_exists($TradeApprovalDBFile)) {
    die("❌ Base de données d'approbation non trouvée: " . $TradeApprovalDBFile);
}

try {
    $db = new SQLite3($DatabaseFile);
    $db->enableExceptions(true);
    
    $approvalDB = new SQLite3($TradeApprovalDBFile);
    $approvalDB->enableExceptions(true);
    
    // Trouver tous les trades approuvés par le commissaire
    $Query = "SELECT FromTeam, ToTeam FROM TradeCommissionerApproval WHERE CommissionerApproved = 'True'";
    $approvedTrades = $approvalDB->query($Query);
    
    $deletedCount = 0;
    $trades = [];
    
    // Collecter les trades approuvés
    if ($approvedTrades) {
        while ($row = $approvedTrades->fetchArray(SQLITE3_ASSOC)) {
            $trades[] = $row;
        }
    }
    
    echo "<h2>🧹 Nettoyage des trades exécutés</h2>";
    echo "<p>Trades approuvés par le commissaire trouvés : " . count($trades) . "</p>";
    
    // Pour chaque trade approuvé
    foreach ($trades as $trade) {
        $fromTeam = $trade['FromTeam'];
        $toTeam = $trade['ToTeam'];
        
        // Vérifier si le trade a ConfirmTo = 'True' (a été approuvé)
        $checkQuery = "SELECT COUNT(*) as total FROM Trade WHERE FromTeam = " . $fromTeam . " AND ToTeam = " . $toTeam . " AND ConfirmFrom = 'True' AND ConfirmTo = 'True'";
        $check = $db->querySingle($checkQuery, true);
        
        if ($check['total'] > 0) {
            // Ce trade a été approuvé, on peut le supprimer
            $deleteQuery = "DELETE FROM Trade WHERE FromTeam = " . $fromTeam . " AND ToTeam = " . $toTeam;
            $db->exec($deleteQuery);
            
            // Supprimer aussi l'entrée d'approbation
            $deleteApprovalQuery = "DELETE FROM TradeCommissionerApproval WHERE FromTeam = " . $fromTeam . " AND ToTeam = " . $toTeam;
            $approvalDB->exec($deleteApprovalQuery);
            
            $deletedCount++;
            echo "<p style='color: green;'>✅ Trade supprimé : FromTeam=" . $fromTeam . ", ToTeam=" . $toTeam . "</p>";
        }
    }
    
    echo "<h3>Résumé</h3>";
    echo "<p><strong>" . $deletedCount . "</strong> trade(s) nettoyé(s) avec succès.</p>";
    
    if ($deletedCount > 0) {
        echo "<p style='color: blue;'>ℹ️ Ces trades ont été exécutés par le simulateur et les entrées ont été supprimées.</p>";
    } else {
        echo "<p>Aucun trade à nettoyer.</p>";
    }
    
    $db->close();
    $approvalDB->close();
    
} catch (Exception $e) {
    echo "<h2 style='color: red;'>❌ Erreur: " . htmlspecialchars($e->getMessage()) . "</h2>";
}
?>

