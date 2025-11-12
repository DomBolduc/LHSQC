

<div class="card frontpage-card lastGamesCard shadow-0 mb-3">

    <div class="card-header"><?php echo $IndexLang['LatestScores'];?></div>
    <div class="card-body text-primary">
                        
    <table class="STHSIndex_Main"><tr><td class="STHSIndex_Score">
       
    <?php
    if (empty($LatestScore) == false){while ($row = $LatestScore ->fetchArray()) {
        echo "<div class=\"card STHSIndex_GamesResult\">";
            echo "<div class=\"card-header \">" . " Day " . $row['Day'] . " GAME #" . $row['GameNumber']. "</div>";
            echo "<div class=\"card-body pb-0\">";
           
                echo "<div class=\"row Visitor\">";
                    If ($row['VisitorTeamThemeID'] > 0){ 
                        echo "<div class=\"col-md-3\"><img src=\"" . $ImagesCDNPath . "/images/" . $row['VisitorTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPIndexTeamImage\" /></div>";} 
                        echo "<div class=\"col-md-6\">" . $row['VisitorTeamName'] . "</div>";
                        echo "<div class=\"col-md-3\">" . $row['VisitorScore']    . "</div>";
                echo "</div>";


                echo " <div class=\"row Home\">";
                    If ($row['HomeTeamThemeID'] > 0){
                        echo "<div class=\"col-md-3\"><img src=\"" . $ImagesCDNPath . "/images/" . $row['HomeTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPIndexTeamImage\" /></div>";}
                        echo "<div class=\"col-md-6\">" . $row['HomeTeamName'] . "</div>";
                        echo "<div class=\"col-md-3\">" . $row['HomeScore']    . "</div>";
                echo "</div>";

                echo "<br><div  class=\"STHSPHPIndexBoxScore\"><a href=\"" . $row['Link'] ."\">" . $IndexLang['BoxScore'] .  "</a></div>";

            echo"</div>";
        echo "</div>";

      
    }} 
    ?>

    </table>

    </div>   
</div>
