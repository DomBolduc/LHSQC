<div class="card shadow-0 mb-3 frontpage-card topHeadlinesCard"  >
    <div class="card-header  "><?php echo $IndexLang['TopHeadlines'];?></div>
    <div class="card-body  text-primary"> 

        <table class="">
        <?php
            $LoopCurrentDate = "";
            $HeadlineFound = (boolean)False;
            
            if (empty($Headlines0) == false){while ($row = $Headlines0 ->fetchArray()) {
                $HeadlineFound = True;
               
                If ($LoopCurrentDate == ""){echo "<tr><th colspan=\"4\" class=\"card-date\">" . $row['DateTxt'] . "</th></tr>\n";$LoopCurrentDate = $row['DateTxt'];}
                echo "<tr><td colspan=\"4\">" . $row['Text'] . "</td></tr>\n"; 
            }} else {
                echo "<tr><th colspan=\"4\" class=\"STHSCenter\">" . $IndexLang['NoHeadlines'] . "</th></tr>\n";
            }
            
            if (empty($Transaction0) == false){while ($row = $Transaction0 ->fetchArray()) {
                $HeadlineFound = True;
                If ($LoopCurrentDate == ""){echo "<tr><th colspan=\"4\" class=\"card-date\">" . $row['DateTxt'] . "</th></tr>\n";$LoopCurrentDate = $row['DateTxt'];}
                echo "<tr><td>";
                If ($row['SendingTeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['SendingTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTradeLogHistoryTeamImageIndex\" />";}else{echo $row['SendingTeamName'];}
                echo "</td><td><img src=\"" . $ImagesCDNPath . "/images/TradeArrow.png\" alt=\"Trade Arrow\" width=\"12\" height=\"12\"></td><td>";
                If ($row['ReceivingTeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['ReceivingTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTradeLogHistoryTeamImageIndex\" />";}else{echo $row['ReceivingTeamName'];}
                echo "</td><td style=\"text-align:left;padding-left:20px;\">" . $row['ReceivingTeamText'] .  "</td></tr>\n";
            }}

            $LoopCurrentDate = "";
            if (empty($Headlines1) == false){while ($row = $Headlines1 ->fetchArray()) { 
                $HeadlineFound = True;
                If ($LoopCurrentDate == ""){echo "<tr><th colspan=\"4\" class=\"card-date\">" . $row['DateTxt'] . "</th></tr>\n";$LoopCurrentDate = $row['DateTxt'];}
                echo "<tr><td colspan=\"4\">" . $row['Text'] . "</td></tr>\n"; 
            }}
            if (empty($Transaction1) == false){while ($row = $Transaction1 ->fetchArray()) {
                $HeadlineFound = True;
                If ($LoopCurrentDate == ""){echo "<tr><th colspan=\"4\" class=\"card-date\">" . $row['DateTxt'] . "</th></tr>\n";$LoopCurrentDate = $row['DateTxt'];}
                echo "<tr><td>";
                If ($row['SendingTeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['SendingTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTradeLogHistoryTeamImageIndex\" />";}else{echo $row['SendingTeamName'];}
                echo "</td><td><img src=\"" . $ImagesCDNPath . "/images/TradeArrow.png\" alt=\"Trade Arrow\" width=\"12\" height=\"12\"></td><td>";
                If ($row['ReceivingTeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['ReceivingTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTradeLogHistoryTeamImageIndex\" />";}else{echo $row['ReceivingTeamName'];}
                echo "</td><td style=\"text-align:left;padding-left:20px;\">" . $row['ReceivingTeamText'] . "</td></tr>\n";
            }}

            $LoopCurrentDate = "";
            if (empty($Headlines2) == false){while ($row = $Headlines2 ->fetchArray()) { 
                $HeadlineFound = True;
                If ($LoopCurrentDate == ""){echo "<tr><th colspan=\"4\" class=\"card-date\">" . $row['DateTxt'] . "</th></tr>\n";$LoopCurrentDate = $row['DateTxt'];}
                echo "<tr><td colspan=\"4\">" . $row['Text'] . "</td></tr>\n"; 
            }}
            if (empty($Transaction2) == false){while ($row = $Transaction2 ->fetchArray()) {
                $HeadlineFound = True;
                If ($LoopCurrentDate == ""){echo "<tr><th colspan=\"4\" class=\"card-date\">" . $row['DateTxt'] . "</th></tr>\n";$LoopCurrentDate = $row['DateTxt'];}
                echo "<tr><td>";
                If ($row['SendingTeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['SendingTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTradeLogHistoryTeamImageIndex\" />";}else{echo $row['SendingTeamName'];}
                echo "</td><td><img src=\"" . $ImagesCDNPath . "/images/TradeArrow.png\" alt=\"Trade Arrow\" width=\"12\" height=\"12\"></td><td>";
                If ($row['ReceivingTeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['ReceivingTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTradeLogHistoryTeamImageIndex\" />";}else{echo $row['ReceivingTeamName'];}
                echo "</td><td style=\"text-align:left;padding-left:20px;\">" . $row['ReceivingTeamText'] . "</td></tr>\n";
            }}
            If ($HeadlineFound  == False){echo "<tr><th colspan=\"4\" class=\"STHSCenter\">" . $IndexLang['NoHeadlines'] . "</th></tr>\n";}
        ?>
        </table>
    </div>
</div>