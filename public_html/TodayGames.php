<?php include "Header.php";

If ($lang == "fr"){include 'LanguageFR-League.php';}else{include 'LanguageEN-League.php';}

$LeagueName = (string)"";

$Title = (string)"";

If (file_exists($DatabaseFile) == false){

	Goto STHSErrorTodayGame;

}else{try{

	$db = new SQLite3($DatabaseFile);

	

	$Type = (integer)0; /* 0 = All / 1 = Pro / 2 = Farm */

	if(isset($_GET['Type'])){$Type = filter_var($_GET['Type'], FILTER_SANITIZE_NUMBER_INT);} 

	

	$Query = "Select Name, OutputName, DefaultSimulationPerDay, ScheduleNextDay, PointSystemSO, Today3StarPro, Today3StarFarm from LeagueGeneral";

	$LeagueGeneral = $db->querySingle($Query,true);		

	$LeagueName = $LeagueGeneral['Name'];

	

	$Query = "Select OutputGameHTMLToSQLiteDatabase from LeagueOutputOption";

	$LeagueOutputOption = $db->querySingle($Query,true);

	

	/* Pro Only, Farm Only or Both  */ 

	if($Type == 1){

		/* Pro Only */

		$Query = "SELECT TodayGame.* FROM TodayGame WHERE TodayGame.GameNumber Like 'Pro%'";

		$Title = $LeagueName . " - " . $ScheduleLang['TodayGamesTitle'] . $DynamicTitleLang['Pro'];

		$QuerySchedule = "SELECT SchedulePro.*, 'Pro' AS Type, TeamProStatVisitor.Last10W AS VLast10W, TeamProStatVisitor.Last10L AS VLast10L, TeamProStatVisitor.Last10T AS VLast10T, TeamProStatVisitor.Last10OTW AS VLast10OTW, TeamProStatVisitor.Last10OTL AS VLast10OTL, TeamProStatVisitor.Last10SOW AS VLast10SOW, TeamProStatVisitor.Last10SOL AS VLast10SOL, TeamProStatVisitor.GP AS VGP, TeamProStatVisitor.W AS VW, TeamProStatVisitor.L AS VL, TeamProStatVisitor.T AS VT, TeamProStatVisitor.OTW AS VOTW, TeamProStatVisitor.OTL AS VOTL, TeamProStatVisitor.SOW AS VSOW, TeamProStatVisitor.SOL AS VSOL, TeamProStatVisitor.Points AS VPoints, TeamProStatVisitor.Streak AS VStreak, TeamProStatHome.Last10W AS HLast10W, TeamProStatHome.Last10L AS HLast10L, TeamProStatHome.Last10T AS HLast10T, TeamProStatHome.Last10OTW AS HLast10OTW, TeamProStatHome.Last10OTL AS HLast10OTL, TeamProStatHome.Last10SOW AS HLast10SOW, TeamProStatHome.Last10SOL AS HLast10SOL, TeamProStatHome.GP AS HGP, TeamProStatHome.W AS HW, TeamProStatHome.L AS HL, TeamProStatHome.T AS HT, TeamProStatHome.OTW AS HOTW, TeamProStatHome.OTL AS HOTL, TeamProStatHome.SOW AS HSOW, TeamProStatHome.SOL AS HSOL, TeamProStatHome.Points AS HPoints, TeamProStatHome.Streak AS HStreak FROM (SchedulePRO LEFT JOIN TeamProStat AS TeamProStatHome ON SchedulePRO.HomeTeam = TeamProStatHome.Number) LEFT JOIN TeamProStat AS TeamProStatVisitor ON SchedulePRO.VisitorTeam = TeamProStatVisitor.Number WHERE DAY >= " . $LeagueGeneral['ScheduleNextDay'] . " AND DAY <= " . ($LeagueGeneral['ScheduleNextDay'] + $LeagueGeneral['DefaultSimulationPerDay'] -1) . " ORDER BY Day, GameNumber";

	}elseif($Type == 2){

		/* Farm Only */

		$Query = "SELECT TodayGame.* FROM TodayGame WHERE TodayGame.GameNumber Like 'Farm%'";

		$Title = $LeagueName . " - " . $ScheduleLang['TodayGamesTitle'] .  $DynamicTitleLang['Farm'];

		$QuerySchedule = "SELECT ScheduleFarm.*, 'Farm' AS Type, TeamFarmStatVisitor.Last10W AS VLast10W, TeamFarmStatVisitor.Last10L AS VLast10L, TeamFarmStatVisitor.Last10T AS VLast10T, TeamFarmStatVisitor.Last10OTW AS VLast10OTW, TeamFarmStatVisitor.Last10OTL AS VLast10OTL, TeamFarmStatVisitor.Last10SOW AS VLast10SOW, TeamFarmStatVisitor.Last10SOL AS VLast10SOL, TeamFarmStatVisitor.GP AS VGP, TeamFarmStatVisitor.W AS VW, TeamFarmStatVisitor.L AS VL, TeamFarmStatVisitor.T AS VT, TeamFarmStatVisitor.OTW AS VOTW, TeamFarmStatVisitor.OTL AS VOTL, TeamFarmStatVisitor.SOW AS VSOW, TeamFarmStatVisitor.SOL AS VSOL, TeamFarmStatVisitor.Points AS VPoints, TeamFarmStatVisitor.Streak AS VStreak, TeamFarmStatHome.Last10W AS HLast10W, TeamFarmStatHome.Last10L AS HLast10L, TeamFarmStatHome.Last10T AS HLast10T, TeamFarmStatHome.Last10OTW AS HLast10OTW, TeamFarmStatHome.Last10OTL AS HLast10OTL, TeamFarmStatHome.Last10SOW AS HLast10SOW, TeamFarmStatHome.Last10SOL AS HLast10SOL, TeamFarmStatHome.GP AS HGP, TeamFarmStatHome.W AS HW, TeamFarmStatHome.L AS HL, TeamFarmStatHome.T AS HT, TeamFarmStatHome.OTW AS HOTW, TeamFarmStatHome.OTL AS HOTL, TeamFarmStatHome.SOW AS HSOW, TeamFarmStatHome.SOL AS HSOL, TeamFarmStatHome.Points AS HPoints, TeamFarmStatHome.Streak AS HStreak FROM (ScheduleFarm LEFT JOIN TeamFarmStat AS TeamFarmStatHome ON ScheduleFarm.HomeTeam = TeamFarmStatHome.Number) LEFT JOIN TeamFarmStat AS TeamFarmStatVisitor ON ScheduleFarm.HomeTeam = TeamFarmStatVisitor.Number WHERE DAY >= " . $LeagueGeneral['ScheduleNextDay'] . " AND DAY <= " . ($LeagueGeneral['ScheduleNextDay'] + $LeagueGeneral['DefaultSimulationPerDay'] -1) . " ORDER BY Day, GameNumber";

	}else{

		/* Both */

		$Query = "SELECT TodayGame.*, substr(TodayGame.GameNumber,1,3) AS Type FROM TodayGame ORDER BY TYPE DESC, GameNumber";

		$Title = $LeagueName . " - " . $ScheduleLang['TodayGamesTitle'];

		$QuerySchedule = "Select ProSchedule.*, 'Pro' AS Type FROM (SELECT TeamProStatVisitor.Last10W AS VLast10W, TeamProStatVisitor.Last10L AS VLast10L, TeamProStatVisitor.Last10T AS VLast10T, TeamProStatVisitor.Last10OTW AS VLast10OTW, TeamProStatVisitor.Last10OTL AS VLast10OTL, TeamProStatVisitor.Last10SOW AS VLast10SOW, TeamProStatVisitor.Last10SOL AS VLast10SOL, TeamProStatVisitor.GP AS VGP, TeamProStatVisitor.W AS VW, TeamProStatVisitor.L AS VL, TeamProStatVisitor.T AS VT, TeamProStatVisitor.OTW AS VOTW, TeamProStatVisitor.OTL AS VOTL, TeamProStatVisitor.SOW AS VSOW, TeamProStatVisitor.SOL AS VSOL, TeamProStatVisitor.Points AS VPoints, TeamProStatVisitor.Streak AS VStreak, TeamProStatHome.Last10W AS HLast10W, TeamProStatHome.Last10L AS HLast10L, TeamProStatHome.Last10T AS HLast10T, TeamProStatHome.Last10OTW AS HLast10OTW, TeamProStatHome.Last10OTL AS HLast10OTL, TeamProStatHome.Last10SOW AS HLast10SOW, TeamProStatHome.Last10SOL AS HLast10SOL, TeamProStatHome.GP AS HGP, TeamProStatHome.W AS HW, TeamProStatHome.L AS HL, TeamProStatHome.T AS HT, TeamProStatHome.OTW AS HOTW, TeamProStatHome.OTL AS HOTL, TeamProStatHome.SOW AS HSOW, TeamProStatHome.SOL AS HSOL, TeamProStatHome.Points AS HPoints, TeamProStatHome.Streak AS HStreak, SchedulePro.* FROM (SchedulePRO LEFT JOIN TeamProStat AS TeamProStatHome ON SchedulePRO.HomeTeam = TeamProStatHome.Number) LEFT JOIN TeamProStat AS TeamProStatVisitor ON SchedulePRO.VisitorTeam = TeamProStatVisitor.Number WHERE DAY >= " . $LeagueGeneral['ScheduleNextDay'] . " AND DAY <= " . ($LeagueGeneral['ScheduleNextDay'] + $LeagueGeneral['DefaultSimulationPerDay'] -1) . ") AS ProSchedule  UNION ALL Select FarmSchedule.*, 'Farm' AS Type FROM (SELECT TeamFarmStatVisitor.Last10W AS VLast10W, TeamFarmStatVisitor.Last10L AS VLast10L, TeamFarmStatVisitor.Last10T AS VLast10T, TeamFarmStatVisitor.Last10OTW AS VLast10OTW, TeamFarmStatVisitor.Last10OTL AS VLast10OTL, TeamFarmStatVisitor.Last10SOW AS VLast10SOW, TeamFarmStatVisitor.Last10SOL AS VLast10SOL, TeamFarmStatVisitor.GP AS VGP, TeamFarmStatVisitor.W AS VW, TeamFarmStatVisitor.L AS VL, TeamFarmStatVisitor.T AS VT, TeamFarmStatVisitor.OTW AS VOTW, TeamFarmStatVisitor.OTL AS VOTL, TeamFarmStatVisitor.SOW AS VSOW, TeamFarmStatVisitor.SOL AS VSOL, TeamFarmStatVisitor.Points AS VPoints, TeamFarmStatVisitor.Streak AS VStreak, TeamFarmStatHome.Last10W AS HLast10W, TeamFarmStatHome.Last10L AS HLast10L, TeamFarmStatHome.Last10T AS HLast10T, TeamFarmStatHome.Last10OTW AS HLast10OTW, TeamFarmStatHome.Last10OTL AS HLast10OTL, TeamFarmStatHome.Last10SOW AS HLast10SOW, TeamFarmStatHome.Last10SOL AS HLast10SOL, TeamFarmStatHome.GP AS HGP, TeamFarmStatHome.W AS HW, TeamFarmStatHome.L AS HL, TeamFarmStatHome.T AS HT, TeamFarmStatHome.OTW AS HOTW, TeamFarmStatHome.OTL AS HOTL, TeamFarmStatHome.SOW AS HSOW, TeamFarmStatHome.SOL AS HSOL, TeamFarmStatHome.Points AS HPoints, TeamFarmStatHome.Streak AS HStreak, ScheduleFarm.* FROM (ScheduleFarm LEFT JOIN TeamFarmStat AS TeamFarmStatHome ON ScheduleFarm.HomeTeam = TeamFarmStatHome.Number) LEFT JOIN TeamFarmStat AS TeamFarmStatVisitor ON ScheduleFarm.VisitorTeam = TeamFarmStatVisitor.Number WHERE DAY >= " . $LeagueGeneral['ScheduleNextDay'] . " AND DAY <= " . ($LeagueGeneral['ScheduleNextDay'] + $LeagueGeneral['DefaultSimulationPerDay'] -1) . ") AS FarmSchedule ORDER BY Day, Type DESC, GameNumber";

	}

	$TodayGame = $db->query($Query);

	$Schedule = $db->query($QuerySchedule);

	

	$Query = "SELECT Count(TodayGame.GameNumber) AS GameInTable FROM TodayGame";

	$TodayGameCount = $db->querySingle($Query,True);

} catch (Exception $e) {

STHSErrorTodayGame:	

	$LeagueName = $DatabaseNotFound;

	$TodayGame = Null;

	$LeagueGeneral = Null;

	$TodayGameCount = Null;

	$LeagueOutputOption = Null;

	echo "<title>" . $DatabaseNotFound . "</title>";

}}

echo "<title>" . $Title . "</title>";


?>


<div>

<?php

Function PrintGames($Row, $ScheduleLang, $LeagueOutputOption, $ImagesCDNPath) {
    echo "<div class=\"game-card\">";

    // En-tête de la carte
    echo "<div class=\"game-header\">";
    echo "<div class=\"game-status\">" . $ScheduleLang['Games'];

    // Afficher la note seulement si elle ne contient pas d'informations sur la prolongation
    if ($Row['Note'] != "" &&
        !stripos($Row['Note'], 'overtime') &&
        !stripos($Row['Note'], 'shootout') &&
        !stripos($Row['Note'], 'OT') &&
        !stripos($Row['Note'], 'SO')) {
        echo " - " . $Row['Note'];
    }
    echo "</div>";

    // Déterminer le statut du match (Final, Final (OT), Final (SO))
    $gameStatus = "Final";
    if (isset($Row['Shootout']) && $Row['Shootout'] == 'True') {
        $gameStatus .= " (SO)";
    } elseif (isset($Row['Overtime']) && $Row['Overtime'] == 'True') {
        $gameStatus .= " (OT)";
    }

    echo "<div class=\"game-time\">" . $gameStatus . "</div>";
    echo "</div>";

    // Contenu principal
    echo "<div class=\"game-content\">";
    echo "<div class=\"teams-container\">";

    // Équipe visiteuse
    echo "<div class=\"team-row\">";
    echo "<div class=\"team-info\">";
    if ($Row['VisitorTeamThemeID'] > 0) {
        echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Row['VisitorTeamThemeID'] . ".png\" alt=\"\" class=\"team-logo\" />";
    }
    echo "<div>";
    echo "<div class=\"team-name\">" . $Row['VisitorTeam'] . "</div>";
    echo "</div>";
    echo "</div>";

    $visitorScoreClass = ($Row['VisitorTeamScore'] > $Row['HomeTeamScore']) ? "team-score winner" : "team-score";
    echo "<div class=\"$visitorScoreClass\">" . $Row['VisitorTeamScore'] . "</div>";
    echo "</div>";

    // Équipe à domicile
    echo "<div class=\"team-row\">";
    echo "<div class=\"team-info\">";
    if ($Row['HomeTeamThemeID'] > 0) {
        echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Row['HomeTeamThemeID'] . ".png\" alt=\"\" class=\"team-logo\" />";
    }
    echo "<div>";
    echo "<div class=\"team-name\">" . $Row['HomeTeam'] . "</div>";
    echo "</div>";
    echo "</div>";

    $homeScoreClass = ($Row['HomeTeamScore'] > $Row['VisitorTeamScore']) ? "team-score winner" : "team-score";
    echo "<div class=\"$homeScoreClass\">" . $Row['HomeTeamScore'] . "</div>";
    echo "</div>";

    echo "</div>"; // fin teams-container

    // Section 3 étoiles
    if (!empty($Row['Star1']) || !empty($Row['Star2']) || !empty($Row['Star3'])) {
        echo "<div class=\"stars-section\">";
        echo "<div class=\"stars-title\">3 Stars</div>";

        if (!empty($Row['Star1'])) {
            echo "<div class=\"star-item\">";
            echo "<div class=\"star-icons\">";
            echo "<img src=\"" . $ImagesCDNPath . "/images/Star.png\" alt=\"Star\" class=\"star-icon\" />";
            echo "</div>";
            echo "<div class=\"star-player\">" . $Row['Star1'] . "</div>";
            echo "</div>";
        }

        if (!empty($Row['Star2'])) {
            echo "<div class=\"star-item\">";
            echo "<div class=\"star-icons\">";
            echo "<img src=\"" . $ImagesCDNPath . "/images/Star.png\" alt=\"Star\" class=\"star-icon\" />";
            echo "<img src=\"" . $ImagesCDNPath . "/images/Star.png\" alt=\"Star\" class=\"star-icon\" />";
            echo "</div>";
            echo "<div class=\"star-player\">" . $Row['Star2'] . "</div>";
            echo "</div>";
        }

        if (!empty($Row['Star3'])) {
            echo "<div class=\"star-item\">";
            echo "<div class=\"star-icons\">";
            echo "<img src=\"" . $ImagesCDNPath . "/images/Star.png\" alt=\"Star\" class=\"star-icon\" />";
            echo "<img src=\"" . $ImagesCDNPath . "/images/Star.png\" alt=\"Star\" class=\"star-icon\" />";
            echo "<img src=\"" . $ImagesCDNPath . "/images/Star.png\" alt=\"Star\" class=\"star-icon\" />";
            echo "</div>";
            echo "<div class=\"star-player\">" . $Row['Star3'] . "</div>";
            echo "</div>";
        }

        echo "</div>";
    }

    echo "</div>"; // fin game-content

    // Actions de la carte (lien BoxScore)
    echo "<div class=\"game-actions\">";
    if ($LeagueOutputOption['OutputGameHTMLToSQLiteDatabase'] == "True") {
        if (substr($Row['GameNumber'], 0, 3) == "Pro") {
            echo "<a href=\"Boxscore.php?Game=" . substr($Row['GameNumber'], 3) . "\" class=\"boxscore-link\">" . $ScheduleLang['BoxScore'] . "</a>";
        } elseif (substr($Row['GameNumber'], 0, 4) == "Farm") {
            echo "<a href=\"Boxscore.php?Game=" . substr($Row['GameNumber'], 4) . "&Farm\" class=\"boxscore-link\">" . $ScheduleLang['BoxScore'] . "</a>";
        }
    } else {
        echo "<a href=\"" . $Row['Link'] . "\" class=\"boxscore-link\">" . $ScheduleLang['BoxScore'] . "</a>";
    }
    echo "</div>";

    echo "</div>"; // fin game-card
}


?>

</div>


</head>
<body>
<link rel="stylesheet" href="css/components/today-games.css">
<?php include "components/GamesScroller.php"; ?>
<?php include "Menu.php";?>



<br />





<div class="today-games-container">

    <div class="today-games-header">
        <h1 class="today-games-title">SCORES</h1>
        <div class="today-games-subtitle">
            <?php
            if (isset($LeagueGeneralMenu)) {
                echo $ScheduleLang['LastUpdate'] . $LeagueGeneralMenu['DatabaseCreationDate'];
            }
            ?>
        </div>
    </div>

    <div class="games-grid">
        <?php
        $LoopCount = (integer)0;
        $BooFound = (boolean)False;

        if (empty($TodayGame) == false) {
            while ($Row = $TodayGame->fetchArray()) {
                $LoopCount += 1;

                If ($Row['Type'] == "Far" AND $BooFound == False) {
                    echo "</div>";
                    echo "<div class=\"section-divider\">";
                    echo "<h2 class=\"section-title\">Farm Games</h2>";
                    echo "</div>";
                    echo "<div class=\"games-grid\">";
                    $BooFound = True;
                }

                PrintGames($Row, $ScheduleLang, $LeagueOutputOption, $ImagesCDNPath);
            }
        }

        if ($LoopCount == 0) {
            echo "<div class=\"no-games-message\">";
            echo "<h3>" . $ScheduleLang['NoGameToday'] . "</h3>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="upcoming-games-section">
        <h2 class="section-title"><?php echo $ScheduleLang['NextGames'];?></h2>

        <div class="upcoming-games-table">
            <table class="table table-modern"><thead><tr>

<th title="Day" class="STHSW45"><?php echo $ScheduleLang['Day'];?></th>

<th title="Game Number" class="STHSW35"><?php echo $ScheduleLang['Game'];?></th>

<th title="Visitor Team" class="STHSW200"><?php echo $ScheduleLang['VisitorTeam'];?></th>

<th title="Home Team" class="STHSW200"><?php echo $ScheduleLang['HomeTeam'];?></th>

</tr></thead><tbody>

<?php

$TradeDeadLine = (boolean)False;

if (empty($Schedule) == false){while ($row = $Schedule ->fetchArray()) {

	echo "<tr><td>" . $row['Day']. "</td><td>";

	if($Type == 0){echo $row['Type'] . " - ";}

	echo  $row['GameNumber'] . "</td><td>";

	If ($row['VisitorTeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['VisitorTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTodayGameTeamImage\" />";}

	echo "<a href=\"" . $row['Type']  . "Team.php?Team=" . $row['VisitorTeam'] . "\">" . $row['VisitorTeamName']. "</a> (" . ($row['VW'] + $row['VOTW'] + $row['VSOW']) . "-";

	if ($LeagueGeneral['PointSystemSO'] == "True"){

		echo $row['VL'] . "-" . ($row['VOTL'] + $row['VSOL']);

		echo ") -- " . $ScheduleLang['Last10Games'] . " : (" . ($row['VLast10W'] + $row['VLast10OTW'] + $row['VLast10SOW']) . "-" . $row['VLast10L'] . "-" . ($row['VLast10OTL'] + $row['VLast10SOL']) . ") - " . $row['VStreak'];

	}else{

		echo ($row['VL'] + $row['VOTL'] + $row['VSOL']) . "-" . $row['VT'];

		echo ") -- " . $ScheduleLang['Last10Games'] ." : (" . ($row['VLast10W'] + $row['VLast10OTW'] + $row['VLast10SOW']) . "-" . ($row['VLast10L'] + $row['VLast10OTL'] + $row['VLast10SOL']) . "-" . $row['VLast10T'] . ")";

	}

	echo "</td><td>";

	If ($row['HomeTeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['HomeTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTodayGameTeamImage\" />";}	

	echo "<a href=\"" . $row['Type'] . "Team.php?Team=" . $row['HomeTeam'] . "\">" . $row['HomeTeamName']. "</a> (" . ($row['HW'] + $row['HOTW'] + $row['HSOW']) . "-";

	if ($LeagueGeneral['PointSystemSO'] == "True"){

		echo $row['HL'] . "-" . ($row['HOTL'] + $row['HSOL']);

		echo ") -- " . $ScheduleLang['Last10Games'] . " : (" . ($row['HLast10W'] + $row['HLast10OTW'] + $row['HLast10SOW']) . "-" . $row['HLast10L'] . "-" . ($row['HLast10OTL'] + $row['HLast10SOL']) . ") - " . $row['HStreak'];

	}else{

		echo ($row['HL'] + $row['HOTL'] + $row['HSOL']) . "-" . $row['HT'];

		echo ") -- " . $ScheduleLang['Last10Games'] ." : (" . ($row['HLast10W'] + $row['HLast10OTW'] + $row['HLast10SOW']) . "-" . ($row['HLast10L'] + $row['HLast10OTL'] + $row['HLast10SOL']) . "-" . $row['HLast10T'] . ")";

	}

	echo "</td>";

	echo "</tr>\n"; /* The \n is for a new line in the HTML Code */

}}

?>
            </tbody></table>
        </div>
    </div>
</div>



<?php include "Footer.php";?>

