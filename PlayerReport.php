<?php include "Header.php";?>
<?php
/*
Syntax to call this webpage should be PlayersStat.php?Player=2 where only the number change and it's based on the UniqueID of players.
*/
If ($lang == "fr"){include 'LanguageFR-Stat.php';}else{include 'LanguageEN-Stat.php';}
$Player = (integer)0;
$Query = (string)"";
$PlayerName = $PlayersLang['IncorrectPlayer'];
$LeagueName = (string)"";
$CareerLeaderSubPrintOut = (int)0;
$PlayerCareerStatFound = (boolean)false;
$PlayerProCareerSeason = Null;
$PlayerProCareerPlayoff = Null;
$PlayerProCareerSumSeasonOnly = Null;
$PlayerProCareerSumPlayoffOnly = Null;
$PlayerFarmCareerSeason = Null;
$PlayerFarmCareerPlayoff = Null;
$PlayerFarmCareerSumSeasonOnly = Null;
$PlayerFarmCareerSumPlayoffOnly = Null;
$PlayerProStatMultipleTeamFound = (boolean)FALSE;
$PlayerFarmStatMultipleTeamFound = (boolean)FALSE;




if(isset($_GET['Player'])){$Player = filter_var($_GET['Player'], FILTER_SANITIZE_NUMBER_INT);} 
try{
If (file_exists($DatabaseFile) == false){
	$Player = 0;
	$PlayerName = $DatabaseNotFound;
	$LeagueOutputOption = Null;
	$LeagueGeneral = Null;
}else{
	$db = new SQLite3($DatabaseFile);
	$Query = "Select Name, OutputName, LeagueYearOutput, PreSeasonSchedule, PlayOffStarted from LeagueGeneral";
	$LeagueGeneral = $db->querySingle($Query,true);	
	$Query = "Select PlayersMugShotBaseURL, PlayersMugShotFileExtension,OutputSalariesRemaining,OutputSalariesAverageTotal,OutputSalariesAverageRemaining from LeagueOutputOption";
	$LeagueOutputOption = $db->querySingle($Query,true);	
}
If ($Player == 0){
	$PlayerInfo = Null;
	$PlayerProStat = Null;
	$PlayerFarmStat = Null;		
	echo "<style>.STHSPHPPlayerStat_Main {display:none;}</style>";
}else{
	$Query = "SELECT count(*) AS count FROM PlayerInfo WHERE Number = " . $Player;
	$Result = $db->querySingle($Query,true);
	If ($Result['count'] == 1){
		If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS Start Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
		$Query = "SELECT PlayerInfo.*, TeamProInfo.Name AS ProTeamName FROM PlayerInfo LEFT JOIN TeamProInfo ON PlayerInfo.Team = TeamProInfo.Number WHERE PlayerInfo.Number = " . $Player;
		$PlayerInfo = $db->querySingle($Query,true);
		$Query = "SELECT PlayerProStat.*, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG,ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT,ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerProStat WHERE Number = " . $Player;
		$PlayerProStat = $db->querySingle($Query,true);
		$Query = "SELECT PlayerFarmStat.*, ROUND((CAST(PlayerFarmStat.G AS REAL) / (PlayerFarmStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerFarmStat.SecondPlay AS REAL) / 60 / (PlayerFarmStat.GP)),2) AS AMG,ROUND((CAST(PlayerFarmStat.FaceOffWon AS REAL) / (PlayerFarmStat.FaceOffTotal))*100,2) as FaceoffPCT,ROUND((CAST(PlayerFarmStat.P AS REAL) / (PlayerFarmStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerFarmStat WHERE Number = " . $Player;
		$PlayerFarmStat = $db->querySingle($Query,true);
		
		// Vérifie si le joueur a joué pour plusieurs équipes
$Query = "SELECT count(*) AS count FROM PlayerProStatMultipleTeam WHERE Number = " . $Player;
$Result = $db->querySingle($Query,true);
If ($Result['count'] > 0) {
    $PlayerProStatMultipleTeamFound = TRUE;

    // Récupérer les stats de chaque équipe
    $Query = "SELECT PlayerProStatMultipleTeam.*, TeamProInfo.Name AS TeamName, TeamProInfo.TeamThemeID 
          FROM PlayerProStatMultipleTeam 
          LEFT JOIN TeamProInfo ON PlayerProStatMultipleTeam.Team = TeamProInfo.Number
          WHERE PlayerProStatMultipleTeam.Number = " . $Player;
$PlayerProStatMultipleTeam = $db->query($Query);

}

		
		$Query = "SELECT count(*) AS count FROM PlayerFarmStatMultipleTeam WHERE Number = " . $Player;
		$Result = $db->querySingle($Query,true);
		If ($Result['count'] > 0){$PlayerFarmStatMultipleTeamFound = TRUE;}
		
		// Initialiser $TeamPlayers
		$TeamPlayers = null;
		
		If ($PlayerInfo['Team'] > 0){
			$Query = "SELECT MainTable.* FROM (SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.TeamName, PlayerInfo.URLLink, PlayerInfo.NHLID, 'False' AS PosG FROM PlayerInfo WHERE Team = " . $PlayerInfo['Team'] . " UNION ALL SELECT GoalerInfo.Number, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.TeamName, GoalerInfo.URLLink, GoalerInfo.NHLID, 'True' AS PosG FROM GoalerInfo WHERE Team = " . $PlayerInfo['Team'] . ") AS MainTable ORDER BY Name";
			$TeamPlayers = $db->query($Query);
		}
		If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS Normal Query PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
								
		$LeagueName = $LeagueGeneral['Name'];
		$PlayerName = $PlayerInfo['Name'];	
		If (file_exists($CareerStatDatabaseFile) == true){ /* CareerStat */
			$CareerStatdb = new SQLite3($CareerStatDatabaseFile);
			
			// Vérifier si la table PlayerProStatCareer existe
			$CareerTableCheck = $CareerStatdb->querySingle("SELECT Count(name) AS CountName FROM sqlite_master WHERE type='table' AND name='PlayerProStatCareer'",true);
			If ($CareerTableCheck['CountName'] == 1){
				
				// Récupérer les statistiques de carrière totales depuis PlayerProStatCareer
				$Query = "SELECT * FROM PlayerProStatCareer WHERE UniqueID = " . $PlayerInfo['UniqueID'];
				$PlayerProCareerStat = $CareerStatdb->querySingle($Query, true);
				
				// Récupérer les statistiques par saison (saison régulière)
				$Query = "SELECT * FROM PlayerProStatHistory WHERE UniqueID = " . $PlayerInfo['UniqueID'] . " AND Playoff = 'False' ORDER BY Season DESC";
				$PlayerProCareerSeason = $CareerStatdb->query($Query);
				
				// Récupérer les statistiques de playoffs par saison
				$Query = "SELECT * FROM PlayerProStatHistory WHERE UniqueID = " . $PlayerInfo['UniqueID'] . " AND Playoff = 'True' ORDER BY Season DESC";
				$PlayerProCareerPlayoff = $CareerStatdb->query($Query);
				
				// Récupérer les totaux de playoffs depuis PlayerProStatHistory
				$Query = "SELECT SUM(GP) as GP, SUM(G) as G, SUM(A) as A, SUM(P) as P, SUM(PlusMinus) as PlusMinus, SUM(Pim) as Pim, 
                         SUM(PPG) as PPG, SUM(Shots) as Shots, SUM(ShotsBlock) as ShotsBlock, SUM(Hits) as Hits, SUM(GiveAway) as GiveAway, SUM(TakeAway) as TakeAway,
                         MIN(Year) as FirstYear, MAX(Year) as LastYear 
                         FROM PlayerProStatHistory 
                         WHERE UniqueID = " . $PlayerInfo['UniqueID'] . " AND Playoff = 'True'";
				$PlayerProCareerPlayoffTotals = $CareerStatdb->querySingle($Query, true);
				
				// Récupérer les statistiques farm par saison
				$Query = "SELECT * FROM PlayerFarmStatHistory WHERE UniqueID = " . $PlayerInfo['UniqueID'] . " ORDER BY Season DESC";
				$PlayerFarmCareerSeason = $CareerStatdb->query($Query);
				
				$PlayerCareerStatFound = true;	
			}
			If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS CareerStat Query PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
		}
	}else{
		$PlayerName = $PlayersLang['Playernotfound'];
		$PlayerInfo = Null;
		$PlayerProStat = Null;
		$PlayerFarmStat = Null;	
		echo "<style>.STHSPHPPlayerStat_Main {display:none;}</style>";
	}
}} catch (Exception $e) {
	$Player = 0;
	$PlayerName = $DatabaseNotFound;
	$LeagueOutputOption = Null;
	$LeagueGeneral = Null;
	$PlayerInfo = Null;
	$PlayerProStat = Null;
	$PlayerFarmStat = Null;		
}
echo "<title>" . $LeagueName . " - " . $PlayerName . "</title>";
echo "<style>";
if ($PlayerCareerStatFound == true){
	echo "#tablesorter_colSelect2:checked + label {background: #5797d7;  border-color: #555;}";
	echo "#tablesorter_colSelect2:checked ~ #tablesorter_ColumnSelector2 {display: block;}";
	echo "#tablesorter_colSelect3:checked + label {background: #5797d7;  border-color: #555;}";
	echo "#tablesorter_colSelect3:checked ~ #tablesorter_ColumnSelector3 {display: block;}";
}
if ($PlayerProStatMultipleTeamFound == true){
	echo "#tablesorter_colSelect4:checked + label {background: #5797d7;  border-color: #555;}";
	echo "#tablesorter_colSelect4:checked ~ #tablesorter_ColumnSelector4 {display: block;}";
}
if ($PlayerFarmStatMultipleTeamFound == true){
	echo "#tablesorter_colSelect5:checked + label {background: #5797d7;  border-color: #555;}";
	echo "#tablesorter_colSelect5:checked ~ #tablesorter_ColumnSelector5 {display: block;}";
}
echo "</style>";

// Déterminer la position du joueur
$PlayerPositions = [
    'Center' => $PlayerInfo['PosC'] ?? 'False',
    'Left Wing' => $PlayerInfo['PosLW'] ?? 'False',
    'Right Wing' => $PlayerInfo['PosRW'] ?? 'False',
    'Defense' => $PlayerInfo['PosD'] ?? 'False',
];

$playerPosition = 'Unknown'; // Valeur par défaut
foreach ($PlayerPositions as $position => $value) {
    if ($value === 'True') {
        $playerPosition = $position;
        break; // Stopper dès qu'une position est trouvée
    }
}

?>

<link href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css" rel="stylesheet">

</head><body>
<?php include "Menu.php";?>
<br />



<div class="container">
<div class="container playerReportActionShots">

<?php if ($PlayerInfo['NHLID']): ?>
    <img src="https://assets.nhle.com/mugs/actionshots/1296x729/<?php echo $PlayerInfo['NHLID']; ?>.jpg" 
         alt="<?php echo $PlayerName; ?>" 
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
                    <?php echo $PlayerName; ?>
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
            <?php if ($PlayerInfo['NHLID']): ?>
                <img src="<?php echo $LeagueOutputOption['PlayersMugShotBaseURL'] . $PlayerInfo['NHLID'] . '.' . $LeagueOutputOption['PlayersMugShotFileExtension']; ?>" 
                     alt="<?php echo $PlayerName; ?>" 
                     class="playerReportHeadshot">
            <?php else: ?>
                <p>No mugshot available.</p>
            <?php endif; ?>
        </div>

        <!-- Player Info -->
        <div class="col-5 player-info p-0 text-start">
    <div class="row">
        <div class="col-6">
        <p><strong>Position:</strong> <?php echo $playerPosition; ?></p>
        <p><strong>Age:</strong> <?php echo $PlayerInfo['Age'] ?? 'Unknown'; ?></p>
            <p><strong>Weight:</strong> <?php echo $PlayerInfo['Weight'] ?? 'Unknown'; ?> lbs</p>
            <p><strong>Height:</strong> <?php echo $PlayerInfo['Height'] ?? 'Unknown'; ?></p>
            
            <p><strong>Birthdate:</strong> <?php echo $PlayerInfo['AgeDate'] ?? 'Unknown'; ?></p>
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
            $countryCode = $countryMapping[$PlayerInfo['Country'] ?? ''] ?? null;
            ?>
            <p>
                <strong>Birthplace:</strong>
                <?php if ($countryCode): ?>
                    <span class="fi fi-<?php echo $countryCode; ?>"></span>
                <?php endif; ?>
                
            </p>
            <p><strong>Draft Year:</strong> <?php echo $PlayerInfo['DraftYear'] ?? 'Unknown'; ?></p>
            <p><strong>Contract:</strong> <?php echo $PlayerInfo['Contract'] ?? 'Unknown'; ?></p>
            <p><strong>Cap Hit:</strong> <?php echo isset($PlayerInfo['SalaryCap']) ? '$' . number_format($PlayerInfo['SalaryCap'], 0) : 'Unknown'; ?></p>
            <p><strong>Available For Trade:</strong> <?php echo $PlayerInfo['AvailableforTrade'] ?? 'Unknown'; ?></p>

        </div>
        <hr> <!-- Séparateur horizontal -->
        <div class="row">
    <div class="col-12">
        <p><strong>Games In A Row With A Point:</strong> <?php echo $PlayerInfo['GameInRowWithAPoint'] ?? 'Unknown'; ?></p>
    </div>
   
</div>

    </div>
</div>



        <!-- Player Team Logo -->
        <div class="d-flex col-3 pt-3 justify-content-center">
            <?php if (!empty($PlayerInfo['TeamThemeID'])): ?>
                <img src="<?php echo $ImagesCDNPath . '/images/' . $PlayerInfo['TeamThemeID'] . '.png'; ?>" 
                     alt="<?php echo $PlayerInfo['ProTeamName'] ?? 'Team Logo'; ?>" 
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
           
            <?php if ($PlayerProStat): ?>
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>CK</th>
                            <th>FG</th>
                            <th>DI</th>
                            <th>SK</th>
                            <th>ST</th>
                            <th>EN</th>
                            <th>DU</th>
                            <th>PH</th>
                            <th>FO</th>
                            <th>PA</th>
                            <th>SC</th>
                            <th>DF</th>
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
                            <td><?php echo $PlayerInfo['CK']; ?></td>
                            <td><?php echo $PlayerInfo['FG']; ?></td>
                            <td><?php echo $PlayerInfo['DI']; ?></td>
                            <td><?php echo $PlayerInfo['SK']; ?></td>
                            <td><?php echo $PlayerInfo['ST']; ?></td>
                            <td><?php echo $PlayerInfo['EN']; ?></td>
                            <td><?php echo $PlayerInfo['DU']; ?></td>
                            <td><?php echo $PlayerInfo['PH']; ?></td>
                            <td><?php echo $PlayerInfo['FO']; ?></td>
                            <td><?php echo $PlayerInfo['PA']; ?></td>
                            <td><?php echo $PlayerInfo['SC']; ?></td>
                            <td><?php echo $PlayerInfo['DF']; ?></td>
                            <td><?php echo $PlayerInfo['PS']; ?></td>
                            <td><?php echo $PlayerInfo['EX']; ?></td>
                            <td><?php echo $PlayerInfo['LD']; ?></td>
                            <td><?php echo $PlayerInfo['PO']; ?></td>
                            <td><?php echo $PlayerInfo['MO']; ?></td>
                            <td><?php echo $PlayerInfo['Overall']; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No pro stats available.</p>
            <?php endif; ?>
    </div>
        </div>

        <?php if ($PlayerProStatMultipleTeamFound == true): ?>
    <div class="container-fluid p-0">
        <div class="col-md-12 border-top border-bottom mb-4">
            <h3 class="text-center mt-3 mb-3" style="color: white !important;">Pro Stats - Multiple Teams</h3>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Team</th>
                        <th>GP</th>
                        <th>Goals</th>
                        <th>Assists</th>
                        <th>Points</th>
                        <th>+/-</th>
                        <th>PIM</th>
                        <th>Shots</th>
                        <th>S%</th>
                        <th>PPG</th>
                        <th>Hits</th>
                        <th>Block Shots</th>
                        <th>Giveaway</th>
                        <th>Takeaway</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $PlayerProStatMultipleTeam->fetchArray()): ?>
                        <tr>
                        <td>
    <img src="<?php echo $ImagesCDNPath . '/images/' . $row['TeamThemeID'] . '.png'; ?>" 
         alt="<?php echo $row['TeamName']; ?>" 
         style="width: 35px; height: 35px; margin-left: 25%;">
</td>
                            <td><?php echo $row['GP']; ?></td>
                            <td><?php echo $row['G']; ?></td>
                            <td><?php echo $row['A']; ?></td>
                            <td><?php echo $row['P']; ?></td>
                            <td><?php echo $row['PlusMinus']; ?></td>
                            <td><?php echo $row['Pim']; ?></td>
                            <td><?php echo $row['Shots']; ?></td>
                            <td><?php echo $row['ShotsPCT'] . '%'; ?></td>
                            <td><?php echo $row['PPG']; ?></td>
                            <td><?php echo $row['Hits']; ?></td>
                            <td><?php echo $row['ShotsBlock']; ?></td>
                            <td><?php echo $row['GiveAway']; ?></td>
                            <td><?php echo $row['TakeAway']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

    <!-- Player Statistics Section -->
<div class="container-fluid p-0">
        <!-- Pro Stats -->
    <div class="col-md-12 border-top border-bottom mb-4">
        <h3 class="text-center mt-3 mb-3" style="color: white !important;">Pro Stats</h3>
           
            <?php if ($PlayerProStat): ?>
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>GP</th>
                            <th>Goals</th>
                            <th>Assists</th>
                            <th>Points</th>
                            <th>+/-</th>
                            <th>PIM</th>
                            <th>Shots</th>
                            <th>S%</th>
                            <th>PPG</th>
                            <th>Hits</th>
                            <th>Block Shots</th>
                            <th>Giveaway</th>
                            <th>Takeaway</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $PlayerProStat['GP']; ?></td>
                            <td><?php echo $PlayerProStat['G']; ?></td>
                            <td><?php echo $PlayerProStat['A']; ?></td>
                            <td><?php echo $PlayerProStat['P']; ?></td>
                            <td><?php echo $PlayerProStat['PlusMinus']; ?></td>
                            <td><?php echo $PlayerProStat['Pim']; ?></td>
                            <td><?php echo $PlayerProStat['Shots']; ?></td>
                            <td><?php echo $PlayerProStat['ShotsPCT'] . '%'; ?></td>
                            <td><?php echo $PlayerProStat['PPG']; ?></td>
                            <td><?php echo $PlayerProStat['Hits']; ?></td>
                            <td><?php echo $PlayerProStat['ShotsBlock']; ?></td>
                            <td><?php echo $PlayerProStat['GiveAway']; ?></td>
                            <td><?php echo $PlayerProStat['TakeAway']; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No pro stats available.</p>
            <?php endif; ?>
        </div>

        <!-- Farm Stats Section -->
<div class="container-fluid p-0">
        <div class="col-md-12 border-top border-bottom mb-4">
            <h3 class="text-center mt-3 mb-3" style="color: white !important;">Farm Stats</h3>
        
        <?php if ($PlayerFarmStat): ?>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>GP</th>
                        <th>Goals</th>
                        <th>Assists</th>
                        <th>Points</th>
                        <th>+/-</th>
                        <th>PIM</th>
                        <th>Shots</th>
                        <th>S%</th>
                        <th>PPG</th>
                        <th>Hits</th>
                        <th>Block Shots</th>
                        <th>Giveaway</th>
                        <th>Takeaway</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $PlayerFarmStat['GP']; ?></td>
                        <td><?php echo $PlayerFarmStat['G']; ?></td>
                        <td><?php echo $PlayerFarmStat['A']; ?></td>
                        <td><?php echo $PlayerFarmStat['P']; ?></td>
                        <td><?php echo $PlayerFarmStat['PlusMinus']; ?></td>
                        <td><?php echo $PlayerFarmStat['Pim']; ?></td>
                        <td><?php echo $PlayerFarmStat['Shots']; ?></td>
                        <td><?php echo $PlayerFarmStat['ShotsPCT'] . '%'; ?></td>
                        <td><?php echo $PlayerFarmStat['PPG']; ?></td>
                        <td><?php echo $PlayerFarmStat['Hits']; ?></td>
                        <td><?php echo $PlayerFarmStat['ShotsBlock']; ?></td>
                        <td><?php echo $PlayerFarmStat['GiveAway']; ?></td>
                        <td><?php echo $PlayerFarmStat['TakeAway']; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">No farm stats available.</p>
        <?php endif; ?>
        </div>
    </div>
</div>

<?php if ($PlayerFarmStatMultipleTeamFound == true): ?>
    <div class="container-fluid p-0">
        <div class="col-md-12 border-top border-bottom mb-4">
            <h3 class="text-center mt-3 mb-3" style="color: white !important;">Farm Stats - Multiple Teams</h3>
        <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Team</th>
                        <th>GP</th>
                        <th>Goals</th>
                        <th>Assists</th>
                        <th>Points</th>
                        <th>+/-</th>
                        <th>PIM</th>
                        <th>Shots</th>
                        <th>S%</th>
                        <th>PPG</th>
                        <th>Hits</th>
                        <th>Block Shots</th>
                        <th>Giveaway</th>
                        <th>Takeaway</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $PlayerFarmStatMultipleTeam->fetchArray()): ?>
                        <tr>
                            <td>
                                <img src="<?php echo $ImagesCDNPath . '/images/' . $row['TeamThemeID'] . '.png'; ?>" 
                                     alt="<?php echo $row['TeamName']; ?>" 
                                     style="width: 35px; height: 35px;">
                            </td>
                            <td><?php echo $row['GP']; ?></td>
                            <td><?php echo $row['G']; ?></td>
                            <td><?php echo $row['A']; ?></td>
                            <td><?php echo $row['P']; ?></td>
                            <td><?php echo $row['PlusMinus']; ?></td>
                            <td><?php echo $row['Pim']; ?></td>
                            <td><?php echo $row['Shots']; ?></td>
                            <td><?php echo $row['ShotsPCT'] . '%'; ?></td>
                            <td><?php echo $row['PPG']; ?></td>
                            <td><?php echo $row['Hits']; ?></td>
                            <td><?php echo $row['ShotsBlock']; ?></td>
                            <td><?php echo $row['GiveAway']; ?></td>
                            <td><?php echo $row['TakeAway']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

<!-- Career Statistics Section -->
<?php if ($PlayerCareerStatFound == true): ?>
    <div class="container-fluid p-0">
        <div class="col-md-12 border-top border-bottom mb-4">
            <h3 class="text-center mt-3 mb-3" style="color: white !important;">Career Statistics</h3>
            
            <!-- Pro Career Totals from PlayerProStatCareer -->
            <?php if ($PlayerProCareerStat && !empty($PlayerProCareerStat)): ?>
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
                                    <th>Goals</th>
                                    <th>Assists</th>
                                    <th>Points</th>
                                    <th>+/-</th>
                                    <th>PIM</th>
                                    <th>PPG</th>
                                    <th>Shots</th>
                                    <th>Block Shots</th>
                                    <th>Hits</th>
                                    <th>Giveaway</th>
                                    <th>Takeaway</th>
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
                                
                                $teamName = $PlayerProCareerStat['TeamName'] ?? '';
                                $teamLogo = $teamLogoMapping[$teamName] ?? null;
                                ?>
                                <tr style="background-color: rgba(40, 167, 69, 0.1);">
                                    <td><strong>Regular Season</strong></td>
                                    <td><?php echo $PlayerProCareerStat['Year'] ?? 'N/A'; ?></td>
                                    <td>
                                        <?php if ($teamLogo): ?>
                                            <img src="<?php echo $ImagesCDNPath . '/images/' . $teamLogo; ?>" 
                                                 alt="<?php echo $teamName; ?>" 
                                                 style="width: 30px; height: 30px;">
                                        <?php else: ?>
                                            <?php echo $teamName ?: 'N/A'; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><strong><?php echo $PlayerProCareerStat['GP'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['G'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['A'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['P'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['PlusMinus'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['Pim'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['PPG'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['Shots'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['ShotsBlock'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['Hits'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['GiveAway'] ?? 0; ?></strong></td>
                                    <td><strong><?php echo $PlayerProCareerStat['TakeAway'] ?? 0; ?></strong></td>
                                </tr>
                                <?php if ($PlayerProCareerPlayoffTotals && !empty($PlayerProCareerPlayoffTotals)): ?>
                                    <tr style="background-color: rgba(220, 53, 69, 0.1);">
                                        <td><strong>Playoffs</strong></td>
                                        <td><?php echo ($PlayerProCareerPlayoffTotals['FirstYear'] && $PlayerProCareerPlayoffTotals['LastYear']) ? $PlayerProCareerPlayoffTotals['FirstYear'] . '-' . $PlayerProCareerPlayoffTotals['LastYear'] : 'N/A'; ?></td>
                                        <td>N/A</td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['GP'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['G'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['A'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['P'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['PlusMinus'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['Pim'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['PPG'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['Shots'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['ShotsBlock'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['Hits'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['GiveAway'] ?? 0; ?></strong></td>
                                        <td><strong><?php echo $PlayerProCareerPlayoffTotals['TakeAway'] ?? 0; ?></strong></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
</div>
                </div>
            <?php endif; ?>

            <!-- Pro Career Season Stats -->
            <?php if ($PlayerProCareerSeason && $PlayerProCareerSeason->numColumns() > 0): ?>
                <div class="border-top border-bottom mb-4">
                    <h4 class="text-center mt-3 mb-3" style="color: #007bff !important;">Pro League - Season by Season</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Season</th>
                                    <th>Year</th>
                                    <th>Team</th>
                                    <th>GP</th>
                                    <th>Goals</th>
                                    <th>Assists</th>
                                    <th>Points</th>
                                    <th>+/-</th>
                                    <th>PIM</th>
                                    <th>PPG</th>
                                    <th>Shots</th>
                                    <th>Block Shots</th>
                                    <th>Hits</th>
                                    <th>Giveaway</th>
                                    <th>Takeaway</th>
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
                                <?php while ($season = $PlayerProCareerSeason->fetchArray()): ?>
                                    <?php 
                                    $teamName = $season['TeamName'] ?? '';
                                    $teamLogo = $teamLogoMapping[$teamName] ?? null;
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
                                        <td><?php echo $season['G'] ?? 0; ?></td>
                                        <td><?php echo $season['A'] ?? 0; ?></td>
                                        <td><strong><?php echo $season['P'] ?? 0; ?></strong></td>
                                        <td><?php echo $season['PlusMinus'] ?? 0; ?></td>
                                        <td><?php echo $season['Pim'] ?? 0; ?></td>
                                        <td><?php echo $season['PPG'] ?? 0; ?></td>
                                        <td><?php echo $season['Shots'] ?? 0; ?></td>
                                        <td><?php echo $season['ShotsBlock'] ?? 0; ?></td>
                                        <td><?php echo $season['Hits'] ?? 0; ?></td>
                                        <td><?php echo $season['GiveAway'] ?? 0; ?></td>
                                        <td><?php echo $season['TakeAway'] ?? 0; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Pro Career Playoff Stats -->
            <?php if ($PlayerProCareerPlayoff && $PlayerProCareerPlayoff->numColumns() > 0): ?>
                <div class="border-top border-bottom mb-4">
                    <h4 class="text-center mt-3 mb-3" style="color: #dc3545 !important;">Pro League - Playoff Statistics</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Season</th>
                                    <th>Year</th>
                                    <th>Team</th>
                                    <th>GP</th>
                                    <th>Goals</th>
                                    <th>Assists</th>
                                    <th>Points</th>
                                    <th>+/-</th>
                                    <th>PIM</th>
                                    <th>PPG</th>
                                    <th>Shots</th>
                                    <th>Block Shots</th>
                                    <th>Hits</th>
                                    <th>Giveaway</th>
                                    <th>Takeaway</th>
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
                                <?php while ($playoff = $PlayerProCareerPlayoff->fetchArray()): ?>
                                    <?php 
                                    $teamName = $playoff['TeamName'] ?? '';
                                    $teamLogo = $teamLogoMapping[$teamName] ?? null;
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
                                        <td><?php echo $playoff['G'] ?? 0; ?></td>
                                        <td><?php echo $playoff['A'] ?? 0; ?></td>
                                        <td><strong><?php echo $playoff['P'] ?? 0; ?></strong></td>
                                        <td><?php echo $playoff['PlusMinus'] ?? 0; ?></td>
                                        <td><?php echo $playoff['Pim'] ?? 0; ?></td>
                                        <td><?php echo $playoff['PPG'] ?? 0; ?></td>
                                        <td><?php echo $playoff['Shots'] ?? 0; ?></td>
                                        <td><?php echo $playoff['ShotsBlock'] ?? 0; ?></td>
                                        <td><?php echo $playoff['Hits'] ?? 0; ?></td>
                                        <td><?php echo $playoff['GiveAway'] ?? 0; ?></td>
                                        <td><?php echo $playoff['TakeAway'] ?? 0; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Farm Career Stats (if available) -->
            <?php if ($PlayerFarmCareerSeason && $PlayerFarmCareerSeason->numColumns() > 0): ?>
                <div class="border-top border-bottom mb-4">
                    <h4 class="text-center mt-3 mb-3" style="color: #ffc107 !important;">Farm League - Career Statistics</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Season</th>
                                    <th>Year</th>
                                    <th>Team</th>
                                    <th>GP</th>
                                    <th>Goals</th>
                                    <th>Assists</th>
                                    <th>Points</th>
                                    <th>+/-</th>
                                    <th>PIM</th>
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
                                <?php while ($farmSeason = $PlayerFarmCareerSeason->fetchArray()): ?>
                                    <?php 
                                    $teamName = $farmSeason['TeamName'] ?? '';
                                    $teamLogo = $teamLogoMapping[$teamName] ?? null;
                                    ?>
                                    <tr>
                                        <td><strong><?php echo $farmSeason['Season']; ?></strong></td>
                                        <td><?php echo $farmSeason['Year'] ?? 'N/A'; ?></td>
                                        <td>
                                            <?php if ($teamLogo): ?>
                                                <img src="<?php echo $ImagesCDNPath . '/images/' . $teamLogo; ?>" 
                                                     alt="<?php echo $teamName; ?>" 
                                                     style="width: 30px; height: 30px;">
                                            <?php else: ?>
                                                <?php echo $teamName ?: 'N/A'; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $farmSeason['GP'] ?? 0; ?></td>
                                        <td><?php echo $farmSeason['G'] ?? 0; ?></td>
                                        <td><?php echo $farmSeason['A'] ?? 0; ?></td>
                                        <td><strong><?php echo $farmSeason['P'] ?? 0; ?></strong></td>
                                        <td><?php echo $farmSeason['PlusMinus'] ?? 0; ?></td>
                                        <td><?php echo $farmSeason['Pim'] ?? 0; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

</div>


</div>

<?php include "Footer.php";?>

<style>
.actionShots {
    margin-right: 0;
}

  /* Action Shots Container */
.playerReportActionShots {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: white;
    padding: 0;
    border-radius: 10px;
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
}

/* Player Info Overlay */
.playerInfoOverlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.9);
    padding-top: 50px;
    border-radius: 10px;
    color: white;
    z-index: 10;
    width: 100%;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.7);
}

.table thead th {
    text-align: center;
}

/* General Section Styling */
.playerReportMainContainer {
    background-color: black;
    padding: 20px;
}

/* Player Profile Section */
.player-profile {
    flex-wrap: wrap;
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
    color: gray;
    font-size: 16px;
}

/* Team Logo Styling */
.playerReportTeamLogo {
    width: 225px;
    height: 225px;
    padding: 5px;
}

/* Dropdown Menu Styling */
.dropdown-menu {
    z-index: 9999 !important;
    position: absolute !important;
    background-color: white !important;
    border: 1px solid rgba(0,0,0,.15) !important;
    border-radius: 0.375rem !important;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175) !important;
    min-width: 200px !important;
    max-height: 300px !important;
    overflow-y: auto !important;
}

.dropdown-menu.show {
    display: block !important;
}

.dropdown-item {
    color: #212529 !important;
    background-color: transparent !important;
    border: 0 !important;
    padding: 0.25rem 1rem !important;
    text-decoration: none !important;
    display: block !important;
    width: 100% !important;
    clear: both !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    white-space: nowrap !important;
}

.dropdown-item:hover {
    color: #1e2125 !important;
    background-color: #e9ecef !important;
    text-decoration: none !important;
}

.dropdown-item:focus {
    color: #1e2125 !important;
    background-color: #e9ecef !important;
    text-decoration: none !important;
}

/* S'assurer que le conteneur dropdown est visible */
.dropdown {
    position: relative !important;
    display: inline-block !important;
}

/* Career Statistics Styling */
.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.1) !important;
}

.table-responsive {
    border-radius: 8px;
    overflow: hidden;
}

/* Centrer les logos d'équipes dans les cellules */
.table td img[src*="images/"] {
    display: block !important;
    margin: 0 auto !important;
    text-align: center !important;
}

/* S'assurer que les cellules contenant des logos sont centrées */
.table td:has(img[src*="images/"]) {
    text-align: center !important;
}

/* Centrage spécifique pour les images de logos d'équipes */
.table td img[src*=".png"] {
    display: block !important;
    margin-left: auto !important;
    margin-right: auto !important;
    margin-top: 0 !important;
    margin-bottom: 0 !important;
}

/* Forcer le centrage des cellules contenant des images PNG */
.table td:has(img[src*=".png"]) {
    text-align: center !important;
    vertical-align: middle !important;
}

/* Centrage direct pour toutes les cellules TD contenant des images */
.table tbody td {
    text-align: center !important;
}

/* S'assurer que les images sont centrées dans leurs conteneurs */
.table tbody td img {
    display: inline-block !important;
    margin: 0 auto !important;
}

/* Centrer toutes les images dans les cellules du tableau */
.table td img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 0;
    margin-bottom: 0;
    /* Optionnel : pour centrer verticalement si la cellule est haute */
    vertical-align: middle;
}
.table td {
    text-align: center;
    vertical-align: middle;
}
</style>

</body>
</html>
