<?php
function log2console($data) {
    $json_data = json_encode($data);
    echo "<script>console.log($json_data);</script>";
}

function formatPosition($PosC, $PosLW, $PosRW, $PosD, $PosG) {
    $position = '';
    $position .= $PosC === "True" ? "C" : '';
    $position .= $PosLW === "True" ? ($position ? "/LW" : "LW") : '';
    $position .= $PosRW === "True" ? ($position ? "/RW" : "RW") : '';
    $position .= $PosD === "True" ? ($position ? "/D" : "D") : '';
    $position .= $PosG === "True" ? ($position ? "/G" : "G") : '';
    return $position;
}

?>
