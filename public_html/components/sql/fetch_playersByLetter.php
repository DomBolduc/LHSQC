<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

$DatabaseFile = '../../LHSQC-STHS.db';

$db = new SQLite3($DatabaseFile);

// Récupération des paramètres
$selectedLetter = isset($_GET['letter']) ? $_GET['letter'] : 'A';
$selectedTeam = isset($_GET['team']) ? (int)$_GET['team'] : -1;

// Construction de la requête avec filtres
$teamFilter = $selectedTeam >= 0 ? "AND Team = $selectedTeam" : "";

// Gestion du filtre par lettre
if ($selectedLetter === 'ALL') {
    $letterFilter = ""; // Pas de filtre par lettre pour "ALL"
} else {
    $letterFilter = "AND Name LIKE '" . $db->escapeString($selectedLetter) . "%'";
}

// Requête pour les joueurs
$playerQuery = "SELECT 
    Number, Name, Team, TeamName, ProTeamName, TeamThemeID, Age, AgeDate, 
    URLLink, NHLID, DraftYear, DraftOverallPick, Jersey, 
    PosC, PosLW, PosRW, PosD, 'False' AS PosG, Retire 
FROM PlayerInfo 
WHERE Retire = 'False' $teamFilter $letterFilter 
ORDER BY Name ASC";

$playerResult = $db->query($playerQuery);
$players = [];
while ($row = $playerResult->fetchArray(SQLITE3_ASSOC)) {
    $players[] = $row;
}

// Requête pour les gardiens
$goalieQuery = "SELECT 
    Number, Name, Team, TeamName, ProTeamName, TeamThemeID, Age, AgeDate, 
    URLLink, NHLID, DraftYear, DraftOverallPick, Jersey, 
    'False' AS PosC, 'False' AS PosLW, 'False' AS PosRW, 'False' AS PosD, 'True' AS PosG, Retire 
FROM GoalerInfo 
WHERE Retire = 'False' $teamFilter $letterFilter 
ORDER BY Name ASC";

$goalieResult = $db->query($goalieQuery);
$goalies = [];
while ($row = $goalieResult->fetchArray(SQLITE3_ASSOC)) {
    $goalies[] = $row;
}

// Combiner les résultats
$allPlayers = array_merge($players, $goalies);

// Trier par nom
usort($allPlayers, function($a, $b) {
    return strcasecmp($a['Name'], $b['Name']);
});

$db->close();

// Format filtered data as JSON
echo json_encode($allPlayers);
?>
