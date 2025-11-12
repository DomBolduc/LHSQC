<?php include "Header.php";

/*

Syntax to call this webpage should be GoaliesStat.php?Goalie=2 where only the number change and it's based on the UniqueID of Goalies.

*/

If ($lang == "fr"){include 'LanguageFR-Stat.php';}else{include 'LanguageEN-Stat.php';}

$Goalie = (integer)0;

$Query = (string)"";

$GoalieName = $PlayersLang['IncorrectGoalie'];

$LeagueName = (string)"";
$CareerLeaderSubPrintOut = (int)0;
$GoalieCareerStatFound = (boolean)false;
$GoalieProCareerSeason = Null;
$GoalieProCareerPlayoff = Null;
$GoalieProCareerSumSeasonOnly = Null;
$GoalieProCareerSumPlayoffOnly = Null;
$GoalieFarmCareerSeason = Null;
$GoalieFarmCareerPlayoff = Null;
$GoalieFarmCareerSumSeasonOnly = Null;
$GoalieFarmCareerSumPlayoffOnly = Null;
$GoalieProStatMultipleTeamFound = (boolean)FALSE;
$GoalieFarmStatMultipleTeamFound = (boolean)FALSE;
$GoalieProCareerStat = Null;
$GoalieProCareerPlayoffTotals = Null;


if(isset($_GET['Goalie'])){$Goalie = filter_var($_GET['Goalie'], FILTER_SANITIZE_NUMBER_INT);} 

try{

If (file_exists($DatabaseFile) == false){

	$Goalie = 0;

	$GoalieName = $DatabaseNotFound;
	$LeagueOutputOption = Null;
	$LeagueGeneral = Null;		

}else{

	$db = new SQLite3($DatabaseFile);
	$Query = "Select Name, OutputName, LeagueYearOutput, PreSeasonSchedule, PlayOffStarted from LeagueGeneral";
	$LeagueGeneral = $db->querySingle($Query,true);	
	$Query = "Select PlayersMugShotBaseURL, PlayersMugShotFileExtension,OutputSalariesRemaining,OutputSalariesAverageTotal,OutputSalariesAverageRemaining from LeagueOutputOption";
	$LeagueOutputOption = $db->querySingle($Query,true);		

}

If ($Goalie == 0){

	$GoalieInfo = Null;

	$GoalieProStat = Null;

	$GoalieFarmStat = Null;	

	echo "<style>.STHSPHPPlayerStat_Main {display:none;}</style>";

}else{

	$Query = "SELECT count(*) AS count FROM GoalerInfo WHERE Number = " . $Goalie;

	$Result = $db->querySingle($Query,true);

	If ($Result['count'] == 1){

		If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS Start Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}

		$Query = "SELECT GoalerInfo.*, TeamProInfo.Name AS ProTeamName FROM GoalerInfo LEFT JOIN TeamProInfo ON GoalerInfo.Team = TeamProInfo.Number WHERE GoalerInfo.Number = " . $Goalie;

		$GoalieInfo = $db->querySingle($Query,true);

		$Query = "SELECT GoalerProStat.*, ROUND((CAST(GoalerProStat.GA AS REAL) / (GoalerProStat.SecondPlay / 60))*60,3) AS GAA, ROUND((CAST(GoalerProStat.SA - GoalerProStat.GA AS REAL) / (GoalerProStat.SA)),3) AS PCT, ROUND((CAST(GoalerProStat.PenalityShotsShots - GoalerProStat.PenalityShotsGoals AS REAL) / (GoalerProStat.PenalityShotsShots)),3) AS PenalityShotsPCT  FROM GoalerProStat WHERE Number = " . $Goalie;

		$GoalieProStat = $db->querySingle($Query,true);

		$Query = "SELECT GoalerFarmStat.*, ROUND((CAST(GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SecondPlay / 60))*60,3) AS GAA, ROUND((CAST(GoalerFarmStat.SA - GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SA)),3) AS PCT, ROUND((CAST(GoalerFarmStat.PenalityShotsShots - GoalerFarmStat.PenalityShotsGoals AS REAL) / (GoalerFarmStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerFarmStat WHERE Number = " . $Goalie;

		$GoalieFarmStat = $db->querySingle($Query,true);
		
		$Query = "SELECT count(*) AS count FROM GoalerProStatMultipleTeam WHERE Number = " . $Goalie;
		$Result = $db->querySingle($Query,true);
		If ($Result['count'] > 0){$GoalieProStatMultipleTeamFound = TRUE;}
		
		$Query = "SELECT count(*) AS count FROM GoalerFarmStatMultipleTeam WHERE Number = " . $Goalie;
		$Result = $db->querySingle($Query,true);
		If ($Result['count'] > 0){$GoalieFarmStatMultipleTeamFound = TRUE;}
		
		If ($GoalieInfo['Team'] > 0){
			$Query = "SELECT MainTable.* FROM (SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.TeamName, PlayerInfo.URLLink, PlayerInfo.NHLID, 'False' AS PosG FROM PlayerInfo WHERE Team = " . $GoalieInfo['Team'] . " UNION ALL SELECT GoalerInfo.Number, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.TeamName, GoalerInfo.URLLink, GoalerInfo.NHLID, 'True' AS PosG FROM GoalerInfo WHERE Team = " . $GoalieInfo['Team'] . ") AS MainTable ORDER BY Name";
			$TeamPlayers = $db->query($Query);		
		}
		

		$LeagueName = $LeagueGeneral['Name'];		

		$GoalieName = $GoalieInfo['Name'];

		If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS Normal Query PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}

		If (file_exists($CareerStatDatabaseFile) == true){ /* CareerStat */
			$CareerStatdb = new SQLite3($CareerStatDatabaseFile);
			
			// Vérifier si la table GoalerProStatCareer existe
			$CareerTableCheck = $CareerStatdb->querySingle("SELECT Count(name) AS CountName FROM sqlite_master WHERE type='table' AND name='GoalerProStatCareer'",true);
			If ($CareerTableCheck['CountName'] == 1){
				
				// Récupérer les statistiques de carrière totales depuis GoalerProStatCareer
				$Query = "SELECT * FROM GoalerProStatCareer WHERE UniqueID = " . $GoalieInfo['UniqueID'];
				$GoalieProCareerStat = $CareerStatdb->querySingle($Query, true);
				
				// Récupérer les statistiques par saison (saison régulière)
				$Query = "SELECT * FROM GoalerProStatHistory WHERE UniqueID = " . $GoalieInfo['UniqueID'] . " AND Playoff = 'False' ORDER BY Season DESC";
				$GoalieProCareerSeason = $CareerStatdb->query($Query);
				
				// Récupérer les statistiques de playoffs par saison
				$Query = "SELECT * FROM GoalerProStatHistory WHERE UniqueID = " . $GoalieInfo['UniqueID'] . " AND Playoff = 'True' ORDER BY Season DESC";
				$GoalieProCareerPlayoff = $CareerStatdb->query($Query);
				
				// Récupérer les totaux de playoffs depuis GoalerProStatHistory
				$Query = "SELECT SUM(GP) as GP, SUM(W) as W, SUM(L) as L, SUM(OTL) as OTL, SUM(Shootout) as Shootout, 
                         SUM(GA) as GA, SUM(SA) as SA, MIN(Year) as FirstYear, MAX(Year) as LastYear 
                         FROM GoalerProStatHistory 
                         WHERE UniqueID = " . $GoalieInfo['UniqueID'] . " AND Playoff = 'True'";
				$GoalieProCareerPlayoffTotals = $CareerStatdb->querySingle($Query, true);
				
				$GoalieCareerStatFound = true;	
			}
			If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS CareerStat Query PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
		}
		

	}else{

		$GoalieName = $PlayersLang['Goalienotfound'];

		$GoalieInfo = Null;

		$GoalieProStat = Null;

		$GoalieFarmStat = Null;	

		echo "<style>.STHSPHPPlayerStat_Main {display:none;}</style>";

	}

}} catch (Exception $e) {

	$Goalie = 0;

	$GoalieName = $DatabaseNotFound;

	$LeagueOutputOption = Null;

	$LeagueGeneral = Null;

	$GoalieInfo = Null;

	$GoalieProStat = Null;

	$GoalieFarmStat = Null;		

}

echo "<title>" . $LeagueName . " - " . $GoalieName . "</title>";
echo "<style>";
if ($GoalieCareerStatFound == true){
	echo "#tablesorter_colSelect2:checked + label {background: #5797d7;  border-color: #555;}";
	echo "#tablesorter_colSelect2:checked ~ #tablesorter_ColumnSelector2 {display: block;}";
	echo "#tablesorter_colSelect3:checked + label {background: #5797d7;  border-color: #555;}";
	echo "#tablesorter_colSelect3:checked ~ #tablesorter_ColumnSelector3 {display: block;}";	
}
if ($GoalieProStatMultipleTeamFound == true){
	echo "#tablesorter_colSelect4:checked + label {background: #5797d7;  border-color: #555;}";
	echo "#tablesorter_colSelect4:checked ~ #tablesorter_ColumnSelector4 {display: block;}";
}
if ($GoalieFarmStatMultipleTeamFound == true){
	echo "#tablesorter_colSelect5:checked + label {background: #5797d7;  border-color: #555;}";
	echo "#tablesorter_colSelect5:checked ~ #tablesorter_ColumnSelector5 {display: block;}";
}
echo "</style>";
?>

</head><body>

<?php include "Menu.php";?>

<br />



<div class="container">
<div class="container playerReportActionShots">

<?php if ($GoalieInfo['NHLID']): ?>
    <img src="https://assets.nhle.com/mugs/actionshots/1296x729/<?php echo $GoalieInfo['NHLID']; ?>.jpg" 
         alt="<?php echo $GoalieName; ?>" 
         class="actionShots"
         >

    <p>No action shots available.</p>
<?php endif; ?>

</div>

    <div class=" position-relative playerInfoOverlay">
    <!-- Player Name Dropdown -->
    <div class="container  playerReportMainContainer p-0 ">
    <!-- Player Name Dropdown -->
    <div class="row m-0">
        <div class="col-12 text-center">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle fw-bold" type="button" id="playerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $GoalieName; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="playerDropdown">
                    <?php if (!empty($TeamPlayers)): ?>
                        <?php while ($row = $TeamPlayers->fetchArray()): ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo ($row['PosG'] === 'True') ? 'GoalieReport.php?Goalie=' . $row['Number'] : 'PlayerReport.php?Player=' . $row['Number']; ?>">
                                    <?php echo $row['Name']; ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li><span class="dropdown-item text-muted">No teammates found</span></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Player Profile Section -->
    <section class="row text-center justify-content-center player-profile m-0 p-0">
        <!-- Player Mugshot -->
        <div class="col-4 playerReportMugshot p-0 m-0 ">
            <?php if ($GoalieInfo['NHLID']): ?>
                <img src="<?php echo $LeagueOutputOption['PlayersMugShotBaseURL'] . $GoalieInfo['NHLID'] . '.' . $LeagueOutputOption['PlayersMugShotFileExtension']; ?>" 
                     alt="<?php echo $GoalieName; ?>" 
                     class="playerReportHeadshot">
            <?php else: ?>
                <p>No mugshot available.</p>
            <?php endif; ?>
        </div>

        <!-- Player Info -->
        <div class="col-5 player-info p-0 text-start">
    <div class="row">
        <div class="col-6">
        <p><strong>Position:</strong> <?php echo $GoaliePosition; ?>G</p>
        <p><strong>Age:</strong> <?php echo $GoalieInfo['Age'] ?? 'Unknown'; ?></p>
            <p><strong>Weight:</strong> <?php echo $GoalieInfo['Weight'] ?? 'Unknown'; ?> lbs</p>
            <p><strong>Height:</strong> <?php echo $GoalieInfo['Height'] ?? 'Unknown'; ?></p>
            
            <p><strong>Birthdate:</strong> <?php echo $GoalieInfo['AgeDate'] ?? 'Unknown'; ?></p>
        </div>
        <div class="col-6">
            <?php
            // Tableau de correspondance des pays
            $countryMapping = [
                'USA' => 'us',
                'CAN' => 'ca',
                'SWE' => 'se',
                'FIN' => 'fi',
                'RUS' => 'ru',
                'GER' => 'de',
                'FRA' => 'fr',
                'CZE' => 'cz',
                'SVK' => 'sk',
            ];

            // Récupérer le code ISO correspondant
            $countryCode = $countryMapping[$GoalieInfo['Country'] ?? ''] ?? null;
            ?>
            <p>
                <strong>Birthplace:</strong>
                <?php if ($countryCode): ?>
                    <span class="fi fi-<?php echo $countryCode; ?>"></span>
                <?php endif; ?>
                
            </p>
            <p><strong>Draft Year:</strong> <?php echo $GoalieInfo['DraftYear'] ?? 'Unknown'; ?></p>
            <p><strong>Contract:</strong> <?php echo $GoalieInfo['Contract'] ?? 'Unknown'; ?></p>
            <p><strong>Cap Hit:</strong> <?php echo isset($GoalieInfo['SalaryCap']) ? '$' . number_format($GoalieInfo['SalaryCap'], 0) : 'Unknown'; ?></p>
            <p><strong>Available For Trade:</strong> <?php echo $GoalieInfo['AvailableforTrade'] ?? 'Unknown'; ?></p>

        </div>
        <hr> <!-- Séparateur horizontal -->
        <div class="row">
    <div class="col-12">
        <p><strong>Games In A Row With A Point:</strong> <?php echo $GoalieInfo['GameInRowWithAPoint'] ?? 'Unknown'; ?></p>
    </div>
   
</div>

    </div>
</div>



        <!-- Player Team Logo -->
        <div class="d-flex col-3 pt-3 justify-content-center">
            <?php if (!empty($GoalieInfo['TeamThemeID'])): ?>
                <img src="<?php echo $ImagesCDNPath . '/images/' . $GoalieInfo['TeamThemeID'] . '.png'; ?>" 
                     alt="<?php echo $GoalieInfo['ProTeamName'] ?? 'Team Logo'; ?>" 
                     class="playerReportTeamLogo ">
            <?php else: ?>
                <p>No team logo available.</p>
            <?php endif; ?>
        </div>
    </section>
</div>


       
<!-- Player rating Section -->
        
<div class="container-fluid p-0">
    <div class="col-md-12 border-top border-bottom mb-4">
        <h3 class="text-center mt-3 mb-3" style="color: white !important;">Player Ratings</h3>
           
            <?php if ($GoalieProStat): ?>
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>SK</th>
                            <th>DU</th>
                            <th>EN</th>
                            <th>SZ</th>
                            <th>AG</th>
                            <th>RB</th>
                            <th>SC</th>
                            <th>HS</th>
                            <th>RT</th>
                            <th>PH</th>
                            <th>PS</th>
                            <th>EX</th>
                            <th>LD</th>
                            <th>PO</th>
                            <th>MO</th>
                            <th>OV</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $GoalieInfo['SK']; ?></td>
                            <td><?php echo $GoalieInfo['DU']; ?></td>
                            <td><?php echo $GoalieInfo['EN']; ?></td>
                            <td><?php echo $GoalieInfo['SZ']; ?></td>
                            <td><?php echo $GoalieInfo['AG']; ?></td>
                            <td><?php echo $GoalieInfo['RB']; ?></td>
                            <td><?php echo $GoalieInfo['SC']; ?></td>
                            <td><?php echo $GoalieInfo['HS']; ?></td>
                            <td><?php echo $GoalieInfo['RT']; ?></td>
                            <td><?php echo $GoalieInfo['PH']; ?></td>
                            <td><?php echo $GoalieInfo['PS']; ?></td>
                            <td><?php echo $GoalieInfo['EX']; ?></td>
                            <td><?php echo $GoalieInfo['LD']; ?></td>
                            <td><?php echo $GoalieInfo['PO']; ?></td>
                            <td><?php echo $GoalieInfo['MO']; ?></td>
                            <td><?php echo $GoalieInfo['Overall']; ?></td>
                            
                            
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No pro stats available.</p>
            <?php endif; ?>
    </div>
</div>

    <!-- Pro Stats Section -->
<div class="container-fluid p-0">
    <div class="col-md-12 border-top border-bottom mb-4">
        <h3 class="text-center mt-3 mb-3" style="color: white !important;">Pro Stats</h3>
           
            <?php if ($GoalieProStat): ?>
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>GP</th>
                            <th>GS</th>
                            <th>W</th>
                            <th>L</th>
                            <th>OTL</th>
                            <th>SA</th>
                            <th>GA</th>
                            <th>GAA</th>
                            <th>SV%</th>
                            <th>SO</th>
                            <th>A</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $GoalieProStat['GP']; ?></td>
                            <td><?php echo $GoalieProStat['StartGoaler']; ?></td>
                            <td><?php echo $GoalieProStat['W']; ?></td>
                            <td><?php echo $GoalieProStat['L']; ?></td>
                            <td><?php echo $GoalieProStat['OTL']; ?></td>
                            <td><?php echo $GoalieProStat['SA']; ?></td>
                            <td><?php echo $GoalieProStat['GA']; ?></td>
							<td><?php echo $GoalieProStat['GAA']; ?></td>
                            <td><?php echo $GoalieProStat['PCT'] . '%'; ?></td>
                            <td><?php echo $GoalieProStat['Shootout']; ?></td>
                            <td><?php echo $GoalieProStat['A']; ?></td>
                          
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No pro stats available.</p>
            <?php endif; ?>
    </div>
</div>

        <!-- Farm Stats Section -->
<div class="container-fluid p-0">
    <div class="col-md-12 border-top border-bottom mb-4">
        <h3 class="text-center mt-3 mb-3" style="color: white !important;">Farm Stats</h3>
    
    <?php if ($GoalieFarmStat): ?>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>GP</th>
                    <th>GS</th>
                    <th>W</th>
                    <th>L</th>
                    <th>OTL</th>
                    <th>SA</th>
                    <th>GA</th>
                    <th>GAA</th>
                    <th>SV%</th>
                    <th>SO</th>
                    <th>A</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $GoalieFarmStat['GP']; ?></td>
                    <td><?php echo $GoalieFarmStat['StartGoaler']; ?></td>
                    <td><?php echo $GoalieFarmStat['W']; ?></td>
                    <td><?php echo $GoalieFarmStat['L']; ?></td>
                    <td><?php echo $GoalieFarmStat['OTL']; ?></td>
                    <td><?php echo $GoalieFarmStat['SA']; ?></td>
                    <td><?php echo $GoalieFarmStat['GA']; ?></td>
                    <td><?php echo $GoalieFarmStat['GAA']; ?></td>
                    <td><?php echo $GoalieFarmStat['PCT'] . '%'; ?></td>
                    <td><?php echo $GoalieFarmStat['Shootout']; ?></td>
                    <td><?php echo $GoalieFarmStat['A']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No farm stats available.</p>
    <?php endif; ?>
    </div>
</div>

    <!-- Career Statistics Section -->
    <?php if ($GoalieCareerStatFound): ?>
        <div class="container-fluid p-0">
            <div class="col-md-12 border-top border-bottom mb-4">
                <h3 class="text-center mt-3 mb-3" style="color: white !important;">Career Statistics</h3>
                
                <!-- Pro Career Totals from GoalerProStatCareer -->
                <?php if ($GoalieProCareerStat): ?>
                    <div class="border-top border-bottom mb-4">
                        <h4 class="text-center mt-3 mb-3" style="color: #28a745 !important;">Pro League - Career Totals</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Type</th>
                                        <th>Year</th>
                                        <th>Team</th>
                                        <th>GP</th>
                                        <th>W</th>
                                        <th>L</th>
                                        <th>OTL</th>
                                        <th>Shootout</th>
                                        <th>GA</th>
                                        <th>SA</th>
                                        <th>Avg</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: rgba(255, 255, 255, 0.9);">
                                    <?php 
                                    // Tableau de correspondance des équipes
                                    $teamLogoMapping = [
                                        'Penguins' => '1.png',
                                        'Islanders' => '2.png',
                                        'Rangers' => '3.png',
                                        'Devils' => '4.png',
                                        'Flyers' => '5.png',
                                        'Hurricanes' => '6.png',
                                        'Lightnings' => '7.png',
                                        'Jets' => '8.png',
                                        'Capitals' => '9.png',
                                        'Panthers' => '10.png',
                                        'Bruins' => '11.png',
                                        'Senators' => '12.png',
                                        'Canadiens' => '13.png',
                                        'Sabres' => '14.png',
                                        'Maple Leafs' => '15.png',
                                        'Blues' => '16.png',
                                        'Red Wings' => '17.png',
                                        'Blackhawks' => '18.png',
                                        'Blue Jackets' => '19.png',
                                        'Predators' => '20.png',
                                        'Wilds' => '21.png',
                                        'Oilers' => '22.png',
                                        'Flames' => '23.png',
                                        'Canucks' => '24.png',
                                        'Avalanche' => '25.png',
                                        'Kings' => '26.png',
                                        'Utah Hockey Club' => '27.png',
                                        'Stars' => '28.png',
                                        'Ducks' => '29.png',
                                        'Sharks' => '30.png',
                                        'Golden Knights' => '32.png',
                                        'Kraken' => '33.png',
                                    ];
                                    
                                    $teamName = $GoalieProCareerStat['TeamName'] ?? '';
                                    $teamLogo = $teamLogoMapping[$teamName] ?? null;
                                    
                                    // Calculer le pourcentage d'arrêt
                                    $savePercentage = 0;
                                    if ($GoalieProCareerStat['SA'] > 0) {
                                        $savePercentage = round((($GoalieProCareerStat['SA'] - $GoalieProCareerStat['GA']) / $GoalieProCareerStat['SA']) * 100, 3);
                                    }
                                    ?>
                                    <tr style="background-color: rgba(40, 167, 69, 0.1);">
                                        <td><strong>Regular Season</strong></td>
                                        <td><?php echo $GoalieProCareerStat['Year'] ?? 'N/A'; ?></td>
                                        <td>
                                            <?php if ($teamLogo): ?>
                                                <img src="<?php echo $ImagesCDNPath . '/images/' . $teamLogo; ?>" 
                                                     alt="<?php echo $teamName; ?>" 
                                                     style="width: 30px; height: 30px;">
                                            <?php else: ?>
                                                <?php echo $teamName ?: 'N/A'; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><strong><?php echo $GoalieProCareerStat['GP'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $GoalieProCareerStat['W'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $GoalieProCareerStat['L'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $GoalieProCareerStat['OTL'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $GoalieProCareerStat['Shootout'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $GoalieProCareerStat['GA'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $GoalieProCareerStat['SA'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $savePercentage . '%'; ?></strong></td>
                                    </tr>
                                    <?php if ($GoalieProCareerPlayoffTotals && !empty($GoalieProCareerPlayoffTotals)): ?>
                                        <?php 
                                        // Calculer le pourcentage d'arrêt pour les playoffs
                                        $playoffSavePercentage = 0;
                                        if ($GoalieProCareerPlayoffTotals['SA'] > 0) {
                                            $playoffSavePercentage = round((($GoalieProCareerPlayoffTotals['SA'] - $GoalieProCareerPlayoffTotals['GA']) / $GoalieProCareerPlayoffTotals['SA']) * 100, 3);
                                        }
                                        ?>
                                        <tr style="background-color: rgba(220, 53, 69, 0.1);">
                                            <td><strong>Playoffs</strong></td>
                                            <td><?php echo ($GoalieProCareerPlayoffTotals['FirstYear'] && $GoalieProCareerPlayoffTotals['LastYear']) ? $GoalieProCareerPlayoffTotals['FirstYear'] . '-' . $GoalieProCareerPlayoffTotals['LastYear'] : 'N/A'; ?></td>
                                            <td>N/A</td>
                                            <td><strong><?php echo $GoalieProCareerPlayoffTotals['GP'] ?? 0; ?></strong></td>
                                            <td><strong><?php echo $GoalieProCareerPlayoffTotals['W'] ?? 0; ?></strong></td>
                                            <td><strong><?php echo $GoalieProCareerPlayoffTotals['L'] ?? 0; ?></strong></td>
                                            <td><strong><?php echo $GoalieProCareerPlayoffTotals['OTL'] ?? 0; ?></strong></td>
                                            <td><strong><?php echo $GoalieProCareerPlayoffTotals['Shootout'] ?? 0; ?></strong></td>
                                            <td><strong><?php echo $GoalieProCareerPlayoffTotals['GA'] ?? 0; ?></strong></td>
                                            <td><strong><?php echo $GoalieProCareerPlayoffTotals['SA'] ?? 0; ?></strong></td>
                                            <td><strong><?php echo $playoffSavePercentage . '%'; ?></strong></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Pro Career Season Stats -->
    <?php if ($GoalieProCareerSeason && $GoalieProCareerSeason->numColumns() > 0): ?>
        <div class="container-fluid p-0">
            <div class="col-md-12 border-top border-bottom mb-4">
                <h4 class="text-center mt-3 mb-3" style="color: #007bff !important;">Pro League - Season by Season</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Season</th>
                                <th>Year</th>
                                <th>Team</th>
                                <th>GP</th>
                                <th>W</th>
                                <th>L</th>
                                <th>OTL</th>
                                <th>Shootout</th>
                                <th>GA</th>
                                <th>SA</th>
                                <th>Avg</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: rgba(255, 255, 255, 0.9);">
                            <?php 
                            // Tableau de correspondance des équipes
                            $teamLogoMapping = [
                                'Penguins' => '1.png',
                                'Islanders' => '2.png',
                                'Rangers' => '3.png',
                                'Devils' => '4.png',
                                'Flyers' => '5.png',
                                'Hurricanes' => '6.png',
                                'Lightnings' => '7.png',
                                'Jets' => '8.png',
                                'Capitals' => '9.png',
                                'Panthers' => '10.png',
                                'Bruins' => '11.png',
                                'Senators' => '12.png',
                                'Canadiens' => '13.png',
                                'Sabres' => '14.png',
                                'Maple Leafs' => '15.png',
                                'Blues' => '16.png',
                                'Red Wings' => '17.png',
                                'Blackhawks' => '18.png',
                                'Blue Jackets' => '19.png',
                                'Predators' => '20.png',
                                'Wilds' => '21.png',
                                'Oilers' => '22.png',
                                'Flames' => '23.png',
                                'Canucks' => '24.png',
                                'Avalanche' => '25.png',
                                'Kings' => '26.png',
                                'Utah Hockey Club' => '27.png',
                                'Stars' => '28.png',
                                'Ducks' => '29.png',
                                'Sharks' => '30.png',
                                'Golden Knights' => '32.png',
                                'Kraken' => '33.png',
                            ];
                            ?>
                            <?php while ($season = $GoalieProCareerSeason->fetchArray()): ?>
                                <?php 
                                $teamName = $season['TeamName'] ?? '';
                                $teamLogo = $teamLogoMapping[$teamName] ?? null;
                                
                                // Calculer le pourcentage d'arrêt
                                $savePercentage = 0;
                                if ($season['SA'] > 0) {
                                    $savePercentage = round((($season['SA'] - $season['GA']) / $season['SA']) * 100, 3);
                                }
                                ?>
                                <tr>
                                    <td><strong><?php echo $season['Season']; ?></strong></td>
                                    <td><?php echo $season['Year'] ?? 'N/A'; ?></td>
                                    <td>
                                        <?php if ($teamLogo): ?>
                                            <img src="<?php echo $ImagesCDNPath . '/images/' . $teamLogo; ?>" 
                                                 alt="<?php echo $teamName; ?>" 
                                                 style="width: 30px; height: 30px;">
                                        <?php else: ?>
                                            <?php echo $teamName ?: 'N/A'; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $season['GP'] ?? 0; ?></td>
                                    <td><?php echo $season['W'] ?? 0; ?></td>
                                    <td><?php echo $season['L'] ?? 0; ?></td>
                                    <td><?php echo $season['OTL'] ?? 0; ?></td>
                                    <td><?php echo $season['Shootout'] ?? 0; ?></td>
                                    <td><?php echo $season['GA'] ?? 0; ?></td>
                                    <td><?php echo $season['SA'] ?? 0; ?></td>
                                    <td><strong><?php echo $savePercentage . '%'; ?></strong></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Pro Career Playoff Stats -->
    <?php if ($GoalieProCareerPlayoff && $GoalieProCareerPlayoff->numColumns() > 0): ?>
        <div class="container-fluid p-0">
            <div class="col-md-12 border-top border-bottom mb-4">
                <h4 class="text-center mt-3 mb-3" style="color: #dc3545 !important;">Pro League - Playoff Statistics</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Season</th>
                                <th>Year</th>
                                <th>Team</th>
                                <th>GP</th>
                                <th>W</th>
                                <th>L</th>
                                <th>OTL</th>
                                <th>Shootout</th>
                                <th>GA</th>
                                <th>SA</th>
                                <th>Avg</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: rgba(255, 255, 255, 0.9);">
                            <?php 
                            // Tableau de correspondance des équipes
                            $teamLogoMapping = [
                                'Penguins' => '1.png',
                                'Islanders' => '2.png',
                                'Rangers' => '3.png',
                                'Devils' => '4.png',
                                'Flyers' => '5.png',
                                'Hurricanes' => '6.png',
                                'Lightnings' => '7.png',
                                'Jets' => '8.png',
                                'Capitals' => '9.png',
                                'Panthers' => '10.png',
                                'Bruins' => '11.png',
                                'Senators' => '12.png',
                                'Canadiens' => '13.png',
                                'Sabres' => '14.png',
                                'Maple Leafs' => '15.png',
                                'Blues' => '16.png',
                                'Red Wings' => '17.png',
                                'Blackhawks' => '18.png',
                                'Blue Jackets' => '19.png',
                                'Predators' => '20.png',
                                'Wilds' => '21.png',
                                'Oilers' => '22.png',
                                'Flames' => '23.png',
                                'Canucks' => '24.png',
                                'Avalanche' => '25.png',
                                'Kings' => '26.png',
                                'Utah Hockey Club' => '27.png',
                                'Stars' => '28.png',
                                'Ducks' => '29.png',
                                'Sharks' => '30.png',
                                'Golden Knights' => '32.png',
                                'Kraken' => '33.png',
                            ];
                            ?>
                            <?php while ($playoff = $GoalieProCareerPlayoff->fetchArray()): ?>
                                <?php 
                                $teamName = $playoff['TeamName'] ?? '';
                                $teamLogo = $teamLogoMapping[$teamName] ?? null;
                                
                                // Calculer le pourcentage d'arrêt
                                $savePercentage = 0;
                                if ($playoff['SA'] > 0) {
                                    $savePercentage = round((($playoff['SA'] - $playoff['GA']) / $playoff['SA']) * 100, 3);
                                }
                                ?>
                                <tr>
                                    <td><strong><?php echo $playoff['Season']; ?></strong></td>
                                    <td><?php echo $playoff['Year'] ?? 'N/A'; ?></td>
                                    <td>
                                        <?php if ($teamLogo): ?>
                                            <img src="<?php echo $ImagesCDNPath . '/images/' . $teamLogo; ?>" 
                                                 alt="<?php echo $teamName; ?>" 
                                                 style="width: 30px; height: 30px;">
                                        <?php else: ?>
                                            <?php echo $teamName ?: 'N/A'; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $playoff['GP'] ?? 0; ?></td>
                                    <td><?php echo $playoff['W'] ?? 0; ?></td>
                                    <td><?php echo $playoff['L'] ?? 0; ?></td>
                                    <td><?php echo $playoff['OTL'] ?? 0; ?></td>
                                    <td><?php echo $playoff['Shootout'] ?? 0; ?></td>
                                    <td><?php echo $playoff['GA'] ?? 0; ?></td>
                                    <td><?php echo $playoff['SA'] ?? 0; ?></td>
                                    <td><strong><?php echo $savePercentage . '%'; ?></strong></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
    
   </body> 

<style>
.actionShots {
    margin-right: 0;
}

  /* Action Shots Container */
.playerReportActionShots {
    background-size: cover; /* Ensure the image covers the container */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Prevent tiling */
    color: white; /* Ensure readability */
    padding: 0; /* Remove padding to match the background */
    border-radius: 10px; /* Add rounded corners if needed */
    width: 100%;
    height: 100%;
    position: relative; /* Ensure overlay positions relative to this container */
    overflow: hidden; /* Prevent overflow */
}

/* Player Info Overlay */
.playerInfoOverlay {
    position: absolute; /* Position relative to the .playerReportActionShots container */
    top: 50%; /* Start in the middle of the container */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%); /* Center the overlay perfectly */
    background: rgba(0, 0, 0, 0.9); /* 90% opaque black background */
    padding-top: 50px; /* Add space inside the overlay */
    border-radius: 10px; /* Rounded corners */
    color: white; /* Text color */
    z-index: 10; /* Ensure it stays on top of other elements */
    width: 100%; /* Adjust overlay width */
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.7); /* Optional shadow for effect */
}


.table thead th {
    text-align: center;
}




/* General Section Styling */
.playerReportMainContainer {
    background-color: black; /* Light gray for better readability */
    padding: 20px;
   
    
}

/* Player Profile Section */
.player-profile {
    flex-wrap: wrap; /* Ensure proper stacking on smaller screens */
    padding: 10px;
}

/* Column Styling */
.player-profile .col-4 {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 15px;
}

/* Player Mugshot Styling */
.playerReportMugshot img {
    
    width: 275px;
    height: 275px;
    object-fit: cover;
    
   
    
}

/* Player Info Styling */
.player-info p {
    margin: 5px 0;
    font-size: 16px;
    color: white;
    font-weight: 700;
}

.player-info p strong {
    color: gray; /* Blue for labels */
    font-size: 16px;
}

/* Team Logo Styling */
.playerReportTeamLogo {
    width: 225px;
    height: 225px;
    
    padding: 5px;

}







</style>


<?php include "Footer.php";?>





