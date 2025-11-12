

<div class="card frontpage-card shadow-0 mb-3 nextGamesCard">

    <div class="card-header"><?php echo $IndexLang['NextGames'];?></div>
    <div class="card-body  text-primary">
                        
        <?php
        if (empty($Schedule) == false){while ($row = $Schedule ->fetchArray()) {
            echo "<div class=\"card innerRep  mb-1 \"><div class=\"card-body\">"; 
                echo "<div class=\"row\">";
        
                    echo "<div class=\"col-md-5\">";
                        echo "<a href=\"" . $row['Type']  . "Team.php?Team=" . $row['VisitorTeam'] . "\"><img src=\"" . $ImagesCDNPath . "/images/" . $row['VisitorTeamThemeID'] .".png\" alt=\"\" class=\"cardTeamImage\" />". $row['VisitorTeamName']. "</a><br>";
                        echo "(" . ($row['VW'] + $row['VOTW'] + $row['VSOW']) . "-";
                        if ($LeagueGeneral['PointSystemSO'] == "True"){
                            echo $row['VL'] . "-" . ($row['VOTL'] + $row['VSOL']);
                        }else{
                            echo ($row['VL'] + $row['VOTL'] + $row['VSOL']) . "-" . $row['VT'];
                        }
                        echo ") - " . $row['VStreak'];
                    echo "</div>";
                    
                    echo "<div class=\"col-md-2\">";
                        echo "<h3 class=\"card-title\">VS</h3>";
                    echo "</div>";
                    
                    echo "<div class=\"col-md-5\">";
                        echo "<a href=\"" . $row['Type']  . "Team.php?Team=" . $row['HomeTeam'] . "\"><img src=\"" . $ImagesCDNPath . "/images/" . $row['HomeTeamThemeID'] .".png\" alt=\"\" class=\"cardTeamImage\" />". $row['HomeTeamName']. "</a><br>";
                        echo "(" . ($row['HW'] + $row['HOTW'] + $row['HSOW']) . "-";
                        if ($LeagueGeneral['PointSystemSO'] == "True"){
                            echo $row['HL'] . "-" . ($row['HOTL'] + $row['HSOL']);
                        }else{
                            echo ($row['HL'] + $row['HOTL'] + $row['HSOL']) . "-" . $row['HT'];
                        }
                        echo ") - " . $row['HStreak'];
                    echo "</div>";
                    
                echo "</div>";
                echo "<h4 class=\"card-title pb-0 mb-0\">" . $row['Type'] . " Day " . $row['Day'] .  " - " . $row['GameNumber'] . "</h5>";
            echo "</div></div>";
        
        }}
        ?>      

    </div>   
</div>