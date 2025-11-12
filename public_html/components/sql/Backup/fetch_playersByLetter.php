<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

$DatabaseFile = '../../LHSQC-STHS.db';

$db = new SQLite3($DatabaseFile);


// Load entire dataset into memory
$PlayerInfo = [];
$result = $db->query("SELECT * FROM PlayerInfo");
while ($row = $result->fetchArray()) {
    $PlayerInfo[] = $row;
}

// Get the selected letter
$selectedLetter = isset($_GET['letter']) ? $_GET['letter'] : 'A';

// Filter the dataset for rows starting with the selected letter
$FilteredPlayerInfo = array_filter($PlayerInfo, function ($row) use ($selectedLetter) {
    return stripos($row['Name'], $selectedLetter) === 0;
});

$db->close();

// Format filtered data as JSON
echo json_encode(array_values($FilteredPlayerInfo)); // Reset array keys
?>
