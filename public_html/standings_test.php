<?php
// Inclure les fichiers nécessaires
include "Header.php";
$lang = "fr";
include $lang == "fr" ? 'LanguageFR-League.php' : 'LanguageEN-League.php';

// Variables principales
$DatabaseFile = 'LHSQC-STHS.db';
$TypeTextTeam = "Pro";

// Connexion à la base de données
$db = new SQLite3($DatabaseFile);

// Charger les informations de la ligue
$leagueGeneralQuery = "SELECT * FROM LeagueGeneral";
$LeagueGeneral = $db->querySingle($leagueGeneralQuery, true);

// Vérification des conférences et divisions
$conference1 = $LeagueGeneral['ProConferenceName1'] ?? 'Conference 1';
$conference2 = $LeagueGeneral['ProConferenceName2'] ?? 'Conference 2';
$division1 = $LeagueGeneral['ProDivisionName1'] ?? 'Division 1';
$division2 = $LeagueGeneral['ProDivisionName2'] ?? 'Division 2';

// Fonction pour générer un tableau HTML
function generateStandingsTable($data) {
    $output = '<table class="table table-striped table-bordered"><thead class="table-dark">';
    $output .= '<tr><th>Rank</th><th>Team</th><th>GP</th><th>W</th><th>L</th><th>OTL</th><th>PTS</th><th>GF</th><th>GA</th></tr>';
    $output .= '</thead><tbody>';
    
    $rank = 1;
    while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
        $output .= '<tr>';
        $output .= '<td>' . $rank++ . '</td>';
        $output .= '<td>' . htmlspecialchars($row['TeamName']) . '</td>';
        $output .= '<td>' . $row['GP'] . '</td>';
        $output .= '<td>' . $row['W'] . '</td>';
        $output .= '<td>' . $row['L'] . '</td>';
        $output .= '<td>' . $row['OTL'] . '</td>';
        $output .= '<td>' . $row['Points'] . '</td>';
        $output .= '<td>' . $row['GF'] . '</td>';
        $output .= '<td>' . $row['GA'] . '</td>';
        $output .= '</tr>';
    }

    $output .= '</tbody></table>';
    return $output;
}

// Requêtes pour les standings globaux
$overallQuery = "SELECT TeamProStat.*, TeamProInfo.Name AS TeamName, TeamProInfo.TeamThemeID 
                 FROM TeamProStat 
                 INNER JOIN TeamProInfo 
                 ON TeamProStat.Number = TeamProInfo.Number 
                 ORDER BY Points DESC";
$overallData = $db->query($overallQuery);
$overallStandings = generateStandingsTable($overallData);

// Requêtes pour les conférences
$conference1Query = "SELECT TeamProStat.*, TeamProInfo.Name AS TeamName, TeamProInfo.TeamThemeID 
                     FROM TeamProStat 
                     INNER JOIN TeamProInfo 
                     ON TeamProStat.Number = TeamProInfo.Number 
                     WHERE TeamProInfo.Conference = '$conference1' 
                     ORDER BY Points DESC";

$conference2Query = "SELECT TeamProStat.*, TeamProInfo.Name AS TeamName, TeamProInfo.TeamThemeID 
                     FROM TeamProStat 
                     INNER JOIN TeamProInfo 
                     ON TeamProStat.Number = TeamProInfo.Number 
                     WHERE TeamProInfo.Conference = '$conference2' 
                     ORDER BY Points DESC";

$conference1Data = $db->query($conference1Query);
$conference2Data = $db->query($conference2Query);

$conference1Standings = generateStandingsTable($conference1Data);
$conference2Standings = generateStandingsTable($conference2Data);

// Requêtes pour les 3 premiers de chaque division
$division1Query = "SELECT TeamProStat.*, TeamProInfo.Name AS TeamName, TeamProInfo.TeamThemeID 
                   FROM TeamProStat 
                   INNER JOIN TeamProInfo 
                   ON TeamProStat.Number = TeamProInfo.Number 
                   WHERE TeamProInfo.Division = '$division1' 
                   ORDER BY Points DESC 
                   LIMIT 3";
$division1Data = $db->query($division1Query);
$division1Standings = generateStandingsTable($division1Data);

$division2Query = "SELECT TeamProStat.*, TeamProInfo.Name AS TeamName, TeamProInfo.TeamThemeID 
                   FROM TeamProStat 
                   INNER JOIN TeamProInfo 
                   ON TeamProStat.Number = TeamProInfo.Number 
                   WHERE TeamProInfo.Division = '$division2' 
                   ORDER BY Points DESC 
                   LIMIT 3";
$division2Data = $db->query($division2Query);
$division2Standings = generateStandingsTable($division2Data);

// Requête pour toutes les autres équipes de la conférence 1
$otherTeamsQuery = "SELECT TeamProStat.*, TeamProInfo.Name AS TeamName, TeamProInfo.TeamThemeID 
                    FROM TeamProStat 
                    INNER JOIN TeamProInfo 
                    ON TeamProStat.Number = TeamProInfo.Number 
                    WHERE TeamProInfo.Conference = '$conference1' 
                    AND TeamProInfo.Division NOT IN ('$division1', '$division2') 
                    ORDER BY Points DESC";
$otherTeamsData = $db->query($otherTeamsQuery);
$otherTeamsStandings = generateStandingsTable($otherTeamsData);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Standings</h1>
    <ul class="nav nav-tabs" id="standings-tabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overall" type="button">Overall</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#conference" type="button">Conference</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#division" type="button">Division</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#conference-special" type="button">Conference 1 Special</button>
        </li>
    </ul>




    <div class="tab-content">
        <!-- Standings globaux -->
        <div class="tab-pane fade show active" id="overall">
            <?php echo $overallStandings; ?>
        </div>

        <!-- Standings par conférence -->
        <div class="tab-pane fade" id="conference">
            <h3><?php echo $conference1; ?></h3>
            <?php echo $conference1Standings; ?>
            <h3><?php echo $conference2; ?></h3>
            <?php echo $conference2Standings; ?>
        </div>

        <!-- Standings par division -->
        <div class="tab-pane fade" id="division">
            <?php
            foreach ($divisionStandings as $divisionName => $divisionTable) {
                echo "<h3>$divisionName</h3>";
                echo $divisionTable;
            }
            ?>
        </div>





    </div>

            


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
