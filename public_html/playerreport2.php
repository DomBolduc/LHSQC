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
		
		$Query = "SELECT count(*) AS count FROM PlayerProStatMultipleTeam WHERE Number = " . $Player;
		$Result = $db->querySingle($Query,true);
		If ($Result['count'] > 0){$PlayerProStatMultipleTeamFound = TRUE;}
		
		$Query = "SELECT count(*) AS count FROM PlayerFarmStatMultipleTeam WHERE Number = " . $Player;
		$Result = $db->querySingle($Query,true);
		If ($Result['count'] > 0){$PlayerFarmStatMultipleTeamFound = TRUE;}
		
		If ($PlayerInfo['Team'] > 0){
			$Query = "SELECT MainTable.* FROM (SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.TeamName, PlayerInfo.URLLink, PlayerInfo.NHLID, 'False' AS PosG FROM PlayerInfo WHERE Team = " . $PlayerInfo['Team'] . " UNION ALL SELECT GoalerInfo.Number, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.TeamName, GoalerInfo.URLLink, GoalerInfo.NHLID, 'True' AS PosG FROM GoalerInfo WHERE Team = " . $PlayerInfo['Team'] . ") AS MainTable ORDER BY Name";
			$TeamPlayers = $db->query($Query);
		}
		If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS Normal Query PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
								
		$LeagueName = $LeagueGeneral['Name'];
		$PlayerName = $PlayerInfo['Name'];	
		If (file_exists($CareerStatDatabaseFile) == true){ /* CareerStat */
			$CareerStatdb = new SQLite3($CareerStatDatabaseFile);
			
			$CareerDBFormatV2CheckCheck = $CareerStatdb->querySingle("SELECT Count(name) AS CountName FROM sqlite_master WHERE type='table' AND name='LeagueGeneral'",true);
			If ($CareerDBFormatV2CheckCheck['CountName'] == 1){
				
				include "APIFunction.php";
				
				$PlayerProCareerSeason = APIPost(array('PlayerStatProHistoryAllSeasonPerYear' => '', 'UniqueID' => $PlayerInfo['UniqueID']));
				If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS ProCareerSeason Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
				$PlayerProCareerPlayoff = APIPost(array('PlayerStatProHistoryAllSeasonPerYear' => '', 'UniqueID' => $PlayerInfo['UniqueID'], 'Playoff' => ''));
				If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS ProCareerPlayoff Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
				$PlayerProCareerSumSeasonOnly = APIPost(array('PlayerStatProHistoryAllSeasonMerge' => '', 'UniqueID' => $PlayerInfo['UniqueID']));
				If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS ProCareerSumSeasonOnly Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
				$PlayerProCareerSumPlayoffOnly = APIPost(array('PlayerStatProHistoryAllSeasonMerge' => '', 'UniqueID' => $PlayerInfo['UniqueID'], 'Playoff' => ''));
				If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS ProCareerSumPlayoffOnly Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
				
				$PlayerFarmCareerSeason = APIPost(array('PlayerStatFarmHistoryAllSeasonPerYear' => '', 'UniqueID' => $PlayerInfo['UniqueID']));
				If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS FarmCareerSeason  Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
				$PlayerFarmCareerPlayoff = APIPost(array('PlayerStatFarmHistoryAllSeasonPerYear' => '', 'UniqueID' => $PlayerInfo['UniqueID'], 'Playoff' => ''));
				If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS FarmCareerPlayoff Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
				$PlayerFarmCareerSumSeasonOnly = APIPost(array('PlayerStatFarmHistoryAllSeasonMerge' => '', 'UniqueID' => $PlayerInfo['UniqueID']));
				If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS FarmCareerSumSeasonOnly Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
				$PlayerFarmCareerSumPlayoffOnly = APIPost(array('PlayerStatFarmHistoryAllSeasonMerge' => '', 'UniqueID' => $PlayerInfo['UniqueID'], 'Playoff' => ''));		
				If (isset($PerformanceMonitorStart)){echo "<script>console.log(\"STHS FarmCareerSumPlayoffOnly Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . "\"); </script>";}
				
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
                                <a class="dropdown-item" href="<?php echo ($row['PosG'] === 'True') ? 'GoalieReport.php?Goalie=' . $row['Number'] : 'playerreport2.php?Player=' . $row['Number']; ?>">
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
        
<div class="container-fluid p-0 ">
        <!-- Pro Stats -->
        <div class="col-md-12 ">
           
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


    <!-- Player Statistics Section -->
    <div class="container-fluid p-0 ">
        <!-- Pro Stats -->
        <div class="col-md-12 border-top border-bottom ">
           
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
    background: rgba(0, 0, 0, 0.8); /* Semi-transparent black background */
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
