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

function PrintModernStandingTableRow($row, $TypeText, $showPO, $LeagueGeneral, $LoopCount, $DatabaseFile, $ImagesCDNPath) {
    // Déterminer la classe de position pour les playoffs
    $positionClass = 'position-regular';
    if ($LoopCount <= 3) {
        $positionClass = 'position-playoff';
    } elseif ($LoopCount <= 8) {
        $positionClass = 'position-wildcard';
    }

    echo "<tr>";

    // Position avec indicateur coloré
    echo "<td>";
    echo "<span class='position-indicator {$positionClass}'>{$LoopCount}</span>";
    echo "</td>";

    // Nom d'équipe avec logo
    echo "<td>";
    echo "<div class='team-info'>";
    if (isset($row['TeamThemeID']) && $row['TeamThemeID'] > 0) {
        echo "<img src='{$ImagesCDNPath}/images/{$row['TeamThemeID']}.png' alt='{$row['Name']}' class='team-logo'>";
    }
    echo "<span class='team-name'>{$row['Name']}</span>";
    echo "</div>";
    echo "</td>";

    // Statistiques
    echo "<td>{$row['GP']}</td>";
    echo "<td class='stat-highlight'>{$row['W']}</td>";
    echo "<td>{$row['L']}</td>";
    echo "<td>{$row['OTL']}</td>";
    echo "<td class='points-column'>{$row['Points']}</td>";

    echo "</tr>";
}
?>