<?php
function printEmptyStandings($db, $division, $conference, $ColumnPerTable, $TypeTextTeam = "Pro") {
    $table = ($TypeTextTeam === "Farm") ? "TeamFarmInfo" : "TeamProInfo";
    $teams = [];
    $res = $db->query("SELECT Name, DivisionNumber, Conference FROM $table WHERE LOWER(DivisionNumber) = LOWER('$division') AND Conference = '$conference'");
    while ($row = $res->fetchArray()) {
        $teams[] = $row['Name'];
    }
    if (count($teams) == 0) {
        $res = $db->query("SELECT Name FROM $table WHERE Conference = '$conference'");
        while ($row = $res->fetchArray()) {
            $teams[] = $row['Name'];
        }
    }
    foreach ($teams as $team) {
        echo "<tr>
            <td>0</td>
            <td>$team</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>";
    }
}
?>
<?php
function PrintStandingTableRow($row, $TypeText, $showPO, $LeagueGeneral, $LoopCount, $DatabaseFile, $ImagesCDNPath) {
    echo "<tr>";
    echo "<td>{$LoopCount}</td>";
    echo "<td>{$row['Name']}</td>";
    echo "<td>{$row['GP']}</td>";
    echo "<td>{$row['W']}</td>";
    echo "<td>{$row['L']}</td>";
    echo "<td>{$row['OTL']}</td>";
    echo "<td>{$row['Points']}</td>";
    echo "</tr>";
}
?>