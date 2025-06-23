<?php


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
$ColumnPerTable = 7; // PO, Team, GP, W, L, OTL, P

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

<div class="card shadow-0 px-0 mx-0 mb-3 frontpage-card top5Card">
    <div class="card-header"><?= $cardName ?></div>
    <div class="card-body mt-0 pt-1 px-0 mx-0 text-primary">
        <table class="table StandingsCard">
            <thead>
                <tr>
                    <th>PO</th>
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
                if ($side == 0) {
                    // Conférence 1 : Division 1 et 2
                    for ($i = 0; $i <= 1; $i++) {
                        echo '<tr class="static"><td class="staticTD" colspan="' . $ColumnPerTable . '">' . $Division[$i] . '</td></tr>';
                        $Query = "SELECT Team{$TypeTextTeam}Stat.*, Team{$TypeText}Info.Name
                            FROM Team{$TypeTextTeam}Stat
                            INNER JOIN Team{$TypeText}Info ON Team{$TypeTextTeam}Stat.Number = Team{$TypeText}Info.Number
                            WHERE Team{$TypeText}Info.DivisionNumber = {$DivisionNumbers[$i]}
                            AND Team{$TypeText}Info.Conference = '{$Conference[0]}'
                            ORDER BY Team{$TypeTextTeam}Stat.Points DESC";
                        $Standing = $db->query($Query);
                        $LoopCount = 0;
                        while ($row = $Standing->fetchArray()) {
                            $LoopCount++;
                            PrintStandingTableRow($row, $TypeText, true, $LeagueGeneral, $LoopCount, $DatabaseFile, $ImagesCDNPath);
                        }
                        if ($LoopCount == 0) printEmptyStandings($db, $DivisionNumbers[$i], $Conference[0], $ColumnPerTable, $TypeTextTeam);
                    }
                } else {
                    // Conférence 2 : Division 4 et 5
                    for ($i = 2; $i <= 3; $i++) {
                        echo '<tr class="static"><td class="staticTD" colspan="' . $ColumnPerTable . '">' . $Division[$i] . '</td></tr>';
                        $Query = "SELECT Team{$TypeTextTeam}Stat.*, Team{$TypeText}Info.Name
                            FROM Team{$TypeTextTeam}Stat
                            INNER JOIN Team{$TypeText}Info ON Team{$TypeTextTeam}Stat.Number = Team{$TypeText}Info.Number
                            WHERE Team{$TypeText}Info.DivisionNumber = {$DivisionNumbers[$i]}
                            AND Team{$TypeText}Info.Conference = '{$Conference[1]}'
                            ORDER BY Team{$TypeTextTeam}Stat.Points DESC";
                        $Standing = $db->query($Query);
                        $LoopCount = 0;
                        echo "<!-- Requête SQL : $Query -->";
                        while ($row = $Standing->fetchArray()) {
                            $LoopCount++;
                            PrintStandingTableRow($row, $TypeText, true, $LeagueGeneral, $LoopCount, $DatabaseFile, $ImagesCDNPath);
                            echo "<!-- Équipe trouvée : " . $row['Name'] . " -->";
                        }
                        if ($LoopCount == 0) printEmptyStandings($db, $DivisionNumbers[$i], $Conference[1], $ColumnPerTable, $TypeTextTeam);
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>