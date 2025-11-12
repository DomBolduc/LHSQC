<?php include "Header.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($lang == "fr"){include 'LanguageFR-League.php';}else{include 'LanguageEN-League.php';}
if ($lang == "fr"){include 'LanguageFR-Stat.php';}else{include 'LanguageEN-Stat.php';}

$TypeText = (string)"Pro";$TitleType = $DynamicTitleLang['Pro'];
$TypeTextTeam = (string)"Pro";
$Playoff = (boolean)False;
$Title = (string)"";
$StandingQueryOK = (boolean)False;
$Search = (boolean)False;
$LeagueOutputOption = Null;
$ColumnPerTable = 18;

$Title = (string)"";
$LeagueName = (string)"";
if(isset($_GET['Farm'])){$TypeText = "Farm";$TypeTextTeam = (string)"Farm";$TitleType = $DynamicTitleLang['Farm'];}

$db = new SQLite3($DatabaseFile);

$Query = "Select Name, PointSystemW, PointSystemSO, NoOvertime, " . $TypeText . "ConferenceName1 AS ConferenceName1," . $TypeText . "ConferenceName2 AS ConferenceName2," . $TypeText . "DivisionName1 AS DivisionName1," . $TypeText . "DivisionName2 AS DivisionName2," . $TypeText . "DivisionName3 AS DivisionName3," . $TypeText . "DivisionName4 AS DivisionName4," . $TypeText . "DivisionName5 AS DivisionName5," . $TypeText . "DivisionName6 AS DivisionName6," . $TypeText . "HowManyPlayOffTeam AS HowManyPlayOffTeam," . $TypeText . "DivisionNewNHLPlayoff  AS DivisionNewNHLPlayoff,PlayOffWinner" . $TypeText . " AS PlayOffWinner, PlayOffStarted, PlayOffRound, TieBreaker2010, TieBreaker2019 FROM LeagueGeneral";
$LeagueGeneralNoType = $db->querySingle($Query,true);		

log2console($LeagueGeneralNoType);

$LeagueName = $LeagueGeneralNoType['Name'];
$Query = "Select StandardStandingOutput From LeagueOutputOption";
$LeagueOutputOption = $db->querySingle($Query,true);		
$Conference = array($LeagueGeneralNoType['ConferenceName1'], $LeagueGeneralNoType['ConferenceName2']);
$Division = array($LeagueGeneralNoType['DivisionName1'], $LeagueGeneralNoType['DivisionName2'], $LeagueGeneralNoType['DivisionName3'], $LeagueGeneralNoType['DivisionName4'], $LeagueGeneralNoType['DivisionName5'], $LeagueGeneralNoType['DivisionName6']);
$Query = "Select " . $TypeText . "TwoConference AS TwoConference from LeagueSimulation";
$LeagueSimulation = $db->querySingle($Query,true);	




if ($LeagueOutputOption['StandardStandingOutput'] == "False"){
    $ColumnPerTable = 21;
    if ($LeagueGeneralNoType['PointSystemSO'] == "False"){$ColumnPerTable = $ColumnPerTable -1;}
    if ($LeagueGeneralNoType['TieBreaker2019'] == "False"){$ColumnPerTable = $ColumnPerTable -1;}
    if ($LeagueGeneralNoType['TieBreaker2019'] == "False" AND $LeagueGeneralNoType['TieBreaker2010'] == "False"){$ColumnPerTable = $ColumnPerTable -1;}
}

if ($LeagueGeneralNoType['PlayOffStarted'] == "True")    {
    if(isset($_GET['Season'])){
        $Title = $StandingLang['Standing'] . " " . $TitleType;
        $TypeTextTeam = $TypeTextTeam . "Season";
    }else{
        $Title =$StandingLang['Playoff'] . " " . $TitleType;
        $Playoff = True;
    }
}else{
    $Title =$StandingLang['Standing'] . " " . $TitleType;
}

$StandingQueryOK = True;
echo "<title>" . $Title . "</title>";


function PrintStandingTop($TeamLang, $StandardStandingOutput, $LeagueGeneralNoType) {

    echo "<table class=\"table tablesorter STHSPHPStanding_Table\"><thead><tr>";
    echo "<th title=\"Position\" class=\"STHSW35\">PO</th>";
    echo "<th title=\"Team Name\" class=\"STHSW200\">" . $TeamLang['TeamName'] ."</th>";
    echo "<th title=\"Games Played\" class=\"STHSW30\">GP</th>";

    if ($StandardStandingOutput == "True"){
        echo "<th title=\"Wins\" class=\"STHSW30\">W</th>";
        echo "<th title=\"Loss\" class=\"STHSW30\">L</th>";
        echo "<th title=\"Overtime Loss\" class=\"STHSW30\">OTL</th>";
    }else{
        echo "<th title=\"Wins\" class=\"STHSW30\">W</th>";
        echo "<th title=\"Loss\" class=\"STHSW30\">L</th>";

        if ($LeagueGeneralNoType['PointSystemSO'] == "False"){echo "<th title=\"Ties\" class=\"STHSW30\">T</th>";}
        if ($LeagueGeneralNoType['NoOvertime'] == "True"){	
            echo "<th title=\"Overtime Wins\" class=\"STHSW30\">OTW</th>";
            echo "<th title=\"Overtime Loss\" class=\"STHSW30\">OTL</th>";
        }
        if ($LeagueGeneralNoType['PointSystemSO'] == "True"){	
            echo "<th title=\"Shutouts Wins\" class=\"STHSW30\">SOW</th>";
            echo "<th title=\"Shutouts Loss\" class=\"STHSW30\">SOL</th>";	
        }
    }

    echo "<th title=\"Points\" class=\"STHSW30\">P</th>";

    if ($LeagueGeneralNoType['TieBreaker2019'] == "True"){echo "<th title=\"Normal Wins\" class=\"STHSW30\">RW</th>";}

    if ($LeagueGeneralNoType['TieBreaker2019'] == "True" OR $LeagueGeneralNoType['TieBreaker2010'] == "True"){echo "<th title=\"Normal Wins + Overtime Win\" class=\"STHSW30\">ROW</th>";}

    echo "<th title=\"Goals For\" class=\"STHSW30\">GF</th>";
    echo "<th title=\"Goals Against\" class=\"STHSW30\">GA</th>";
    echo "<th title=\"Goals For Diffirencial against Goals Against\" class=\"STHSW30\">Diff</th>";
    echo "<th title=\"Points Percentage\" class=\"STHSW45\">PCT</th>";
    echo "<th title=\"Home Only\" class=\"STHSW75\">" . $TeamLang['Home'] ."</th>";
    echo "<th title=\"Visitor Only\" class=\"STHSW75\">" . $TeamLang['Visitor'] ."</th>";
    echo "<th title=\"Last 10 Game\" class=\"STHSW75\">" . $TeamLang['Last10'] ."</th>";
    echo "<th title=\"Streak\" class=\"STHSW30\">STK</th>";
    echo "<th title=\"Next Game\" class=\"STHSW30 noSort\">Next</th>";
    echo "</tr></thead><tbody>";
}



Function PrintStandingTable($Standing, $TypeText, $StandardStandingOutput, $LeagueGeneralNoType, $ColumnPerTable, $LinesNumber ,$DatabaseFile,$ImagesCDNPath){

    $LoopCount =0;

    while ($row = $Standing ->fetchArray()) {

        $LoopCount +=1;
        PrintStandingTableRow($row, $TypeText, $StandardStandingOutput, $LeagueGeneralNoType, $LoopCount, $DatabaseFile,$ImagesCDNPath);
        if ($LoopCount > 0 AND $LoopCount == $LinesNumber){echo "<tr class=\"static\"><td class=\"staticTD\" colspan=\"" . $ColumnPerTable . "\"><hr /></td></tr>";}

    }
    echo "</tbody></table>";
}



Function PrintStandingTableRow($row, $TypeText, $StandardStandingOutput, $LeagueGeneralNoType, $LoopCount,$DatabaseFile,$ImagesCDNPath){

	echo "<tr><td>" . $LoopCount . "</td>";
	echo "<td><span class=\"" . $TypeText . "Standing_Team" . $row['Number'] . "\"></span>";
	if ($row['TeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['TeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";}
	echo "<div class=\"darkText\"><a href=\"" . $TypeText . "Team.php?Team=" . $row['Number'] . "\">" . $row['Name'] . "</a></div>";

	if($row['StandingPlayoffTitle']=="E"){echo " - E ";
	} else if($row['StandingPlayoffTitle']=="X"){echo " - X";
	} else if($row['StandingPlayoffTitle']=="Y"){echo " - Y";
	} else if($row['StandingPlayoffTitle']=="Z"){echo " - Z";
	}

	echo "</td><td>" . $row['GP'] . "</td>";

	if ($StandardStandingOutput == "True"){
		echo "<td>" . ($row['W'] + $row['OTW'] + $row['SOW']) . "</td>";
		echo "<td>" . $row['L'] . "</td>";
		echo "<td>" . ($row['OTL'] + $row['SOL']) . "</td>";
	}else{		
		echo "<td>" . $row['W'] . "</td>";
		echo "<td>" . $row['L'] . "</td>";

		if ($LeagueGeneralNoType['PointSystemSO'] == "False"){echo "<td>" . $row['T'] . "</td>";}
		if ($LeagueGeneralNoType['NoOvertime'] == "True"){
			echo "<td>" . $row['OTW'] . "</td>";
			echo "<td>" . $row['OTL'] . "</td>";
		}

		if ($LeagueGeneralNoType['PointSystemSO'] == "True"){	
			echo "<td>" . $row['SOW'] . "</td>";
			echo "<td>" . $row['SOL'] . "</td>";
		}	
	}

	echo "<td><strong>" . $row['Points'] . "</strong></td>";

	if ($LeagueGeneralNoType['TieBreaker2019'] == "True"){echo "<td>" . ($row['W']) . "</td>";}
	if ($LeagueGeneralNoType['TieBreaker2019'] == "True" OR $LeagueGeneralNoType['TieBreaker2010'] == "True"){echo "<td>" . ($row['W'] + $row['OTW']) . "</td>";}

	echo "<td>" . $row['GF'] . "</td>";
	echo "<td>" . $row['GA'] . "</td>";
	echo "<td>" . ($row['GF'] - $row['GA']) . "</td>";
	if ($row['GP'] > 0 AND $LeagueGeneralNoType['PointSystemW'] > 0){echo "<td>" . number_Format(($row['Points'] / ($row['GP'] * $LeagueGeneralNoType['PointSystemW'])),3) . "</td>";}else{echo "<td>" . number_Format("0",3) . "</td>";}	
	echo "<td>" . ($row['HomeW'] + $row['HomeOTW'] + $row['HomeSOW'])."-".$row['HomeL']."-".($row['HomeOTL']+$row['HomeSOL']) . "</td>";
	echo "<td>" . ($row['W'] + $row['OTW'] + $row['SOW'] - $row['HomeW'] - $row['HomeOTW'] - $row['HomeSOW'])."-".($row['L'] - $row['HomeL'])."-".($row['OTL']+$row['SOL']-$row['HomeOTL']-$row['HomeSOL']) . "</td>";
	echo "<td>" . ($row['Last10W'] + $row['Last10OTW'] + $row['Last10SOW'])."-".$row['Last10L']."-".($row['Last10OTL']+$row['Last10SOL']) . "</td>";
	$streakClass = strpos($row['Streak'], 'W') === 0 ? 'streak-win' : 'streak-loss';
	echo "<td class=\"" . $streakClass . "\">" . htmlspecialchars($row['Streak']) . "</td>";

	$dbS = new SQLite3($DatabaseFile);
	$Query = "SELECT count(*) AS count FROM Schedule" . $TypeText . " WHERE (VisitorTeam = " . $row['Number'] . " OR HomeTeam = " . $row['Number'] . ") AND Play = 'False' ORDER BY GameNumber LIMIT 1";
	$Result = $dbS->querySingle($Query,true);

	if ($Result['count'] > 0) {
		$Query = "SELECT * FROM Schedule" . $TypeText . " WHERE (VisitorTeam = " . $row['Number'] . " OR HomeTeam = " . $row['Number'] . ") AND Play = 'False' ORDER BY GameNumber LIMIT 1";
		$ScheduleNext = $dbS->querySingle($Query, true);
	
		if ($ScheduleNext['HomeTeam'] == $row['Number']) {
			echo "<td><img src='images/" . $ScheduleNext['VisitorTeam'] . ".png' alt='" . $ScheduleNext['VisitorTeamAbbre'] . "' class='team-logo'></td>";
		} elseif ($ScheduleNext['VisitorTeam'] == $row['Number']) {
			echo "<td><img src='images/" . $ScheduleNext['HomeTeam'] . ".png' alt='" . $ScheduleNext['HomeTeamAbbre'] . "' class='team-logo'></td>";
		}
	} else {
		echo "<td></td>";
	}
	
	echo "</tr>\n"; /* The \n is for a new line in the HTML Code */
}
?>

<style>
@media screen and (max-width: 1060px) {
    .STHSWarning {display:block;}
    .STHSPHPStanding_Table thead th:nth-last-child(1){display:none;}
    .STHSPHPStanding_Table tbody td:nth-last-child(1){display:none;}
    .STHSPHPStanding_Table thead th:nth-last-child(3){display:none;}
    .STHSPHPStanding_Table tbody td:nth-last-child(3){display:none;}
    .STHSPHPStanding_Table thead th:nth-last-child(4){display:none;}
    .STHSPHPStanding_Table tbody td:nth-last-child(4){display:none;}
    .STHSPHPStanding_Table thead th:nth-last-child(5){display:none;}
    .STHSPHPStanding_Table tbody td:nth-last-child(5){display:none;}
}@media screen and (max-width: 890px) {
    .STHSPHPStanding_Table thead th:nth-last-child(2){display:none;}
    .STHSPHPStanding_Table tbody td:nth-last-child(2){display:none;}
    .STHSPHPStanding_Table thead th:nth-last-child(6){display:none;}
    .STHSPHPStanding_Table tbody td:nth-last-child(6){display:none;}
}
.STHSPHPStanding_Table tbody td.staticTD {font-size:14pt;border-right:hidden; border-left:hidden;}

<?php 
if ($Playoff == True){
	echo "#tabmain1{display:none;}\n";
	echo "#tabmain2{display:none;}\n";
	echo "#tabmain3{display:none;}\n";
	echo "#tabmain4{display:none;}\n";
	echo "#tabmain6{display:none;}\n";
}else{
	echo "#tabmain5{display:none;}\n";
}?>
</style>



</head><body>
<?php include "components/GamesScroller.php"; ?>
<?php include "Menu.php";?>

<div class="customStanding">
<!-- <div class="container"> -->
<?php echo "<h1>" . $Title . "</h1>"; ?>

<div class="tabsmain standard">
    <ul class="tabmain-links">

    <?php
    if ($Playoff == True OR isset($LeagueGeneralNoType) == False){
        echo "<li><a class=\"activemain\" href=\"#tabmain5\">" . $StandingLang['Playoff'] . "</a></li>";
    }else{
        if ($LeagueGeneralNoType['DivisionNewNHLPlayoff'] == "True"){
            echo "<li class=\"activemain\"><a href=\"#tabmain1\">" . $StandingLang['Wildcard'] . "</a></li>";
            echo "<li><a href=\"#tabmain2\">" . $StandingLang['Conference'] . "</a></li>";
        }else{
            echo "<li class=\"activemain\"><a href=\"#tabmain2\">" . $StandingLang['Conference'] . "</a></li>";
        }
        echo "<li><a href=\"#tabmain3\">" . $StandingLang['Division'] . "</a></li>";
        echo "<li><a href=\"#tabmain4\">" . $StandingLang['Overall'] . "</a></li>";
        echo "<li><a href=\"#tabmain6\">Historique</a></li>";
    }
    ?>
    </ul>
    <div class="tabmain-content">
        <div class="tabmain active<?php if(isset($LeagueGeneralNoType)){if ($LeagueGeneralNoType['DivisionNewNHLPlayoff'] == "True"){echo "";}}?>" id="tabmain1">  <!-- TODO  BUG   le code original empeche les standing Farm d'afficher.  quand on ajoute ?Farm a la requete, DivisionNewNHLPlayoff devient False et le tabmain1 n'affiche plus... -->  
      
            <!-- <div class="container"> -->

<?php
if ($StandingQueryOK == True){
    

	echo "<h2 class=\"conference-title\"> <img src=\"images\Eastern.png\" alt=\"Eastern Conference\" class=\"conference-iconE\" /> </h2>";
	PrintStandingTop($TeamLang, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType);


    log2console("test1");
    log2console($LeagueGeneralNoType);

	/* Division 1 */
	echo "<tr class=\"static\"><td class=\"staticTD ConferenceName1\" colspan=\"" . $ColumnPerTable . "\">" . $LeagueGeneralNoType['DivisionName1'] . "</td></tr>";

    $Query = "SELECT Team{$TypeTextTeam}Stat.*, Team{$TypeText}Info.Conference, Team{$TypeText}Info.Division, Team{$TypeText}Info.TeamThemeID, RankingOrder.Type
          FROM Team{$TypeTextTeam}Stat
          INNER JOIN Team{$TypeText}Info ON Team{$TypeTextTeam}Stat.Number = Team{$TypeText}Info.Number
          INNER JOIN RankingOrder ON Team{$TypeTextTeam}Stat.Number = RankingOrder.Team{$TypeText}Number
          WHERE Team{$TypeText}Info.Division = '{$LeagueGeneralNoType['DivisionName5']}'
          AND RankingOrder.Type = 0
          ORDER BY RankingOrder.TeamOrder LIMIT 3";



	// Essayer d'abord avec RankingOrder, puis fallback sans RankingOrder si pas de données
	$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Division)=\"" . $LeagueGeneralNoType['DivisionName1'] . "\") AND ((RankingOrder.Type)=0)) ORDER BY RankingOrder.TeamOrder LIMIT 3";
	$Standing = $db->query($Query);
	$LoopCount =0;

	// Vérifier si on a des résultats avec RankingOrder
	$hasRankingData = false;
	if ($Standing) {
		$testRow = $Standing->fetchArray();
		if ($testRow) {
			$hasRankingData = true;
			// Réexécuter la requête car on a consommé le premier résultat
			$Standing = $db->query($Query);
		}
	}

	// Si pas de données avec RankingOrder, utiliser LEFT JOIN pour obtenir toutes les équipes
	if (!$hasRankingData) {
		$Query = "SELECT
			ti.Number, ti.Name, ti.Conference, ti.Division, ti.TeamThemeID,
			COALESCE(ts.GP, 0) as GP,
			COALESCE(ts.W, 0) as W,
			COALESCE(ts.L, 0) as L,
			COALESCE(ts.T, 0) as T,
			COALESCE(ts.OTW, 0) as OTW,
			COALESCE(ts.OTL, 0) as OTL,
			COALESCE(ts.SOW, 0) as SOW,
			COALESCE(ts.SOL, 0) as SOL,
			COALESCE(ts.Points, 0) as Points,
			COALESCE(ts.GF, 0) as GF,
			COALESCE(ts.GA, 0) as GA,
			COALESCE(ts.Pim, 0) as Pim,
			COALESCE(ts.Hits, 0) as Hits,
			COALESCE(ts.PPGoal, 0) as PPGoal,
			COALESCE(ts.PPAttemp, 0) as PPAttemp,
			COALESCE(ts.PKGoal, 0) as PKGoal,
			COALESCE(ts.PKAttemp, 0) as PKAttemp,
			COALESCE(ts.ShotsFor, 0) as ShotsFor,
			COALESCE(ts.ShotsAga, 0) as ShotsAga,
			0 as Type
		FROM Team" . $TypeText . "Info ti
		LEFT JOIN Team" . $TypeTextTeam . "Stat ts ON ti.Number = ts.Number
		WHERE ti.Division = '" . $LeagueGeneralNoType['DivisionName1'] . "'
		ORDER BY COALESCE(ts.Points, 0) DESC, COALESCE(ts.GF, 0) - COALESCE(ts.GA, 0) DESC, ti.Name ASC
		LIMIT 3";
		$Standing = $db->query($Query);
	}

    log2console($Standing);
	if (empty($Standing) == false){while ($row = $Standing ->fetchArray()) {

		$LoopCount +=1;
		PrintStandingTableRow($row, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType, $LoopCount,$DatabaseFile,$ImagesCDNPath);

	}}

		

	/* Division 2 */	
	echo "<tr class=\"static\"><td class=\"staticTD ConferenceName1\" colspan=\"" . $ColumnPerTable . "\">" . $LeagueGeneralNoType['DivisionName2'] . "</td></tr>";
	$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Division)=\"" . $LeagueGeneralNoType['DivisionName2'] . "\") AND ((RankingOrder.Type)=0)) ORDER BY RankingOrder.TeamOrder LIMIT 3";
	$Standing = $db->query($Query);
	$LoopCount =0;

	if (empty($Standing) == false){while ($row = $Standing ->fetchArray()) {

		$LoopCount +=1;
		PrintStandingTableRow($row, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType, $LoopCount,$DatabaseFile,$ImagesCDNPath);

	}}



	/* Overall for Conference 1 */	
	echo "<tr class=\"static\"><td class=\"staticTD ConferenceName1\" colspan=\"" . $ColumnPerTable . "\">" . $StandingLang['Wildcard'] ."</td></tr>";
	$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Conference)=\"" . $LeagueGeneralNoType['ConferenceName1'] . "\") AND ((RankingOrder.Type)=1)) ORDER BY RankingOrder.TeamOrder";
	$Standing = $db->query($Query);
	$LoopCount =0;

	if (empty($Standing) == false){while ($row = $Standing ->fetchArray()) {
		$LoopCount +=1;
		if ($LoopCount > 6 ){PrintStandingTableRow($row, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType, $LoopCount,$DatabaseFile,$ImagesCDNPath);}
		if ($LoopCount == 8){echo "<tr class=\"static\"><td class=\"staticTD ConferenceOoP1\" colspan=\"" . $ColumnPerTable . "\"><hr /></td></tr>";}

	}}



	echo "</tbody></table>";



	echo "<h2 class=\"conference-title\">
        <img src=\"images\Western.png\" alt=\"Eastern Conference\" class=\"conference-iconW\" />
        
      </h2>";
	PrintStandingTop($TeamLang, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType);

	/* Division 4 */

	echo "<tr class=\"static\"><td class=\"staticTD ConferenceName2\" colspan=\"" . $ColumnPerTable . "\">" . $LeagueGeneralNoType['DivisionName4'] . "</td></tr>";

	$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Division)=\"" . $LeagueGeneralNoType['DivisionName4'] . "\") AND ((RankingOrder.Type)=0)) ORDER BY RankingOrder.TeamOrder LIMIT 3";
	$Standing = $db->query($Query);
	$LoopCount =0;

	if (empty($Standing) == false){while ($row = $Standing ->fetchArray()) {
		$LoopCount +=1;
		PrintStandingTableRow($row, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType, $LoopCount,$DatabaseFile,$ImagesCDNPath);
	}}

	
	/* Division 5 */	
	echo "<tr class=\"static\"><td class=\"staticTD ConferenceName2\" colspan=\"" . $ColumnPerTable . "\">" . $LeagueGeneralNoType['DivisionName5'] . "</td></tr>";
	$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Division)=\"" . $LeagueGeneralNoType['DivisionName5'] . "\") AND ((RankingOrder.Type)=0)) ORDER BY RankingOrder.TeamOrder LIMIT 3";
	$Standing = $db->query($Query);
	$LoopCount =0;

	if (empty($Standing) == false){while ($row = $Standing ->fetchArray()) {
		$LoopCount +=1;
		PrintStandingTableRow($row, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType, $LoopCount,$DatabaseFile,$ImagesCDNPath);
	}}


	/* Overall for Conference 2 */	
	echo "<tr class=\"static\"><td class=\"staticTD ConferenceName2\" colspan=\"" . $ColumnPerTable . "\">" . $StandingLang['Wildcard'] . "</td></tr>";
	$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Conference)=\"" . $LeagueGeneralNoType['ConferenceName2'] . "\") AND ((RankingOrder.Type)=2)) ORDER BY RankingOrder.TeamOrder";
	$Standing = $db->query($Query);
	$LoopCount =0;

	if (empty($Standing) == false){while ($row = $Standing ->fetchArray()) {

		$LoopCount +=1;
		if ($LoopCount > 6 ){PrintStandingTableRow($row, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType, $LoopCount,$DatabaseFile,$ImagesCDNPath);}
		if ($LoopCount == 8){echo "<tr class=\"static\"><td class=\"staticTD ConferenceOoP2\" colspan=\"" . $ColumnPerTable . "\"><hr /></td></tr>";}

	}}
	echo "</tbody></table>";
}

?>


</div>

<div class="tabmain <?php if(isset($LeagueGeneralNoType)){if ($LeagueGeneralNoType['DivisionNewNHLPlayoff'] == "False"){echo "";}}?>" id="tabmain2">

<?php

if ($StandingQueryOK == True){
	$LoopCount =0;
	foreach ($Conference as $Value){
		$LoopCount +=1;
		$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Conference)=\"" . $Value . "\") AND ((RankingOrder.Type)=" . $LoopCount . ")) ORDER BY RankingOrder.TeamOrder";
		$Standing = $db->query($Query);
		$DataReturn = $db->query($Query); /* Run the Query Twice to Loop Second Array to confirm the first Query Return Data  */

		if ($DataReturn == True){if($DataReturn->fetchArray()){ /* Only Print Information if Query has row */
			echo "<h2>" . $Value . "</h2>";
			PrintStandingTop($TeamLang, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType);

			if ($LeagueSimulation['TwoConference'] == "True"){
				PrintStandingTable($Standing, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType, $ColumnPerTable, $LeagueGeneralNoType['HowManyPlayOffTeam']/2,$DatabaseFile,$ImagesCDNPath);
			}else{
				PrintStandingTable($Standing, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType, $ColumnPerTable, $LeagueGeneralNoType['HowManyPlayOffTeam'],$DatabaseFile,$ImagesCDNPath);
			}
		}}
	}
}
?>
</div>

<div class="tabmain" id="tabmain3">

<?php
if ($StandingQueryOK == True){

	foreach ($Division as $Value){
		$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Division)=\"" . $Value . "\") AND ((RankingOrder.Type)=0)) ORDER BY RankingOrder.TeamOrder";
		$Standing = $db->query($Query);
		$DataReturn = $db->query($Query); /* Run the Query Twice to Loop Second Array to confirm the first Query Return Data  */

		if ($DataReturn == True){if($DataReturn->fetchArray()){ /* Only Print Information if Query has row */
			echo "<h2>" . $Value . "</h2>";
			PrintStandingTop($TeamLang, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType);
			PrintStandingTable($Standing, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType,$ColumnPerTable,0,$DatabaseFile,$ImagesCDNPath);
		}}
	}
}

?>
</div>
<div class="tabmain" id="tabmain4">
<?php

if ($StandingQueryOK == True){
	echo "<h2>" . $StandingLang['Overall'] . "</h2>";
	$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((RankingOrder.Type)=0)) ORDER BY RankingOrder.TeamOrder";
	$Standing = $db->query($Query);
	$DataReturn = $db->query($Query); /* Run the Query Twice to Loop Second Array to confirm the first Query Return Data  */

	if ($DataReturn == True){
		PrintStandingTop($TeamLang, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType);
		PrintStandingTable($Standing, $TypeText, $LeagueOutputOption['StandardStandingOutput'], $LeagueGeneralNoType,$ColumnPerTable,0,$DatabaseFile,$ImagesCDNPath);
	}
}
?>

</div>

<div class="tabmain<?php if ($Playoff == True){echo " active";}?>" id="tabmain5">

<?php
// Bracket Flexbox avec structure visuelle miroir et alignement statique par round
if ($StandingQueryOK == true):
    $Query = "SELECT * FROM Playoff{$TypeText}Number ORDER BY Number";
    $PlayoffStanding = $db->query($Query);

    $rounds = [1 => [], 2 => [], 3 => [], 4 => []];

    while ($Row = $PlayoffStanding->fetchArray()) {
        for ($Round = 1; $Round <= 4; $Round++) {
            if ($Row["Round$Round"] != 0) {
                $Match = $db->querySingle("SELECT Playoff{$TypeText}.*, 
                    TeamInfoHome.Name as HomeTeamName, 
                    TeamInfoVisitor.Name as VisitorTeamName, 
                    TeamInfoHome.TeamThemeID as HomeThemID, 
                    TeamInfoVisitor.TeamThemeID as VisitorThemID 
                    FROM (Playoff{$TypeText} 
                    INNER JOIN Team{$TypeText}Info AS TeamInfoHome 
                    ON Playoff{$TypeText}.HomeTeam = TeamInfoHome.Number) 
                    LEFT JOIN Team{$TypeText}Info AS TeamInfoVisitor 
                    ON Playoff{$TypeText}.VisitorTeam = TeamInfoVisitor.Number 
                    WHERE Playoff{$TypeText}.Number = " . $Row["Round$Round"], true);
                if ($Match != null) {
                    $rounds[$Round][] = $Match;
                }
            }
        }
    }

    function buildMatchup($match, $tbd = false) {
        global $ImagesCDNPath, $TypeText;
        if (!$match && $tbd) return '<div class="matchup tbd">TBD</div>';
        if (!$match) return '<div class="matchup"></div>';
        $html = '<div class="matchup">';
        if ($match['VisitorThemID'] > 0) {
            $html .= "<img src=\"$ImagesCDNPath/images/{$match['VisitorThemID']}.png\" class=\"STHSPHPStandingTeamImage\" /> ";
            $html .= "<a href=\"{$TypeText}Team.php?Team={$match['VisitorTeam']}\">{$match['VisitorTeamName']} - {$match['VisitorWin']}</a><br />";
        }
        if ($match['HomeThemID'] > 0) {
            $html .= "<img src=\"$ImagesCDNPath/images/{$match['HomeThemID']}.png\" class=\"STHSPHPStandingTeamImage\" /> ";
            $html .= "<a href=\"{$TypeText}Team.php?Team={$match['HomeTeam']}\">{$match['HomeTeamName']} - {$match['HomeWin']}</a>";
        }
        $html .= '</div>';
        return $html;
    }
?>

<style>
.bracket-wrapper {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  margin: 40px auto;
  gap: 40px;
}
.bracket-half {
  display: flex;
  flex-direction: row;
  gap: 40px;
}
.round {
  display: flex;
  flex-direction: column;
  position: relative;
}
.matchup {
  width: 180px;
  min-height: 40px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  background: #fff;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  /*display: flex;*/
  flex-direction: column;
  /*gap: 5px;*/
}
.matchup a {
  display: flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  color: #000;
  font-size: 14px;
}
.matchup img {
  height: 24px;
  width: 24px;
  object-fit: contain;
}
.center-final {
  display: flex;
  align-items: center;
  justify-content: center;
}
.center-final .matchup {
  background: gold;
  font-weight: bold;
}
.matchup.tbd {
  background: #f8f8f8;
  font-weight: normal;
  color: #777;
  font-style: italic;
  text-align: center;
}
.spacer { height: 20px; }
</style>


<h2 style="text-align:center;">Playoff Bracket - Ouest vs Est</h2>
<div class="bracket-wrapper">
  <!-- OUEST -->
  <div class="bracket-half left">
    <div class="round">
      <?php echo buildMatchup($rounds[1][0] ?? null, true); ?>
      <div class="spacer"></div>
      <?php echo buildMatchup($rounds[1][1] ?? null, true); ?>
      <div class="spacer"></div>
      <?php echo buildMatchup($rounds[1][2] ?? null, true); ?>
      <div class="spacer"></div>
      <?php echo buildMatchup($rounds[1][3] ?? null, true); ?>
    </div>
    <div class="round">
      <div class="spacer" style="height: 60px;"></div>
      <?php echo buildMatchup($rounds[2][0] ?? null, true); ?>
      <div class="spacer" style="height: 120px;"></div>
      <?php echo buildMatchup($rounds[2][1] ?? null, true); ?>
    </div>
    <div class="round">
      <div class="spacer" style="height: 130px;"></div>
      <?php echo buildMatchup($rounds[3][0] ?? null, true); ?>
    </div>
  </div>

  <!-- CENTRE -->
  <div class="center-final">
  <div class="spacer" style="height: 310px;"></div>
    <?php echo buildMatchup($rounds[4][0] ?? null, true); ?>
  </div>

  <!-- EST -->
  <div class="bracket-half right">
    <div class="round">
      <div class="spacer" style="height: 130px;"></div>
      <?php echo buildMatchup($rounds[3][1] ?? null, true); ?>
    </div>
    <div class="round">
      <div class="spacer" style="height: 60px;"></div>
      <?php echo buildMatchup($rounds[2][2] ?? null, true); ?>
      <div class="spacer" style="height: 120px;"></div>
      <?php echo buildMatchup($rounds[2][3] ?? null, true); ?>
    </div>
    <div class="round">
      <?php echo buildMatchup($rounds[1][4] ?? null, true); ?>
      <div class="spacer"></div>
      <?php echo buildMatchup($rounds[1][5] ?? null, true); ?>
      <div class="spacer"></div>
      <?php echo buildMatchup($rounds[1][6] ?? null, true); ?>
      <div class="spacer"></div>
      <?php echo buildMatchup($rounds[1][7] ?? null, true); ?>
    </div>
  </div>
</div>

<?php endif; ?>


<script>
$(function() {
  $(".STHSPHPStanding_Table").tablesorter({
    widgets: ['staticRow'],
    headers: {
      // Remplace 17 par l'index réel de la colonne Next
      15: { sorter: false }
	  
    }
  });
});
</script>


</div>
<!-- container end div -->
<!-- Onglet Historique des Classements -->
<div class="tabmain" id="tabmain6">
<?php
// Connexion à la base de données de carrière
$CareerStatDatabaseFile = "LHSQC-STHSCareerStat.db";

if (file_exists($CareerStatDatabaseFile)) {
    try {
        $careerDB = new SQLite3($CareerStatDatabaseFile);

        // Récupérer toutes les années disponibles
        $yearQuery = "SELECT DISTINCT Year FROM TeamProStatCareer WHERE Year IS NOT NULL ORDER BY Year DESC";
        $yearResult = $careerDB->query($yearQuery);

        $years = [];
        if ($yearResult) {
            while ($yearRow = $yearResult->fetchArray()) {
                $years[] = $yearRow['Year'];
            }
        }

        if (count($years) > 0) {
            echo "<h2>Classements Historiques</h2>";
            echo "<div class='historical-standings-container'>";

            // Sélecteur d'année
            echo "<div class='year-selector'>";
            echo "<label for='yearSelect'>Choisir une année : </label>";
            echo "<select id='yearSelect' onchange='loadHistoricalStandings(this.value)'>";
            echo "<option value=''>-- Sélectionner une année --</option>";
            foreach ($years as $year) {
                echo "<option value='{$year}'>{$year}</option>";
            }
            echo "</select>";
            echo "</div>";

            // Container pour afficher les résultats
            echo "<div id='historicalStandingsContent'>";
            echo "<p class='select-year-message'>Veuillez sélectionner une année pour voir les classements.</p>";
            echo "</div>";

            echo "</div>";

            // JavaScript pour charger les données
            echo "<script>
            function loadHistoricalStandings(year) {
                if (!year) {
                    document.getElementById('historicalStandingsContent').innerHTML = '<p class=\"select-year-message\">Veuillez sélectionner une année pour voir les classements.</p>';
                    return;
                }

                document.getElementById('historicalStandingsContent').innerHTML = '<p class=\"loading-message\"><i class=\"fas fa-spinner fa-spin\"></i> Chargement des données pour ' + year + '...</p>';

                fetch('components/historical_standings.php?year=' + year + '&type=' + '{$TypeText}')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('historicalStandingsContent').innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        document.getElementById('historicalStandingsContent').innerHTML = '<p class=\"error-message\">Erreur lors du chargement des données.</p>';
                    });
            }
            </script>";

            // CSS pour l'onglet historique
            echo "<style>
            .historical-standings-container {
                margin: 20px 0;
            }

            .year-selector {
                margin-bottom: 20px;
                padding: 15px;
                background: #f8f9fa;
                border-radius: 8px;
                border: 1px solid #dee2e6;
            }

            .year-selector label {
                font-weight: bold;
                margin-right: 10px;
                color: #495057;
            }

            .year-selector select {
                padding: 8px 12px;
                border: 1px solid #ced4da;
                border-radius: 4px;
                background-color: white;
                font-size: 14px;
                min-width: 150px;
            }

            .year-selector select:focus {
                outline: none;
                border-color: #007bff;
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }

            .select-year-message, .loading-message, .error-message {
                text-align: center;
                padding: 40px 20px;
                font-style: italic;
                color: #6c757d;
            }

            .loading-message {
                color: #007bff;
            }

            .error-message {
                color: #dc3545;
            }

            .historical-standings-table {
                width: 100%;
                margin-top: 20px;
            }

            .historical-year-title {
                color: #007bff;
                border-bottom: 2px solid #007bff;
                padding-bottom: 10px;
                margin-bottom: 20px;
            }
            </style>";

        } else {
            echo "<h2>Classements Historiques</h2>";
            echo "<div class='alert alert-info'>";
            echo "<i class='fas fa-info-circle'></i> ";
            echo "Aucune donnée historique disponible pour le moment.";
            echo "</div>";
        }

        $careerDB->close();

    } catch (Exception $e) {
        echo "<h2>Classements Historiques</h2>";
        echo "<div class='alert alert-danger'>";
        echo "<i class='fas fa-exclamation-triangle'></i> ";
        echo "Erreur lors de l'accès aux données historiques : " . $e->getMessage();
        echo "</div>";
    }
} else {
    echo "<h2>Classements Historiques</h2>";
    echo "<div class='alert alert-warning'>";
    echo "<i class='fas fa-exclamation-triangle'></i> ";
    echo "Base de données de carrière non trouvée.";
    echo "</div>";
}
?>
</div>

</div>


<?php include "Footer.php";?>





