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



	$Query = "SELECT Team" . $TypeTextTeam . "Stat.*, Team" . $TypeText . "Info.Conference, Team" . $TypeText . "Info.Division,Team" . $TypeText . "Info.TeamThemeID, RankingOrder.Type FROM (Team" . $TypeTextTeam . "Stat INNER JOIN Team" . $TypeText . "Info ON Team" . $TypeTextTeam . "Stat.Number = Team" . $TypeText . "Info.Number) INNER JOIN RankingOrder ON Team" . $TypeTextTeam . "Stat.Number = RankingOrder.Team" . $TypeText . "Number WHERE (((Team" . $TypeText . "Info.Division)=\"" . $LeagueGeneralNoType['DivisionName1'] . "\") AND ((RankingOrder.Type)=0)) ORDER BY RankingOrder.TeamOrder LIMIT 3";
	$Standing = $db->query($Query);
	$LoopCount =0;

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

if ($StandingQueryOK == True){

	if ($LeagueGeneralNoType['PlayOffWinner'] != 0 AND $Playoff == True){
		$Winner = $db->querySingle("Select Team" . $TypeText . "Info.Name,Team" . $TypeText . "Info.TeamThemeID from Team" . $TypeText . "Info WHERE Team" . $TypeText . "Info.Number = ". $LeagueGeneralNoType['PlayOffWinner'],true);
		echo "<div class=\"STHSCenter\">";
		echo "<td>";if ($Winner['TeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Winner['TeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPStandingPlayoffWinnerImage \" />";}
		echo "<h1>" . $Winner['Name'] . $StandingLang['WinsPlayoff'] . "</h1><br /><br /></div>";
	}
	echo "<table class=\"STHSTableFullW table\"><tr>";

	for($Round = 1; $Round <= 5; $Round++){

		if ($Round <= $LeagueGeneralNoType['PlayOffRound']){
			echo "<td><b> " . $StandingLang['Round'] . $Round . "</b></td>";
		}else{
			echo "<td></td>";
		}
	}

	echo "</tr>";
	$Query = "SELECT Playoff" . $TypeText . "Number.* FROM Playoff" . $TypeText . "Number ORDER BY Playoff" . $TypeText . "Number.Number";
	$PlayoffStanding = $db->query($Query);

	if (empty($PlayoffStanding) == false){while ($Row = $PlayoffStanding ->fetchArray()) {

		echo "<tr>";

		if ($Row['Round1'] == 0){echo "<td></td>";}else{
			$Round1 = $db->querySingle("SELECT Playoff" . $TypeText . ".*, TeamInfoHome.Name as HomeTeamName, TeamInfoVisitor.Name as VisitorTeamName, TeamInfoHome.TeamThemeID as HomeThemID, TeamInfoVisitor.TeamThemeID as VisitorThemID FROM (Playoff" . $TypeText . " INNER JOIN Team" . $TypeText . "Info AS TeamInfoHome ON Playoff" . $TypeText . ".HomeTeam = TeamInfoHome.Number) LEFT JOIN Team" . $TypeText . "Info AS TeamInfoVisitor ON Playoff" . $TypeText . ".VisitorTeam = TeamInfoVisitor.Number WHERE Playoff" . $TypeText . ".Number = " . $Row['Round1'],true);	

			if($Round1 != Null){
				echo "<td>";if ($Round1['VisitorThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round1['VisitorThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round1['VisitorTeam'] . "\">" . $Round1['VisitorTeamName'] . " - " . $Round1['VisitorWin'] . "</a><br />";}
				if ($Round1['HomeThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round1['HomeThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round1['HomeTeam'] . "\">" . $Round1['HomeTeamName'] . " - " . $Round1['HomeWin'] . "</a><br /><br /></td>\n";}
			}
		}

		if ($Row['Round2'] == 0){echo "<td></td>";}else{
			$Round2 = $db->querySingle("SELECT Playoff" . $TypeText . ".*, TeamInfoHome.Name as HomeTeamName, TeamInfoVisitor.Name as VisitorTeamName, TeamInfoHome.TeamThemeID as HomeThemID, TeamInfoVisitor.TeamThemeID as VisitorThemID FROM (Playoff" . $TypeText . " INNER JOIN Team" . $TypeText . "Info AS TeamInfoHome ON Playoff" . $TypeText . ".HomeTeam = TeamInfoHome.Number) LEFT JOIN Team" . $TypeText . "Info AS TeamInfoVisitor ON Playoff" . $TypeText . ".VisitorTeam = TeamInfoVisitor.Number WHERE Playoff" . $TypeText . ".Number = " . $Row['Round2'],true);

			if($Round2 != Null){
				echo "<td>";if ($Round2['VisitorThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round2['VisitorThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round2['VisitorTeam'] . "\">" . $Round2['VisitorTeamName'] . " - " . $Round2['VisitorWin'] . "</a><br />";}
				if ($Round2['HomeThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round2['HomeThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round2['HomeTeam'] . "\">" . $Round2['HomeTeamName'] . " - " . $Round2['HomeWin'] . "</a><br /><br /></td>\n";}
			}
		}

		if ($Row['Round3'] == 0){echo "<td></td>";}else{

			$Round3 = $db->querySingle("SELECT Playoff" . $TypeText . ".*, TeamInfoHome.Name as HomeTeamName, TeamInfoVisitor.Name as VisitorTeamName, TeamInfoHome.TeamThemeID as HomeThemID, TeamInfoVisitor.TeamThemeID as VisitorThemID FROM (Playoff" . $TypeText . " INNER JOIN Team" . $TypeText . "Info AS TeamInfoHome ON Playoff" . $TypeText . ".HomeTeam = TeamInfoHome.Number) LEFT JOIN Team" . $TypeText . "Info AS TeamInfoVisitor ON Playoff" . $TypeText . ".VisitorTeam = TeamInfoVisitor.Number WHERE Playoff" . $TypeText . ".Number = " . $Row['Round3'],true);	

			if($Round3 != Null){
				echo "<td>";if ($Round3['VisitorThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round3['VisitorThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";		
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round3['VisitorTeam'] . "\">" . $Round3['VisitorTeamName'] . " - " . $Round3['VisitorWin'] . "</a><br />";}
				if ($Round3['HomeThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round3['HomeThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round3['HomeTeam'] . "\">" . $Round3['HomeTeamName'] . " - " . $Round3['HomeWin'] . "</a><br /><br /></td>\n";}
			}
		}

		if ($Row['Round4'] == 0){echo "<td></td>";}else{
			$Round4 = $db->querySingle("SELECT Playoff" . $TypeText . ".*, TeamInfoHome.Name as HomeTeamName, TeamInfoVisitor.Name as VisitorTeamName, TeamInfoHome.TeamThemeID as HomeThemID, TeamInfoVisitor.TeamThemeID as VisitorThemID FROM (Playoff" . $TypeText . " INNER JOIN Team" . $TypeText . "Info AS TeamInfoHome ON Playoff" . $TypeText . ".HomeTeam = TeamInfoHome.Number) LEFT JOIN Team" . $TypeText . "Info AS TeamInfoVisitor ON Playoff" . $TypeText . ".VisitorTeam = TeamInfoVisitor.Number WHERE Playoff" . $TypeText . ".Number = " . $Row['Round4'],true);	

			if($Round4 != Null){
				echo "<td>";if ($Round4['VisitorThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round4['VisitorThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";			
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round4['VisitorTeam'] . "\">" . $Round4['VisitorTeamName'] . " - " . $Round4['VisitorWin'] . "</a><br />";}
				if ($Round4['HomeThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round4['HomeThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round4['HomeTeam'] . "\">" . $Round4['HomeTeamName'] . " - " . $Round4['HomeWin'] . "</a><br /><br /></td>\n";}
			}
		}

		if ($Row['Round5'] == 0){echo "<td></td>";}else{
			$Round5 = $db->querySingle("SELECT Playoff" . $TypeText . ".*, TeamInfoHome.Name as HomeTeamName, TeamInfoVisitor.Name as VisitorTeamName, TeamInfoHome.TeamThemeID as HomeThemID, TeamInfoVisitor.TeamThemeID as VisitorThemID FROM (Playoff" . $TypeText . " INNER JOIN Team" . $TypeText . "Info AS TeamInfoHome ON Playoff" . $TypeText . ".HomeTeam = TeamInfoHome.Number) LEFT JOIN Team" . $TypeText . "Info AS TeamInfoVisitor ON Playoff" . $TypeText . ".VisitorTeam = TeamInfoVisitor.Number WHERE Playoff" . $TypeText . ".Number = " . $Row['Round5'],true);	
			if($Round5 != Null){

				echo "<td>";if ($Round5['VisitorThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round5['VisitorThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";	
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round5['VisitorTeam'] . "\">" . $Round5['VisitorTeamName'] . " - " . $Round5['VisitorWin'] . "</a><br />";}
				if ($Round4['HomeThemID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Round4['HomeThemID'] .".png\" alt=\"\" class=\"STHSPHPStandingTeamImage\" />";
				echo "<a href=\"" . $TypeText . "Team.php?Team=" . $Round5['HomeTeam'] . "\">" . $Round5['HomeTeamName'] . " - " . $Round5['HomeWin'] . "</a><br /><br /></td>\n";}
			}
		}

		echo "</tr>";

	}}
	echo "</table>";
}?>


</div>

</div>
</div>


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
</div> 


<?php include "Footer.php";?>



