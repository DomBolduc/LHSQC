<?php include "Header.php"; ?>

<!-- CSS moderne et épuré pour FarmTeam -->
<link href="css/proteam-modern.css" rel="stylesheet" type="text/css">

<?php
// Configuration de la base de données
$DatabaseFile = "LHSQC-STHS.db";

// Fonction pour convertir le code pays en drapeau emoji
function getCountryFlag($countryCode) {
    return $countryCode ?: '-';
}

// Récupération des paramètres
$Team = (integer)0;
if(isset($_GET['Team'])){$Team = filter_var($_GET['Team'], FILTER_SANITIZE_NUMBER_INT);} 
if($CookieTeamNumber > 0 AND $CookieTeamNumber <= 100 AND $Team == 0){$Team = $CookieTeamNumber;}

// Inclusion des fichiers de langue
If ($lang == "fr"){include 'LanguageFR-League.php';}else{include 'LanguageEN-League.php';}
If ($lang == "fr"){include 'LanguageFR-Main.php';}else{include 'LanguageEN-Main.php';}
If ($lang == "fr"){include 'LanguageFR-Stat.php';}else{include 'LanguageEN-Stat.php';}

try {
    if (file_exists($DatabaseFile) == false){
	$Team = 0;
	$TeamName = $DatabaseNotFound;
    } else {
	$db = new SQLite3($DatabaseFile);

        // Récupération des informations générales de la ligue
	$Query = "Select Name FROM LeagueGeneral";
        $LeagueGeneral = $db->querySingle($Query, true);		
	$LeagueName = $LeagueGeneral['Name'];	

        // Vérification de l'équipe
        if($Team == 0 AND $CookieTeamNumber > 0 AND $CookieTeamNumber <= 100){$Team = $CookieTeamNumber;}
        if ($Team == 0 OR $Team > 100){
            throw new Exception("Équipe invalide");
        }

	$Query = "SELECT count(*) AS count FROM TeamFarmInfo WHERE Number = " . $Team;
        $Result = $db->querySingle($Query, true);
        
        if ($Result['count'] == 1){
            // Récupération des informations de l'équipe farm
		$Query = "SELECT * FROM TeamFarmInfo WHERE Number = " . $Team;
            $TeamInfo = $db->querySingle($Query, true);

            // Récupération des statistiques de l'équipe farm
            $Query = "SELECT * FROM TeamFarmStat WHERE Number = " . $Team;
            $TeamStat = $db->querySingle($Query, true);

            // Récupération des informations financières farm
		$Query = "SELECT * FROM TeamFarmFinance WHERE Number = " . $Team;
            $TeamFinance = $db->querySingle($Query, true);
            
            // Récupération des leaders farm (Status1 <= 1 pour les joueurs farm)
            $Query = "SELECT PlayerFarmStat.*, PlayerInfo.Name, PlayerInfo.NHLID, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerFarmStat.G AS REAL) / (PlayerFarmStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerFarmStat.SecondPlay AS REAL) / 60 / (PlayerFarmStat.GP)),2) AS AMG, ROUND((CAST(PlayerFarmStat.FaceOffWon AS REAL) / (PlayerFarmStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerFarmStat.P AS REAL) / (PlayerFarmStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerFarmStat ON PlayerInfo.Number = PlayerFarmStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 <= 1) AND (PlayerFarmStat.GP>0)) ORDER BY PlayerFarmStat.P DESC, PlayerFarmStat.GP ASC LIMIT 1";
            $TeamLeaderP = $db->querySingle($Query, true);
            
            // Récupération du leader en buts farm
            $Query = "SELECT PlayerFarmStat.*, PlayerInfo.Name, PlayerInfo.NHLID, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerFarmStat.G AS REAL) / (PlayerFarmStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerFarmStat.SecondPlay AS REAL) / 60 / (PlayerFarmStat.GP)),2) AS AMG, ROUND((CAST(PlayerFarmStat.FaceOffWon AS REAL) / (PlayerFarmStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerFarmStat.P AS REAL) / (PlayerFarmStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerFarmStat ON PlayerInfo.Number = PlayerFarmStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 <= 1) AND (PlayerFarmStat.GP>0)) ORDER BY PlayerFarmStat.G DESC, PlayerFarmStat.GP ASC, PlayerFarmStat.P DESC LIMIT 1";
            $TeamLeaderG = $db->querySingle($Query, true);
            
            // Récupération du leader en passes farm
            $Query = "SELECT PlayerFarmStat.*, PlayerInfo.Name, PlayerInfo.NHLID, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerFarmStat.G AS REAL) / (PlayerFarmStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerFarmStat.SecondPlay AS REAL) / 60 / (PlayerFarmStat.GP)),2) AS AMG, ROUND((CAST(PlayerFarmStat.FaceOffWon AS REAL) / (PlayerFarmStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerFarmStat.P AS REAL) / (PlayerFarmStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerFarmStat ON PlayerInfo.Number = PlayerFarmStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 <= 1) AND (PlayerFarmStat.GP>0)) ORDER BY PlayerFarmStat.A DESC, PlayerFarmStat.P DESC, PlayerFarmStat.GP ASC LIMIT 1";
            $TeamLeaderA = $db->querySingle($Query, true);
            
            // Récupération du leader gardien farm
            $Query = "SELECT GoalerFarmStat.*, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.Jersey, GoalerInfo.NHLID, ROUND((CAST(GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SecondPlay / 60))*60,2) AS GAA, ROUND((CAST(GoalerFarmStat.SA - GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SA)),3) AS PCT, ROUND((CAST(GoalerFarmStat.PenalityShotsShots - GoalerFarmStat.PenalityShotsGoals AS REAL) / (GoalerFarmStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerInfo INNER JOIN GoalerFarmStat ON GoalerInfo.Number = GoalerFarmStat.Number WHERE ((GoalerInfo.Team)=" . $Team . ") AND ((GoalerFarmStat.GP)>0) ORDER BY W DESC, GoalerFarmStat.GP DESC LIMIT 1";
            $TeamLeaderW = $db->querySingle($Query, true);
            
            // Récupération du roster complet des joueurs farm (Status1 <= 1)
            $Query = "SELECT PlayerFarmStat.*, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, PlayerInfo.Jersey, PlayerInfo.Age, PlayerInfo.Height, PlayerInfo.Weight, ROUND((CAST(PlayerFarmStat.G AS REAL) / (PlayerFarmStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerFarmStat.SecondPlay AS REAL) / 60 / (PlayerFarmStat.GP)),2) AS AMG, ROUND((CAST(PlayerFarmStat.FaceOffWon AS REAL) / (PlayerFarmStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerFarmStat.P AS REAL) / (PlayerFarmStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerFarmStat ON PlayerInfo.Number = PlayerFarmStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 <= 1) AND (PlayerFarmStat.GP>0)) ORDER BY PlayerFarmStat.P DESC, PlayerFarmStat.GP ASC";
		$PlayerRoster = $db->query($Query);

            // Récupération du roster des gardiens farm
            $Query = "SELECT GoalerFarmStat.*, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.Jersey, GoalerInfo.NHLID, GoalerInfo.Age, GoalerInfo.Height, GoalerInfo.Weight, ROUND((CAST(GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SecondPlay / 60))*60,2) AS GAA, ROUND((CAST(GoalerFarmStat.SA - GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SA)),3) AS PCT, ROUND((CAST(GoalerFarmStat.PenalityShotsShots - GoalerFarmStat.PenalityShotsGoals AS REAL) / (GoalerFarmStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerInfo INNER JOIN GoalerFarmStat ON GoalerInfo.Number = GoalerFarmStat.Number WHERE ((GoalerInfo.Team)=" . $Team . ") AND ((GoalerFarmStat.GP)>0) ORDER BY W DESC, GoalerFarmStat.GP DESC";
		$GoalieRoster = $db->query($Query);

            // Récupération des informations du coach farm
		$Query = "SELECT CoachInfo.* FROM CoachInfo INNER JOIN TeamFarmInfo ON CoachInfo.Number = TeamFarmInfo.CoachID WHERE (CoachInfo.Team)=" . $Team;
            $CoachInfo = $db->querySingle($Query, true);
            
            // Récupération des capitaines farm
		$Query = "SELECT TeamFarmInfo.Name as TeamName, PlayerInfo_1.Name As Captain, PlayerInfo_2.Name as Assistant1, PlayerInfo_3.Name as Assistant2 FROM ((TeamFarmInfo LEFT JOIN PlayerInfo AS PlayerInfo_1 ON TeamFarmInfo.Captain = PlayerInfo_1.Number) LEFT JOIN PlayerInfo AS PlayerInfo_2 ON TeamFarmInfo.Assistant1 = PlayerInfo_2.Number) LEFT JOIN PlayerInfo AS PlayerInfo_3 ON TeamFarmInfo.Assistant2 = PlayerInfo_3.Number WHERE TeamFarmInfo.Number = " . $Team;
            $TeamLeader = $db->querySingle($Query, true);

            // Récupération du TeamThemeID de l'équipe Pro correspondante pour le bouton
            $Query = "SELECT TeamThemeID FROM TeamProInfo WHERE Number = " . $Team;
            $ProTeamTheme = $db->querySingle($Query, true);
            
            // Récupération des prospects (même que ProTeam2.php)
            $Query = "SELECT ProspectInfo.*, ProspectStat.* FROM ProspectInfo INNER JOIN ProspectStat ON ProspectInfo.Number = ProspectStat.Number WHERE ProspectInfo.Team = " . $Team . " ORDER BY ProspectStat.P DESC LIMIT 10";
            $Prospects = $db->query($Query);
            
            // Récupération des moyennes de la ligue farm pour le graphique
            $Query = "SELECT 
                AVG(CAST(GF AS REAL) / CAST(GP AS REAL)) as AvgGFPerGame,
                AVG(CAST(GA AS REAL) / CAST(GP AS REAL)) as AvgGAPerGame,
                AVG(CAST(ShotsFor AS REAL) / CAST(GP AS REAL)) as AvgShotsForPerGame,
                AVG(CAST(ShotsAga AS REAL) / CAST(GP AS REAL)) as AvgShotsAgaPerGame,
                AVG(CASE WHEN PPAttemp > 0 THEN CAST(PPGoal AS REAL) / CAST(PPAttemp AS REAL) * 100 ELSE 0 END) as AvgPPPercentage,
                AVG(CASE WHEN PKAttemp > 0 THEN (CAST(PKAttemp AS REAL) - CAST(PKGoalGA AS REAL)) / CAST(PKAttemp AS REAL) * 100 ELSE 0 END) as AvgPKPercentage,
                AVG(CAST(Pim AS REAL) / CAST(GP AS REAL)) as AvgPimPerGame,
                AVG(CAST(Hits AS REAL) / CAST(GP AS REAL)) as AvgHitsPerGame
                FROM TeamFarmStat WHERE GP > 0";
            $LeagueAverages = $db->querySingle($Query, true);
            
            // Récupération des valeurs maximales de la ligue farm pour normaliser les barres
            $Query = "SELECT
                MAX(CAST(GF AS REAL) / CAST(GP AS REAL)) as MaxGFPerGame,
                MAX(CAST(GA AS REAL) / CAST(GP AS REAL)) as MaxGAPerGame,
                MAX(CAST(ShotsFor AS REAL) / CAST(GP AS REAL)) as MaxShotsForPerGame,
                MAX(CAST(ShotsAga AS REAL) / CAST(GP AS REAL)) as MaxShotsAgaPerGame,
                MAX(CASE WHEN PPAttemp > 0 THEN CAST(PPGoal AS REAL) / CAST(PPAttemp AS REAL) * 100 ELSE 0 END) as MaxPPPercentage,
                MAX(CASE WHEN PKAttemp > 0 THEN (CAST(PKAttemp AS REAL) - CAST(PKGoalGA AS REAL)) / CAST(PKAttemp AS REAL) * 100 ELSE 0 END) as MaxPKPercentage,
                MAX(CAST(Pim AS REAL) / CAST(GP AS REAL)) as MaxPimPerGame,
                MAX(CAST(Hits AS REAL) / CAST(GP AS REAL)) as MaxHitsPerGame
                FROM TeamFarmStat WHERE GP > 0";
            $LeagueMax = $db->querySingle($Query, true);

            // Récupération des noms des équipes farm avec les meilleures performances
            $Query = "SELECT TeamFarmInfo.Name as TeamName,
                CAST(TeamFarmStat.GF AS REAL) / CAST(TeamFarmStat.GP AS REAL) as GFPerGame
                FROM TeamFarmStat
                INNER JOIN TeamFarmInfo ON TeamFarmStat.Number = TeamFarmInfo.Number
                WHERE TeamFarmStat.GP > 0
                ORDER BY GFPerGame DESC LIMIT 1";
            $BestGFTeam = $db->querySingle($Query, true);

            $Query = "SELECT TeamFarmInfo.Name as TeamName,
                CAST(TeamFarmStat.GA AS REAL) / CAST(TeamFarmStat.GP AS REAL) as GAPerGame
                FROM TeamFarmStat
                INNER JOIN TeamFarmInfo ON TeamFarmStat.Number = TeamFarmInfo.Number
                WHERE TeamFarmStat.GP > 0
                ORDER BY GAPerGame DESC LIMIT 1";
            $BestGATeam = $db->querySingle($Query, true);

            $Query = "SELECT TeamFarmInfo.Name as TeamName,
                CAST(TeamFarmStat.ShotsFor AS REAL) / CAST(TeamFarmStat.GP AS REAL) as ShotsForPerGame
                FROM TeamFarmStat
                INNER JOIN TeamFarmInfo ON TeamFarmStat.Number = TeamFarmInfo.Number
                WHERE TeamFarmStat.GP > 0
                ORDER BY ShotsForPerGame DESC LIMIT 1";
            $BestShotsForTeam = $db->querySingle($Query, true);

            $Query = "SELECT TeamFarmInfo.Name as TeamName,
                CASE WHEN TeamFarmStat.PPAttemp > 0 THEN CAST(TeamFarmStat.PPGoal AS REAL) / CAST(TeamFarmStat.PPAttemp AS REAL) * 100 ELSE 0 END as PPPercentage
                FROM TeamFarmStat
                INNER JOIN TeamFarmInfo ON TeamFarmStat.Number = TeamFarmInfo.Number
                WHERE TeamFarmStat.GP > 0
                ORDER BY PPPercentage DESC LIMIT 1";
            $BestPPTeam = $db->querySingle($Query, true);

            $Query = "SELECT TeamFarmInfo.Name as TeamName,
                CASE WHEN TeamFarmStat.PKAttemp > 0 THEN (CAST(TeamFarmStat.PKAttemp AS REAL) - CAST(TeamFarmStat.PKGoalGA AS REAL)) / CAST(TeamFarmStat.PKAttemp AS REAL) * 100 ELSE 0 END as PKPercentage
                FROM TeamFarmStat
                INNER JOIN TeamFarmInfo ON TeamFarmStat.Number = TeamFarmInfo.Number
                WHERE TeamFarmStat.GP > 0
                ORDER BY PKPercentage DESC LIMIT 1";
            $BestPKTeam = $db->querySingle($Query, true);

            $Query = "SELECT TeamFarmInfo.Name as TeamName,
                CAST(TeamFarmStat.Hits AS REAL) / CAST(TeamFarmStat.GP AS REAL) as HitsPerGame
                FROM TeamFarmStat
                INNER JOIN TeamFarmInfo ON TeamFarmStat.Number = TeamFarmInfo.Number
                WHERE TeamFarmStat.GP > 0
                ORDER BY HitsPerGame DESC LIMIT 1";
            $BestHitsTeam = $db->querySingle($Query, true);

            // Calcul des statistiques de l'équipe farm pour le graphique
            $TeamGraphStats = array();
            if ($TeamStat['GP'] > 0) {
                $TeamGraphStats['GFPerGame'] = round($TeamStat['GF'] / $TeamStat['GP'], 2);
                $TeamGraphStats['GAPerGame'] = round($TeamStat['GA'] / $TeamStat['GP'], 2);
                $TeamGraphStats['ShotsForPerGame'] = round($TeamStat['ShotsFor'] / $TeamStat['GP'], 1);
                $TeamGraphStats['ShotsAgaPerGame'] = round($TeamStat['ShotsAga'] / $TeamStat['GP'], 1);
                $TeamGraphStats['PPPercentage'] = $TeamStat['PPAttemp'] > 0 ? round(($TeamStat['PPGoal'] / $TeamStat['PPAttemp']) * 100, 1) : 0;
                $TeamGraphStats['PKPercentage'] = $TeamStat['PKAttemp'] > 0 ? round((($TeamStat['PKAttemp'] - $TeamStat['PKGoalGA']) / $TeamStat['PKAttemp']) * 100, 1) : 0;
                $TeamGraphStats['PimPerGame'] = round($TeamStat['Pim'] / $TeamStat['GP'], 1);
                $TeamGraphStats['HitsPerGame'] = round($TeamStat['Hits'] / $TeamStat['GP'], 1);
            }

            // Requêtes pour ScheduleFarm
            $Query = "SELECT * FROM ScheduleFarm WHERE Play = 'True' AND (VisitorTeam = " . $Team . " OR HomeTeam = " . $Team . ") ORDER BY GameNumber DESC LIMIT 2";
            $Last3Days = $db->query($Query);
            
            $Query = "SELECT * FROM ScheduleFarm WHERE Play = 'False' AND (VisitorTeam = " . $Team . " OR HomeTeam = " . $Team . ") ORDER BY GameNumber ASC LIMIT 3";
            $Next4Days = $db->query($Query);
            
            // Récupération des transactions récentes (même que ProTeam2.php)
            $Query = "SELECT * FROM Transaction WHERE (Team1 = " . $Team . " OR Team2 = " . $Team . ") ORDER BY Date DESC LIMIT 10";
            $Transactions = $db->query($Query);
            
            // Récupération des blessures farm
            $Query = "SELECT PlayerInfo.Name, PlayerInfo.Jersey, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, PlayerInfo.InjuryStatus, PlayerInfo.InjuryLength FROM PlayerInfo WHERE PlayerInfo.Team = " . $Team . " AND PlayerInfo.Status1 <= 1 AND PlayerInfo.InjuryStatus > 0 ORDER BY PlayerInfo.InjuryLength DESC";
            $Injuries = $db->query($Query);

		$TeamName = $TeamInfo['Name'];	
        } else {
            throw new Exception("Équipe farm non trouvée");
        }
    }
} catch (Exception $e) {
	$Team = 0;
    $TeamName = "Équipe farm non trouvée";
    $TeamInfo = null;
    $TeamStat = null;
    $TeamFinance = null;
    $TeamLeaderP = null;
    $TeamLeaderG = null;
    $TeamLeaderA = null;
    $TeamLeaderW = null;
    $PlayerRoster = null;
    $GoalieRoster = null;
    $CoachInfo = null;
    $TeamLeader = null;
    $Prospects = null;
    $LastGames = null;
    $NextGames = null;
    $Transactions = null;
    $Injuries = null;
}

echo "<title>" . $LeagueName . " - " . $TeamName . " (Farm)</title>";
?>

<body>

<header>
<?php include "components/GamesScroller.php"; ?>	 
<?php include "Menu.php"; ?>	
    <div class="container p-2">  

<!-- Header moderne de l'équipe farm avec logo -->
<div id="STHSPHPTeamStat_SubHeader">
    <table class="STHSPHPTeamHeader_Table">
        <tr>
            <td rowspan="2" class="STHSPHPTeamHeader_Logo">
                <?php if ($TeamInfo['TeamThemeID'] > 0): ?>
                    <img src="<?php echo $ImagesCDNPath; ?>/images/<?php echo $TeamInfo['TeamThemeID']; ?>.png" 
                         alt="<?php echo $TeamName; ?>" 
                         class="STHSPHPTeamStatImage">
                <?php else: ?>
                    <div class="team-logo-placeholder">
                        <span><?php echo substr($TeamName, 0, 2); ?></span>
                    </div>
                <?php endif; ?>
            </td>
            <td class="STHSPHPTeamHeader_TeamName"> 
                <?php echo $TeamName; ?>
                <?php if (!empty($TeamInfo['City'])): ?>
                    <?php echo htmlspecialchars($TeamInfo['City']); ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td class="STHSPHPTeamHeader_Stat">
                GP: <?php echo $TeamStat['GP'] ?? 0; ?> | 
                W: <?php echo ($TeamStat['W'] ?? 0) + ($TeamStat['OTW'] ?? 0) + ($TeamStat['SOW'] ?? 0); ?> | 
                L: <?php echo $TeamStat['L'] ?? 0; ?> | 
                OTL: <?php echo ($TeamStat['OTL'] ?? 0) + ($TeamStat['SOL'] ?? 0); ?> | 
                P: <?php echo $TeamStat['Points'] ?? 0; ?>
                
                <!-- Logo Pro Team cliquable -->
                <?php if ($ProTeamTheme && $ProTeamTheme['TeamThemeID'] > 0): ?>
                    <a href="ProTeam.php?Team=<?php echo $Team; ?>" class="pro-team-logo-btn"
                       style="display: inline-block; margin-left: 15px; padding: 4px; background: #f8f9fa; border: 2px solid #007bff; border-radius: 50%; transition: all 0.3s ease; text-decoration: none; vertical-align: middle;"
                       title="Pro Team"
                       onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 4px 8px rgba(0, 123, 255, 0.3)';"
                       onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                        <img src="images/<?php echo $ProTeamTheme['TeamThemeID']; ?>.png"
                             alt="Pro Team"
                             style="width: 32px; height: 32px; object-fit: contain; display: block;">
                    </a>
                <?php else: ?>
                    <!-- Fallback si pas de logo pro -->
                    <a href="ProTeam.php?Team=<?php echo $Team; ?>" class="pro-team-btn" style="display: inline-block; margin-left: 15px; padding: 6px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; font-size: 12px; font-weight: bold; transition: background-color 0.3s; vertical-align: middle;">
                        <i class="fa fa-star" style="margin-right: 5px;"></i>Pro Team
                    </a>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>

<div class="container-flex">

<div class="STHSPHPTeamStat_Main">
<br />
<div class="tabsmain standard">
    <ul class="tabmain-links">
        <li class="activemain"><a href="#tabmain0">Home</a></li>
        <li><a href="#tabmain1">Roster</a></li>
        <li><a href="#tabmain2">Stats</a></li>
        <li><a href="#tabmain3">Schedule</a></li>
        <li><a href="#tabmain4">Lines</a></li>
        <li><a href="#tabmain5">Capology</a></li>
    </ul>

    <div class="cardbook">
                <div class="tabmain active" id="tabmain0">
            
            <!-- Grille de statistiques -->
            <div class="stats-grid">
                <!-- Weekly Schedule dans la grille -->
                <div class="stat-card weekly-schedule-in-grid">
                <h3>Weekly Schedule</h3>
                    <div class="schedule-days-compact">
<?php 
                        // Afficher d'abord les 3 derniers matchs joués
                            if ($Last3Days) {
                                while ($Game = $Last3Days->fetchArray()) {
                                $HomeTeam = $Game['HomeTeam'];
                                $VisitorTeam = $Game['VisitorTeam'];
                                    $HomeScore = $Game['HomeScore'];
                                $VisitorScore = $Game['VisitorScore'];
                                $GameNumber = $Game['GameNumber'];
                                $IsOvertime = ($Game['Overtime'] ?? '') == 'True';
                                $IsShootout = ($Game['Shootout'] ?? '') == 'True';
                                
                                // Récupérer les noms d'équipes depuis TeamFarmInfo
                                $Query = "SELECT Name, TeamThemeID FROM TeamFarmInfo WHERE Number = " . $HomeTeam;
                                $HomeTeamInfo = $db->querySingle($Query, true);
                                $Query = "SELECT Name, TeamThemeID FROM TeamFarmInfo WHERE Number = " . $VisitorTeam;
                                $VisitorTeamInfo = $db->querySingle($Query, true);
                                
                                $HomeTeamName = $HomeTeamInfo['Name'] ?? 'Team ' . $HomeTeam;
                                $VisitorTeamName = $VisitorTeamInfo['Name'] ?? 'Team ' . $VisitorTeam;
                                $HomeTeamThemeID = $HomeTeamInfo['TeamThemeID'] ?? null;
                                $VisitorTeamThemeID = $VisitorTeamInfo['TeamThemeID'] ?? null;
                                    
                                    $isHome = ($HomeTeam == $Team);
                                $isWin = ($isHome && $HomeScore > $VisitorScore) || (!$isHome && $VisitorScore > $HomeScore);
                                
                                echo "<div class='schedule-day-compact'>";
                                echo "<div class='game-date-compact'>Game " . $GameNumber . "</div>";
                                echo "<div class='game-matchup-compact " . ($isWin ? 'win' : 'loss') . "'>";
                                
                                // Équipe visiteuse
                                echo "<div class='team-info-compact'>";
                                if ($VisitorTeamThemeID && file_exists("images/" . $VisitorTeamThemeID . ".png")) {
                                    echo "<img src='images/" . $VisitorTeamThemeID . ".png' alt='" . $VisitorTeamName . "' class='team-logo-mini-compact'>";
                                }
                                echo "<span class='team-name-compact'>" . $VisitorTeamName . "</span>";
                                echo "<span class=" . ($isWin ? "'score-compact win'" : "'score-compact loss'") . ">" . $VisitorScore . "</span>";
                                    echo "</div>";
                                
                                // Équipe locale
                                echo "<div class='team-info-compact'>";
                                if ($HomeTeamThemeID && file_exists("images/" . $HomeTeamThemeID . ".png")) {
                                    echo "<img src='images/" . $HomeTeamThemeID . ".png' alt='" . $HomeTeamName . "' class='team-logo-mini-compact'>";
                                }
                                echo "<span class='team-name-compact'>" . $HomeTeamName . "</span>";
                                echo "<span class=" . ($isWin ? "'score-compact win'" : "'score-compact loss'") . ">" . $HomeScore . "</span>";
                                    echo "</div>";
                                
                                // Indicateurs OT/SO si disponibles
                                if ($IsShootout) {
                                    echo "<div class='game-type-compact'>SO</div>";
                                } elseif ($IsOvertime) {
                                    echo "<div class='game-type-compact'>OT</div>";
                                }
                                
                                    echo "</div>";
                                    echo "</div>";
                                }
                        }
                        
                        // Puis afficher les 4 prochains matchs
                            if ($Next4Days) {
                                while ($Game = $Next4Days->fetchArray()) {
                                $HomeTeam = $Game['HomeTeam'];
                                $VisitorTeam = $Game['VisitorTeam'];
                                $GameNumber = $Game['GameNumber'];
                                
                                // Récupérer les noms d'équipes depuis TeamFarmInfo
                                $Query = "SELECT Name, TeamThemeID FROM TeamFarmInfo WHERE Number = " . $HomeTeam;
                                $HomeTeamInfo = $db->querySingle($Query, true);
                                $Query = "SELECT Name, TeamThemeID FROM TeamFarmInfo WHERE Number = " . $VisitorTeam;
                                $VisitorTeamInfo = $db->querySingle($Query, true);
                                
                                $HomeTeamName = $HomeTeamInfo['Name'] ?? 'Team ' . $HomeTeam;
                                $VisitorTeamName = $VisitorTeamInfo['Name'] ?? 'Team ' . $VisitorTeam;
                                $HomeTeamThemeID = $HomeTeamInfo['TeamThemeID'] ?? null;
                                $VisitorTeamThemeID = $VisitorTeamInfo['TeamThemeID'] ?? null;
                                    
                                    $isHome = ($HomeTeam == $Team);
                                    
                                echo "<div class='schedule-day-compact'>";
                                echo "<div class='game-date-compact'>Game " . $GameNumber . "</div>";
                                echo "<div class='game-matchup-compact upcoming'>";
                                
                                // Équipe visiteuse
                                echo "<div class='team-info-compact'>";
                                if ($VisitorTeamThemeID && file_exists("images/" . $VisitorTeamThemeID . ".png")) {
                                    echo "<img src='images/" . $VisitorTeamThemeID . ".png' alt='" . $VisitorTeamName . "' class='team-logo-mini-compact'>";
                                }
                                echo "<span class='team-name-compact'>" . $VisitorTeamName . "</span>";
                                    echo "</div>";
                                
                                // Équipe locale
                                echo "<div class='team-info-compact'>";
                                if ($HomeTeamThemeID && file_exists("images/" . $HomeTeamThemeID . ".png")) {
                                    echo "<img src='images/" . $HomeTeamThemeID . ".png' alt='" . $HomeTeamName . "' class='team-logo-mini-compact'>";
                                }
                                echo "<span class='team-name-compact'>" . $HomeTeamName . "</span>";
                                    echo "</div>";
                                
                                    echo "</div>";
                                    echo "</div>";
                                }
                        }
                        
                        // Si aucun match trouvé
                        if (!$Last3Days && !$Next4Days) {
                            echo "<div class='no-games-compact'>No games found</div>";
                            }
                            ?>
                        </div>
                    </div>
                
                <!-- Section Team Leaders style Sportsnet -->
                <div class="stat-card team-leaders">
                    <h3>Team Leaders</h3>
                    <div class="leaders-grid">
                        
                        <!-- Points Leader -->
                        <div class="leader-card">
                            <?php if ($TeamLeaderP && !empty($TeamLeaderP['NHLID'])): ?>
                                <img src="https://assets.nhle.com/mugs/nhl/latest/<?php echo $TeamLeaderP['NHLID']; ?>.png" 
                                     alt="<?php echo $TeamLeaderP['Name']; ?>" 
                                     class="leader-image"
                                     onerror="this.src='/images/default.png'">
                            <?php else: ?>
                                <img src="/images/default.png" 
                                     alt="<?php echo $TeamLeaderP['Name'] ?? 'N/A'; ?>" 
                                     class="leader-image">
                            <?php endif; ?>
                            
                            <div class="leader-content">
                                <div class="leader-stat-label">Points Leader</div>
                                <div class="leader-player-name"><?php echo $TeamLeaderP['Name'] ?? 'N/A'; ?></div>
                                <div class="leader-position">
                                    <?php 
                                    if ($TeamLeaderP) {
                                        $position = "";
                                        if ($TeamLeaderP['PosC'] == "True") $position .= "C";
                                        if ($TeamLeaderP['PosLW'] == "True") $position .= ($position ? "/" : "") . "LW";
                                        if ($TeamLeaderP['PosRW'] == "True") $position .= ($position ? "/" : "") . "RW";
                                        if ($TeamLeaderP['PosD'] == "True") $position .= ($position ? "/" : "") . "D";
                                        echo $position;
                                    }
                                    ?>
                                </div>
                                <div class="leader-stat-number"><?php echo $TeamLeaderP['P'] ?? 0; ?></div>
                </div>
            </div>
            
                        <!-- Goals Leader -->
                        <div class="leader-card">
                            <?php if ($TeamLeaderG && !empty($TeamLeaderG['NHLID'])): ?>
                                <img src="https://assets.nhle.com/mugs/nhl/latest/<?php echo $TeamLeaderG['NHLID']; ?>.png" 
                                     alt="<?php echo $TeamLeaderG['Name']; ?>" 
                                     class="leader-image"
                                     onerror="this.src='/images/default.png'">
                            <?php else: ?>
                                <img src="/images/default.png" 
                                     alt="<?php echo $TeamLeaderG['Name'] ?? 'N/A'; ?>" 
                                     class="leader-image">
                            <?php endif; ?>
                            
                            <div class="leader-content">
                                <div class="leader-stat-label">Goals Leader</div>
                                <div class="leader-player-name"><?php echo $TeamLeaderG['Name'] ?? 'N/A'; ?></div>
                                <div class="leader-position">
                                    <?php 
                                    if ($TeamLeaderG) {
                                        $position = "";
                                        if ($TeamLeaderG['PosC'] == "True") $position .= "C";
                                        if ($TeamLeaderG['PosLW'] == "True") $position .= ($position ? "/" : "") . "LW";
                                        if ($TeamLeaderG['PosRW'] == "True") $position .= ($position ? "/" : "") . "RW";
                                        if ($TeamLeaderG['PosD'] == "True") $position .= ($position ? "/" : "") . "D";
                                        echo $position;
                                    }
                                    ?>
                                </div>
                                <div class="leader-stat-number"><?php echo $TeamLeaderG['G'] ?? 0; ?></div>
                            </div>
                        </div>

                        <!-- Assists Leader -->
                        <div class="leader-card">
                            <?php if ($TeamLeaderA && !empty($TeamLeaderA['NHLID'])): ?>
                                <img src="https://assets.nhle.com/mugs/nhl/latest/<?php echo $TeamLeaderA['NHLID']; ?>.png" 
                                     alt="<?php echo $TeamLeaderA['Name']; ?>" 
                                     class="leader-image"
                                     onerror="this.src='/images/default.png'">
                            <?php else: ?>
                                <img src="/images/default.png" 
                                     alt="<?php echo $TeamLeaderA['Name'] ?? 'N/A'; ?>" 
                                     class="leader-image">
                            <?php endif; ?>
                            
                            <div class="leader-content">
                                <div class="leader-stat-label">Assists Leader</div>
                                <div class="leader-player-name"><?php echo $TeamLeaderA['Name'] ?? 'N/A'; ?></div>
                                <div class="leader-position">
                                    <?php 
                                    if ($TeamLeaderA) {
                                        $position = "";
                                        if ($TeamLeaderA['PosC'] == "True") $position .= "C";
                                        if ($TeamLeaderA['PosLW'] == "True") $position .= ($position ? "/" : "") . "LW";
                                        if ($TeamLeaderA['PosRW'] == "True") $position .= ($position ? "/" : "") . "RW";
                                        if ($TeamLeaderA['PosD'] == "True") $position .= ($position ? "/" : "") . "D";
                                        echo $position;
                                    }
                                    ?>
                                </div>
                                <div class="leader-stat-number"><?php echo $TeamLeaderA['A'] ?? 0; ?></div>
                            </div>
                        </div>

                        <!-- Wins Leader (Goalie) -->
                        <div class="leader-card">
                            <?php if ($TeamLeaderW && !empty($TeamLeaderW['NHLID'])): ?>
                                <img src="https://assets.nhle.com/mugs/nhl/latest/<?php echo $TeamLeaderW['NHLID']; ?>.png" 
                                     alt="<?php echo $TeamLeaderW['Name']; ?>" 
                                     class="leader-image"
                                     onerror="this.src='/images/default.png'">
                            <?php else: ?>
                                <img src="/images/default.png" 
                                     alt="<?php echo $TeamLeaderW['Name'] ?? 'N/A'; ?>" 
                                     class="leader-image">
                            <?php endif; ?>
                            
                            <div class="leader-content">
                                <div class="leader-stat-label">Wins Leader</div>
                                <div class="leader-player-name"><?php echo $TeamLeaderW['Name'] ?? 'N/A'; ?></div>
                                <div class="leader-position">G</div>
                                <div class="leader-stat-number"><?php echo $TeamLeaderW['W'] ?? 0; ?></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="stat-card">
                    <h3>Team Info</h3>
                    <div class="stat-item">
                        <span class="stat-label">General Manager</span>
                        <span class="stat-value"><?php echo $TeamInfo['GMName'] ?? 'N/A'; ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Head Coach</span>
                        <span class="stat-value"><?php echo $CoachInfo['Name'] ?? 'N/A'; ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Captain</span>
                        <span class="stat-value"><?php echo $TeamLeader['Captain'] ?? 'N/A'; ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Assistant Captain 1</span>
                        <span class="stat-value"><?php echo $TeamLeader['Assistant1'] ?? 'N/A'; ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Assistant Captain 2</span>
                        <span class="stat-value"><?php echo $TeamLeader['Assistant2'] ?? 'N/A'; ?></span>
                    </div>
                </div>

                <div class="stat-card">
                    <h3>Team Stats</h3>
                    <div class="stat-item">
                        <span class="stat-label">Goals For</span>
                        <span class="stat-value"><?php echo number_format($TeamStat['GF'] ?? 0); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Goals Allowed</span>
                        <span class="stat-value"><?php echo number_format($TeamStat['GA'] ?? 0); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Shots For</span>
                        <span class="stat-value"><?php echo number_format($TeamStat['ShotsFor'] ?? 0); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Shots Against</span>
                        <span class="stat-value"><?php echo number_format($TeamStat['ShotsAga'] ?? 0); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Power Play Goals</span>
                        <span class="stat-value"><?php echo number_format($TeamStat['PPGoal'] ?? 0); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Shorthanded Goals</span>
                        <span class="stat-value"><?php echo number_format($TeamStat['PKGoalGA'] ?? 0); ?></span>
                    </div>
                </div>

                <div class="stat-card">
                    <h3>Team Performance</h3>
                    <div class="stat-item">
                        <span class="stat-label">Goals Per Game</span>
                        <span class="stat-value"><?php echo ($TeamStat['GP'] ?? 0) > 0 ? number_format(($TeamStat['GF'] ?? 0) / ($TeamStat['GP'] ?? 1), 2) : "0.00"; ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Goals Against Per Game</span>
                        <span class="stat-value"><?php echo ($TeamStat['GP'] ?? 0) > 0 ? number_format(($TeamStat['GA'] ?? 0) / ($TeamStat['GP'] ?? 1), 2) : "0.00"; ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Power Play %</span>
                        <span class="stat-value"><?php echo ($TeamStat['PPAttemp'] ?? 0) > 0 ? number_format(($TeamStat['PPGoal'] ?? 0) / ($TeamStat['PPAttemp'] ?? 1) * 100, 1) : "0.0"; ?>%</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Penalty Kill %</span>
                        <span class="stat-value"><?php echo ($TeamStat['PKAttemp'] ?? 0) > 0 ? number_format((($TeamStat['PKAttemp'] ?? 0) - ($TeamStat['PKGoalGA'] ?? 0)) / ($TeamStat['PKAttemp'] ?? 1) * 100, 1) : "0.0"; ?>%</span>
                    </div>
                </div>

                <!-- Nouvelle div avec la même largeur que Weekly Schedule -->
                <div class="stat-card new-section">
                    <h3>Team vs League Average</h3>
                    <div class="team-graph-container">
                        <?php if (!empty($TeamGraphStats) && !empty($LeagueAverages)): ?>
                            <div class="graph-row">
                                <div class="graph-label">Goals For/Game</div>
                                <div class="graph-bar-container">
                                    <div class="graph-bar team-bar" style="width: <?php echo min(85, ($TeamGraphStats['GFPerGame'] / max($LeagueMax['MaxGFPerGame'], 1)) * 100); ?>%">
                                        <span class="bar-value"><?php echo $TeamGraphStats['GFPerGame']; ?></span>
                    </div>
                                    <div class="graph-bar league-avg" style="left: <?php echo min(85, ($LeagueAverages['AvgGFPerGame'] / max($LeagueMax['MaxGFPerGame'], 1)) * 100); ?>%"></div>
                                    <div class="best-team-label"><?php echo htmlspecialchars($BestGFTeam['TeamName'] ?? 'N/A'); ?>: <?php echo round($LeagueMax['MaxGFPerGame'], 2); ?></div>
                    </div>
                    </div>

                            <div class="graph-row">
                                <div class="graph-label">Goals Against/Game</div>
                                <div class="graph-bar-container">
                                    <div class="graph-bar team-bar" style="width: <?php echo min(85, ($TeamGraphStats['GAPerGame'] / max($LeagueMax['MaxGAPerGame'], 1)) * 100); ?>%">
                                        <span class="bar-value"><?php echo $TeamGraphStats['GAPerGame']; ?></span>
                    </div>
                                    <div class="graph-bar league-avg" style="left: <?php echo min(85, ($LeagueAverages['AvgGAPerGame'] / max($LeagueMax['MaxGAPerGame'], 1)) * 100); ?>%"></div>
                                    <div class="best-team-label"><?php echo htmlspecialchars($BestGATeam['TeamName'] ?? 'N/A'); ?>: <?php echo round($LeagueMax['MaxGAPerGame'], 2); ?></div>
                    </div>
                    </div>

                            <div class="graph-row">
                                <div class="graph-label">Shots For/Game</div>
                                <div class="graph-bar-container">
                                    <div class="graph-bar team-bar" style="width: <?php echo min(85, ($TeamGraphStats['ShotsForPerGame'] / max($LeagueMax['MaxShotsForPerGame'], 1)) * 100); ?>%">
                                        <span class="bar-value"><?php echo $TeamGraphStats['ShotsForPerGame']; ?></span>
                                    </div>
                                    <div class="graph-bar league-avg" style="left: <?php echo min(85, ($LeagueAverages['AvgShotsForPerGame'] / max($LeagueMax['MaxShotsForPerGame'], 1)) * 100); ?>%"></div>
                                    <div class="best-team-label"><?php echo htmlspecialchars($BestShotsForTeam['TeamName'] ?? 'N/A'); ?>: <?php echo round($LeagueMax['MaxShotsForPerGame'], 1); ?></div>
                                </div>
                            </div>

                            <div class="graph-row">
                                <div class="graph-label">Power Play %</div>
                                <div class="graph-bar-container">
                                    <div class="graph-bar team-bar" style="width: <?php echo min(85, ($TeamGraphStats['PPPercentage'] / max($LeagueMax['MaxPPPercentage'], 1)) * 100); ?>%">
                                        <span class="bar-value"><?php echo $TeamGraphStats['PPPercentage']; ?>%</span>
                                    </div>
                                    <div class="graph-bar league-avg" style="left: <?php echo min(85, ($LeagueAverages['AvgPPPercentage'] / max($LeagueMax['MaxPPPercentage'], 1)) * 100); ?>%"></div>
                                    <div class="best-team-label"><?php echo htmlspecialchars($BestPPTeam['TeamName'] ?? 'N/A'); ?>: <?php echo round($LeagueMax['MaxPPPercentage'], 1); ?>%</div>
                                </div>
                            </div>

                            <div class="graph-row">
                                <div class="graph-label">Penalty Kill %</div>
                                <div class="graph-bar-container">
                                    <div class="graph-bar team-bar" style="width: <?php echo min(85, ($TeamGraphStats['PKPercentage'] / max($LeagueMax['MaxPKPercentage'], 1)) * 100); ?>%">
                                        <span class="bar-value"><?php echo $TeamGraphStats['PKPercentage']; ?>%</span>
                                    </div>
                                    <div class="graph-bar league-avg" style="left: <?php echo min(85, ($LeagueAverages['AvgPKPercentage'] / max($LeagueMax['MaxPKPercentage'], 1)) * 100); ?>%"></div>
                                    <div class="best-team-label"><?php echo htmlspecialchars($BestPKTeam['TeamName'] ?? 'N/A'); ?>: <?php echo round($LeagueMax['MaxPKPercentage'], 1); ?>%</div>
                                </div>
                            </div>

                            <div class="graph-row">
                                <div class="graph-label">Hits/Game</div>
                                <div class="graph-bar-container">
                                    <div class="graph-bar team-bar" style="width: <?php echo min(85, ($TeamGraphStats['HitsPerGame'] / max($LeagueMax['MaxHitsPerGame'], 1)) * 100); ?>%">
                                        <span class="bar-value"><?php echo $TeamGraphStats['HitsPerGame']; ?></span>
                                    </div>
                                    <div class="graph-bar league-avg" style="left: <?php echo min(85, ($LeagueAverages['AvgHitsPerGame'] / max($LeagueMax['MaxHitsPerGame'], 1)) * 100); ?>%"></div>
                                    <div class="best-team-label"><?php echo htmlspecialchars($BestHitsTeam['TeamName'] ?? 'N/A'); ?>: <?php echo round($LeagueMax['MaxHitsPerGame'], 1); ?></div>
                                </div>
                            </div>

                            <div class="graph-legend">
                                <div class="legend-item">
                                    <div class="legend-color team-color"></div>
                                    <span>Team</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color league-color"></div>
                                    <span>League Average</span>
                                </div>
                            </div>
                        <?php else: ?>
                            <p>Aucune donnée disponible pour le graphique</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>


                             

        <!-- Onglet Roster -->
        <div class="tabmain" id="tabmain1" style="padding: 0px !important;">
            <h3>Farm Team Roster</h3>
            
            <!-- Table des joueurs avec ratings -->
            <div class="roster-container">
                <table class="roster-table tablesorter STHSFarmTeamPlayerRoster_Table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="width: 112px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: left; font-weight: bold;">Player</th>
                            <th style="width: 20px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">POS</th>
                            <th style="width: 40px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">CON</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">CK</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">FG</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">DI</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SK</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">ST</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">EN</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">DU</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PH</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">FO</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PA</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SC</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">DF</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PS</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">EX</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">LD</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PO</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">MO</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #e8f4f8;">OV</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Age</th>
                            <th style="width: 20px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Years</th>
                            <th style="width: 45px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Salary</th>
                    </tr>
                </thead>
                <tbody>
<?php
                        // Récupération du roster complet des joueurs farm avec tous les ratings
                        $Query = "SELECT PlayerInfo.*, PlayerFarmStat.GP, PlayerFarmStat.G, PlayerFarmStat.A, PlayerFarmStat.P, PlayerFarmStat.PlusMinus FROM PlayerInfo LEFT JOIN PlayerFarmStat ON PlayerInfo.Number = PlayerFarmStat.Number WHERE PlayerInfo.Team = " . $Team . " AND PlayerInfo.Status1 <= 1 ORDER BY PlayerInfo.PosD, PlayerInfo.Overall DESC";
                    $PlayerRoster = $db->query($Query);
                    
                    if ($PlayerRoster) {
                        while ($Player = $PlayerRoster->fetchArray()) {
                                $strTemp = (string)$Player['Name'];
                                $playerClasses = "";

                                if ($Player['Rookie'] == "True") {
                                    $strTemp = $strTemp . " (R)";
                                    $playerClasses .= " rookie";
                                }
                                if ($TeamLeader['Captain'] == $Player['Number']) {
                                    $strTemp = $strTemp . " (C)";
                                    $playerClasses .= " captain";
                                }
                                if ($TeamLeader['Assistant1'] == $Player['Number']) {
                                    $strTemp = $strTemp . " (A)";
                                    $playerClasses .= " assistant";
                                }
                                if ($TeamLeader['Assistant2'] == $Player['Number']) {
                                    $strTemp = $strTemp . " (A)";
                                    $playerClasses .= " assistant";
                            }

                            // Ajouter une icône de croix rouge si la condition est en bas de 96
                            $conditionIcon = "";
                            $playerCondition = floatval(str_replace(",", ".", $Player['ConditionDecimal'] ?? $Player['Condition'] ?? 100));
                            if ($playerCondition < 96) {
                                $conditionIcon = " <span style='color: #dc3545; font-weight: bold;' title='Condition faible: " . number_format($playerCondition, 2) . "'>❌</span>";
                            }

                            echo "<tr>";
                                echo "<td class='player-name" . $playerClasses . "'><a href='PlayerReport.php?Player=" . $Player['Number'] . "'>" . $strTemp . "</a>" . $conditionIcon . "</td>";
                                
                                // Détermination de la position principale
                                $mainPosition = "";
                                if ($Player['PosD'] == "True") {
                                    $mainPosition = "D";
                                } elseif ($Player['PosC'] == "True") {
                                    $mainPosition = "C";
                                } elseif ($Player['PosLW'] == "True") {
                                    $mainPosition = "LW";
                                } elseif ($Player['PosRW'] == "True") {
                                    $mainPosition = "RW";
                                } else {
                                    $mainPosition = "-";
                                }
                                echo "<td class='position-cell'>" . $mainPosition . "</td>";
                                
                                // Condition avec gestion des suspensions
                                $conditionClass = "condition-cell";
                                if ($Player['Suspension'] == 99) {
                                    echo "<td class='" . $conditionClass . " holdout'>HO</td>";
                                } elseif ($Player['Suspension'] > 0) {
                                    echo "<td class='" . $conditionClass . " suspended'>S" . $Player['Suspension'] . "</td>";
                                } else {
                                    echo "<td class='" . $conditionClass . "'>" . number_format(str_replace(",", ".", $Player['ConditionDecimal']), 2) . "</td>";
                                }
                                
                                // Tous les ratings
                                echo "<td>" . $Player['CK'] . "</td>";
                                echo "<td>" . $Player['FG'] . "</td>";
                                echo "<td>" . $Player['DI'] . "</td>";
                                echo "<td>" . $Player['SK'] . "</td>";
                                echo "<td>" . $Player['ST'] . "</td>";
                                echo "<td>" . $Player['EN'] . "</td>";
                                echo "<td>" . $Player['DU'] . "</td>";
                                echo "<td>" . $Player['PH'] . "</td>";
                                echo "<td>" . $Player['FO'] . "</td>";
                                echo "<td>" . $Player['PA'] . "</td>";
                                echo "<td>" . $Player['SC'] . "</td>";
                                echo "<td>" . $Player['DF'] . "</td>";
                                echo "<td>" . $Player['PS'] . "</td>";
                                echo "<td>" . $Player['EX'] . "</td>";
                                echo "<td>" . $Player['LD'] . "</td>";
                                echo "<td>" . $Player['PO'] . "</td>";
                                echo "<td>" . $Player['MO'] . "</td>";
                                echo "<td class='overall-cell'>" . $Player['Overall'] . "</td>";
                                
                                // Informations supplémentaires
                                echo "<td>" . ($Player['Age'] ?? '-') . "</td>";
                                echo "<td>" . ($Player['Contract'] ?? '-') . "</td>";
                                echo "<td class='salary-cell'>$" . number_format($Player['Salary1'] ?? 0, 0) . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>

            <h3>Goaltenders</h3>
            <div class="roster-container">
                <table class="roster-table tablesorter STHSFarmTeamGoalieRoster_Table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="width: 90px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: left; font-weight: bold;">Player</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">CON</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SK</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">DU</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">EN</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SZ</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">AG</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">RB</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SC</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">HS</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">RT</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PH</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PS</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">EX</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">LD</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PO</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">MO</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #e8f4f8;">OV</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Age</th>
                            <th style="width: 15px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Years</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Salary</th>
                    </tr>
                </thead>
                <tbody>
<?php
                        // Récupération du roster des gardiens farm avec tous les ratings
                        $Query = "SELECT * FROM GoalerInfo WHERE Team = " . $Team . " AND Status1 <= 1 ORDER BY Overall DESC";
                    $GoalieRoster = $db->query($Query);
                    
                    if ($GoalieRoster) {
                        while ($Goalie = $GoalieRoster->fetchArray()) {
                                $strTemp = (string)$Goalie['Name'];
                                $playerClasses = "";

                                if ($Goalie['Rookie'] == "True") {
                                    $strTemp = $strTemp . " (R)";
                                    $playerClasses .= " rookie";
                            }

                            // Ajouter une icône de croix rouge si la condition est en bas de 96
                            $conditionIcon = "";
                            $goalieCondition = floatval(str_replace(",", ".", $Goalie['ConditionDecimal'] ?? $Goalie['Condition'] ?? 100));
                            if ($goalieCondition < 96) {
                                $conditionIcon = " <span style='color: #dc3545; font-weight: bold;' title='Condition faible: " . number_format($goalieCondition, 2) . "'>❌</span>";
                            }

                            echo "<tr>";
                                echo "<td class='player-name" . $playerClasses . "'><a href='GoalieReport.php?Goalie=" . $Goalie['Number'] . "'>" . $strTemp . "</a>" . $conditionIcon . "</td>";
                                
                                // Condition avec gestion des suspensions
                                $conditionClass = "condition-cell";
                                if ($Goalie['Suspension'] == 99) {
                                    echo "<td class='" . $conditionClass . " holdout'>HO</td>";
                                } elseif ($Goalie['Suspension'] > 0) {
                                    echo "<td class='" . $conditionClass . " suspended'>S" . $Goalie['Suspension'] . "</td>";
                                } else {
                                    echo "<td class='" . $conditionClass . "'>" . number_format(str_replace(",", ".", $Goalie['ConditionDecimal']), 2) . "</td>";
                                }
                                
                                // Tous les ratings des gardiens
                                echo "<td>" . $Goalie['SK'] . "</td>";
                                echo "<td>" . $Goalie['DU'] . "</td>";
                                echo "<td>" . $Goalie['EN'] . "</td>";
                                echo "<td>" . $Goalie['SZ'] . "</td>";
                                echo "<td>" . $Goalie['AG'] . "</td>";
                                echo "<td>" . $Goalie['RB'] . "</td>";
                                echo "<td>" . $Goalie['SC'] . "</td>";
                                echo "<td>" . $Goalie['HS'] . "</td>";
                                echo "<td>" . $Goalie['RT'] . "</td>";
                                echo "<td>" . $Goalie['PH'] . "</td>";
                                echo "<td>" . $Goalie['PS'] . "</td>";
                                echo "<td>" . $Goalie['EX'] . "</td>";
                                echo "<td>" . $Goalie['LD'] . "</td>";
                                echo "<td>" . $Goalie['PO'] . "</td>";
                                echo "<td>" . $Goalie['MO'] . "</td>";
                                echo "<td class='overall-cell'>" . $Goalie['Overall'] . "</td>";
                                
                                // Informations supplémentaires
                                echo "<td>" . ($Goalie['Age'] ?? '-') . "</td>";
                                echo "<td>" . ($Goalie['Contract'] ?? '-') . "</td>";
                                echo "<td class='salary-cell'>$" . number_format($Goalie['Salary1'] ?? 0, 0) . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>

            <style>
            .roster-container {
                margin-bottom: 30px;
                overflow-x: auto;
            }
            
            .roster-table {
                min-width: 100%;
            }
            
            .roster-table th,
            .roster-table td {
                padding: 4px 2px !important;
                border: 1px solid #ddd;
                text-align: center;
                font-size: 10px;
            }
            
            .roster-table th {
                background: #f5f5f5;
                font-weight: bold;
                border-bottom: 2px solid #ddd;
            }
            
            .player-name {
                text-align: left !important;
                font-weight: bold;
            }
            
            .player-name a {
                color: #007bff;
                text-decoration: none;
            }
            
            .player-name a:hover {
                text-decoration: underline;
            }
            
            .player-name.rookie a::after {
                content: " (R)";
                color: #28a745;
                font-weight: bold;
            }
            
            .player-name.captain a::after {
                content: " (C)";
                color: #dc3545;
                font-weight: bold;
            }
            
            .player-name.assistant a::after {
                content: " (A)";
                color: #ffc107;
                font-weight: bold;
            }
            
            .position-cell {
                font-weight: bold;
                background: #f8f9fa;
            }
            
            .condition-cell {
                font-weight: bold;
            }
            
            .condition-cell.holdout {
                background: #fff3cd;
                color: #856404;
            }
            
            .condition-cell.suspended {
                background: #f8d7da;
                color: #721c24;
            }
            
            .overall-cell {
                background: #e8f4f8;
                font-weight: bold;
            }
            
            .salary-cell {
                font-weight: bold;
                color: #28a745;
            }
            </style>
        </div>

        <!-- Onglet Stats -->
        <div class="tabmain" id="tabmain2" style="padding: 0px !important;">
            <h3>Farm Team Statistics</h3>
            
            <!-- Table des statistiques des joueurs -->
            <div class="stats-container">
                <table class="stats-table tablesorter STHSFarmTeamPlayerStats_Table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="width: 120px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: left; font-weight: bold;">Player</th>
                            <th style="width: 20px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">POS</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">GP</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">G</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">A</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">P</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">+/-</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PIM</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Hits</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Shots</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Sh%</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PPG</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SHG</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">GWG</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">TOI</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">TOI/G</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">FO%</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">P/20</th>
</tr>
                </thead>
                <tbody>
<?php
                        // Récupération des statistiques des joueurs farm
                        $Query = "SELECT PlayerInfo.*, PlayerFarmStat.*, ROUND((CAST(PlayerFarmStat.G AS REAL) / (PlayerFarmStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerFarmStat.SecondPlay AS REAL) / 60 / (PlayerFarmStat.GP)),2) AS AMG, ROUND((CAST(PlayerFarmStat.FaceOffWon AS REAL) / (PlayerFarmStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerFarmStat.P AS REAL) / (PlayerFarmStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerFarmStat ON PlayerInfo.Number = PlayerFarmStat.Number WHERE PlayerInfo.Team = " . $Team . " AND PlayerInfo.Status1 <= 1 AND PlayerFarmStat.GP > 0 ORDER BY PlayerFarmStat.P DESC, PlayerFarmStat.GP ASC";
                    $PlayerStats = $db->query($Query);
                    
                    if ($PlayerStats) {
                        while ($Player = $PlayerStats->fetchArray()) {
                                $strTemp = (string)$Player['Name'];
                                $playerClasses = "";

                                if ($Player['Rookie'] == "True") {
                                    $strTemp = $strTemp . " (R)";
                                    $playerClasses .= " rookie";
                                }
                                if ($TeamLeader['Captain'] == $Player['Number']) {
                                    $strTemp = $strTemp . " (C)";
                                    $playerClasses .= " captain";
                                }
                                if ($TeamLeader['Assistant1'] == $Player['Number']) {
                                    $strTemp = $strTemp . " (A)";
                                    $playerClasses .= " assistant";
                                }
                                if ($TeamLeader['Assistant2'] == $Player['Number']) {
                                    $strTemp = $strTemp . " (A)";
                                    $playerClasses .= " assistant";
                            }

                            // Ajouter une icône de croix rouge si la condition est en bas de 96
                            $conditionIcon = "";
                            $playerCondition = floatval(str_replace(",", ".", $Player['ConditionDecimal'] ?? $Player['Condition'] ?? 100));
                            if ($playerCondition < 96) {
                                $conditionIcon = " <span style='color: #dc3545; font-weight: bold;' title='Condition faible: " . number_format($playerCondition, 2) . "'>❌</span>";
                            }

                            echo "<tr>";
                                echo "<td class='player-name" . $playerClasses . "'><a href='PlayerReport.php?Player=" . $Player['Number'] . "'>" . $strTemp . "</a>" . $conditionIcon . "</td>";
                                
                                // Détermination de la position principale
                                $mainPosition = "";
                                if ($Player['PosD'] == "True") {
                                    $mainPosition = "D";
                                } elseif ($Player['PosC'] == "True") {
                                    $mainPosition = "C";
                                } elseif ($Player['PosLW'] == "True") {
                                    $mainPosition = "LW";
                                } elseif ($Player['PosRW'] == "True") {
                                    $mainPosition = "RW";
                                } else {
                                    $mainPosition = "-";
                                }
                                echo "<td class='position-cell'>" . $mainPosition . "</td>";
                                
                                // Statistiques de base
                                echo "<td>" . $Player['GP'] . "</td>";
                                echo "<td>" . $Player['G'] . "</td>";
                                echo "<td>" . $Player['A'] . "</td>";
                                echo "<td class='points-cell'>" . $Player['P'] . "</td>";
                                echo "<td>" . $Player['PlusMinus'] . "</td>";
                                echo "<td>" . $Player['Pim'] . "</td>";
                                echo "<td>" . $Player['Hits'] . "</td>";
                                echo "<td>" . $Player['Shots'] . "</td>";
                                echo "<td>" . ($Player['ShotsPCT'] ?? '0.00') . "%</td>";
                                echo "<td>" . $Player['PPGoal'] . "</td>";
                                echo "<td>" . $Player['SHGoal'] . "</td>";
                                echo "<td>" . $Player['GWGoal'] . "</td>";
                                echo "<td>" . round($Player['SecondPlay'] / 60, 1) . "</td>";
                                echo "<td>" . ($Player['AMG'] ?? '0.00') . "</td>";
                                echo "<td>" . ($Player['FaceoffPCT'] ?? '0.00') . "%</td>";
                                echo "<td>" . ($Player['P20'] ?? '0.00') . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>

            <h3>Goaltenders Statistics</h3>
            <div class="stats-container">
                <table class="stats-table tablesorter STHSFarmTeamGoalieStats_Table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="width: 120px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: left; font-weight: bold;">Player</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">GP</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">W</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">L</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">OTL</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SOW</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SOL</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">GAA</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SV%</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SA</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">GA</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">SO</th>
                            <th style="width: 25px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">TOI</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">TOI/G</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PS%</th>
</tr>
                </thead>
                <tbody>
<?php
                        // Récupération des statistiques des gardiens farm
                        $Query = "SELECT GoalerInfo.*, GoalerFarmStat.*, ROUND((CAST(GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SecondPlay / 60))*60,2) AS GAA, ROUND((CAST(GoalerFarmStat.SA - GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SA)),3) AS PCT, ROUND((CAST(GoalerFarmStat.PenalityShotsShots - GoalerFarmStat.PenalityShotsGoals AS REAL) / (GoalerFarmStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerInfo INNER JOIN GoalerFarmStat ON GoalerInfo.Number = GoalerFarmStat.Number WHERE GoalerInfo.Team = " . $Team . " AND GoalerInfo.Status1 <= 1 AND GoalerFarmStat.GP > 0 ORDER BY GoalerFarmStat.W DESC, GoalerFarmStat.GP DESC";
                    $GoalieStats = $db->query($Query);
                    
                    if ($GoalieStats) {
                        while ($Goalie = $GoalieStats->fetchArray()) {
                                $strTemp = (string)$Goalie['Name'];
                                $playerClasses = "";

                                if ($Goalie['Rookie'] == "True") {
                                    $strTemp = $strTemp . " (R)";
                                    $playerClasses .= " rookie";
                            }

                            // Ajouter une icône de croix rouge si la condition est en bas de 96
                            $conditionIcon = "";
                            $goalieCondition = floatval(str_replace(",", ".", $Goalie['ConditionDecimal'] ?? $Goalie['Condition'] ?? 100));
                            if ($goalieCondition < 96) {
                                $conditionIcon = " <span style='color: #dc3545; font-weight: bold;' title='Condition faible: " . number_format($goalieCondition, 2) . "'>❌</span>";
                            }

                            echo "<tr>";
                                echo "<td class='player-name" . $playerClasses . "'><a href='GoalieReport.php?Goalie=" . $Goalie['Number'] . "'>" . $strTemp . "</a>" . $conditionIcon . "</td>";
                                
                                // Statistiques de base
                                echo "<td>" . $Goalie['GP'] . "</td>";
                                echo "<td>" . $Goalie['W'] . "</td>";
                                echo "<td>" . $Goalie['L'] . "</td>";
                                echo "<td>" . $Goalie['OTL'] . "</td>";
                                echo "<td>" . $Goalie['SOW'] . "</td>";
                                echo "<td>" . $Goalie['SOL'] . "</td>";
                                echo "<td>" . (isset($Goalie['GAA']) ? number_format((float)$Goalie['GAA'], 2) : '0.00') . "</td>";
                                echo "<td>" . (($Goalie['PCT'] ?? 0) * 100) . "%</td>";
                                echo "<td>" . $Goalie['SA'] . "</td>";
                                echo "<td>" . $Goalie['GA'] . "</td>";
                                echo "<td>" . $Goalie['Shutouts'] . "</td>";
                                echo "<td>" . round($Goalie['SecondPlay'] / 60, 1) . "</td>";
                                echo "<td>" . round(($Goalie['SecondPlay'] / 60) / $Goalie['GP'], 1) . "</td>";
                                echo "<td>" . (($Goalie['PenalityShotsPCT'] ?? 0) * 100) . "%</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
</table>
            </div>

            <style>
            .stats-container {
                margin-bottom: 30px;
                overflow-x: auto;
            }
            
            .stats-table {
                min-width: 100%;
            }
            
            .stats-table th,
            .stats-table td {
                padding: 4px 2px !important;
                border: 1px solid #ddd;
                text-align: center;
                font-size: 10px;
            }
            
            .stats-table th {
                background: #f5f5f5;
                font-weight: bold;
                border-bottom: 2px solid #ddd;
            }
            
            .player-name {
                text-align: left !important;
                font-weight: bold;
            }
            
            .player-name a {
                color: #007bff;
                text-decoration: none;
            }
            
            .player-name a:hover {
                text-decoration: underline;
            }
            
            .player-name.rookie a::after {
                content: " (R)";
                color: #28a745;
                font-weight: bold;
            }
            
            .player-name.captain a::after {
                content: " (C)";
                color: #dc3545;
                font-weight: bold;
            }
            
            .player-name.assistant a::after {
                content: " (A)";
                color: #ffc107;
                font-weight: bold;
            }
            
            .position-cell {
                font-weight: bold;
                background: #f8f9fa;
            }
            
            .points-cell {
                font-weight: bold;
                background: #e8f4f8;
            }
            </style>
</div>

        <!-- Onglet Schedule -->
        <div class="tabmain" id="tabmain3">
            <h3>Farm Team Schedule</h3>
            
            <?php
            // Récupération du calendrier complet de l'équipe farm
            $Query = "SELECT * FROM ScheduleFarm WHERE (VisitorTeam = " . $Team . " OR HomeTeam = " . $Team . ") ORDER BY GameNumber";
            $Schedule = $db->query($Query);

            // Préparer la variable pour stocker le lien du boxscore
            $boxscoreLink = "";
            ?>
            
            <div class="schedule-container">
                <table class="schedule-table STHSPHPPlayerStat_Table" style="width: 100%; font-size: 11px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                    <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f5f5f5; color: #000;">Game #</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f5f5f5; color: #000;">Jour</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f5f5f5; color: #000;">Visitor</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f5f5f5; color: #000;">Home</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f5f5f5; color: #000;">Visitor Score</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f5f5f5; color: #000;">Home Score</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f5f5f5; color: #000;">Status</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f5f5f5; color: #000;">Boxscore</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        if ($Schedule) {
                            while ($Game = $Schedule->fetchArray()) {
                                $HomeTeam = $Game['HomeTeam'];
                                $VisitorTeam = $Game['VisitorTeam'];
                                $HomeScore = $Game['HomeScore'];
                                $VisitorScore = $Game['VisitorScore'];
                                $GameNumber = $Game['GameNumber'];
                                $GameDay = $Game['Day'] ?? null;
                                $Play = $Game['Play'];
                                $IsOvertime = ($Game['Overtime'] ?? '') == 'True';
                                $IsShootout = ($Game['Shootout'] ?? '') == 'True';
                                
                                // Récupérer les noms d'équipes depuis TeamFarmInfo
                                $Query = "SELECT Name, TeamThemeID FROM TeamFarmInfo WHERE Number = " . $HomeTeam;
                                $HomeTeamInfo = $db->querySingle($Query, true);
                                $Query = "SELECT Name, TeamThemeID FROM TeamFarmInfo WHERE Number = " . $VisitorTeam;
                                $VisitorTeamInfo = $db->querySingle($Query, true);
                                
                                $HomeTeamName = $HomeTeamInfo['Name'] ?? 'Team ' . $HomeTeam;
                                $VisitorTeamName = $VisitorTeamInfo['Name'] ?? 'Team ' . $VisitorTeam;
                                $HomeTeamThemeID = $HomeTeamInfo['TeamThemeID'] ?? null;
                                $VisitorTeamThemeID = $VisitorTeamInfo['TeamThemeID'] ?? null;
                                
                                $isHome = ($HomeTeam == $Team);
                                $isWin = false;
                                $gameStatus = "Scheduled";
                                
                                if ($Play == 'True') {
                                    $gameStatus = "Final";
                                    $isWin = ($isHome && $HomeScore > $VisitorScore) || (!$isHome && $VisitorScore > $HomeScore);
                                    if ($IsShootout) {
                                        $gameStatus .= " (SO)";
                                    } elseif ($IsOvertime) {
                                        $gameStatus .= " (OT)";
                                    }
                                    
                                    // Préparer le lien du boxscore
                                    $boxscoreLink = "<a href='LHSQC-Farm-" . $GameNumber . ".php'>Boxscore</a>";
                                } else {
                                    $boxscoreLink = "";
                                }
                                
                                echo "<tr>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $GameNumber . "</td>";

                                // Jour de simulation - utilise le champ Day de la base de données
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">";
                                if ($GameDay) {
                                    echo $GameDay;
                                } else {
                                    echo "TBD";
                                }
                                echo "</td>";
                                
                                // Équipe visiteuse
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">";
                                if ($VisitorTeamThemeID && file_exists("images/" . $VisitorTeamThemeID . ".png")) {
                                    echo "<img src='images/" . $VisitorTeamThemeID . ".png' alt='" . $VisitorTeamName . "' style='width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;'>";
                                }
                                echo $VisitorTeamName . "</td>";
                                
                                // Équipe locale
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">";
                                if ($HomeTeamThemeID && file_exists("images/" . $HomeTeamThemeID . ".png")) {
                                    echo "<img src='images/" . $HomeTeamThemeID . ".png' alt='" . $HomeTeamName . "' style='width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;'>";
                                }
                                echo $HomeTeamName . "</td>";
                                
                                // Scores
                                if ($Play == 'True') {
                                    echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;\">" . $VisitorScore . "</td>";
                                    echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;\">" . $HomeScore . "</td>";
                                } else {
                                    echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">-</td>";
                                    echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">-</td>";
                                }
                                
                                // Status avec couleur
                                $statusColor = "#666";
                                if ($Play == 'True') {
                                    if ($isWin) {
                                        $statusColor = "#28a745";
                                    } else {
                                        $statusColor = "#dc3545";
                                    }
                                }
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center; color: " . $statusColor . ";\">" . $gameStatus . "</td>";
                                
                                // Boxscore
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $boxscoreLink . "</td>";
                                
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' style='padding: 6px 4px; border: 1px solid #ddd; text-align: center;'>Aucun match programmé</td></tr>";
                        }
                        ?>
                    </tbody>
</table>
            </div>
</div>

        <!-- Onglet Lines -->
        <div class="tabmain" id="tabmain4">
            <h3>Farm Team Lines</h3>

<?php
            // Récupération des lignes de l'équipe farm
            $Query = "SELECT * FROM TeamFarmLines WHERE TeamNumber = " . $Team . " AND Day = 1";
            $TeamLines = $db->querySingle($Query, true);
            
            // Récupération des informations des joueurs pour les lignes
            $Query = "SELECT Number, Name, PosC, PosLW, PosRW, PosD, PosG FROM PlayerInfo WHERE Team = " . $Team . " AND Status1 <= 1 ORDER BY Name";
            $FarmPlayers = $db->query($Query);
            
            // Créer un tableau associatif pour accéder rapidement aux joueurs
            $PlayersArray = array();
            if ($FarmPlayers) {
                while ($Player = $FarmPlayers->fetchArray()) {
                    $PlayersArray[$Player['Number']] = $Player;
                }
            }
            
            // Récupération des gardiens
            $Query = "SELECT Number, Name FROM GoalerInfo WHERE Team = " . $Team . " AND Status1 <= 1 ORDER BY Name";
            $FarmGoalies = $db->query($Query);
            
            // Créer un tableau associatif pour les gardiens
            $GoaliesArray = array();
            if ($FarmGoalies) {
                while ($Goalie = $FarmGoalies->fetchArray()) {
                    $GoaliesArray[$Goalie['Number']] = $Goalie;
                }
            }
            
            // Fonction pour obtenir le nom du joueur par son nom dans les lignes
            function getPlayerNameFromLine($playerName, $PlayersArray) {
                foreach ($PlayersArray as $player) {
                    if ($player['Name'] === $playerName) {
                        return "<a href='PlayerReport.php?Player=" . $player['Number'] . "'>" . $playerName . "</a>";
                    }
                }
                return $playerName;
            }
            
            // Fonction pour obtenir le nom du gardien par son nom dans les lignes
            function getGoalieNameFromLine($goalieName, $GoaliesArray) {
                foreach ($GoaliesArray as $goalie) {
                    if ($goalie['Name'] === $goalieName) {
                        return "<a href='GoalieReport.php?Goalie=" . $goalie['Number'] . "'>" . $goalieName . "</a>";
                    }
                }
                return $goalieName;
            }
            ?>
            
            <div class="lines-container">
                <!-- Ligne 1 -->
                <div class="line-section">
                    <h4>Line 1</h4>
                    <div class="line-players">
                        <div class="player-slot">
                            <span class="position-label">LW:</span>
                            <span class="player-name">
<?php
                                if ($TeamLines && !empty($TeamLines['Line15vs5ForwardLeftWing'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line15vs5ForwardLeftWing'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
</div>
                        <div class="player-slot">
                            <span class="position-label">C:</span>
                            <span class="player-name">
<?php 
                                if ($TeamLines && !empty($TeamLines['Line15vs5ForwardCenter'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line15vs5ForwardCenter'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
</div>
                        <div class="player-slot">
                            <span class="position-label">RW:</span>
                            <span class="player-name">
<?php 
                                if ($TeamLines && !empty($TeamLines['Line15vs5ForwardRightWing'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line15vs5ForwardRightWing'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
</div>

                <!-- Ligne 2 -->
                <div class="line-section">
                    <h4>Line 2</h4>
                    <div class="line-players">
                        <div class="player-slot">
                            <span class="position-label">LW:</span>
                            <span class="player-name">
<?php 
                                if ($TeamLines && !empty($TeamLines['Line25vs5ForwardLeftWing'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line25vs5ForwardLeftWing'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                        <div class="player-slot">
                            <span class="position-label">C:</span>
                            <span class="player-name">
<?php
                                if ($TeamLines && !empty($TeamLines['Line25vs5ForwardCenter'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line25vs5ForwardCenter'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
</div>
                        <div class="player-slot">
                            <span class="position-label">RW:</span>
                            <span class="player-name">
                                <?php 
                                if ($TeamLines && !empty($TeamLines['Line25vs5ForwardRightWing'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line25vs5ForwardRightWing'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
</div>

                <!-- Ligne 3 -->
                <div class="line-section">
                    <h4>Line 3</h4>
                    <div class="line-players">
                        <div class="player-slot">
                            <span class="position-label">LW:</span>
                            <span class="player-name">
<?php 
                                if ($TeamLines && !empty($TeamLines['Line35vs5ForwardLeftWing'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line35vs5ForwardLeftWing'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                        <div class="player-slot">
                            <span class="position-label">C:</span>
                            <span class="player-name">
<?php 
                                if ($TeamLines && !empty($TeamLines['Line35vs5ForwardCenter'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line35vs5ForwardCenter'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                        <div class="player-slot">
                            <span class="position-label">RW:</span>
                            <span class="player-name">
<?php 
                                if ($TeamLines && !empty($TeamLines['Line35vs5ForwardRightWing'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line35vs5ForwardRightWing'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Ligne 4 -->
                <div class="line-section">
                    <h4>Line 4</h4>
                    <div class="line-players">
                        <div class="player-slot">
                            <span class="position-label">LW:</span>
                            <span class="player-name">
<?php 
                                if ($TeamLines && !empty($TeamLines['Line45vs5ForwardLeftWing'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line45vs5ForwardLeftWing'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                        <div class="player-slot">
                            <span class="position-label">C:</span>
                            <span class="player-name">
<?php 
                                if ($TeamLines && !empty($TeamLines['Line45vs5ForwardCenter'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line45vs5ForwardCenter'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
</div>
                        <div class="player-slot">
                            <span class="position-label">RW:</span>
                            <span class="player-name">
                                <?php 
                                if ($TeamLines && !empty($TeamLines['Line45vs5ForwardRightWing'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line45vs5ForwardRightWing'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
</div>
                    </div>
</div>

                <!-- Défenseurs -->
                <div class="defense-section">
                    <h4>Defense Pairs</h4>
                    
                    <!-- Paire 1 -->
                    <div class="defense-pair">
                        <div class="player-slot">
                            <span class="position-label">D1:</span>
                            <span class="player-name">
<?php
                                if ($TeamLines && !empty($TeamLines['Line15vs5DefenseDefense1'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line15vs5DefenseDefense1'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
</div>
                        <div class="player-slot">
                            <span class="position-label">D2:</span>
                            <span class="player-name">
<?php
                                if ($TeamLines && !empty($TeamLines['Line15vs5DefenseDefense2'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line15vs5DefenseDefense2'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                    </div>

                    <!-- Paire 2 -->
                    <div class="defense-pair">
                        <div class="player-slot">
                            <span class="position-label">D3:</span>
                            <span class="player-name">
                                <?php 
                                if ($TeamLines && !empty($TeamLines['Line25vs5DefenseDefense1'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line25vs5DefenseDefense1'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                        <div class="player-slot">
                            <span class="position-label">D4:</span>
                            <span class="player-name">
                                <?php 
                                if ($TeamLines && !empty($TeamLines['Line25vs5DefenseDefense2'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line25vs5DefenseDefense2'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                    </div>

                    <!-- Paire 3 -->
                    <div class="defense-pair">
                        <div class="player-slot">
                            <span class="position-label">D5:</span>
                            <span class="player-name">
                                <?php 
                                if ($TeamLines && !empty($TeamLines['Line35vs5DefenseDefense1'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line35vs5DefenseDefense1'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                        <div class="player-slot">
                            <span class="position-label">D6:</span>
                            <span class="player-name">
                                <?php 
                                if ($TeamLines && !empty($TeamLines['Line35vs5DefenseDefense2'])) {
                                    echo getPlayerNameFromLine($TeamLines['Line35vs5DefenseDefense2'], $PlayersArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Gardiens -->
                <div class="goalie-section">
                    <h4>Goalies</h4>
                    <div class="goalie-slots">
                        <div class="player-slot">
                            <span class="position-label">Starter:</span>
                            <span class="player-name">
                                <?php 
                                if ($TeamLines && !empty($TeamLines['Goaler1'])) {
                                    echo getGoalieNameFromLine($TeamLines['Goaler1'], $GoaliesArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                        <div class="player-slot">
                            <span class="position-label">Backup:</span>
                            <span class="player-name">
                                <?php 
                                if ($TeamLines && !empty($TeamLines['Goaler2'])) {
                                    echo getGoalieNameFromLine($TeamLines['Goaler2'], $GoaliesArray);
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
</div>

            <style>
            .lines-container {
                display: grid;
                gap: 20px;
                margin-top: 20px;
            }
            
            .line-section, .defense-section, .goalie-section {
                background: #f8f9fa;
                border: 1px solid #e9ecef;
                border-radius: 8px;
                padding: 15px;
            }
            
            .line-section h4, .defense-section h4, .goalie-section h4 {
                margin-bottom: 15px;
                color: var(--primary-color);
                font-size: 16px;
                font-weight: bold;
            }
            
            .line-players {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }
            
            .defense-pair {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                margin-bottom: 10px;
            }
            
            .goalie-slots {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            
            .player-slot {
                display: flex;
                align-items: center;
                padding: 8px;
                background: white;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
            
            .position-label {
                font-weight: bold;
                color: #666;
                margin-right: 8px;
                min-width: 30px;
            }
            
            .player-name {
                flex: 1;
            }
            
            .player-name a {
                color: #007bff;
                text-decoration: none;
            }
            
            .player-name a:hover {
                text-decoration: underline;
            }
            </style>
</div>

        <!-- Onglet Capology -->
        <div class="tabmain" id="tabmain5" style="padding: 0px !important;">
            <h3>Farm Team Salary Cap Overview</h3>
            
            <?php
            // Récupération des informations de la ligue pour le salary cap (même requête que TeamSalaryCapDetail.php)
            $Query = "Select SalaryCapOption, ProSalaryCapValue, BonusIncludeSalaryCap from LeagueFinance";
            $LeagueFinance = $db->querySingle($Query, true);
            $Query = "Select FreeAgentUseDateInsteadofDay, FreeAgentRealDate from LeagueOutputOption";
            $LeagueOutputOption = $db->querySingle($Query, true);
            $Query = "Select Name, RFAAge, UFAAge, LeagueYearOutput from LeagueGeneral";
            $LeagueGeneral = $db->querySingle($Query, true);
            $LeagueYear = (int)$LeagueGeneral['LeagueYearOutput'];
            $SalaryCap = (int)$LeagueFinance['ProSalaryCapValue'];
            
            // Récupération des informations financières de l'équipe
            $Query = "Select Number, Name, CurrentBankAccount, SpecialSalaryCapY1, SpecialSalaryCapY2, SpecialSalaryCapY3, SpecialSalaryCapY4, SpecialSalaryCapY5 from TeamProFinance WHERE Number = " . $Team;
            $TeamFinance = $db->querySingle($Query, true);
            
            // Ajustement du salary cap selon les options de la ligue
            if ($LeagueFinance['SalaryCapOption'] == 2 OR $LeagueFinance['SalaryCapOption'] == 5) {
                $SalaryCap = $SalaryCap + $TeamFinance['CurrentBankAccount'];
            }
            
            // Récupération des joueurs farm avec leurs contrats
            $Query = "SELECT MainTable.* FROM (SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.TeamName, PlayerInfo.ProTeamName, PlayerInfo.Age, PlayerInfo.AgeDate, PlayerInfo.Contract, PlayerInfo.Rookie, PlayerInfo.NoTrade, PlayerInfo.CanPlayPro, PlayerInfo.CanPlayFarm, PlayerInfo.ForceWaiver, PlayerInfo.WaiverPossible, PlayerInfo.ExcludeSalaryCap, PlayerInfo.ProSalaryinFarm, PlayerInfo.SalaryAverage, PlayerInfo.Salary1, PlayerInfo.Salary2, PlayerInfo.Salary3, PlayerInfo.Salary4, PlayerInfo.Salary5, PlayerInfo.Salary6, PlayerInfo.Salary7, PlayerInfo.Salary8, PlayerInfo.Salary9, PlayerInfo.Salary10, PlayerInfo.SalaryRemaining, PlayerInfo.SalaryAverageRemaining, PlayerInfo.SalaryCap, PlayerInfo.SalaryCapRemaining, PlayerInfo.Condition, PlayerInfo.Status1, PlayerInfo.URLLink, PlayerInfo.NHLID, PlayerInfo.PProtected, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, 'False' AS PosG, PlayerInfo.Retire as Retire FROM PlayerInfo WHERE Team = " . $Team . " AND Retire = 'False' AND Status1 = 1 UNION ALL SELECT GoalerInfo.Number + 10000, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.TeamName, GoalerInfo.ProTeamName, GoalerInfo.Age, GoalerInfo.AgeDate, GoalerInfo.Contract, GoalerInfo.Rookie, GoalerInfo.NoTrade, GoalerInfo.CanPlayPro, GoalerInfo.CanPlayFarm, GoalerInfo.ForceWaiver, GoalerInfo.WaiverPossible, GoalerInfo.ExcludeSalaryCap, GoalerInfo.ProSalaryinFarm, GoalerInfo.SalaryAverage, GoalerInfo.Salary1, GoalerInfo.Salary2, GoalerInfo.Salary3, GoalerInfo.Salary4, GoalerInfo.Salary5, GoalerInfo.Salary6, GoalerInfo.Salary7, GoalerInfo.Salary8, GoalerInfo.Salary9, GoalerInfo.Salary10, GoalerInfo.SalaryRemaining, GoalerInfo.SalaryAverageRemaining, GoalerInfo.SalaryCap, GoalerInfo.SalaryCapRemaining, GoalerInfo.Condition, GoalerInfo.Status1, GoalerInfo.URLLink, GoalerInfo.NHLID, GoalerInfo.PProtected, 'False' AS PosC, 'False' AS PosLW, 'False' AS PosRW, 'False' AS PosD, 'True' AS PosG, GoalerInfo.Retire as Retire FROM GoalerInfo WHERE Team = " . $Team . " AND Retire = 'False' AND Status1 = 1) AS MainTable ORDER BY PosG ASC, PosD ASC, Name ASC";
            $FarmPlayerSalaryCap = $db->query($Query);
            ?>
            
            <!-- Résumé du salary cap -->
            <div class="cap-summary" style="margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; border: 1px solid #e9ecef;">
                <h4 style="margin-bottom: 15px; color: var(--primary-color);">Salary Cap Summary</h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: bold; color: #333;">$<?php echo number_format($SalaryCap); ?></div>
                        <div style="font-size: 12px; color: #666;">League Salary Cap</div>
</div>
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: bold; color: #333;">$<?php echo number_format($TeamFinance['CurrentBankAccount'] ?? 0); ?></div>
                        <div style="font-size: 12px; color: #666;">Current Bank Account</div>
</div>
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $LeagueYear; ?></div>
                        <div style="font-size: 12px; color: #666;">Current League Year</div>
</div>
                </div>
</div>

            <!-- Tableau des contrats Farm -->
            <div class="cap-table-container" style="overflow-x: auto;">
                <table class="cap-table" style="width: 100%; font-size: 11px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="width: 140px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: left; font-weight: bold;">Player Name</th>
                            <th style="width: 45px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">POS</th>
                            <th style="width: 25px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Age</th>
                            <th style="width: 45px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Birthday</th>
                            <th style="width: 35px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Terms</th>
                            <th style="width: 25px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Contract</th>
                            <th style="width: 25px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Cap %</th>
                            <?php
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;\">Year " . $LeagueYear . "</th>";
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;\">Year " . ($LeagueYear + 1) . "</th>";
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;\">Year " . ($LeagueYear + 2) . "</th>";
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;\">Year " . ($LeagueYear + 3) . "</th>";
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;\">Year " . ($LeagueYear + 4) . "</th>";
                            ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Section des attaquants farm
                        echo "<tr style=\"background: #e3f2fd; font-weight: bold;\"><td colspan=\"12\" style=\"padding: 8px 4px; border: 1px solid #ddd;\">Farm Forwards</td></tr>";
                        
                        $FoundDFarm = false;
                        $FoundGFarm = false;
                        $AverageAgeFarm = 0;
                        $AverageCap1Farm = 0;
                        $AverageCap2Farm = 0;
                        $AverageCap3Farm = 0;
                        $AverageCap4Farm = 0;
                        $AverageCap5Farm = 0;
                        $AverageCountFarm = 0;
                        $AverageTotalCap1Farm = 0;
                        $AverageTotalCap2Farm = 0;
                        $AverageTotalCap3Farm = 0;
                        $AverageTotalCap4Farm = 0;
                        $AverageTotalCap5Farm = 0;
                        $AverageTotalCountFarm = 0;
                        
                        if ($FarmPlayerSalaryCap) {
                            while ($Row = $FarmPlayerSalaryCap->fetchArray()) {
                                // Séparateur pour les défenseurs farm
                                if ($Row['PosD'] == "True" && $FoundDFarm == false) {
                                    if ($AverageCountFarm > 0) {
                                        echo "<tr style=\"background: #f8f9fa; font-weight: bold;\">";
                                        echo "<td colspan=\"2\">Average (" . $AverageCountFarm . ")</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageAgeFarm / $AverageCountFarm, 2) . "</td>";
                                        echo "<td colspan=\"3\"></td>";
                                        if ($SalaryCap > 0) {
                                            echo "<td style=\"text-align: center;\">" . number_format(($AverageCap1Farm / $SalaryCap) * 100, 2) . "%</td>";
                                        } else {
                                            echo "<td style=\"text-align: center;\">N/A</td>";
                                        }
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap1Farm, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap2Farm, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap3Farm, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap4Farm, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap5Farm, 0) . "$</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr style=\"background: #e3f2fd; font-weight: bold;\"><td colspan=\"12\" style=\"padding: 8px 4px; border: 1px solid #ddd;\">Farm Defensemen</td></tr>";
                                    $AverageTotalCap1Farm = $AverageTotalCap1Farm + $AverageCap1Farm;
                                    $AverageTotalCap2Farm = $AverageTotalCap2Farm + $AverageCap2Farm;
                                    $AverageTotalCap3Farm = $AverageTotalCap3Farm + $AverageCap3Farm;
                                    $AverageTotalCap4Farm = $AverageTotalCap4Farm + $AverageCap4Farm;
                                    $AverageTotalCap5Farm = $AverageTotalCap5Farm + $AverageCap5Farm;
                                    $AverageTotalCountFarm = $AverageTotalCountFarm + $AverageCountFarm;
                                    $AverageAgeFarm = 0;
                                    $AverageCap1Farm = 0;
                                    $AverageCap2Farm = 0;
                                    $AverageCap3Farm = 0;
                                    $AverageCap4Farm = 0;
                                    $AverageCap5Farm = 0;
                                    $AverageCountFarm = 0;
                                    $FoundDFarm = true;
                                }
                                
                                // Séparateur pour les gardiens farm
                                if ($Row['PosG'] == "True" && $FoundGFarm == false) {
                                    if ($AverageCountFarm > 0) {
                                        echo "<tr style=\"background: #f8f9fa; font-weight: bold;\">";
                                        echo "<td colspan=\"2\">Average (" . $AverageCountFarm . ")</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageAgeFarm / $AverageCountFarm, 2) . "</td>";
                                        echo "<td colspan=\"3\"></td>";
                                        if ($SalaryCap > 0) {
                                            echo "<td style=\"text-align: center;\">" . number_format(($AverageCap1Farm / $SalaryCap) * 100, 2) . "%</td>";
                                        } else {
                                            echo "<td style=\"text-align: center;\">N/A</td>";
                                        }
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap1Farm, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap2Farm, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap3Farm, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap4Farm, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap5Farm, 0) . "$</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr style=\"background: #e3f2fd; font-weight: bold;\"><td colspan=\"12\" style=\"padding: 8px 4px; border: 1px solid #ddd;\">Farm Goalies</td></tr>";
                                    $AverageTotalCap1Farm = $AverageTotalCap1Farm + $AverageCap1Farm;
                                    $AverageTotalCap2Farm = $AverageTotalCap2Farm + $AverageCap2Farm;
                                    $AverageTotalCap3Farm = $AverageTotalCap3Farm + $AverageCap3Farm;
                                    $AverageTotalCap4Farm = $AverageTotalCap4Farm + $AverageCap4Farm;
                                    $AverageTotalCap5Farm = $AverageTotalCap5Farm + $AverageCap5Farm;
                                    $AverageTotalCountFarm = $AverageTotalCountFarm + $AverageCountFarm;
                                    $AverageAgeFarm = 0;
                                    $AverageCap1Farm = 0;
                                    $AverageCap2Farm = 0;
                                    $AverageCap3Farm = 0;
                                    $AverageCap4Farm = 0;
                                    $AverageCap5Farm = 0;
                                    $AverageCountFarm = 0;
                                    $FoundGFarm = true;
                                }
                                
                                $AverageCountFarm = $AverageCountFarm + 1;
                            
                            echo "<tr>";
                                // Nom du joueur avec lien
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd;\">";
                                if ($Row['PosG'] == "True") {
                                    echo "<a href=\"GoalieReport.php?Goalie=" . ($Row['Number'] - 10000) . "\">";
                                } else {
                                    echo "<a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">";
                                }
                                echo $Row['Name'] . "</a></td>";
                                
                                // Position
                                $Position = "";
                                if ($Row['PosC'] == "True") {
                                    if ($Position == "") {
                                        $Position = "C";
                                    } else {
                                        $Position = $Position . "/C";
                                    }
                                }
                                if ($Row['PosLW'] == "True") {
                                    if ($Position == "") {
                                        $Position = "LW";
                                    } else {
                                        $Position = $Position . "/LW";
                                    }
                                }
                                if ($Row['PosRW'] == "True") {
                                    if ($Position == "") {
                                        $Position = "RW";
                                    } else {
                                        $Position = $Position . "/RW";
                                    }
                                }
                                if ($Row['PosD'] == "True") {
                                    if ($Position == "") {
                                        $Position = "D";
                                    } else {
                                        $Position = $Position . "/D";
                                    }
                                }
                                if ($Row['PosG'] == "True") {
                                    if ($Position == "") {
                                        $Position = "G";
                                    }
                                }
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . $Position . "</td>";
                                
                                // Âge
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . $Row['Age'] . "</td>";
                                $AverageAgeFarm = $AverageAgeFarm + $Row['Age'];
                                
                                // Date de naissance
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . $Row['AgeDate'] . "</td>";
                                
                                // Termes spéciaux
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">";
                                if ($Row['ForceWaiver'] == "True") {
                                    echo "FV ";
                                }
                                if ($Row['NoTrade'] == "True") {
                                    echo "NT ";
                                }
                                if ($Row['Condition'] < '95') {
                                    echo "IN ";
                                }
                                if ($Row['CanPlayPro'] == "True" && $Row['CanPlayFarm'] == "True") {
                                    echo "TW ";
                                }
                                echo "</td>";
                                
                                // Durée du contrat
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . $Row['Contract'] . "</td>";
                                
                                // Pourcentage du salary cap
                                if ($SalaryCap > 0) {
                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format(($Row['SalaryCap'] / $SalaryCap) * 100, 2) . "%</td>";
                                } else {
                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">N/A</td>";
                                }
                                
                                // Salaires par année
                                for ($i = 1; $i <= 5; $i = $i + 1) {
                                    if ($Row['Contract'] >= $i) {
                                        $salaryField = 'Salary' . $i;
                                        $salaryValue = isset($Row[$salaryField]) ? (float)$Row[$salaryField] : 0;
                                        echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($salaryValue, 0) . "$</td>";
                                        ${'AverageCap' . $i . 'Farm'} = ${'AverageCap' . $i . 'Farm'} + $salaryValue;
                                    } elseif ($Row['Contract'] + 1 == $i) {
                                        if ($LeagueOutputOption['FreeAgentUseDateInsteadofDay'] == "True") {
                                            $age = date_diff(date_create($Row['AgeDate']), date_create($LeagueOutputOption['FreeAgentRealDate']))->y;
                                        } else {
                                            $age = $Row['Age'];
                                        }
                                        if ($age + $i > $LeagueGeneral['UFAAge']) {
                                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #ffebee; color: #c62828;\">UFA [Age: " . ($age + $i - 1) . "]</td>";
                                        } elseif ($age + $i > $LeagueGeneral['RFAAge']) {
                                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #fff3e0; color: #ef6c00;\">RFA [Age: " . ($age + $i - 1) . "]</td>";
                                        }
                                    } else {
                                        echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\"></td>";
                                    }
                                }
                            echo "</tr>";
                        }
                    }
                        
                        // Moyenne de la dernière section farm
                        if ($AverageCountFarm > 0) {
                            echo "<tr style=\"background: #f8f9fa; font-weight: bold;\">";
                            echo "<td colspan=\"2\">Average (" . $AverageCountFarm . ")</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageAgeFarm / $AverageCountFarm, 2) . "</td>";
                            echo "<td colspan=\"3\"></td>";
                            if ($SalaryCap > 0) {
                                echo "<td style=\"text-align: center;\">" . number_format(($AverageCap1Farm / $SalaryCap) * 100, 2) . "%</td>";
                            } else {
                                echo "<td style=\"text-align: center;\">N/A</td>";
                            }
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap1Farm, 0) . "$</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap2Farm, 0) . "$</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap3Farm, 0) . "$</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap4Farm, 0) . "$</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap5Farm, 0) . "$</td>";
                            echo "</tr>";
                            $AverageTotalCap1Farm = $AverageTotalCap1Farm + $AverageCap1Farm;
                            $AverageTotalCap2Farm = $AverageTotalCap2Farm + $AverageCap2Farm;
                            $AverageTotalCap3Farm = $AverageTotalCap3Farm + $AverageCap3Farm;
                            $AverageTotalCap4Farm = $AverageTotalCap4Farm + $AverageCap4Farm;
                            $AverageTotalCap5Farm = $AverageTotalCap5Farm + $AverageCap5Farm;
                            $AverageTotalCountFarm = $AverageTotalCountFarm + $AverageCountFarm;
                        }
                        
                        // Total farm
                        if ($AverageTotalCountFarm > 0) {
                            echo "<tr style=\"background: #f0f8ff; font-weight: bold;\">";
                            echo "<td colspan=\"6\" style=\"padding: 6px 4px; border: 1px solid #ddd;\">Farm Total (" . $AverageTotalCountFarm . ")</td>";
                            if ($SalaryCap > 0) {
                                if ($AverageTotalCap1Farm / $SalaryCap > 1) {
                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #f44336; color: #fff;\">" . number_format(($AverageTotalCap1Farm / $SalaryCap) * 100, 2) . "%</td>";
                                } elseif ($AverageTotalCap1Farm / $SalaryCap > 0.95) {
                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #FFA500;\">" . number_format(($AverageTotalCap1Farm / $SalaryCap) * 100, 2) . "%</td>";
                                } elseif ($AverageTotalCap1Farm / $SalaryCap > 0.90) {
                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #FFFF00;\">" . number_format(($AverageTotalCap1Farm / $SalaryCap) * 100, 2) . "%</td>";
                                } else {
                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #00ff00;\">" . number_format(($AverageTotalCap1Farm / $SalaryCap) * 100, 2) . "%</td>";
                                }
                            } else {
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">N/A</td>";
                            }
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap1Farm, 0) . "$</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap2Farm, 0) . "$</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap3Farm, 0) . "$</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap4Farm, 0) . "$</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap5Farm, 0) . "$</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            </div>
            
            <!-- Légende -->
            <div class="cap-legend" style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; border: 1px solid #e9ecef;">
                <h4 style="margin-bottom: 15px; color: var(--primary-color);">Terms Legend</h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px; font-size: 12px;">
                    <div><strong>FV:</strong> Force Waiver</div>
                    <div><strong>NT:</strong> No Trade Clause</div>
                    <div><strong>IN:</strong> Injured</div>
                    <div><strong>TW:</strong> Two-Way Contract</div>
                    <div><strong>RFA:</strong> Restricted Free Agent</div>
                    <div><strong>UFA:</strong> Unrestricted Free Agent</div>
                </div>
                <div style="margin-top: 15px; font-size: 12px; color: #666;">
                    <strong>Note:</strong> Salary Cap Overview based on league salary cap of <strong>$<?php echo number_format($SalaryCap); ?></strong>.
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

<?php include "Footer.php"; ?>

<script>
// Script pour les onglets (même que ProTeam.php)
document.addEventListener('DOMContentLoaded', function() {
    const tabLinks = document.querySelectorAll('.tabmain-links a');
    const tabContents = document.querySelectorAll('.tabmain');

    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Retirer la classe active de tous les liens et contenus
            tabLinks.forEach(l => l.parentElement.classList.remove('activemain'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Ajouter la classe active au lien cliqué
            this.parentElement.classList.add('activemain');
            
            // Afficher le contenu correspondant
            const targetId = this.getAttribute('href').substring(1);
            document.getElementById(targetId).classList.add('active');
        });
    });
});

$(function() {
	$(".STHSFarmTeamPlayerRoster_Table").tablesorter({
        sortList: [[20,1]],
        widgets: ['staticRow']
    });
	$(".STHSFarmTeamGoalieRoster_Table").tablesorter({
        sortList: [[17,1]],
        widgets: ['staticRow']
    });
	$(".STHSFarmTeamPlayerStats_Table").tablesorter({
        sortList: [[5,1]],
        widgets: ['staticRow']
    });
	$(".STHSFarmTeamGoalieStats_Table").tablesorter({
        sortList: [[2,1]],
        widgets: ['staticRow']
    });
});
</script>

</body>
</html>