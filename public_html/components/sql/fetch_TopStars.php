<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
$DatabaseFile = '../../LHSQC-STHS.db';

$db = new SQLite3($DatabaseFile);
if ($db) {
    $LeagueOutputOption = [
        'ProMinimumGamePlayerLeader' => 10, // Example value; use your actual configuration
    ];

    $query = "SELECT PlayerProStat.G, PlayerProStat.A, PlayerProStat.P, PlayerProStat.GP, PlayerProStat.Name, PlayerProStat.Number, TeamProInfo.Abbre, TeamProInfo.TeamThemeID, PlayerInfo.NHLID
              FROM PlayerInfo
              INNER JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number
              LEFT JOIN TeamProInfo ON PlayerInfo.Team = TeamProInfo.Number
              WHERE PlayerProStat.GP >= " . $LeagueOutputOption['ProMinimumGamePlayerLeader'] . " AND PlayerInfo.Team > 0
              AND PlayerProStat.P > 0
              ORDER BY PlayerProStat.P DESC, PlayerProStat.G DESC, PlayerProStat.GP ASC
              LIMIT 5";

    $result = $db->query($query);
    if (!$result) {
        die('Query failed: ' . $db->lastErrorMsg());
    }

    $PlayerStats = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $PlayerStats[] = $row;
    }

    $db->close();
    echo json_encode($PlayerStats);
} else { 
    echo json_encode(["error" => "Error - db not defined when fetching Top stars"]); 
}
?>




