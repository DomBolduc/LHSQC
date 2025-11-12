<?php    
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

$DatabaseFile = '../../LHSQC-STHS.db';
$db = new SQLite3($DatabaseFile);

if($db) {

    $Query = "Select * from LeagueGeneral";
	$LeagueGeneral = $db->querySingle($Query,true);	

    $query = "SELECT *,'Pro' as Type FROM SchedulePro WHERE Day >= " . ($LeagueGeneral['ScheduleNextDay'] - $LeagueGeneral['DefaultSimulationPerDay']) . " AND PLAY = 'True' ORDER BY GameNumber "; //  TODO  :    set le 365 / 10 JRS back sur la DB, param pour la query et param pour la longueur du gameScroller....
    $result = $db->query($query);

    if (!$result) {
        echo json_encode(["error" => $db->lastErrorMsg()]);
    } else {
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) $data[] = $row;
        $db->close();
        echo json_encode($data);
    }
}
else {  echo json_encode(["error" => "Error - db not defined when fetching LatestScore"]); }
?>
