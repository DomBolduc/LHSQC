<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>

<script src="STHSMain.js"></script>

<title>LHSQC - Pro Standing</title>

<script src="LHSQC.js"></script>

<meta name="author" content="Simon Tremblay, sths.simont.info" />

<meta charset="utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="Decription" content="David Cassabon - STHS - Version : 3.4.2.2 - LHSQC-STHS.db - LHSQC-STHSCareerStat.db"/>

<link href="STHSMain.css" rel="stylesheet" type="text/css" />

<style>

@media screen and (max-width: 1060px) {

.STHSWarning {display:block;}

table.basictablesorter thead th:nth-last-child(3){display:none;}

table.basictablesorter tbody td:nth-last-child(3){display:none;}

table.basictablesorter thead th:nth-last-child(4){display:none;}

table.basictablesorter tbody td:nth-last-child(4){display:none;}

table.basictablesorter thead th:nth-last-child(5){display:none;}

table.basictablesorter tbody td:nth-last-child(5){display:none;}

}@media screen and (max-width: 890px) {

table.basictablesorter thead th:nth-last-child(6){display:none;}

table.basictablesorter tbody td:nth-last-child(6){display:none;}

table.basictablesorter thead th:nth-last-child(7){display:none;}

table.basictablesorter tbody td:nth-last-child(7){display:none;}

}

table.basictablesorter tbody td.staticTD {font-size:9pt;border-right:hidden; border-left:hidden;}

</style>

<?php If (file_exists("STHSMain-CSSOverwrite.css") == True){echo "<link href=\"STHSMain-CSSOverwrite.css\" rel=\"stylesheet\" type=\"text/css\" />";}?>

<?php If (file_exists("STHSSetting.php") == true){

require_once "STHSSetting.php";

$db = new SQLite3($DatabaseFile);

include "Menu.php";}?>

<script>$(function(){$("table").basictablesorter({ widgets: ['staticRow'] })});</script>

<div class="tabsmain standard"><ul class="tabmain-links">

<li class="activemain"><a href="#tabmain1">Wildcard</a></li>

<li><a href="#tabmain2">Conference</a></li>

<li><a href="#tabmain3">Division</a></li>

<li><a href="#tabmain4">Overall</a></li>

</ul><div class="tabmain-content">

<div class="tabmain active" id="tabmain1">

<h2 class="STHSStanding_H2Header">Eastern Conference</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr class="static"><td  class="staticTD"></td><td class="staticTD"><b>Atlantic</b></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td></tr>

<tr><td>1 A</td><td><a href="LHSQC-ProTeamRoster.php#MapleLeafs">Maple Leafs</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2 A</td><td><a href="LHSQC-ProTeamRoster.php#Lightning">Lightning</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3 A</td><td><a href="LHSQC-ProTeamRoster.php#Senators">Senators</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr class="static"><td  class="staticTD"></td><td class="staticTD"><b>Metropolitan</b></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td></tr>

<tr><td>1 M</td><td><a href="LHSQC-ProTeamRoster.php#Capitals">Capitals</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2 M</td><td><a href="LHSQC-ProTeamRoster.php#Penguins">Penguins</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3 M</td><td><a href="LHSQC-ProTeamRoster.php#Flyers">Flyers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr class="static"><td class="staticTD"></td><td class="staticTD"><b>Wildcard</b></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td></tr>

<tr><td>1 M</td><td><a href="LHSQC-ProTeamRoster.php#Rangers">Rangers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2 M</td><td><a href="LHSQC-ProTeamRoster.php#Islanders">Islanders</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr class="static"><td colspan="18"><hr /></td></tr>

<tr><td>3 M</td><td><a href="LHSQC-ProTeamRoster.php#Devils">Devils</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4 A</td><td><a href="LHSQC-ProTeamRoster.php#Canadiens">Canadiens</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5 A</td><td><a href="LHSQC-ProTeamRoster.php#Panthers">Panthers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6 A</td><td><a href="LHSQC-ProTeamRoster.php#RedWings">Red Wings</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7 M</td><td><a href="LHSQC-ProTeamRoster.php#BlueJackets">Blue Jackets</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8 M</td><td><a href="LHSQC-ProTeamRoster.php#Hurricanes">Hurricanes</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>9 A</td><td><a href="LHSQC-ProTeamRoster.php#Sabres">Sabres</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>10 A</td><td><a href="LHSQC-ProTeamRoster.php#Bruins">Bruins</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table>

<h2 class="STHSStanding_H2Header">Western Conference</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr class="static"><td  class="staticTD"></td><td class="staticTD"><b>Pacific</b></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td></tr>

<tr><td>1 P</td><td><a href="LHSQC-ProTeamRoster.php#Kraken">Kraken</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2 P</td><td><a href="LHSQC-ProTeamRoster.php#GoldenKnights">Golden Knights</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3 P</td><td><a href="LHSQC-ProTeamRoster.php#Canucks">Canucks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr class="static"><td  class="staticTD"></td><td class="staticTD"><b>Central</b></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td></tr>

<tr><td>1 C</td><td><a href="LHSQC-ProTeamRoster.php#Blues">Blues</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2 C</td><td><a href="LHSQC-ProTeamRoster.php#UtahHockeyClub">Utah Hockey Club</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3 C</td><td><a href="LHSQC-ProTeamRoster.php#Predators">Predators</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr class="static"><td class="staticTD"></td><td class="staticTD"><b>Wildcard</b></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td><td class="staticTD"></td></tr>

<tr><td>1 P</td><td><a href="LHSQC-ProTeamRoster.php#Sharks">Sharks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2 C</td><td><a href="LHSQC-ProTeamRoster.php#Wild">Wild</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr class="static"><td colspan="18"><hr /></td></tr>

<tr><td>3 P</td><td><a href="LHSQC-ProTeamRoster.php#Kings">Kings</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4 P</td><td><a href="LHSQC-ProTeamRoster.php#Oilers">Oilers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5 C</td><td><a href="LHSQC-ProTeamRoster.php#Stars">Stars</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6 C</td><td><a href="LHSQC-ProTeamRoster.php#Avalanche">Avalanche</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7 C</td><td><a href="LHSQC-ProTeamRoster.php#Blackhawks">Blackhawks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8 P</td><td><a href="LHSQC-ProTeamRoster.php#Flames">Flames</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>9 C</td><td><a href="LHSQC-ProTeamRoster.php#Jets">Jets</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>10 P</td><td><a href="LHSQC-ProTeamRoster.php#Ducks">Ducks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table>

</div>

<div class="tabmain" id="tabmain2">

<h2 class="STHSStanding_H2Header">Eastern Conference</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr><td>1</td><td><a href="LHSQC-ProTeamRoster.php#Capitals">Capitals</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2</td><td><a href="LHSQC-ProTeamRoster.php#MapleLeafs">Maple Leafs</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3</td><td><a href="LHSQC-ProTeamRoster.php#Lightning">Lightning</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4</td><td><a href="LHSQC-ProTeamRoster.php#Penguins">Penguins</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5</td><td><a href="LHSQC-ProTeamRoster.php#Flyers">Flyers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6</td><td><a href="LHSQC-ProTeamRoster.php#Senators">Senators</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7</td><td><a href="LHSQC-ProTeamRoster.php#Rangers">Rangers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8</td><td><a href="LHSQC-ProTeamRoster.php#Islanders">Islanders</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr class="static"><td colspan="18"><hr /></td></tr>

<tr><td>9</td><td><a href="LHSQC-ProTeamRoster.php#Devils">Devils</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>10</td><td><a href="LHSQC-ProTeamRoster.php#Canadiens">Canadiens</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>11</td><td><a href="LHSQC-ProTeamRoster.php#Panthers">Panthers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>12</td><td><a href="LHSQC-ProTeamRoster.php#RedWings">Red Wings</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>13</td><td><a href="LHSQC-ProTeamRoster.php#BlueJackets">Blue Jackets</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>14</td><td><a href="LHSQC-ProTeamRoster.php#Hurricanes">Hurricanes</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>15</td><td><a href="LHSQC-ProTeamRoster.php#Sabres">Sabres</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>16</td><td><a href="LHSQC-ProTeamRoster.php#Bruins">Bruins</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table><br />

<h2 class="STHSStanding_H2Header">Western Conference</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr><td>1</td><td><a href="LHSQC-ProTeamRoster.php#Kraken">Kraken</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2</td><td><a href="LHSQC-ProTeamRoster.php#GoldenKnights">Golden Knights</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3</td><td><a href="LHSQC-ProTeamRoster.php#Canucks">Canucks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4</td><td><a href="LHSQC-ProTeamRoster.php#Blues">Blues</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5</td><td><a href="LHSQC-ProTeamRoster.php#UtahHockeyClub">Utah Hockey Club</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6</td><td><a href="LHSQC-ProTeamRoster.php#Predators">Predators</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7</td><td><a href="LHSQC-ProTeamRoster.php#Sharks">Sharks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8</td><td><a href="LHSQC-ProTeamRoster.php#Wild">Wild</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr class="static"><td colspan="18"><hr /></td></tr>

<tr><td>9</td><td><a href="LHSQC-ProTeamRoster.php#Kings">Kings</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>10</td><td><a href="LHSQC-ProTeamRoster.php#Oilers">Oilers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>11</td><td><a href="LHSQC-ProTeamRoster.php#Stars">Stars</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>12</td><td><a href="LHSQC-ProTeamRoster.php#Avalanche">Avalanche</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>13</td><td><a href="LHSQC-ProTeamRoster.php#Blackhawks">Blackhawks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>14</td><td><a href="LHSQC-ProTeamRoster.php#Flames">Flames</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>15</td><td><a href="LHSQC-ProTeamRoster.php#Jets">Jets</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>16</td><td><a href="LHSQC-ProTeamRoster.php#Ducks">Ducks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table><br />

*Seeding 3 division leaders<br />

</div><div class="tabmain" id="tabmain3">

<h2 class="STHSStanding_H2Header">Atlantic</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr><td>1</td><td><a href="LHSQC-ProTeamRoster.php#MapleLeafs">Maple Leafs</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2</td><td><a href="LHSQC-ProTeamRoster.php#Lightning">Lightning</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3</td><td><a href="LHSQC-ProTeamRoster.php#Senators">Senators</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4</td><td><a href="LHSQC-ProTeamRoster.php#Canadiens">Canadiens</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5</td><td><a href="LHSQC-ProTeamRoster.php#Panthers">Panthers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6</td><td><a href="LHSQC-ProTeamRoster.php#RedWings">Red Wings</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7</td><td><a href="LHSQC-ProTeamRoster.php#Sabres">Sabres</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8</td><td><a href="LHSQC-ProTeamRoster.php#Bruins">Bruins</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table>

<h2 class="STHSStanding_H2Header">Metropolitan</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr><td>1</td><td><a href="LHSQC-ProTeamRoster.php#Capitals">Capitals</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2</td><td><a href="LHSQC-ProTeamRoster.php#Penguins">Penguins</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3</td><td><a href="LHSQC-ProTeamRoster.php#Flyers">Flyers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4</td><td><a href="LHSQC-ProTeamRoster.php#Rangers">Rangers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5</td><td><a href="LHSQC-ProTeamRoster.php#Islanders">Islanders</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6</td><td><a href="LHSQC-ProTeamRoster.php#Devils">Devils</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7</td><td><a href="LHSQC-ProTeamRoster.php#BlueJackets">Blue Jackets</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8</td><td><a href="LHSQC-ProTeamRoster.php#Hurricanes">Hurricanes</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table>

<h2 class="STHSStanding_H2Header">Pacific</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr><td>1</td><td><a href="LHSQC-ProTeamRoster.php#Kraken">Kraken</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2</td><td><a href="LHSQC-ProTeamRoster.php#GoldenKnights">Golden Knights</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3</td><td><a href="LHSQC-ProTeamRoster.php#Canucks">Canucks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4</td><td><a href="LHSQC-ProTeamRoster.php#Sharks">Sharks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5</td><td><a href="LHSQC-ProTeamRoster.php#Kings">Kings</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6</td><td><a href="LHSQC-ProTeamRoster.php#Oilers">Oilers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7</td><td><a href="LHSQC-ProTeamRoster.php#Flames">Flames</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8</td><td><a href="LHSQC-ProTeamRoster.php#Ducks">Ducks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table>

<h2 class="STHSStanding_H2Header">Central</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr><td>1</td><td><a href="LHSQC-ProTeamRoster.php#Blues">Blues</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2</td><td><a href="LHSQC-ProTeamRoster.php#UtahHockeyClub">Utah Hockey Club</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3</td><td><a href="LHSQC-ProTeamRoster.php#Predators">Predators</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4</td><td><a href="LHSQC-ProTeamRoster.php#Wild">Wild</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5</td><td><a href="LHSQC-ProTeamRoster.php#Stars">Stars</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6</td><td><a href="LHSQC-ProTeamRoster.php#Avalanche">Avalanche</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7</td><td><a href="LHSQC-ProTeamRoster.php#Blackhawks">Blackhawks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8</td><td><a href="LHSQC-ProTeamRoster.php#Jets">Jets</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table>

</div><div class="tabmain" id="tabmain4">

<h2 class="STHSStanding_H2Header">Overall</h2>

<table class="basictablesorter"><thead><tr><th class="STHSW35">PO</th><th class="STHSW200">Teams</th><th class="STHSW30">GP</th><th class="STHSW30">W</th><th class="STHSW30">L</th><th class="STHSW30">OTL</th><th class="STHSW30">P</th><th class="STHSW30">GF</th><th class="STHSW30">GA</th><th class="STHSW30">Diff</th><th class="STHSW45">PCT</th><th class="STHSW75">Home</th><th class="STHSW75">Visitor</th><th class="STHSW75">Last 10</th><th class="STHSW75">Home L10</th><th class="STHSW75">Visitor L10</th><th class="STHSW30">STK</th><th class="STHSW30">PR</th></tr></thead>

<tbody>

<tr><td>1</td><td><a href="LHSQC-ProTeamRoster.php#Kraken">Kraken</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>2</td><td><a href="LHSQC-ProTeamRoster.php#GoldenKnights">Golden Knights</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>3</td><td><a href="LHSQC-ProTeamRoster.php#Capitals">Capitals</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>4</td><td><a href="LHSQC-ProTeamRoster.php#Canucks">Canucks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>5</td><td><a href="LHSQC-ProTeamRoster.php#MapleLeafs">Maple Leafs</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>6</td><td><a href="LHSQC-ProTeamRoster.php#Lightning">Lightning</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>7</td><td><a href="LHSQC-ProTeamRoster.php#Sharks">Sharks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>8</td><td><a href="LHSQC-ProTeamRoster.php#Blues">Blues</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>9</td><td><a href="LHSQC-ProTeamRoster.php#Penguins">Penguins</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>10</td><td><a href="LHSQC-ProTeamRoster.php#UtahHockeyClub">Utah Hockey Club</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>11</td><td><a href="LHSQC-ProTeamRoster.php#Flyers">Flyers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>12</td><td><a href="LHSQC-ProTeamRoster.php#Senators">Senators</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>13</td><td><a href="LHSQC-ProTeamRoster.php#Rangers">Rangers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>14</td><td><a href="LHSQC-ProTeamRoster.php#Islanders">Islanders</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>15</td><td><a href="LHSQC-ProTeamRoster.php#Devils">Devils</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>16</td><td><a href="LHSQC-ProTeamRoster.php#Predators">Predators</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>17</td><td><a href="LHSQC-ProTeamRoster.php#Canadiens">Canadiens</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>18</td><td><a href="LHSQC-ProTeamRoster.php#Wild">Wild</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>19</td><td><a href="LHSQC-ProTeamRoster.php#Kings">Kings</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>20</td><td><a href="LHSQC-ProTeamRoster.php#Panthers">Panthers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>21</td><td><a href="LHSQC-ProTeamRoster.php#Oilers">Oilers</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>22</td><td><a href="LHSQC-ProTeamRoster.php#RedWings">Red Wings</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>23</td><td><a href="LHSQC-ProTeamRoster.php#Stars">Stars</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>24</td><td><a href="LHSQC-ProTeamRoster.php#BlueJackets">Blue Jackets</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>25</td><td><a href="LHSQC-ProTeamRoster.php#Avalanche">Avalanche</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>26</td><td><a href="LHSQC-ProTeamRoster.php#Blackhawks">Blackhawks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>27</td><td><a href="LHSQC-ProTeamRoster.php#Hurricanes">Hurricanes</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>28</td><td><a href="LHSQC-ProTeamRoster.php#Flames">Flames</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>29</td><td><a href="LHSQC-ProTeamRoster.php#Sabres">Sabres</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>30</td><td><a href="LHSQC-ProTeamRoster.php#Bruins">Bruins</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>31</td><td><a href="LHSQC-ProTeamRoster.php#Jets">Jets</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

<tr><td>32</td><td><a href="LHSQC-ProTeamRoster.php#Ducks">Ducks</a></td><td>0</td><td>0</td><td>0</td><td>0</td><td><b>0</b></td><td>0</td><td>0</td><td>0</td><td>0,000</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>0-0-0</td><td>N/A</td><td></td></tr>

</tbody></table></div></div></div>

<h2 class="STHSStanding_PointSystem">Point System</h2>

<b>Win :</b> 2 -- <b>Loss :</b> 0 -- <b>OT Win :</b> 2 -- <b>OT Loss :</b> 1 -- <b>SO Win :</b> 2 -- <b>SO Loss :</b> 1<br /><br />P.S. The simulator only uses points to give the title. If two team have the same amount of point, none of them will be award the title until your simulate the last game/day of your season.

<br /><br /><br /><a href="#" class="scrollup">Back to the Top</a><div class="footer">

Output by the <a href="https://sths.simont.info">SimonT Hockey Simulator (STHS)</a> for David Cassabon<span class="FooterW3C"> - Original Page <a href="http://validator.w3.org/check?uri=referer">W3C HTML5 Valid</a></span>

<div style="display:none;visibility:hidden"><a href="https://sths.simont.info">Hockey Simulator</a> - <a href="https://sths.simont.info">Hockey Simulation</a> - <a href="https://sths.simont.info">Hockey Manager</a></div></div>

</body></html>

