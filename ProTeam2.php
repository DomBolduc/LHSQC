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
            
            // Récupération des leaders de l'équipe (Points)
            $Query = "SELECT PlayerProStat.*, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG, ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 >= 2) AND (PlayerProStat.GP>0)) ORDER BY PlayerProStat.P DESC, PlayerProStat.GP ASC LIMIT 1";
            $TeamLeaderP = $db->querySingle($Query, true);
            
            // Récupération du leader en buts
            $Query = "SELECT PlayerProStat.*, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG, ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 >= 2) AND (PlayerProStat.GP>0)) ORDER BY PlayerProStat.G DESC, PlayerProStat.GP ASC, PlayerProStat.P DESC LIMIT 1";
            $TeamLeaderG = $db->querySingle($Query, true);
            
            // Récupération du leader en passes
            $Query = "SELECT PlayerProStat.*, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG, ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT, ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerInfo INNER JOIN PlayerProStat ON PlayerInfo.Number = PlayerProStat.Number WHERE ((PlayerInfo.Team=" . $Team . ") AND (PlayerInfo.Status1 >= 2) AND (PlayerProStat.GP>0)) ORDER BY PlayerProStat.A DESC, PlayerProStat.P DESC, PlayerProStat.GP ASC LIMIT 1";
            $TeamLeaderA = $db->querySingle($Query, true);
            
            // Récupération du leader en victoires (gardiens)
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
            
            // Récupération des derniers matchs
            $Query = "SELECT * FROM Schedule WHERE (HomeNumber = " . $Team . " OR AwayNumber = " . $Team . ") AND Played = 1 ORDER BY Date DESC LIMIT 5";
            $LastGames = $db->query($Query);
            
            // Récupération des prochains matchs
            $Query = "SELECT * FROM Schedule WHERE (HomeNumber = " . $Team . " OR AwayNumber = " . $Team . ") AND Played = 0 ORDER BY Date ASC LIMIT 5";
            $NextGames = $db->query($Query);
            
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
            
            <!-- Weekly Schedule -->
            <div class="weekly-schedule">
                <h3>Weekly Schedule</h3>
                <div class="schedule-container">
                    <div class="schedule-section">
                        <h4>Last 3 Days</h4>
                        <div class="schedule-days">
                            <?php
                            // Récupération des 3 derniers jours de matchs
                            $Query = "SELECT * FROM Schedule WHERE (HomeNumber = " . $Team . " OR AwayNumber = " . $Team . ") AND Played = 1 ORDER BY Date DESC LIMIT 3";
                            $Last3Days = $db->query($Query);
                            
                            if ($Last3Days) {
                                while ($Game = $Last3Days->fetchArray()) {
                                    $HomeTeam = $Game['HomeNumber'];
                                    $AwayTeam = $Game['AwayNumber'];
                                    $HomeScore = $Game['HomeScore'];
                                    $AwayScore = $Game['AwayScore'];
                                    $GameDate = $Game['Date'];
                                    
                                    // Récupérer les noms d'équipes
                                    $Query = "SELECT Name FROM TeamProInfo WHERE Number = " . $HomeTeam;
                                    $HomeTeamName = $db->querySingle($Query);
                                    $Query = "SELECT Name FROM TeamProInfo WHERE Number = " . $AwayTeam;
                                    $AwayTeamName = $db->querySingle($Query);
                                    
                                    $isHome = ($HomeTeam == $Team);
                                    $isWin = ($isHome && $HomeScore > $AwayScore) || (!$isHome && $AwayScore > $HomeScore);
                                    
                                    echo "<div class='schedule-day'>";
                                    echo "<div class='game-date'>" . date('M j', strtotime($GameDate)) . "</div>";
                                    echo "<div class='game-matchup " . ($isWin ? 'win' : 'loss') . "'>";
                                    echo "<div class='team-info'>";
                                    if (file_exists("images/" . $HomeTeam . ".png")) {
                                        echo "<img src='images/" . $HomeTeam . ".png' alt='" . $HomeTeamName . "' class='team-logo-mini'>";
                                    }
                                    echo "<span class='team-name'>" . $HomeTeamName . "</span>";
                                    echo "<span class=" . ($isHome ? "team-score win" : "team-score loss") . "'>" . $HomeScore . "</span>";
                                    echo "</div>";
                                    echo "<div class='team-info'>";
                                    if (file_exists("images/" . $AwayTeam . ".png")) {
                                        echo "<img src='images/" . $AwayTeam . ".png' alt='" . $AwayTeamName . "' class='team-logo-mini'>";
                                    }
                                    echo "<span class='team-name'>" . $AwayTeamName . "</span>";
                                    echo "<span class=" . ($isHome ? "team-score loss" : "team-score win") . "'>" . $AwayScore . "</span>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<div class='no-games'>No recent games</div>";
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="schedule-section">
                        <h4>Next 4 Days</h4>
                        <div class="schedule-days">
                            <?php
                            // Récupération des 4 prochains jours de matchs
                            $Query = "SELECT * FROM Schedule WHERE (HomeNumber = " . $Team . " OR AwayNumber = " . $Team . ") AND Played = 0 ORDER BY Date ASC LIMIT 4";
                            $Next4Days = $db->query($Query);
                            
                            if ($Next4Days) {
                                while ($Game = $Next4Days->fetchArray()) {
                                    $HomeTeam = $Game['HomeNumber'];
                                    $AwayTeam = $Game['AwayNumber'];
                                    $GameDate = $Game['Date'];
                                    
                                    // Récupérer les noms d'équipes
                                    $Query = "SELECT Name FROM TeamProInfo WHERE Number = " . $HomeTeam;
                                    $HomeTeamName = $db->querySingle($Query);
                                    $Query = "SELECT Name FROM TeamProInfo WHERE Number = " . $AwayTeam;
                                    $AwayTeamName = $db->querySingle($Query);
                                    
                                    $isHome = ($HomeTeam == $Team);
                                    
                                    echo "<div class='schedule-day'>";
                                    echo "<div class='game-date'>" . date('M j', strtotime($GameDate)) . "</div>";
                                    echo "<div class='game-matchup upcoming'>";
                                    echo "<div class='team-info'>";
                                    if (file_exists("images/" . $HomeTeam . ".png")) {
                                        echo "<img src='images/" . $HomeTeam . ".png' alt='" . $HomeTeamName . "' class='team-logo-mini'>";
                                    }
                                    echo "<span class='team-name'>" . $HomeTeamName . "</span>";
                                    echo "</div>";
                                    echo "<div class='team-info'>";
                                    if (file_exists("images/" . $AwayTeam . ".png")) {
                                        echo "<img src='images/" . $AwayTeam . ".png' alt='" . $AwayTeamName . "' class='team-logo-mini'>";
                                    }
                                    echo "<span class='team-name'>" . $AwayTeamName . "</span>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<div class='no-games'>No upcoming games</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Cartes de statistiques modernes -->
            <div class="stats-grid">
                <div class="stat-card span-2">
                    <h3>Team Leaders</h3>
                    <div class="stat-item">
                        <span class="stat-label">Points Leader</span>
                        <span class="stat-value"><?php echo $TeamLeaderP['Name'] ?? 'N/A'; ?> (<?php echo $TeamLeaderP['P'] ?? 0; ?>)</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Goals Leader</span>
                        <span class="stat-value"><?php echo $TeamLeaderG['Name'] ?? 'N/A'; ?> (<?php echo $TeamLeaderG['G'] ?? 0; ?>)</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Assists Leader</span>
                        <span class="stat-value"><?php echo $TeamLeaderA['Name'] ?? 'N/A'; ?> (<?php echo $TeamLeaderA['A'] ?? 0; ?>)</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Wins Leader</span>
                        <span class="stat-value"><?php echo $TeamLeaderW['Name'] ?? 'N/A'; ?> (<?php echo $TeamLeaderW['W'] ?? 0; ?>)</span>
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
            </div>

        </div>

        <!-- Onglet Roster -->
        <div class="tabmain" id="tabmain1">
            <h3>Team Roster</h3>
            <table class="STHSPHPPlayerStat_Table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Player</th>
                        <th>POS</th>
                        <th>Country</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Récupération du roster complet des joueurs avec informations de base
                    $Query = "SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Jersey, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, PlayerInfo.Country, PlayerInfo.AgeDate, PlayerInfo.Height, PlayerInfo.Weight FROM PlayerInfo WHERE PlayerInfo.Team = " . $Team . " AND PlayerInfo.Status1 >= 2 ORDER BY PlayerInfo.Name ASC";
                    $PlayerRoster = $db->query($Query);
                    
                    if ($PlayerRoster) {
                        while ($Player = $PlayerRoster->fetchArray()) {
                            $Position = "";
                            if ($Player['PosC'] == "True") $Position .= "C";
                            if ($Player['PosLW'] == "True") $Position .= ($Position ? "/" : "") . "LW";
                            if ($Player['PosRW'] == "True") $Position .= ($Position ? "/" : "") . "RW";
                            if ($Player['PosD'] == "True") $Position .= ($Position ? "/" : "") . "D";
                            
                            // Calcul de l'âge à partir de AgeDate
                            $Age = "";
                            if ($Player['AgeDate']) {
                                $birthDate = new DateTime($Player['AgeDate']);
                                $today = new DateTime();
                                $Age = $today->diff($birthDate)->y;
                            }
                            
                            echo "<tr>";
                            echo "<td>" . ($Player['Jersey'] ?? '-') . "</td>";
                            echo "<td><a href='PlayerReport.php?Player=" . $Player['Number'] . "' class='player-link'>" . $Player['Name'] . "</a></td>";
                            echo "<td>" . $Position . "</td>";
                            echo "<td>" . getCountryFlag($Player['Country'] ?? '') . "</td>";
                            echo "<td>" . ($Age ?: '-') . "</td>";
                            echo "<td>" . ($Player['Height'] ?? '-') . "</td>";
                            echo "<td>" . ($Player['Weight'] ?? '-') . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            <h3>Goaltenders</h3>
            <table class="STHSPHPGoalerStat_Table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Goaltender</th>
                        <th>Country</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Récupération du roster des gardiens avec informations de base
                    $Query = "SELECT GoalerInfo.Number, GoalerInfo.Name, GoalerInfo.Jersey, GoalerInfo.Country, GoalerInfo.AgeDate, GoalerInfo.Height, GoalerInfo.Weight FROM GoalerInfo WHERE GoalerInfo.Team = " . $Team . " ORDER BY GoalerInfo.Name ASC";
                    $GoalieRoster = $db->query($Query);
                    
                    if ($GoalieRoster) {
                        while ($Goalie = $GoalieRoster->fetchArray()) {
                            // Calcul de l'âge à partir de AgeDate
                            $Age = "";
                            if ($Goalie['AgeDate']) {
                                $birthDate = new DateTime($Goalie['AgeDate']);
                                $today = new DateTime();
                                $Age = $today->diff($birthDate)->y;
                            }
                            
                            echo "<tr>";
                            echo "<td>" . ($Goalie['Jersey'] ?? '-') . "</td>";
                            echo "<td><a href='GoalieReport.php?Goalie=" . $Goalie['Number'] . "' class='player-link'>" . $Goalie['Name'] . "</a></td>";
                            echo "<td>" . getCountryFlag($Goalie['Country'] ?? '') . "</td>";
                            echo "<td>" . ($Age ?: '-') . "</td>";
                            echo "<td>" . ($Goalie['Height'] ?? '-') . "</td>";
                            echo "<td>" . ($Goalie['Weight'] ?? '-') . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Onglet Prospects -->
        <div class="tabmain" id="tabmain9">
            <h3>Top Prospects</h3>
            <table class="STHSPHPPlayerStat_Table">
                <thead>
                    <tr>
                        <th>#</th>
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
                            echo "<td>" . ($Prospect['Jersey'] ?? '-') . "</td>";
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
                        <th>#</th>
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
                            echo "<td>" . ($Injury['Jersey'] ?? '-') . "</td>";
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