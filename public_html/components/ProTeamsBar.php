<div class="ProTeamsBar">
<?php

try {
    $dbMenu = new SQLite3($DatabaseFile);

    // Si la ville est stockée séparément dans une colonne 'City'
    $Query = "SELECT Number, Name, Abbre, TeamThemeID, City FROM TeamProInfo WHERE TeamThemeID > 0 ORDER BY City";
    
    // Si la ville n'est pas stockée séparément, trier en extrayant la première partie du nom
    // Remplace 'City' par 'SUBSTR(Name, 1, INSTR(Name, ' ') - 1)' si nécessaire

    $TeamProMenu = $dbMenu->query($Query);
    
    if ($TeamProMenu) { 
        while ($Row = $TeamProMenu->fetchArray()) {
            if ($Row['TeamThemeID'] > 0) { 
                echo "<div class=\"TeamLink\">";
                echo "<a href=\"ProTeam.php?Team=" . $Row['Number'] . "\" class=\"TeamLink\" >";
                echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Row['TeamThemeID'] . ".png\" alt=\"" . htmlspecialchars($Row['Name']) . "\" class=\"ProTeamsBarTeamImage\">";
                echo "</a>";
                echo "</div>";
            }
        }
    }

} catch (Exception $e) {
    echo "<br /><br /><h1 class=\"STHSCenter\">" . $DatabaseNotFound . "</h1>";
}

?>
</div>
