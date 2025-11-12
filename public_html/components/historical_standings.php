<?php
/**
 * Affichage des classements historiques
 * Utilise la table TeamProStatCareer de LHSQC-STHSCareerStat.db
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Paramètres
$year = isset($_GET['year']) ? (int)$_GET['year'] : 0;
$type = isset($_GET['type']) ? $_GET['type'] : 'Pro';

if ($year <= 0) {
    echo "<div class='alert alert-danger'>Année invalide.</div>";
    exit;
}

// Chemins des bases de données
$CareerStatDatabaseFile = "../LHSQC-STHSCareerStat.db";
$DatabaseFile = "../LHSQC-STHS.db";

if (!file_exists($CareerStatDatabaseFile)) {
    echo "<div class='alert alert-danger'>Base de données de carrière non trouvée.</div>";
    exit;
}

try {
    // Connexion aux bases de données
    $careerDB = new SQLite3($CareerStatDatabaseFile);
    $currentDB = new SQLite3($DatabaseFile);
    
    // Récupérer les informations des équipes actuelles pour les logos et noms
    $teamInfoQuery = "SELECT Number, Name, TeamThemeID, Conference, Division FROM Team{$type}Info";
    $teamInfoResult = $currentDB->query($teamInfoQuery);
    
    $teamInfo = [];
    if ($teamInfoResult) {
        while ($row = $teamInfoResult->fetchArray()) {
            $teamInfo[$row['Name']] = $row;
        }
    }
    
    // Requête pour récupérer les statistiques historiques
    $query = "SELECT
        Name as TeamName,
        SUM(GP) as GP,
        SUM(W) as W,
        SUM(L) as L,
        SUM(T) as T,
        SUM(OTW) as OTW,
        SUM(OTL) as OTL,
        SUM(SOW) as SOW,
        SUM(SOL) as SOL,
        SUM(Points) as Points,
        SUM(GF) as GF,
        SUM(GA) as GA,
        SUM(Pim) as Pim,
        SUM(Hits) as Hits,
        SUM(PPGoal) as PPGoal,
        SUM(PPAttemp) as PPAttemp,
        SUM(PKGoalGF) as PKGoal,
        SUM(PKAttemp) as PKAttemp,
        SUM(ShotsFor) as ShotsFor,
        SUM(ShotsAga) as ShotsAga
    FROM Team{$type}StatCareer
    WHERE Year = ? AND Playoff = 'False'
    GROUP BY Name
    ORDER BY Points DESC, (GF - GA) DESC, Name ASC";
    
    $stmt = $careerDB->prepare($query);
    $stmt->bindValue(1, $year, SQLITE3_INTEGER);
    $result = $stmt->execute();
    
    $teams = [];
    if ($result) {
        while ($row = $result->fetchArray()) {
            $teams[] = $row;
        }
    }
    
    if (count($teams) == 0) {
        echo "<div class='alert alert-info'>";
        echo "<i class='fas fa-info-circle'></i> ";
        echo "Aucune donnée trouvée pour l'année {$year}.";
        echo "</div>";
        exit;
    }
    
    // Affichage du titre
    echo "<h3 class='historical-year-title'>";
    echo "<i class='fas fa-trophy'></i> Classement {$year}";
    echo "</h3>";
    
    // Affichage du tableau
    echo "<table class='table table-striped historical-standings-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Position</th>";
    echo "<th>Logo</th>";
    echo "<th>Équipe</th>";
    echo "<th>GP</th>";
    echo "<th>W</th>";
    echo "<th>L</th>";
    if ($teams[0]['T'] > 0) echo "<th>T</th>";
    if ($teams[0]['OTW'] > 0) echo "<th>OTW</th>";
    if ($teams[0]['OTL'] > 0) echo "<th>OTL</th>";
    if ($teams[0]['SOW'] > 0) echo "<th>SOW</th>";
    if ($teams[0]['SOL'] > 0) echo "<th>SOL</th>";
    echo "<th>Points</th>";
    echo "<th>GF</th>";
    echo "<th>GA</th>";
    echo "<th>+/-</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    $position = 1;
    foreach ($teams as $team) {
        $teamName = $team['TeamName'];
        $currentTeamInfo = isset($teamInfo[$teamName]) ? $teamInfo[$teamName] : null;
        
        echo "<tr>";
        
        // Position
        echo "<td><strong>{$position}</strong></td>";
        
        // Logo
        echo "<td style='text-align: center;'>";
        if ($currentTeamInfo && $currentTeamInfo['TeamThemeID'] > 0) {
            echo "<img src='../images/{$currentTeamInfo['TeamThemeID']}.png' alt='{$teamName}' class='team-logo' style='width: 30px; height: 30px;'>";
        } else {
            echo "<i class='fas fa-hockey-puck' style='color: #ccc;'></i>";
        }
        echo "</td>";
        
        // Nom de l'équipe (avec lien si l'équipe existe encore)
        echo "<td>";
        if ($currentTeamInfo) {
            echo "<a href='../ProTeam.php?Team={$currentTeamInfo['Number']}' class='team-name-link'>";
            echo "<strong>{$teamName}</strong>";
            echo "</a>";
        } else {
            echo "<strong>{$teamName}</strong> <small class='text-muted'>(inactive)</small>";
        }
        echo "</td>";
        
        // Statistiques
        echo "<td>{$team['GP']}</td>";
        echo "<td>{$team['W']}</td>";
        echo "<td>{$team['L']}</td>";
        
        if ($teams[0]['T'] > 0) echo "<td>{$team['T']}</td>";
        if ($teams[0]['OTW'] > 0) echo "<td>{$team['OTW']}</td>";
        if ($teams[0]['OTL'] > 0) echo "<td>{$team['OTL']}</td>";
        if ($teams[0]['SOW'] > 0) echo "<td>{$team['SOW']}</td>";
        if ($teams[0]['SOL'] > 0) echo "<td>{$team['SOL']}</td>";
        
        echo "<td><strong>{$team['Points']}</strong></td>";
        echo "<td>{$team['GF']}</td>";
        echo "<td>{$team['GA']}</td>";
        
        $differential = $team['GF'] - $team['GA'];
        $diffClass = $differential > 0 ? 'text-success' : ($differential < 0 ? 'text-danger' : '');
        echo "<td class='{$diffClass}'>";
        echo $differential > 0 ? "+{$differential}" : $differential;
        echo "</td>";
        
        echo "</tr>";
        $position++;
    }
    
    echo "</tbody>";
    echo "</table>";
    
    // Statistiques supplémentaires
    echo "<div class='historical-stats-summary'>";
    echo "<h4>Statistiques de la saison {$year}</h4>";
    echo "<div class='row'>";
    
    // Calculs des totaux
    $totalGames = array_sum(array_column($teams, 'GP'));
    $totalGoals = array_sum(array_column($teams, 'GF'));
    $avgGoalsPerGame = $totalGames > 0 ? round($totalGoals / $totalGames, 2) : 0;
    
    echo "<div class='col-md-4'>";
    echo "<div class='stat-card'>";
    echo "<h5>Total des matchs</h5>";
    echo "<p class='stat-number'>{$totalGames}</p>";
    echo "</div>";
    echo "</div>";
    
    echo "<div class='col-md-4'>";
    echo "<div class='stat-card'>";
    echo "<h5>Total des buts</h5>";
    echo "<p class='stat-number'>{$totalGoals}</p>";
    echo "</div>";
    echo "</div>";
    
    echo "<div class='col-md-4'>";
    echo "<div class='stat-card'>";
    echo "<h5>Buts par match</h5>";
    echo "<p class='stat-number'>{$avgGoalsPerGame}</p>";
    echo "</div>";
    echo "</div>";
    
    echo "</div>";
    echo "</div>";
    
    // CSS pour le tableau historique
    echo "<style>
    .historical-standings-table {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .historical-standings-table th {
        background: #007bff;
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 12px 8px;
        border: none;
    }
    
    .historical-standings-table td {
        text-align: center;
        padding: 10px 8px;
        border-bottom: 1px solid #dee2e6;
    }
    
    .historical-standings-table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .team-name-link {
        color: #007bff;
        text-decoration: none;
    }
    
    .team-name-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }
    
    .historical-stats-summary {
        margin-top: 30px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
    }
    
    .stat-card {
        text-align: center;
        padding: 15px;
        background: white;
        border-radius: 6px;
        margin-bottom: 15px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .stat-card h5 {
        margin-bottom: 10px;
        color: #495057;
        font-size: 14px;
    }
    
    .stat-number {
        font-size: 24px;
        font-weight: bold;
        color: #007bff;
        margin: 0;
    }
    
    .text-success {
        color: #28a745 !important;
    }
    
    .text-danger {
        color: #dc3545 !important;
    }
    
    .text-muted {
        color: #6c757d !important;
    }
    </style>";
    
    $careerDB->close();
    $currentDB->close();
    
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>";
    echo "<i class='fas fa-exclamation-triangle'></i> ";
    echo "Erreur lors du chargement des données : " . $e->getMessage();
    echo "</div>";
}
?>
