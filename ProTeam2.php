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
            
            // Récupération des statistiques de l'équipe
            $Query = "SELECT * FROM TeamProStat WHERE Number = " . $Team;
            $TeamStat = $db->querySingle($Query, true);
            
            // Récupération des informations financières
            $Query = "SELECT * FROM TeamProFinance WHERE Number = " . $Team;
            $TeamFinance = $db->querySingle($Query, true);
            
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
                        <span class="stat-label">Assistant Captain</span>
                        <span class="stat-value"><?php echo $TeamLeader['Assistant1'] ?? 'N/A'; ?></span>
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
                        <span class="stat-value">$<?php echo number_format($TeamFinance['Budget'] ?? 0); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Available</span>
                        <span class="stat-value">$<?php echo number_format(($TeamFinance['Budget'] ?? 0) - ($TeamFinance['TotalPlayersSalaries'] ?? 0)); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Cap Space</span>
                        <span class="stat-value"><?php echo ($TeamFinance['Budget'] ?? 0) > 0 ? number_format((($TeamFinance['Budget'] ?? 0) - ($TeamFinance['TotalPlayersSalaries'] ?? 0)) / ($TeamFinance['Budget'] ?? 1) * 100, 1) : "0.0"; ?>%</span>
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
                <table class="roster-table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
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
                            
                            echo "<tr>";
                                echo "<td class='player-name" . $playerClasses . "'><a href='PlayerReport.php?Player=" . $Player['Number'] . "'>" . $strTemp . "</a></td>";
                                
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
                <table class="roster-table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="width: 90px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: left; font-weight: bold;">Goaltender</th>
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
                            
                            echo "<tr>";
                                echo "<td class='player-name" . $playerClasses . "'><a href='GoalieReport.php?Goalie=" . $Goalie['Number'] . "'>" . $strTemp . "</a></td>";
                                
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
            <div class="stats-container">
                <table class="stats-table" style="width: 100%; font-size: 10px; border-collapse: collapse; border: 1px solid #ddd; background: white;">
                    <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                            <th style="width: 150px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: left; font-weight: bold;">Name</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">GP</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">G</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">A</th>
                            <th style="width: 30px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">P</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">+/-</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PIM</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Shots</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">Hits</th>
                            <th style="width: 35px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">PPG</th>
                            <th style="width: 40px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">GiveAway</th>
                            <th style="width: 40px !important; padding: 4px 2px !important; border: 1px solid #ddd; text-align: center; font-weight: bold;">TakeAway</th>
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
        </div>

        <!-- Onglet Prospects -->
        <div class="tabmain" id="tabmain9">
            <h3>Top Prospects</h3>
            <table class="STHSPHPPlayerStat_Table">
                <thead>
                    <tr>
                        <th>Prospect</th>
                        <th>POS</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>GP</th>
                        <th>G</th>
                        <th>A</th>
                        <th>P</th>
                        <th>+/-</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($Prospects) {
                        while ($Prospect = $Prospects->fetchArray()) {
                            $Position = "";
                            if ($Prospect['PosC'] == "True") $Position .= "C";
                            if ($Prospect['PosLW'] == "True") $Position .= ($Position ? "/" : "") . "LW";
                            if ($Prospect['PosRW'] == "True") $Position .= ($Position ? "/" : "") . "RW";
                            if ($Prospect['PosD'] == "True") $Position .= ($Position ? "/" : "") . "D";
                            
                            echo "<tr>";
                            echo "<td><a href='Prospects.php?Prospect=" . $Prospect['Number'] . "' class='player-link'>" . $Prospect['Name'] . "</a></td>";
                            echo "<td>" . $Position . "</td>";
                            echo "<td>" . ($Prospect['Age'] ?? '-') . "</td>";
                            echo "<td>" . ($Prospect['Height'] ?? '-') . "</td>";
                            echo "<td>" . ($Prospect['Weight'] ?? '-') . "</td>";
                            echo "<td>" . $Prospect['GP'] . "</td>";
                            echo "<td>" . $Prospect['G'] . "</td>";
                            echo "<td>" . $Prospect['A'] . "</td>";
                            echo "<td>" . $Prospect['P'] . "</td>";
                            echo "<td>" . ($Prospect['PlusMinus'] >= 0 ? "+" : "") . $Prospect['PlusMinus'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
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
