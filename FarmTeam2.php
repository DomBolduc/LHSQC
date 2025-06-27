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
            $Query = "SELECT GoalerFarmStat.*, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.Jersey, GoalerInfo.NHLID, ROUND((CAST(GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SecondPlay / 60))*60,3) AS GAA, ROUND((CAST(GoalerFarmStat.SA - GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SA)),3) AS PCT, ROUND((CAST(GoalerFarmStat.PenalityShotsShots - GoalerFarmStat.PenalityShotsGoals AS REAL) / (GoalerFarmStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerInfo INNER JOIN GoalerFarmStat ON GoalerInfo.Number = GoalerFarmStat.Number WHERE ((GoalerInfo.Team)=" . $Team . ") AND ((GoalerFarmStat.GP)>0) ORDER BY W DESC, GoalerFarmStat.GP DESC LIMIT 1";
            $TeamLeaderW = $db->querySingle($Query, true);
            
            // Récupération du roster complet des joueurs farm (Status1 <= 1)
            $Query = "SELECT PlayerFarmStat.*, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, PlayerInfo.Jersey, PlayerInfo.Age, PlayerInfo.Height, PlayerInfo.Weight, ROUND((CAST(PlayerFarmStat.G AS REAL) / (PlayerFarmStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerFarmStat.SecondPlay AS REAL) / 60 / (PlayerFarmStat.GP)),2) AS AMG, ROUND((CAST(PlayerFarmStat.FaceOffWon AS REAL) / (PlayerFarmStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerFarmStat.P AS REAL) / (PlayerFarmStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerFarmStat ON PlayerInfo.Number = PlayerFarmStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 <= 1) AND (PlayerFarmStat.GP>0)) ORDER BY PlayerFarmStat.P DESC, PlayerFarmStat.GP ASC";
            $PlayerRoster = $db->query($Query);
            
            // Récupération du roster des gardiens farm
            $Query = "SELECT GoalerFarmStat.*, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.Jersey, GoalerInfo.NHLID, GoalerInfo.Age, GoalerInfo.Height, GoalerInfo.Weight, ROUND((CAST(GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SecondPlay / 60))*60,3) AS GAA, ROUND((CAST(GoalerFarmStat.SA - GoalerFarmStat.GA AS REAL) / (GoalerFarmStat.SA)),3) AS PCT, ROUND((CAST(GoalerFarmStat.PenalityShotsShots - GoalerFarmStat.PenalityShotsGoals AS REAL) / (GoalerFarmStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerInfo INNER JOIN GoalerFarmStat ON GoalerInfo.Number = GoalerFarmStat.Number WHERE ((GoalerInfo.Team)=" . $Team . ") AND ((GoalerFarmStat.GP)>0) ORDER BY W DESC, GoalerFarmStat.GP DESC";
            $GoalieRoster = $db->query($Query);
            
            // Récupération des informations du coach farm
            $Query = "SELECT CoachInfo.* FROM CoachInfo INNER JOIN TeamFarmInfo ON CoachInfo.Number = TeamFarmInfo.CoachID WHERE (CoachInfo.Team)=" . $Team;
            $CoachInfo = $db->querySingle($Query, true);
            
            // Récupération des capitaines farm
            $Query = "SELECT TeamFarmInfo.Name as TeamName, PlayerInfo_1.Name As Captain, PlayerInfo_2.Name as Assistant1, PlayerInfo_3.Name as Assistant2 FROM ((TeamFarmInfo LEFT JOIN PlayerInfo AS PlayerInfo_1 ON TeamFarmInfo.Captain = PlayerInfo_1.Number) LEFT JOIN PlayerInfo AS PlayerInfo_2 ON TeamFarmInfo.Assistant1 = PlayerInfo_2.Number) LEFT JOIN PlayerInfo AS PlayerInfo_3 ON TeamFarmInfo.Assistant2 = PlayerInfo_3.Number WHERE TeamFarmInfo.Number = " . $Team;
            $TeamLeader = $db->querySingle($Query, true);
            
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
                
                <!-- Bouton Pro Team -->
                <a href="ProTeam2.php?Team=<?php echo $Team; ?>" class="pro-team-btn" style="display: inline-block; margin-left: 15px; padding: 6px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; font-size: 12px; font-weight: bold; transition: background-color 0.3s;">
                    <i class="fa fa-star" style="margin-right: 5px;"></i>Pro Team
                </a>
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
        <li><a href="#tabmain5">Depth</a></li>
        <li><a href="#tabmain6">Capology</a></li>
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
                            echo "<div class='no-games'>Aucun match programmé</div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Team Leaders -->
                <div class="stat-card">
                    <h3>Team Leaders</h3>
                    <div class="leaders-grid">
                        <?php if ($TeamLeaderP): ?>
                        <div class="leader-item">
                            <div class="leader-label">Points Leader</div>
                            <div class="leader-name"><?php echo $TeamLeaderP['Name']; ?></div>
                            <div class="leader-stat"><?php echo $TeamLeaderP['P']; ?> PTS</div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($TeamLeaderG): ?>
                        <div class="leader-item">
                            <div class="leader-label">Goals Leader</div>
                            <div class="leader-name"><?php echo $TeamLeaderG['Name']; ?></div>
                            <div class="leader-stat"><?php echo $TeamLeaderG['G']; ?> G</div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($TeamLeaderA): ?>
                        <div class="leader-item">
                            <div class="leader-label">Assists Leader</div>
                            <div class="leader-name"><?php echo $TeamLeaderA['Name']; ?></div>
                            <div class="leader-stat"><?php echo $TeamLeaderA['A']; ?> A</div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($TeamLeaderW): ?>
                        <div class="leader-item">
                            <div class="leader-label">Top Goalie</div>
                            <div class="leader-name"><?php echo $TeamLeaderW['Name']; ?></div>
                            <div class="leader-stat"><?php echo $TeamLeaderW['W']; ?> W</div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Team Stats Overview -->
                <div class="stat-card">
                    <h3>Team Stats Overview</h3>
                    <div class="stats-overview">
                        <div class="stat-row">
                            <span class="stat-label">Goals For:</span>
                            <span class="stat-value"><?php echo $TeamStat['GF'] ?? 0; ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Goals Against:</span>
                            <span class="stat-value"><?php echo $TeamStat['GA'] ?? 0; ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Power Play:</span>
                            <span class="stat-value"><?php echo $TeamStat['PPAttemp'] > 0 ? round(($TeamStat['PPGoal'] / $TeamStat['PPAttemp']) * 100, 1) : 0; ?>%</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Penalty Kill:</span>
                            <span class="stat-value"><?php echo $TeamStat['PKAttemp'] > 0 ? round((($TeamStat['PKAttemp'] - $TeamStat['PKGoalGA']) / $TeamStat['PKAttemp']) * 100, 1) : 0; ?>%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Onglet Roster -->
        <div class="tabmain" id="tabmain1">
            <h3>Farm Team Roster</h3>
            
            <!-- Roster des joueurs -->
            <h4>Forwards & Defensemen</h4>
            <table class="STHSPHPPlayerStat_Table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Pos</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>GP</th>
                        <th>G</th>
                        <th>A</th>
                        <th>P</th>
                        <th>+/-</th>
                        <th>PIM</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($PlayerRoster) {
                        while ($Player = $PlayerRoster->fetchArray()) {
                            echo "<tr>";
                            echo "<td><a href='PlayerReport.php?Player=" . $Player['Number'] . "'>" . $Player['Name'] . "</a></td>";
                            
                            // Position
                            $Position = "";
                            if ($Player['PosC'] == "True") $Position .= "C";
                            if ($Player['PosLW'] == "True") $Position .= ($Position ? "/" : "") . "LW";
                            if ($Player['PosRW'] == "True") $Position .= ($Position ? "/" : "") . "RW";
                            if ($Player['PosD'] == "True") $Position .= ($Position ? "/" : "") . "D";
                            echo "<td>" . $Position . "</td>";
                            
                            echo "<td>" . $Player['Age'] . "</td>";
                            echo "<td>" . $Player['Height'] . "</td>";
                            echo "<td>" . $Player['Weight'] . "</td>";
                            echo "<td>" . $Player['GP'] . "</td>";
                            echo "<td>" . $Player['G'] . "</td>";
                            echo "<td>" . $Player['A'] . "</td>";
                            echo "<td>" . $Player['P'] . "</td>";
                            echo "<td>" . $Player['PlusMinus'] . "</td>";
                            echo "<td>" . $Player['Pim'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            
            <!-- Roster des gardiens -->
            <h4>Goalies</h4>
            <table class="STHSPHPPlayerStat_Table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>GP</th>
                        <th>W</th>
                        <th>L</th>
                        <th>OTL</th>
                        <th>GAA</th>
                        <th>SV%</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($GoalieRoster) {
                        while ($Goalie = $GoalieRoster->fetchArray()) {
                            echo "<tr>";
                            echo "<td><a href='GoalieReport.php?Goalie=" . $Goalie['Number'] . "'>" . $Goalie['Name'] . "</a></td>";
                            echo "<td>" . $Goalie['Age'] . "</td>";
                            echo "<td>" . $Goalie['Height'] . "</td>";
                            echo "<td>" . $Goalie['Weight'] . "</td>";
                            echo "<td>" . $Goalie['GP'] . "</td>";
                            echo "<td>" . $Goalie['W'] . "</td>";
                            echo "<td>" . $Goalie['L'] . "</td>";
                            echo "<td>" . $Goalie['OTL'] . "</td>";
                            echo "<td>" . number_format($Goalie['GAA'], 2) . "</td>";
                            echo "<td>" . number_format($Goalie['PCT'] * 100, 1) . "%</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Onglet Stats -->
        <div class="tabmain" id="tabmain2">
            <h3>Farm Team Statistics</h3>
            <p>Statistiques détaillées de l'équipe farm...</p>
        </div>

        <!-- Onglet Schedule -->
        <div class="tabmain" id="tabmain3">
            <h3>Farm Team Schedule</h3>
            
            <?php
            // Récupération du calendrier complet de l'équipe farm
            $Query = "SELECT * FROM ScheduleFarm WHERE (VisitorTeam = " . $Team . " OR HomeTeam = " . $Team . ") ORDER BY GameNumber";
            $Schedule = $db->query($Query);
            ?>
            
            <div class="schedule-container">
                <table class="STHSPHPPlayerStat_Table" style="width: 100%; font-size: 11px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                    <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Game #</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Date</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Visitor</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Home</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Visitor Score</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Home Score</th>
                            <th style="padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Status</th>
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
                                }
                                
                                echo "<tr>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $GameNumber . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Game['Date'] . "</td>";
                                
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
                                
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' style='padding: 6px 4px; border: 1px solid #ddd; text-align: center;'>Aucun match programmé</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Onglet Lines -->
        <div class="tabmain" id="tabmain4">
            <h3>Farm Team Lines</h3>
            <p>Compositions de l'équipe farm...</p>
        </div>

        <!-- Onglet Depth -->
        <div class="tabmain" id="tabmain5">
            <h3>Farm Team Depth Chart</h3>
            <p>Organigramme de profondeur de l'équipe farm...</p>
        </div>

        <!-- Onglet Capology -->
        <div class="tabmain" id="tabmain6">
            <h3>Farm Team Salary Cap Overview</h3>
            <p>Informations sur le salary cap de l'équipe farm...</p>
        </div>
    </div>
</div>

</div>
</div>

<?php include "Footer.php"; ?>

<script>
// Script pour les onglets (même que ProTeam2.php)
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
</script>

</body>
</html>