<?php

// Inclusion du CSS moderne
echo '<link rel="stylesheet" href="css/components/standings-card.css">';

include_once 'StandingsCardTools.php';

$lang = $lang ?? "fr";
if ($lang == "fr") {
    include 'LanguageFR-League.php';
    include 'LanguageFR-Stat.php';
} else {
    include 'LanguageEN-League.php';
    include 'LanguageEN-Stat.php';
}

$TypeText = "Pro";
$TitleType = $DynamicTitleLang['Pro'];
$TypeTextTeam = "Pro";
$LeagueName = "";
$ColumnPerTable = 8; // PO, Logo, Team, GP, W, L, OTL, P

if (isset($_GET['Farm'])) {
    $TypeText = "Farm";
    $TypeTextTeam = "Farm";
    $TitleType = $DynamicTitleLang['Farm'];
}

$db = new SQLite3($DatabaseFile);

$Query = "SELECT Name, {$TypeText}ConferenceName1 AS ConferenceName1, {$TypeText}ConferenceName2 AS ConferenceName2, 
    {$TypeText}DivisionName1 AS DivisionName1, {$TypeText}DivisionName2 AS DivisionName2, 
    {$TypeText}DivisionName4 AS DivisionName4, {$TypeText}DivisionName5 AS DivisionName5, 
    PlayOffStarted, PlayOffWinner{$TypeText} AS PlayOffWinner, PlayOffRound FROM LeagueGeneral";
$LeagueGeneral = $db->querySingle($Query, true);
$LeagueName = $LeagueGeneral['Name'];
$Conference = [$LeagueGeneral['ConferenceName1'], $LeagueGeneral['ConferenceName2']];
$Division = [
    $LeagueGeneral['DivisionName1'], // Conf 1 - Division 1
    $LeagueGeneral['DivisionName2'], // Conf 1 - Division 2
    $LeagueGeneral['DivisionName4'], // Conf 2 - Division 4
    $LeagueGeneral['DivisionName5']  // Conf 2 - Division 5
];
$DivisionNumbers = [1, 2, 4, 5];

$Playoff = ($LeagueGeneral['PlayOffStarted'] === "True");
$cardName = ($side == 0) ? $Conference[0] : $Conference[1];

// DEBUG
echo "<!-- Division attendue par le code : ";
if ($side == 0) {
    echo $Division[0] . " / " . $Division[1];
} else {
    echo $Division[2] . " / " . $Division[3];
}
echo " -->";
$table = ($TypeTextTeam === "Farm") ? "TeamFarmInfo" : "TeamProInfo";
$res = $db->query("SELECT DISTINCT DivisionNumber FROM $table");
echo "<!-- Divisions dans la base : ";
while ($row = $res->fetchArray()) {
    echo "[" . $row['DivisionNumber'] . "] ";
}
echo "-->";

?>

<div class="standings-card">
    <div class="standings-header"><?= $cardName ?></div>
    <div class="standings-content">
        <table class="standings-table">
            <thead>
                <tr>
                    <th>PO</th>
                    <th style="width: 40px; text-align: center;">Logo</th>
                    <th><?= $TeamLang['TeamName'] ?></th>
                    <th>GP</th>
                    <th>W</th>
                    <th>L</th>
                    <th>OTL</th>
                    <th>P</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Appeler la fonction pour afficher les standings en format Wild Card
                displayWildCardStandings($db, $side, $Conference, $Division, $DivisionNumbers, $TypeText, $TypeTextTeam, $LeagueGeneral, $ColumnPerTable, $DatabaseFile, $ImagesCDNPath);
                ?>
            </tbody>
        </table>
    </div>
</div>