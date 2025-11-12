<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<script src="STHSMain.js"></script>
<title>LHSQC - Team Finance</title>
<script src="LHSQC.js"></script>
<meta name="author" content="Simon Tremblay, sths.simont.info" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Decription" content="Dom Bolduc - STHS - Version : 3.4.1.2 - LHSQC-STHS.db - LHSQC-STHSCareerStat.db"/>
<link href="STHSMain.css" rel="stylesheet" type="text/css" />
<style>
@media screen and (max-width: 960px) {.STHSWarning {display:block;}
.STHSFinance_FarmSalaryTable {display:none;}
.STHSFinance_TeamTable tr > td:nth-child(6){display:none;}
.STHSFinance_TeamTable tr > td:nth-child(7){display:none;}
.STHSFinance_TeamTable tr > td:nth-child(8){display:none;}}
@media screen and (max-width: 720px) {.STHSFinance_ProSalaryTable{display:none}}
</style>
</head><body>
<?php If (file_exists("STHSMain-CSSOverwrite.css") == True){echo "<link href=\"STHSMain-CSSOverwrite.css\" rel=\"stylesheet\" type=\"text/css\" />";}?>
<?php If (file_exists("STHSSetting.php") == true){
require_once "STHSSetting.php";
$db = new SQLite3($DatabaseFile);
include "Menu.php";}?>
<div class="STHSTopLink"><a id="STHSRosterTop"></a> <a href="#Avalanche">Avalanche</a> | <a href="#Blackhawks">Blackhawks</a> | <a href="#BlueJackets">Blue Jackets</a> | <a href="#Blues">Blues</a> | <a href="#Bruins">Bruins</a> | <a href="#Canadiens">Canadiens</a> | <a href="#Canucks">Canucks</a> | <a href="#Capitals">Capitals</a> | <a href="#Devils">Devils</a> | <a href="#Ducks">Ducks</a> | <a href="#Flames">Flames</a> | <a href="#Flyers">Flyers</a> | <a href="#GoldenKnights">Golden Knights</a> | <a href="#Hurricanes">Hurricanes</a> | <a href="#Islanders">Islanders</a> | <a href="#Jets">Jets</a> | <a href="#Kings">Kings</a> | <a href="#Kraken">Kraken</a> | <a href="#Lightning">Lightning</a> | <a href="#MapleLeafs">Maple Leafs</a> | <a href="#Oilers">Oilers</a> | <a href="#Panthers">Panthers</a> | <a href="#Penguins">Penguins</a> | <a href="#Predators">Predators</a> | <a href="#Rangers">Rangers</a> | <a href="#RedWings">Red Wings</a> | <a href="#Sabres">Sabres</a> | <a href="#Senators">Senators</a> | <a href="#Sharks">Sharks</a> | <a href="#Stars">Stars</a> | <a href="#UtahHockeyClub">Utah Hockey Club</a> | <a href="#Wild">Wild</a> | <a href="javascript:STHS_JS_CloseAll('');">Close All Team View</a> | <a href="javascript:STHS_JS_OpenAll('');">Open All Team View</a>
 | <a href="#SalaryCapCentrale">Salary Cap Centrale Report</a></div>
<h1 class="TeamFinancePro_COL"><a id="Avalanche">Avalanche</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=8">Avalanche Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Avalanche">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Avalanche">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Avalanche');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Avalanche" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Ball Arena</td></tr>
<tr><td>Level 1: </td><td>6004 - $120 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5000 - $75 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2001 - $43 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4001 - $30 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1001 - $230 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18007</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$76,963,333</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,356,139</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$299,822,504</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$299,822,504</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Nathan MacKinnon</td>
<td>$12,600,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$12,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$11,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$11,900,000</td></tr>
<tr><td>Brayden Point</td>
<td>$9,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,194,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,194,444</td></tr>
<tr><td>Adam Fox</td>
<td>$9,500,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,428,125</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,428,125</td></tr>
<tr><td>Jesper Bratt</td>
<td>$7,875,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,875,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,875,000</td></tr>
<tr><td>Ryan Nugent-Hopkins</td>
<td>$5,125,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,222,222</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,222,222</td></tr>
<tr><td>Spencer Knight</td>
<td>$4,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,606,250</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,606,250</td></tr>
<tr><td>Bowen Byram</td>
<td>$3,850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,850,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,850,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,850,000</td></tr>
<tr><td>Jonas Siegenthaler</td>
<td>$3,400,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,020,833</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,020,833</td></tr>
<tr><td>Adam Lowry</td>
<td>$3,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,194,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,194,444</td></tr>
<tr><td>Mario Ferraro</td>
<td>$3,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td>Sergei Bobrovsky</td>
<td>$3,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>Nicolas Roy</td>
<td>$3,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>Eetu Luostarinen</td>
<td>$3,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,625,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,625,000</td></tr>
<tr><td>Zach Bogosian</td>
<td>$1,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,116,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,116,667</td></tr>
<tr><td>Logan O'Connor</td>
<td>$1,050,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,050,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$968,750</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$968,750</td></tr>
<tr><td>Curtis Lazar</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Adam Fantilli</td>
<td>$950,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$950,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$950,000</td></tr>
<tr><td>Jack Quinn</td>
<td>$863,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$863,333</td></tr>
<tr><td>Oliver Wahlstrom</td>
<td>$0 (0)</td></tr>
<tr><td>Logan Stanley</td>
<td>$0 (0)</td></tr>
<tr><td>Connor Dewar</td>
<td>$0 (0)</td></tr>
<tr><td>Thomas Harley</td>
<td>$0 (0)</td></tr>
<tr><td>Lucas Raymond</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $76,963,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $70,200,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $54,000,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $48,000,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $73,065,068</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $66,382,985</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $51,265,624</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $45,640,624</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $76,963,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $70,200,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $54,000,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $48,000,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Liam Ohgren</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Alex Laferriere</td>
<td>$87,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,500</td></tr>
<tr><td>Matthew Poitras</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Matthew Maggio</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Max Sasson</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>David Spacek</td>
<td>$86,250 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,250</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,250</td></tr>
<tr><td>Talyn Boyko</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,083</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,083</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,083</td></tr>
<tr><td>Tyson Kozak</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,000</td></tr>
<tr><td>Samuel Knazko</td>
<td>$84,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,750</td></tr>
<tr><td>Francesco Pinelli</td>
<td>$84,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,500</td></tr>
<tr><td>Anttoni Honka</td>
<td>$83,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Remi Poirier</td>
<td>$83,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Eemil Viro</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Nolan Allan</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Ty Voit</td>
<td>$80,056 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,056</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,056</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,056</td></tr>
<tr><td>William Lockwood</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Spencer Stastney</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Dustin Wolf</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Mike Hardman</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>19</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,356,139</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $599,139</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,356,139</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $599,139</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_CHI"><a id="Blackhawks">Blackhawks</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=7">Blackhawks Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Blackhawks">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Blackhawks">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Blackhawks');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Blackhawks" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">United Center</td></tr>
<tr><td>Level 1: </td><td>5400 - $135 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5810 - $80 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2501 - $49 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4503 - $37 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1503 - $275 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>19717</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$72,345,667</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,371,057</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$1,650,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$127,484,232</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$127,484,232</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Auston Matthews</td>
<td>$13,250,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$13,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$12,928,050</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$12,928,050</td></tr>
<tr><td>Roman Josi</td>
<td>$9,059,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,059,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,496,889</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,496,889</td></tr>
<tr><td>Brayden Schenn</td>
<td>$6,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,347,222</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,347,222</td></tr>
<tr><td>Ondrej Palat</td>
<td>$6,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td>Evander Kane</td>
<td>$5,125,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,521,739</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,521,739</td></tr>
<tr><td>Jesperi Kotkaniemi</td>
<td>$4,820,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,820,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,962,226</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,962,226</td></tr>
<tr><td>Rasmus Sandin</td>
<td>$4,600,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,066,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,066,667</td></tr>
<tr><td>Christian Dvorak</td>
<td>$4,450,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,450,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,934,167</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,934,167</td></tr>
<tr><td>John Marino</td>
<td>$4,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,903,571</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,903,571</td></tr>
<tr><td>Nino Niederreiter</td>
<td>$4,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Scott Mayfield</td>
<td>$3,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td>Marc-Andre Fleury</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>Isac Lundestrom</td>
<td>$1,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,650,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,650,000</td></tr>
<tr><td>Rafael Harvey-Pinard</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td>Zac Dalpe</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Johnathan Kovacevic</td>
<td>$766,667 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Justin Barron</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $72,345,667</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $61,254,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $56,129,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $41,729,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $69,943,865</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $58,726,364</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $54,204,625</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $40,301,054</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $72,345,667</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $61,254,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $56,129,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $41,729,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Lian Bichsel</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Jakub Dobes</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Drew Helleson</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Xavier Bourgault</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Mavrik Bourque</td>
<td>$89,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,417</td></tr>
<tr><td>Emil Martinsen Lilleberg</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Parker Ford</td>
<td>$86,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Henry Rybinski</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Aleksander Kisakov</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Will Cranley</td>
<td>$84,167 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,167</td></tr>
<tr><td>Samu Tuomaala</td>
<td>$83,083 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,083</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,083</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,083</td></tr>
<tr><td>Ryan Mast</td>
<td>$83,056 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,056</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,056</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,056</td></tr>
<tr><td>Vasily Ponomarev</td>
<td>$79,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,500</td></tr>
<tr><td>Olle Lycksell</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,750</td></tr>
<tr><td>Albert Johansson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,750</td></tr>
<tr><td>Tobias Bjornfot</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Isaak Phillips</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Otto Koivula</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Travis Barron</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>19</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,371,057</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $261,139</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,373,307</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $261,139</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_CBJ"><a id="BlueJackets">Blue Jackets</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=9">Blue Jackets Page</a> ]
[ <a href="LHSQC-TeamFinance.php#BlueJackets">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#BlueJackets">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_BlueJackets');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_BlueJackets" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Nationwide Arena</td></tr>
<tr><td>Level 1: </td><td>6022 - $125 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5041 - $75 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2026 - $44 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4026 - $37 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1026 - $250 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18141</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$78,950,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,320,582</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$238,164,778</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$238,164,778</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Connor McDavid</td>
<td>$12,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$12,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$11,213,889</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$11,213,889</td></tr>
<tr><td>David Pastrnak</td>
<td>$11,250,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$11,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$10,740,740</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$10,740,740</td></tr>
<tr><td>Rasmus Dahlin</td>
<td>$11,000,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$11,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$10,444,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$10,444,444</td></tr>
<tr><td>Kirill Kaprizov</td>
<td>$9,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,000,000</td></tr>
<tr><td>Roope Hintz</td>
<td>$8,450,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,450,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,861,111</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,861,111</td></tr>
<tr><td>Gustav Forsling</td>
<td>$5,750,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,407,408</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,407,408</td></tr>
<tr><td>Trevor Zegras</td>
<td>$5,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,750,000</td></tr>
<tr><td>Erik Cernak</td>
<td>$5,200,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,950,000</td></tr>
<tr><td>Radek Faksa</td>
<td>$3,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td>Travis Hamonic</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td>Charlie Lindgren</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td>Nils Hoglander</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td>Rasmus Kupari</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Brock Faber</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>Luke Glendening</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$800,000</td></tr>
<tr><td>Ty Smith</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Nicholas Robertson</td>
<td>$0 (0)</td></tr>
<tr><td>Martin Necas</td>
<td>$0 (0)</td></tr>
<tr><td>Josh Mahura</td>
<td>$0 (0)</td></tr>
<tr><td>Connor McMichael</td>
<td>$0 (0)</td></tr>
<tr><td>Jonatan Berggren</td>
<td>$0 (0)</td></tr>
<tr><td>Dawson Mercer</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $78,950,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $68,900,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $41,650,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $41,650,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $75,417,592</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $65,367,592</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $39,403,703</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $39,403,703</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $78,950,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $68,900,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $41,650,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $41,650,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Nick Perbix</td>
<td>$112,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$112,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$112,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$112,500</td></tr>
<tr><td>Vasily Podkolzin</td>
<td>$100,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$100,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$97,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$97,500</td></tr>
<tr><td>Valtteri Pulli</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Shane Wright</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Jiri Kulich</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Pavel Mintyukov</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Sebastian Cossa</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Ronnie Attard</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,000</td></tr>
<tr><td>Olen Zellweger</td>
<td>$84,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,417</td></tr>
<tr><td>Ozzy Wiesblatt</td>
<td>$83,583 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,583</td></tr>
<tr><td>Alex Alexeyev</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,778</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,778</td></tr>
<tr><td>Logan Stankoven</td>
<td>$81,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,417</td></tr>
<tr><td>Lukas Cormier</td>
<td>$79,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,333</td></tr>
<tr><td>Matt Tomkins</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Emilio Pettersen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Hardy Haman Aktell</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Karl Henriksson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Martin Kaut</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,320,582</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $627,666</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,319,360</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $625,166</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_STL"><a id="Blues">Blues</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=25">Blues Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Blues">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Blues">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Blues');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Blues" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Entreprise Center</td></tr>
<tr><td>Level 1: </td><td>6255 - $115 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4073 - $65 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2256 - $40 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4256 - $28 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1256 - $175 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18096</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$87,347,500</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,301,749</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$150,509,175</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$150,509,175</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>William Nylander</td>
<td>$11,500,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$11,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$10,995,819</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$10,995,819</td></tr>
<tr><td>Patrik Laine</td>
<td>$8,700,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,700,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,700,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,700,000</td></tr>
<tr><td>Dylan Larkin</td>
<td>$8,700,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,700,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,411,111</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,411,111</td></tr>
<tr><td>Jason Robertson</td>
<td>$7,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,750,000</td></tr>
<tr><td>Aaron Ekblad</td>
<td>$7,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>Adrian Kempe</td>
<td>$5,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,800,000</td></tr>
<tr><td>Jared McCann</td>
<td>$5,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,656,666</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,656,666</td></tr>
<tr><td>Thatcher Demko</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,341,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,341,667</td></tr>
<tr><td>Jakob Chychrun</td>
<td>$4,600,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,075,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,075,000</td></tr>
<tr><td>Noah Dobson</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Tommy Novak</td>
<td>$3,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td>Jake Walman</td>
<td>$3,400,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,812,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,812,500</td></tr>
<tr><td>Scott Laughton</td>
<td>$3,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,883,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,883,333</td></tr>
<tr><td>Ryan McLeod</td>
<td>$2,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td>Brett Howden</td>
<td>$1,900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,900,000</td></tr>
<tr><td>Logan Cooley</td>
<td>$950,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$950,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$950,000</td></tr>
<tr><td>Josh Doan</td>
<td>$925,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>Luke Hughes</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>JJ Peterka</td>
<td>$855,833 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$855,833</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$855,833</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$855,833</td></tr>
<tr><td>Ian Mitchell</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Logan Thompson</td>
<td>$766,667 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Seth Jarvis</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $87,347,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $63,925,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $28,700,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $20,200,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $77,056,929</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $60,726,096</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $27,563,596</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $19,406,930</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $87,347,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $63,925,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $28,700,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $20,200,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Jordan Harris</td>
<td>$140,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$140,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$121,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$121,417</td></tr>
<tr><td>Nikita Tolopilo</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Daniel Torgersson</td>
<td>$86,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Helge Grans</td>
<td>$84,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,750</td></tr>
<tr><td>Pavel Novak</td>
<td>$84,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Fraser Minten</td>
<td>$84,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,583</td></tr>
<tr><td>Jake Chiasson</td>
<td>$84,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,333</td></tr>
<tr><td>Will Cuylle</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Elliot Desnoyers</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Matt Rempe</td>
<td>$82,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,000</td></tr>
<tr><td>Jorian Donovan</td>
<td>$81,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,833</td></tr>
<tr><td>Mitchell Chaffee</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,167</td></tr>
<tr><td>Cole Reinhardt</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,417</td></tr>
<tr><td>Marc Johnstone</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Trent Miner</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,167</td></tr>
<tr><td>Liam Foudy</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Rasmus Asplund</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Michael Callahan</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Robin Salo</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Louis Crevier</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Mads Sogaard</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Mac Hollowell</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,301,749</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $330,749</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,286,917</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $329,916</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_BOS"><a id="Bruins">Bruins</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=3">Bruins Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Bruins">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Bruins">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Bruins');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Bruins" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">TD Garden</td></tr>
<tr><td>Level 1: </td><td>6190 - $123 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5025 - $73 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2125 - $44 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4125 - $28 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>100 - $233 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>17565</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$78,178,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,195,417</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$1,200,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$117,027,225</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$117,027,225</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Mitchell Marner</td>
<td>$10,903,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$10,903,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$10,903,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$10,903,000</td></tr>
<tr><td>Mathew Barzal</td>
<td>$9,150,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,150,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,911,111</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,911,111</td></tr>
<tr><td>Morgan Rielly</td>
<td>$7,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,222,222</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,222,222</td></tr>
<tr><td>Brandon Hagel</td>
<td>$6,500,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,944,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,944,444</td></tr>
<tr><td>Alex Killorn</td>
<td>$6,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td>Jordan Binnington</td>
<td>$6,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,771,429</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,771,429</td></tr>
<tr><td>Vladislav Gavrikov</td>
<td>$5,875,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,850,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,850,000</td></tr>
<tr><td>Vincent Trocheck</td>
<td>$5,625,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,625,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,625,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,625,000</td></tr>
<tr><td>Blake Coleman</td>
<td>$4,900,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,900,000</td></tr>
<tr><td>Brandon Saad</td>
<td>$4,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Niko Mikkola</td>
<td>$2,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>Lars Eller</td>
<td>$2,450,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,450,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,450,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,450,000</td></tr>
<tr><td>Carl Grundstrom</td>
<td>$1,800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,800,000</td></tr>
<tr><td>Alexey Toropchenko</td>
<td>$1,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$400,000</td></tr>
<tr><td>Jake Middleton</td>
<td>$1,225,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,225,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,725,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,725,000</td></tr>
<tr><td>Arvid Soderblom</td>
<td>$962,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$962,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$936,250</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$936,250</td></tr>
<tr><td>Joel Hanley</td>
<td>$787,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$787,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$787,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$787,500</td></tr>
<tr><td>Barrett Hayton</td>
<td>$0 (0)</td></tr>
<tr><td>Egor Zamula</td>
<td>$0 (0)</td></tr>
<tr><td>Parker Kelly</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $78,178,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $59,075,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $50,275,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $33,125,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $77,475,956</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,149,206</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $48,349,206</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $31,427,777</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $78,178,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $55,950,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $47,150,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $30,000,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Brad Lambert</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Zach Benson</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Joakim Kemell</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>John Farinacci</td>
<td>$91,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,000</td></tr>
<tr><td>Calle Clang</td>
<td>$87,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,833</td></tr>
<tr><td>Maxwell Crozier</td>
<td>$86,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Kim Nousiainen</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Artur Akhtiamov</td>
<td>$85,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,167</td></tr>
<tr><td>Ole Bjorgvik-Holm</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Artyom Grushnikov</td>
<td>$81,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,417</td></tr>
<tr><td>Djibril Toure</td>
<td>$80,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,500</td></tr>
<tr><td>Brian Halonen</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Patrick Giles</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,750</td></tr>
<tr><td>Lucas Condotta</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Nikita Nesterenko</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Layton Ahac</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Adam Raska</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Filip Hallander</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,195,417</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $588,917</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,201,667</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $595,167</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_MTL"><a id="Canadiens">Canadiens</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=16">Canadiens Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Canadiens">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Canadiens">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Canadiens');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Canadiens" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Bell Center</td></tr>
<tr><td>Level 1: </td><td>6654 - $95 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5654 - $60 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2655 - $22 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4655 - $18 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1655 - $100 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>21273</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$60,938,333</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,366,166</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$52,170,311</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$52,170,311</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>John Tavares</td>
<td>$11,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$11,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$11,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$11,000,000</td></tr>
<tr><td>Robert Thomas</td>
<td>$8,125,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,533,334</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,533,334</td></tr>
<tr><td>Anze Kopitar</td>
<td>$7,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td>Kris Letang</td>
<td>$6,100,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,100,000</td></tr>
<tr><td>Evgeni Malkin</td>
<td>$6,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,100,000</td></tr>
<tr><td>Elvis Merzlikins</td>
<td>$5,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,166,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,166,667</td></tr>
<tr><td>Oliver Bjorkstrand</td>
<td>$5,400,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,916,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,916,667</td></tr>
<tr><td>Rasmus Andersson</td>
<td>$4,550,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,550,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,007,976</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,007,976</td></tr>
<tr><td>Sam Montembeault</td>
<td>$3,150,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,150,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,612,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,612,500</td></tr>
<tr><td>Jake Evans</td>
<td>$1,700,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,700,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,462,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,462,500</td></tr>
<tr><td>Marco Rossi</td>
<td>$863,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$863,333</td></tr>
<tr><td>Joel Hofer</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$781,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$781,667</td></tr>
<tr><td>Connor Mackey</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Jakob Pelletier</td>
<td>$0 (0)</td></tr>
<tr><td>Henri Jokiharju</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>15</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $60,938,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $46,600,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $22,775,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $14,225,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $59,319,644</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,212,144</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $21,412,501</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $13,633,334</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $60,938,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $46,600,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $22,775,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $14,225,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Quentin Musty</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Easton Cowan</td>
<td>$93,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$93,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$93,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$93,583</td></tr>
<tr><td>Devon Levi</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Filip Mesar</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>William Stromgren</td>
<td>$90,083 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$90,083</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$90,083</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$90,083</td></tr>
<tr><td>Anton Wahlberg</td>
<td>$89,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,667</td></tr>
<tr><td>Ty Glover</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Rory Kerins</td>
<td>$84,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Garin Bjorklund</td>
<td>$84,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,333</td></tr>
<tr><td>Jacob Melanson</td>
<td>$84,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,333</td></tr>
<tr><td>Jack Thompson</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Vincent Iorio</td>
<td>$81,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,417</td></tr>
<tr><td>Jack Ahcan</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Angus Crookshank</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,667</td></tr>
<tr><td>Mark Friedman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Andre Lee</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,938</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,938</td></tr>
<tr><td>John Leonard</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Riley Sutter</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Mitchell Gibson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>19</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,366,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $541,583</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,374,770</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $541,583</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_VAN"><a id="Canucks">Canucks</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=29">Canucks Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Canucks">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Canucks">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Canucks');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Canucks" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Rogers Arena</td></tr>
<tr><td>Level 1: </td><td>6568 - $115 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5085 - $72 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2086 - $40 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4085 - $30 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1086 - $185 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18910</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$57,023,383</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,535,251</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$3,333,333</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$159,178,384</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$159,178,384</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Nicklas Backstrom</td>
<td>$9,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,783,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,783,333</td></tr>
<tr><td>Thomas Chabot</td>
<td>$8,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,207,037</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,207,037</td></tr>
<tr><td>Josh Norris</td>
<td>$7,950,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,950,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,950,000</td></tr>
<tr><td>Joel Farabee</td>
<td>$5,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,417,857</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,417,857</td></tr>
<tr><td>Conor Garland</td>
<td>$4,950,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,950,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,950,000</td></tr>
<tr><td>Joonas Korpisalo</td>
<td>$4,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Trevor van Riemsdyk</td>
<td>$3,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,487,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,487,500</td></tr>
<tr><td>Jalen Chatfield</td>
<td>$3,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,440,625</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,440,625</td></tr>
<tr><td>Luke Kunin</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td>Casey Cizikas</td>
<td>$2,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$400,000</td></tr>
<tr><td>Alexandre Texier</td>
<td>$2,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,908,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,908,333</td></tr>
<tr><td>Ryan Donato</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Juraj Slafkovsky</td>
<td>$950,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$950,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$950,000</td></tr>
<tr><td>Jake Neighbours</td>
<td>$835,883 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$835,883</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$835,883</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$835,883</td></tr>
<tr><td>Jonny Brodzinski</td>
<td>$787,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$787,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$779,167</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$779,167</td></tr>
<tr><td>Ryan Lindgren</td>
<td>$0 (0)</td></tr>
<tr><td>Kole Lind</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,023,383</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $41,287,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $30,450,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $24,950,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $51,859,735</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $36,540,519</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $26,415,519</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $23,574,894</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,023,383</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $41,287,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $30,450,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $24,950,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Ryan Johnson</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Simon Edvinsson</td>
<td>$89,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,417</td></tr>
<tr><td>Alexander Holtz</td>
<td>$89,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,417</td></tr>
<tr><td>Shakir Mukhamadullin</td>
<td>$89,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,417</td></tr>
<tr><td>Travis Mitchell</td>
<td>$88,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$88,250</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$88,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$88,250</td></tr>
<tr><td>Christian Kyrou</td>
<td>$87,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,833</td></tr>
<tr><td>Brett Berard</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Zachary Bolduc</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>William Dufour</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>William Trudeau</td>
<td>$85,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,667</td></tr>
<tr><td>Antonio Stranges</td>
<td>$84,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Brady Stonehouse</td>
<td>$84,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,500</td></tr>
<tr><td>Justus Annunen</td>
<td>$83,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,667</td></tr>
<tr><td>Danila Klimovich</td>
<td>$83,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,333</td></tr>
<tr><td>Daniil Chayka</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Matthew Kessel</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,792</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,792</td></tr>
<tr><td>Nathan Todd</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Jacob Moverare</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,083</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,083</td></tr>
<tr><td>Corey Andonovski</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>James Hamblin</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Bobby Brink</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,535,251</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $841,916</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,535,543</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $842,208</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_WSH"><a id="Capitals">Capitals</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=30">Capitals Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Capitals">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Capitals">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Capitals');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Capitals" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Capital One Arena</td></tr>
<tr><td>Level 1: </td><td>6033 - $120 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5133 - $72 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2140 - $48 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4133 - $32 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1134 - $224 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18573</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$66,215,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,331,500</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$231,821,152</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$231,821,152</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Mikhail Sergachev</td>
<td>$8,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,088,889</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,088,889</td></tr>
<tr><td>Tim Stutzle</td>
<td>$8,350,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,350,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,350,000</td></tr>
<tr><td>Alex DeBrincat</td>
<td>$7,875,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,875,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,875,000</td></tr>
<tr><td>Dylan Cozens</td>
<td>$7,100,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,324,271</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,324,271</td></tr>
<tr><td>Adam Pelech</td>
<td>$5,750,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,750,000</td></tr>
<tr><td>Jaden Schwartz</td>
<td>$5,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td>Dylan DeMelo</td>
<td>$4,900,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,220,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,220,000</td></tr>
<tr><td>Ilya Mikheyev</td>
<td>$4,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td>Brian Dumoulin</td>
<td>$3,150,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,150,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,150,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,150,000</td></tr>
<tr><td>Andrew Peeke</td>
<td>$2,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,259,375</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,259,375</td></tr>
<tr><td>Martin Fehervary</td>
<td>$2,675,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,675,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,675,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,675,000</td></tr>
<tr><td>Tanner Jeannot</td>
<td>$2,665,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,665,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,665,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,665,000</td></tr>
<tr><td>Morgan Barron</td>
<td>$1,350,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,350,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,350,000</td></tr>
<tr><td>Michael McCarron</td>
<td>$900,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$858,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$858,333</td></tr>
<tr><td>Kent Johnson</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>15</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $66,215,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $59,050,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $42,475,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $34,600,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $63,815,868</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $56,650,868</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $40,608,160</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $32,733,160</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $66,215,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $59,050,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $42,475,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $34,600,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Jani Nyman</td>
<td>$92,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,333</td></tr>
<tr><td>Emil Andrae</td>
<td>$90,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$90,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$90,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$90,333</td></tr>
<tr><td>Tristen Nielsen</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Sawyer Mynio</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Emil Pieniniemi</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Gannon Laroque</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,722</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,722</td></tr>
<tr><td>Zachary Uens</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Vadim Zherenko</td>
<td>$84,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Leevi Merilainen</td>
<td>$82,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,000</td></tr>
<tr><td>Michael Pezzetta</td>
<td>$81,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,250</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,167</td></tr>
<tr><td>Tristen Robins</td>
<td>$79,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,750</td></tr>
<tr><td>Jonas Johansson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Matej Blumel</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,000</td></tr>
<tr><td>Gage Goncalves</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,750</td></tr>
<tr><td>Nathan Legare</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,208</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,208</td></tr>
<tr><td>Axel Jonsson-Fjallby</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Waltteri Merela</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Brady Lyle</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Adam Beckman</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Artemi Knyazev</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Adam Ruzicka</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>David Gustafsson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Vitali Kravtsov</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,331,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $443,416</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,338,847</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $442,388</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_NJ "><a id="Devils">Devils</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=18">Devils Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Devils">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Devils">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Devils');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Devils" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Prudential Center</td></tr>
<tr><td>Level 1: </td><td>6200 - $85 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4000 - $60 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2000 - $40 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3104 - $25 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1210 - $120 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>16514</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$73,958,334</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,237,501</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$29,427,380</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$29,427,380</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Johnny Gaudreau</td>
<td>$9,750,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,750,000</td></tr>
<tr><td>Alex Pietrangelo</td>
<td>$8,800,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,800,000</td></tr>
<tr><td>Jordan Kyrou</td>
<td>$8,125,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,533,334</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,533,334</td></tr>
<tr><td>Jared Spurgeon</td>
<td>$7,575,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,575,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,276,562</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,276,562</td></tr>
<tr><td>Clayton Keller</td>
<td>$7,150,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,150,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,453,981</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,453,981</td></tr>
<tr><td>Jonas Brodin</td>
<td>$6,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,770,833</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,770,833</td></tr>
<tr><td>Andrew Mangiapane</td>
<td>$5,800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,800,000</td></tr>
<tr><td>Tristan Jarry</td>
<td>$5,375,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,375,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,375,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,375,000</td></tr>
<tr><td>Mike Matheson</td>
<td>$4,875,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,875,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,875,000</td></tr>
<tr><td>Pavel Zacha</td>
<td>$4,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Ryan Poehling</td>
<td>$1,900,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,733,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,733,333</td></tr>
<tr><td>Simon Benoit</td>
<td>$1,350,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,206,250</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,206,250</td></tr>
<tr><td>Mason McTavish</td>
<td>$894,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$894,167</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$894,167</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$894,167</td></tr>
<tr><td>Jean-Luc Foudy</td>
<td>$847,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$847,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$847,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$847,500</td></tr>
<tr><td>Joseph Woll</td>
<td>$766,667 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$762,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$762,500</td></tr>
<tr><td>Andrew Agozzino</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>16</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $73,958,334</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $65,650,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $58,875,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $36,400,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $71,578,460</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $63,274,293</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $56,665,960</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $34,883,148</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $73,958,334</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $65,650,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $58,875,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $36,400,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Hunter Haight</td>
<td>$89,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,750</td></tr>
<tr><td>Elias Pettersson</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Evan Nause</td>
<td>$86,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,417</td></tr>
<tr><td>Zach Dean</td>
<td>$85,250 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,250</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,250</td></tr>
<tr><td>Ryan Hofer</td>
<td>$85,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,167</td></tr>
<tr><td>Alexander Suzdalev</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Dennis Hildeby</td>
<td>$84,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,333</td></tr>
<tr><td>Judd Caulfield</td>
<td>$83,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,750</td></tr>
<tr><td>Brett Harrison</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Mikey Eyssimont</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,333</td></tr>
<tr><td>Nikolas Matinpalo</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,000</td></tr>
<tr><td>Kyle MacLean</td>
<td>$77,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,125</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,125</td></tr>
<tr><td>Hugh McGing</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Ben Gleason</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Kale Clague</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Pavol Regenda</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Arturs Silovs</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jacob Christiansen</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Ryan McGregor</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Brandon Biro</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jaret Anderson-Dolan</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,237,501</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $756,918</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $77,500</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,241,959</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $757,543</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $78,125</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_ANA"><a id="Ducks">Ducks</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=1">Ducks Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Ducks">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Ducks">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Ducks');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Ducks" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Honda Center</td></tr>
<tr><td>Level 1: </td><td>5841 - $125 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4833 - $75 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>1833 - $44 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3833 - $37 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>834 - $250 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>17174</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$70,256,190</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,939,280</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$3,875,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$96,798,219</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$96,798,219</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Bo Horvat</td>
<td>$8,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,166,666</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,166,666</td></tr>
<tr><td>Jake Sanderson</td>
<td>$8,050,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,050,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,258,334</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,258,334</td></tr>
<tr><td>John Carlson</td>
<td>$8,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td>Kevin Fiala</td>
<td>$7,875,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,528,125</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,528,125</td></tr>
<tr><td>Andrei Svechnikov</td>
<td>$7,750,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,750,000</td></tr>
<tr><td>Kyle Connor</td>
<td>$7,142,857 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,142,857</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,142,857</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,142,857</td></tr>
<tr><td>Kyle Palmieri</td>
<td>$5,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Ryan O'Reilly</td>
<td>$4,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Pierre Engvall</td>
<td>$3,000,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>Jordan Staal</td>
<td>$2,900,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,900,000</td></tr>
<tr><td>Karel Vejmelka</td>
<td>$2,725,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,725,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,254,375</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,254,375</td></tr>
<tr><td>Sonny Milano</td>
<td>$1,900,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,612,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,612,500</td></tr>
<tr><td>Jonathan Quick</td>
<td>$1,275,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,275,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,050,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,050,000</td></tr>
<tr><td>Kaiden Guhle</td>
<td>$863,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$863,333</td></tr>
<tr><td>Riley Nash</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>15</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $70,256,190</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $59,617,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $42,575,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $35,175,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $67,801,190</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,858,482</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $41,103,125</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $33,703,125</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $70,256,190</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $59,617,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $42,575,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $35,175,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Ryan Ellis</td>
<td>$625,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$625,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$583,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$583,333</td></tr>
<tr><td>Alexei Kolosov</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Matthew Savoie</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Cayden Primeau</td>
<td>$89,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,000</td></tr>
<tr><td>Jalen Luypen</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Jaxsen Wiebe</td>
<td>$85,280 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,280</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,280</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,280</td></tr>
<tr><td>Tyrel Bauer</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,000</td></tr>
<tr><td>Joshua Roy</td>
<td>$83,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,500</td></tr>
<tr><td>Jeremie Poirier</td>
<td>$82,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,333</td></tr>
<tr><td>Jack Finley</td>
<td>$79,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,750</td></tr>
<tr><td>Max Willman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Drake Caggiula</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Shane Bowers</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Jonathan Gruden</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Matt Kiersted</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$76,875</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$76,875</td></tr>
<tr><td>Jake Leschyshyn</td>
<td>$76,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$76,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$76,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$76,667</td></tr>
<tr><td>Brandon Gignac</td>
<td>$75,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$75,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$76,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$76,250</td></tr>
<tr><td>Dmitri Samorukov</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,939,280</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,133,113</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $625,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,898,238</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,091,446</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $583,333</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_CGY"><a id="Flames">Flames</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=5">Flames Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Flames">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Flames">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Flames');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Flames" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Scotiabank Saddledome</td></tr>
<tr><td>Level 1: </td><td>7832 - $115 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4932 - $70 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>1859 - $50 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3833 - $33 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>833 - $300 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>19289</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$58,976,666</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,513,334</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$119,493,642</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$119,493,642</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Jack Eichel</td>
<td>$10,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$10,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,991,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,991,667</td></tr>
<tr><td>Seth Jones</td>
<td>$9,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,044,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,044,444</td></tr>
<tr><td>Brad Marchand</td>
<td>$6,125,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Casey Mittelstadt</td>
<td>$5,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,937,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,937,500</td></tr>
<tr><td>Phillip Danault</td>
<td>$5,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td>Jason Dickinson</td>
<td>$4,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,716,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,716,667</td></tr>
<tr><td>Carson Soucy</td>
<td>$3,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td>Dakota Joshua</td>
<td>$3,250,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,765,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,765,000</td></tr>
<tr><td>Gustav Nyquist</td>
<td>$3,185,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,185,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,185,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,185,000</td></tr>
<tr><td>Juuso Valimaki</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,666,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Pyotr Kochetkov</td>
<td>$2,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Samuel Ersson</td>
<td>$1,450,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,450,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,253,056</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,253,056</td></tr>
<tr><td>Darren Raddysh</td>
<td>$975,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$975,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$904,167</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$904,167</td></tr>
<tr><td>Elmer Soderblom</td>
<td>$878,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$878,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$878,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$878,333</td></tr>
<tr><td>Tyson Foerster</td>
<td>$863,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$863,333</td></tr>
<tr><td>Pavel Dorofeyev</td>
<td>$0 (0)</td></tr>
<tr><td>Juuso Parssinen</td>
<td>$0 (0)</td></tr>
<tr><td>Jeremy Swayman</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,976,666</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $47,925,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $26,000,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $12,750,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $53,455,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $44,029,168</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $24,246,944</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $11,809,444</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,976,666</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $47,925,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $26,000,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $12,750,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Drew Commesso</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Brendan Brisson</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Noah Ostlund</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Nathan Gaucher</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Owen Beck</td>
<td>$88,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$88,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$88,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$88,500</td></tr>
<tr><td>Josh Filmon</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Kalan Lind</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Oskar Olausson</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Jakub Demek</td>
<td>$85,168 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,168</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,168</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,168</td></tr>
<tr><td>Elias Salomonsson</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Arshdeep Bains</td>
<td>$81,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,667</td></tr>
<tr><td>Luke Prokop</td>
<td>$79,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,333</td></tr>
<tr><td>Ales Stezka</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,250</td></tr>
<tr><td>Luke Henman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,333</td></tr>
<tr><td>Ryan Suzuki</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,917</td></tr>
<tr><td>Brogan Rafferty</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Trey Fix-Wolansky</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Joe Hicketts</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Adam Wilsby</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Samuel Walker</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Ty Emberson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Cole Sillinger</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Alec Regula</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Zach Sawchenko</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>24</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,513,334</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $794,834</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,523,334</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $794,834</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_PHI"><a id="Flyers">Flyers</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=22">Flyers Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Flyers">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Flyers">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Flyers');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Flyers" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Wells Fargo Center</td></tr>
<tr><td>Level 1: </td><td>6302 - $150 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5301 - $71 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2332 - $43 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4301 - $34 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1301 - $271 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>19537</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$67,224,047</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$932,965</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$218,641,837</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$218,641,837</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Aleksander Barkov</td>
<td>$10,000,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$10,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,544,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,544,444</td></tr>
<tr><td>Dougie Hamilton</td>
<td>$9,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,000,000</td></tr>
<tr><td>Filip Hronek</td>
<td>$7,250,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,933,334</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,933,334</td></tr>
<tr><td>Matt Boldy</td>
<td>$7,000,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,235,104</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,235,104</td></tr>
<tr><td>Anthony Cirelli</td>
<td>$6,250,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,088,889</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,088,889</td></tr>
<tr><td>Mattias Samuelsson</td>
<td>$4,285,714 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,285,714</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>Ross Colton</td>
<td>$4,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Alexander Kerfoot</td>
<td>$3,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td>Matias Maccelli</td>
<td>$3,425,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,425,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,425,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,425,000</td></tr>
<tr><td>Stuart Skinner</td>
<td>$2,600,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,137,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,137,500</td></tr>
<tr><td>Dante Fabbro</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>Trent Frederic</td>
<td>$2,300,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,300,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,300,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,300,000</td></tr>
<tr><td>Dan Vladar</td>
<td>$2,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,716,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,716,667</td></tr>
<tr><td>Justin Danforth</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,037,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,037,500</td></tr>
<tr><td>Leo Carlsson</td>
<td>$950,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$950,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$950,000</td></tr>
<tr><td>Ridly Greig</td>
<td>$863,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$863,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>16</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $67,224,047</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $54,760,714</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $47,785,714</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $43,785,714</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $61,156,771</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $49,239,271</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $42,726,771</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $38,726,771</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $67,224,047</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $54,760,714</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $47,785,714</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $43,785,714</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Paul Ludwinski</td>
<td>$93,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$93,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$93,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$93,167</td></tr>
<tr><td>Antti Saarela</td>
<td>$89,625 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,625</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,625</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,625</td></tr>
<tr><td>Gavin Hayes</td>
<td>$89,617 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,617</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,617</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,617</td></tr>
<tr><td>Tyler Boucher</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Henri Nikkanen</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Ryan O'Rourke</td>
<td>$85,583 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,583</td></tr>
<tr><td>Josh Davies</td>
<td>$85,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,500</td></tr>
<tr><td>Tanner Dickinson</td>
<td>$82,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,667</td></tr>
<tr><td>Dmitri Kuzmin</td>
<td>$79,556 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,556</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,556</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,556</td></tr>
<tr><td>Akil Thomas</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Adam Ginning</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,125</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,125</td></tr>
<tr><td>Nick Caamano</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Marcus Kallionkieli</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Eetu Makiniemi</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Arvid Holm</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Henry Thrun</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Lucas Johansen</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $932,965</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $589,173</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $936,590</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $592,798</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_VGK"><a id="GoldenKnights">Golden Knights</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=31">Golden Knights Page</a> ]
[ <a href="LHSQC-TeamFinance.php#GoldenKnights">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#GoldenKnights">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_GoldenKnights');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_GoldenKnights" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">T-Mobile Arena</td></tr>
<tr><td>Level 1: </td><td>6000 - $130 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4000 - $72 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>3000 - $37 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3000 - $29 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1500 - $205 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>17500</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$61,705,833</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,194,166</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$119,533,923</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$119,533,923</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Drew Doughty</td>
<td>$11,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$11,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$10,555,556</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$10,555,556</td></tr>
<tr><td>Zach Werenski</td>
<td>$9,583,333 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,583,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,928,571</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,928,571</td></tr>
<tr><td>Evgeny Kuznetsov</td>
<td>$7,800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,800,000</td></tr>
<tr><td>Ryan Pulock</td>
<td>$6,150,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,150,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,022,222</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,022,222</td></tr>
<tr><td>Brock Nelson</td>
<td>$6,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td>Calvin Petersen</td>
<td>$5,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,964,583</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,964,583</td></tr>
<tr><td>Sam Bennett</td>
<td>$4,425,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,425,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,425,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,425,000</td></tr>
<tr><td>Jake Allen</td>
<td>$3,850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,850,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,525,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,525,000</td></tr>
<tr><td>Aliaksei Protas</td>
<td>$3,375,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,375,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,944,028</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,944,028</td></tr>
<tr><td>Mathieu Joseph</td>
<td>$2,950,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,950,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,950,000</td></tr>
<tr><td>Luke Evangelista</td>
<td>$797,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$797,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$797,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$797,500</td></tr>
<tr><td>Matthew Highmore</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Eeli Tolvanen</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>13</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $61,705,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $33,058,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $30,108,333</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $19,108,333</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,687,460</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $31,400,377</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $28,450,377</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $17,894,821</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $61,705,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $33,058,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $30,108,333</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $19,108,333</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Kevin Bahl</td>
<td>$105,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$105,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$105,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$105,000</td></tr>
<tr><td>Dalibor Dvorsky</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Corson Ceulemans</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Maveric Lamoureux</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Jordan Dumais</td>
<td>$89,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,167</td></tr>
<tr><td>Dylan Garand</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Francesco Arcuri</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Jeremie Biakabutuka</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Justin Robidas</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Matvey Petrov</td>
<td>$80,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,333</td></tr>
<tr><td>Jakub Skarek</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Nick Abruzzese</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Clark Bishop</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Alex Belzile</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Noel Hoefenmayer</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Nikita Okhotiuk</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jan Jenik</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,194,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $696,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,194,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $696,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_CAR"><a id="Hurricanes">Hurricanes</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=6">Hurricanes Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Hurricanes">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Hurricanes">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Hurricanes');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Hurricanes" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">PNC Arena</td></tr>
<tr><td>Level 1: </td><td>6102 - $300 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5144 - $75 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2145 - $50 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4144 - $25 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1145 - $500 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18680</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$68,212,500</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,526,034</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$3,643,500</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$257,252,729</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$257,252,729</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Elias Pettersson</td>
<td>$11,600,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$11,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$11,127,778</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$11,127,778</td></tr>
<tr><td>Owen Power</td>
<td>$8,350,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,420,834</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,420,834</td></tr>
<tr><td>Tomas Hertl</td>
<td>$8,137,500 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,137,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,858,334</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,858,334</td></tr>
<tr><td>Hampus Lindholm</td>
<td>$6,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,356,173</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,356,173</td></tr>
<tr><td>Pavel Buchnevich</td>
<td>$5,800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,800,000</td></tr>
<tr><td>Esa Lindell</td>
<td>$5,800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,285,714</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,285,714</td></tr>
<tr><td>Jonathan Huberdeau</td>
<td>$5,250,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,250,000</td></tr>
<tr><td>Mikael Backlund</td>
<td>$4,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,783,334</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,783,334</td></tr>
<tr><td>Ryan Hartman</td>
<td>$4,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,425,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,425,000</td></tr>
<tr><td>Brayden McNabb</td>
<td>$2,850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,850,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,762,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,762,500</td></tr>
<tr><td>Philipp Kurashev</td>
<td>$2,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,250,000</td></tr>
<tr><td>Joey Daccord</td>
<td>$1,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,200,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,200,000</td></tr>
<tr><td>Lukas Reichel</td>
<td>$1,200,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,108,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,108,333</td></tr>
<tr><td>Brett Murray</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>14</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $68,212,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $49,537,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $43,837,500</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $39,837,500</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $65,403,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $47,329,786</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $41,438,119</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $38,013,119</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $68,212,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $49,537,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $43,837,500</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $39,837,500</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Ivan Fedotov</td>
<td>$327,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$327,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$249,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$249,167</td></tr>
<tr><td>William Wallinder</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Domenick Fensore</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Wyatt Kaiser</td>
<td>$91,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,667</td></tr>
<tr><td>Roby Jarventie</td>
<td>$89,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,417</td></tr>
<tr><td>Chaz Lucius</td>
<td>$89,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,417</td></tr>
<tr><td>Nikita Chibrikov</td>
<td>$87,533 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,533</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,533</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,533</td></tr>
<tr><td>Hendrix Lapierre</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Ryder Korczak</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Gavin White</td>
<td>$85,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,750</td></tr>
<tr><td>Kirill Kudryavtsev</td>
<td>$85,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,000</td></tr>
<tr><td>Samuel Bolduc</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,417</td></tr>
<tr><td>Samuel Laberge</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Samuel Poulin</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,444</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,444</td></tr>
<tr><td>Justin Bailey</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Oskar Steen</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Maxime Lajoie</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,526,034</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $845,200</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,452,062</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $769,811</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_NYI"><a id="Islanders">Islanders</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=19">Islanders Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Islanders">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Islanders">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Islanders');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Islanders" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">UBS Arena</td></tr>
<tr><td>Level 1: </td><td>6659 - $123 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4618 - $77 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>1659 - $49 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3659 - $37 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>660 - $333 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>17255</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$73,029,167</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$677,417</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$54,145,150</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$54,145,150</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Mikko Rantanen</td>
<td>$9,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,250,000</td></tr>
<tr><td>Leon Draisaitl</td>
<td>$8,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td>Nick Suzuki</td>
<td>$7,875,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,095,926</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,095,926</td></tr>
<tr><td>Travis Sanheim</td>
<td>$6,250,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,075,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,075,000</td></tr>
<tr><td>Travis Konecny</td>
<td>$5,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td>Juuse Saros</td>
<td>$5,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Josh Manson</td>
<td>$4,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Carter Verhaeghe</td>
<td>$4,166,667 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,166,667</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,375,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,375,000</td></tr>
<tr><td>Robby Fabbri</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,737,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,737,500</td></tr>
<tr><td>Max Domi</td>
<td>$3,750,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,600,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,600,000</td></tr>
<tr><td>Cody Ceci</td>
<td>$3,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td>Timothy Liljegren</td>
<td>$3,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,466,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,466,667</td></tr>
<tr><td>Luke Schenn</td>
<td>$2,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td>Alexis Lafreniere</td>
<td>$2,325,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,325,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,325,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,325,000</td></tr>
<tr><td>Morgan Frost</td>
<td>$2,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td>Lukas Dostal</td>
<td>$812,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$812,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$812,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$812,500</td></tr>
<tr><td>Simon Holmstrom</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $73,029,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $28,125,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $17,875,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $17,875,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $70,337,593</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $26,487,593</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $16,770,926</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $16,770,926</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $73,029,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $28,125,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $17,875,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $17,875,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Dysin Mayo</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$90,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$90,000</td></tr>
<tr><td>Zachary L'Heureux</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Connor Zary</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Bogdan Trineyev</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Joshua Bloom</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Alexander Pashin</td>
<td>$82,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,667</td></tr>
<tr><td>Saige Weinstein</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,000</td></tr>
<tr><td>Gabriel Fortier</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Kevin Mandolese</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Simon Lundmark</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Graeme Clarke</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jacob Peterson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Ilya Solovyov</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Garrett Pilon</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Riley Tufte</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Sean Day</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>16</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $677,417</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $250,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $672,417</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $250,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_WPG"><a id="Jets">Jets</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=2">Jets Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Jets">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Jets">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Jets');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Jets" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Canada Life Centre</td></tr>
<tr><td>Level 1: </td><td>4080 - $140 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>3791 - $85 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2802 - $35 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3401 - $30 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1120 - $230 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>15194</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$57,513,333</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$891,000</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$98,392,290</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$98,392,290</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Pierre-Luc Dubois</td>
<td>$8,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$400,000</td></tr>
<tr><td>Yanni Gourde</td>
<td>$5,166,666 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,166,666</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,571,428</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,571,428</td></tr>
<tr><td>Jean-Gabriel Pageau</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,728,571</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,728,571</td></tr>
<tr><td>Connor Murphy</td>
<td>$4,400,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,290,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,290,000</td></tr>
<tr><td>Andreas Athanasiou</td>
<td>$4,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,833,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,833,333</td></tr>
<tr><td>Patrick Kane</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,375,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,375,000</td></tr>
<tr><td>Nick Leddy</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Radko Gudas</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Alex Iafallo</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,685,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,685,000</td></tr>
<tr><td>Frank Vatrano</td>
<td>$3,650,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,650,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,650,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,650,000</td></tr>
<tr><td>Brandon Tanev</td>
<td>$3,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td>Vitek Vanecek</td>
<td>$3,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td>Jeremy Lauzon</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$815,833</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$815,833</td></tr>
<tr><td>Tye Kartye</td>
<td>$859,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$859,167</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$859,167</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$859,167</td></tr>
<tr><td>Julien Gauthier</td>
<td>$787,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$787,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$787,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$787,500</td></tr>
<tr><td>Jiri Patera (1 Way Contract)</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>16</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,513,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $27,900,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $8,500,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $8,500,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $45,895,832</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $18,234,404</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $400,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $400,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,513,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $27,900,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $8,500,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $8,500,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Logan Morrison</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Christoffer Sedoff</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Pierrick Dube</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Nils Aman</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,458</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,458</td></tr>
<tr><td>Montana Onyebuchi</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Wyatt Bongiovanni</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,875</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,875</td></tr>
<tr><td>Valtteri Puustinen</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Guillaume Brisebois</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$76,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$76,667</td></tr>
<tr><td>Cole Guttman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,250</td></tr>
<tr><td>Jett Woo</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Ben McCartney</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,417</td></tr>
<tr><td>Sheldon Rempal</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Kristian Reichel</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>William Bitten</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Wyatt Newpower</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Marc McLaughlin</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Griffin Mendel</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Peetro Seppala</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Ville Petman</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>19</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $891,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $334,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $904,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $335,958</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_LA "><a id="Kings">Kings</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=14">Kings Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Kings">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Kings">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Kings');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Kings" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Crypto.com Arena</td></tr>
<tr><td>Level 1: </td><td>5900 - $96 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5031 - $61 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2100 - $37 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4099 - $20 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1100 - $205 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18230</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$59,275,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$407,500</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$3,333,333</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$96,065,408</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$96,065,408</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Logan Couture</td>
<td>$8,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,777,778</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,777,778</td></tr>
<tr><td>Torey Krug</td>
<td>$6,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td>Andrew Copp</td>
<td>$5,625,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,625,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,625,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,625,000</td></tr>
<tr><td>Adin Hill</td>
<td>$4,900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,900,000</td></tr>
<tr><td>Artem Zub</td>
<td>$4,600,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,180,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,180,000</td></tr>
<tr><td>Artturi Lehkonen</td>
<td>$4,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Nick Jensen</td>
<td>$4,050,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,050,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,662,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,662,500</td></tr>
<tr><td>Marcus Foligno</td>
<td>$4,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,700,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,700,000</td></tr>
<tr><td>Filip Gustavsson</td>
<td>$3,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td>Erik Haula</td>
<td>$3,150,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,150,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,956,250</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,956,250</td></tr>
<tr><td>Yegor Sharangovich</td>
<td>$3,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,100,000</td></tr>
<tr><td>David Kampf</td>
<td>$2,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,400,000</td></tr>
<tr><td>Calle Jarnkrok</td>
<td>$2,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td>Cole Smith</td>
<td>$1,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>Jesse Puljujarvi</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$800,000</td></tr>
<tr><td>Mark Jankowski</td>
<td>$800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$791,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$791,667</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>16</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $59,275,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $50,475,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $35,625,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $4,000,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,668,195</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $48,868,195</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $34,682,778</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $3,700,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $59,275,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $50,475,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $35,625,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $4,000,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Yaroslav Askarov</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Parker Wotherspoon</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,750</td></tr>
<tr><td>Patrick Brown</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,000</td></tr>
<tr><td>Matt Villalta</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Philip Kemp</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,889</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,889</td></tr>
<tr><td>Oskari Salminen</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Cole Koepke</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Justin Richards</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Marian Studenic</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>9</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $407,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $77,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $406,639</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $77,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_SEA"><a id="Kraken">Kraken</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=32">Kraken Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Kraken">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Kraken">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Kraken');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Kraken" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Climate Pledge Arena</td></tr>
<tr><td>Level 1: </td><td>5554 - $275 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4645 - $85 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>1953 - $50 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3999 - $45 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1000 - $390 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>17151</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$43,225,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,547,792</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$155,480,399</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$155,480,399</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Nazem Kadri</td>
<td>$7,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td>Mattias Ekholm</td>
<td>$6,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,750,000</td></tr>
<tr><td>Taylor Hall</td>
<td>$6,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$444,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$444,444</td></tr>
<tr><td>Darcy Kuemper</td>
<td>$5,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,250,000</td></tr>
<tr><td>Justin Holl</td>
<td>$3,400,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td>Joel Armia</td>
<td>$3,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td>Jordan Greenway</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,775,000</td></tr>
<tr><td>Nick Seeler</td>
<td>$2,700,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,700,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,315,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,315,000</td></tr>
<tr><td>Noah Cates</td>
<td>$2,625,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,625,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,625,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,625,000</td></tr>
<tr><td>Vladislav Namestnikov</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Jack McBain</td>
<td>$1,600,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,600,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,600,000</td></tr>
<tr><td>Matty Beniers</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>12</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $43,225,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $24,600,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,950,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $9,700,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $36,559,444</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $23,715,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,565,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $9,315,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $43,225,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $24,600,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,950,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $9,700,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Thomas Novak</td>
<td>$350,000 (4)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$350,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$296,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$296,000</td></tr>
<tr><td>Bobby McMann</td>
<td>$130,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$130,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$112,083</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$112,083</td></tr>
<tr><td>Nikolai Kovalenko</td>
<td>$89,625 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,625</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,625</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,625</td></tr>
<tr><td>Luke Toporowski</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Carson Lambos</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Nathan Staios</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Carl Lindbom</td>
<td>$84,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,000</td></tr>
<tr><td>Cole Krygier</td>
<td>$83,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,750</td></tr>
<tr><td>Topias Vilen</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Jon-Randall Avon</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,000</td></tr>
<tr><td>Mason Morelli</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Anthony Angello</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Christian Wolanin</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$75,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$75,000</td></tr>
<tr><td>Mackenzie MacEachern</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Dylan McIlrath</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Milon Kelemen</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Matthew Murray</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Carson Meyer</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Calle Sjalin</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jack Drury</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Ben Jones</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Kyle Keyser</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Arnaud Durandeau</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,547,792</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $814,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $350,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $350,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,473,375</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $742,083</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $296,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $296,000</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_TB "><a id="Lightning">Lightning</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=27">Lightning Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Lightning">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Lightning">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Lightning');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Lightning" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Amalie Arena</td></tr>
<tr><td>Level 1: </td><td>6283 - $110 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5351 - $80 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2050 - $45 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4054 - $30 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1354 - $180 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>19092</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$79,712,007</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,164,834</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$162,268,970</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$162,268,970</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Timo Meier</td>
<td>$8,800,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,800,000</td></tr>
<tr><td>Connor Hellebuyck</td>
<td>$8,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,208,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,208,333</td></tr>
<tr><td>Tage Thompson</td>
<td>$7,142,857 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,142,857</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,425,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,425,000</td></tr>
<tr><td>Ivan Provorov</td>
<td>$6,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,750,000</td></tr>
<tr><td>Colton Parayko</td>
<td>$6,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,388,889</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,388,889</td></tr>
<tr><td>Jeff Petry</td>
<td>$6,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,100,000</td></tr>
<tr><td>Joel Eriksson Ek</td>
<td>$5,250,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,831,944</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,831,944</td></tr>
<tr><td>Ivan Barbashev</td>
<td>$5,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Nick Foligno</td>
<td>$4,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,666,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,666,667</td></tr>
<tr><td>Ryan Graves</td>
<td>$4,500,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Mats Zuccarello</td>
<td>$4,125,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td>Garnet Hathaway</td>
<td>$2,375,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,375,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,375,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,375,000</td></tr>
<tr><td>Nicolas Hague</td>
<td>$2,294,150 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,294,150</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,294,150</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,294,150</td></tr>
<tr><td>Evgenii Dadonov</td>
<td>$2,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,250,000</td></tr>
<tr><td>Noel Acciari</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Oskar Sundqvist</td>
<td>$1,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,258,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,258,333</td></tr>
<tr><td>David Rittich</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$937,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$937,500</td></tr>
<tr><td>Ben Hutton</td>
<td>$975,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$975,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$933,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$933,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $79,712,007</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $58,792,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $45,692,857</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $45,692,857</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $77,469,149</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $56,762,499</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $44,154,166</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $44,154,166</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $79,712,007</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $58,792,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $45,692,857</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $45,692,857</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Dmitry Voronkov</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Mikael Pyyhtia</td>
<td>$89,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,750</td></tr>
<tr><td>Tyler Brennan</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Aidan Fulp</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Chase Stillman</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Chase Wheatcroft</td>
<td>$86,250 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,250</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,250</td></tr>
<tr><td>Ludwig Persson</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Ilya Nikolaev</td>
<td>$83,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Jack Matier</td>
<td>$80,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,167</td></tr>
<tr><td>Grigori Denisenko</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Louie Belpedio</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Zach Sanford</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,750</td></tr>
<tr><td>John Hayden</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Lane Pederson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Marc Del Gaizo</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Isaiah Saville</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Mikhail Abramov</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Ville Heinola</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Matthew Phillips</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Filip Lindberg</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Joe Veleno</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,164,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $424,417</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,166,084</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $424,417</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_TOR"><a id="MapleLeafs">Maple Leafs</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=28">Maple Leafs Page</a> ]
[ <a href="LHSQC-TeamFinance.php#MapleLeafs">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#MapleLeafs">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_MapleLeafs');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_MapleLeafs" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Scotiabank Arena</td></tr>
<tr><td>Level 1: </td><td>6159 - $150 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5159 - $90 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2159 - $50 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4159 - $45 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1164 - $275 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18800</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$64,360,834</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$850,195</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$117,296,527</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$117,296,527</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Jake Guentzel</td>
<td>$9,000,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,625,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,625,000</td></tr>
<tr><td>Filip Forsberg</td>
<td>$8,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,222,222</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,222,222</td></tr>
<tr><td>Justin Faulk</td>
<td>$6,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,291,666</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,291,666</td></tr>
<tr><td>Damon Severson</td>
<td>$6,250,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,018,518</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,018,518</td></tr>
<tr><td>Andrei Kuzmenko</td>
<td>$5,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td>Charlie Coyle</td>
<td>$5,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,957,143</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,957,143</td></tr>
<tr><td>Linus Ullmark</td>
<td>$5,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Ryan Strome</td>
<td>$5,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Reilly Smith</td>
<td>$5,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Olli Maatta</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td>Mason Appleton</td>
<td>$2,166,667 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,166,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Jon Merrill</td>
<td>$1,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,112,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,112,500</td></tr>
<tr><td>Conor Timmins</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,016,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,016,667</td></tr>
<tr><td>Wyatt Johnston</td>
<td>$894,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$894,167</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$894,167</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$894,167</td></tr>
<tr><td>Ukko-Pekka Luukkonen</td>
<td>$0 (0)</td></tr>
<tr><td>Mikhail Maltsev (1 Way Contract)</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>16</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $64,360,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $40,500,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $35,250,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $23,750,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $62,554,550</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $39,114,549</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $34,157,406</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $22,865,740</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $64,360,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $40,500,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $35,250,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $23,750,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Georgi Merkulov</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Georgi Romanov</td>
<td>$91,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,000</td></tr>
<tr><td>Ryker Evans</td>
<td>$89,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,750</td></tr>
<tr><td>Alexandre Doucet</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Nolan Burke</td>
<td>$86,167 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,167</td></tr>
<tr><td>Uvis Balinski</td>
<td>$85,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,667</td></tr>
<tr><td>Martin Chromiak</td>
<td>$82,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,000</td></tr>
<tr><td>William Villeneuve</td>
<td>$81,778 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,778</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,778</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,778</td></tr>
<tr><td>Cole McWard</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,875</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,875</td></tr>
<tr><td>Scott Sabourin</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Ben Meyers</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Andre Heim</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Keith Petruzzelli</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Thomas Bordeleau</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Nico Daws</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Egor Sokolov</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Nikita Alexandrov</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Lucas Carlsson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $850,195</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $172,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $858,237</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $172,667</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_EDM"><a id="Oilers">Oilers</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=12">Oilers Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Oilers">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Oilers">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Oilers');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Oilers" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Rogers Place</td></tr>
<tr><td>Level 1: </td><td>6207 - $125 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4807 - $75 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2001 - $44 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4808 - $37 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>818 - $250 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18641</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$75,284,500</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,350,999</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$123,967,158</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$123,967,158</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Cole Caufield</td>
<td>$7,850,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,850,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,075,648</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,075,648</td></tr>
<tr><td>Vince Dunn</td>
<td>$7,350,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,350,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,350,000</td></tr>
<tr><td>Anders Lee</td>
<td>$7,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td>Claude Giroux</td>
<td>$6,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td>John Gibson</td>
<td>$6,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,944,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,944,444</td></tr>
<tr><td>Valeri Nichushkin</td>
<td>$6,125,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,722,222</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,722,222</td></tr>
<tr><td>Nikolaj Ehlers</td>
<td>$6,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>Josh Anderson</td>
<td>$5,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td>K'Andre Miller</td>
<td>$3,872,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,872,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,872,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,872,000</td></tr>
<tr><td>David Savard</td>
<td>$3,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td>Kirby Dach</td>
<td>$3,362,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,362,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,362,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,362,500</td></tr>
<tr><td>Evan Rodrigues</td>
<td>$3,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>Brett Kulak</td>
<td>$2,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td>Zach Whitecloud</td>
<td>$2,725,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,725,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,439,286</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,439,286</td></tr>
<tr><td>Nicolas Deslauriers</td>
<td>$1,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td>Pius Suter</td>
<td>$1,600,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,600,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,600,000</td></tr>
<tr><td>Dylan Coghlan</td>
<td>$0 (0)</td></tr>
<tr><td>Arthur Kaliyev</td>
<td>$0 (0)</td></tr>
<tr><td>Cole Perfetti</td>
<td>$0 (0)</td></tr>
<tr><td>Ivan Prosvetov (1 Way Contract)</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $75,284,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $53,812,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $38,950,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $16,700,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $68,291,100</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $51,894,100</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $37,031,600</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $15,237,156</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $75,284,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $53,812,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $38,950,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $16,700,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Andreas Englund</td>
<td>$135,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$135,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$135,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$135,000</td></tr>
<tr><td>Mathieu Olivier</td>
<td>$110,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$110,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$98,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$98,333</td></tr>
<tr><td>Fedor Svechkov</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Mackie Samoskevich</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Kevin Korchinski</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Michael Benning</td>
<td>$91,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,667</td></tr>
<tr><td>Carter Mazur</td>
<td>$90,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$90,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$90,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$90,583</td></tr>
<tr><td>Sean Farrell</td>
<td>$89,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,750</td></tr>
<tr><td>Adam Sykora</td>
<td>$83,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,833</td></tr>
<tr><td>Jan Mysak</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Jacob Bernard-Docker</td>
<td>$80,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,500</td></tr>
<tr><td>Brayden Pachal</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Gage Quinney</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Hunter Shepard</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Justin Dowling</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Fredrik Karlstrom</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jackson LaCombe</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Ruslan Iskhakov</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,350,999</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $358,749</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,339,332</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $358,749</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_FLA"><a id="Panthers">Panthers</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=13">Panthers Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Panthers">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Panthers">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Panthers');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Panthers" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">FLA Live Arena</td></tr>
<tr><td>Level 1: </td><td>6249 - $90 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5249 - $60 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2292 - $30 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4210 - $25 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1250 - $135 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>19250</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$77,207,143</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$786,634</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$160,943,646</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$160,943,646</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Andrei Vasilevskiy</td>
<td>$9,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,833,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,833,333</td></tr>
<tr><td>Mark Stone</td>
<td>$9,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,261,111</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,261,111</td></tr>
<tr><td>Sidney Crosby</td>
<td>$8,700,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,700,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,700,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,700,000</td></tr>
<tr><td>Mark Scheifele</td>
<td>$8,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,203,125</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,203,125</td></tr>
<tr><td>Josh Morrissey</td>
<td>$6,250,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,905,556</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,905,556</td></tr>
<tr><td>Owen Tippett</td>
<td>$6,200,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,677,778</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,677,778</td></tr>
<tr><td>Jaccob Slavin</td>
<td>$5,300,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,300,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,753,125</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,753,125</td></tr>
<tr><td>Mason Marchment</td>
<td>$4,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Lawson Crouse</td>
<td>$4,300,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,300,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,300,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,300,000</td></tr>
<tr><td>Dmitry Orlov</td>
<td>$3,875,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,875,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,875,000</td></tr>
<tr><td>Tyler Myers</td>
<td>$3,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td>Alex Newhook</td>
<td>$2,900,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,900,000</td></tr>
<tr><td>Colton Sissons</td>
<td>$2,857,143 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,857,143</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,857,143</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,857,143</td></tr>
<tr><td>Matthew Knies</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>Derek Ryan</td>
<td>$900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,016,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,016,667</td></tr>
<tr><td>Philip Tomasino</td>
<td>$0 (0)</td></tr>
<tr><td>Braden Schneider</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $77,207,143</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,507,143</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $50,150,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $30,450,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $75,457,838</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $56,188,046</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $48,830,903</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $28,619,792</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $77,207,143</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,507,143</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $50,150,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $30,450,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Kevin Rooney</td>
<td>$130,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$130,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$130,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$130,000</td></tr>
<tr><td>Kurtis MacDermid</td>
<td>$115,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$115,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$110,938</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$110,938</td></tr>
<tr><td>Jonathan Lekkerimaki</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Eduard Sale</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Andrew Cristall</td>
<td>$90,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$90,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$90,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$90,500</td></tr>
<tr><td>Isak Rosen</td>
<td>$89,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,417</td></tr>
<tr><td>Jordan Frasca</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Jesper Vikman</td>
<td>$85,800 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,800</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,800</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,800</td></tr>
<tr><td>Arber Xhekaj</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Victor Soderstrom</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Kaedan Korczak</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Leon Gawanke</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>12</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $786,634</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $570,717</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $115,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $782,572</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $566,655</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $110,938</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_PIT"><a id="Penguins">Penguins</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=24">Penguins Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Penguins">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Penguins">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Penguins');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Penguins" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">PPG Paints Arena</td></tr>
<tr><td>Level 1: </td><td>5956 - $115 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4984 - $71 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>1954 - $52 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3958 - $35 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1535 - $189 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18387</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$58,475,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$713,417</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$128,702,164</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$128,702,164</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Darnell Nurse</td>
<td>$9,250,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,844,444</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,844,444</td></tr>
<tr><td>Brent Burns</td>
<td>$8,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,760,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,760,000</td></tr>
<tr><td>T.J. Oshie</td>
<td>$5,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,175,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,175,000</td></tr>
<tr><td>Dylan Strome</td>
<td>$5,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td>Mikael Granlund</td>
<td>$5,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Jordan Eberle</td>
<td>$4,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Erik Gudbranson</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Frederik Andersen</td>
<td>$3,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td>Jan Rutta</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td>Brock McGinn</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td>Conor Sheary</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Marcus Johansson</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,700,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,700,000</td></tr>
<tr><td>Teddy Blueger</td>
<td>$1,800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,833,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Matt Benning</td>
<td>$1,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,250,000</td></tr>
<tr><td>Michael Carcone</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Beck Malenstyn</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>16</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,475,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $28,050,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,250,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $14,250,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $53,979,444</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $27,677,777</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $13,594,444</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $13,594,444</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,475,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $28,050,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,250,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $14,250,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Ty Young</td>
<td>$85,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,000</td></tr>
<tr><td>Mark Kastelic</td>
<td>$83,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,056</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,056</td></tr>
<tr><td>Zayde Wisdom</td>
<td>$79,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,750</td></tr>
<tr><td>Navrin Mutter</td>
<td>$77,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,667</td></tr>
<tr><td>Brandon Bussi</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,000</td></tr>
<tr><td>Colten Ellis</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,292</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,292</td></tr>
<tr><td>Patrik Koch</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,125</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,125</td></tr>
<tr><td>John Ludvig</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Joona Koppanen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Tyce Thompson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Santeri Hatakka</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jasper Weatherby</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Cole Schwindt</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Declan Chisholm</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>14</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $713,417</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $85,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $722,890</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $85,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_NSH"><a id="Predators">Predators</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=17">Predators Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Predators">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Predators">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Predators');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Predators" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Bridgestone Arena</td></tr>
<tr><td>Level 1: </td><td>5864 - $126 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4823 - $75 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>1824 - $48 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3824 - $36 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>824 - $250 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>17159</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$48,420,833</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,031,916</td></tr>
<tr><td>Coaches Total Salaries</td><td>$500,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$153,802,557</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$153,802,557</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Ryan McDonagh</td>
<td>$6,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,493,750</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,493,750</td></tr>
<tr><td>Tom Wilson</td>
<td>$6,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,333,334</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,333,334</td></tr>
<tr><td>Sean Durzi</td>
<td>$6,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,140,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,140,000</td></tr>
<tr><td>William Karlsson</td>
<td>$5,900,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,900,000</td></tr>
<tr><td>Michael Bunting</td>
<td>$4,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,500,000</td></tr>
<tr><td>Petr Mrazek</td>
<td>$4,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,100,000</td></tr>
<tr><td>Connor Clifton</td>
<td>$3,333,333 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,333,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,333,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,333,333</td></tr>
<tr><td>Will Borgen</td>
<td>$2,700,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,700,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,700,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,700,000</td></tr>
<tr><td>Alex Nedeljkovic</td>
<td>$2,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,166,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Nick Bjugstad</td>
<td>$2,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td>Ethan Bear</td>
<td>$2,062,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,062,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,062,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,062,500</td></tr>
<tr><td>Daniil Tarasov</td>
<td>$1,050,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,050,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,018,750</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,018,750</td></tr>
<tr><td>Michael Sgarbossa</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$766,667</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>13</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $48,420,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $39,733,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $18,400,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $12,500,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $46,615,001</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $37,967,084</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $17,373,334</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $11,473,334</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $48,420,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $39,733,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $18,400,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $12,500,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Michael Kesselring</td>
<td>$140,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$140,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$124,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$124,167</td></tr>
<tr><td>Joshua Lopina</td>
<td>$87,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,833</td></tr>
<tr><td>Logan Mailloux</td>
<td>$87,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,500</td></tr>
<tr><td>Ethan Samson</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Ryan Winterton</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Maximus Wanner</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Jakub Lauko</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,750</td></tr>
<tr><td>Chris Wagner</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Dryden Hunt</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Alexander Petrovic</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Olivier Rodrigue</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Marshall Rifai</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Brayden Tracey</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jachym Kondelik</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Lassi Thomson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Santtu Kinnunen</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jason Polin</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Curtis Douglas</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,031,916</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $555,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,016,083</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $539,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_NYR"><a id="Rangers">Rangers</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=20">Rangers Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Rangers">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Rangers">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Rangers');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Rangers" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Madison Square Garden</td></tr>
<tr><td>Level 1: </td><td>5961 - $120 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5002 - $85 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2003 - $60 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4000 - $45 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1040 - $250 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18006</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$70,116,190</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,032,667</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$112,923,283</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$112,923,283</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Artemi Panarin</td>
<td>$11,642,860 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$11,642,860</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$11,642,857</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$11,642,857</td></tr>
<tr><td>Sebastian Aho</td>
<td>$9,750,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,606,694</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,606,694</td></tr>
<tr><td>Charlie McAvoy</td>
<td>$9,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,988,889</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,988,889</td></tr>
<tr><td>Miro Heiskanen</td>
<td>$8,450,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,450,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,450,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,450,000</td></tr>
<tr><td>Quinn Hughes</td>
<td>$7,850,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,850,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,850,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,850,000</td></tr>
<tr><td>Rickard Rakell</td>
<td>$5,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,827,064</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,827,064</td></tr>
<tr><td>Filip Chytil</td>
<td>$4,437,500 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,437,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,010,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,010,000</td></tr>
<tr><td>Jake Oettinger</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Alexandar Georgiev</td>
<td>$3,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,156,250</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,156,250</td></tr>
<tr><td>Frederick Gaudreau</td>
<td>$2,100,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,950,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,950,000</td></tr>
<tr><td>Fabian Zetterlund</td>
<td>$1,450,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,450,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,450,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,450,000</td></tr>
<tr><td>Emil Heineman</td>
<td>$897,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$897,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$897,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$897,500</td></tr>
<tr><td>William Eklund</td>
<td>$863,333 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$863,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$863,333</td></tr>
<tr><td>Nathan Walker</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Nick Blankenburg</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>15</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $70,116,190</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $60,368,690</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $47,087,500</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $34,800,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $68,467,587</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $58,963,837</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $45,682,647</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $33,822,647</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $70,116,190</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $60,368,690</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $47,087,500</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $34,800,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Kyle Burroughs</td>
<td>$110,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$110,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$110,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$110,000</td></tr>
<tr><td>Martin Pospisil</td>
<td>$100,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$100,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Marco Kasper</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Alexis Gendron</td>
<td>$86,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,000</td></tr>
<tr><td>Ryan Tverberg</td>
<td>$85,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,167</td></tr>
<tr><td>Mitchell Russell</td>
<td>$83,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Danil Zhilkin</td>
<td>$83,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,167</td></tr>
<tr><td>Danil Gushchin</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Jonah Gadjovich</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,667</td></tr>
<tr><td>Nick DeSimone</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$76,875</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$76,875</td></tr>
<tr><td>Michael Dipietro</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Oskar Back</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,292</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,292</td></tr>
<tr><td>Jacob Perreault</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Alexander True</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Nathan Clurman</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Brandon Coe</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Tim Berni</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,032,667</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $633,667</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,029,501</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $627,334</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_DET"><a id="RedWings">Red Wings</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=11">Red Wings Page</a> ]
[ <a href="LHSQC-TeamFinance.php#RedWings">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#RedWings">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_RedWings');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_RedWings" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Little Caesars Arena</td></tr>
<tr><td>Level 1: </td><td>6003 - $200 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5303 - $120 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2404 - $70 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4401 - $20 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1404 - $300 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>19515</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$59,850,834</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,627,861</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$207,778,238</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$207,778,238</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Erik Karlsson</td>
<td>$11,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$11,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$11,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$11,500,000</td></tr>
<tr><td>Cale Makar</td>
<td>$9,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,000,000</td></tr>
<tr><td>Andre Burakovsky</td>
<td>$5,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td>Zach Hyman</td>
<td>$5,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,500,000</td></tr>
<tr><td>J.T. Compher</td>
<td>$5,100,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,100,000</td></tr>
<tr><td>Ville Husso</td>
<td>$4,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td>Jamie Oleksiak</td>
<td>$4,600,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,600,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,600,000</td></tr>
<tr><td>Adam Larsson</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Barclay Goodrow</td>
<td>$3,641,667 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,641,667</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,641,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,641,667</td></tr>
<tr><td>Nico Sturm</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Matt Nieto</td>
<td>$900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$900,000</td></tr>
<tr><td>Ondrej Pavel</td>
<td>$870,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$870,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$870,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$870,000</td></tr>
<tr><td>Lukas Svejkovsky</td>
<td>$859,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$859,167</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$859,167</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$859,167</td></tr>
<tr><td>Xavier Simoneau</td>
<td>$855,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$855,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$855,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$855,000</td></tr>
<tr><td>Phillip Di Giuseppe</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$766,667</td></tr>
<tr><td>J.J. Moser</td>
<td>$0 (0)</td></tr>
<tr><td>Nathan Smith</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $59,850,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $44,841,667</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $40,241,667</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $10,600,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,842,501</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $44,841,667</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $40,241,667</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $10,600,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $59,850,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $44,841,667</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $40,241,667</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $10,600,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Filip Bystedt</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Carl Berglund</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Niklas Kokko</td>
<td>$92,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,333</td></tr>
<tr><td>David Jiricek</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Simon Nemec</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Tristan Lennox</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Caedan Bankier</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Brennan Othmann</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Topi Niemela</td>
<td>$85,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,667</td></tr>
<tr><td>Ethan Del Mastro</td>
<td>$85,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,583</td></tr>
<tr><td>Adam Edstrom</td>
<td>$84,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Riley Kidney</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Daemon Hunt</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Colton Dach</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Sasha Pastujov</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Braden Kressler</td>
<td>$80,056 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,056</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,056</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,056</td></tr>
<tr><td>Anson Thornton</td>
<td>$79,556 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,556</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,556</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,556</td></tr>
<tr><td>Jack St. Ivany</td>
<td>$77,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,563</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,563</td></tr>
<tr><td>Maxence Guenette</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,417</td></tr>
<tr><td>Michael Milne</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Reilly Walsh</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,627,861</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,202,194</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $77,500</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,631,841</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,204,256</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $79,562</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_BUF"><a id="Sabres">Sabres</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=4">Sabres Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Sabres">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Sabres">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Sabres');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Sabres" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Keybank Center</td></tr>
<tr><td>Level 1: </td><td>6518 - $140 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5138 - $110 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2138 - $80 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4138 - $50 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1138 - $240 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>19070</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$56,780,714</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,247,833</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$339,949,084</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$339,949,084</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Alex Ovechkin</td>
<td>$9,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td>Matthew Tkachuk</td>
<td>$9,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td>Brady Tkachuk</td>
<td>$8,205,714 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,205,714</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,205,713</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,205,713</td></tr>
<tr><td>Jack Hughes</td>
<td>$8,000,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,213,889</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,213,889</td></tr>
<tr><td>Alex Tuch</td>
<td>$4,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,271,875</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,271,875</td></tr>
<tr><td>Mikey Anderson</td>
<td>$4,125,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,777,778</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,777,778</td></tr>
<tr><td>Evan Bouchard</td>
<td>$3,900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,900,000</td></tr>
<tr><td>Semyon Varlamov</td>
<td>$2,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td>Kaapo Kakko</td>
<td>$2,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,250,000</td></tr>
<tr><td>Jamie Drysdale</td>
<td>$2,300,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,300,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,300,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,300,000</td></tr>
<tr><td>Nathan Bastian</td>
<td>$1,350,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,350,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,350,000</td></tr>
<tr><td>Shane Pinto</td>
<td>$0 (0)</td></tr>
<tr><td>Moritz Seider</td>
<td>$0 (0)</td></tr>
<tr><td>Oliver Kylington</td>
<td>$0 (0)</td></tr>
<tr><td>Ty Dellandrea</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>15</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,780,714</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $49,130,714</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $32,580,714</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $29,830,714</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $55,019,255</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $47,519,255</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $31,447,380</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $28,697,380</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,780,714</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $49,130,714</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $32,580,714</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $29,830,714</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Calvin Pickard</td>
<td>$100,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$100,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,083</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,083</td></tr>
<tr><td>Jesper Wallstedt</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Owen Pickering</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Jayden Struble</td>
<td>$86,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Justin Sourdif</td>
<td>$84,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,750</td></tr>
<tr><td>Mikko Kokkonen</td>
<td>$84,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,667</td></tr>
<tr><td>Tyler Tullio</td>
<td>$82,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,333</td></tr>
<tr><td>Tyler Tucker</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,000</td></tr>
<tr><td>Givani Smith</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,000</td></tr>
<tr><td>Louis Domingue</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Tim Gettinger</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Ethen Frank</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Rhett Gardner</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Noah Juulsen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Kevin Gravel</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,083</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,083</td></tr>
<tr><td>Adam Klapka</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Wade Allison</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Alex Limoges</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,247,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $346,833</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,239,499</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $338,499</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_OTT"><a id="Senators">Senators</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=21">Senators Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Senators">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Senators">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Senators');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Senators" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Canadian Tire Centre</td></tr>
<tr><td>Level 1: </td><td>6251 - $115 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5100 - $70 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2100 - $41 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4100 - $33 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1101 - $230 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18652</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$79,429,167</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,387,377</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$233,747,897</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$233,747,897</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Mika Zibanejad</td>
<td>$8,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,150,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,150,000</td></tr>
<tr><td>Victor Hedman</td>
<td>$7,875,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Sean Couturier</td>
<td>$7,750,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,370,370</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,370,370</td></tr>
<tr><td>Gabriel Landeskog</td>
<td>$7,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td>Cam Fowler</td>
<td>$6,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,222,222</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,222,222</td></tr>
<tr><td>Chris Kreider</td>
<td>$6,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td>Nick Schmaltz</td>
<td>$5,850,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,850,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,234,375</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,234,375</td></tr>
<tr><td>Igor Shesterkin</td>
<td>$5,666,667 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,666,667</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,666,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,666,667</td></tr>
<tr><td>Shea Theodore</td>
<td>$5,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,200,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,200,000</td></tr>
<tr><td>Gabriel Vilardi</td>
<td>$3,437,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,437,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,437,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,437,500</td></tr>
<tr><td>Michael Rasmussen</td>
<td>$3,200,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,852,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,852,000</td></tr>
<tr><td>Anton Forsberg</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,287,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,287,500</td></tr>
<tr><td>Alexander Romanov</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>Sean Kuraly</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>Cam York</td>
<td>$1,600,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,600,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,600,000</td></tr>
<tr><td>Dylan Samberg</td>
<td>$1,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,400,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,400,000</td></tr>
<tr><td>Jesper Fast</td>
<td>$1,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,200,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,200,000</td></tr>
<tr><td>Anton Lundell</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $79,429,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,300,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $32,950,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $26,450,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $73,120,634</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $43,328,967</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $31,872,370</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $25,372,370</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $79,429,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,300,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $32,950,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $26,450,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Scott Perunovich</td>
<td>$115,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$115,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$96,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$96,250</td></tr>
<tr><td>Vladislav Firstov</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Tyler Kleven</td>
<td>$91,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,667</td></tr>
<tr><td>Matthew Stienburg</td>
<td>$89,875 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,875</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,875</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,875</td></tr>
<tr><td>Marek Alscher</td>
<td>$89,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,667</td></tr>
<tr><td>Noel Gunler</td>
<td>$86,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,250</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,250</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,250</td></tr>
<tr><td>Lucas Edmonds</td>
<td>$86,167 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,167</td></tr>
<tr><td>Cross Hanas</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Roni Hirvonen</td>
<td>$85,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,667</td></tr>
<tr><td>Vyacheslav Peksa</td>
<td>$85,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,167</td></tr>
<tr><td>Matyas Sapovaliv</td>
<td>$83,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,167</td></tr>
<tr><td>Donovan Sebrango</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,833</td></tr>
<tr><td>Gage Alexander</td>
<td>$81,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,000</td></tr>
<tr><td>Linus Karlsson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,938</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,938</td></tr>
<tr><td>Jamieson Rees</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,708</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,708</td></tr>
<tr><td>Cam Dineen</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Yan Kuznetsov</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Dylan Holloway</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Linus Weissbach</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Egor Afanasyev</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Nolan Foote</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Semyon Der-Arguchintsev</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,387,377</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $335,501</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,377,272</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $335,501</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_SJ "><a id="Sharks">Sharks</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=26">Sharks Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Sharks">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Sharks">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Sharks');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Sharks" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">SAP Center at San Jose</td></tr>
<tr><td>Level 1: </td><td>5970 - $115 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4898 - $70 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>1898 - $40 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3898 - $33 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>898 - $225 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>17562</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$57,075,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,221,861</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$5,250,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$154,250,213</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$154,250,213</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Ryan Johansen</td>
<td>$8,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td>Troy Terry</td>
<td>$7,000,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td>Brock Boeser</td>
<td>$6,650,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,650,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,650,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,650,000</td></tr>
<tr><td>Ilya Sorokin</td>
<td>$6,600,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,222,222</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,222,222</td></tr>
<tr><td>Bryan Rust</td>
<td>$5,125,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,125,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,892,857</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,892,857</td></tr>
<tr><td>Samuel Girard</td>
<td>$5,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,466,042</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,466,042</td></tr>
<tr><td>Brandon Carlo</td>
<td>$4,100,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,100,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,100,000</td></tr>
<tr><td>Jake McCabe</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,000,000</td></tr>
<tr><td>Nick Paul</td>
<td>$3,150,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,150,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,150,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,150,000</td></tr>
<tr><td>Yegor Chinakhov</td>
<td>$2,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,666,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Sam Steel</td>
<td>$1,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,025,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,025,000</td></tr>
<tr><td>Drew O'Connor</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$925,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$925,000</td></tr>
<tr><td>Alex Lyon</td>
<td>$900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$900,000</td></tr>
<tr><td>Vinni Lettieri</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Paul Cotter</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$771,250</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$771,250</td></tr>
<tr><td>Hudson Fasching</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Mack Guzda</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>17</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,075,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $33,850,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $30,975,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $21,875,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $55,310,705</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $32,269,038</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $29,831,121</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $21,265,079</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,075,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $33,850,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $30,975,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $21,875,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Keegan Kolesar</td>
<td>$140,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$140,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$140,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$140,000</td></tr>
<tr><td>Hunter McKown</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$95,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$95,000</td></tr>
<tr><td>Ryan McAllister</td>
<td>$89,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,667</td></tr>
<tr><td>Kyle McDonald</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Brandt Clarke</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Fabian Lysell</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,333</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,333</td></tr>
<tr><td>Yaniv Perets</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,500</td></tr>
<tr><td>Jaydon Dureau</td>
<td>$84,167 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,167</td></tr>
<tr><td>Nolan Lalonde</td>
<td>$79,611 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$79,611</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,611</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,611</td></tr>
<tr><td>Akito Hirose</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,750</td></tr>
<tr><td>Vladislav Kolyachonok</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,972</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,972</td></tr>
<tr><td>Gustav Olofsson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Alex Turcotte</td>
<td>$77,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,479</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,479</td></tr>
<tr><td>Hunter Skinner</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$81,292</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$81,292</td></tr>
<tr><td>Cameron Crotty</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Peyton Krebs</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Alex Steeves</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Kyle Capobianco</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Matthew Robertson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>19</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,221,861</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $583,944</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $77,500</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,227,604</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $587,395</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $80,479</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_DAL"><a id="Stars">Stars</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=10">Stars Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Stars">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Stars">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Stars');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Stars" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">American Airlines Center</td></tr>
<tr><td>Level 1: </td><td>6107 - $300 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5106 - $75 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2106 - $55 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4106 - $45 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1107 - $390 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18532</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$62,199,524</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,926,362</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$1,225,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$147,915,632</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$147,915,632</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Tyler Seguin</td>
<td>$9,850,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,850,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$9,850,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$9,850,000</td></tr>
<tr><td>Jamie Benn</td>
<td>$9,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,250,000</td></tr>
<tr><td>Jacob Trouba</td>
<td>$8,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td>Kevin Hayes</td>
<td>$7,142,857 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,142,857</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,142,857</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,142,857</td></tr>
<tr><td>Philipp Grubauer</td>
<td>$5,900,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,900,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,900,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,900,000</td></tr>
<tr><td>Robin Lehner</td>
<td>$5,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,000,000</td></tr>
<tr><td>Drake Batherson</td>
<td>$4,975,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,975,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,975,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,975,000</td></tr>
<tr><td>Ben Chiarot</td>
<td>$4,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,750,000</td></tr>
<tr><td>Miles Wood</td>
<td>$2,500,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>Ryan Reaves</td>
<td>$1,350,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,350,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,350,000</td></tr>
<tr><td>Dylan Guenther</td>
<td>$894,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$894,167</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$894,167</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$894,167</td></tr>
<tr><td>Ben Harpur</td>
<td>$787,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$787,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Justin Brazeau</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Zack MacEwen</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$400,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$400,000</td></tr>
<tr><td>Philip Broberg</td>
<td>$0 (0)</td></tr>
<tr><td>Quinton Byfield</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>16</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $62,199,524</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,242,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $23,225,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $2,500,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,562,024</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $44,867,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $23,225,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $2,500,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $62,199,524</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,242,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $23,225,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $2,500,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Liam O'Brien</td>
<td>$100,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$100,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$94,375</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$94,375</td></tr>
<tr><td>Mason Lohrei</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>John Beecher</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$125,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$125,833</td></tr>
<tr><td>Conor Geekie</td>
<td>$91,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,833</td></tr>
<tr><td>Isaac Belliveau</td>
<td>$87,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,500</td></tr>
<tr><td>Bryce Mcconnell-Barker</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$87,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$87,000</td></tr>
<tr><td>Trevor Kuntar</td>
<td>$86,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Taylor Gauthier</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Raivis Ansons</td>
<td>$84,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$84,417</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$84,417</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$84,417</td></tr>
<tr><td>Joe Fleming</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Olivier Nadeau</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,667</td></tr>
<tr><td>Marc-Andre Gaudet</td>
<td>$83,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,000</td></tr>
<tr><td>Tyson Hinds</td>
<td>$82,944 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,944</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,944</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,944</td></tr>
<tr><td>Zach Ostapchuk</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Kai Schwindt</td>
<td>$82,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,167</td></tr>
<tr><td>Brandon Scanlin</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Taylor Ward</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Keaton Middleton</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$76,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$76,667</td></tr>
<tr><td>Grant Hutton</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$72,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$72,500</td></tr>
<tr><td>Brendan Lemieux</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$78,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$78,750</td></tr>
<tr><td>Mason Geertsen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Max McCormick</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,083</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,083</td></tr>
<tr><td>Clay Stevenson</td>
<td>$77,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$79,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$79,500</td></tr>
<tr><td>Wyatt Aamodt</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jet Greaves</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Nick Swaney</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>26</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,926,362</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,096,778</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $177,500</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,951,070</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,092,736</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $173,875</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_UTA"><a id="UtahHockeyClub">Utah Hockey Club</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=23">Utah Hockey Club Page</a> ]
[ <a href="LHSQC-TeamFinance.php#UtahHockeyClub">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#UtahHockeyClub">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_UtahHockeyClub');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_UtahHockeyClub" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Delta Center</td></tr>
<tr><td>Level 1: </td><td>5534 - $140 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>4894 - $110 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>1899 - $70 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>3899 - $45 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>899 - $220 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>17125</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$84,956,500</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$905,750</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$107,764,691</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$107,764,691</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Nikita Kucherov</td>
<td>$9,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$9,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,974,075</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,974,075</td></tr>
<tr><td>Sam Reinhart</td>
<td>$8,625,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,625,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$8,388,889</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$8,388,889</td></tr>
<tr><td>J.T. Miller</td>
<td>$8,000,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$8,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,656,250</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,656,250</td></tr>
<tr><td>Noah Hanifin</td>
<td>$7,350,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,083,334</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,083,334</td></tr>
<tr><td>Nico Hischier</td>
<td>$7,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,459,375</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,459,375</td></tr>
<tr><td>Devon Toews</td>
<td>$7,250,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,856,250</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,856,250</td></tr>
<tr><td>MacKenzie Weegar</td>
<td>$6,250,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,250,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,250,000</td></tr>
<tr><td>Jacob Markstrom</td>
<td>$6,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,000,000</td></tr>
<tr><td>Neal Pionk</td>
<td>$5,875,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,875,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,875,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,875,000</td></tr>
<tr><td>Trevor Moore</td>
<td>$4,200,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,200,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,812,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,812,500</td></tr>
<tr><td>Alexandre Carrier</td>
<td>$3,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td>Boone Jenner</td>
<td>$3,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,750,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td>Cody Glass</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>Connor Ingram</td>
<td>$1,306,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,306,500</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,306,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,306,500</td></tr>
<tr><td>Nic Dowd</td>
<td>$1,300,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,300,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,162,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,162,500</td></tr>
<tr><td>Daniil Miromanov</td>
<td>$1,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,250,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$1,087,500</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$1,087,500</td></tr>
<tr><td>Jimmy Vesey</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$783,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$783,333</td></tr>
<tr><td>Kirill Marchenko</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>18</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $84,956,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $74,481,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $62,175,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $41,675,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $81,695,506</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $71,374,673</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $59,230,673</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $40,047,223</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $84,956,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $74,481,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $62,175,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $41,675,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Matthew Coronato</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$92,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$92,500</td></tr>
<tr><td>Joel Blomqvist</td>
<td>$88,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$88,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$88,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$88,667</td></tr>
<tr><td>Nikita Novikov</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Walker Duehr</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,583</td></tr>
<tr><td>Stanislav Svozil</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,500</td></tr>
<tr><td>Ville Koivunen</td>
<td>$80,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,583</td></tr>
<tr><td>Samuel Helenius</td>
<td>$80,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,583</td></tr>
<tr><td>Cale Fleury</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,000</td></tr>
<tr><td>Spencer Martin</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$76,875</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$76,875</td></tr>
<tr><td>Mathias Laferriere</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Jonas Rondbjerg</td>
<td>$76,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$76,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$76,667</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$76,667</td></tr>
<tr><td>Lauri Pajuniemi</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jordan Spence</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Scott Reedy</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Ronan Seeley</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Cooper Marody</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Dennis Cholowski</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Jack Rathbone</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Markus Niemelainen</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>19</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $905,750</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $419,083</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $905,208</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $419,083</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_MIN"><a id="Wild">Wild</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=15">Wild Page</a> ]
[ <a href="LHSQC-TeamFinance.php#Wild">Team Finance</a> ]
[ <a href="LHSQC-TeamRecords.php#Wild">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Wild');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Wild" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Xcel Energy Center</td></tr>
<tr><td>Level 1: </td><td>6010 - $125 - 0 - 0.00%</td></tr>
<tr><td>Level 2: </td><td>5012 - $75 - 0 - 0.00%</td></tr>
<tr><td>Level 3: </td><td>2014 - $44 - 0 - 0.00%</td></tr>
<tr><td>Level 4: </td><td>4014 - $37 - 0 - 0.00%</td></tr>
<tr><td>Luxury : </td><td>1014 - $250 - 0 - 0.00%</td></tr>
<tr><td>Total Capacity :</td><td>18064</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>0</td></tr>
<tr><td>Average Attendance - %</td><td>0 - 0.00%</td></tr>
<tr><td>Average Income per Game</td><td>$0</td></tr>
<tr><td>Year to Date Revenue</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$58,332,318</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,450,458</td></tr>
<tr><td>Coaches Total Salaries</td><td>$0</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$0</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$0</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Estimated Season Revenue</td><td>$0</td></tr>
<tr><td>Pro Remaining Season Days</td><td>0</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$0</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$0</td></tr>
<tr><td>Farm Remaining Season Days</td><td>0</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$0</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$0</td></tr>
<tr><td>Estimated Season Expenses</td><td>$0</td></tr>
<tr><td>Season Salary Cap</td><td>$0</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $88,000,000</td><td>$0</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $65,000,000 </td><td>$0</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$169,234,244</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$169,234,244</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Carey Price</td>
<td>$10,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$10,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$10,055,556</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$10,055,556</td></tr>
<tr><td>Shea Weber</td>
<td>$7,857,143 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,857,143</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,857,144</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,857,144</td></tr>
<tr><td>Marc-Edouard Vlasic</td>
<td>$7,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$7,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$7,000,000</td></tr>
<tr><td>Brendan Gallagher</td>
<td>$6,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$6,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$6,107,143</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$6,107,143</td></tr>
<tr><td>Rasmus Ristolainen</td>
<td>$5,100,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$5,100,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$5,150,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$5,150,000</td></tr>
<tr><td>Alex Vlasic</td>
<td>$4,600,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,600,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$4,073,810</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$4,073,810</td></tr>
<tr><td>Marcus Pettersson</td>
<td>$4,025,175 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,025,175</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$3,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td>Tucker Poolman</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,500,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>Mackenzie Blackwood</td>
<td>$2,350,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,350,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,350,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,350,000</td></tr>
<tr><td>Morgan Geekie</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Klim Kostin</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$2,000,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Pontus Holmberg</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$800,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$800,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$800,000</td></tr>
<tr><td>Dominic Toninato</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Anton Blidh</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$766,667</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Samuel Fagemo</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Lukas Rousek</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td align="right">-Salary Average : </td>
<td>$793,333</td></tr>
<tr><td align="right">-Salary Average Remaining : </td>
<td>$793,333</td></tr>
<tr><td>Pat Maroon</td>
<td>$0 (0)</td></tr>
<tr><td>Nikita Zaitsev</td>
<td>$0 (0)</td></tr>
<tr><td>Brad Hunt</td>
<td>$0 (0)</td></tr>
<tr><td>Raphael Lavoie</td>
<td>$0 (0)</td></tr>
<tr><td>Radim Simek</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,332,318</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $41,557,143</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $16,200,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $4,600,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,495,320</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $40,243,653</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $15,330,953</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $4,073,810</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,332,318</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $41,557,143</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $16,200,000</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $4,600,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Ross Johnston</td>
<td>$110,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$110,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$108,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$108,000</td></tr>
<tr><td>Anton Malmstrom</td>
<td>$91,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$91,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$91,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$91,000</td></tr>
<tr><td>Ilya Usau</td>
<td>$89,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,750</td></tr>
<tr><td>Aku Raty</td>
<td>$89,625 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$89,625</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$89,625</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$89,625</td></tr>
<tr><td>Magnus Chrona</td>
<td>$86,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$86,750</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$86,750</td></tr>
<tr><td>Bennett MacArthur</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,917</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,917</td></tr>
<tr><td>Cameron Butler</td>
<td>$85,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,833</td></tr>
<tr><td>Dominic DiVincentiis</td>
<td>$85,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,833</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,833</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,833</td></tr>
<tr><td>Sam Malinski</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,000</td></tr>
<tr><td>Aatu Raty</td>
<td>$83,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$83,667</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$83,733</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$83,733</td></tr>
<tr><td>Philippe Daoust</td>
<td>$82,167 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$82,167</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$82,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$82,167</td></tr>
<tr><td>Zac Jones</td>
<td>$81,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$81,250</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$85,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$85,000</td></tr>
<tr><td>Roman Schmidt</td>
<td>$80,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,583</td></tr>
<tr><td>Aleksi Heimosalmi</td>
<td>$80,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$80,583</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,583</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,583</td></tr>
<tr><td>Brett Seney</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$77,500</td></tr>
<tr><td>Declan Carlile</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$80,167</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$80,167</td></tr>
<tr><td>Jake Livingstone</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,500</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$40,000</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$40,000</td></tr>
<tr><td>Josh Dunne</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Karel Plasek</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Simon Johansson</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Glenn Gawdin</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Hugo Alnefelt</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Mitchell Stephens</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td>Erik Portillo</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average : </td>
<td>$0</td></tr>
<tr><td align="right">Salary Average Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>24</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,450,458</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $520,332</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,417,441</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $520,999</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2"><b>Year 2027 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="STHSTeamFinance_SalaryCapCentrale"><a id="SalaryCapCentrale">Salary Cap Centrale</a></h1>
<table class="STHSFinance_TeamTable"><tr>
<td class="STHSCenter"><h3 class="STHSTeamFinance_Team">Team</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_CurrentFund">Current Fund</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_Payroll">Season Salary Cap</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_UnderMaximum">Under Maximum of $88,000,000 <br/> Available Cap Space</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_OverMinimum">Over Minimum of<br />$65,000,000</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_FarmSalaryCap">Farm Salary Cap</h3></td>
<td class="STHSCenter"><h3class="STHSTeamFinance_UnderFarmMaximum">Under Maximum of <br/>$70,200,000</h3></td>
<td><h3 class="STHSTeamFinance_ProPlayers">Pro Players</h3></td><td><h3 class="STHSTeamFinance_FarmPlayers">Farm Players</h3></td><td><h3 class="STHSTeamFinance_TotalPlayers">Total Players</h3></td></tr>
<tr><td>Avalanche</td>
<td>$299,822,504</td>
<td>$76,963,333</td>
<td>$11,036,667</td>
<td>$11,963,333</td>
<td>$1,356,139</td>
<td>$68,843,861</td>
<td>23</td><td>19</td><td>42</td></tr>
<tr><td>Blackhawks</td>
<td>$127,484,232</td>
<td>$73,995,667</td>
<td>$14,004,333</td>
<td>$8,995,667</td>
<td>$1,371,057</td>
<td>$68,828,943</td>
<td>17</td><td>19</td><td>36</td></tr>
<tr><td>Blue Jackets</td>
<td>$238,164,778</td>
<td>$78,950,000</td>
<td>$9,050,000</td>
<td>$13,950,000</td>
<td>$1,320,582</td>
<td>$68,879,418</td>
<td>22</td><td>18</td><td>40</td></tr>
<tr><td>Blues</td>
<td>$150,509,175</td>
<td>$87,347,500</td>
<td>$652,500</td>
<td>$22,347,500</td>
<td>$1,301,749</td>
<td>$68,898,251</td>
<td>22</td><td>22</td><td>44</td></tr>
<tr><td>Bruins</td>
<td>$117,027,225</td>
<td>$79,378,000</td>
<td>$8,622,000</td>
<td>$14,378,000</td>
<td>$1,195,417</td>
<td>$69,004,583</td>
<td>20</td><td>18</td><td>38</td></tr>
<tr><td>Canadiens</td>
<td>$52,170,311</td>
<td>$60,938,333</td>
<td>$27,061,667</td>
<td><span style="color:red">-$4,061,667</span></td>
<td>$1,366,166</td>
<td>$68,833,834</td>
<td>15</td><td>19</td><td>34</td></tr>
<tr><td>Canucks</td>
<td>$159,178,384</td>
<td>$60,356,716</td>
<td>$27,643,284</td>
<td><span style="color:red">-$4,643,284</span></td>
<td>$1,535,251</td>
<td>$68,664,749</td>
<td>17</td><td>21</td><td>38</td></tr>
<tr><td>Capitals</td>
<td>$231,821,152</td>
<td>$66,215,000</td>
<td>$21,785,000</td>
<td>$1,215,000</td>
<td>$1,331,500</td>
<td>$68,868,500</td>
<td>15</td><td>23</td><td>38</td></tr>
<tr><td>Devils</td>
<td>$29,427,380</td>
<td>$73,958,334</td>
<td>$14,041,666</td>
<td>$8,958,334</td>
<td>$1,237,501</td>
<td>$68,962,499</td>
<td>16</td><td>21</td><td>37</td></tr>
<tr><td>Ducks</td>
<td>$96,798,219</td>
<td>$74,131,190</td>
<td>$13,868,810</td>
<td>$9,131,190</td>
<td>$1,939,280</td>
<td>$68,260,720</td>
<td>15</td><td>18</td><td>33</td></tr>
<tr><td>Flames</td>
<td>$119,493,642</td>
<td>$58,976,666</td>
<td>$29,023,334</td>
<td><span style="color:red">-$6,023,334</span></td>
<td>$1,513,334</td>
<td>$68,686,666</td>
<td>18</td><td>24</td><td>42</td></tr>
<tr><td>Flyers</td>
<td>$218,641,837</td>
<td>$67,224,047</td>
<td>$20,775,953</td>
<td>$2,224,047</td>
<td>$932,965</td>
<td>$69,267,035</td>
<td>16</td><td>17</td><td>33</td></tr>
<tr><td>Golden Knights</td>
<td>$119,533,923</td>
<td>$61,705,833</td>
<td>$26,294,167</td>
<td><span style="color:red">-$3,294,167</span></td>
<td>$1,194,166</td>
<td>$69,005,834</td>
<td>13</td><td>17</td><td>30</td></tr>
<tr><td>Hurricanes</td>
<td>$257,252,729</td>
<td>$71,856,000</td>
<td>$16,144,000</td>
<td>$6,856,000</td>
<td>$1,526,034</td>
<td>$68,673,966</td>
<td>14</td><td>17</td><td>31</td></tr>
<tr><td>Islanders</td>
<td>$54,145,150</td>
<td>$73,029,167</td>
<td>$14,970,833</td>
<td>$8,029,167</td>
<td>$677,417</td>
<td>$69,522,583</td>
<td>17</td><td>16</td><td>33</td></tr>
<tr><td>Jets</td>
<td>$98,392,290</td>
<td>$57,513,333</td>
<td>$30,486,667</td>
<td><span style="color:red">-$7,486,667</span></td>
<td>$891,000</td>
<td>$69,309,000</td>
<td>16</td><td>19</td><td>35</td></tr>
<tr><td>Kings</td>
<td>$96,065,408</td>
<td>$62,608,333</td>
<td>$25,391,667</td>
<td><span style="color:red">-$2,391,667</span></td>
<td>$407,500</td>
<td>$69,792,500</td>
<td>16</td><td>9</td><td>25</td></tr>
<tr><td>Kraken</td>
<td>$155,480,399</td>
<td>$43,225,000</td>
<td>$44,775,000</td>
<td><span style="color:red">-$21,775,000</span></td>
<td>$1,547,792</td>
<td>$68,652,208</td>
<td>12</td><td>23</td><td>35</td></tr>
<tr><td>Lightning</td>
<td>$162,268,970</td>
<td>$79,712,007</td>
<td>$8,287,993</td>
<td>$14,712,007</td>
<td>$1,164,834</td>
<td>$69,035,166</td>
<td>18</td><td>21</td><td>39</td></tr>
<tr><td>Maple Leafs</td>
<td>$117,296,527</td>
<td>$64,360,834</td>
<td>$23,639,166</td>
<td><span style="color:red">-$639,166</span></td>
<td>$850,195</td>
<td>$69,349,805</td>
<td>16</td><td>18</td><td>34</td></tr>
<tr><td>Oilers</td>
<td>$123,967,158</td>
<td>$75,284,500</td>
<td>$12,715,500</td>
<td>$10,284,500</td>
<td>$1,350,999</td>
<td>$68,849,001</td>
<td>20</td><td>18</td><td>38</td></tr>
<tr><td>Panthers</td>
<td>$160,943,646</td>
<td>$77,207,143</td>
<td>$10,792,857</td>
<td>$12,207,143</td>
<td>$786,634</td>
<td>$69,413,366</td>
<td>17</td><td>12</td><td>29</td></tr>
<tr><td>Penguins</td>
<td>$128,702,164</td>
<td>$58,475,000</td>
<td>$29,525,000</td>
<td><span style="color:red">-$6,525,000</span></td>
<td>$713,417</td>
<td>$69,486,583</td>
<td>16</td><td>14</td><td>30</td></tr>
<tr><td>Predators</td>
<td>$153,802,557</td>
<td>$48,420,833</td>
<td>$39,579,167</td>
<td><span style="color:red">-$16,579,167</span></td>
<td>$1,031,916</td>
<td>$69,168,084</td>
<td>13</td><td>18</td><td>31</td></tr>
<tr><td>Rangers</td>
<td>$112,923,283</td>
<td>$70,116,190</td>
<td>$17,883,810</td>
<td>$5,116,190</td>
<td>$1,032,667</td>
<td>$69,167,333</td>
<td>15</td><td>17</td><td>32</td></tr>
<tr><td>Red Wings</td>
<td>$207,778,238</td>
<td>$59,850,834</td>
<td>$28,149,166</td>
<td><span style="color:red">-$5,149,166</span></td>
<td>$1,627,861</td>
<td>$68,572,139</td>
<td>17</td><td>21</td><td>38</td></tr>
<tr><td>Sabres</td>
<td>$339,949,084</td>
<td>$56,780,714</td>
<td>$31,219,286</td>
<td><span style="color:red">-$8,219,286</span></td>
<td>$1,247,833</td>
<td>$68,952,167</td>
<td>15</td><td>18</td><td>33</td></tr>
<tr><td>Senators</td>
<td>$233,747,897</td>
<td>$79,429,167</td>
<td>$8,570,833</td>
<td>$14,429,167</td>
<td>$1,387,377</td>
<td>$68,812,623</td>
<td>18</td><td>22</td><td>40</td></tr>
<tr><td>Sharks</td>
<td>$154,250,213</td>
<td>$62,325,000</td>
<td>$25,675,000</td>
<td><span style="color:red">-$2,675,000</span></td>
<td>$1,221,861</td>
<td>$68,978,139</td>
<td>17</td><td>19</td><td>36</td></tr>
<tr><td>Stars</td>
<td>$147,915,632</td>
<td>$63,424,524</td>
<td>$24,575,476</td>
<td><span style="color:red">-$1,575,476</span></td>
<td>$1,926,362</td>
<td>$68,273,638</td>
<td>16</td><td>26</td><td>42</td></tr>
<tr><td>Utah Hockey Club</td>
<td>$107,764,691</td>
<td>$84,956,500</td>
<td>$3,043,500</td>
<td>$19,956,500</td>
<td>$905,750</td>
<td>$69,294,250</td>
<td>18</td><td>19</td><td>37</td></tr>
<tr><td>Wild</td>
<td>$169,234,244</td>
<td>$58,332,318</td>
<td>$29,667,682</td>
<td><span style="color:red">-$6,667,682</span></td>
<td>$1,450,458</td>
<td>$68,749,542</td>
<td>21</td><td>24</td><td>45</td></tr>
</table>
<?php include "Footer.php";?>
