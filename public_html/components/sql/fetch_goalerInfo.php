<?php    
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

$DatabaseFile = '../../LHSQC-STHS.db';
$db = new SQLite3($DatabaseFile);

if($db) {
    $query = "SELECT * FROM GoalerInfo";
    $result = $db->query($query);

    if (!$result) { echo json_encode(["error" => $db->lastErrorMsg()]);  } 
    else {
        $GoalerInfo = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {            $GoalerInfo[] = $row;        }
        $db->close();
        echo json_encode($GoalerInfo);
    }
}
else {     echo json_encode(["error" => "Error - db not defined when fetching GoalerInfo"]); }
?>