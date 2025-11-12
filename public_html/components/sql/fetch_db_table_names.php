<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$DatabaseFile = '../../LHSQC-STHS.db';
$db = new SQLite3($DatabaseFile);

if ($db) {
    // Fetch all tables
    $query = "SELECT name FROM sqlite_master WHERE type='table'";
    $result = $db->query($query);

    $tables = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $tables[] = $row['name'];
    }

    header('Content-Type: application/json');
    $db->close();
    echo json_encode($tables);
} else {
    echo "Failed to connect to the database";
}
?>
