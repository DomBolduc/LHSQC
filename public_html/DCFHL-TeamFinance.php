<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<script src="STHSMain.js"></script>
<title>DCFHL - Team Finance</title>
<script src="DCFHL.js"></script>
<meta name="author" content="Simon Tremblay, sths.simont.info" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Decription" content="Dom Bolduc - STHS - Version : 3.4.1.2 - DCFHL-STHS.db - DCFHL-STHSCareerStat.db"/>
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
<div class="STHSTopLink"><a id="STHSRosterTop"></a> <a href="#Avalanche">Avalanche</a> | <a href="#Blackhawks">Blackhawks</a> | <a href="#BlueJackets">Blue Jackets</a> | <a href="#Blues">Blues</a> | <a href="#Bruins">Bruins</a> | <a href="#Canadiens">Canadiens</a> | <a href="#Canucks">Canucks</a> | <a href="#Capitals">Capitals</a> | <a href="#Coyotes">Coyotes</a> | <a href="#Devils">Devils</a> | <a href="#Ducks">Ducks</a> | <a href="#Flames">Flames</a> | <a href="#Flyers">Flyers</a> | <a href="#GoldenKnights">Golden Knights</a> | <a href="#Hurricanes">Hurricanes</a> | <a href="#Islanders">Islanders</a> | <a href="#Jets">Jets</a> | <a href="#Kings">Kings</a> | <a href="#Kraken">Kraken</a> | <a href="#Lightning">Lightning</a> | <a href="#MapleLeafs">Maple Leafs</a> | <a href="#Oilers">Oilers</a> | <a href="#Panthers">Panthers</a> | <a href="#Penguins">Penguins</a> | <a href="#Predators">Predators</a> | <a href="#Rangers">Rangers</a> | <a href="#RedWings">Red Wings</a> | <a href="#Sabres">Sabres</a> | <a href="#Senators">Senators</a> | <a href="#Sharks">Sharks</a> | <a href="#Stars">Stars</a> | <a href="#Wild">Wild</a> | <a href="javascript:STHS_JS_CloseAll('');">Close All Team View</a> | <a href="javascript:STHS_JS_OpenAll('');">Open All Team View</a>
 | <a href="#SalaryCapCentrale">Salary Cap Centrale Report</a></div>
<h1 class="TeamFinancePro_COL"><a id="Avalanche">Avalanche</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=8">Avalanche Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Avalanche">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Avalanche">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Avalanche');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Avalanche" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Ball Arena</td></tr>
<tr><td>Level 1: </td><td>6004 - $120 - 5,772 - 96.13%</td></tr>
<tr><td>Level 2: </td><td>5000 - $75 - 4,734 - 94.68%</td></tr>
<tr><td>Level 3: </td><td>2001 - $43 - 1,986 - 99.26%</td></tr>
<tr><td>Level 4: </td><td>4001 - $30 - 3,857 - 96.39%</td></tr>
<tr><td>Luxury : </td><td>1001 - $230 - 996 - 99.48%</td></tr>
<tr><td>Total Capacity :</td><td>18007</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>16</td></tr>
<tr><td>Average Attendance - %</td><td>17,345 - 96.32%</td></tr>
<tr><td>Average Income per Game</td><td>$1,403,939</td></tr>
<tr><td>Year to Date Revenue</td><td>$35,098,472</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$80,125,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,348,300</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$54,338,433</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,600,157</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$53,671,758</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$22,463,022</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$422,526</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,041,664</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,555</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$841,185</td></tr>
<tr><td>Estimated Season Expenses</td><td>$27,882,849</td></tr>
<tr><td>Season Salary Cap</td><td>$80,125,000</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$3,375,000</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$18,425,000</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$292,238,941</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$286,819,114</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Nathan MacKinnon</td>
<td>$12,600,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,200,000</td></tr>
<tr><td>Brayden Point</td>
<td>$9,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Adam Fox</td>
<td>$9,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Jesper Bratt</td>
<td>$7,875,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,625,000</td></tr>
<tr><td>Ryan Nugent-Hopkins</td>
<td>$5,125,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,708,333</td></tr>
<tr><td>Spencer Knight</td>
<td>$4,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Bowen Byram</td>
<td>$3,850,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,283,333</td></tr>
<tr><td>Scott Mayfield</td>
<td>$3,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>Jonas Siegenthaler</td>
<td>$3,400,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,133,333</td></tr>
<tr><td>Mario Ferraro</td>
<td>$3,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,083,333</td></tr>
<tr><td>Adam Lowry</td>
<td>$3,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,083,333</td></tr>
<tr><td>Nicolas Roy</td>
<td>$3,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Sergei Bobrovsky</td>
<td>$3,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Eetu Luostarinen</td>
<td>$1,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Owen Tippett</td>
<td>$1,500,000 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Logan O'Connor</td>
<td>$1,050,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$350,000</td></tr>
<tr><td>Curtis Lazar</td>
<td>$1,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Logan Stanley</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Lucas Raymond</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Connor Dewar</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $80,125,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $83,600,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $77,700,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $63,700,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,046,457</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $79,312,846</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $73,494,096</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $60,443,402</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $80,125,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $77,400,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $71,500,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $57,500,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Riley Stillman</td>
<td>$135,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$46,385</td></tr>
<tr><td>Adam Fantilli</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Spencer Stastney</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Carter Savoie</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Alex Laferriere</td>
<td>$87,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,064</td></tr>
<tr><td>Oliver Wahlstrom</td>
<td>$87,413 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,034</td></tr>
<tr><td>Matthew Poitras</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Matthew Maggio</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Max Sasson</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Thomas Harley</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Jack Quinn</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>David Spacek</td>
<td>$86,250 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,635</td></tr>
<tr><td>Talyn Boyko</td>
<td>$85,083 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Maxim Cajkovic</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Zach Bogosian</td>
<td>$85,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Tyson Kozak</td>
<td>$85,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Samuel Knazko</td>
<td>$84,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,119</td></tr>
<tr><td>Francesco Pinelli</td>
<td>$84,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,033</td></tr>
<tr><td>Remi Poirier</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Anttoni Honka</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Eemil Viro</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Nolan Allan</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Dustin Wolf</td>
<td>$81,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,945</td></tr>
<tr><td>Ty Voit</td>
<td>$80,056 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,506</td></tr>
<tr><td>Mike Hardman</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>William Lockwood</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Danton Heinen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>27</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,348,300</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,570,639</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $727,306</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,364,301</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,557,306</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $713,973</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_CHI"><a id="Blackhawks">Blackhawks</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=7">Blackhawks Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Blackhawks">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Blackhawks">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Blackhawks');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Blackhawks" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">United Center</td></tr>
<tr><td>Level 1: </td><td>5400 - $135 - 4,679 - 86.65%</td></tr>
<tr><td>Level 2: </td><td>5810 - $80 - 4,379 - 75.37%</td></tr>
<tr><td>Level 3: </td><td>2501 - $49 - 1,915 - 76.58%</td></tr>
<tr><td>Level 4: </td><td>4503 - $37 - 2,993 - 66.46%</td></tr>
<tr><td>Luxury : </td><td>1503 - $275 - 977 - 65.00%</td></tr>
<tr><td>Total Capacity :</td><td>19717</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>16</td></tr>
<tr><td>Average Attendance - %</td><td>14,943 - 75.79%</td></tr>
<tr><td>Average Income per Game</td><td>$1,322,475</td></tr>
<tr><td>Year to Date Revenue</td><td>$33,061,873</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$80,256,750</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,463,307</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$800,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$53,328,971</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,567,113</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$52,662,321</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$21,159,599</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$423,212</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,085,568</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$13,145</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$880,715</td></tr>
<tr><td>Estimated Season Expenses</td><td>$27,966,283</td></tr>
<tr><td>Season Salary Cap</td><td>$81,056,750</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$2,443,250</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$19,356,750</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$115,854,021</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$109,047,337</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Auston Matthews</td>
<td>$11,640,250 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,880,083</td></tr>
<tr><td>Roman Josi</td>
<td>$9,059,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,019,667</td></tr>
<tr><td>Brayden Schenn</td>
<td>$6,500,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Ondrej Palat</td>
<td>$6,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Teuvo Teravainen</td>
<td>$5,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,800,000</td></tr>
<tr><td>Evander Kane</td>
<td>$5,125,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,708,333</td></tr>
<tr><td>Jesperi Kotkaniemi</td>
<td>$4,820,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,606,667</td></tr>
<tr><td>Christian Dvorak</td>
<td>$4,450,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,483,333</td></tr>
<tr><td>John Marino</td>
<td>$4,400,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,466,667</td></tr>
<tr><td>Nino Niederreiter</td>
<td>$4,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Nikita Zadorov</td>
<td>$3,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,250,000</td></tr>
<tr><td>Marc-Andre Fleury</td>
<td>$3,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>TJ Brodie</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Casey DeSmith</td>
<td>$1,800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$600,000</td></tr>
<tr><td>Isac Lundestrom</td>
<td>$1,800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$600,000</td></tr>
<tr><td>Michael McLeod</td>
<td>$1,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$466,667</td></tr>
<tr><td>Rasmus Sandin</td>
<td>$1,400,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$466,667</td></tr>
<tr><td>Rafael Harvey-Pinard</td>
<td>$1,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Denis Gurianov</td>
<td>$850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$283,333</td></tr>
<tr><td>Jaycob Megna</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $80,256,750</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $63,304,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,754,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $52,629,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $81,412,198</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $60,260,531</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $55,226,364</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $50,704,625</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $80,256,750</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,494,250</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $52,944,250</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $47,819,250</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Lian Bichsel</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Jakub Dobes</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Ivan Morozov</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Justin Barron</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Drew Helleson</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Xavier Bourgault</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Mavrik Bourque</td>
<td>$89,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Blake McLaughlin</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Ryan Fanti</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Emil Martinsen Lilleberg</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Parker Ford</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Aleksander Kisakov</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Henry Rybinski</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Isaak Phillips</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Tyler Angle</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Gianni Fairbrother</td>
<td>$84,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,148</td></tr>
<tr><td>Will Cranley</td>
<td>$84,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,919</td></tr>
<tr><td>Joshua Roy</td>
<td>$83,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,690</td></tr>
<tr><td>Ryan Mast</td>
<td>$83,056 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,537</td></tr>
<tr><td>Albert Johansson</td>
<td>$82,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,174</td></tr>
<tr><td>Mason Millman</td>
<td>$81,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,117</td></tr>
<tr><td>Otto Koivula</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Vasily Ponomarev</td>
<td>$79,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,315</td></tr>
<tr><td>Olle Lycksell</td>
<td>$78,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Tobias Bjornfot</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Travis Barron</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Zac Dalpe</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Johnathan Kovacevic</td>
<td>$76,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,342</td></tr>
<tr><td>Spencer Smallman</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>29</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,463,307</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,448,141</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $261,556</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,460,807</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,447,308</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $261,556</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_CBJ"><a id="BlueJackets">Blue Jackets</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=9">Blue Jackets Page</a> ]
[ <a href="DCFHL-TeamFinance.php#BlueJackets">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#BlueJackets">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_BlueJackets');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_BlueJackets" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Nationwide Arena</td></tr>
<tr><td>Level 1: </td><td>6022 - $125 - 5,778 - 95.94%</td></tr>
<tr><td>Level 2: </td><td>5041 - $75 - 4,762 - 94.47%</td></tr>
<tr><td>Level 3: </td><td>2026 - $44 - 1,951 - 96.30%</td></tr>
<tr><td>Level 4: </td><td>4026 - $37 - 2,935 - 72.89%</td></tr>
<tr><td>Luxury : </td><td>1026 - $250 - 830 - 80.93%</td></tr>
<tr><td>Total Capacity :</td><td>18141</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>16,256 - 89.61%</td></tr>
<tr><td>Average Income per Game</td><td>$1,405,548</td></tr>
<tr><td>Year to Date Revenue</td><td>$37,949,784</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$82,535,834</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,215,082</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$55,169,851</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,555,030</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$54,503,196</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$19,677,666</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$435,082</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,845,248</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,872</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$795,424</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,640,672</td></tr>
<tr><td>Season Salary Cap</td><td>$82,535,834</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$964,166</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$20,835,834</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$230,756,657</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$221,793,651</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Connor McDavid</td>
<td>$12,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$4,166,667</td></tr>
<tr><td>David Pastrnak</td>
<td>$11,250,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,750,000</td></tr>
<tr><td>Kirill Kaprizov</td>
<td>$9,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>Roope Hintz</td>
<td>$8,450,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,816,667</td></tr>
<tr><td>Rasmus Dahlin</td>
<td>$6,000,000 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Trevor Zegras</td>
<td>$5,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,916,667</td></tr>
<tr><td>Erik Cernak</td>
<td>$5,200,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,733,333</td></tr>
<tr><td>Ville Husso</td>
<td>$4,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,583,333</td></tr>
<tr><td>Radek Faksa</td>
<td>$3,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,083,333</td></tr>
<tr><td>Martin Necas</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Kaapo Kahkonen</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Gustav Forsling</td>
<td>$2,666,667 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$888,889</td></tr>
<tr><td>Travis Hamonic</td>
<td>$1,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Rasmus Kupari</td>
<td>$1,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Josh Mahura</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Jonatan Berggren</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Dawson Mercer</td>
<td>$894,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$298,056</td></tr>
<tr><td>Luke Glendening</td>
<td>$800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Jesper Boqvist</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Trevor Lewis</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Ty Smith</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,535,834</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $79,800,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $68,900,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $41,650,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $85,999,259</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $75,267,592</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $65,367,592</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $39,403,703</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,535,834</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $71,716,667</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $60,816,667</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $33,566,667</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Nick Perbix</td>
<td>$112,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$38,654</td></tr>
<tr><td>Nils Hoglander</td>
<td>$110,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$37,795</td></tr>
<tr><td>Valtteri Pulli</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Brock Faber (Out of Payroll)</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Vasily Podkolzin</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Shane Wright</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Jiri Kulich</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Pavel Mintyukov</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Karl Henriksson</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Hardy Haman Aktell</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Jiri Smejkal</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Connor McMichael</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Sebastian Cossa</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Ronnie Attard</td>
<td>$85,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Olen Zellweger</td>
<td>$84,417 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,005</td></tr>
<tr><td>Ozzy Wiesblatt</td>
<td>$83,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,718</td></tr>
<tr><td>Alex Alexeyev</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Logan Stankoven</td>
<td>$81,417 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,974</td></tr>
<tr><td>Nicholas Robertson</td>
<td>$79,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,373</td></tr>
<tr><td>Lukas Cormier</td>
<td>$79,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,258</td></tr>
<tr><td>Matt Tomkins</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Emilio Pettersen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Collin Delia</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Justin Kirkland</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Matt Luff</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Martin Kaut</td>
<td>$40,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$13,744</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>26</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,215,082</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,345,582</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $527,666</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,216,360</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,346,860</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $527,666</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_STL"><a id="Blues">Blues</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=25">Blues Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Blues">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Blues">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Blues');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Blues" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Entreprise Center</td></tr>
<tr><td>Level 1: </td><td>6255 - $115 - 5,862 - 93.71%</td></tr>
<tr><td>Level 2: </td><td>4073 - $65 - 4,181 - 102.66%</td></tr>
<tr><td>Level 3: </td><td>2256 - $40 - 2,100 - 93.08%</td></tr>
<tr><td>Level 4: </td><td>4256 - $28 - 3,903 - 91.70%</td></tr>
<tr><td>Luxury : </td><td>1256 - $175 - 1,118 - 89.03%</td></tr>
<tr><td>Total Capacity :</td><td>18096</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>16</td></tr>
<tr><td>Average Attendance - %</td><td>17,164 - 94.85%</td></tr>
<tr><td>Average Income per Game</td><td>$1,268,097</td></tr>
<tr><td>Year to Date Revenue</td><td>$31,702,423</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$82,529,033</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,403,123</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$55,075,914</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,431,856</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$54,409,290</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$20,289,551</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$435,047</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,843,008</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,837</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$860,079</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,703,087</td></tr>
<tr><td>Season Salary Cap</td><td>$82,529,033</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$970,967</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$20,829,033</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$155,124,296</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$146,710,760</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Patrik Laine</td>
<td>$8,700,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,900,000</td></tr>
<tr><td>Dylan Larkin</td>
<td>$8,700,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,900,000</td></tr>
<tr><td>Jason Robertson</td>
<td>$7,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,583,333</td></tr>
<tr><td>Aaron Ekblad</td>
<td>$7,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>William Nylander</td>
<td>$6,962,366 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,320,789</td></tr>
<tr><td>Adrian Kempe</td>
<td>$5,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Thatcher Demko</td>
<td>$5,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Ivan Barbashev</td>
<td>$5,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Jakob Chychrun</td>
<td>$4,600,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,533,333</td></tr>
<tr><td>Ryan Graves</td>
<td>$4,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Noah Dobson</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Kasperi Kapanen</td>
<td>$3,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,066,667</td></tr>
<tr><td>Scott Laughton</td>
<td>$3,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Ryan McLeod</td>
<td>$2,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$700,000</td></tr>
<tr><td>Brett Howden</td>
<td>$1,900,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$633,333</td></tr>
<tr><td>Seth Jarvis</td>
<td>$894,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$298,056</td></tr>
<tr><td>J.J. Peterka</td>
<td>$855,833 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$285,278</td></tr>
<tr><td>Pierre-Olivier Joseph</td>
<td>$825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Ian Mitchell</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Logan Thompson</td>
<td>$766,667 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$255,556</td></tr>
<tr><td>Tommy Novak</td>
<td>$0 (0)</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,529,033</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $81,372,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $59,650,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $29,700,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $77,263,875</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $71,556,930</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,381,930</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $28,906,930</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,529,033</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $76,834,866</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $55,112,366</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $25,162,366</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Jordan Harris</td>
<td>$140,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$48,103</td></tr>
<tr><td>Nikita Tolopilo</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Logan Cooley</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Luke Hughes</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Mads Sogaard</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Josh Doan</td>
<td>$92,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Michael Callahan</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Daniel Torgersson</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Louis Crevier</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Helge Grans</td>
<td>$84,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,119</td></tr>
<tr><td>Pavel Novak</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Fraser Minten</td>
<td>$84,583 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,062</td></tr>
<tr><td>Jake Chiasson</td>
<td>$84,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,976</td></tr>
<tr><td>Will Cuylle</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Trent Miner</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Elliot Desnoyers</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Joe Veleno</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Matt Rempe</td>
<td>$82,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,174</td></tr>
<tr><td>Jorian Donovan</td>
<td>$81,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,117</td></tr>
<tr><td>Cole Reinhardt</td>
<td>$81,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,945</td></tr>
<tr><td>Robin Salo</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Marc Johnstone</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Mitchell Chaffee</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Riley Damiani</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Dylan Gambrell</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Rasmus Asplund</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Mac Hollowell</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Liam Foudy</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>28</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,403,123</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,346,749</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $438,249</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,390,346</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,328,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $438,249</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_BOS"><a id="Bruins">Bruins</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=3">Bruins Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Bruins">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Bruins">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Bruins');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Bruins" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">TD Garden</td></tr>
<tr><td>Level 1: </td><td>6190 - $123 - 5,429 - 87.71%</td></tr>
<tr><td>Level 2: </td><td>5025 - $73 - 4,755 - 94.63%</td></tr>
<tr><td>Level 3: </td><td>2125 - $44 - 2,029 - 95.48%</td></tr>
<tr><td>Level 4: </td><td>4125 - $28 - 3,914 - 94.89%</td></tr>
<tr><td>Luxury : </td><td>100 - $233 - 160 - 160.30%</td></tr>
<tr><td>Total Capacity :</td><td>17565</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>16,288 - 92.73%</td></tr>
<tr><td>Average Income per Game</td><td>$1,188,595</td></tr>
<tr><td>Year to Date Revenue</td><td>$32,092,059</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$79,948,833</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,331,083</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$2,850,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$55,529,666</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,552,616</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$54,862,984</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$16,640,327</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$421,609</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$26,982,976</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,467</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$835,289</td></tr>
<tr><td>Estimated Season Expenses</td><td>$27,818,265</td></tr>
<tr><td>Season Salary Cap</td><td>$82,798,833</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$701,167</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$21,098,833</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$127,860,251</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$116,682,313</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Mitchell Marner</td>
<td>$10,903,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,634,333</td></tr>
<tr><td>Mathew Barzal</td>
<td>$9,150,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,050,000</td></tr>
<tr><td>Morgan Rielly</td>
<td>$7,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,500,000</td></tr>
<tr><td>Alex Killorn</td>
<td>$6,250,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Jordan Binnington</td>
<td>$6,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Neal Pionk</td>
<td>$5,875,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,958,333</td></tr>
<tr><td>Vladislav Gavrikov</td>
<td>$5,875,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,958,333</td></tr>
<tr><td>Vincent Trocheck</td>
<td>$5,625,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,875,000</td></tr>
<tr><td>Blake Coleman</td>
<td>$4,900,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,633,333</td></tr>
<tr><td>Brandon Saad</td>
<td>$4,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Lars Eller</td>
<td>$2,450,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$816,667</td></tr>
<tr><td>Jake Bean</td>
<td>$2,333,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$777,778</td></tr>
<tr><td>Barrett Hayton</td>
<td>$1,775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$591,667</td></tr>
<tr><td>Carl Grundstrom</td>
<td>$1,300,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$433,333</td></tr>
<tr><td>Alexey Toropchenko</td>
<td>$1,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$416,667</td></tr>
<tr><td>Arvid Soderblom</td>
<td>$962,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$320,833</td></tr>
<tr><td>Gustav Lindstrom</td>
<td>$950,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$316,667</td></tr>
<tr><td>Andrew Cogliano</td>
<td>$825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Parker Kelly</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td>Daniil Miromanov</td>
<td>$762,500 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $79,948,833</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $72,490,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,175,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $39,425,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $77,423,734</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $69,681,512</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $44,267,262</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $38,679,762</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $79,948,833</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $72,003,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $44,687,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $39,425,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Niko Mikkola</td>
<td>$250,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$85,897</td></tr>
<tr><td>Brad Lambert</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Zach Benson</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Matthew Coronato</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Nikita Nesterenko</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Brian Halonen</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Joakim Kemell</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>John Farinacci</td>
<td>$91,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,267</td></tr>
<tr><td>Layton Ahac</td>
<td>$89,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,837</td></tr>
<tr><td>Calle Clang</td>
<td>$87,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,179</td></tr>
<tr><td>Maxwell Crozier</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Kim Nousiainen</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Artur Akhtiamov</td>
<td>$85,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,262</td></tr>
<tr><td>Sam Carrick</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Adam Raska</td>
<td>$84,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,148</td></tr>
<tr><td>Ole Bjorgvik-Holm</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Patrick Giles</td>
<td>$81,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,917</td></tr>
<tr><td>Djibril Toure</td>
<td>$80,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,659</td></tr>
<tr><td>Joel Hanley</td>
<td>$78,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Lucas Condotta</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Keith Kinkaid</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Joseph Cecconi</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Joel Kiviranta</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Turner Elson</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Paul LaDue</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Filip Hallander</td>
<td>$40,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$13,744</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>26</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,331,083</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,380,250</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $602,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,344,708</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,380,250</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $602,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_MTL"><a id="Canadiens">Canadiens</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=16">Canadiens Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Canadiens">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Canadiens">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Canadiens');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Canadiens" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Bell Center</td></tr>
<tr><td>Level 1: </td><td>6654 - $95 - 6,034 - 90.69%</td></tr>
<tr><td>Level 2: </td><td>5654 - $60 - 4,939 - 87.36%</td></tr>
<tr><td>Level 3: </td><td>2655 - $22 - 2,312 - 87.09%</td></tr>
<tr><td>Level 4: </td><td>4655 - $18 - 4,364 - 93.75%</td></tr>
<tr><td>Luxury : </td><td>1655 - $100 - 1,221 - 73.78%</td></tr>
<tr><td>Total Capacity :</td><td>21273</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>13</td></tr>
<tr><td>Average Attendance - %</td><td>18,871 - 88.71%</td></tr>
<tr><td>Average Income per Game</td><td>$1,065,094</td></tr>
<tr><td>Year to Date Revenue</td><td>$29,822,644</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$73,814,166</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,015,124</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$2,500,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$50,752,476</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,409,782</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$50,085,742</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$13,846,228</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$389,657</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$24,938,048</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$10,847</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$726,749</td></tr>
<tr><td>Estimated Season Expenses</td><td>$25,664,797</td></tr>
<tr><td>Season Salary Cap</td><td>$76,314,166</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$7,185,834</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$14,614,166</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$60,305,457</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$48,486,888</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>John Tavares</td>
<td>$11,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,666,667</td></tr>
<tr><td>Anze Kopitar</td>
<td>$10,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,333,333</td></tr>
<tr><td>Robert Thomas</td>
<td>$8,125,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,708,333</td></tr>
<tr><td>Kris Letang</td>
<td>$6,100,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,033,333</td></tr>
<tr><td>Evgeni Malkin</td>
<td>$6,100,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,033,333</td></tr>
<tr><td>Oliver Bjorkstrand</td>
<td>$5,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,800,000</td></tr>
<tr><td>Elvis Merzlikins</td>
<td>$5,400,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,800,000</td></tr>
<tr><td>Rasmus Andersson</td>
<td>$4,550,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,516,667</td></tr>
<tr><td>Matt Roy</td>
<td>$3,150,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,050,000</td></tr>
<tr><td>Jeff Carter</td>
<td>$3,125,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,041,667</td></tr>
<tr><td>Henri Jokiharju</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Jake Evans</td>
<td>$1,700,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$566,667</td></tr>
<tr><td>Sam Montembeault</td>
<td>$1,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Marco Rossi</td>
<td>$863,333 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$287,778</td></tr>
<tr><td>Jakob Pelletier</td>
<td>$863,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$287,778</td></tr>
<tr><td>Jansen Harkins</td>
<td>$850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$283,333</td></tr>
<tr><td>Gerald Mayhew</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Connor Mackey</td>
<td>$775,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Mark Pysyk</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Tanner Laczynski</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $73,814,166</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $60,163,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $46,600,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $22,775,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $71,442,219</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,537,977</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,212,144</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $21,412,501</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $73,814,166</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $61,013,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $47,450,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $20,625,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Quentin Musty</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Easton Cowan</td>
<td>$93,583 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,154</td></tr>
<tr><td>Devon Levi</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Filip Mesar</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>William Stromgren</td>
<td>$90,083 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,952</td></tr>
<tr><td>Anton Wahlberg</td>
<td>$89,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,809</td></tr>
<tr><td>Andre Lee</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Mitchell Gibson</td>
<td>$86,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Ty Glover</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Rory Kerins</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Jacob Melanson</td>
<td>$84,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,976</td></tr>
<tr><td>Garin Bjorklund</td>
<td>$84,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,976</td></tr>
<tr><td>Angus Crookshank</td>
<td>$83,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,804</td></tr>
<tr><td>Jack Thompson</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Vincent Iorio</td>
<td>$81,417 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,974</td></tr>
<tr><td>Steven Santini</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Joel Hofer</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jeffrey Viel</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jack Ahcan</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>John Leonard</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Ryan Shea</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Riley Sutter</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brady Keeper</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Mark Friedman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>24</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,015,124</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,211,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $541,583</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,014,124</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,211,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $541,583</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_VAN"><a id="Canucks">Canucks</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=29">Canucks Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Canucks">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Canucks">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Canucks');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Canucks" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Rogers Arena</td></tr>
<tr><td>Level 1: </td><td>6568 - $115 - 5,893 - 89.72%</td></tr>
<tr><td>Level 2: </td><td>5085 - $72 - 4,674 - 91.92%</td></tr>
<tr><td>Level 3: </td><td>2086 - $40 - 2,014 - 96.56%</td></tr>
<tr><td>Level 4: </td><td>4085 - $30 - 3,918 - 95.91%</td></tr>
<tr><td>Luxury : </td><td>1086 - $185 - 1,073 - 98.79%</td></tr>
<tr><td>Total Capacity :</td><td>18910</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>17</td></tr>
<tr><td>Average Attendance - %</td><td>17,572 - 92.92%</td></tr>
<tr><td>Average Income per Game</td><td>$1,340,244</td></tr>
<tr><td>Year to Date Revenue</td><td>$32,165,864</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$59,162,500</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,050,547</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$3,333,333</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$43,235,099</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,488,399</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$42,568,362</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$22,784,154</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$313,346</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$20,054,144</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,028</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$738,876</td></tr>
<tr><td>Estimated Season Expenses</td><td>$20,793,020</td></tr>
<tr><td>Season Salary Cap</td><td>$62,495,833</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$21,004,167</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$795,833</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$154,350,529</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$156,341,663</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Nicklas Backstrom</td>
<td>$9,200,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,066,667</td></tr>
<tr><td>Josh Norris</td>
<td>$7,950,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,650,000</td></tr>
<tr><td>Joel Farabee</td>
<td>$5,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Conor Garland</td>
<td>$4,950,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,650,000</td></tr>
<tr><td>Joonas Korpisalo</td>
<td>$4,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Ryan Lindgren</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Trevor van Riemsdyk</td>
<td>$3,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Evan Rodrigues</td>
<td>$3,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Ilya Lyubushkin</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Brett Kulak</td>
<td>$2,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Alexander Barabanov</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Casey Cizikas</td>
<td>$2,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Ryan Donato</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Alexandre Texier</td>
<td>$1,525,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$508,333</td></tr>
<tr><td>Jakub Zboril</td>
<td>$1,137,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$379,167</td></tr>
<tr><td>Jonathan Quick</td>
<td>$825,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Kole Lind</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Zach Aston-Reese</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Jonny Brodzinski</td>
<td>$762,500 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td>Jalen Chatfield</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $59,162,500</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $46,412,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $33,937,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $22,450,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $54,636,607</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $42,567,857</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $30,734,524</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $19,767,857</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $59,162,500</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $45,937,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $33,912,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $22,450,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Juraj Slafkovsky</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Corey Andonovski</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Bobby Brink</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Simon Edvinsson</td>
<td>$89,417 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Alexander Holtz</td>
<td>$89,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Shakir Mukhamadullin</td>
<td>$89,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Matthew Kessel</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Travis Mitchell</td>
<td>$88,250 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,322</td></tr>
<tr><td>Christian Kyrou</td>
<td>$87,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,179</td></tr>
<tr><td>Brett Berard</td>
<td>$86,750 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Zachary Bolduc</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>William Dufour</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>William Trudeau</td>
<td>$85,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,434</td></tr>
<tr><td>Akira Schmid</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Antonio Stranges</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Brady Stonehouse</td>
<td>$84,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,033</td></tr>
<tr><td>Jake Neighbours</td>
<td>$83,588 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,720</td></tr>
<tr><td>Danila Klimovich</td>
<td>$83,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,632</td></tr>
<tr><td>Daniil Chayka</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>James Hamblin</td>
<td>$80,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,745</td></tr>
<tr><td>Justus Annunen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Felix Sandstrom</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Nathan Todd</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jacob Moverare</td>
<td>$76,250 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>24</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,050,547</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,457,589</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $678,166</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,050,547</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,457,172</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $677,749</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_WSH"><a id="Capitals">Capitals</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=30">Capitals Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Capitals">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Capitals">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Capitals');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Capitals" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Capital One Arena</td></tr>
<tr><td>Level 1: </td><td>6033 - $120 - 5,771 - 95.66%</td></tr>
<tr><td>Level 2: </td><td>5133 - $72 - 4,717 - 91.90%</td></tr>
<tr><td>Level 3: </td><td>2140 - $48 - 1,654 - 77.30%</td></tr>
<tr><td>Level 4: </td><td>4133 - $32 - 3,865 - 93.53%</td></tr>
<tr><td>Luxury : </td><td>1134 - $224 - 1,060 - 93.50%</td></tr>
<tr><td>Total Capacity :</td><td>18573</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>17,068 - 91.90%</td></tr>
<tr><td>Average Income per Game</td><td>$1,399,114</td></tr>
<tr><td>Year to Date Revenue</td><td>$37,776,067</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$81,065,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,859,835</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$55,049,736</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,279,650</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$54,383,045</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$19,587,590</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$427,422</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,355,008</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$10,050</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$673,350</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,028,358</td></tr>
<tr><td>Season Salary Cap</td><td>$81,065,000</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$2,435,000</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$19,365,000</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$235,820,370</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$227,379,602</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Mikhail Sergachev</td>
<td>$8,500,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,833,333</td></tr>
<tr><td>Tim Stutzle</td>
<td>$8,350,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,783,333</td></tr>
<tr><td>Alex DeBrincat</td>
<td>$7,875,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,625,000</td></tr>
<tr><td>Dylan Cozens</td>
<td>$7,100,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,366,667</td></tr>
<tr><td>Adam Pelech</td>
<td>$5,750,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,916,667</td></tr>
<tr><td>Jaden Schwartz</td>
<td>$5,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Jack Campbell</td>
<td>$5,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Ilya Mikheyev</td>
<td>$4,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,583,333</td></tr>
<tr><td>Lawson Crouse</td>
<td>$4,300,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,433,333</td></tr>
<tr><td>Brian Dumoulin</td>
<td>$3,150,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,050,000</td></tr>
<tr><td>Matt Duchene</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Andrew Peeke</td>
<td>$2,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Martin Fehervary</td>
<td>$2,675,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$891,667</td></tr>
<tr><td>Tanner Jeannot</td>
<td>$2,665,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$888,333</td></tr>
<tr><td>Kyle Okposo</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Dylan DeMelo</td>
<td>$1,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Antti Raanta</td>
<td>$1,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Morgan Barron</td>
<td>$1,350,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$450,000</td></tr>
<tr><td>Sam Lafferty</td>
<td>$1,150,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$383,333</td></tr>
<tr><td>Kent Johnson</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Michael McCarron</td>
<td>$775,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $81,065,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $70,615,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $63,450,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $46,875,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $81,087,535</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $68,895,868</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $61,730,868</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $45,688,160</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $81,065,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $70,490,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $63,325,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $46,875,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Matej Blumel</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Emil Andrae</td>
<td>$90,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,038</td></tr>
<tr><td>Adam Beckman</td>
<td>$89,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Tristen Nielsen</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Sawyer Mynio</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Emil Pieniniemi</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Waltteri Merela</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Zachary Uens</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Vadim Zherenko</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Gannon Laroque</td>
<td>$83,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Leevi Merilainen</td>
<td>$82,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,174</td></tr>
<tr><td>Gage Goncalves</td>
<td>$82,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,174</td></tr>
<tr><td>Michael Pezzetta</td>
<td>$81,250 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,917</td></tr>
<tr><td>Tristen Robins</td>
<td>$79,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,401</td></tr>
<tr><td>Nathan Legare</td>
<td>$78,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,115</td></tr>
<tr><td>Artemi Knyazev</td>
<td>$78,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,115</td></tr>
<tr><td>Brady Lyle</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jonas Johansson</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Axel Jonsson-Fjallby</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>David Gustafsson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>David Gust</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Adam Ruzicka</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Vitali Kravtsov</td>
<td>$40,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$13,744</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,859,835</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,006,667</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $351,083</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,859,807</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,003,556</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $350,055</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_ARI"><a id="Coyotes">Coyotes</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=23">Coyotes Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Coyotes">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Coyotes">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Coyotes');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Coyotes" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Gila River Arena</td></tr>
<tr><td>Level 1: </td><td>5534 - $140 - 4,663 - 84.26%</td></tr>
<tr><td>Level 2: </td><td>4894 - $110 - 3,181 - 65.00%</td></tr>
<tr><td>Level 3: </td><td>1899 - $70 - 1,235 - 65.01%</td></tr>
<tr><td>Level 4: </td><td>3899 - $45 - 2,534 - 64.99%</td></tr>
<tr><td>Luxury : </td><td>899 - $220 - 899 - 100.00%</td></tr>
<tr><td>Total Capacity :</td><td>17125</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>15</td></tr>
<tr><td>Average Attendance - %</td><td>12,512 - 73.06%</td></tr>
<tr><td>Average Income per Game</td><td>$1,330,937</td></tr>
<tr><td>Year to Date Revenue</td><td>$34,604,368</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$82,225,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,100,233</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$55,840,538</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,390,622</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$55,173,804</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$19,964,058</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$433,464</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,741,696</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,283</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$755,961</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,497,657</td></tr>
<tr><td>Season Salary Cap</td><td>$82,225,000</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$1,275,000</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$20,525,000</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$105,856,912</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$97,323,313</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Nikita Kucherov</td>
<td>$9,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Dougie Hamilton</td>
<td>$9,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>J.T. Miller</td>
<td>$8,000,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,666,667</td></tr>
<tr><td>Nico Hischier</td>
<td>$7,250,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,416,667</td></tr>
<tr><td>Sam Reinhart</td>
<td>$6,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>MacKenzie Weegar</td>
<td>$6,250,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Pavel Buchnevich</td>
<td>$5,800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,933,333</td></tr>
<tr><td>Devon Toews</td>
<td>$4,100,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,366,667</td></tr>
<tr><td>Boone Jenner</td>
<td>$3,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,250,000</td></tr>
<tr><td>Ilya Samsonov</td>
<td>$3,550,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,183,333</td></tr>
<tr><td>Brayden McNabb</td>
<td>$2,850,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$950,000</td></tr>
<tr><td>Chandler Stephenson</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Alexandre Carrier</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Frederick Gaudreau</td>
<td>$2,100,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$700,000</td></tr>
<tr><td>Daniel Sprong</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Brandon Hagel</td>
<td>$1,500,000 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Nic Dowd</td>
<td>$1,300,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$433,333</td></tr>
<tr><td>Cam Talbot</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Kirill Marchenko</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Mark Giordano</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Jimmy Vesey</td>
<td>$800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,225,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $70,350,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $59,600,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $55,850,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $89,357,060</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $67,348,727</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $56,840,394</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $53,090,394</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,225,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $62,200,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $51,450,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $47,700,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Connor Ingram</td>
<td>$130,650 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$44,890</td></tr>
<tr><td>Aidan McDonough</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Joel Blomqvist</td>
<td>$88,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,465</td></tr>
<tr><td>Nikita Novikov</td>
<td>$86,750 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Brandon Coe</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Jack Rathbone</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Walker Duehr</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Stanislav Svozil</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Ronan Seeley</td>
<td>$82,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,289</td></tr>
<tr><td>Artyom Grushnikov</td>
<td>$81,417 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,974</td></tr>
<tr><td>Samuel Helenius</td>
<td>$80,583 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,688</td></tr>
<tr><td>Ville Koivunen</td>
<td>$80,583 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,688</td></tr>
<tr><td>Cale Fleury</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Mathias Laferriere</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jeremy Davies</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Rourke Chartier</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Scott Reedy</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jacob Lucchini</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jonas Rondbjerg</td>
<td>$76,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,342</td></tr>
<tr><td>Markus Niemelainen</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Spencer Martin</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Jack Studnicka</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Haydn Fleury</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Dennis Cholowski</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Byron Froese</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Lauri Pajuniemi</td>
<td>$40,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$13,744</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>26</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,100,233</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $870,317</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $631,150</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,128,170</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $870,400</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $631,150</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_NJ "><a id="Devils">Devils</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=18">Devils Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Devils">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Devils">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Devils');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Devils" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Prudential Center</td></tr>
<tr><td>Level 1: </td><td>6200 - $85 - 6,062 - 97.77%</td></tr>
<tr><td>Level 2: </td><td>4000 - $60 - 4,114 - 102.85%</td></tr>
<tr><td>Level 3: </td><td>2000 - $40 - 1,983 - 99.15%</td></tr>
<tr><td>Level 4: </td><td>3104 - $25 - 3,223 - 103.84%</td></tr>
<tr><td>Luxury : </td><td>1210 - $120 - 1,176 - 97.15%</td></tr>
<tr><td>Total Capacity :</td><td>16514</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>15</td></tr>
<tr><td>Average Attendance - %</td><td>16,557 - 100.26%</td></tr>
<tr><td>Average Income per Game</td><td>$1,009,893</td></tr>
<tr><td>Year to Date Revenue</td><td>$26,257,207</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$83,444,167</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,195,279</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$57,667,886</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,372,750</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$57,001,253</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$15,148,389</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$439,813</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$28,148,032</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,771</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$788,657</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,936,689</td></tr>
<tr><td>Season Salary Cap</td><td>$83,444,167</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$55,833</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$21,744,167</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$39,296,510</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$25,508,210</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Johnny Gaudreau</td>
<td>$9,750,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,250,000</td></tr>
<tr><td>Alex Pietrangelo</td>
<td>$8,800,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,933,333</td></tr>
<tr><td>Jordan Kyrou</td>
<td>$8,125,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,708,333</td></tr>
<tr><td>Jared Spurgeon</td>
<td>$7,575,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,525,000</td></tr>
<tr><td>Clayton Keller</td>
<td>$7,150,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,383,333</td></tr>
<tr><td>Jonas Brodin</td>
<td>$6,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Andrew Mangiapane</td>
<td>$5,800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,933,333</td></tr>
<tr><td>Tristan Jarry</td>
<td>$5,375,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,791,667</td></tr>
<tr><td>Mike Matheson</td>
<td>$4,875,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,625,000</td></tr>
<tr><td>Pavel Zacha</td>
<td>$4,750,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,583,333</td></tr>
<tr><td>Trevor Moore</td>
<td>$4,200,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,400,000</td></tr>
<tr><td>Dillon Dube</td>
<td>$2,300,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Oliver Ekman-Larsson</td>
<td>$2,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$750,000</td></tr>
<tr><td>Ryan Poehling</td>
<td>$1,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$466,667</td></tr>
<tr><td>Christian Fischer</td>
<td>$1,125,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$375,000</td></tr>
<tr><td>Mason McTavish</td>
<td>$894,167 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$298,056</td></tr>
<tr><td>Simon Benoit</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Andrew Agozzino</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Devin Shore</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>James Reimer</td>
<td>$750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$250,000</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $83,444,167</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $75,194,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $68,500,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $61,725,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $81,324,710</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $72,574,710</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $65,880,543</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $59,272,210</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $83,444,167</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $74,694,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $68,000,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $61,725,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Hunter Haight</td>
<td>$89,750 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,837</td></tr>
<tr><td>Nikolas Matinpalo</td>
<td>$88,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,408</td></tr>
<tr><td>Elias Pettersson</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Evan Nause</td>
<td>$86,417 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,692</td></tr>
<tr><td>Pavol Regenda</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Zach Dean</td>
<td>$85,250 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,291</td></tr>
<tr><td>Ryan Hofer</td>
<td>$85,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,262</td></tr>
<tr><td>Jean-Luc Foudy</td>
<td>$84,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,119</td></tr>
<tr><td>Alexander Suzdalev</td>
<td>$84,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Dennis Hildeby</td>
<td>$84,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,976</td></tr>
<tr><td>Judd Caulfield</td>
<td>$83,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,776</td></tr>
<tr><td>Brett Harrison</td>
<td>$83,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Mikey Eyssimont</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Kyle MacLean</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Tyler Pitlick</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Arturs Silovs</td>
<td>$78,611 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,010</td></tr>
<tr><td>Jacob Christiansen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Hugh McGing</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Ryan McGregor</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Ben Gleason</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Victor Mete</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Will Butcher</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Kale Clague</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jaret Anderson-Dolan</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Joseph Woll</td>
<td>$76,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,342</td></tr>
<tr><td>Brandon Biro</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Dillon Heatherington</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>27</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,195,279</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,088,918</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $601,918</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,205,695</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,086,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $601,918</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_ANA"><a id="Ducks">Ducks</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=1">Ducks Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Ducks">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Ducks">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Ducks');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Ducks" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Honda Center</td></tr>
<tr><td>Level 1: </td><td>5841 - $125 - 5,710 - 97.76%</td></tr>
<tr><td>Level 2: </td><td>4833 - $75 - 4,602 - 95.21%</td></tr>
<tr><td>Level 3: </td><td>1833 - $44 - 1,833 - 100.00%</td></tr>
<tr><td>Level 4: </td><td>3833 - $37 - 2,878 - 75.08%</td></tr>
<tr><td>Luxury : </td><td>834 - $250 - 816 - 97.82%</td></tr>
<tr><td>Total Capacity :</td><td>17174</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>15,838 - 92.22%</td></tr>
<tr><td>Average Income per Game</td><td>$1,377,477</td></tr>
<tr><td>Year to Date Revenue</td><td>$37,191,885</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$75,588,333</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,478,446</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$5,450,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$52,381,899</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,822,347</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$51,715,256</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$19,284,681</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$398,898</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$25,529,472</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$13,223</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$885,941</td></tr>
<tr><td>Estimated Season Expenses</td><td>$26,415,413</td></tr>
<tr><td>Season Salary Cap</td><td>$81,038,333</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$2,461,667</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$19,338,333</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$104,211,532</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$97,080,800</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Bo Horvat</td>
<td>$8,500,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,833,333</td></tr>
<tr><td>John Carlson</td>
<td>$8,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,666,667</td></tr>
<tr><td>Kevin Fiala</td>
<td>$7,875,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,625,000</td></tr>
<tr><td>Andrei Svechnikov</td>
<td>$7,750,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,583,333</td></tr>
<tr><td>Mikael Backlund</td>
<td>$5,350,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,783,333</td></tr>
<tr><td>Rasmus Ristolainen</td>
<td>$5,100,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,700,000</td></tr>
<tr><td>Kyle Palmieri</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Ryan Strome</td>
<td>$5,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Pierre Engvall</td>
<td>$3,000,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Alex Newhook</td>
<td>$2,900,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$966,667</td></tr>
<tr><td>Jordan Staal</td>
<td>$2,900,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$966,667</td></tr>
<tr><td>Luke Kunin</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Karel Vejmelka</td>
<td>$2,725,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$908,333</td></tr>
<tr><td>Will Borgen</td>
<td>$2,700,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$900,000</td></tr>
<tr><td>Laurent Brossoit</td>
<td>$1,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$583,333</td></tr>
<tr><td>Jake Sanderson</td>
<td>$925,000 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Emil Bemstrom (1 Way Contract)</td>
<td>$900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$300,000</td></tr>
<tr><td>Kaiden Guhle</td>
<td>$863,333 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$287,778</td></tr>
<tr><td>Calen Addison</td>
<td>$825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Riley Nash</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $75,588,333</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $75,638,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $63,575,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $51,075,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $80,254,167</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $74,029,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $62,436,459</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $49,653,125</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $75,588,333</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $69,363,333</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,300,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $43,950,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Ryan Ellis</td>
<td>$625,000 (4)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$214,744</td></tr>
<tr><td>Nikolai Knyzhov</td>
<td>$125,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$42,949</td></tr>
<tr><td>Curtis Hall</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Alexei Kolosov</td>
<td>$92,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Matthew Savoie</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Andrew Cristall</td>
<td>$90,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,095</td></tr>
<tr><td>Cayden Primeau</td>
<td>$89,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,579</td></tr>
<tr><td>Jaxsen Wiebe</td>
<td>$85,280 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,301</td></tr>
<tr><td>Kirill Kudryavtsev</td>
<td>$85,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Tyrel Bauer</td>
<td>$85,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Samu Tuomaala</td>
<td>$83,083 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,547</td></tr>
<tr><td>Jeremie Poirier</td>
<td>$82,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,289</td></tr>
<tr><td>Jack Finley</td>
<td>$79,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,401</td></tr>
<tr><td>Max Willman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Robert Hagg</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Shane Bowers</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jonathan Gruden</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jayson Megna</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brandon Gignac</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Dmitri Samorukov</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jake Leschyshyn</td>
<td>$76,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,342</td></tr>
<tr><td>Matt Kiersted</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Brad Malone</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,478,446</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,765,946</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,153,196</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $625,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,424,987</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,712,196</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,111,529</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $583,333</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_CGY"><a id="Flames">Flames</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=5">Flames Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Flames">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Flames">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Flames');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Flames" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Scotiabank Saddledome</td></tr>
<tr><td>Level 1: </td><td>7832 - $115 - 5,955 - 76.03%</td></tr>
<tr><td>Level 2: </td><td>4932 - $70 - 4,654 - 94.36%</td></tr>
<tr><td>Level 3: </td><td>1859 - $50 - 1,564 - 84.12%</td></tr>
<tr><td>Level 4: </td><td>3833 - $33 - 3,737 - 97.49%</td></tr>
<tr><td>Luxury : </td><td>833 - $300 - 691 - 82.96%</td></tr>
<tr><td>Total Capacity :</td><td>19289</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>17</td></tr>
<tr><td>Average Attendance - %</td><td>16,600 - 86.06%</td></tr>
<tr><td>Average Income per Game</td><td>$1,348,412</td></tr>
<tr><td>Year to Date Revenue</td><td>$32,361,896</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$74,102,499</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,277,916</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$1,750,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$48,647,113</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,526,719</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$47,980,450</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$22,923,010</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$391,159</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$25,034,176</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,194</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$816,998</td></tr>
<tr><td>Estimated Season Expenses</td><td>$25,851,174</td></tr>
<tr><td>Season Salary Cap</td><td>$75,852,499</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$7,647,501</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$14,152,499</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$121,815,399</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$118,887,235</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Jack Eichel</td>
<td>$10,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,333,333</td></tr>
<tr><td>Seth Jones</td>
<td>$9,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Hampus Lindholm</td>
<td>$6,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Brad Marchand</td>
<td>$6,125,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,041,667</td></tr>
<tr><td>Adam Henrique</td>
<td>$5,825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,941,667</td></tr>
<tr><td>Phillip Danault</td>
<td>$5,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Jared McCann</td>
<td>$5,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Anthony Beauvillier</td>
<td>$4,150,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,383,333</td></tr>
<tr><td>Jeremy Swayman</td>
<td>$3,475,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,158,333</td></tr>
<tr><td>Gustav Nyquist</td>
<td>$3,185,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,061,667</td></tr>
<tr><td>Jason Dickinson</td>
<td>$2,650,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$883,333</td></tr>
<tr><td>Adam Boqvist</td>
<td>$2,600,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$866,667</td></tr>
<tr><td>Pyotr Kochetkov</td>
<td>$2,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Nick Cousins</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Elmer Soderblom</td>
<td>$878,333 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$292,778</td></tr>
<tr><td>Tyson Foerster</td>
<td>$863,333 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$287,778</td></tr>
<tr><td>Juuso Parssinen</td>
<td>$850,833 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$283,611</td></tr>
<tr><td>Chad Ruhwedel</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Sam Gagner</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Matt Irwin</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Calvin de Haan</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Logan Brown</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $74,102,499</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,401,666</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $42,750,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $28,500,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $71,149,991</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $51,865,825</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $40,265,617</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $27,557,283</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $74,102,499</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $54,801,666</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $41,150,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $28,500,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Drew Commesso</td>
<td>$92,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Brendan Brisson</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Cole Sillinger</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Filip Roos</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Nathan Gaucher</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Noah Ostlund</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Josh Filmon</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Kalan Lind</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Ales Stezka</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Ville Heinola</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Ryan Suzuki</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Oskar Olausson</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Samuel Ersson</td>
<td>$85,917 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Samuel Walker</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Elias Salomonsson</td>
<td>$84,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Adam Wilsby</td>
<td>$84,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,947</td></tr>
<tr><td>Pavel Dorofeyev</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Arshdeep Bains</td>
<td>$81,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,060</td></tr>
<tr><td>Luke Prokop</td>
<td>$79,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,258</td></tr>
<tr><td>Luke Henman</td>
<td>$79,167 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,201</td></tr>
<tr><td>Alec Regula</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Zach Sawchenko</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Philippe Maillet</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brogan Rafferty</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Trey Fix-Wolansky</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Joe Hicketts</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Darren Raddysh</td>
<td>$76,250 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>27</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,277,916</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,272,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $863,666</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,278,972</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,245,389</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $836,889</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_PHI"><a id="Flyers">Flyers</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=22">Flyers Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Flyers">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Flyers">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Flyers');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Flyers" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Wells Fargo Center</td></tr>
<tr><td>Level 1: </td><td>6302 - $150 - 4,619 - 73.29%</td></tr>
<tr><td>Level 2: </td><td>5301 - $71 - 4,783 - 90.22%</td></tr>
<tr><td>Level 3: </td><td>2332 - $43 - 2,104 - 90.21%</td></tr>
<tr><td>Level 4: </td><td>4301 - $34 - 3,126 - 72.69%</td></tr>
<tr><td>Luxury : </td><td>1301 - $271 - 847 - 65.11%</td></tr>
<tr><td>Total Capacity :</td><td>19537</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>13</td></tr>
<tr><td>Average Attendance - %</td><td>15,479 - 79.23%</td></tr>
<tr><td>Average Income per Game</td><td>$1,356,851</td></tr>
<tr><td>Year to Date Revenue</td><td>$37,991,823</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$69,419,047</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,947,812</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$3,400,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$49,275,513</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,386,228</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$48,608,873</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$17,639,061</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$366,766</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$23,473,024</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$10,502</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$703,634</td></tr>
<tr><td>Estimated Season Expenses</td><td>$24,176,658</td></tr>
<tr><td>Season Salary Cap</td><td>$72,819,047</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$10,680,953</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$11,119,047</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$224,968,601</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$218,431,004</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Aleksander Barkov</td>
<td>$10,000,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,333,333</td></tr>
<tr><td>Matt Boldy</td>
<td>$7,000,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,333,333</td></tr>
<tr><td>Matt Murray</td>
<td>$6,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Anthony Cirelli</td>
<td>$6,250,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Filip Hronek</td>
<td>$4,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,466,667</td></tr>
<tr><td>Mattias Samuelsson</td>
<td>$4,285,714 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,428,571</td></tr>
<tr><td>Ross Colton</td>
<td>$4,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Alexander Kerfoot</td>
<td>$3,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>Matias Maccelli</td>
<td>$3,425,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,141,667</td></tr>
<tr><td>Stuart Skinner</td>
<td>$2,600,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$866,667</td></tr>
<tr><td>Cody Glass</td>
<td>$2,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Oskar Lindblom</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Dante Fabbro</td>
<td>$2,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Trent Frederic</td>
<td>$2,300,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Erik Brannstrom</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Alex Goligoski</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Philippe Myers</td>
<td>$1,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$466,667</td></tr>
<tr><td>Justin Danforth</td>
<td>$975,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$325,000</td></tr>
<tr><td>Karson Kuhlman</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Taylor Raddysh</td>
<td>$758,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$252,778</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $69,419,047</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $49,460,714</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $37,560,714</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $31,535,714</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $66,351,770</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $44,193,437</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $32,355,937</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $26,793,437</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $69,419,047</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $49,335,714</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $37,560,714</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $31,535,714</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Leo Carlsson</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Paul Ludwinski</td>
<td>$93,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,011</td></tr>
<tr><td>Wyatt Kaiser</td>
<td>$91,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,496</td></tr>
<tr><td>Henry Thrun</td>
<td>$91,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,353</td></tr>
<tr><td>Antti Saarela</td>
<td>$89,625 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,794</td></tr>
<tr><td>Gavin Hayes</td>
<td>$89,617 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,791</td></tr>
<tr><td>Adam Ginning</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Tyler Boucher</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Ridly Greig</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Henri Nikkanen</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Ryan O'Rourke</td>
<td>$85,583 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,406</td></tr>
<tr><td>Olof Lindbom</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Josh Davies</td>
<td>$85,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Urho Vaakanainen</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Tanner Dickinson</td>
<td>$82,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,403</td></tr>
<tr><td>Jordan Spence</td>
<td>$82,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,174</td></tr>
<tr><td>Dmitri Kuzmin</td>
<td>$79,556 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,334</td></tr>
<tr><td>Marcus Kallionkieli</td>
<td>$78,472 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,962</td></tr>
<tr><td>Eetu Makiniemi</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Arvid Holm</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Nick Caamano</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Akil Thomas</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Lucas Johansen</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,947,812</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,050,965</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $529,173</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,947,395</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,050,965</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $529,173</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_VGK"><a id="GoldenKnights">Golden Knights</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=31">Golden Knights Page</a> ]
[ <a href="DCFHL-TeamFinance.php#GoldenKnights">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#GoldenKnights">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_GoldenKnights');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_GoldenKnights" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">T-Mobile Arena</td></tr>
<tr><td>Level 1: </td><td>6000 - $130 - 5,410 - 90.17%</td></tr>
<tr><td>Level 2: </td><td>4000 - $72 - 4,138 - 103.46%</td></tr>
<tr><td>Level 3: </td><td>3000 - $37 - 2,125 - 70.85%</td></tr>
<tr><td>Level 4: </td><td>3000 - $29 - 3,145 - 104.83%</td></tr>
<tr><td>Luxury : </td><td>1500 - $205 - 1,075 - 71.69%</td></tr>
<tr><td>Total Capacity :</td><td>17500</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>15,894 - 90.83%</td></tr>
<tr><td>Average Income per Game</td><td>$1,322,038</td></tr>
<tr><td>Year to Date Revenue</td><td>$35,695,020</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$80,370,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,911,000</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$54,246,656</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,320,064</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$53,580,032</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$18,508,529</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$423,802</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,123,328</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$10,313</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$690,971</td></tr>
<tr><td>Estimated Season Expenses</td><td>$27,814,299</td></tr>
<tr><td>Season Salary Cap</td><td>$80,370,000</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$3,130,000</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$18,670,000</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$122,684,929</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$113,379,159</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Drew Doughty</td>
<td>$11,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,666,667</td></tr>
<tr><td>Zach Werenski</td>
<td>$9,583,333 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,194,444</td></tr>
<tr><td>Evgeny Kuznetsov</td>
<td>$7,800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,600,000</td></tr>
<tr><td>Ryan Pulock</td>
<td>$6,150,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,050,000</td></tr>
<tr><td>Brock Nelson</td>
<td>$6,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Tyler Bertuzzi</td>
<td>$5,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Calvin Petersen</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Victor Olofsson</td>
<td>$4,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,583,333</td></tr>
<tr><td>Sam Bennett</td>
<td>$4,425,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,475,000</td></tr>
<tr><td>Viktor Arvidsson</td>
<td>$4,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,416,667</td></tr>
<tr><td>Jake Allen</td>
<td>$3,850,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,283,333</td></tr>
<tr><td>Mathieu Joseph</td>
<td>$2,950,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$983,333</td></tr>
<tr><td>Sean Walker</td>
<td>$2,650,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$883,333</td></tr>
<tr><td>Eeli Tolvanen</td>
<td>$1,450,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$483,333</td></tr>
<tr><td>Mike Reilly</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Sebastien Aho</td>
<td>$825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Jonathan Drouin</td>
<td>$825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Luke Evangelista</td>
<td>$797,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$265,833</td></tr>
<tr><td>Aliaksei Protas</td>
<td>$789,167 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$263,056</td></tr>
<tr><td>Matthew Highmore</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $80,370,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $60,930,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $33,058,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $30,108,333</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $79,904,127</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,912,460</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $31,400,377</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $28,450,377</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $80,370,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,345,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $30,472,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $27,522,500</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Kevin Bahl</td>
<td>$105,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$36,077</td></tr>
<tr><td>Dalibor Dvorsky</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Corson Ceulemans</td>
<td>$92,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Maveric Lamoureux</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Jordan Dumais</td>
<td>$89,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,637</td></tr>
<tr><td>Felix Robert</td>
<td>$85,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,463</td></tr>
<tr><td>Noel Hoefenmayer</td>
<td>$84,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,033</td></tr>
<tr><td>Dylan Garand</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Justin Robidas</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Jeremie Biakabutuka</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Francesco Arcuri</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Matvey Petrov</td>
<td>$80,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,602</td></tr>
<tr><td>Dillon Hamaliuk</td>
<td>$78,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,115</td></tr>
<tr><td>Nikita Okhotiuk</td>
<td>$78,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,115</td></tr>
<tr><td>John Lethemon</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Nick Abruzzese</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jan Jenik</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jakub Skarek</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>William Lagesson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Lias Andersson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Clark Bishop</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Josh Jacobs</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Alex Belzile</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,911,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,194,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $696,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,911,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,194,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $696,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_CAR"><a id="Hurricanes">Hurricanes</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=6">Hurricanes Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Hurricanes">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Hurricanes">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Hurricanes');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Hurricanes" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">PNC Arena</td></tr>
<tr><td>Level 1: </td><td>6102 - $300 - 4,110 - 67.36%</td></tr>
<tr><td>Level 2: </td><td>5144 - $75 - 4,739 - 92.13%</td></tr>
<tr><td>Level 3: </td><td>2145 - $50 - 1,596 - 74.41%</td></tr>
<tr><td>Level 4: </td><td>4144 - $25 - 4,039 - 97.47%</td></tr>
<tr><td>Luxury : </td><td>1145 - $500 - 767 - 66.96%</td></tr>
<tr><td>Total Capacity :</td><td>18680</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>15,251 - 81.65%</td></tr>
<tr><td>Average Income per Game</td><td>$1,936,734</td></tr>
<tr><td>Year to Date Revenue</td><td>$52,291,823</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$82,629,167</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,413,868</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$643,500</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$55,927,139</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,439,063</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$55,260,438</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$27,114,279</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$435,569</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,876,416</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,892</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$863,764</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,740,180</td></tr>
<tr><td>Season Salary Cap</td><td>$83,272,667</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$227,333</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$21,572,667</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$251,557,375</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$249,931,474</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Tomas Hertl</td>
<td>$8,137,500 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,712,500</td></tr>
<tr><td>Thomas Chabot</td>
<td>$8,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,666,667</td></tr>
<tr><td>Elias Pettersson</td>
<td>$7,350,000 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,450,000</td></tr>
<tr><td>Jacob Markstrom</td>
<td>$6,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Cam Atkinson</td>
<td>$5,875,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,958,333</td></tr>
<tr><td>Esa Lindell</td>
<td>$5,800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,933,333</td></tr>
<tr><td>Jonathan Huberdeau</td>
<td>$5,250,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td>Noah Hanifin</td>
<td>$4,950,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,650,000</td></tr>
<tr><td>Elias Lindholm</td>
<td>$4,850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,616,667</td></tr>
<tr><td>Kevin Labanc</td>
<td>$4,725,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,575,000</td></tr>
<tr><td>Ryan O'Reilly</td>
<td>$4,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Brett Pesce</td>
<td>$4,025,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,341,667</td></tr>
<tr><td>Carson Soucy</td>
<td>$3,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,083,333</td></tr>
<tr><td>Dan Vladar</td>
<td>$2,200,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$733,333</td></tr>
<tr><td>Ryan Hartman</td>
<td>$1,700,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$566,667</td></tr>
<tr><td>Eric Robinson</td>
<td>$1,600,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$533,333</td></tr>
<tr><td>Dmitry Kulikov</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Lukas Reichel</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Owen Power</td>
<td>$916,667 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$305,556</td></tr>
<tr><td>Joe Snively</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Connor Brown</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,629,167</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $72,962,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $59,087,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $49,837,500</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $89,506,959</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $66,541,364</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $56,038,983</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $46,788,983</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,629,167</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,979,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,104,167</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $35,854,167</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Philipp Kurashev</td>
<td>$225,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$77,308</td></tr>
<tr><td>William Wallinder</td>
<td>$92,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Domenick Fensore</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Bobby Trivigno</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Ivan Fedotov</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Roby Jarventie</td>
<td>$89,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Chaz Lucius</td>
<td>$89,417 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Owen Beck</td>
<td>$88,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,408</td></tr>
<tr><td>Nikita Chibrikov</td>
<td>$87,533 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,076</td></tr>
<tr><td>Erik Portillo</td>
<td>$87,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,064</td></tr>
<tr><td>Hendrix Lapierre</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Samuel Poulin</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Ryder Korczak</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Gavin White</td>
<td>$85,750 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,463</td></tr>
<tr><td>Jakub Demek</td>
<td>$85,168 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,263</td></tr>
<tr><td>Aatu Raty</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Tuukka Tieksola</td>
<td>$82,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,289</td></tr>
<tr><td>Samuel Bolduc</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Oskar Steen</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Magnus Hellberg</td>
<td>$78,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,972</td></tr>
<tr><td>Dakota Mermis</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Josh Currie</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Justin Bailey</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Ty Emberson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brett Murray</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Samuel Laberge</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Maxime Lajoie</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>27</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,413,868</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,271,702</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $528,868</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,415,657</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,273,185</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $528,868</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_NYI"><a id="Islanders">Islanders</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=19">Islanders Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Islanders">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Islanders">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Islanders');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Islanders" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">UBS Arena</td></tr>
<tr><td>Level 1: </td><td>6659 - $123 - 5,752 - 86.38%</td></tr>
<tr><td>Level 2: </td><td>4618 - $77 - 4,456 - 96.49%</td></tr>
<tr><td>Level 3: </td><td>1659 - $49 - 1,588 - 95.72%</td></tr>
<tr><td>Level 4: </td><td>3659 - $37 - 2,876 - 78.59%</td></tr>
<tr><td>Luxury : </td><td>660 - $333 - 618 - 93.65%</td></tr>
<tr><td>Total Capacity :</td><td>17255</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>13</td></tr>
<tr><td>Average Attendance - %</td><td>15,290 - 88.61%</td></tr>
<tr><td>Average Income per Game</td><td>$1,368,620</td></tr>
<tr><td>Year to Date Revenue</td><td>$38,321,362</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$83,391,667</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,980,624</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$56,151,752</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,328,548</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$55,485,128</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$17,792,061</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$439,540</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$28,130,560</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$10,670</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$714,890</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,845,450</td></tr>
<tr><td>Season Salary Cap</td><td>$83,391,667</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$108,333</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$21,691,667</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$64,967,606</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$53,914,217</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Mikko Rantanen</td>
<td>$9,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,083,333</td></tr>
<tr><td>Steven Stamkos</td>
<td>$8,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,833,333</td></tr>
<tr><td>Leon Draisaitl</td>
<td>$8,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,833,333</td></tr>
<tr><td>Nick Suzuki</td>
<td>$7,875,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,625,000</td></tr>
<tr><td>Travis Sanheim</td>
<td>$6,250,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Travis Konecny</td>
<td>$5,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Juuse Saros</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Josh Manson</td>
<td>$4,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Carter Verhaeghe</td>
<td>$4,166,667 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,388,889</td></tr>
<tr><td>Robby Fabbri</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Cody Ceci</td>
<td>$3,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,083,333</td></tr>
<tr><td>Max Domi</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Luke Schenn</td>
<td>$2,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Alexis Lafreniere</td>
<td>$2,325,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$775,000</td></tr>
<tr><td>Morgan Frost</td>
<td>$2,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$700,000</td></tr>
<tr><td>Eric Comrie</td>
<td>$1,800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$600,000</td></tr>
<tr><td>Tony DeAngelo</td>
<td>$1,675,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$558,333</td></tr>
<tr><td>Timothy Liljegren</td>
<td>$1,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$466,667</td></tr>
<tr><td>Pierre-Edouard Bellemare</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Ryan Carpenter</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $83,391,667</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $65,466,667</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $21,375,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,125,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $81,204,537</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $63,458,426</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $20,420,926</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $13,170,926</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $83,391,667</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $65,466,667</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $21,375,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,125,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Dysin Mayo</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Will Zmolek</td>
<td>$92,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,610</td></tr>
<tr><td>Filip Johansson</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Zachary L'Heureux</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Simon Holmstrom</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Connor Zary</td>
<td>$86,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Bogdan Trineyev</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Simon Lundmark</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Graeme Clarke</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Joshua Bloom</td>
<td>$83,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Dmitry Ovchinnikov</td>
<td>$83,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,690</td></tr>
<tr><td>Ilya Solovyov</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Alexander Pashin</td>
<td>$82,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,403</td></tr>
<tr><td>Lukas Dostal</td>
<td>$81,250 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,917</td></tr>
<tr><td>Saige Weinstein</td>
<td>$80,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Jacob Peterson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Malcolm Subban</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Garrett Pilon</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Riley Tufte</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Gabriel Fortier</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Sean Day</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Derrick Pouliot</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Kevin Mandolese</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Sheldon Dries</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>24</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,980,624</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $681,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $250,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,974,790</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $676,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $250,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_WPG"><a id="Jets">Jets</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=2">Jets Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Jets">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Jets">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Jets');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Jets" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Canada Life Centre</td></tr>
<tr><td>Level 1: </td><td>4080 - $140 - 4,008 - 98.23%</td></tr>
<tr><td>Level 2: </td><td>3791 - $85 - 3,600 - 94.97%</td></tr>
<tr><td>Level 3: </td><td>2802 - $35 - 2,106 - 75.15%</td></tr>
<tr><td>Level 4: </td><td>3401 - $30 - 3,401 - 100.00%</td></tr>
<tr><td>Luxury : </td><td>1120 - $230 - 1,040 - 92.86%</td></tr>
<tr><td>Total Capacity :</td><td>15194</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>14,155 - 93.16%</td></tr>
<tr><td>Average Income per Game</td><td>$1,205,411</td></tr>
<tr><td>Year to Date Revenue</td><td>$32,546,103</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$76,304,166</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,858,875</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$52,835,617</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,790,343</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$52,168,973</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$16,875,757</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$402,626</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$25,768,064</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$15,174</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$1,016,658</td></tr>
<tr><td>Estimated Season Expenses</td><td>$26,784,722</td></tr>
<tr><td>Season Salary Cap</td><td>$76,304,166</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$7,195,834</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$14,604,166</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$105,429,948</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$95,520,983</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Pierre-Luc Dubois</td>
<td>$8,500,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,833,333</td></tr>
<tr><td>Nate Schmidt</td>
<td>$5,950,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,983,333</td></tr>
<tr><td>Yanni Gourde</td>
<td>$5,166,666 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,722,222</td></tr>
<tr><td>Jean-Gabriel Pageau</td>
<td>$5,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>David Perron</td>
<td>$4,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,583,333</td></tr>
<tr><td>Connor Murphy</td>
<td>$4,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,466,667</td></tr>
<tr><td>Andreas Athanasiou</td>
<td>$4,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,416,667</td></tr>
<tr><td>Alex Iafallo</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Radko Gudas</td>
<td>$4,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Nick Leddy</td>
<td>$4,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Frank Vatrano</td>
<td>$3,650,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,216,667</td></tr>
<tr><td>Brandon Tanev</td>
<td>$3,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>Vitek Vanecek</td>
<td>$3,400,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,133,333</td></tr>
<tr><td>Marco Scandella</td>
<td>$3,275,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,091,667</td></tr>
<tr><td>Justin Schultz</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Patrick Kane</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Zemgus Girgensons</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Anthony Stolarz</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Julien Gauthier</td>
<td>$787,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$262,500</td></tr>
<tr><td>Anthony Richard</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Adam Erne</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Jiri Patera (1 Way Contract)</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-1 Way Contract Salary Cap : </td><td>$775,000</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $76,304,166</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,604,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $25,900,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $8,500,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $65,958,689</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $46,263,689</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $17,418,571</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $400,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $76,304,166</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,604,166</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $25,900,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $8,500,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Bryan Little</td>
<td>$529,167 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$181,816</td></tr>
<tr><td>Jeremy Lauzon</td>
<td>$200,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$68,718</td></tr>
<tr><td>Cole Guttman</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Jaxson Stauber</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Ville Petman</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Nils Aman</td>
<td>$88,375 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Alex Beaucage</td>
<td>$87,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,179</td></tr>
<tr><td>Pierrick Dube</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Christoffer Sedoff</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Logan Morrison</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Tye Kartye</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Peetro Seppala</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Montana Onyebuchi</td>
<td>$82,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Ben McCartney</td>
<td>$81,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,945</td></tr>
<tr><td>Wyatt Bongiovanni</td>
<td>$80,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,573</td></tr>
<tr><td>Griffin Mendel</td>
<td>$79,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,144</td></tr>
<tr><td>Wyatt Newpower</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Valtteri Puustinen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Devin Cooley</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jett Woo</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Vinnie Hinostroza</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Guillaume Brisebois</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Marc McLaughlin</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Kristian Reichel</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Vincent Desharnais</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Sheldon Rempal</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>William Bitten</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Xavier Ouellet</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>28</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,858,875</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $789,417</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $456,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,742,625</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $672,125</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $340,041</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_LA "><a id="Kings">Kings</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=14">Kings Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Kings">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Kings">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Kings');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Kings" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Crypto.com Arena</td></tr>
<tr><td>Level 1: </td><td>5900 - $96 - 5,746 - 97.40%</td></tr>
<tr><td>Level 2: </td><td>5031 - $61 - 4,888 - 97.16%</td></tr>
<tr><td>Level 3: </td><td>2100 - $37 - 2,060 - 98.10%</td></tr>
<tr><td>Level 4: </td><td>4099 - $20 - 4,074 - 99.38%</td></tr>
<tr><td>Luxury : </td><td>1100 - $205 - 1,061 - 96.48%</td></tr>
<tr><td>Total Capacity :</td><td>18230</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>17</td></tr>
<tr><td>Average Attendance - %</td><td>17,830 - 97.80%</td></tr>
<tr><td>Average Income per Game</td><td>$1,163,835</td></tr>
<tr><td>Year to Date Revenue</td><td>$27,932,049</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$71,737,500</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,206,750</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$3,333,333</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$47,686,090</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,496,481</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$47,019,392</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$19,785,201</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$378,841</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$24,245,824</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,829</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$792,543</td></tr>
<tr><td>Estimated Season Expenses</td><td>$25,038,367</td></tr>
<tr><td>Season Salary Cap</td><td>$75,070,833</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$8,429,167</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$13,370,833</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$96,579,788</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$91,326,622</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Logan Couture</td>
<td>$8,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,666,667</td></tr>
<tr><td>Torey Krug</td>
<td>$6,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Andrew Copp</td>
<td>$5,625,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,875,000</td></tr>
<tr><td>Adin Hill</td>
<td>$4,900,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,633,333</td></tr>
<tr><td>Artem Zub</td>
<td>$4,600,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,533,333</td></tr>
<tr><td>Artturi Lehkonen</td>
<td>$4,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Shayne Gostisbehere</td>
<td>$4,125,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,375,000</td></tr>
<tr><td>Nick Jensen</td>
<td>$4,050,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,350,000</td></tr>
<tr><td>Filip Gustavsson</td>
<td>$3,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,250,000</td></tr>
<tr><td>Erik Johnson</td>
<td>$3,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,083,333</td></tr>
<tr><td>Erik Haula</td>
<td>$3,150,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,050,000</td></tr>
<tr><td>Yegor Sharangovich</td>
<td>$3,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,033,333</td></tr>
<tr><td>Marcus Foligno</td>
<td>$3,100,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,033,333</td></tr>
<tr><td>David Kampf</td>
<td>$2,400,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$800,000</td></tr>
<tr><td>Calle Jarnkrok</td>
<td>$2,100,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$700,000</td></tr>
<tr><td>Travis Boyd</td>
<td>$1,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$583,333</td></tr>
<tr><td>Jani Hakanpaa</td>
<td>$1,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Mattias Janmark</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Craig Smith</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>James van Riemsdyk</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Jesse Puljujarvi</td>
<td>$800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Mark Jankowski</td>
<td>$775,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Michael Amadio</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $71,737,500</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,275,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $49,475,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $35,625,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $70,793,195</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,743,195</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $47,943,195</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $34,682,778</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $71,737,500</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $57,350,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $48,550,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $34,725,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Josh Brown</td>
<td>$127,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$43,808</td></tr>
<tr><td>Nicolas Aube-Kubel</td>
<td>$125,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$42,949</td></tr>
<tr><td>Yaroslav Askarov</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Oskari Salminen</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Patrick Brown</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Connor Carrick</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Adam Gaudette</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Trevor Carrick</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Matt Villalta</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Parker Wotherspoon</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Marian Studenic</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Cole Koepke</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Callahan Burke</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jerad Rosburg</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Cole Smith</td>
<td>$77,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Justin Richards</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Radim Zohorna</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Benoit-Olivier Groulx</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Philip Kemp</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Corey Schueneman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Tyler Wotherspoon</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Greg McKegg</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Billy Sweezey</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Jordan Gross</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Austin Czarnik</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Matthew Peca</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Kevin Connauton</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>27</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,206,750</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $430,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $100,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,211,347</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $421,639</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $92,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_SEA"><a id="Kraken">Kraken</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=32">Kraken Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Kraken">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Kraken">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Kraken');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Kraken" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Climate Pledge Arena</td></tr>
<tr><td>Level 1: </td><td>5554 - $125 - 5,431 - 97.78%</td></tr>
<tr><td>Level 2: </td><td>4645 - $75 - 4,530 - 97.53%</td></tr>
<tr><td>Level 3: </td><td>1953 - $44 - 1,957 - 100.21%</td></tr>
<tr><td>Level 4: </td><td>3999 - $37 - 2,918 - 72.97%</td></tr>
<tr><td>Luxury : </td><td>1000 - $250 - 831 - 83.15%</td></tr>
<tr><td>Total Capacity :</td><td>17151</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>17</td></tr>
<tr><td>Average Attendance - %</td><td>15,668 - 91.35%</td></tr>
<tr><td>Average Income per Game</td><td>$1,349,549</td></tr>
<tr><td>Year to Date Revenue</td><td>$32,389,167</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$76,885,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,124,292</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$50,235,697</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,434,179</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$49,569,036</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$22,942,327</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$405,651</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$25,961,664</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,407</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$764,269</td></tr>
<tr><td>Estimated Season Expenses</td><td>$26,725,933</td></tr>
<tr><td>Season Salary Cap</td><td>$76,885,000</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$6,615,000</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$15,185,000</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$155,259,225</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$151,475,619</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Nazem Kadri</td>
<td>$7,000,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,333,333</td></tr>
<tr><td>Mattias Ekholm</td>
<td>$6,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Taylor Hall</td>
<td>$6,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Darcy Kuemper</td>
<td>$5,250,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td>Jakob Silfverberg</td>
<td>$5,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td>Brady Skjei</td>
<td>$5,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td>John Klingberg</td>
<td>$4,150,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,383,333</td></tr>
<tr><td>Matt Grzelcyk</td>
<td>$3,687,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,229,167</td></tr>
<tr><td>Joel Edmundson</td>
<td>$3,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>Chris Driedger</td>
<td>$3,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>Justin Holl</td>
<td>$3,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,133,333</td></tr>
<tr><td>Joel Armia</td>
<td>$3,400,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,133,333</td></tr>
<tr><td>Tanner Pearson</td>
<td>$3,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,083,333</td></tr>
<tr><td>Jordan Greenway</td>
<td>$3,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Noah Cates</td>
<td>$2,625,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$875,000</td></tr>
<tr><td>Kevin Lankinen</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Vladislav Namestnikov</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Tyson Jost</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Jack McBain</td>
<td>$1,600,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$533,333</td></tr>
<tr><td>Rem Pitlick</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Kevin Stenlund</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Matty Beniers</td>
<td>$897,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$299,167</td></tr>
<tr><td>Nick Seeler</td>
<td>$775,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $76,885,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $43,225,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $24,600,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,950,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $71,769,444</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $36,559,444</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $23,715,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,565,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $76,885,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $41,300,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $22,675,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $13,025,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Jack Drury</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Jordan Oesterle</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Nikolai Kovalenko</td>
<td>$89,625 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,794</td></tr>
<tr><td>Luke Toporowski</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Carson Lambos</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Nathan Staios</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Sam Hentges</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Calle Sjalin</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Carl Lindbom</td>
<td>$84,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,862</td></tr>
<tr><td>Cole Krygier</td>
<td>$83,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,776</td></tr>
<tr><td>Topias Vilen</td>
<td>$83,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Milon Kelemen</td>
<td>$81,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,088</td></tr>
<tr><td>Jon-Randall Avon</td>
<td>$80,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Thomas Novak</td>
<td>$80,000 (5)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Anthony Angello</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Mackenzie MacEachern</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Dylan McIlrath</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Christian Wolanin</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Carson Meyer</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Ben Jones</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Matthew Murray</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Mason Morelli</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Kyle Keyser</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Steven Fogarty</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Bobby McMann</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Arnaud Durandeau</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>26</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,124,292</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,417,792</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $684,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $350,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,336,542</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,361,292</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $630,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $296,000</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_TB "><a id="Lightning">Lightning</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=27">Lightning Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Lightning">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Lightning">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Lightning');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Lightning" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Amalie Arena</td></tr>
<tr><td>Level 1: </td><td>6283 - $110 - 5,756 - 91.61%</td></tr>
<tr><td>Level 2: </td><td>5351 - $80 - 3,812 - 71.24%</td></tr>
<tr><td>Level 3: </td><td>2050 - $45 - 2,010 - 98.04%</td></tr>
<tr><td>Level 4: </td><td>4054 - $30 - 3,885 - 95.84%</td></tr>
<tr><td>Luxury : </td><td>1354 - $180 - 1,087 - 80.27%</td></tr>
<tr><td>Total Capacity :</td><td>19092</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>16</td></tr>
<tr><td>Average Attendance - %</td><td>16,550 - 86.68%</td></tr>
<tr><td>Average Income per Game</td><td>$1,273,697</td></tr>
<tr><td>Year to Date Revenue</td><td>$31,842,434</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$81,353,673</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,048,328</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$53,724,583</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,378,675</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$53,057,905</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$20,379,158</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$428,925</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,451,200</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,017</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$738,139</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,189,339</td></tr>
<tr><td>Season Salary Cap</td><td>$81,353,673</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$2,146,327</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$19,653,673</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$149,803,354</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$141,993,173</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Timo Meier</td>
<td>$8,800,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,933,333</td></tr>
<tr><td>Tage Thompson</td>
<td>$7,142,857 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,380,952</td></tr>
<tr><td>Ivan Provorov</td>
<td>$6,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,250,000</td></tr>
<tr><td>Colton Parayko</td>
<td>$6,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Jeff Petry</td>
<td>$6,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Connor Hellebuyck</td>
<td>$6,166,666 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,055,555</td></tr>
<tr><td>Mats Zuccarello</td>
<td>$6,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Anthony Mantha</td>
<td>$5,700,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,900,000</td></tr>
<tr><td>Joel Eriksson Ek</td>
<td>$5,250,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td>Jake Walman</td>
<td>$3,400,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,133,333</td></tr>
<tr><td>Jonathan Marchessault</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Casey Mittelstadt</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Garnet Hathaway</td>
<td>$2,375,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$791,667</td></tr>
<tr><td>Nicolas Hague</td>
<td>$2,294,150 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$764,717</td></tr>
<tr><td>Evgenii Dadonov</td>
<td>$2,250,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$750,000</td></tr>
<tr><td>Noel Acciari</td>
<td>$2,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Nick Foligno</td>
<td>$2,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Juuso Valimaki</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>David Rittich</td>
<td>$875,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$291,667</td></tr>
<tr><td>Dakota Joshua</td>
<td>$825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Oskar Sundqvist</td>
<td>$775,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $81,353,673</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $71,637,007</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $51,717,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $36,192,857</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,585,816</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $68,910,816</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $49,141,666</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $34,654,166</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $81,353,673</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $67,953,673</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $48,034,523</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $33,859,523</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Dmitry Voronkov</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Mikael Pyyhtia</td>
<td>$89,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,837</td></tr>
<tr><td>Tyler Brennan</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Aidan Fulp</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Chase Stillman</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Chase Wheatcroft</td>
<td>$86,250 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,635</td></tr>
<tr><td>Marc Del Gaizo</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Ben Hutton</td>
<td>$85,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Isaiah Saville</td>
<td>$84,967 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,194</td></tr>
<tr><td>Ludwig Persson</td>
<td>$84,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Ilya Nikolaev</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Mikhail Abramov</td>
<td>$80,944 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,812</td></tr>
<tr><td>Jack Matier</td>
<td>$80,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,544</td></tr>
<tr><td>Zach Sanford</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Joey Anderson</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Louie Belpedio</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Colton Poolman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Grigori Denisenko</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Steven Kampfer</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Matthew Phillips</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>John Hayden</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Lane Pederson</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Andrew Poturalski</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Colton White</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Michael Hutchinson</td>
<td>$40,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$13,744</td></tr>
<tr><td>Filip Lindberg</td>
<td>$40,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$13,744</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>26</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,048,328</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,107,334</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $521,917</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,052,911</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,103,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $517,750</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_TOR"><a id="MapleLeafs">Maple Leafs</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=28">Maple Leafs Page</a> ]
[ <a href="DCFHL-TeamFinance.php#MapleLeafs">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#MapleLeafs">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_MapleLeafs');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_MapleLeafs" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Scotiabank Arena</td></tr>
<tr><td>Level 1: </td><td>6159 - $150 - 4,221 - 68.54%</td></tr>
<tr><td>Level 2: </td><td>5159 - $90 - 3,462 - 67.11%</td></tr>
<tr><td>Level 3: </td><td>2159 - $50 - 1,594 - 73.83%</td></tr>
<tr><td>Level 4: </td><td>4159 - $45 - 2,703 - 65.00%</td></tr>
<tr><td>Luxury : </td><td>1164 - $275 - 774 - 66.53%</td></tr>
<tr><td>Total Capacity :</td><td>18800</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>16</td></tr>
<tr><td>Average Attendance - %</td><td>12,755 - 67.85%</td></tr>
<tr><td>Average Income per Game</td><td>$1,291,158</td></tr>
<tr><td>Year to Date Revenue</td><td>$32,278,961</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$78,748,334</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,107,112</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$51,589,271</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,408,155</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$50,922,581</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$20,658,535</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$415,356</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$26,582,784</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,319</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$758,373</td></tr>
<tr><td>Estimated Season Expenses</td><td>$27,341,157</td></tr>
<tr><td>Season Salary Cap</td><td>$78,748,334</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$4,751,666</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$17,048,334</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$123,268,730</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$116,586,108</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Filip Forsberg</td>
<td>$8,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,833,333</td></tr>
<tr><td>Justin Faulk</td>
<td>$6,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Damon Severson</td>
<td>$6,250,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Jake Guentzel</td>
<td>$6,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Andrei Kuzmenko</td>
<td>$5,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Charlie Coyle</td>
<td>$5,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td>Linus Ullmark</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Reilly Smith</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Alex Wennberg</td>
<td>$4,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Jack Roslovic</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Brenden Dillon</td>
<td>$3,900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,300,000</td></tr>
<tr><td>Ian Cole</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Olli Maatta</td>
<td>$3,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Mason Appleton</td>
<td>$2,166,667 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$722,222</td></tr>
<tr><td>Sonny Milano</td>
<td>$1,900,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$633,333</td></tr>
<tr><td>Jarred Tinordi</td>
<td>$1,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$416,667</td></tr>
<tr><td>Jon Merrill</td>
<td>$1,200,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$400,000</td></tr>
<tr><td>Robert Bortuzzo</td>
<td>$950,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$316,667</td></tr>
<tr><td>Wyatt Johnston</td>
<td>$894,167 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$298,056</td></tr>
<tr><td>Ukko-Pekka Luukkonen</td>
<td>$837,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$279,167</td></tr>
<tr><td>Zach Parise</td>
<td>$825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Kiefer Sherwood</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Mikhail Maltsev (1 Way Contract)</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-1 Way Contract Salary Cap : </td><td>$775,000</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Alex Nylander</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>24</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $78,748,334</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $51,160,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $28,400,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $21,250,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $75,456,365</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $49,525,383</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $27,102,049</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $20,532,406</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $78,748,334</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $51,160,834</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $28,400,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $21,250,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Conor Timmins</td>
<td>$110,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$37,795</td></tr>
<tr><td>Andre Heim</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Georgi Merkulov</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Cole McWard</td>
<td>$92,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,696</td></tr>
<tr><td>Thomas Bordeleau</td>
<td>$91,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,496</td></tr>
<tr><td>Georgi Romanov</td>
<td>$91,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,267</td></tr>
<tr><td>Ryker Evans</td>
<td>$89,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,837</td></tr>
<tr><td>Uvis Balinski</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Alexandre Doucet</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Nolan Burke</td>
<td>$86,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,606</td></tr>
<tr><td>Nico Daws</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Martin Chromiak</td>
<td>$82,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,174</td></tr>
<tr><td>William Villeneuve</td>
<td>$81,778 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,098</td></tr>
<tr><td>Keith Petruzzelli</td>
<td>$81,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,088</td></tr>
<tr><td>Nikita Alexandrov</td>
<td>$81,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,060</td></tr>
<tr><td>T.J. Tynan</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Egor Sokolov</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Lucas Carlsson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Mitch Reinke</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Ben Meyers</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jacob Larsson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Scott Sabourin</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Dennis Gilbert</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>A.J. Greer</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Seth Griffith</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>25</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,107,112</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $882,695</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $172,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,094,946</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $875,029</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $172,667</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_EDM"><a id="Oilers">Oilers</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=12">Oilers Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Oilers">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Oilers">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Oilers');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Oilers" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Rogers Place</td></tr>
<tr><td>Level 1: </td><td>6207 - $125 - 5,865 - 94.50%</td></tr>
<tr><td>Level 2: </td><td>4807 - $75 - 4,625 - 96.20%</td></tr>
<tr><td>Level 3: </td><td>2001 - $44 - 1,957 - 97.82%</td></tr>
<tr><td>Level 4: </td><td>4808 - $37 - 3,116 - 64.82%</td></tr>
<tr><td>Luxury : </td><td>818 - $250 - 801 - 97.87%</td></tr>
<tr><td>Total Capacity :</td><td>18641</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>17</td></tr>
<tr><td>Average Attendance - %</td><td>16,364 - 87.79%</td></tr>
<tr><td>Average Income per Game</td><td>$1,407,502</td></tr>
<tr><td>Year to Date Revenue</td><td>$33,780,057</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$82,091,167</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,373,083</td></tr>
<tr><td>Coaches Total Salaries</td><td>$200,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$54,794,112</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,628,204</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$54,727,424</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$23,927,540</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$428,079</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,397,056</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,682</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$849,694</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,246,750</td></tr>
<tr><td>Season Salary Cap</td><td>$82,091,167</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$1,408,833</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$20,391,167</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$128,228,096</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$123,908,886</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Cole Caufield</td>
<td>$7,850,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,616,667</td></tr>
<tr><td>Vince Dunn</td>
<td>$7,350,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,450,000</td></tr>
<tr><td>Anders Lee</td>
<td>$7,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,333,333</td></tr>
<tr><td>Claude Giroux</td>
<td>$6,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>John Gibson</td>
<td>$6,400,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,133,333</td></tr>
<tr><td>Valeri Nichushkin</td>
<td>$6,125,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,041,667</td></tr>
<tr><td>Nikolaj Ehlers</td>
<td>$6,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Josh Anderson</td>
<td>$5,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Christopher Tanev</td>
<td>$4,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>K'Andre Miller</td>
<td>$3,872,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,290,667</td></tr>
<tr><td>David Savard</td>
<td>$3,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>Kirby Dach</td>
<td>$3,362,500 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,120,833</td></tr>
<tr><td>Zach Whitecloud</td>
<td>$2,725,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$908,333</td></tr>
<tr><td>Pavel Francouz</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Nicolas Deslauriers</td>
<td>$1,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$583,333</td></tr>
<tr><td>Blake Lizotte</td>
<td>$1,675,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$558,333</td></tr>
<tr><td>Pius Suter</td>
<td>$1,600,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$533,333</td></tr>
<tr><td>Marc Staal</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Arthur Kaliyev</td>
<td>$894,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$298,056</td></tr>
<tr><td>Dylan Coghlan</td>
<td>$850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$283,333</td></tr>
<tr><td>Ivan Prosvetov (1 Way Contract)</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-1 Way Contract Salary Cap : </td><td>$775,000</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Stefan Noesen</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,091,167</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $69,534,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $48,062,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $35,950,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $74,801,933</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $62,541,100</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $46,144,100</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $34,031,600</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,091,167</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $69,534,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $48,062,500</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $35,950,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Andreas Englund</td>
<td>$135,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$46,385</td></tr>
<tr><td>Mathieu Olivier</td>
<td>$110,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$37,795</td></tr>
<tr><td>Brandon Duhaime</td>
<td>$110,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$37,795</td></tr>
<tr><td>Ryan Johnson</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Jackson LaCombe</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Fedor Svechkov</td>
<td>$92,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Mackie Samoskevich</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Kevin Korchinski</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Michael Benning</td>
<td>$91,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,496</td></tr>
<tr><td>Carter Mazur</td>
<td>$90,583 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,123</td></tr>
<tr><td>Sean Farrell</td>
<td>$89,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,837</td></tr>
<tr><td>Cole Perfetti</td>
<td>$89,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Mattias Norlinder</td>
<td>$85,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Ruslan Iskhakov</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Adam Sykora</td>
<td>$83,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,804</td></tr>
<tr><td>Jan Mysak</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Jacob Bernard-Docker</td>
<td>$80,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,659</td></tr>
<tr><td>Hayden Hodgson</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Gage Quinney</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brett Leason</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Hunter Shepard</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brayden Pachal</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Fredrik Karlstrom</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Nikolas Brouillard</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Oscar Dansk</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Justin Dowling</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Taylor Fedun</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>27</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,373,083</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,443,499</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $358,749</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,361,166</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,431,832</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $358,749</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_FLA"><a id="Panthers">Panthers</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=13">Panthers Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Panthers">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Panthers">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Panthers');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Panthers" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">FLA Live Arena</td></tr>
<tr><td>Level 1: </td><td>6249 - $90 - 5,977 - 95.64%</td></tr>
<tr><td>Level 2: </td><td>5249 - $60 - 4,797 - 91.40%</td></tr>
<tr><td>Level 3: </td><td>2292 - $30 - 2,054 - 89.63%</td></tr>
<tr><td>Level 4: </td><td>4210 - $25 - 3,897 - 92.56%</td></tr>
<tr><td>Luxury : </td><td>1250 - $135 - 1,143 - 91.47%</td></tr>
<tr><td>Total Capacity :</td><td>19250</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>15</td></tr>
<tr><td>Average Attendance - %</td><td>17,869 - 92.83%</td></tr>
<tr><td>Average Income per Game</td><td>$1,137,217</td></tr>
<tr><td>Year to Date Revenue</td><td>$29,567,645</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$82,325,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,149,383</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$55,420,742</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,443,915</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$54,754,066</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$17,058,257</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$433,984</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$27,774,976</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,535</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$772,845</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,547,821</td></tr>
<tr><td>Season Salary Cap</td><td>$82,325,000</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$1,175,000</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$20,625,000</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$168,269,580</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$156,780,016</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Andrei Vasilevskiy</td>
<td>$9,500,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Mark Stone</td>
<td>$9,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Sidney Crosby</td>
<td>$8,700,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,900,000</td></tr>
<tr><td>Kyle Connor</td>
<td>$7,142,857 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,380,952</td></tr>
<tr><td>Josh Morrissey</td>
<td>$6,250,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,083,333</td></tr>
<tr><td>Tyler Myers</td>
<td>$6,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,000,000</td></tr>
<tr><td>Jaccob Slavin</td>
<td>$5,300,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,766,667</td></tr>
<tr><td>Alec Martinez</td>
<td>$5,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,750,000</td></tr>
<tr><td>Mason Marchment</td>
<td>$4,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Dmitry Orlov</td>
<td>$3,875,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,291,667</td></tr>
<tr><td>Jakub Vrana</td>
<td>$3,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>Colton Sissons</td>
<td>$2,857,143 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$952,381</td></tr>
<tr><td>Vladimir Tarasenko</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Joe Pavelski</td>
<td>$1,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$583,333</td></tr>
<tr><td>Kailer Yamamoto</td>
<td>$1,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Braden Schneider</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Derek Ryan</td>
<td>$900,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$300,000</td></tr>
<tr><td>Blake Wheeler</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Alex Stalock</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Austin Watson</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,325,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,525,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $39,750,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $25,250,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $80,644,792</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,844,792</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $38,500,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $24,000,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $82,325,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,525,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $39,750,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $25,250,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Kevin Rooney</td>
<td>$130,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$44,667</td></tr>
<tr><td>Kurtis MacDermid</td>
<td>$98,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$33,929</td></tr>
<tr><td>Jonathan Lekkerimaki</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Eduard Sale</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Matthew Knies</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Jani Nyman</td>
<td>$92,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,725</td></tr>
<tr><td>Liam Ohgren</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Isak Rosen</td>
<td>$89,417 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Philip Tomasino</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Victor Soderstrom</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Jalen Luypen</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Jordan Frasca</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Jesper Vikman</td>
<td>$85,800 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,480</td></tr>
<tr><td>Arber Xhekaj</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Kaedan Korczak</td>
<td>$78,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,115</td></tr>
<tr><td>Troy Grosenick</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Leon Gawanke</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jimmy Schuldt</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brian Pinho</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Drake Caggiula</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Erik Kallgren</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Ashton Sautner</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jesse Ylonen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Nic Petan</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Jacob MacDonald</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>25</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,149,383</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,021,217</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $549,383</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,143,133</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,021,217</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $549,383</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_PIT"><a id="Penguins">Penguins</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=24">Penguins Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Penguins">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Penguins">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Penguins');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Penguins" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">PPG Paints Arena</td></tr>
<tr><td>Level 1: </td><td>5956 - $115 - 5,736 - 96.31%</td></tr>
<tr><td>Level 2: </td><td>4984 - $71 - 4,699 - 94.28%</td></tr>
<tr><td>Level 3: </td><td>1954 - $52 - 1,530 - 78.28%</td></tr>
<tr><td>Level 4: </td><td>3958 - $35 - 3,013 - 76.14%</td></tr>
<tr><td>Luxury : </td><td>1535 - $189 - 1,101 - 71.70%</td></tr>
<tr><td>Total Capacity :</td><td>18387</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>16</td></tr>
<tr><td>Average Attendance - %</td><td>16,079 - 87.45%</td></tr>
<tr><td>Average Income per Game</td><td>$1,317,015</td></tr>
<tr><td>Year to Date Revenue</td><td>$32,925,375</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$73,560,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,011,124</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$44,928,684</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,378,609</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$44,262,060</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$21,072,240</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$388,333</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$24,853,312</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$10,826</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$725,342</td></tr>
<tr><td>Estimated Season Expenses</td><td>$25,578,654</td></tr>
<tr><td>Season Salary Cap</td><td>$73,560,000</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$9,940,000</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$11,860,000</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$133,358,316</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$128,851,902</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Darnell Nurse</td>
<td>$9,250,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,083,333</td></tr>
<tr><td>Brent Burns</td>
<td>$8,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,666,667</td></tr>
<tr><td>T.J. Oshie</td>
<td>$5,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,916,667</td></tr>
<tr><td>Jordan Eberle</td>
<td>$5,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Dylan Strome</td>
<td>$5,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Mikael Granlund</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Jake DeBrusk</td>
<td>$4,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Erik Gudbranson</td>
<td>$4,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Brandon Montour</td>
<td>$3,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,166,667</td></tr>
<tr><td>Frederik Andersen</td>
<td>$3,400,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,133,333</td></tr>
<tr><td>Jan Rutta</td>
<td>$2,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Brock McGinn</td>
<td>$2,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Marcus Johansson</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Conor Sheary</td>
<td>$2,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Max Pacioretty</td>
<td>$2,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Sean Monahan</td>
<td>$1,985,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$661,667</td></tr>
<tr><td>Teddy Blueger</td>
<td>$1,900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$633,333</td></tr>
<tr><td>Colin Miller</td>
<td>$1,850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$616,667</td></tr>
<tr><td>Matt Benning</td>
<td>$1,250,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$416,667</td></tr>
<tr><td>Martin Jones</td>
<td>$875,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$291,667</td></tr>
<tr><td>Ryan Lomberg</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $73,560,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $55,900,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $26,250,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,250,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $70,351,111</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $51,379,444</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $25,844,444</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $13,594,444</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $73,560,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,650,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $27,000,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $14,250,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Cole Schwindt</td>
<td>$85,583 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,406</td></tr>
<tr><td>Michael Vukojevic</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Santeri Hatakka</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Colten Ellis</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Ty Young</td>
<td>$85,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Taro Hirose</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Patrik Koch</td>
<td>$84,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,119</td></tr>
<tr><td>Max Ellis</td>
<td>$83,875 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,819</td></tr>
<tr><td>Mark Kastelic</td>
<td>$83,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,690</td></tr>
<tr><td>Michal Teply</td>
<td>$82,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,174</td></tr>
<tr><td>Cal Foote</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>MacKenzie Entwistle</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Zayde Wisdom</td>
<td>$79,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,401</td></tr>
<tr><td>Navrin Mutter</td>
<td>$77,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,685</td></tr>
<tr><td>Chase Priskie</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Joona Koppanen</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brandon Bussi</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Declan Chisholm</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>John Ludvig</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jasper Weatherby</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Marcus Bjork</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Michael Carcone</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Beck Malenstyn</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Tyce Thompson</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Chase De Leo</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>25</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,011,124</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $558,417</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $85,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,012,319</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $557,140</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $85,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_NSH"><a id="Predators">Predators</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=17">Predators Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Predators">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Predators">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Predators');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Predators" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Bridgestone Arena</td></tr>
<tr><td>Level 1: </td><td>5864 - $120 - 5,763 - 98.28%</td></tr>
<tr><td>Level 2: </td><td>4823 - $75 - 4,607 - 95.51%</td></tr>
<tr><td>Level 3: </td><td>1824 - $48 - 1,674 - 91.79%</td></tr>
<tr><td>Level 4: </td><td>3824 - $36 - 2,902 - 75.89%</td></tr>
<tr><td>Luxury : </td><td>824 - $250 - 809 - 98.12%</td></tr>
<tr><td>Total Capacity :</td><td>17159</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>13</td></tr>
<tr><td>Average Attendance - %</td><td>15,755 - 91.82%</td></tr>
<tr><td>Average Income per Game</td><td>$1,352,258</td></tr>
<tr><td>Year to Date Revenue</td><td>$37,863,230</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$68,837,500</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,252,082</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,600,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$46,344,646</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,474,872</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$45,678,019</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$17,579,357</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$363,737</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$23,279,168</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,062</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$808,154</td></tr>
<tr><td>Estimated Season Expenses</td><td>$24,087,322</td></tr>
<tr><td>Season Salary Cap</td><td>$68,837,500</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$14,662,500</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$7,137,500</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$160,373,737</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$153,865,772</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Jeff Skinner</td>
<td>$9,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>Ryan McDonagh</td>
<td>$6,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,250,000</td></tr>
<tr><td>William Karlsson</td>
<td>$5,900,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,966,667</td></tr>
<tr><td>Tom Wilson</td>
<td>$5,166,667 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,722,222</td></tr>
<tr><td>Tyler Johnson</td>
<td>$5,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Tyson Barrie</td>
<td>$4,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Michael Bunting</td>
<td>$4,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Matt Dumba</td>
<td>$3,900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,300,000</td></tr>
<tr><td>Petr Mrazek</td>
<td>$3,800,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,266,667</td></tr>
<tr><td>Connor Clifton</td>
<td>$3,333,333 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,111,111</td></tr>
<tr><td>Warren Foegele</td>
<td>$2,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Nick Bjugstad</td>
<td>$2,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$700,000</td></tr>
<tr><td>Ethan Bear</td>
<td>$2,062,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$687,500</td></tr>
<tr><td>Jordan Martinook</td>
<td>$1,800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$600,000</td></tr>
<tr><td>Sean Durzi</td>
<td>$1,700,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$566,667</td></tr>
<tr><td>Alex Nedeljkovic</td>
<td>$1,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Colin Blackwell</td>
<td>$1,200,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$400,000</td></tr>
<tr><td>Andreas Johnsson</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Gavin Bayreuther</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Michael Sgarbossa</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Corey Perry</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Jujhar Khaira</td>
<td>$750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$250,000</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $68,837,500</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $45,170,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $40,233,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $21,400,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $70,039,584</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $44,589,584</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $39,660,417</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $21,233,334</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $68,837,500</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $43,387,500</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $38,450,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $20,066,667</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Daniil Tarasov</td>
<td>$105,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$36,077</td></tr>
<tr><td>Ludovic Waeber</td>
<td>$95,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Jachym Kondelik</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Michael Kesselring</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Joshua Lopina</td>
<td>$87,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,179</td></tr>
<tr><td>Logan Mailloux</td>
<td>$87,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,064</td></tr>
<tr><td>Jason Polin</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Brayden Tracey</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Lassi Thomson</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Santtu Kinnunen</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Ethan Samson</td>
<td>$84,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Curtis Douglas</td>
<td>$83,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,776</td></tr>
<tr><td>Maximus Wanner</td>
<td>$82,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Ryan Winterton</td>
<td>$82,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Mason Primeau</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Jakub Lauko</td>
<td>$78,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Olivier Rodrigue</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Marshall Rifai</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Alexander Petrovic</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Luke Philp</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Nolan Stevens</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Bokondji Imama</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Dryden Hunt</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Chris Wagner</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Casey Fitzgerald</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Colin White</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Roland McKeown</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>27</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,252,082</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $764,416</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $337,833</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,247,707</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $761,291</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $337,833</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_NYR"><a id="Rangers">Rangers</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=20">Rangers Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Rangers">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Rangers">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Rangers');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Rangers" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Madison Square Garden</td></tr>
<tr><td>Level 1: </td><td>5961 - $120 - 5,735 - 96.22%</td></tr>
<tr><td>Level 2: </td><td>5002 - $85 - 3,579 - 71.56%</td></tr>
<tr><td>Level 3: </td><td>2003 - $60 - 1,346 - 67.19%</td></tr>
<tr><td>Level 4: </td><td>4000 - $45 - 2,602 - 65.05%</td></tr>
<tr><td>Luxury : </td><td>1040 - $250 - 836 - 80.34%</td></tr>
<tr><td>Total Capacity :</td><td>18006</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>16</td></tr>
<tr><td>Average Attendance - %</td><td>14,098 - 78.30%</td></tr>
<tr><td>Average Income per Game</td><td>$1,329,268</td></tr>
<tr><td>Year to Date Revenue</td><td>$33,231,712</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$74,766,440</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,945,167</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$2,500,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$54,286,120</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,339,726</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$53,619,495</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$21,268,296</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$394,617</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$25,255,488</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$10,488</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$702,696</td></tr>
<tr><td>Estimated Season Expenses</td><td>$25,958,184</td></tr>
<tr><td>Season Salary Cap</td><td>$77,266,440</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$6,233,560</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$15,566,440</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$117,337,549</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$112,647,661</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Artemi Panarin</td>
<td>$11,642,860 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,880,952</td></tr>
<tr><td>Charlie McAvoy</td>
<td>$9,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Sebastian Aho</td>
<td>$8,460,250 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,820,083</td></tr>
<tr><td>Miro Heiskanen</td>
<td>$8,450,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,816,667</td></tr>
<tr><td>Quinn Hughes</td>
<td>$7,850,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,616,667</td></tr>
<tr><td>Rickard Rakell</td>
<td>$5,000,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Filip Chytil</td>
<td>$4,437,500 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,479,167</td></tr>
<tr><td>Jake Oettinger</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Alexandar Georgiev</td>
<td>$3,400,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,133,333</td></tr>
<tr><td>Anthony Duclair</td>
<td>$3,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,000,000</td></tr>
<tr><td>Fabian Zetterlund</td>
<td>$1,450,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$483,333</td></tr>
<tr><td>Kevin Shattenkirk</td>
<td>$1,050,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$350,000</td></tr>
<tr><td>Tomas Nosek</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>William Eklund</td>
<td>$863,333 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$287,778</td></tr>
<tr><td>Tyler Motte</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Noah Gregor</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Jack Johnson</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Chris Tierney</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Nathan Walker</td>
<td>$775,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Calle Rosen</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $74,766,440</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $67,118,690</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $58,268,690</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $44,987,500</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $74,553,420</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $65,620,087</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,013,837</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $43,732,647</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $74,766,440</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $65,828,940</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $56,978,940</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $43,697,750</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Kyle Burroughs</td>
<td>$110,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$37,795</td></tr>
<tr><td>Marco Kasper</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Emil Heineman</td>
<td>$89,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,837</td></tr>
<tr><td>Jacob Perreault</td>
<td>$89,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Alexis Gendron</td>
<td>$86,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,549</td></tr>
<tr><td>Ryan Tverberg</td>
<td>$85,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,262</td></tr>
<tr><td>Oskar Back</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Mitchell Russell</td>
<td>$83,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Nick Cicek</td>
<td>$83,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,690</td></tr>
<tr><td>Danil Zhilkin</td>
<td>$83,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,575</td></tr>
<tr><td>Danil Gushchin</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Nick Blankenburg</td>
<td>$82,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Jonah Gadjovich</td>
<td>$81,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,831</td></tr>
<tr><td>Hunter Jones</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Alexander True</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Martin Pospisil</td>
<td>$77,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Michael Dipietro</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Nathan Clurman</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Dustin Tokarski</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Dan Renouf</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Nick DeSimone</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Cooper Marody</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Chris Wideman</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Tim Berni</td>
<td>$40,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$13,744</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>24</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,945,167</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $889,917</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $633,667</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,920,209</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $883,584</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $627,334</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_DET"><a id="RedWings">Red Wings</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=11">Red Wings Page</a> ]
[ <a href="DCFHL-TeamFinance.php#RedWings">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#RedWings">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_RedWings');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_RedWings" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Little Caesars Arena</td></tr>
<tr><td>Level 1: </td><td>6003 - $200 - 3,940 - 65.63%</td></tr>
<tr><td>Level 2: </td><td>5303 - $120 - 3,457 - 65.19%</td></tr>
<tr><td>Level 3: </td><td>2404 - $70 - 1,564 - 65.05%</td></tr>
<tr><td>Level 4: </td><td>4401 - $20 - 4,155 - 94.42%</td></tr>
<tr><td>Luxury : </td><td>1404 - $300 - 914 - 65.09%</td></tr>
<tr><td>Total Capacity :</td><td>19515</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>13</td></tr>
<tr><td>Average Attendance - %</td><td>14,030 - 71.89%</td></tr>
<tr><td>Average Income per Game</td><td>$1,586,100</td></tr>
<tr><td>Year to Date Revenue</td><td>$44,410,793</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$62,743,334</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,111,777</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$47,516,899</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,486,296</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$46,850,223</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$20,619,297</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$331,997</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$21,247,808</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,342</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$759,914</td></tr>
<tr><td>Estimated Season Expenses</td><td>$22,007,722</td></tr>
<tr><td>Season Salary Cap</td><td>$62,743,334</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$20,756,666</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$1,043,334</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$208,942,655</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$207,554,230</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Erik Karlsson</td>
<td>$11,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,833,333</td></tr>
<tr><td>Cale Makar</td>
<td>$9,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,000,000</td></tr>
<tr><td>Zach Hyman</td>
<td>$5,500,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>Andre Burakovsky</td>
<td>$5,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,833,333</td></tr>
<tr><td>J.T. Compher</td>
<td>$5,100,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,700,000</td></tr>
<tr><td>Jamie Oleksiak</td>
<td>$4,600,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,533,333</td></tr>
<tr><td>Adam Larsson</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Barclay Goodrow</td>
<td>$3,641,667 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,213,889</td></tr>
<tr><td>Nico Sturm</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Yakov Trenin</td>
<td>$1,700,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$566,667</td></tr>
<tr><td>Pheonix Copley</td>
<td>$1,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Charlie Lindgren</td>
<td>$1,100,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Nils Lundkvist</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Matt Nieto</td>
<td>$900,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$300,000</td></tr>
<tr><td>J.J. Moser</td>
<td>$886,667 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$295,556</td></tr>
<tr><td>Tristan Lennox</td>
<td>$867,500 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$289,167</td></tr>
<tr><td>Lukas Svejkovsky</td>
<td>$859,167 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$286,389</td></tr>
<tr><td>Xavier Simoneau</td>
<td>$855,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$285,000</td></tr>
<tr><td>Nathan Smith</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Phillip Di Giuseppe</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Boris Katchouk</td>
<td>$758,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$252,778</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>21</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $62,743,334</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,198,334</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,709,167</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $40,241,667</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $62,397,501</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,190,001</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,709,167</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $40,241,667</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $62,743,334</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $56,198,334</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,709,167</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $40,241,667</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Jacob Bryson</td>
<td>$185,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$63,564</td></tr>
<tr><td>Carl Berglund</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Filip Bystedt</td>
<td>$95,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Niklas Kokko</td>
<td>$92,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,725</td></tr>
<tr><td>Simon Nemec</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>David Jiricek</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Ondrej Pavel</td>
<td>$87,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Caedan Bankier</td>
<td>$86,750 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Brennan Othmann</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Keean Washkurak</td>
<td>$86,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,635</td></tr>
<tr><td>Jack St. Ivany</td>
<td>$85,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,463</td></tr>
<tr><td>Topi Niemela</td>
<td>$85,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,434</td></tr>
<tr><td>Ethan Del Mastro</td>
<td>$85,583 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,406</td></tr>
<tr><td>Adam Edstrom</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Riley Kidney</td>
<td>$83,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Daemon Hunt</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Reece Newkirk</td>
<td>$82,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Colton Dach</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Sasha Pastujov</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Maxence Guenette</td>
<td>$81,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,945</td></tr>
<tr><td>Braden Kressler</td>
<td>$80,056 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,506</td></tr>
<tr><td>Anson Thornton</td>
<td>$79,556 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,334</td></tr>
<tr><td>Reilly Walsh</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Michael Milne</td>
<td>$40,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$13,744</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>24</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,111,777</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,473,111</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,037,944</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,079,749</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,473,111</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $1,037,944</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_BUF"><a id="Sabres">Sabres</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=4">Sabres Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Sabres">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Sabres">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Sabres');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Sabres" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Keybank Center</td></tr>
<tr><td>Level 1: </td><td>6518 - $150 - 4,255 - 65.28%</td></tr>
<tr><td>Level 2: </td><td>5138 - $120 - 3,340 - 65.01%</td></tr>
<tr><td>Level 3: </td><td>2138 - $90 - 1,390 - 65.01%</td></tr>
<tr><td>Level 4: </td><td>4138 - $60 - 2,690 - 65.01%</td></tr>
<tr><td>Luxury : </td><td>1138 - $250 - 837 - 73.51%</td></tr>
<tr><td>Total Capacity :</td><td>19070</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>12,511 - 65.61%</td></tr>
<tr><td>Average Income per Game</td><td>$1,457,933</td></tr>
<tr><td>Year to Date Revenue</td><td>$39,364,202</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$79,323,047</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$1,849,583</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$55,802,164</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,244,483</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$55,135,446</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$20,411,068</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$418,349</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$26,774,336</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$9,998</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$669,866</td></tr>
<tr><td>Estimated Season Expenses</td><td>$27,444,202</td></tr>
<tr><td>Season Salary Cap</td><td>$79,323,047</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$4,176,953</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$17,623,047</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$347,414,773</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$340,381,639</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Matthew Tkachuk</td>
<td>$9,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Alex Ovechkin</td>
<td>$9,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Brady Tkachuk</td>
<td>$8,205,714 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,735,238</td></tr>
<tr><td>Jack Hughes</td>
<td>$8,000,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,666,667</td></tr>
<tr><td>Mark Scheifele</td>
<td>$6,125,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,041,667</td></tr>
<tr><td>Alex Tuch</td>
<td>$4,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,583,333</td></tr>
<tr><td>Mikey Anderson</td>
<td>$4,125,000 (8)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,375,000</td></tr>
<tr><td>Carter Hart</td>
<td>$3,979,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,326,333</td></tr>
<tr><td>Evan Bouchard</td>
<td>$3,900,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,300,000</td></tr>
<tr><td>Ryan Suter</td>
<td>$3,650,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,216,667</td></tr>
<tr><td>Semyon Varlamov</td>
<td>$2,750,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Jason Zucker</td>
<td>$2,650,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$883,333</td></tr>
<tr><td>Oliver Kylington</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Jamie Drysdale</td>
<td>$2,300,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$766,667</td></tr>
<tr><td>Kaapo Kakko</td>
<td>$2,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$700,000</td></tr>
<tr><td>William Carrier</td>
<td>$1,400,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$466,667</td></tr>
<tr><td>Nathan Bastian</td>
<td>$1,350,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$450,000</td></tr>
<tr><td>Ty Dellandrea</td>
<td>$900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$300,000</td></tr>
<tr><td>Moritz Seider</td>
<td>$863,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$287,778</td></tr>
<tr><td>Shane Pinto</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $79,323,047</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $66,530,714</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $57,630,714</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $41,080,714</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $79,654,713</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $64,622,380</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $55,722,380</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $39,650,505</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $79,323,047</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $64,155,714</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $55,255,714</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $38,705,714</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Jesper Wallstedt</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Owen Pickering</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Jayden Struble</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Justin Sourdif</td>
<td>$84,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,119</td></tr>
<tr><td>Mikko Kokkonen</td>
<td>$84,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Adam Klapka</td>
<td>$83,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,604</td></tr>
<tr><td>Tyler Tullio</td>
<td>$82,333 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,289</td></tr>
<tr><td>Tyler Tucker</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Travis Dermott</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Givani Smith</td>
<td>$80,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Wade Allison</td>
<td>$78,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,972</td></tr>
<tr><td>Ethen Frank</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Fredrik Olofsson</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Alex Limoges</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Louis Domingue</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Tim Gettinger</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Rhett Gardner</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Noah Juulsen</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Kyle Criscuolo</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Calvin Pickard</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Cameron Hughes</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Adam Brooks</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Kevin Gravel</td>
<td>$76,250 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>23</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,849,583</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $992,833</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $169,333</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $1,850,416</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $992,416</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $168,916</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_OTT"><a id="Senators">Senators</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=21">Senators Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Senators">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Senators">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Senators');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Senators" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Canadian Tire Centre</td></tr>
<tr><td>Level 1: </td><td>6251 - $115 - 5,788 - 92.59%</td></tr>
<tr><td>Level 2: </td><td>5100 - $70 - 4,819 - 94.49%</td></tr>
<tr><td>Level 3: </td><td>2100 - $41 - 2,040 - 97.15%</td></tr>
<tr><td>Level 4: </td><td>4100 - $33 - 3,803 - 92.77%</td></tr>
<tr><td>Luxury : </td><td>1101 - $230 - 1,040 - 94.48%</td></tr>
<tr><td>Total Capacity :</td><td>18652</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>12</td></tr>
<tr><td>Average Attendance - %</td><td>17,490 - 93.77%</td></tr>
<tr><td>Average Income per Game</td><td>$1,378,761</td></tr>
<tr><td>Year to Date Revenue</td><td>$39,984,083</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$83,376,667</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,405,169</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$0</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$56,158,748</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,412,196</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$55,492,110</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$16,545,138</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$439,462</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$28,125,568</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,847</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$860,749</td></tr>
<tr><td>Estimated Season Expenses</td><td>$28,986,317</td></tr>
<tr><td>Season Salary Cap</td><td>$83,376,667</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$123,333</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$21,676,667</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$237,090,488</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$224,649,309</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Mika Zibanejad</td>
<td>$8,500,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,833,333</td></tr>
<tr><td>Victor Hedman</td>
<td>$7,875,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,625,000</td></tr>
<tr><td>Sean Couturier</td>
<td>$7,750,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,583,333</td></tr>
<tr><td>Gabriel Landeskog</td>
<td>$7,000,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,333,333</td></tr>
<tr><td>Chris Kreider</td>
<td>$6,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Cam Fowler</td>
<td>$6,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Nick Schmaltz</td>
<td>$5,850,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,950,000</td></tr>
<tr><td>Igor Shesterkin</td>
<td>$5,666,667 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,888,889</td></tr>
<tr><td>Shea Theodore</td>
<td>$5,200,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,733,333</td></tr>
<tr><td>Mike Hoffman</td>
<td>$4,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Gabriel Vilardi</td>
<td>$3,437,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,145,833</td></tr>
<tr><td>Anton Forsberg</td>
<td>$2,750,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$916,667</td></tr>
<tr><td>Alexander Romanov</td>
<td>$2,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Sean Kuraly</td>
<td>$2,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Cam York</td>
<td>$1,600,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$533,333</td></tr>
<tr><td>Michael Rasmussen</td>
<td>$1,460,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$486,667</td></tr>
<tr><td>Jesper Fast</td>
<td>$1,200,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$400,000</td></tr>
<tr><td>Anton Lundell</td>
<td>$925,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$308,333</td></tr>
<tr><td>Derek Forbort</td>
<td>$900,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$300,000</td></tr>
<tr><td>Brendan Gaunce</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $83,376,667</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $78,029,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,300,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $32,950,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $78,803,967</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $71,720,634</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $43,328,967</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $31,872,370</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $83,376,667</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $76,289,167</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $43,560,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $31,210,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Dylan Samberg</td>
<td>$140,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$48,103</td></tr>
<tr><td>Max Jones</td>
<td>$129,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$44,495</td></tr>
<tr><td>Brendan Smith</td>
<td>$110,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$37,795</td></tr>
<tr><td>Vladislav Firstov</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Dylan Holloway</td>
<td>$92,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Tyler Kleven</td>
<td>$91,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,496</td></tr>
<tr><td>Matthew Stienburg</td>
<td>$89,875 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,880</td></tr>
<tr><td>Marek Alscher</td>
<td>$89,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,809</td></tr>
<tr><td>Linus Karlsson</td>
<td>$88,375 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,365</td></tr>
<tr><td>Yan Kuznetsov</td>
<td>$87,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Nolan Foote</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Noel Gunler</td>
<td>$86,250 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,635</td></tr>
<tr><td>Lucas Edmonds</td>
<td>$86,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,606</td></tr>
<tr><td>Cross Hanas</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Roni Hirvonen</td>
<td>$85,667 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,434</td></tr>
<tr><td>Vyacheslav Peksa</td>
<td>$85,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,262</td></tr>
<tr><td>Jamieson Rees</td>
<td>$83,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,833</td></tr>
<tr><td>Matyas Sapovaliv</td>
<td>$83,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,575</td></tr>
<tr><td>Donovan Sebrango</td>
<td>$82,833 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,461</td></tr>
<tr><td>Gage Alexander</td>
<td>$81,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,831</td></tr>
<tr><td>Reese Johnson</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Egor Afanasyev</td>
<td>$78,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,115</td></tr>
<tr><td>Jared McIsaac</td>
<td>$78,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Scott Perunovich</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Cam Dineen</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Zane McIntyre</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Linus Weissbach</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Semyon Der-Arguchintsev</td>
<td>$0 (0)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$0</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>28</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,405,169</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,179,877</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $258,001</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,406,613</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,179,877</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $258,001</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_SJ "><a id="Sharks">Sharks</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=26">Sharks Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Sharks">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Sharks">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Sharks');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Sharks" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">SAP Center at San Jose</td></tr>
<tr><td>Level 1: </td><td>5970 - $115 - 5,623 - 94.18%</td></tr>
<tr><td>Level 2: </td><td>4898 - $70 - 4,600 - 93.91%</td></tr>
<tr><td>Level 3: </td><td>1898 - $40 - 1,898 - 100.00%</td></tr>
<tr><td>Level 4: </td><td>3898 - $33 - 3,778 - 96.92%</td></tr>
<tr><td>Luxury : </td><td>898 - $225 - 898 - 100.00%</td></tr>
<tr><td>Total Capacity :</td><td>17562</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>17</td></tr>
<tr><td>Average Attendance - %</td><td>16,796 - 95.64%</td></tr>
<tr><td>Average Income per Game</td><td>$1,302,673</td></tr>
<tr><td>Year to Date Revenue</td><td>$31,264,140</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$68,325,000</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,383,695</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$5,250,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$51,163,038</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,435,174</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$50,496,375</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$22,145,432</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$361,068</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$23,108,352</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$12,737</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$853,379</td></tr>
<tr><td>Estimated Season Expenses</td><td>$23,961,731</td></tr>
<tr><td>Season Salary Cap</td><td>$73,575,000</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$9,925,000</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$11,875,000</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$155,591,362</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$153,775,063</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Jakub Voracek</td>
<td>$8,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,750,000</td></tr>
<tr><td>Ryan Johansen</td>
<td>$8,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,666,667</td></tr>
<tr><td>Troy Terry</td>
<td>$7,000,000 (7)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,333,333</td></tr>
<tr><td>Brock Boeser</td>
<td>$6,650,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,216,667</td></tr>
<tr><td>Bryan Rust</td>
<td>$5,125,000 (5)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,708,333</td></tr>
<tr><td>Samuel Girard</td>
<td>$5,000,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Tyler Toffoli</td>
<td>$4,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,416,667</td></tr>
<tr><td>Brandon Carlo</td>
<td>$4,100,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,366,667</td></tr>
<tr><td>Jake McCabe</td>
<td>$4,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,333,333</td></tr>
<tr><td>Ilya Sorokin</td>
<td>$3,200,000 (9)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,066,667</td></tr>
<tr><td>Nick Paul</td>
<td>$3,150,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,050,000</td></tr>
<tr><td>Dominik Kubalik</td>
<td>$2,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Troy Stecher</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Scott Wedgewood</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Sammy Blais</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Sam Steel</td>
<td>$850,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$283,333</td></tr>
<tr><td>Erik Gustafsson</td>
<td>$825,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$275,000</td></tr>
<tr><td>Yegor Chinakhov</td>
<td>$800,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Caleb Jones</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Tomas Tatar</td>
<td>$750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$250,000</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $68,325,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $49,625,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $30,975,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $30,975,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $66,906,121</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $48,481,121</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $29,831,121</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $29,831,121</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $68,325,000</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $46,225,000</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $27,575,000</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $27,575,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Keegan Kolesar</td>
<td>$140,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$48,103</td></tr>
<tr><td>Hunter McKown</td>
<td>$95,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$32,641</td></tr>
<tr><td>Drew O'Connor</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Alex Lyon</td>
<td>$90,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,923</td></tr>
<tr><td>Mack Guzda</td>
<td>$89,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,837</td></tr>
<tr><td>Ryan McAllister</td>
<td>$89,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,809</td></tr>
<tr><td>Alex Turcotte</td>
<td>$89,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Kyle McDonald</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Peyton Krebs</td>
<td>$86,333 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Brandt Clarke</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Fabian Lysell</td>
<td>$86,333 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,663</td></tr>
<tr><td>Hunter Skinner</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Yaniv Perets</td>
<td>$85,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Jaydon Dureau</td>
<td>$84,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,919</td></tr>
<tr><td>Alex Steeves</td>
<td>$83,417 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,661</td></tr>
<tr><td>Matthew Robertson</td>
<td>$79,750 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,401</td></tr>
<tr><td>Nolan Lalonde</td>
<td>$79,611 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,354</td></tr>
<tr><td>Blake Murray</td>
<td>$79,167 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,201</td></tr>
<tr><td>Vladislav Kolyachonok</td>
<td>$78,917 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,115</td></tr>
<tr><td>Akito Hirose</td>
<td>$78,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,058</td></tr>
<tr><td>Cameron Crotty</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Vinni Lettieri</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Paul Cotter</td>
<td>$77,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Wyatt Kalynuk</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Hudson Fasching</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Gustav Olofsson</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Kyle Capobianco</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Kyle Clifford</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>28</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,383,695</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,404,361</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $506,444</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,388,904</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,401,653</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $506,069</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_DAL"><a id="Stars">Stars</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=10">Stars Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Stars">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Stars">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Stars');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Stars" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">American Airlines Center</td></tr>
<tr><td>Level 1: </td><td>6107 - $300 - 3,814 - 62.45%</td></tr>
<tr><td>Level 2: </td><td>5106 - $75 - 4,689 - 91.83%</td></tr>
<tr><td>Level 3: </td><td>2106 - $55 - 1,467 - 69.65%</td></tr>
<tr><td>Level 4: </td><td>4106 - $45 - 2,669 - 65.00%</td></tr>
<tr><td>Luxury : </td><td>1107 - $390 - 720 - 65.04%</td></tr>
<tr><td>Total Capacity :</td><td>18532</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>13,359 - 72.08%</td></tr>
<tr><td>Average Income per Game</td><td>$1,878,538</td></tr>
<tr><td>Year to Date Revenue</td><td>$50,720,521</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$70,812,857</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,539,195</td></tr>
<tr><td>Coaches Total Salaries</td><td>$1,100,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$1,200,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$47,421,788</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,665,810</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$46,755,120</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$26,299,529</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$374,025</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$23,937,600</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$13,534</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$906,778</td></tr>
<tr><td>Estimated Season Expenses</td><td>$24,844,378</td></tr>
<tr><td>Season Salary Cap</td><td>$72,012,857</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$11,487,143</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$10,312,857</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$145,824,031</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$147,279,182</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Tyler Seguin</td>
<td>$9,850,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,283,333</td></tr>
<tr><td>Jamie Benn</td>
<td>$9,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,166,667</td></tr>
<tr><td>Jacob Trouba</td>
<td>$8,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,666,667</td></tr>
<tr><td>Kevin Hayes</td>
<td>$7,142,857 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,380,952</td></tr>
<tr><td>Philipp Grubauer</td>
<td>$5,900,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,966,667</td></tr>
<tr><td>Robin Lehner</td>
<td>$5,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,666,667</td></tr>
<tr><td>Drake Batherson</td>
<td>$4,975,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,658,333</td></tr>
<tr><td>Ben Chiarot</td>
<td>$4,750,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,583,333</td></tr>
<tr><td>Miles Wood</td>
<td>$2,500,000 (6)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Jake Middleton</td>
<td>$2,450,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$816,667</td></tr>
<tr><td>Cal Clutterbuck</td>
<td>$1,750,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$583,333</td></tr>
<tr><td>Matt Martin</td>
<td>$1,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$500,000</td></tr>
<tr><td>Ryan Reaves</td>
<td>$1,350,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$450,000</td></tr>
<tr><td>Steven Lorentz</td>
<td>$1,050,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$350,000</td></tr>
<tr><td>Milan Lucic</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Quinton Byfield</td>
<td>$894,167 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$298,056</td></tr>
<tr><td>Philip Broberg</td>
<td>$863,333 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$287,778</td></tr>
<tr><td>Ben Harpur</td>
<td>$787,500 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$262,500</td></tr>
<tr><td>Egor Zamula</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Zack MacEwen</td>
<td>$775,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>20</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $70,812,857</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $62,980,357</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,242,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $23,225,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $66,749,524</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $58,342,857</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $44,867,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $23,225,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $70,812,857</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $62,980,357</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $45,242,857</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $23,225,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Mason Lohrei</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>John Beecher</td>
<td>$92,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,782</td></tr>
<tr><td>Conor Geekie</td>
<td>$91,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,553</td></tr>
<tr><td>Dylan Guenther</td>
<td>$89,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,723</td></tr>
<tr><td>Isaac Belliveau</td>
<td>$87,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,064</td></tr>
<tr><td>Bryce Mcconnell-Barker</td>
<td>$87,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,892</td></tr>
<tr><td>Trevor Kuntar</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Taylor Gauthier</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Clay Stevenson</td>
<td>$85,500 (4)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Raivis Ansons</td>
<td>$84,417 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,005</td></tr>
<tr><td>Joe Fleming</td>
<td>$83,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Olivier Nadeau</td>
<td>$83,667 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,747</td></tr>
<tr><td>Marc-Andre Gaudet</td>
<td>$83,000 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,518</td></tr>
<tr><td>Tyson Hinds</td>
<td>$82,944 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,499</td></tr>
<tr><td>Zach Ostapchuk</td>
<td>$82,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,346</td></tr>
<tr><td>Kai Schwindt</td>
<td>$82,167 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,232</td></tr>
<tr><td>Brendan Lemieux</td>
<td>$80,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,487</td></tr>
<tr><td>Wyatt Aamodt</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Brandon Scanlin</td>
<td>$77,500 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Taylor Ward</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Justin Brazeau</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Nick Swaney</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Keaton Middleton</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Grant Hutton</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Mason Geertsen</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Liam O'Brien</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Ken Appleby</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Jeff Malott</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Max McCormick</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td>Jet Greaves</td>
<td>$75,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,056</td></tr>
<tr><td>Alex Barre-Boulet</td>
<td>$75,833 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,056</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>31</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,539,195</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,760,779</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $919,278</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $77,500</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,565,695</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,790,279</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $921,278</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $79,500</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="TeamFinancePro_MIN"><a id="Wild">Wild</a></h1>
<div class="STHSTeamLink">
[ <a href="ProTeam.php?Team=15">Wild Page</a> ]
[ <a href="DCFHL-TeamFinance.php#Wild">Team Finance</a> ]
[ <a href="DCFHL-TeamRecords.php#Wild">Team Records</a> ]
 [ <a href="#STHSRosterTop"><b>Page Top</b></a> ]
[ <a href="javascript:STHS_JS_ToggleTeam('STHS_JS_Team_Wild');"><b>Close / Open Team View</b></a> ]
</div><div id="STHS_JS_Team_Wild" style="display: block;">
<br /><br /><table class="STHSTableFullW"><tr><td style="vertical-align: top;width:440px;">
<table class="STHSFinance_TeamTable">
<tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_AreanaCapacity">Arena Capacity - Ticket Price<br />Attendance - %</h3></td></tr>
<tr><td class="STHSW250">Arena Name</td><td class="STHSW200">Xcel Energy Center</td></tr>
<tr><td>Level 1: </td><td>6010 - $125 - 5,768 - 95.97%</td></tr>
<tr><td>Level 2: </td><td>5012 - $75 - 4,680 - 93.38%</td></tr>
<tr><td>Level 3: </td><td>2014 - $44 - 1,983 - 98.47%</td></tr>
<tr><td>Level 4: </td><td>4014 - $37 - 2,877 - 71.66%</td></tr>
<tr><td>Luxury : </td><td>1014 - $250 - 842 - 82.99%</td></tr>
<tr><td>Total Capacity :</td><td>18064</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Income">Income</h3></td></tr>
<tr><td>Home Games Left</td><td>14</td></tr>
<tr><td>Average Attendance - %</td><td>16,150 - 89.40%</td></tr>
<tr><td>Average Income per Game</td><td>$1,402,290</td></tr>
<tr><td>Year to Date Revenue</td><td>$37,861,823</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Expense">Expense</h3></td></tr>
<tr><td>Pro Players Total Salaries</td><td>$61,418,943</td></tr>
<tr><td>Farm Players Total Salaries</td><td>$2,082,958</td></tr>
<tr><td>Coaches Total Salaries</td><td>$200,000</td></tr>
<tr><td>Luxury Taxe Total</td><td>$0</td></tr>
<tr><td>Special Salary Cap Value</td><td>$6,000,000</td></tr>
<tr><td>Pro Year To Date Expenses</td><td>$43,496,321</td></tr>
<tr><td>Farm Year To Date Expenses</td><td>$1,459,287</td></tr>
<tr><td>Pro Salary Cap To Date</td><td>$43,429,668</td></tr>
<tr><td>Farm Salary Cap To Date</td><td>$0</td></tr>
<tr><td colspan="2" class="STHSCenter"><br /><h3 class="STHSTeamFinance_Estimate">Estimate</h3></td></tr>
<tr><td>Pro Estimated Season Revenue</td><td>$19,632,056</td></tr>
<tr><td>Pro Remaining Season Days</td><td>64</td></tr>
<tr><td>Pro Expenses Per Days</td><td>$320,411</td></tr>
<tr><td>Pro Estimated Expenses</td><td>$20,506,304</td></tr>
<tr><td>Farm Remaining Season Days</td><td>67</td></tr>
<tr><td>Farm Expenses Per Days</td><td>$11,195</td></tr>
<tr><td>Farm Estimated Expenses</td><td>$750,065</td></tr>
<tr><td>Estimated Season Expenses</td><td>$21,256,369</td></tr>
<tr><td>Season Salary Cap</td><td>$67,418,943</td></tr>
<tr><td>Estimate Under Maximum Salary Cap of $83,500,000</td><td>$16,081,057</td></tr>
<tr><td>Estimate Over Minimum Salary Cap of $61,700,000 </td><td>$5,718,943</td></tr>
<tr><td class="STHSCenter"><b>Current Bank Account</b></td><td>$171,195,221</td></tr>
<tr><td class="STHSCenter"><b>Projected Bank Account</b></td><td>$169,570,908</td></tr></table>
</td><td class="STHSFinance_ProSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_ProPlayerSalaries">Pro Players Salaries</h3></td></tr>
<tr><td>Carey Price</td>
<td>$10,500,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$3,500,000</td></tr>
<tr><td>Shea Weber</td>
<td>$7,857,143 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,619,048</td></tr>
<tr><td>Marc-Edouard Vlasic</td>
<td>$7,000,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,333,333</td></tr>
<tr><td>Brendan Gallagher</td>
<td>$6,500,000 (4)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$2,166,667</td></tr>
<tr><td>Nikita Zaitsev</td>
<td>$4,500,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,500,000</td></tr>
<tr><td>Marcus Pettersson</td>
<td>$4,025,175 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$1,341,725</td></tr>
<tr><td>Tucker Poolman</td>
<td>$2,500,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$833,333</td></tr>
<tr><td>Mackenzie Blackwood</td>
<td>$2,350,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$783,333</td></tr>
<tr><td>Radim Simek</td>
<td>$2,250,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$750,000</td></tr>
<tr><td>Morgan Geekie</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Klim Kostin</td>
<td>$2,000,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$666,667</td></tr>
<tr><td>Joey Daccord</td>
<td>$1,200,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$400,000</td></tr>
<tr><td>Filip Zadina</td>
<td>$1,100,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Ross Johnston</td>
<td>$1,100,000 (3)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$366,667</td></tr>
<tr><td>Pat Maroon</td>
<td>$1,000,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$333,333</td></tr>
<tr><td>Raphael Lavoie</td>
<td>$874,125 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$291,375</td></tr>
<tr><td>Pontus Holmberg</td>
<td>$800,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$266,667</td></tr>
<tr><td>Mason Shaw</td>
<td>$775,000 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Dominic Toninato</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Anton Blidh</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Lukas Rousek</td>
<td>$775,000 (2)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$258,333</td></tr>
<tr><td>Brad Hunt</td>
<td>$762,500 (1)</td></tr>
<tr><td align="right">-Salary Remaining : </td>
<td>$254,167</td></tr>
<tr><td><b>Total Pro Players</b></td><td><b>22</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $61,418,943</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $50,157,318</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $32,957,143</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $6,500,000</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $56,114,802</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $48,776,510</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $32,099,843</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $6,107,143</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Cap with 1 Way Contract</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $61,418,943</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $50,157,318</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $32,957,143</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $6,500,000</td></tr>
</table>
</td><td class="STHSFinance_FarmSalaryTable">
<table class="STHSFinance_TeamTable"><tr><td colspan="2" class="STHSCenter"><h3 class="STHSTeamFinance_FarmPlayerSalaries">Farm Players Salaries</h3></td></tr>
<tr><td>Alex Vlasic</td>
<td>$91,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,496</td></tr>
<tr><td>Anton Malmstrom</td>
<td>$91,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$31,267</td></tr>
<tr><td>Ilya Usau</td>
<td>$89,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,837</td></tr>
<tr><td>Aku Raty</td>
<td>$89,625 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$30,794</td></tr>
<tr><td>Magnus Chrona</td>
<td>$86,750 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,806</td></tr>
<tr><td>Bennett MacArthur</td>
<td>$85,917 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,520</td></tr>
<tr><td>Dominic DiVincentiis</td>
<td>$85,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,491</td></tr>
<tr><td>Cameron Butler</td>
<td>$85,833 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,491</td></tr>
<tr><td>Simon Johansson</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Declan Carlile</td>
<td>$85,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,377</td></tr>
<tr><td>Hugo Alnefelt</td>
<td>$85,083 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,234</td></tr>
<tr><td>Filip Cederqvist</td>
<td>$85,000 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Sam Malinski</td>
<td>$85,000 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,205</td></tr>
<tr><td>Karel Plasek</td>
<td>$84,667 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$29,091</td></tr>
<tr><td>Philippe Daoust</td>
<td>$82,167 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$28,232</td></tr>
<tr><td>Zac Jones</td>
<td>$81,250 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,917</td></tr>
<tr><td>Aleksi Heimosalmi</td>
<td>$80,583 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,688</td></tr>
<tr><td>Roman Schmidt</td>
<td>$80,583 (3)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$27,688</td></tr>
<tr><td>Brett Seney</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Samuel Fagemo</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Jake Livingstone</td>
<td>$77,500 (2)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Tyler Madden</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Josh Dunne</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Mitchell Stephens</td>
<td>$77,500 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,628</td></tr>
<tr><td>Glenn Gawdin</td>
<td>$76,250 (1)</td></tr>
<tr><td align="right">Salary Remaining : </td>
<td>$26,199</td></tr>
<tr><td><b>Total Farm Players</b></td><td><b>25</b></td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,082,958</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,101,791</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $332,832</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
<tr><td colspan="2" class="STHSCenter"><b>Salary Average Commitment</b></td></tr>
<tr><td colspan="2"><b>Year 2023 :</b> $2,054,164</td></tr>
<tr><td colspan="2"><b>Year 2024 :</b> $1,068,041</td></tr>
<tr><td colspan="2"><b>Year 2025 :</b> $332,832</td></tr>
<tr><td colspan="2"><b>Year 2026 :</b> $0</td></tr>
</table>
</td></tr></table>
</div>
<h1 class="STHSTeamFinance_SalaryCapCentrale"><a id="SalaryCapCentrale">Salary Cap Centrale</a></h1>
<table class="STHSFinance_TeamTable"><tr>
<td class="STHSCenter"><h3 class="STHSTeamFinance_Team">Team</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_CurrentFund">Current Fund</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_Payroll">Season Salary Cap</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_UnderMaximum">Under Maximum of $83,500,000 <br/> Available Cap Space</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_OverMinimum">Over Minimum of<br />$61,700,000</h3></td>
<td class="STHSCenter"><h3 class="STHSTeamFinance_FarmSalaryCap">Farm Salary Cap</h3></td>
<td class="STHSCenter"><h3class="STHSTeamFinance_UnderFarmMaximum">Under Maximum of <br/>$70,200,000</h3></td>
<td><h3 class="STHSTeamFinance_ProPlayers">Pro Players</h3></td><td><h3 class="STHSTeamFinance_FarmPlayers">Farm Players</h3></td><td><h3 class="STHSTeamFinance_TotalPlayers">Total Players</h3></td></tr>
<tr><td>Avalanche</td>
<td>$292,238,941</td>
<td>$80,125,000</td>
<td>$3,375,000</td>
<td>$18,425,000</td>
<td>$2,348,300</td>
<td>$67,851,700</td>
<td>20</td><td>27</td><td>47</td></tr>
<tr><td>Blackhawks</td>
<td>$115,854,021</td>
<td>$81,056,750</td>
<td>$2,443,250</td>
<td>$19,356,750</td>
<td>$2,463,307</td>
<td>$67,736,693</td>
<td>20</td><td>29</td><td>49</td></tr>
<tr><td>Blue Jackets</td>
<td>$230,756,657</td>
<td>$82,535,834</td>
<td>$964,166</td>
<td>$20,835,834</td>
<td>$2,122,582</td>
<td>$68,077,418</td>
<td>21</td><td>26</td><td>47</td></tr>
<tr><td>Blues</td>
<td>$155,124,296</td>
<td>$82,529,033</td>
<td>$970,967</td>
<td>$20,829,033</td>
<td>$2,403,123</td>
<td>$67,796,877</td>
<td>21</td><td>28</td><td>49</td></tr>
<tr><td>Bruins</td>
<td>$127,860,251</td>
<td>$82,798,833</td>
<td>$701,167</td>
<td>$21,098,833</td>
<td>$2,331,083</td>
<td>$67,868,917</td>
<td>20</td><td>26</td><td>46</td></tr>
<tr><td>Canadiens</td>
<td>$60,305,457</td>
<td>$76,314,166</td>
<td>$7,185,834</td>
<td>$14,614,166</td>
<td>$2,015,124</td>
<td>$68,184,876</td>
<td>20</td><td>24</td><td>44</td></tr>
<tr><td>Canucks</td>
<td>$154,350,529</td>
<td>$62,495,833</td>
<td>$21,004,167</td>
<td>$795,833</td>
<td>$2,050,547</td>
<td>$68,149,453</td>
<td>20</td><td>24</td><td>44</td></tr>
<tr><td>Capitals</td>
<td>$235,820,370</td>
<td>$81,065,000</td>
<td>$2,435,000</td>
<td>$19,365,000</td>
<td>$1,859,835</td>
<td>$68,340,165</td>
<td>21</td><td>23</td><td>44</td></tr>
<tr><td>Coyotes</td>
<td>$105,856,912</td>
<td>$82,225,000</td>
<td>$1,275,000</td>
<td>$20,525,000</td>
<td>$2,100,233</td>
<td>$68,099,767</td>
<td>21</td><td>26</td><td>47</td></tr>
<tr><td>Devils</td>
<td>$39,296,510</td>
<td>$83,444,167</td>
<td>$55,833</td>
<td>$21,744,167</td>
<td>$2,195,279</td>
<td>$68,004,721</td>
<td>20</td><td>27</td><td>47</td></tr>
<tr><td>Ducks</td>
<td>$104,211,532</td>
<td>$81,038,333</td>
<td>$2,461,667</td>
<td>$19,338,333</td>
<td>$2,478,446</td>
<td>$67,721,554</td>
<td>20</td><td>23</td><td>43</td></tr>
<tr><td>Flames</td>
<td>$121,815,399</td>
<td>$75,852,499</td>
<td>$7,647,501</td>
<td>$14,152,499</td>
<td>$2,277,916</td>
<td>$67,922,084</td>
<td>22</td><td>27</td><td>49</td></tr>
<tr><td>Flyers</td>
<td>$224,968,601</td>
<td>$72,819,047</td>
<td>$10,680,953</td>
<td>$11,119,047</td>
<td>$1,947,812</td>
<td>$68,252,188</td>
<td>20</td><td>23</td><td>43</td></tr>
<tr><td>Golden Knights</td>
<td>$122,684,929</td>
<td>$80,370,000</td>
<td>$3,130,000</td>
<td>$18,670,000</td>
<td>$1,911,000</td>
<td>$68,289,000</td>
<td>20</td><td>23</td><td>43</td></tr>
<tr><td>Hurricanes</td>
<td>$251,557,375</td>
<td>$83,272,667</td>
<td>$227,333</td>
<td>$21,572,667</td>
<td>$2,413,868</td>
<td>$67,786,132</td>
<td>21</td><td>27</td><td>48</td></tr>
<tr><td>Islanders</td>
<td>$64,967,606</td>
<td>$83,391,667</td>
<td>$108,333</td>
<td>$21,691,667</td>
<td>$1,980,624</td>
<td>$68,219,376</td>
<td>20</td><td>24</td><td>44</td></tr>
<tr><td>Jets</td>
<td>$105,429,948</td>
<td>$76,304,166</td>
<td>$7,195,834</td>
<td>$14,604,166</td>
<td>$2,858,875</td>
<td>$67,341,125</td>
<td>22</td><td>28</td><td>50</td></tr>
<tr><td>Kings</td>
<td>$96,579,788</td>
<td>$75,070,833</td>
<td>$8,429,167</td>
<td>$13,370,833</td>
<td>$2,206,750</td>
<td>$67,993,250</td>
<td>23</td><td>27</td><td>50</td></tr>
<tr><td>Kraken</td>
<td>$155,259,225</td>
<td>$76,885,000</td>
<td>$6,615,000</td>
<td>$15,185,000</td>
<td>$2,124,292</td>
<td>$68,075,708</td>
<td>23</td><td>26</td><td>49</td></tr>
<tr><td>Lightning</td>
<td>$149,803,354</td>
<td>$81,353,673</td>
<td>$2,146,327</td>
<td>$19,653,673</td>
<td>$2,048,328</td>
<td>$68,151,672</td>
<td>21</td><td>26</td><td>47</td></tr>
<tr><td>Maple Leafs</td>
<td>$123,268,730</td>
<td>$78,748,334</td>
<td>$4,751,666</td>
<td>$17,048,334</td>
<td>$2,107,112</td>
<td>$68,092,888</td>
<td>24</td><td>25</td><td>49</td></tr>
<tr><td>Oilers</td>
<td>$128,228,096</td>
<td>$82,091,167</td>
<td>$1,408,833</td>
<td>$20,391,167</td>
<td>$2,373,083</td>
<td>$67,826,917</td>
<td>22</td><td>27</td><td>49</td></tr>
<tr><td>Panthers</td>
<td>$168,269,580</td>
<td>$82,325,000</td>
<td>$1,175,000</td>
<td>$20,625,000</td>
<td>$2,149,383</td>
<td>$68,050,617</td>
<td>20</td><td>25</td><td>45</td></tr>
<tr><td>Penguins</td>
<td>$133,358,316</td>
<td>$73,560,000</td>
<td>$9,940,000</td>
<td>$11,860,000</td>
<td>$2,011,124</td>
<td>$68,188,876</td>
<td>21</td><td>25</td><td>46</td></tr>
<tr><td>Predators</td>
<td>$160,373,737</td>
<td>$68,837,500</td>
<td>$14,662,500</td>
<td>$7,137,500</td>
<td>$2,252,082</td>
<td>$67,947,918</td>
<td>22</td><td>27</td><td>49</td></tr>
<tr><td>Rangers</td>
<td>$117,337,549</td>
<td>$77,266,440</td>
<td>$6,233,560</td>
<td>$15,566,440</td>
<td>$1,945,167</td>
<td>$68,254,833</td>
<td>20</td><td>24</td><td>44</td></tr>
<tr><td>Red Wings</td>
<td>$208,942,655</td>
<td>$62,743,334</td>
<td>$20,756,666</td>
<td>$1,043,334</td>
<td>$2,111,777</td>
<td>$68,088,223</td>
<td>21</td><td>24</td><td>45</td></tr>
<tr><td>Sabres</td>
<td>$347,414,773</td>
<td>$79,323,047</td>
<td>$4,176,953</td>
<td>$17,623,047</td>
<td>$1,849,583</td>
<td>$68,350,417</td>
<td>20</td><td>23</td><td>43</td></tr>
<tr><td>Senators</td>
<td>$237,090,488</td>
<td>$83,376,667</td>
<td>$123,333</td>
<td>$21,676,667</td>
<td>$2,405,169</td>
<td>$67,794,831</td>
<td>20</td><td>28</td><td>48</td></tr>
<tr><td>Sharks</td>
<td>$155,591,362</td>
<td>$73,575,000</td>
<td>$9,925,000</td>
<td>$11,875,000</td>
<td>$2,383,695</td>
<td>$67,816,305</td>
<td>20</td><td>28</td><td>48</td></tr>
<tr><td>Stars</td>
<td>$145,824,031</td>
<td>$72,012,857</td>
<td>$11,487,143</td>
<td>$10,312,857</td>
<td>$2,539,195</td>
<td>$67,660,805</td>
<td>20</td><td>31</td><td>51</td></tr>
<tr><td>Wild</td>
<td>$171,195,221</td>
<td>$67,418,943</td>
<td>$16,081,057</td>
<td>$5,718,943</td>
<td>$2,082,958</td>
<td>$68,117,042</td>
<td>22</td><td>25</td><td>47</td></tr>
</table>
<?php include "Footer.php";?>
