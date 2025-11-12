<?php include "Header.php"; ?>

<!-- CSS moderne et épuré pour ProTeam -->
<link href="css/proteam-modern.css" rel="stylesheet" type="text/css">

<?php
// Configuration de la base de données
$DatabaseFile = "LHSQC-STHS.db";

// Fonction pour convertir le code pays en drapeau emoji
function getCountryFlag($countryCode) {
    // Pour l'instant, on affiche seulement le code du pays
    // Les emojis de drapeaux peuvent ne pas s'afficher correctement sur tous les systèmes
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
        
        $Query = "SELECT count(*) AS count FROM TeamProInfo WHERE Number = " . $Team;
        $Result = $db->querySingle($Query, true);
        
        if ($Result['count'] == 1){
            // Récupération des informations de l'équipe
            $Query = "SELECT * FROM TeamProInfo WHERE Number = " . $Team;
            $TeamInfo = $db->querySingle($Query, true);

            // Récupération des informations de l'équipe farm correspondante
            $Query = "SELECT Name, TeamThemeID FROM TeamFarmInfo WHERE Number = " . $Team;
            $FarmTeamInfo = $db->querySingle($Query, true);
            
            // Récupération des statistiques de l'équipe
            $Query = "SELECT * FROM TeamProStat WHERE Number = " . $Team;
            $TeamStat = $db->querySingle($Query, true);
            
            // Récupération des informations financières
            $Query = "SELECT * FROM TeamProFinance WHERE Number = " . $Team;
            $TeamFinance = $db->querySingle($Query, true);
            
            // Récupération des informations de la ligue pour le salary cap
            $Query = "Select ProSalaryCapValue from LeagueFinance";
            $LeagueFinance = $db->querySingle($Query, true);
            
            $Query = "SELECT PlayerProStat.*, PlayerInfo.Name, PlayerInfo.NHLID, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG, ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 >= 2) AND (PlayerProStat.GP>0)) ORDER BY PlayerProStat.P DESC, PlayerProStat.GP ASC LIMIT 1";
            $TeamLeaderP = $db->querySingle($Query, true);
            
            // Récupération du leader en buts - AVEC NHLID
            $Query = "SELECT PlayerProStat.*, PlayerInfo.Name, PlayerInfo.NHLID, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG, ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 >= 2) AND (PlayerProStat.GP>0)) ORDER BY PlayerProStat.G DESC, PlayerProStat.GP ASC, PlayerProStat.P DESC LIMIT 1";
            $TeamLeaderG = $db->querySingle($Query, true);
            
            // Récupération du leader en passes - AVEC NHLID
            $Query = "SELECT PlayerProStat.*, PlayerInfo.Name, PlayerInfo.NHLID, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG, ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 >= 2) AND (PlayerProStat.GP>0)) ORDER BY PlayerProStat.A DESC, PlayerProStat.P DESC, PlayerProStat.GP ASC LIMIT 1";
            $TeamLeaderA = $db->querySingle($Query, true);
            
            // La requête pour les gardiens est déjà correcte car GoalerInfo.NHLID est déjà inclus
            $Query = "SELECT GoalerProStat.*, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.Jersey, GoalerInfo.NHLID, ROUND((CAST(GoalerProStat.GA AS REAL) / (GoalerProStat.SecondPlay / 60))*60,3) AS GAA, ROUND((CAST(GoalerProStat.SA - GoalerProStat.GA AS REAL) / (GoalerProStat.SA)),3) AS PCT, ROUND((CAST(GoalerProStat.PenalityShotsShots - GoalerProStat.PenalityShotsGoals AS REAL) / (GoalerProStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerInfo INNER JOIN GoalerProStat ON GoalerInfo.Number = GoalerProStat.Number WHERE ((GoalerInfo.Team)=" . $Team . ") AND ((GoalerProStat.GP)>0) ORDER BY W DESC, GoalerProStat.GP DESC LIMIT 1";
            $TeamLeaderW = $db->querySingle($Query, true);
            // Récupération du roster complet des joueurs
            $Query = "SELECT PlayerProStat.*, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, PlayerInfo.Jersey, PlayerInfo.Age, PlayerInfo.Height, PlayerInfo.Weight, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG, ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 >= 2) AND (PlayerProStat.GP>0)) ORDER BY PlayerProStat.P DESC, PlayerProStat.GP ASC";
            $PlayerRoster = $db->query($Query);
            
            // Récupération du roster des gardiens
            $Query = "SELECT GoalerProStat.*, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.Jersey, GoalerInfo.NHLID, GoalerInfo.Age, GoalerInfo.Height, GoalerInfo.Weight, ROUND((CAST(GoalerProStat.GA AS REAL) / (GoalerProStat.SecondPlay / 60))*60,3) AS GAA, ROUND((CAST(GoalerProStat.SA - GoalerProStat.GA AS REAL) / (GoalerProStat.SA)),3) AS PCT, ROUND((CAST(GoalerProStat.PenalityShotsShots - GoalerProStat.PenalityShotsGoals AS REAL) / (GoalerProStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerInfo INNER JOIN GoalerProStat ON GoalerInfo.Number = GoalerProStat.Number WHERE ((GoalerInfo.Team)=" . $Team . ") AND ((GoalerProStat.GP)>0) ORDER BY W DESC, GoalerProStat.GP DESC";
            $GoalieRoster = $db->query($Query);
            
            // Récupération des informations du coach
            $Query = "SELECT CoachInfo.* FROM CoachInfo INNER JOIN TeamProInfo ON CoachInfo.Number = TeamProInfo.CoachID WHERE (CoachInfo.Team)=" . $Team;
            $CoachInfo = $db->querySingle($Query, true);
            
            // Récupération des capitaines
            $Query = "SELECT TeamProInfo.Name as TeamName, PlayerInfo_1.Name As Captain, PlayerInfo_2.Name as Assistant1, PlayerInfo_3.Name as Assistant2 FROM ((TeamProInfo LEFT JOIN PlayerInfo AS PlayerInfo_1 ON TeamProInfo.Captain = PlayerInfo_1.Number) LEFT JOIN PlayerInfo AS PlayerInfo_2 ON TeamProInfo.Assistant1 = PlayerInfo_2.Number) LEFT JOIN PlayerInfo AS PlayerInfo_3 ON TeamProInfo.Assistant2 = PlayerInfo_3.Number WHERE TeamProInfo.Number = " . $Team;
            $TeamLeader = $db->querySingle($Query, true);
            
            // Récupération des prospects
            $Query = "SELECT ProspectInfo.*, ProspectStat.* FROM ProspectInfo INNER JOIN ProspectStat ON ProspectInfo.Number = ProspectStat.Number WHERE ProspectInfo.Team = " . $Team . " ORDER BY ProspectStat.P DESC LIMIT 10";
            $Prospects = $db->query($Query);
            
            // Récupération des moyennes de la ligue pour le graphique
            $Query = "SELECT 
                AVG(CAST(GF AS REAL) / CAST(GP AS REAL)) as AvgGFPerGame,
                AVG(CAST(GA AS REAL) / CAST(GP AS REAL)) as AvgGAPerGame,
                AVG(CAST(ShotsFor AS REAL) / CAST(GP AS REAL)) as AvgShotsForPerGame,
                AVG(CAST(ShotsAga AS REAL) / CAST(GP AS REAL)) as AvgShotsAgaPerGame,
                AVG(CASE WHEN PPAttemp > 0 THEN CAST(PPGoal AS REAL) / CAST(PPAttemp AS REAL) * 100 ELSE 0 END) as AvgPPPercentage,
                AVG(CASE WHEN PKAttemp > 0 THEN (CAST(PKAttemp AS REAL) - CAST(PKGoalGA AS REAL)) / CAST(PKAttemp AS REAL) * 100 ELSE 0 END) as AvgPKPercentage,
                AVG(CAST(Pim AS REAL) / CAST(GP AS REAL)) as AvgPimPerGame,
                AVG(CAST(Hits AS REAL) / CAST(GP AS REAL)) as AvgHitsPerGame
                FROM TeamProStat WHERE GP > 0";
            $LeagueAverages = $db->querySingle($Query, true);
            
            // Récupération des valeurs maximales de la ligue pour normaliser les barres
            $Query = "SELECT 
                MAX(CAST(GF AS REAL) / CAST(GP AS REAL)) as MaxGFPerGame,
                MAX(CAST(GA AS REAL) / CAST(GP AS REAL)) as MaxGAPerGame,
                MAX(CAST(ShotsFor AS REAL) / CAST(GP AS REAL)) as MaxShotsForPerGame,
                MAX(CAST(ShotsAga AS REAL) / CAST(GP AS REAL)) as MaxShotsAgaPerGame,
                MAX(CASE WHEN PPAttemp > 0 THEN CAST(PPGoal AS REAL) / CAST(PPAttemp AS REAL) * 100 ELSE 0 END) as MaxPPPercentage,
                MAX(CASE WHEN PKAttemp > 0 THEN (CAST(PKAttemp AS REAL) - CAST(PKGoalGA AS REAL)) / CAST(PKAttemp AS REAL) * 100 ELSE 0 END) as MaxPKPercentage,
                MAX(CAST(Pim AS REAL) / CAST(GP AS REAL)) as MaxPimPerGame,
                MAX(CAST(Hits AS REAL) / CAST(GP AS REAL)) as MaxHitsPerGame
                FROM TeamProStat WHERE GP > 0";
            $LeagueMax = $db->querySingle($Query, true);
            
            // Récupération des noms des équipes avec les meilleures performances
            $Query = "SELECT TeamProInfo.Name as TeamName, 
                CAST(TeamProStat.GF AS REAL) / CAST(TeamProStat.GP AS REAL) as GFPerGame
                FROM TeamProStat 
                INNER JOIN TeamProInfo ON TeamProStat.Number = TeamProInfo.Number 
                WHERE TeamProStat.GP > 0 
                ORDER BY GFPerGame DESC LIMIT 1";
            $BestGFTeam = $db->querySingle($Query, true);
            
            $Query = "SELECT TeamProInfo.Name as TeamName, 
                CAST(TeamProStat.GA AS REAL) / CAST(TeamProStat.GP AS REAL) as GAPerGame
                FROM TeamProStat 
                INNER JOIN TeamProInfo ON TeamProStat.Number = TeamProInfo.Number 
                WHERE TeamProStat.GP > 0 
                ORDER BY GAPerGame DESC LIMIT 1";
            $BestGATeam = $db->querySingle($Query, true);
            
            $Query = "SELECT TeamProInfo.Name as TeamName, 
                CAST(TeamProStat.ShotsFor AS REAL) / CAST(TeamProStat.GP AS REAL) as ShotsForPerGame
                FROM TeamProStat 
                INNER JOIN TeamProInfo ON TeamProStat.Number = TeamProInfo.Number 
                WHERE TeamProStat.GP > 0 
                ORDER BY ShotsForPerGame DESC LIMIT 1";
            $BestShotsForTeam = $db->querySingle($Query, true);
            
            $Query = "SELECT TeamProInfo.Name as TeamName, 
                CASE WHEN TeamProStat.PPAttemp > 0 THEN CAST(TeamProStat.PPGoal AS REAL) / CAST(TeamProStat.PPAttemp AS REAL) * 100 ELSE 0 END as PPPercentage
                FROM TeamProStat 
                INNER JOIN TeamProInfo ON TeamProStat.Number = TeamProInfo.Number 
                WHERE TeamProStat.GP > 0 
                ORDER BY PPPercentage DESC LIMIT 1";
            $BestPPTeam = $db->querySingle($Query, true);
            
            $Query = "SELECT TeamProInfo.Name as TeamName, 
                CASE WHEN TeamProStat.PKAttemp > 0 THEN (CAST(TeamProStat.PKAttemp AS REAL) - CAST(TeamProStat.PKGoalGA AS REAL)) / CAST(TeamProStat.PKAttemp AS REAL) * 100 ELSE 0 END as PKPercentage
                FROM TeamProStat 
                INNER JOIN TeamProInfo ON TeamProStat.Number = TeamProInfo.Number 
                WHERE TeamProStat.GP > 0 
                ORDER BY PKPercentage DESC LIMIT 1";
            $BestPKTeam = $db->querySingle($Query, true);
            
            $Query = "SELECT TeamProInfo.Name as TeamName, 
                CAST(TeamProStat.Hits AS REAL) / CAST(TeamProStat.GP AS REAL) as HitsPerGame
                FROM TeamProStat 
                INNER JOIN TeamProInfo ON TeamProStat.Number = TeamProInfo.Number 
                WHERE TeamProStat.GP > 0 
                ORDER BY HitsPerGame DESC LIMIT 1";
            $BestHitsTeam = $db->querySingle($Query, true);
            
            // Calcul des statistiques de l'équipe pour le graphique
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
            
            // Requêtes corrigées pour SchedulePro
            $Query = "SELECT * FROM SchedulePro WHERE Play = 'True' AND (VisitorTeam = " . $Team . " OR HomeTeam = " . $Team . ") ORDER BY GameNumber DESC LIMIT 2";
            $Last3Days = $db->query($Query);
            
            $Query = "SELECT * FROM SchedulePro WHERE Play = 'False' AND (VisitorTeam = " . $Team . " OR HomeTeam = " . $Team . ") ORDER BY GameNumber ASC LIMIT 3";
            $Next4Days = $db->query($Query);
            
            // Récupération des transactions récentes
            $Query = "SELECT * FROM Transaction WHERE (Team1 = " . $Team . " OR Team2 = " . $Team . ") ORDER BY Date DESC LIMIT 10";
            $Transactions = $db->query($Query);
            
            // Récupération des blessures
            $Query = "SELECT PlayerInfo.Name, PlayerInfo.Jersey, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, PlayerInfo.InjuryStatus, PlayerInfo.InjuryLength FROM PlayerInfo WHERE PlayerInfo.Team = " . $Team . " AND PlayerInfo.InjuryStatus > 0 ORDER BY PlayerInfo.InjuryLength DESC";
            $Injuries = $db->query($Query);
            
            $TeamName = $TeamInfo['Name'];
        } else {
            throw new Exception("Équipe non trouvée");
        }
    }
} catch (Exception $e) {
    $Team = 0;
    $TeamName = "Équipe non trouvée";
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

echo "<title>" . $LeagueName . " - " . $TeamName . "</title>";
?>

<body>

<header>
<?php include "components/GamesScroller.php"; ?>	 
<?php include "Menu.php"; ?>	
<div class="container p-2">  

<!-- Header moderne de l'équipe avec logo -->
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
                
                <!-- Logo Farm Team cliquable -->
                <?php if ($FarmTeamInfo && $FarmTeamInfo['TeamThemeID'] > 0): ?>
                    <a href="FarmTeam.php?Team=<?php echo $Team; ?>" class="farm-team-logo-btn"
                       style="display: inline-block; margin-left: 15px; padding: 4px; background: #f8f9fa; border: 2px solid #28a745; border-radius: 50%; transition: all 0.3s ease; text-decoration: none; vertical-align: middle;"
                       title="<?php echo htmlspecialchars($FarmTeamInfo['Name']); ?> - Farm Team"
                       onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 4px 8px rgba(40, 167, 69, 0.3)';"
                       onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                        <img src="<?php echo $ImagesCDNPath; ?>/images/<?php echo $FarmTeamInfo['TeamThemeID']; ?>.png"
                             alt="<?php echo htmlspecialchars($FarmTeamInfo['Name']); ?>"
                             style="width: 32px; height: 32px; object-fit: contain; display: block; vertical-align: middle;">
                    </a>
                <?php else: ?>
                    <!-- Fallback si pas de logo farm -->
                    <a href="FarmTeam.php?Team=<?php echo $Team; ?>" class="farm-team-btn" style="display: inline-block; margin-left: 15px; padding: 6px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; font-size: 12px; font-weight: bold; transition: background-color 0.3s; vertical-align: middle;">
                        <i class="fa fa-users" style="margin-right: 5px;"></i>Farm Team
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
        <li><a href="#tabmain5">Depth</a></li>
        <li><a href="#tabmain6">Capology</a></li>
        <li><a href="#tabmain7">Prospects</a></li>
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
                                
                                // Récupérer les noms d'équipes6s depuis TeamProInfo
                                $Query = "SELECT Name, TeamThemeID FROM TeamProInfo WHERE Number = " . $HomeTeam;
                                $HomeTeamInfo = $db->querySingle($Query, true);
                                $Query = "SELECT Name, TeamThemeID FROM TeamProInfo WHERE Number = " . $VisitorTeam;
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
                                
                                // Récupérer les noms d'équipes depuis TeamProInfo
                                $Query = "SELECT Name, TeamThemeID FROM TeamProInfo WHERE Number = " . $HomeTeam;
                                $HomeTeamInfo = $db->querySingle($Query, true);
                                $Query = "SELECT Name, TeamThemeID FROM TeamProInfo WHERE Number = " . $VisitorTeam;
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

                <div class="stat-card">
                    <h3>Team Finance</h3>
                    <div class="stat-item">
                        <span class="stat-label">Salary Cap</span>
                        <span class="stat-value">$<?php echo number_format($TeamFinance['TotalPlayersSalaries'] ?? 0); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Budget</span>
                        <span class="stat-value">$<?php echo number_format($TeamFinance['CurrentBankAccount'] ?? 0); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Available</span>
                        <span class="stat-value">$<?php 
                            $ProSalaryCapValue = (int)($LeagueFinance['ProSalaryCapValue'] ?? 0);
                            $TeamSalaryCap = (int)($TeamFinance['TotalPlayersSalaries'] ?? 0);
                            echo number_format($ProSalaryCapValue - $TeamSalaryCap); 
                        ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Cap Space</span>
                        <span class="stat-value"><?php 
                            $ProSalaryCapValue = (int)($LeagueFinance['ProSalaryCapValue'] ?? 0);
                            $TeamSalaryCap = (int)($TeamFinance['TotalPlayersSalaries'] ?? 0);
                            echo $ProSalaryCapValue > 0 ? number_format((($ProSalaryCapValue - $TeamSalaryCap) / $ProSalaryCapValue) * 100, 1) : "0.0"; 
                        ?>%</span>
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
            <h3>Team Roster</h3>
            
            <!-- Table des joueurs avec ratings -->
            <div class="roster-container">
                <table class="roster-table tablesorter STHSProTeamPlayerRoster_Table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
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
                        // Récupération du roster complet des joueurs avec tous les ratings
                        $Query = "SELECT PlayerInfo.*, PlayerProStat.GP, PlayerProStat.G, PlayerProStat.A, PlayerProStat.P, PlayerProStat.PlusMinus FROM PlayerInfo LEFT JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE PlayerInfo.Team = " . $Team . " AND PlayerInfo.Status1 >= 2 ORDER BY PlayerInfo.PosD, PlayerInfo.Overall DESC";
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
                <table class="roster-table tablesorter STHSProTeamGoalieRoster_Table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
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
                        // Récupération du roster des gardiens avec tous les ratings
                        $Query = "SELECT * FROM GoalerInfo WHERE Team = " . $Team . " ORDER BY Overall DESC";
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
        </div>

        <!-- Onglet Stats -->
        <div class="tabmain" id="tabmain2" style="padding: 0px !important;">
            <h3>Players Statistics</h3>
            
            <!-- Tableau des statistiques des joueurs -->
            <div class="stats-container" style="overflow-x: auto !important; -webkit-overflow-scrolling: touch; display: block; max-width: 100%;">
                <table class="stats-table tablesorter STHSProTeamPlayerStats_Table" style="table-layout: fixed; width: 700px; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white; display: table;">
                    <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="width: 150px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Player</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">GP</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">G</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">A</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">P</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">+/-</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">PIM</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Shots</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Hits</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">PPG</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">GA</th>
                            <th style="width: 50px; padding: 4px 2px; border: 1px solid #ddd; text-align: center; font-weight: bold;">TA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Récupération des statistiques des joueurs
                        $Query = "SELECT PlayerInfo.Name, PlayerInfo.Number, PlayerProStat.GP, PlayerProStat.G, PlayerProStat.A, PlayerProStat.P, PlayerProStat.PlusMinus, PlayerProStat.PIM, PlayerProStat.Shots, PlayerProStat.Hits, PlayerProStat.PPG, PlayerProStat.GiveAway, PlayerProStat.TakeAway FROM PlayerInfo LEFT JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE PlayerInfo.Team = " . $Team . " AND PlayerInfo.Status1 >= 2 ORDER BY PlayerProStat.P DESC, PlayerProStat.G DESC";
                        $PlayerStats = $db->query($Query);
                        
                        if ($PlayerStats) {
                            while ($Player = $PlayerStats->fetchArray()) {
                                $strTemp = (string)$Player['Name'];
                                $playerClasses = "";
                                
                                if ($Player['Rookie'] == "True") { 
                                    $strTemp = $strTemp . " (R)"; 
                                    $playerClasses .= " rookie";
                                }
                                
                                echo "<tr>";
                                echo "<td class='player-name" . $playerClasses . "'><a href='PlayerReport.php?Player=" . $Player['Number'] . "'>" . $strTemp . "</a></td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['GP'] ?? 0) . "</td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['G'] ?? 0) . "</td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['A'] ?? 0) . "</td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px; font-weight: bold;'>" . ($Player['P'] ?? 0) . "</td>";
                                
                                // Plus/Minus avec couleur
                                $plusMinus = $Player['PlusMinus'] ?? 0;
                                $plusMinusClass = $plusMinus > 0 ? "positive" : ($plusMinus < 0 ? "negative" : "");
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px; " . ($plusMinusClass ? "color: " . ($plusMinusClass == "positive" ? "green" : "red") . ";" : "") . "'>" . ($plusMinus >= 0 ? "+" : "") . $plusMinus . "</td>";
                                
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['PIM'] ?? 0) . "</td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['Shots'] ?? 0) . "</td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['Hits'] ?? 0) . "</td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['PPG'] ?? 0) . "</td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['GiveAway'] ?? 0) . "</td>";
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 4px 2px;'>" . ($Player['TakeAway'] ?? 0) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12' style='text-align: center; border: 1px solid #ddd; padding: 10px;'>Aucune donnée disponible</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <h3>Goaltenders Statistics</h3>
            <div class="stats-container" style="overflow-x: auto !important; -webkit-overflow-scrolling: touch; display: block; max-width: 100%;">
                <table class="stats-table tablesorter STHSProTeamGoalieStats_Table" style="table-layout: fixed; width: 800px; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white; display: table;">
                    <thead>
                        <tr style="background: black; color: white;">
                            <th style="width: 150px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Player</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">GP</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">W</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">L</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">OTL</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">GAA</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">SV%</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">Mins</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">GA</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">SA</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">SO</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">PS%</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">A</th>
                            <th style="width: 50px; padding: 6px 4px; border: 1px solid #ddd; text-align: center; font-weight: bold;">PIM</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Récupération des statistiques des gardiens
                        $Query = "SELECT GoalerInfo.*, GoalerProStat.*, ROUND((CAST(GoalerProStat.GA AS REAL) / (GoalerProStat.SecondPlay / 60))*60,3) AS GAA, ROUND((CAST(GoalerProStat.SA - GoalerProStat.GA AS REAL) / (GoalerProStat.SA)),3) AS PCT, ROUND((CAST(GoalerProStat.PenalityShotsShots - GoalerProStat.PenalityShotsGoals AS REAL) / (GoalerProStat.PenalityShotsShots)),3) AS PenalityShotsPCT FROM GoalerInfo INNER JOIN GoalerProStat ON GoalerInfo.Number = GoalerProStat.Number WHERE GoalerInfo.Team = " . $Team . " AND GoalerInfo.Status1 >= 2 AND GoalerProStat.GP > 0 ORDER BY GoalerProStat.W DESC, GoalerProStat.GP DESC";
                        $GoalieStats = $db->query($Query);
                        
                        if ($GoalieStats) {
                            while ($Goalie = $GoalieStats->fetchArray()) {
                                echo "<tr>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: left;\">" . $Goalie['Name'] . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Goalie['GP'] . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Goalie['W'] . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Goalie['L'] . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . ($Goalie['OTL'] + $Goalie['SOL']) . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . number_format($Goalie['GAA'], 2) . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . number_format($Goalie['PCT'], 3) . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . floor($Goalie['SecondPlay'] / 60) . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Goalie['GA'] . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Goalie['SA'] . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Goalie['Shootout'] . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . number_format($Goalie['PenalityShotsPCT'] * 100, 1) . "%</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Goalie['A'] . "</td>";
                                echo "<td style=\"padding: 6px 4px; border: 1px solid #ddd; text-align: center;\">" . $Goalie['Pim'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='14' style='text-align: center; padding: 10px;'>Aucune donnée disponible</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Onglet Schedule -->
        <div class="tabmain" id="tabmain3" style="padding: 0px !important;">
            <h3>Team Schedule</h3>
            
            <!-- Filtres pour le calendrier -->
            <div class="schedule-filters" style="margin-bottom: 20px; padding: 10px; background: #f8f9fa; border-radius: 5px;">
                <label style="margin-right: 15px;">
                    <input type="radio" name="schedule-filter" value="all" checked style="margin-right: 5px;"> Tous les matchs
                </label>
                <label style="margin-right: 15px;">
                    <input type="radio" name="schedule-filter" value="home" style="margin-right: 5px;"> Matchs à domicile
                </label>
                <label style="margin-right: 15px;">
                    <input type="radio" name="schedule-filter" value="away" style="margin-right: 5px;"> Matchs à l'extérieur
                </label>
                <label style="margin-right: 15px;">
                    <input type="radio" name="schedule-filter" value="played" style="margin-right: 5px;"> Matchs joués
                </label>
                <label>
                    <input type="radio" name="schedule-filter" value="upcoming" style="margin-right: 5px;"> Prochains matchs
                </label>
            </div>
            
            <!-- Tableau du calendrier -->
            <div class="schedule-container">
                <table class="schedule-table" style="width: 100%; font-size: 12px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                    <thead>
                        <tr style="background: #1e40af; border-bottom: 2px solid #1e40af;">
                            <th style="width: 60px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">Game #</th>
                            <th style="width: 80px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">Jour</th>
                            <th style="width: 120px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">Visiteur</th>
                            <th style="width: 30px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">@</th>
                            <th style="width: 120px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">Local</th>
                            <th style="width: 80px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">Score</th>
                            <th style="width: 60px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">Résultat</th>
                            <th style="width: 80px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">Type</th>
                            <th style="width: 80px !important; padding: 8px 4px !important; border: 1px solid #1e40af; text-align: center; font-weight: bold; color: white; background: #1e40af;">Boxscore</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Récupération de tous les matchs de l'équipe (passés et futurs)
                        $Query = "SELECT * FROM SchedulePro WHERE (VisitorTeam = " . $Team . " OR HomeTeam = " . $Team . ") ORDER BY GameNumber ASC";
                        $AllGames = $db->query($Query);
                        
                        if ($AllGames) {
                            while ($Game = $AllGames->fetchArray()) {
                                $HomeTeam = $Game['HomeTeam'];
                                $VisitorTeam = $Game['VisitorTeam'];
                                $HomeScore = $Game['HomeScore'];
                                $VisitorScore = $Game['VisitorScore'];
                                $GameNumber = $Game['GameNumber'];
                                $GameDate = $Game['Date'];
                                $GameDay = $Game['Day'] ?? null;
                                $IsOvertime = ($Game['Overtime'] ?? '') == 'True';
                                $IsShootout = ($Game['Shootout'] ?? '') == 'True';
                                $IsPlayed = ($Game['Play'] ?? '') == 'True';
                                
                                // Récupérer les noms d'équipes depuis TeamProInfo
                                $Query = "SELECT Name, TeamThemeID FROM TeamProInfo WHERE Number = " . $HomeTeam;
                                $HomeTeamInfo = $db->querySingle($Query, true);
                                $Query = "SELECT Name, TeamThemeID FROM TeamProInfo WHERE Number = " . $VisitorTeam;
                                $VisitorTeamInfo = $db->querySingle($Query, true);
                                
                                $HomeTeamName = $HomeTeamInfo['Name'] ?? 'Team ' . $HomeTeam;
                                $VisitorTeamName = $VisitorTeamInfo['Name'] ?? 'Team ' . $VisitorTeam;
                                $HomeTeamThemeID = $HomeTeamInfo['TeamThemeID'] ?? null;
                                $VisitorTeamThemeID = $VisitorTeamInfo['TeamThemeID'] ?? null;
                                
                                $isHome = ($HomeTeam == $Team);
                                $isWin = false;
                                $resultClass = "";
                                $resultText = "";
                                
                                if ($IsPlayed) {
                                    $isWin = ($isHome && $HomeScore > $VisitorScore) || (!$isHome && $VisitorScore > $HomeScore);
                                    $resultClass = $isWin ? "win" : "loss";
                                    $resultText = $isWin ? "W" : "L";
                                }
                                
                                // Déterminer le type de match
                                $gameType = "Reg";
                                if ($IsShootout) {
                                    $gameType = "SO";
                                } elseif ($IsOvertime) {
                                    $gameType = "OT";
                                }
                                
                                // Classe CSS pour le filtre
                                $rowClass = "";
                                if ($isHome) $rowClass .= " home-game";
                                else $rowClass .= " away-game";
                                if ($IsPlayed) $rowClass .= " played-game";
                                
                                // Préparer le lien du boxscore
                                $boxscoreLink = "";
                                if ($IsPlayed) {
                                    $boxscoreLink = "<a href='LHSQC-" . $GameNumber . ".php'>Boxscore</a>";
                                }
                                else $rowClass .= " upcoming-game";
                                
                                echo "<tr class='" . $rowClass . "' style='border-bottom: 1px solid #eee;'>";

                                // Numéro de match (Game #) - maintenant en premier
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>" . $GameNumber . "</td>";

                                // Jour de simulation - utilise le champ Day de la base de données
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>";
                                if ($GameDay) {
                                    echo $GameDay;
                                } else {
                                    echo "TBD";
                                }
                                echo "</td>";
                                
                                // Équipe visiteuse
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>";
                                if ($VisitorTeamThemeID && file_exists("images/" . $VisitorTeamThemeID . ".png")) {
                                    echo "<img src='images/" . $VisitorTeamThemeID . ".png' alt='" . $VisitorTeamName . "' style='width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;'>";
                                }
                                echo $VisitorTeamName;
                                echo "</td>";
                                
                                // Séparateur @
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>@</td>";
                                
                                // Équipe locale
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>";
                                if ($HomeTeamThemeID && file_exists("images/" . $HomeTeamThemeID . ".png")) {
                                    echo "<img src='images/" . $HomeTeamThemeID . ".png' alt='" . $HomeTeamName . "' style='width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;'>";
                                }
                                echo $HomeTeamName;
                                echo "</td>";
                                
                                // Score
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>";
                                if ($IsPlayed) {
                                    echo $VisitorScore . " - " . $HomeScore;
                                } else {
                                    echo "TBD";
                                }
                                echo "</td>";
                                
                                // Résultat
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>";
                                if ($IsPlayed) {
                                    echo "<span class='" . $resultClass . "' style='font-weight: bold; color: " . ($isWin ? "green" : "red") . ";'>" . $resultText . "</span>";
                                } else {
                                    echo "-";
                                }
                                echo "</td>";
                                
                                // Type de match
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>" . $gameType . "</td>";
                                
                                // Boxscore
                                echo "<td style='text-align: center; border: 1px solid #ddd; padding: 6px 4px;'>" . $boxscoreLink . "</td>";
                                
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' style='text-align: center; border: 1px solid #ddd; padding: 20px;'>Aucun match trouvé</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Statistiques du calendrier -->
            <div class="schedule-stats" style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 5px;">
                <h4 style="margin-bottom: 15px;">Statistiques du calendrier</h4>
                <div style="display: flex; justify-content: space-around; text-align: center;">
                    <?php
                    // Calcul des statistiques du calendrier
                    $totalGames = 0;
                    $homeGames = 0;
                    $awayGames = 0;
                    $wins = 0;
                    $losses = 0;
                    $overtimeWins = 0;
                    $overtimeLosses = 0;
                    $shootoutWins = 0;
                    $shootoutLosses = 0;
                    
                    if ($AllGames) {
                        $AllGames->reset();
                        while ($Game = $AllGames->fetchArray()) {
                            $totalGames++;
                            $isHome = ($Game['HomeTeam'] == $Team);
                            $IsPlayed = ($Game['Play'] ?? '') == 'True';
                            $IsOvertime = ($Game['Overtime'] ?? '') == 'True';
                            $IsShootout = ($Game['Shootout'] ?? '') == 'True';
                            
                            if ($isHome) {
                                $homeGames++;
                            } else {
                                $awayGames++;
                            }
                            
                            if ($IsPlayed) {
                                $HomeScore = $Game['HomeScore'];
                                $VisitorScore = $Game['VisitorScore'];
                                $isWin = ($isHome && $HomeScore > $VisitorScore) || (!$isHome && $VisitorScore > $HomeScore);
                                
                                if ($IsShootout) {
                                    if ($isWin) $shootoutWins++;
                                    else $shootoutLosses++;
                                } elseif ($IsOvertime) {
                                    if ($isWin) $overtimeWins++;
                                    else $overtimeLosses++;
                                } else {
                                    if ($isWin) $wins++;
                                    else $losses++;
                                }
                            }
                        }
                    }
                    
                    $playedGames = $wins + $losses + $overtimeWins + $overtimeLosses + $shootoutWins + $shootoutLosses;
                    $totalPoints = ($wins * 2) + ($overtimeWins * 2) + ($shootoutWins * 2) + ($overtimeLosses * 1) + ($shootoutLosses * 1);
                    $winPercentage = $playedGames > 0 ? round((($wins + $overtimeWins + $shootoutWins) / $playedGames) * 100, 1) : 0;
                    ?>
                    
                    <div>
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $totalGames; ?></div>
                        <div style="font-size: 12px; color: #666;">Total Games</div>
                    </div>
                    
                    <div>
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $playedGames; ?></div>
                        <div style="font-size: 12px; color: #666;">Played</div>
                    </div>
                    
                    <div>
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $wins + $overtimeWins + $shootoutWins; ?></div>
                        <div style="font-size: 12px; color: #666;">Wins</div>
                    </div>
                    
                    <div>
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $losses + $overtimeLosses + $shootoutLosses; ?></div>
                        <div style="font-size: 12px; color: #666;">Losses</div>
                    </div>
                    
                    <div>
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $totalPoints; ?></div>
                        <div style="font-size: 12px; color: #666;">Points</div>
                    </div>
                    
                    <div>
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $winPercentage; ?>%</div>
                        <div style="font-size: 12px; color: #666;">Win %</div>
                    </div>
                    
                    <div>
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $homeGames; ?></div>
                        <div style="font-size: 12px; color: #666;">Home</div>
                    </div>
                    
                    <div>
                        <div style="font-size: 24px; font-weight: bold; color: #333;"><?php echo $awayGames; ?></div>
                        <div style="font-size: 12px; color: #666;">Away</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Onglet Lines -->
        <div class="tabmain" id="tabmain4" style="padding: 0px !important;">
            <h3>Team Lines</h3>
            
            <?php
            // Récupération des lignes d'équipe (même requête que ProTeam.php)
            $Query = "SELECT * FROM TeamProLines WHERE TeamNumber = " . $Team . " AND Day = 1";
            $TeamLines = $db->querySingle($Query, true);
            
            if ($TeamLines) {
            ?>
            
            <!-- Lignes d'attaque 5vs5 -->
            <div class="lines-section">
                <h4>Lignes d'attaque 5vs5</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Ligne</th>
                                <th>Ailier gauche</th>
                                <th>Centre</th>
                                <th>Ailier droit</th>
                                <th>Temps %</th>
                                <!-- <th>PHY</th>
                                <th>DF</th>
                                <th>OF</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $TeamLines['Line15vs5ForwardLeftWing']; ?></td>
                                <td><?php echo $TeamLines['Line15vs5ForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line15vs5ForwardRightWing']; ?></td>
                                <td><?php echo $TeamLines['Line15vs5ForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line15vs5ForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line15vs5ForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line15vs5ForwardOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?php echo $TeamLines['Line25vs5ForwardLeftWing']; ?></td>
                                <td><?php echo $TeamLines['Line25vs5ForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line25vs5ForwardRightWing']; ?></td>
                                <td><?php echo $TeamLines['Line25vs5ForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line25vs5ForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line25vs5ForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line25vs5ForwardOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><?php echo $TeamLines['Line35vs5ForwardLeftWing']; ?></td>
                                <td><?php echo $TeamLines['Line35vs5ForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line35vs5ForwardRightWing']; ?></td>
                                <td><?php echo $TeamLines['Line35vs5ForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line35vs5ForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line35vs5ForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line35vs5ForwardOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><?php echo $TeamLines['Line45vs5ForwardLeftWing']; ?></td>
                                <td><?php echo $TeamLines['Line45vs5ForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line45vs5ForwardRightWing']; ?></td>
                                <td><?php echo $TeamLines['Line45vs5ForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line45vs5ForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line45vs5ForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line45vs5ForwardOF']; ?></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Lignes de défense 5vs5 -->
            <div class="lines-section">
                <h4>Lignes de défense 5vs5</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Ligne</th>
                                <th>Défenseur</th>
                                <th>Défenseur</th>
                                <th></th>
                                <th>Temps %</th>
                                <!-- <th>PHY</th>
                                <th>DF</th>
                                <th>OF</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $TeamLines['Line15vs5DefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line15vs5DefenseDefense2']; ?></td>
                                <td></td>
                                <td><?php echo $TeamLines['Line15vs5DefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line15vs5DefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line15vs5DefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line15vs5DefenseOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?php echo $TeamLines['Line25vs5DefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line25vs5DefenseDefense2']; ?></td>
                                <td></td>
                                <td><?php echo $TeamLines['Line25vs5DefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line25vs5DefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line25vs5DefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line25vs5DefenseOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><?php echo $TeamLines['Line35vs5DefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line35vs5DefenseDefense2']; ?></td>
                                <td></td>
                                <td><?php echo $TeamLines['Line35vs5DefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line35vs5DefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line35vs5DefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line35vs5DefenseOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><?php echo $TeamLines['Line45vs5DefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line45vs5DefenseDefense2']; ?></td>
                                <td></td>
                                <td><?php echo $TeamLines['Line45vs5DefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line45vs5DefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line45vs5DefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line45vs5DefenseOF']; ?></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Lignes d'attaque puissance numérique -->
            <div class="lines-section">
                <h4>Lignes d'attaque puissance numérique</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Ligne</th>
                                <th>Ailier gauche</th>
                                <th>Centre</th>
                                <th>Ailier droit</th>
                                <th>Temps %</th>
                                <!-- <th>PHY</th>
                                <th>DF</th>
                                <th>OF</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $TeamLines['Line1PPForwardLeftWing']; ?></td>
                                <td><?php echo $TeamLines['Line1PPForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line1PPForwardRightWing']; ?></td>
                                <td><?php echo $TeamLines['Line1PPForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line1PPForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line1PPForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line1PPForwardOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?php echo $TeamLines['Line2PPForwardLeftWing']; ?></td>
                                <td><?php echo $TeamLines['Line2PPForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line2PPForwardRightWing']; ?></td>
                                <td><?php echo $TeamLines['Line2PPForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line2PPForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line2PPForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line2PPForwardOF']; ?></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Lignes de défense puissance numérique -->
            <div class="lines-section">
                <h4>Lignes de défense puissance numérique</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Ligne</th>
                                <th>Défenseur</th>
                                <th>Défenseur</th>
                                <th></th>
                                <th>Temps %</th>
                                <!-- <th>PHY</th>
                                <th>DF</th>
                                <th>OF</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $TeamLines['Line1PPDefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line1PPDefenseDefense2']; ?></td>
                                <td></td>
                                <td><?php echo $TeamLines['Line1PPDefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line1PPDefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line1PPDefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line1PPDefenseOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?php echo $TeamLines['Line2PPDefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line2PPDefenseDefense2']; ?></td>
                                <td></td>
                                <td><?php echo $TeamLines['Line2PPDefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line2PPDefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line2PPDefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line2PPDefenseOF']; ?></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Lignes d'attaque pénalité 4 joueurs -->
            <div class="lines-section">
                <h4>Lignes d'attaque pénalité 4 joueurs</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Ligne</th>
                                <th>Centre</th>
                                <th>Ailier</th>
                                <th>Temps %</th>
                                <!-- <th>PHY</th>
                                <th>DF</th>
                                <th>OF</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $TeamLines['Line1PK4ForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line1PK4ForwardWing']; ?></td>
                                <td><?php echo $TeamLines['Line1PK4ForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line1PK4ForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line1PK4ForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line1PK4ForwardOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?php echo $TeamLines['Line2PK4ForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line2PK4ForwardWing']; ?></td>
                                <td><?php echo $TeamLines['Line2PK4ForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line2PK4ForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line2PK4ForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line2PK4ForwardOF']; ?></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Lignes de défense pénalité 4 joueurs -->
            <div class="lines-section">
                <h4>Lignes de défense pénalité 4 joueurs</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Ligne</th>
                                <th>Défenseur</th>
                                <th>Défenseur</th>
                                <th>Temps %</th>
                                <!-- <th>PHY</th>
                                <th>DF</th>
                                <th>OF</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $TeamLines['Line1PK4DefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line1PK4DefenseDefense2']; ?></td>
                                <td><?php echo $TeamLines['Line1PK4DefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line1PK4DefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line1PK4DefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line1PK4DefenseOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?php echo $TeamLines['Line2PK4DefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line2PK4DefenseDefense2']; ?></td>
                                <td><?php echo $TeamLines['Line2PK4DefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line2PK4DefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line2PK4DefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line2PK4DefenseOF']; ?></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Lignes pénalité 3 joueurs -->
            <div class="lines-section">
                <h4>Lignes pénalité 3 joueurs</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Ligne</th>
                                <th>Ailier</th>
                                <th>Temps %</th>
                                <!-- <th>PHY</th>
                                <th>DF</th>
                                <th>OF</th> -->
                                <th>Défenseur</th>
                                <th>Défenseur</th>
                                <th>Temps %</th>
                                <!-- <th>PHY</th>
                                <th>DF</th>
                                <th>OF</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $TeamLines['Line1PK3ForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line1PK3ForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line1PK3ForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line1PK3ForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line1PK3ForwardOF']; ?></td> -->
                                <td><?php echo $TeamLines['Line1PK3DefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line1PK3DefenseDefense2']; ?></td>
                                <td><?php echo $TeamLines['Line1PK3DefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line1PK3DefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line1PK3DefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line1PK3DefenseOF']; ?></td> -->
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?php echo $TeamLines['Line2PK3ForwardCenter']; ?></td>
                                <td><?php echo $TeamLines['Line2PK3ForwardTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line2PK3ForwardPhy']; ?></td>
                                <td><?php echo $TeamLines['Line2PK3ForwardDF']; ?></td>
                                <td><?php echo $TeamLines['Line2PK3ForwardOF']; ?></td> -->
                                <td><?php echo $TeamLines['Line2PK3DefenseDefense1']; ?></td>
                                <td><?php echo $TeamLines['Line2PK3DefenseDefense2']; ?></td>
                                <td><?php echo $TeamLines['Line2PK3DefenseTime']; ?></td>
                                <!-- <td><?php echo $TeamLines['Line2PK3DefensePhy']; ?></td>
                                <td><?php echo $TeamLines['Line2PK3DefenseDF']; ?></td>
                                <td><?php echo $TeamLines['Line2PK3DefenseOF']; ?></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Tirs de barrage -->
            <div class="lines-section">
                <h4>Tirs de barrage</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Joueurs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td><?php echo $TeamLines['PenaltyShots1'] . ", " . $TeamLines['PenaltyShots2'] . ", " . $TeamLines['PenaltyShots3'] . ", " . $TeamLines['PenaltyShots4'] . ", " . $TeamLines['PenaltyShots5']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Gardiens -->
            <div class="lines-section">
                <h4>Gardiens</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Ordre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td>#1 : <?php echo $TeamLines['Goaler1']; ?>, #2 : <?php echo $TeamLines['Goaler2']; ?><?php if($TeamLines['Goaler3'] != ""){echo ", #3 : " . $TeamLines['Goaler3'];} ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Prolongation attaque -->
            <div class="lines-section">
                <h4>Prolongation attaque</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Joueurs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td><?php echo $TeamLines['OTForward1'] . ", " . $TeamLines['OTForward2'] . ", " . $TeamLines['OTForward3'] . ", " . $TeamLines['OTForward4'] . ", " . $TeamLines['OTForward5']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Prolongation défense -->
            <div class="lines-section">
                <h4>Prolongation défense</h4>
                <div class="lines-table-container">
                    <table class="lines-table">
                        <thead>
                            <tr>
                                <th>Joueurs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($TeamLines != null) { ?>
                            <tr>
                                <td><?php echo $TeamLines['OTDefense1'] . ", " . $TeamLines['OTDefense2'] . ", " . $TeamLines['OTDefense3'] . ", " . $TeamLines['OTDefense4'] . ", " . $TeamLines['OTDefense5']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <?php } else { ?>
                <div class="no-lines-message">
                    <p>Aucune information de lignes disponible pour cette équipe.</p>
                </div>
            <?php } ?>
            
        </div>

        <!-- Onglet Depth -->

        <div class="tabmain" id="tabmain5" style="padding: 0px !important;">
            <h3>Depth Chart</h3>

            <?php
            // Récupération des données pour le Depth Chart (même requête que ProTeam.php)
            if ($Team != 0) {
                $Query = "SELECT PlayerInfo.Name, PlayerInfo.Number, PlayerInfo.PosLW, PlayerInfo.PosC, PlayerInfo.PosRW, PlayerInfo.PosD, PlayerInfo.Rookie, PlayerInfo.Age, PlayerInfo.PO, PlayerInfo.Overall FROM PlayerInfo WHERE (PlayerInfo.Team)=" . $Team . " ORDER By Overall DESC, PO DESC";
                if (file_exists($DatabaseFile) == true) {
                    $PlayerDepthChartC = $db->query($Query);
                    $PlayerDepthChartLW = $db->query($Query);
                    $PlayerDepthChartRW = $db->query($Query);
                    $PlayerDepthChartD = $db->query($Query);
                }

                // Récupération des gardiens pour le Depth Chart
                $Query = "SELECT GoalerInfo.Name, GoalerInfo.Number, GoalerInfo.Rookie, GoalerInfo.Age, GoalerInfo.PO, GoalerInfo.Overall FROM GoalerInfo WHERE (GoalerInfo.Team)=" . $Team . " ORDER By Overall DESC, PO DESC";
                $GoalieDepthChart = $db->query($Query);
            }

            // Récupération des informations de l'équipe pour les draft picks
            $Query = "SELECT Name, Abbre FROM TeamProInfo WHERE Number = " . $Team;
            $TeamInfo = $db->querySingle($Query, true);

            // Récupération des informations de la ligue pour les draft picks
            $Query = "Select Name, DraftPickByYear, LeagueYearOutput from LeagueGeneral";
            $LeagueGeneral = $db->querySingle($Query, true);

            // Récupération des draft picks de l'équipe
            $Query = "SELECT * FROM DraftPick WHERE TeamNumber = " . $Team . " ORDER By Year, Round";
            $TeamDraftPick = $db->query($Query);

            // Récupération des draft picks conditionnels
            $Query = "SELECT * FROM DraftPick WHERE ConditionalTrade = '" . $TeamInfo['Abbre'] . "' ORDER By Year, Round";
            $TeamDraftPickCon = $db->query($Query);
            ?>
            
            <!-- Depth Chart des attaquants -->
            <div class="depth-section">
                <h4>Attaquants</h4>
                <div class="depth-chart-container">
                    <table class="depth-chart-table">
                        <thead>
                            <tr>
                                <th style="width:33%;">Ailier gauche</th>
                                <th style="width:33%;">Centre</th>
                                <th style="width:33%;">Ailier droit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="depth-column">
                                    <table class="depth-player-list">
                                        <?php
                                        if (!empty($PlayerDepthChartC)) {
                                            $PlayerDepthChartC->reset();
                                            while ($Row = $PlayerDepthChartC->fetchArray()) {
                                                if ($Row['PosLW'] == "True") {
                                                    echo "<tr>";
                                                    echo "<td class='player-name'>";
                                                    $strTemp = (string)$Row['Name'];
                                                    if ($Row['Rookie'] == "True") { 
                                                        $strTemp = $strTemp . " (R)"; 
                                                    }
                                                    echo "<a href='PlayerReport.php?Player=" . $Row['Number'] . "'>" . $strTemp . "</a>";
                                                    echo "</td>";
                                                    echo "<td class='player-stats'>";
                                                    echo "<span class='stat-item'>AGE: " . $Row['Age'] . "</span>";
                                                    echo "<span class='stat-item'>PO: " . $Row['PO'] . "</span>";
                                                    echo "<span class='stat-item'>OV: " . $Row['Overall'] . "</span>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                        ?>
                                    </table>
                                </td>
                                <td class="depth-column">
                                    <table class="depth-player-list">
                                        <?php
                                        if (!empty($PlayerDepthChartLW)) {
                                            $PlayerDepthChartLW->reset();
                                            while ($Row = $PlayerDepthChartLW->fetchArray()) {
                                                if ($Row['PosC'] == "True") {
                                                    echo "<tr>";
                                                    echo "<td class='player-name'>";
                                                    $strTemp = (string)$Row['Name'];
                                                    if ($Row['Rookie'] == "True") { 
                                                        $strTemp = $strTemp . " (R)"; 
                                                    }
                                                    echo "<a href='PlayerReport.php?Player=" . $Row['Number'] . "'>" . $strTemp . "</a>";
                                                    echo "</td>";
                                                    echo "<td class='player-stats'>";
                                                    echo "<span class='stat-item'>AGE: " . $Row['Age'] . "</span>";
                                                    echo "<span class='stat-item'>PO: " . $Row['PO'] . "</span>";
                                                    echo "<span class='stat-item'>OV: " . $Row['Overall'] . "</span>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                        ?>
                                    </table>
                                </td>
                                <td class="depth-column">
                                    <table class="depth-player-list">
                                        <?php
                                        if (!empty($PlayerDepthChartRW)) {
                                            $PlayerDepthChartRW->reset();
                                            while ($Row = $PlayerDepthChartRW->fetchArray()) {
                                                if ($Row['PosRW'] == "True") {
                                                    echo "<tr>";
                                                    echo "<td class='player-name'>";
                                                    $strTemp = (string)$Row['Name'];
                                                    if ($Row['Rookie'] == "True") { 
                                                        $strTemp = $strTemp . " (R)"; 
                                                    }
                                                    echo "<a href='PlayerReport.php?Player=" . $Row['Number'] . "'>" . $strTemp . "</a>";
                                                    echo "</td>";
                                                    echo "<td class='player-stats'>";
                                                    echo "<span class='stat-item'>AGE: " . $Row['Age'] . "</span>";
                                                    echo "<span class='stat-item'>PO: " . $Row['PO'] . "</span>";
                                                    echo "<span class='stat-item'>OV: " . $Row['Overall'] . "</span>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                        ?>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Depth Chart des défenseurs et gardiens -->
            <div class="depth-section">
                <h4>Défenseurs et Gardiens</h4>
                <div class="depth-chart-container">
                    <table class="depth-chart-table">
                        <thead>
                            <tr>
                                <th style="width:33%;">Défenseur #1</th>
                               
                                <th style="width:33%;">Gardien</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="depth-column">
                                    <table class="depth-player-list">
                                        <?php
                                        $NumOfD = 0;
                                        $Count = 0;
                                        if (!empty($PlayerDepthChart)) {
                                            $PlayerDepthChart->reset();
                                            while ($Row = $PlayerDepthChart->fetchArray()) {
                                                if ($Row['PosD'] == "True") {
                                                    $NumOfD++;
                                                }
                                            }
                                        }
                                        $NumOfD = round($NumOfD / 2);
                                        
                                        if (!empty($PlayerDepthChartD)) {
                                            $PlayerDepthChartD->reset();
                                            while ($Row = $PlayerDepthChartD->fetchArray()) {
                                                if ($Row['PosD'] == "True") {
                                                    echo "<tr>";
                                                    echo "<td class='player-name'>";
                                                    $strTemp = (string)$Row['Name'];
                                                    if ($Row['Rookie'] == "True") { 
                                                        $strTemp = $strTemp . " (R)"; 
                                                    }
                                                    echo "<a href='PlayerReport.php?Player=" . $Row['Number'] . "'>" . $strTemp . "</a>";
                                                    echo "</td>";
                                                    echo "<td class='player-stats'>";
                                                    echo "<span class='stat-item'>AGE: " . $Row['Age'] . "</span>";
                                                    echo "<span class='stat-item'>PO: " . $Row['PO'] . "</span>";
                                                    echo "<span class='stat-item'>OV: " . $Row['Overall'] . "</span>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    $Count++;
                                                    if ($NumOfD == $Count) {
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </table>
                                </td>
                               
                                <td class="depth-column">
                                    <table class="depth-player-list">
                                        <?php
                                        if (!empty($GoalieDepthChart)) {
                                            while ($Row = $GoalieDepthChart->fetchArray()) {
                                                echo "<tr>";
                                                echo "<td class='player-name'>";
                                                $strTemp = (string)$Row['Name'];
                                                if ($Row['Rookie'] == "True") { 
                                                    $strTemp = $strTemp . " (R)"; 
                                                }
                                                echo "<a href='GoalieReport.php?Goalie=" . $Row['Number'] . "'>" . $strTemp . "</a>";
                                                echo "</td>";
                                                echo "<td class='player-stats'>";
                                                echo "<span class='stat-item'>AGE: " . $Row['Age'] . "</span>";
                                                echo "<span class='stat-item'>PO: " . $Row['PO'] . "</span>";
                                                echo "<span class='stat-item'>OV: " . $Row['Overall'] . "</span>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Section Draft Picks -->
            <div class="draft-picks-section" style="margin-bottom: 30px; padding: 20px;">
                <h3 style="margin-bottom: 15px; color: var(--primary-color);">
                    <?php echo $TeamInfo['Name'] . " - Draft Picks"; ?>
                </h3>

                <div class="draft-picks-container" style="overflow-x: auto;">
                    <table class="draft-picks-table" style="width: 100%; border-collapse: collapse; background: white; border: 1px solid #ddd;">
                        <thead>
                            <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                                <th style="padding: 8px; border: 1px solid #ddd; text-align: center; font-weight: bold; width: 80px;">Year</th>
                                <?php
                                // Créer les en-têtes pour chaque ronde
                                $DraftPickByYear = (int)$LeagueGeneral['DraftPickByYear'];
                                if($DraftPickByYear >= 10) { $DraftPickByYear = 10; }
                                for($x = 1; $x <= $DraftPickByYear; $x++) {
                                    echo "<th style=\"padding: 8px; border: 1px solid #ddd; text-align: center; font-weight: bold; width: 120px;\">Round " . $x . "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($TeamDraftPick)) {
                                // Première passe : organiser les données par année et ronde
                                $draftData = array();
                                $TeamDraftPick->reset();

                                while ($row = $TeamDraftPick->fetchArray()) {
                                    $year = $row['Year'];
                                    $round = $row['Round'];

                                    if (!isset($draftData[$year])) {
                                        $draftData[$year] = array();
                                    }
                                    if (!isset($draftData[$year][$round])) {
                                        $draftData[$year][$round] = array();
                                    }

                                    $draftData[$year][$round][] = $row;
                                }

                                // Deuxième passe : afficher le tableau
                                foreach ($draftData as $year => $rounds) {
                                    echo "<tr>";
                                    echo "<td style=\"padding: 8px; border: 1px solid #ddd; text-align: center; font-weight: bold; background: #f8f9fa;\">" . $year . "</td>";

                                    // Afficher chaque ronde
                                    for ($roundNum = 1; $roundNum <= $DraftPickByYear; $roundNum++) {
                                        echo "<td style=\"padding: 8px; border: 1px solid #ddd; text-align: center;\">";

                                        if (isset($rounds[$roundNum])) {
                                            $picks = $rounds[$roundNum];

                                            foreach ($picks as $pick) {
                                                // Afficher le logo de l'équipe d'origine si disponible
                                                if ($pick['FromTeamThemeID'] > 0) {
                                                    $title = $pick['FromTeamAbbre'];
                                                    if ($pick['ConditionalTrade'] != "") {
                                                        $title .= " [CON: " . $pick['ConditionalTrade'] . "]";
                                                    }
                                                    echo "<img src=\"" . $ImagesCDNPath . "/images/" . $pick['FromTeamThemeID'] . ".png\" alt=\"" . $pick['FromTeamAbbre'] . "\" title=\"" . $title . "\" style=\"width: 24px; height: 24px; vertical-align: middle; margin: 1px; display: inline-block;\" />";
                                                } else {
                                                    // Si pas de logo, afficher l'abréviation comme fallback
                                                    $title = $pick['FromTeamAbbre'];
                                                    if ($pick['ConditionalTrade'] != "") {
                                                        $title .= " [CON: " . $pick['ConditionalTrade'] . "]";
                                                    }
                                                    echo "<span style=\"font-size: 10px; padding: 2px 4px; background: #f0f0f0; border-radius: 3px; margin: 1px; display: inline-block;\" title=\"" . $title . "\">" . $pick['FromTeamAbbre'] . "</span>";
                                                }
                                            }
                                        }

                                        echo "</td>";
                                    }

                                    echo "</tr>\n";
                                }

                                // Afficher les draft picks conditionnels s'il y en a
                                if (!empty($TeamDraftPickCon)) {
                                    echo "<tr style=\"background: #fff3cd;\">";
                                    echo "<td style=\"padding: 8px; border: 1px solid #ddd; text-align: center; font-weight: bold;\">Conditional</td>";
                                    echo "<td colspan=\"" . $DraftPickByYear . "\" style=\"padding: 8px; border: 1px solid #ddd;\">";

                                    $TeamDraftPickCon->reset();
                                    $first = true;
                                    while ($row = $TeamDraftPickCon->fetchArray()) {
                                        if (!$first) echo " / ";
                                        echo "<span style=\"font-size: 11px;\" title=\"" . $row['ConditionalTradeExplication'] . "\">";
                                        echo $row['FromTeamAbbre'] . " - Y:" . $row['Year'] . " - R:" . $row['Round'];
                                        echo "</span>";
                                        $first = false;
                                    }

                                    echo "</td></tr>\n";
                                }
                            } else {
                                echo "<tr><td colspan=\"" . ($DraftPickByYear + 1) . "\" style=\"padding: 20px; text-align: center; color: #666;\">No draft picks found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Onglet Capology -->
        <div class="tabmain" id="tabmain6" style="padding: 0px !important;">
            <h3>Salary Cap Overview</h3>
            
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
            
            // Récupération des joueurs avec leurs contrats (même requête que TeamSalaryCapDetail.php)
            $Query = "SELECT MainTable.* FROM (SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.TeamName, PlayerInfo.ProTeamName, PlayerInfo.Age, PlayerInfo.AgeDate, PlayerInfo.Contract, PlayerInfo.Rookie, PlayerInfo.NoTrade, PlayerInfo.CanPlayPro, PlayerInfo.CanPlayFarm, PlayerInfo.ForceWaiver, PlayerInfo.WaiverPossible, PlayerInfo.ExcludeSalaryCap, PlayerInfo.ProSalaryinFarm, PlayerInfo.SalaryAverage, PlayerInfo.Salary1, PlayerInfo.Salary2, PlayerInfo.Salary3, PlayerInfo.Salary4, PlayerInfo.Salary5, PlayerInfo.Salary6, PlayerInfo.Salary7, PlayerInfo.Salary8, PlayerInfo.Salary9, PlayerInfo.Salary10, PlayerInfo.SalaryRemaining, PlayerInfo.SalaryAverageRemaining, PlayerInfo.SalaryCap, PlayerInfo.SalaryCapRemaining, PlayerInfo.Condition, PlayerInfo.Status1, PlayerInfo.URLLink, PlayerInfo.NHLID, PlayerInfo.PProtected, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, 'False' AS PosG, PlayerInfo.Retire as Retire FROM PlayerInfo WHERE Team = " . $Team . " AND Retire = 'False' AND Status1 >= 2 UNION ALL SELECT GoalerInfo.Number + 10000, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.TeamName, GoalerInfo.ProTeamName, GoalerInfo.Age, GoalerInfo.AgeDate, GoalerInfo.Contract, GoalerInfo.Rookie, GoalerInfo.NoTrade, GoalerInfo.CanPlayPro, GoalerInfo.CanPlayFarm, GoalerInfo.ForceWaiver, GoalerInfo.WaiverPossible, GoalerInfo.ExcludeSalaryCap, GoalerInfo.ProSalaryinFarm, GoalerInfo.SalaryAverage, GoalerInfo.Salary1, GoalerInfo.Salary2, GoalerInfo.Salary3, GoalerInfo.Salary4, GoalerInfo.Salary5, GoalerInfo.Salary6, GoalerInfo.Salary7, GoalerInfo.Salary8, GoalerInfo.Salary9, GoalerInfo.Salary10, GoalerInfo.SalaryRemaining, GoalerInfo.SalaryAverageRemaining, GoalerInfo.SalaryCap, GoalerInfo.SalaryCapRemaining, GoalerInfo.Condition, GoalerInfo.Status1, GoalerInfo.URLLink, GoalerInfo.NHLID, GoalerInfo.PProtected, 'False' AS PosC, 'False' AS PosLW, 'False' AS PosRW, 'False' AS PosD, 'True' AS PosG, GoalerInfo.Retire as Retire FROM GoalerInfo WHERE Team = " . $Team . " AND Retire = 'False' AND Status1 >= 2) AS MainTable ORDER BY PosG ASC, PosD ASC, Name ASC";
            $PlayerSalaryCap = $db->query($Query);
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
            
            <!-- Tableau des contrats -->
            <div class="cap-table-container" style="overflow-x: auto;">
                <table class="cap-table" style="width: 100%; font-size: 11px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                    <thead>
                        <tr style="background: #1e40af; border-bottom: 2px solid #1e40af;">
                            <th style="width: 140px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: left; font-weight: bold; color: white; background: #1e40af;">Player Name</th>
                            <th style="width: 45px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;">POS</th>
                            <th style="width: 25px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;">Age</th>
                            <th style="width: 45px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;">Birthday</th>
                            <th style="width: 35px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;">Terms</th>
                            <th style="width: 25px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;">Contract</th>
                            <th style="width: 25px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;">Cap %</th>
                            <?php
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;\">Year " . $LeagueYear . "</th>";
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;\">Year " . ($LeagueYear + 1) . "</th>";
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;\">Year " . ($LeagueYear + 2) . "</th>";
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;\">Year " . ($LeagueYear + 3) . "</th>";
                            echo "<th style=\"width: 75px !important; padding: 6px 4px !important; border: 1px solid rgba(255, 255, 255, 0.3); text-align: center; font-weight: bold; color: white; background: #1e40af;\">Year " . ($LeagueYear + 4) . "</th>";
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Section des attaquants
                        echo "<tr style=\"background: #e3f2fd; font-weight: bold;\"><td colspan=\"12\" style=\"padding: 8px 4px; border: 1px solid #ddd;\">Forwards</td></tr>";
                        
                        $FoundD = false;
                        $FoundG = false;
                        $AverageAge = 0;
                        $AverageCap1 = 0;
                        $AverageCap2 = 0;
                        $AverageCap3 = 0;
                        $AverageCap4 = 0;
                        $AverageCap5 = 0;
                        $AverageCount = 0;
                        $AverageTotalCap1 = 0;
                        $AverageTotalCap2 = 0;
                        $AverageTotalCap3 = 0;
                        $AverageTotalCap4 = 0;
                        $AverageTotalCap5 = 0;
                        $AverageTotalCount = 0;
                        
                        if ($PlayerSalaryCap) {
                            while ($Row = $PlayerSalaryCap->fetchArray()) {
                                // Séparateur pour les défenseurs
                                if ($Row['PosD'] == "True" && $FoundD == false) {
                                    if ($AverageCount > 0) {
                                        echo "<tr style=\"background: #f8f9fa; font-weight: bold;\">";
                                        echo "<td colspan=\"2\">Average (" . $AverageCount . ")</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageAge / $AverageCount, 2) . "</td>";
                                        echo "<td colspan=\"3\"></td>";
                                        if ($SalaryCap > 0) {
                                            echo "<td style=\"text-align: center;\">" . number_format(($AverageCap1 / $SalaryCap) * 100, 2) . "%</td>";
                                        } else {
                                            echo "<td style=\"text-align: center;\">N/A</td>";
                                        }
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap1, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap2, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap3, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap4, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap5, 0) . "$</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr style=\"background: #e3f2fd; font-weight: bold;\"><td colspan=\"12\" style=\"padding: 8px 4px; border: 1px solid #ddd;\">Defensemen</td></tr>";
                                    $AverageTotalCap1 = $AverageTotalCap1 + $AverageCap1;
                                    $AverageTotalCap2 = $AverageTotalCap2 + $AverageCap2;
                                    $AverageTotalCap3 = $AverageTotalCap3 + $AverageCap3;
                                    $AverageTotalCap4 = $AverageTotalCap4 + $AverageCap4;
                                    $AverageTotalCap5 = $AverageTotalCap5 + $AverageCap5;
                                    $AverageTotalCount = $AverageTotalCount + $AverageCount;
                                    $AverageAge = 0;
                                    $AverageCap1 = 0;
                                    $AverageCap2 = 0;
                                    $AverageCap3 = 0;
                                    $AverageCap4 = 0;
                                    $AverageCap5 = 0;
                                    $AverageCount = 0;
                                    $FoundD = true;
                                }
                                
                                // Séparateur pour les gardiens
                                if ($Row['PosG'] == "True" && $FoundG == false) {
                                    if ($AverageCount > 0) {
                                        echo "<tr style=\"background: #f8f9fa; font-weight: bold;\">";
                                        echo "<td colspan=\"2\">Average (" . $AverageCount . ")</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageAge / $AverageCount, 2) . "</td>";
                                        echo "<td colspan=\"3\"></td>";
                                        if ($SalaryCap > 0) {
                                            echo "<td style=\"text-align: center;\">" . number_format(($AverageCap1 / $SalaryCap) * 100, 2) . "%</td>";
                                        } else {
                                            echo "<td style=\"text-align: center;\">N/A</td>";
                                        }
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap1, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap2, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap3, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap4, 0) . "$</td>";
                                        echo "<td style=\"text-align: center;\">" . number_format($AverageCap5, 0) . "$</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr style=\"background: #e3f2fd; font-weight: bold;\"><td colspan=\"12\" style=\"padding: 8px 4px; border: 1px solid #ddd;\">Goalies</td></tr>";
                                    $AverageTotalCap1 = $AverageTotalCap1 + $AverageCap1;
                                    $AverageTotalCap2 = $AverageTotalCap2 + $AverageCap2;
                                    $AverageTotalCap3 = $AverageTotalCap3 + $AverageCap3;
                                    $AverageTotalCap4 = $AverageTotalCap4 + $AverageCap4;
                                    $AverageTotalCap5 = $AverageTotalCap5 + $AverageCap5;
                                    $AverageTotalCount = $AverageTotalCount + $AverageCount;
                                    $AverageAge = 0;
                                    $AverageCap1 = 0;
                                    $AverageCap2 = 0;
                                    $AverageCap3 = 0;
                                    $AverageCap4 = 0;
                                    $AverageCap5 = 0;
                                    $AverageCount = 0;
                                    $FoundG = true;
                                }
                                
                                $AverageCount = $AverageCount + 1;
                                
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
                                $AverageAge = $AverageAge + $Row['Age'];
                                
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
                                        if ($i == 1) {
                                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['SalaryCap'], 0) . "$</td>";
                                            $AverageCap1 = $AverageCap1 + $Row['SalaryCap'];
                                        } else {
                                            if ($LeagueFinance['SalaryCapOption'] >= 1 && $LeagueFinance['SalaryCapOption'] <= 3) {
                                                if ($i == 2) {
                                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['Salary2'], 0) . "$</td>";
                                                    $AverageCap2 = $AverageCap2 + $Row['Salary2'];
                                                }
                                                if ($i == 3) {
                                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['Salary3'], 0) . "$</td>";
                                                    $AverageCap3 = $AverageCap3 + $Row['Salary3'];
                                                }
                                                if ($i == 4) {
                                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['Salary4'], 0) . "$</td>";
                                                    $AverageCap4 = $AverageCap4 + $Row['Salary4'];
                                                }
                                                if ($i == 5) {
                                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['Salary5'], 0) . "$</td>";
                                                    $AverageCap5 = $AverageCap5 + $Row['Salary5'];
                                                }
                                            } elseif ($LeagueFinance['SalaryCapOption'] >= 4 && $LeagueFinance['SalaryCapOption'] <= 6) {
                                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['SalaryCap'], 0) . "$</td>";
                                                if ($i == 2) {
                                                    $AverageCap2 = $AverageCap2 + $Row['SalaryAverage'];
                                                }
                                                if ($i == 3) {
                                                    $AverageCap3 = $AverageCap3 + $Row['SalaryAverage'];
                                                }
                                                if ($i == 4) {
                                                    $AverageCap4 = $AverageCap4 + $Row['SalaryAverage'];
                                                }
                                                if ($i == 5) {
                                                    $AverageCap5 = $AverageCap5 + $Row['SalaryAverage'];
                                                }
                                            } else {
                                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\"></td>";
                                            }
                                        }
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
                        
                        // Moyenne de la dernière section
                        if ($AverageCount > 0) {
                            echo "<tr style=\"background: #f8f9fa; font-weight: bold;\">";
                            echo "<td colspan=\"2\">Average (" . $AverageCount . ")</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageAge / $AverageCount, 2) . "</td>";
                            echo "<td colspan=\"3\"></td>";
                            if ($SalaryCap > 0) {
                                echo "<td style=\"text-align: center;\">" . number_format(($AverageCap1 / $SalaryCap) * 100, 2) . "%</td>";
                            } else {
                                echo "<td style=\"text-align: center;\">N/A</td>";
                            }
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap1, 0) . "$</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap2, 0) . "$</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap3, 0) . "$</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap4, 0) . "$</td>";
                            echo "<td style=\"text-align: center;\">" . number_format($AverageCap5, 0) . "$</td>";
                            echo "</tr>";
                            $AverageTotalCap1 = $AverageTotalCap1 + $AverageCap1;
                            $AverageTotalCap2 = $AverageTotalCap2 + $AverageCap2;
                            $AverageTotalCap3 = $AverageTotalCap3 + $AverageCap3;
                            $AverageTotalCap4 = $AverageTotalCap4 + $AverageCap4;
                            $AverageTotalCap5 = $AverageTotalCap5 + $AverageCap5;
                            $AverageTotalCount = $AverageTotalCount + $AverageCount;
                        }
                        
                        // Salary cap spécial si activé
                        if ($LeagueFinance['BonusIncludeSalaryCap'] == "True") {
                            echo "<tr style=\"background: #e8f5e8; font-weight: bold;\">";
                            echo "<td colspan=\"7\" style=\"padding: 6px 4px; border: 1px solid #ddd;\">Special Salary Cap Value</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($TeamFinance['SpecialSalaryCapY1'], 0) . "$</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($TeamFinance['SpecialSalaryCapY2'], 0) . "$</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($TeamFinance['SpecialSalaryCapY3'], 0) . "$</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($TeamFinance['SpecialSalaryCapY4'], 0) . "$</td>";
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($TeamFinance['SpecialSalaryCapY5'], 0) . "$</td>";
                            echo "</tr>";
                            $AverageTotalCap1 = $AverageTotalCap1 + $TeamFinance['SpecialSalaryCapY1'];
                            $AverageTotalCap2 = $AverageTotalCap2 + $TeamFinance['SpecialSalaryCapY2'];
                            $AverageTotalCap3 = $AverageTotalCap3 + $TeamFinance['SpecialSalaryCapY3'];
                            $AverageTotalCap4 = $AverageTotalCap4 + $TeamFinance['SpecialSalaryCapY4'];
                            $AverageTotalCap5 = $AverageTotalCap5 + $TeamFinance['SpecialSalaryCapY5'];
                        }
                        
                        // Total
                        echo "<tr style=\"background: #f0f8ff; font-weight: bold;\">";
                        echo "<td colspan=\"6\" style=\"padding: 6px 4px; border: 1px solid #ddd;\">Total (" . $AverageTotalCount . ")</td>";
                        if ($SalaryCap > 0) {
                            if ($AverageTotalCap1 / $SalaryCap > 1) {
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #f44336; color: #fff;\">" . number_format(($AverageTotalCap1 / $SalaryCap) * 100, 2) . "%</td>";
                            } elseif ($AverageTotalCap1 / $SalaryCap > 0.95) {
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #FFA500;\">" . number_format(($AverageTotalCap1 / $SalaryCap) * 100, 2) . "%</td>";
                            } elseif ($AverageTotalCap1 / $SalaryCap > 0.90) {
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #FFFF00;\">" . number_format(($AverageTotalCap1 / $SalaryCap) * 100, 2) . "%</td>";
                            } else {
                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd; background-color: #00ff00;\">" . number_format(($AverageTotalCap1 / $SalaryCap) * 100, 2) . "%</td>";
                            }
                        } else {
                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">N/A</td>";
                        }
                        echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap1, 0) . "$</td>";
                        echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap2, 0) . "$</td>";
                        echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap3, 0) . "$</td>";
                        echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap4, 0) . "$</td>";
                        echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($AverageTotalCap5, 0) . "$</td>";
                        echo "</tr>";
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

            <!-- Tableau des contrats Farm -->
            <h3 style="margin-top: 40px; margin-bottom: 20px; color: var(--primary-color);">Farm Team Salary Cap Overview</h3>
            
            <?php
            // Récupération des joueurs farm avec leurs contrats
            $Query = "SELECT MainTable.* FROM (SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.TeamName, PlayerInfo.ProTeamName, PlayerInfo.Age, PlayerInfo.AgeDate, PlayerInfo.Contract, PlayerInfo.Rookie, PlayerInfo.NoTrade, PlayerInfo.CanPlayPro, PlayerInfo.CanPlayFarm, PlayerInfo.ForceWaiver, PlayerInfo.WaiverPossible, PlayerInfo.ExcludeSalaryCap, PlayerInfo.ProSalaryinFarm, PlayerInfo.SalaryAverage, PlayerInfo.Salary1, PlayerInfo.Salary2, PlayerInfo.Salary3, PlayerInfo.Salary4, PlayerInfo.Salary5, PlayerInfo.Salary6, PlayerInfo.Salary7, PlayerInfo.Salary8, PlayerInfo.Salary9, PlayerInfo.Salary10, PlayerInfo.SalaryRemaining, PlayerInfo.SalaryAverageRemaining, PlayerInfo.SalaryCap, PlayerInfo.SalaryCapRemaining, PlayerInfo.Condition, PlayerInfo.Status1, PlayerInfo.URLLink, PlayerInfo.NHLID, PlayerInfo.PProtected, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, 'False' AS PosG, PlayerInfo.Retire as Retire FROM PlayerInfo WHERE Team = " . $Team . " AND Retire = 'False' AND Status1 = 1 UNION ALL SELECT GoalerInfo.Number + 10000, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.TeamName, GoalerInfo.ProTeamName, GoalerInfo.Age, GoalerInfo.AgeDate, GoalerInfo.Contract, GoalerInfo.Rookie, GoalerInfo.NoTrade, GoalerInfo.CanPlayPro, GoalerInfo.CanPlayFarm, GoalerInfo.ForceWaiver, GoalerInfo.WaiverPossible, GoalerInfo.ExcludeSalaryCap, GoalerInfo.ProSalaryinFarm, GoalerInfo.SalaryAverage, GoalerInfo.Salary1, GoalerInfo.Salary2, GoalerInfo.Salary3, GoalerInfo.Salary4, GoalerInfo.Salary5, GoalerInfo.Salary6, GoalerInfo.Salary7, GoalerInfo.Salary8, GoalerInfo.Salary9, GoalerInfo.Salary10, GoalerInfo.SalaryRemaining, GoalerInfo.SalaryAverageRemaining, GoalerInfo.SalaryCap, GoalerInfo.SalaryCapRemaining, GoalerInfo.Condition, GoalerInfo.Status1, GoalerInfo.URLLink, GoalerInfo.NHLID, GoalerInfo.PProtected, 'False' AS PosC, 'False' AS PosLW, 'False' AS PosRW, 'False' AS PosD, 'True' AS PosG, GoalerInfo.Retire as Retire FROM GoalerInfo WHERE Team = " . $Team . " AND Retire = 'False' AND Status1 = 1) AS MainTable ORDER BY PosG ASC, PosD ASC, Name ASC";
            $FarmPlayerSalaryCap = $db->query($Query);
            ?>
            
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
                                        if ($i == 1) {
                                            echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['SalaryCap'], 0) . "$</td>";
                                            $AverageCap1Farm = $AverageCap1Farm + $Row['SalaryCap'];
                                        } else {
                                            if ($LeagueFinance['SalaryCapOption'] >= 1 && $LeagueFinance['SalaryCapOption'] <= 3) {
                                                if ($i == 2) {
                                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['Salary2'], 0) . "$</td>";
                                                    $AverageCap2Farm = $AverageCap2Farm + $Row['Salary2'];
                                                }
                                                if ($i == 3) {
                                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['Salary3'], 0) . "$</td>";
                                                    $AverageCap3Farm = $AverageCap3Farm + $Row['Salary3'];
                                                }
                                                if ($i == 4) {
                                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['Salary4'], 0) . "$</td>";
                                                    $AverageCap4Farm = $AverageCap4Farm + $Row['Salary4'];
                                                }
                                                if ($i == 5) {
                                                    echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['Salary5'], 0) . "$</td>";
                                                    $AverageCap5Farm = $AverageCap5Farm + $Row['Salary5'];
                                                }
                                            } elseif ($LeagueFinance['SalaryCapOption'] >= 4 && $LeagueFinance['SalaryCapOption'] <= 6) {
                                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\">" . number_format($Row['SalaryCap'], 0) . "$</td>";
                                                if ($i == 2) {
                                                    $AverageCap2Farm = $AverageCap2Farm + $Row['SalaryAverage'];
                                                }
                                                if ($i == 3) {
                                                    $AverageCap3Farm = $AverageCap3Farm + $Row['SalaryAverage'];
                                                }
                                                if ($i == 4) {
                                                    $AverageCap4Farm = $AverageCap4Farm + $Row['SalaryAverage'];
                                                }
                                                if ($i == 5) {
                                                    $AverageCap5Farm = $AverageCap5Farm + $Row['SalaryAverage'];
                                                }
                                            } else {
                                                echo "<td style=\"text-align: center; padding: 6px 4px; border: 1px solid #ddd;\"></td>";
                                            }
                                        }
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

        <!-- Onglet Prospects -->
        <div class="tabmain" id="tabmain7">
            <h3>Team Prospects</h3>
            
            <?php
            // Récupération des prospects de l'équipe (même workflow que ProTeam.php)
            $Query = "SELECT Prospects.*, TeamProInfo.Name As TeamName, TeamProInfo.TeamThemeID FROM Prospects LEFT JOIN TeamProInfo ON Prospects.TeamNumber = TeamProInfo.Number WHERE TeamNumber = " . $Team . " ORDER By Name";
            $Prospects = $db->query($Query);
            $Query = "SELECT Count(Prospects.Name) As CountOfName FROM Prospects WHERE TeamNumber = " . $Team;
            $ProspectsCount = $db->querySingle($Query, true);
            ?>
            
            <table class="tablesorter STHSPHPTeam_ProspectsTable" style="width: 100%; font-size: 11px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                <thead>
                    <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                        <?php include "ProspectsSub.php"; ?>
                    </tr>
                </thead>
            </table>
            
            <div style="margin-top: 15px; font-size: 12px; color: #666;">
                <strong>Total Prospects:</strong> <?php echo $ProspectsCount['CountOfName']; ?>
            </div>
        </div>

        <!-- Onglet Transactions -->
        <div class="tabmain" id="tabmain10">
            <h3>Recent Transactions</h3>
            <div class="transactions-list">
                <?php
                if ($Transactions) {
                    while ($Transaction = $Transactions->fetchArray()) {
                        echo "<div class='transaction-item'>";
                        echo "<div class='transaction-date'>" . date('M j, Y', strtotime($Transaction['Date'])) . "</div>";
                        echo "<div class='transaction-details'>" . $Transaction['Description'] . "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Aucune transaction récente</p>";
                }
                ?>
            </div>
        </div>

        <!-- Onglet Blessures -->
        <div class="tabmain" id="tabmain11">
            <h3>Injuries</h3>
            <table class="STHSPHPPlayerStat_Table">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>POS</th>
                        <th>Status</th>
                        <th>Length</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($Injuries) {
                        while ($Injury = $Injuries->fetchArray()) {
                            $Position = "";
                            if ($Injury['PosC'] == "True") $Position .= "C";
                            if ($Injury['PosLW'] == "True") $Position .= ($Position ? "/" : "") . "LW";
                            if ($Injury['PosRW'] == "True") $Position .= ($Position ? "/" : "") . "RW";
                            if ($Injury['PosD'] == "True") $Position .= ($Position ? "/" : "") . "D";
                            
                            $Status = "";
                            switch($Injury['InjuryStatus']) {
                                case 1: $Status = "Day-to-Day"; break;
                                case 2: $Status = "Injured"; break;
                                case 3: $Status = "Out"; break;
                                default: $Status = "Unknown"; break;
                            }
                            
                            echo "<tr>";
                            echo "<td><a href='PlayerReport.php?Player=" . $Injury['Number'] . "' class='player-link'>" . $Injury['Name'] . "</a></td>";
                            echo "<td>" . $Position . "</td>";
                            echo "<td>" . $Status . "</td>";
                            echo "<td>" . $Injury['InjuryLength'] . " days</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Aucun joueur blessé</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>

</div>

</div>

<?php include "Footer.php"; ?> 

<script>
// JavaScript pour les filtres du calendrier
document.addEventListener('DOMContentLoaded', function() {
    const scheduleFilters = document.querySelectorAll('input[name="schedule-filter"]');
    const scheduleTable = document.querySelector('#tabmain3 .schedule-table tbody');
    
    if (scheduleFilters.length > 0 && scheduleTable) {
        scheduleFilters.forEach(filter => {
            filter.addEventListener('change', function() {
                const filterValue = this.value;
                const rows = scheduleTable.querySelectorAll('tr');
                
                rows.forEach(row => {
                    let showRow = true;
                    
                    switch(filterValue) {
                        case 'home':
                            showRow = row.classList.contains('home-game');
                            break;
                        case 'away':
                            showRow = row.classList.contains('away-game');
                            break;
                        case 'played':
                            showRow = row.classList.contains('played-game');
                            break;
                        case 'upcoming':
                            showRow = row.classList.contains('upcoming-game');
                            break;
                        case 'all':
                        default:
                            showRow = true;
                            break;
                    }
                    
                    if (showRow) {
                        row.style.display = '';
                        row.style.opacity = '1';
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                // Mettre à jour le compteur de matchs visibles
                updateVisibleGamesCount();
            });
        });
    }
    
    // Fonction pour mettre à jour le compteur de matchs visibles
    function updateVisibleGamesCount() {
        const visibleRows = scheduleTable.querySelectorAll('tr:not([style*="display: none"])');
        const totalGamesElement = document.querySelector('#tabmain3 .schedule-stats .total-games');
        
        if (totalGamesElement) {
            totalGamesElement.textContent = visibleRows.length;
        }
    }
    
    // Initialiser le compteur
    updateVisibleGamesCount();
});

// JavaScript pour la navigation des onglets (si pas déjà présent)
document.addEventListener('DOMContentLoaded', function() {
    const tabLinks = document.querySelectorAll('.tabmain-links a');
    const tabContents = document.querySelectorAll('.tabmain');
    
    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            
            // Retirer la classe active de tous les onglets
            tabContents.forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Retirer la classe active de tous les liens
            tabLinks.forEach(tabLink => {
                tabLink.parentElement.classList.remove('activemain');
            });
            
            // Ajouter la classe active à l'onglet cible
            const targetTab = document.getElementById(targetId);
            if (targetTab) {
                targetTab.classList.add('active');
            }
            
            // Ajouter la classe active au lien cliqué
            this.parentElement.classList.add('activemain');
        });
    });
});

$(function() {
    $(".STHSProTeamPlayerRoster_Table").tablesorter({
        sortList: [[20,1]],
        widgets: ['staticRow']
    });
    $(".STHSProTeamGoalieRoster_Table").tablesorter({
        sortList: [[17,1]],
        widgets: ['staticRow']
    });
    $(".STHSProTeamPlayerStats_Table").tablesorter({
        sortList: [[4,1]],
        widgets: ['staticRow']
    });
    $(".STHSPHPTeam_ProspectsTable").tablesorter({
        widgets: ['staticRow']
    });
});
</script>

</body>