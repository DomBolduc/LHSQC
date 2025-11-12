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

    // Logo d'équipe centré
    echo "<td style='text-align: center;'>";
    if (isset($row['TeamThemeID']) && $row['TeamThemeID'] > 0) {
        echo "<img src='{$ImagesCDNPath}/images/{$row['TeamThemeID']}.png' alt='{$row['Name']}' class='team-logo'>";
    }
    echo "</td>";

    // Nom d'équipe
    echo "<td>";
    echo "<span class='team-name'>{$row['Name']}</span>";
    echo "</td>";

    // Statistiques
    echo "<td>{$row['GP']}</td>";
    echo "<td class='stat-highlight'>{$row['W']}</td>";
    echo "<td>{$row['L']}</td>";
    echo "<td>{$row['OTL']}</td>";
    echo "<td class='points-column'>{$row['Points']}</td>";

    echo "</tr>";
}

// Fonction pour afficher le format Wild Card
function displayWildCardStandings($db, $side, $Conference, $Division, $DivisionNumbers, $TypeText, $TypeTextTeam, $LeagueGeneral, $ColumnPerTable, $DatabaseFile, $ImagesCDNPath) {
    $conferenceIndex = $side; // 0 pour Conf 1, 1 pour Conf 2
    $divisionIndexes = ($side == 0) ? [0, 1] : [2, 3]; // Divisions pour cette conférence

    $allTeamsInConference = array();

    // 1. Afficher les top 3 de chaque division et collecter toutes les équipes
    foreach ($divisionIndexes as $i) {
        echo '<tr><td class="division-header" colspan="' . $ColumnPerTable . '">' . $Division[$i] . '</td></tr>';

        $Query = "SELECT Team{$TypeTextTeam}Stat.*, Team{$TypeText}Info.Name, Team{$TypeText}Info.TeamThemeID, Team{$TypeText}Info.DivisionNumber
            FROM Team{$TypeTextTeam}Stat
            INNER JOIN Team{$TypeText}Info ON Team{$TypeTextTeam}Stat.Number = Team{$TypeText}Info.Number
            INNER JOIN RankingOrder ON Team{$TypeTextTeam}Stat.Number = RankingOrder.Team{$TypeText}Number
            WHERE Team{$TypeText}Info.DivisionNumber = {$DivisionNumbers[$i]}
            AND Team{$TypeText}Info.Conference = '{$Conference[$conferenceIndex]}'
            AND RankingOrder.Type = 0
            ORDER BY RankingOrder.TeamOrder";

        $Standing = $db->query($Query);
        $LoopCount = 0;
        $divisionTeams = array();

        while ($row = $Standing->fetchArray()) {
            $LoopCount++;
            $divisionTeams[] = $row;
            $allTeamsInConference[] = $row;

            // Afficher seulement les 3 premiers de chaque division
            if ($LoopCount <= 3) {
                PrintModernStandingTableRow($row, $TypeText, true, $LeagueGeneral, $LoopCount, $DatabaseFile, $ImagesCDNPath);
            }
        }

        if ($LoopCount == 0) {
            printEmptyStandings($db, $DivisionNumbers[$i], $Conference[$conferenceIndex], $ColumnPerTable, $TypeTextTeam);
        }
    }

    // 2. Calculer les Wild Cards en utilisant directement RankingOrder pour la conférence
    $wildCardTeams = array();

    // Récupérer toutes les équipes de la conférence triées selon RankingOrder
    $rankingType = $conferenceIndex + 1; // Type 1 pour Conf 1, Type 2 pour Conf 2
    $Query = "SELECT Team{$TypeTextTeam}Stat.*, Team{$TypeText}Info.Name, Team{$TypeText}Info.TeamThemeID, Team{$TypeText}Info.DivisionNumber, RankingOrder.TeamOrder
        FROM Team{$TypeTextTeam}Stat
        INNER JOIN Team{$TypeText}Info ON Team{$TypeTextTeam}Stat.Number = Team{$TypeText}Info.Number
        INNER JOIN RankingOrder ON Team{$TypeTextTeam}Stat.Number = RankingOrder.Team{$TypeText}Number
        WHERE Team{$TypeText}Info.Conference = '{$Conference[$conferenceIndex]}'
        AND RankingOrder.Type = {$rankingType}
        ORDER BY RankingOrder.TeamOrder";

    $ConferenceStanding = $db->query($Query);
    $conferenceTeams = array();
    while ($row = $ConferenceStanding->fetchArray()) {
        $conferenceTeams[] = $row;
    }

    // Identifier les équipes qui ne sont pas dans le top 3 de leur division
    foreach ($conferenceTeams as $team) {
        // Compter combien d'équipes de la même division sont mieux classées
        $betterInDivision = 0;
        foreach ($conferenceTeams as $otherTeam) {
            if ($otherTeam['DivisionNumber'] == $team['DivisionNumber'] &&
                $otherTeam['TeamOrder'] < $team['TeamOrder']) {
                $betterInDivision++;
            }
        }

        // Si l'équipe n'est pas dans le top 3 de sa division, elle peut être Wild Card
        if ($betterInDivision >= 3) {
            $wildCardTeams[] = $team;
        }
    }

    if (count($wildCardTeams) > 0) {
        echo '<tr><td class="division-header" colspan="' . $ColumnPerTable . '">Wild Card</td></tr>';

        for ($i = 0; $i < min(2, count($wildCardTeams)); $i++) {
            // Les Wild Cards sont numérotées WC1 et WC2
            $wildCardPosition = "WC" . ($i + 1);
            echo "<tr>";
            echo "<td><span class='position-indicator position-wildcard'>{$wildCardPosition}</span></td>";
            echo "<td style='text-align: center;'>";
            if (isset($wildCardTeams[$i]['TeamThemeID']) && $wildCardTeams[$i]['TeamThemeID'] > 0) {
                echo "<img src='{$ImagesCDNPath}/images/{$wildCardTeams[$i]['TeamThemeID']}.png' alt='{$wildCardTeams[$i]['Name']}' class='team-logo'>";
            }
            echo "</td>";
            echo "<td><span class='team-name'>{$wildCardTeams[$i]['Name']}</span></td>";
            echo "<td>{$wildCardTeams[$i]['GP']}</td>";
            echo "<td class='stat-highlight'>{$wildCardTeams[$i]['W']}</td>";
            echo "<td>{$wildCardTeams[$i]['L']}</td>";
            echo "<td>{$wildCardTeams[$i]['OTL']}</td>";
            echo "<td class='points-column'>{$wildCardTeams[$i]['Points']}</td>";
            echo "</tr>";
        }

        // 4. Afficher les équipes restantes (hors playoffs)
        if (count($wildCardTeams) > 2) {
            echo '<tr><td class="division-header" colspan="' . $ColumnPerTable . '">Hors Playoffs</td></tr>';

            for ($i = 2; $i < count($wildCardTeams); $i++) {
                $position = $i + 7; // Position globale dans la conférence (6 en playoffs + position)
                echo "<tr>";
                echo "<td><span class='position-indicator position-eliminated'>{$position}</span></td>";
                echo "<td style='text-align: center;'>";
                if (isset($wildCardTeams[$i]['TeamThemeID']) && $wildCardTeams[$i]['TeamThemeID'] > 0) {
                    echo "<img src='{$ImagesCDNPath}/images/{$wildCardTeams[$i]['TeamThemeID']}.png' alt='{$wildCardTeams[$i]['Name']}' class='team-logo'>";
                }
                echo "</td>";
                echo "<td><span class='team-name'>{$wildCardTeams[$i]['Name']}</span></td>";
                echo "<td>{$wildCardTeams[$i]['GP']}</td>";
                echo "<td class='stat-highlight'>{$wildCardTeams[$i]['W']}</td>";
                echo "<td>{$wildCardTeams[$i]['L']}</td>";
                echo "<td>{$wildCardTeams[$i]['OTL']}</td>";
                echo "<td class='points-column'>{$wildCardTeams[$i]['Points']}</td>";
                echo "</tr>";
            }
        }
    }
}
?>