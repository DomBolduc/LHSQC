<?php
require_once "STHSSetting.php";
$gameDb = new SQLite3(str_replace('@-@', '18-1', $GameJSONDatabaseFile));
$row = $gameDb->querySingle("SELECT JSON FROM GameResult WHERE Number = 207", true);
$gameDb->close();
$game = json_decode(gzdecode(base64_decode($row['JSON'])), true);
$team = $game['udtTeamStat'][1];
print_r($team['ShotsPerPeriod']);
print_r(array_sum(array_slice($team['ShotsPerPeriod'], 1, 4)));
echo " totalShots: ".$team['intShotsFor'];
