<?php
/**
 * Table séparée pour stocker les approbations du commissaire
 * Cette table ne sera PAS écrasée par les exports du simulateur
 */

require_once "STHSSetting.php";

// Base de données séparée pour les approbations
$TradeApprovalDBFile = "LHSQC-TradeApproval.db";

If (file_exists($DatabaseFile) == false){
    die("Base de données principale non trouvée: " . $DatabaseFile);
}

try {
    // Créer/ouvrir la base de données séparée pour les approbations
    $approvalDB = new SQLite3($TradeApprovalDBFile);
    $approvalDB->enableExceptions(true);
    
    // Créer la table si elle n'existe pas
    $createTable = "
        CREATE TABLE IF NOT EXISTS TradeCommissionerApproval (
            ApprovalID INTEGER PRIMARY KEY AUTOINCREMENT,
            FromTeam INTEGER NOT NULL,
            ToTeam INTEGER NOT NULL,
            Team2Confirmed TEXT DEFAULT NULL,
            CommissionerApproved TEXT DEFAULT NULL,
            ApprovalDate DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(FromTeam, ToTeam)
        )
    ";
    
    $approvalDB->exec($createTable);
    
    // Créer un index pour améliorer les performances
    $approvalDB->exec("CREATE INDEX IF NOT EXISTS idx_trade_teams ON TradeCommissionerApproval(FromTeam, ToTeam)");
    
    echo "<h2>✅ Base de données d'approbation créée avec succès!</h2>";
    echo "<p><strong>Fichier:</strong> $TradeApprovalDBFile</p>";
    echo "<p>Cette base de données ne sera <strong>PAS</strong> écrasée par les exports du simulateur.</p>";
    
    // Afficher la structure
    echo "<h3>Structure de la table:</h3>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Colonne</th><th>Type</th><th>Description</th></tr>";
    echo "<tr><td>ApprovalID</td><td>INTEGER PRIMARY KEY</td><td>ID unique</td></tr>";
    echo "<tr><td>FromTeam</td><td>INTEGER</td><td>Équipe qui envoie</td></tr>";
    echo "<tr><td>ToTeam</td><td>INTEGER</td><td>Équipe qui reçoit</td></tr>";
    echo "<tr><td>Team2Confirmed</td><td>TEXT</td><td>'True' si Team2 a confirmé</td></tr>";
    echo "<tr><td>CommissionerApproved</td><td>TEXT</td><td>'True' si le commissaire a approuvé</td></tr>";
    echo "<tr><td>ApprovalDate</td><td>DATETIME</td><td>Date d'approbation</td></tr>";
    echo "</table>";
    
    $approvalDB->close();
    
} catch (Exception $e) {
    echo "<h2 style='color: red;'>❌ Erreur: " . htmlspecialchars($e->getMessage()) . "</h2>";
}
?>

