<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<script src="STHSMain.js"></script>
<title>LHSQC - Today Games</title>
<script src="LHSQC.js"></script>
<meta name="author" content="Simon Tremblay, sths.simont.info" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Decription" content="David Cassabon - STHS - Version : 3.4.1.2 - LHSQC-STHS.db - LHSQC-STHSCareerStat.db"/>
<link href="STHSMain.css" rel="stylesheet" type="text/css" />
<?php If (file_exists("STHSMain-CSSOverwrite.css") == True){echo "<link href=\"STHSMain-CSSOverwrite.css\" rel=\"stylesheet\" type=\"text/css\" />";}?>
<?php If (file_exists("STHSSetting.php") == true){
require_once "STHSSetting.php";
$db = new SQLite3($DatabaseFile);
include "Menu.php";}?>
<h1 class="STHSTodayGame_ScheduleNotDone">Schedule is not done!</h1>
<h1 class="STHSTomorrowGame_ScheduleNotDone">Schedule is not done!</h1>
<br /><br /><br /><a href="#" class="scrollup">Back to the Top</a><div class="footer">
Output by the <a href="https://sths.simont.info">SimonT Hockey Simulator (STHS)</a> for David Cassabon<span class="FooterW3C"> - Original Page <a href="http://validator.w3.org/check?uri=referer">W3C HTML5 Valid</a></span>
<div style="display:none;visibility:hidden"><a href="https://sths.simont.info">Hockey Simulator</a> - <a href="https://sths.simont.info">Hockey Simulation</a> - <a href="https://sths.simont.info">Hockey Manager</a></div></div>
</body></html>
