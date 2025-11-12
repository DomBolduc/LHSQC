
<div class="card frontpage-card topFreeAgentsCard shadow-0 mb-3" >
    <div class="card-header"><?php echo $IndexLang['Top20FreeAgents'];?></div>
    <div class="card-body  text-primary"> 
    <table class=""> 
      
        <tr><td class="STHSIndex_Top5PointNameHeader"><?php echo $PlayersLang['PlayerName'];?></td><td class="STHSIndex_Top5PointResultHeader">Overall-Age</td></tr>
        <?php
        $Query = "SELECT MainTable.*, GoalerInfo.PosG FROM ((SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.Age, PlayerInfo.Contract, PlayerInfo.SalaryAverage, PlayerInfo.Salary1, PlayerInfo.Overall FROM PlayerInfo WHERE Team >= 0 AND Number > 0 UNION ALL SELECT GoalerInfo.Number, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.Age, GoalerInfo.Contract, GoalerInfo.SalaryAverage, GoalerInfo.Salary1, GoalerInfo.Overall FROM GoalerInfo WHERE Team >= 0 AND Number > 0) AS MainTable) LEFT JOIN GoalerInfo ON MainTable.Name = GoalerInfo.Name WHERE (MainTable.Team >= 0 AND MainTable.Contract = 0) OR (MainTable.Team = 0) ORDER BY MainTable.Overall DESC LIMIT 20";
        If ($IndexQueryOK== True){$PlayerStat = $db->query($Query);}
        if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
            echo "<tr><td>";
            if ($Row['PosG']== "True"){echo "<a href=\"GoalieReport.php?Goalie=";}else{echo "<a href=\"PlayerReport.php?Player=";}
            Echo $Row['Number'] . "\">" . $Row['Name'] . "</a></td>";
            echo "<td>" . $Row['Overall'] . " - " . $Row['Age'] . "</td></tr>\n";
        }}?>

    </table>
    </div>
</div>

