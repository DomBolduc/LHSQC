<?php include "Header.php";?>
<?php
/*
Modern Player Report Page - Clean and cohesive design
Syntax: PlayerReport.php?Player=2 where the number is based on the UniqueID of players.
*/

// Language and initialization
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

// Get player ID from URL
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
        echo "<style>.player-report-main {display:none;}</style>";
    }else{
        $Query = "SELECT count(*) AS count FROM PlayerInfo WHERE Number = " . $Player;
        $Result = $db->querySingle($Query,true);
        If ($Result['count'] == 1){
            // Get player info
            $Query = "SELECT PlayerInfo.*, TeamProInfo.Name AS ProTeamName FROM PlayerInfo LEFT JOIN TeamProInfo ON PlayerInfo.Team = TeamProInfo.Number WHERE PlayerInfo.Number = " . $Player;
            $PlayerInfo = $db->querySingle($Query,true);
            
            // Get Pro stats
            $Query = "SELECT PlayerProStat.*, ROUND((CAST(PlayerProStat.G AS REAL) / (PlayerProStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerProStat.SecondPlay AS REAL) / 60 / (PlayerProStat.GP)),2) AS AMG,ROUND((CAST(PlayerProStat.FaceOffWon AS REAL) / (PlayerProStat.FaceOffTotal))*100,2) as FaceoffPCT,ROUND((CAST(PlayerProStat.P AS REAL) / (PlayerProStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerProStat WHERE Number = " . $Player;
            $PlayerProStat = $db->querySingle($Query,true);
            
            // Get Farm stats
            $Query = "SELECT PlayerFarmStat.*, ROUND((CAST(PlayerFarmStat.G AS REAL) / (PlayerFarmStat.Shots))*100,2) AS ShotsPCT, ROUND((CAST(PlayerFarmStat.SecondPlay AS REAL) / 60 / (PlayerFarmStat.GP)),2) AS AMG,ROUND((CAST(PlayerFarmStat.FaceOffWon AS REAL) / (PlayerFarmStat.FaceOffTotal))*100,2) as FaceoffPCT,ROUND((CAST(PlayerFarmStat.P AS REAL) / (PlayerFarmStat.SecondPlay) * 60 * 20),2) AS P20 FROM PlayerFarmStat WHERE Number = " . $Player;
            $PlayerFarmStat = $db->querySingle($Query,true);
            
            // Check for multiple teams (Pro)
            $Query = "SELECT count(*) AS count FROM PlayerProStatMultipleTeam WHERE Number = " . $Player;
            $Result = $db->querySingle($Query,true);
            If ($Result['count'] > 0) {
                $PlayerProStatMultipleTeamFound = TRUE;
                $Query = "SELECT PlayerProStatMultipleTeam.*, TeamProInfo.Name AS TeamName, TeamProInfo.TeamThemeID 
                      FROM PlayerProStatMultipleTeam 
                      LEFT JOIN TeamProInfo ON PlayerProStatMultipleTeam.Team = TeamProInfo.Number
                      WHERE PlayerProStatMultipleTeam.Number = " . $Player;
                $PlayerProStatMultipleTeam = $db->query($Query);
            }
            
            // Check for multiple teams (Farm)
            $Query = "SELECT count(*) AS count FROM PlayerFarmStatMultipleTeam WHERE Number = " . $Player;
            $Result = $db->querySingle($Query,true);
            If ($Result['count'] > 0){
                $PlayerFarmStatMultipleTeamFound = TRUE;
                $Query = "SELECT PlayerFarmStatMultipleTeam.*, TeamFarmInfo.Name AS TeamName, TeamFarmInfo.TeamThemeID 
                      FROM PlayerFarmStatMultipleTeam 
                      LEFT JOIN TeamFarmInfo ON PlayerFarmStatMultipleTeam.Team = TeamFarmInfo.Number
                      WHERE PlayerFarmStatMultipleTeam.Number = " . $Player;
                $PlayerFarmStatMultipleTeam = $db->query($Query);
            }
            
            // Get teammates
            $TeamPlayers = null;
            If ($PlayerInfo['Team'] > 0){
                $Query = "SELECT MainTable.* FROM (SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.TeamName, PlayerInfo.URLLink, PlayerInfo.NHLID, 'False' AS PosG FROM PlayerInfo WHERE Team = " . $PlayerInfo['Team'] . " UNION ALL SELECT GoalerInfo.Number, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.TeamName, GoalerInfo.URLLink, GoalerInfo.NHLID, 'True' AS PosG FROM GoalerInfo WHERE Team = " . $PlayerInfo['Team'] . ") AS MainTable ORDER BY Name";
                $TeamPlayers = $db->query($Query);
            }
            
            $LeagueName = $LeagueGeneral['Name'];
            $PlayerName = $PlayerInfo['Name'];	
            
            // Career statistics
            If (file_exists($CareerStatDatabaseFile) == true){
                $CareerStatdb = new SQLite3($CareerStatDatabaseFile);
                $CareerTableCheck = $CareerStatdb->querySingle("SELECT Count(name) AS CountName FROM sqlite_master WHERE type='table' AND name='PlayerProStatCareer'",true);
                If ($CareerTableCheck['CountName'] == 1){
                    $Query = "SELECT * FROM PlayerProStatCareer WHERE UniqueID = " . $PlayerInfo['UniqueID'];
                    $PlayerProCareerStat = $CareerStatdb->querySingle($Query, true);
                    
                    if ($PlayerProCareerStat && !empty($PlayerProCareerStat)) {
                        $PlayerCareerStatFound = true;
                        
                        // Get career season stats
                        $Query = "SELECT * FROM PlayerProStatCareer WHERE UniqueID = " . $PlayerInfo['UniqueID'] . " AND Playoff = 'False' ORDER BY Year DESC";
                        $PlayerProCareerSeason = $CareerStatdb->query($Query);
                        
                        // Get career playoff stats
                        $Query = "SELECT * FROM PlayerProStatCareer WHERE UniqueID = " . $PlayerInfo['UniqueID'] . " AND Playoff = 'True' ORDER BY Year DESC";
                        $PlayerProCareerPlayoff = $CareerStatdb->query($Query);
                    }
                }
                $CareerStatdb->close();
            }
        }else{
            $Player = 0;
            $PlayerName = $PlayersLang['IncorrectPlayer'];
        }
    }
}catch (Exception $e){
    $Player = 0;
    $PlayerName = $DatabaseNotFound;
}

// Determine player position
$playerPosition = '';
if ($PlayerInfo) {
    $positions = [];
    if ($PlayerInfo['PosC'] == 'True') $positions[] = 'C';
    if ($PlayerInfo['PosLW'] == 'True') $positions[] = 'LW';
    if ($PlayerInfo['PosRW'] == 'True') $positions[] = 'RW';
    if ($PlayerInfo['PosD'] == 'True') $positions[] = 'D';
    $playerPosition = !empty($positions) ? implode(', ', $positions) : 'Unknown';
}

// Country mapping for flags
$countryMapping = [
    'USA' => 'us', 'CAN' => 'ca', 'SWE' => 'se', 'FIN' => 'fi', 'RUS' => 'ru',
    'GER' => 'de', 'FRA' => 'fr', 'CZE' => 'cz', 'SVK' => 'sk', 'NOR' => 'no',
    'DEN' => 'dk', 'SUI' => 'ch', 'AUT' => 'at', 'LAT' => 'lv', 'SLO' => 'si'
];
$countryCode = $countryMapping[$PlayerInfo['Country'] ?? ''] ?? null;
?>

<!-- Include modern CSS -->
<link rel="stylesheet" href="css/components/player-report.css">

<div class="player-report-main">
    <?php if ($Player == 0): ?>
        <!-- Error State -->
        <div class="container mt-4">
            <div class="alert alert-danger text-center">
                <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                <h4><?php echo $PlayerName; ?></h4>
                <p>Please select a valid player to view their report.</p>
                <a href="index.php" class="btn btn-primary">
                    <i class="fas fa-home"></i> Return to Home
                </a>
            </div>
        </div>
    <?php else: ?>
        <!-- Player Report Content -->
        <div class="player-report-container">
            <!-- Header Section -->
            <div class="player-header-section">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="player-title">
                            <h1 class="player-name">
                                <?php echo htmlspecialchars($PlayerName); ?>
                                <span class="player-number">#<?php echo $PlayerInfo['Number']; ?></span>
                            </h1>
                            <div class="player-team-info">
                                <?php if ($PlayerInfo['ProTeamName']): ?>
                                    <span class="team-name"><?php echo htmlspecialchars($PlayerInfo['ProTeamName']); ?></span>
                                    <span class="position-badge"><?php echo $playerPosition; ?></span>
                                <?php else: ?>
                                    <span class="team-name text-muted">Free Agent</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <!-- Teammates Dropdown -->
                        <?php if ($TeamPlayers): ?>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-users"></i> Teammates
                                </button>
                                <ul class="dropdown-menu">
                                    <?php while ($teammate = $TeamPlayers->fetchArray()): ?>
                                        <li>
                                            <a class="dropdown-item" href="PlayerReport.php?Player=<?php echo $teammate['Number']; ?>">
                                                <?php echo htmlspecialchars($teammate['Name']); ?>
                                                <?php if ($teammate['PosG'] == 'True'): ?>
                                                    <span class="badge bg-info ms-1">G</span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Player Profile Card -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="player-profile-card">
                        <div class="row">
                            <!-- Player Photo -->
                            <div class="col-lg-3 col-md-4 text-center">
                                <div class="player-photo-container">
                                    <?php if ($PlayerInfo['NHLID']): ?>
                                        <img src="<?php echo $LeagueOutputOption['PlayersMugShotBaseURL'] . $PlayerInfo['NHLID'] . '.' . $LeagueOutputOption['PlayersMugShotFileExtension']; ?>"
                                             alt="<?php echo htmlspecialchars($PlayerName); ?>"
                                             class="player-photo"
                                             onerror="this.src='images/default.png'">
                                    <?php else: ?>
                                        <img src="images/default.png"
                                             alt="<?php echo htmlspecialchars($PlayerName); ?>"
                                             class="player-photo">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Player Info -->
                            <div class="col-lg-6 col-md-5">
                                <div class="player-details">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="detail-item">
                                                <span class="detail-label">Position:</span>
                                                <span class="detail-value"><?php echo $playerPosition; ?></span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">Age:</span>
                                                <span class="detail-value"><?php echo $PlayerInfo['Age'] ?? 'Unknown'; ?></span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">Height:</span>
                                                <span class="detail-value"><?php echo $PlayerInfo['Height'] ?? 'Unknown'; ?></span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">Weight:</span>
                                                <span class="detail-value"><?php echo $PlayerInfo['Weight'] ?? 'Unknown'; ?> lbs</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="detail-item">
                                                <span class="detail-label">Birthplace:</span>
                                                <span class="detail-value">
                                                    <?php if ($countryCode): ?>
                                                        <span class="fi fi-<?php echo $countryCode; ?>"></span>
                                                    <?php endif; ?>
                                                    <?php echo $PlayerInfo['Country'] ?? 'Unknown'; ?>
                                                </span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">Birthdate:</span>
                                                <span class="detail-value"><?php echo $PlayerInfo['AgeDate'] ?? 'Unknown'; ?></span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">Draft Year:</span>
                                                <span class="detail-value"><?php echo $PlayerInfo['DraftYear'] ?? 'Unknown'; ?></span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">Contract:</span>
                                                <span class="detail-value"><?php echo $PlayerInfo['Contract'] ?? 'Unknown'; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Additional Info -->
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="detail-item">
                                                <span class="detail-label">Cap Hit:</span>
                                                <span class="detail-value cap-hit">
                                                    <?php echo isset($PlayerInfo['SalaryCap']) ? '$' . number_format($PlayerInfo['SalaryCap'], 0) : 'Unknown'; ?>
                                                </span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">Available For Trade:</span>
                                                <span class="detail-value <?php echo ($PlayerInfo['AvailableforTrade'] ?? '') == 'True' ? 'text-success' : 'text-danger'; ?>">
                                                    <?php echo ($PlayerInfo['AvailableforTrade'] ?? '') == 'True' ? 'Yes' : 'No'; ?>
                                                </span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="detail-label">Point Streak:</span>
                                                <span class="detail-value point-streak">
                                                    <?php echo $PlayerInfo['GameInRowWithAPoint'] ?? '0'; ?> games
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Team Logo -->
                            <div class="col-lg-3 col-md-3 text-center">
                                <div class="team-logo-container">
                                    <?php if (!empty($PlayerInfo['TeamThemeID'])): ?>
                                        <img src="<?php echo $ImagesCDNPath . '/images/' . $PlayerInfo['TeamThemeID'] . '.png'; ?>"
                                             alt="<?php echo $PlayerInfo['ProTeamName'] ?? 'Team Logo'; ?>"
                                             class="team-logo">
                                    <?php else: ?>
                                        <div class="no-team-logo">
                                            <i class="fas fa-user-slash fa-3x text-muted"></i>
                                            <p class="text-muted mt-2">Free Agent</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Player Ratings Section -->
            <?php if ($PlayerProStat): ?>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="stats-card">
                            <div class="card-header">
                                <h3><i class="fas fa-star"></i> Player Ratings</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <div class="rating-item">
                                            <span class="rating-label">Checking:</span>
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: <?php echo $PlayerInfo['CK']; ?>%"></div>
                                                <span class="rating-value"><?php echo $PlayerInfo['CK']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <div class="rating-item">
                                            <span class="rating-label">Fighting:</span>
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: <?php echo $PlayerInfo['FG']; ?>%"></div>
                                                <span class="rating-value"><?php echo $PlayerInfo['FG']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <div class="rating-item">
                                            <span class="rating-label">Discipline:</span>
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: <?php echo $PlayerInfo['DI']; ?>%"></div>
                                                <span class="rating-value"><?php echo $PlayerInfo['DI']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <div class="rating-item">
                                            <span class="rating-label">Skating:</span>
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: <?php echo $PlayerInfo['SK']; ?>%"></div>
                                                <span class="rating-value"><?php echo $PlayerInfo['SK']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <div class="rating-item">
                                            <span class="rating-label">Strength:</span>
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: <?php echo $PlayerInfo['ST']; ?>%"></div>
                                                <span class="rating-value"><?php echo $PlayerInfo['ST']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <div class="rating-item">
                                            <span class="rating-label">Endurance:</span>
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: <?php echo $PlayerInfo['EN']; ?>%"></div>
                                                <span class="rating-value"><?php echo $PlayerInfo['EN']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <div class="rating-item">
                                            <span class="rating-label">Durability:</span>
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: <?php echo $PlayerInfo['DU']; ?>%"></div>
                                                <span class="rating-value"><?php echo $PlayerInfo['DU']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <div class="rating-item">
                                            <span class="rating-label">Morale:</span>
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: <?php echo $PlayerInfo['MO']; ?>%"></div>
                                                <span class="rating-value"><?php echo $PlayerInfo['MO']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Offensive/Defensive Skills -->
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <h5 class="skills-title"><i class="fas fa-hockey-puck"></i> Offensive Skills</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="rating-item">
                                                    <span class="rating-label">Shooting:</span>
                                                    <div class="rating-bar">
                                                        <div class="rating-fill" style="width: <?php echo $PlayerInfo['SH']; ?>%"></div>
                                                        <span class="rating-value"><?php echo $PlayerInfo['SH']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="rating-item">
                                                    <span class="rating-label">Passing:</span>
                                                    <div class="rating-bar">
                                                        <div class="rating-fill" style="width: <?php echo $PlayerInfo['PA']; ?>%"></div>
                                                        <span class="rating-value"><?php echo $PlayerInfo['PA']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="rating-item">
                                                    <span class="rating-label">Hands:</span>
                                                    <div class="rating-bar">
                                                        <div class="rating-fill" style="width: <?php echo $PlayerInfo['SC']; ?>%"></div>
                                                        <span class="rating-value"><?php echo $PlayerInfo['SC']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="rating-item">
                                                    <span class="rating-label">Hockey Sense:</span>
                                                    <div class="rating-bar">
                                                        <div class="rating-fill" style="width: <?php echo $PlayerInfo['HS']; ?>%"></div>
                                                        <span class="rating-value"><?php echo $PlayerInfo['HS']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="skills-title"><i class="fas fa-shield-alt"></i> Defensive Skills</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="rating-item">
                                                    <span class="rating-label">Defense:</span>
                                                    <div class="rating-bar">
                                                        <div class="rating-fill" style="width: <?php echo $PlayerInfo['DF']; ?>%"></div>
                                                        <span class="rating-value"><?php echo $PlayerInfo['DF']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="rating-item">
                                                    <span class="rating-label">Leadership:</span>
                                                    <div class="rating-bar">
                                                        <div class="rating-fill" style="width: <?php echo $PlayerInfo['LD']; ?>%"></div>
                                                        <span class="rating-value"><?php echo $PlayerInfo['LD']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="rating-item">
                                                    <span class="rating-label">Penalty Kill:</span>
                                                    <div class="rating-bar">
                                                        <div class="rating-fill" style="width: <?php echo $PlayerInfo['PK']; ?>%"></div>
                                                        <span class="rating-value"><?php echo $PlayerInfo['PK']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="rating-item">
                                                    <span class="rating-label">Face-offs:</span>
                                                    <div class="rating-bar">
                                                        <div class="rating-fill" style="width: <?php echo $PlayerInfo['FO']; ?>%"></div>
                                                        <span class="rating-value"><?php echo $PlayerInfo['FO']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Current Season Statistics -->
            <div class="row mt-4">
                <!-- Pro Stats -->
                <?php if ($PlayerProStat && $PlayerProStat['GP'] > 0): ?>
                    <div class="col-lg-6 mb-4">
                        <div class="stats-card">
                            <div class="card-header">
                                <h3><i class="fas fa-chart-line"></i> Pro League Stats</h3>
                            </div>
                            <div class="card-body">
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <span class="stat-label">Games Played</span>
                                        <span class="stat-value"><?php echo $PlayerProStat['GP']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Goals</span>
                                        <span class="stat-value highlight"><?php echo $PlayerProStat['G']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Assists</span>
                                        <span class="stat-value highlight"><?php echo $PlayerProStat['A']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Points</span>
                                        <span class="stat-value highlight-primary"><?php echo $PlayerProStat['P']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">+/-</span>
                                        <span class="stat-value <?php echo $PlayerProStat['PlusMinus'] >= 0 ? 'text-success' : 'text-danger'; ?>">
                                            <?php echo $PlayerProStat['PlusMinus'] >= 0 ? '+' : ''; ?><?php echo $PlayerProStat['PlusMinus']; ?>
                                        </span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">PIM</span>
                                        <span class="stat-value"><?php echo $PlayerProStat['Pim']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Shots</span>
                                        <span class="stat-value"><?php echo $PlayerProStat['Shots']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Shot %</span>
                                        <span class="stat-value"><?php echo $PlayerProStat['ShotsPCT'] ?? '0.00'; ?>%</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">PPG</span>
                                        <span class="stat-value"><?php echo $PlayerProStat['PPG']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Hits</span>
                                        <span class="stat-value"><?php echo $PlayerProStat['Hits']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Blocked Shots</span>
                                        <span class="stat-value"><?php echo $PlayerProStat['ShotsBlock']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Avg TOI</span>
                                        <span class="stat-value"><?php echo $PlayerProStat['AMG'] ?? '0.00'; ?> min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Farm Stats -->
                <?php if ($PlayerFarmStat && $PlayerFarmStat['GP'] > 0): ?>
                    <div class="col-lg-6 mb-4">
                        <div class="stats-card">
                            <div class="card-header">
                                <h3><i class="fas fa-seedling"></i> Farm League Stats</h3>
                            </div>
                            <div class="card-body">
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <span class="stat-label">Games Played</span>
                                        <span class="stat-value"><?php echo $PlayerFarmStat['GP']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Goals</span>
                                        <span class="stat-value highlight"><?php echo $PlayerFarmStat['G']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Assists</span>
                                        <span class="stat-value highlight"><?php echo $PlayerFarmStat['A']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Points</span>
                                        <span class="stat-value highlight-primary"><?php echo $PlayerFarmStat['P']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">+/-</span>
                                        <span class="stat-value <?php echo $PlayerFarmStat['PlusMinus'] >= 0 ? 'text-success' : 'text-danger'; ?>">
                                            <?php echo $PlayerFarmStat['PlusMinus'] >= 0 ? '+' : ''; ?><?php echo $PlayerFarmStat['PlusMinus']; ?>
                                        </span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">PIM</span>
                                        <span class="stat-value"><?php echo $PlayerFarmStat['Pim']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Shots</span>
                                        <span class="stat-value"><?php echo $PlayerFarmStat['Shots']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Shot %</span>
                                        <span class="stat-value"><?php echo $PlayerFarmStat['ShotsPCT'] ?? '0.00'; ?>%</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">PPG</span>
                                        <span class="stat-value"><?php echo $PlayerFarmStat['PPG']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Hits</span>
                                        <span class="stat-value"><?php echo $PlayerFarmStat['Hits']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Blocked Shots</span>
                                        <span class="stat-value"><?php echo $PlayerFarmStat['ShotsBlock']; ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Avg TOI</span>
                                        <span class="stat-value"><?php echo $PlayerFarmStat['AMG'] ?? '0.00'; ?> min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Multiple Teams Statistics -->
            <?php if ($PlayerProStatMultipleTeamFound): ?>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="stats-card">
                            <div class="card-header">
                                <h3><i class="fas fa-exchange-alt"></i> Pro League - Multiple Teams</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Team</th>
                                                <th>GP</th>
                                                <th>G</th>
                                                <th>A</th>
                                                <th>P</th>
                                                <th>+/-</th>
                                                <th>PIM</th>
                                                <th>Shots</th>
                                                <th>S%</th>
                                                <th>PPG</th>
                                                <th>Hits</th>
                                                <th>Blocks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $PlayerProStatMultipleTeam->fetchArray()): ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <img src="<?php echo $ImagesCDNPath . '/images/' . $row['TeamThemeID'] . '.png'; ?>"
                                                             alt="<?php echo htmlspecialchars($row['TeamName']); ?>"
                                                             style="width: 30px; height: 30px;">
                                                    </td>
                                                    <td><?php echo $row['GP']; ?></td>
                                                    <td class="highlight"><?php echo $row['G']; ?></td>
                                                    <td class="highlight"><?php echo $row['A']; ?></td>
                                                    <td class="highlight-primary"><?php echo $row['P']; ?></td>
                                                    <td class="<?php echo $row['PlusMinus'] >= 0 ? 'text-success' : 'text-danger'; ?>">
                                                        <?php echo $row['PlusMinus'] >= 0 ? '+' : ''; ?><?php echo $row['PlusMinus']; ?>
                                                    </td>
                                                    <td><?php echo $row['Pim']; ?></td>
                                                    <td><?php echo $row['Shots']; ?></td>
                                                    <td><?php echo round(($row['Shots'] > 0 ? ($row['G'] / $row['Shots']) * 100 : 0), 2); ?>%</td>
                                                    <td><?php echo $row['PPG']; ?></td>
                                                    <td><?php echo $row['Hits']; ?></td>
                                                    <td><?php echo $row['ShotsBlock']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($PlayerFarmStatMultipleTeamFound): ?>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="stats-card">
                            <div class="card-header">
                                <h3><i class="fas fa-seedling"></i> Farm League - Multiple Teams</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Team</th>
                                                <th>GP</th>
                                                <th>G</th>
                                                <th>A</th>
                                                <th>P</th>
                                                <th>+/-</th>
                                                <th>PIM</th>
                                                <th>Shots</th>
                                                <th>S%</th>
                                                <th>PPG</th>
                                                <th>Hits</th>
                                                <th>Blocks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $PlayerFarmStatMultipleTeam->fetchArray()): ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <img src="<?php echo $ImagesCDNPath . '/images/' . $row['TeamThemeID'] . '.png'; ?>"
                                                             alt="<?php echo htmlspecialchars($row['TeamName']); ?>"
                                                             style="width: 30px; height: 30px;">
                                                    </td>
                                                    <td><?php echo $row['GP']; ?></td>
                                                    <td class="highlight"><?php echo $row['G']; ?></td>
                                                    <td class="highlight"><?php echo $row['A']; ?></td>
                                                    <td class="highlight-primary"><?php echo $row['P']; ?></td>
                                                    <td class="<?php echo $row['PlusMinus'] >= 0 ? 'text-success' : 'text-danger'; ?>">
                                                        <?php echo $row['PlusMinus'] >= 0 ? '+' : ''; ?><?php echo $row['PlusMinus']; ?>
                                                    </td>
                                                    <td><?php echo $row['Pim']; ?></td>
                                                    <td><?php echo $row['Shots']; ?></td>
                                                    <td><?php echo round(($row['Shots'] > 0 ? ($row['G'] / $row['Shots']) * 100 : 0), 2); ?>%</td>
                                                    <td><?php echo $row['PPG']; ?></td>
                                                    <td><?php echo $row['Hits']; ?></td>
                                                    <td><?php echo $row['ShotsBlock']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Career Statistics -->
            <?php if ($PlayerCareerStatFound): ?>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="stats-card">
                            <div class="card-header">
                                <h3><i class="fas fa-history"></i> Career Statistics</h3>
                            </div>
                            <div class="card-body">
                                <!-- Career Season Stats -->
                                <?php if ($PlayerProCareerSeason): ?>
                                    <h5 class="skills-title"><i class="fas fa-calendar-alt"></i> Regular Season History</h5>
                                    <div class="table-responsive mb-4">
                                        <table class="table table-hover table-sm">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Team</th>
                                                    <th>GP</th>
                                                    <th>G</th>
                                                    <th>A</th>
                                                    <th>P</th>
                                                    <th>+/-</th>
                                                    <th>PIM</th>
                                                    <th>PPG</th>
                                                    <th>Shots</th>
                                                    <th>Hits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $PlayerProCareerSeason->fetchArray()): ?>
                                                    <tr>
                                                        <td><strong><?php echo $row['Year']; ?></strong></td>
                                                        <td><?php echo htmlspecialchars($row['Name']); ?></td>
                                                        <td><?php echo $row['GP']; ?></td>
                                                        <td class="highlight"><?php echo $row['G']; ?></td>
                                                        <td class="highlight"><?php echo $row['A']; ?></td>
                                                        <td class="highlight-primary"><?php echo $row['P']; ?></td>
                                                        <td class="<?php echo $row['PlusMinus'] >= 0 ? 'text-success' : 'text-danger'; ?>">
                                                            <?php echo $row['PlusMinus'] >= 0 ? '+' : ''; ?><?php echo $row['PlusMinus']; ?>
                                                        </td>
                                                        <td><?php echo $row['Pim']; ?></td>
                                                        <td><?php echo $row['PPG']; ?></td>
                                                        <td><?php echo $row['Shots']; ?></td>
                                                        <td><?php echo $row['Hits']; ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>

                                <!-- Career Playoff Stats -->
                                <?php if ($PlayerProCareerPlayoff): ?>
                                    <h5 class="skills-title"><i class="fas fa-trophy"></i> Playoff History</h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-sm">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Team</th>
                                                    <th>GP</th>
                                                    <th>G</th>
                                                    <th>A</th>
                                                    <th>P</th>
                                                    <th>+/-</th>
                                                    <th>PIM</th>
                                                    <th>PPG</th>
                                                    <th>Shots</th>
                                                    <th>Hits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $PlayerProCareerPlayoff->fetchArray()): ?>
                                                    <tr>
                                                        <td><strong><?php echo $row['Year']; ?></strong></td>
                                                        <td><?php echo htmlspecialchars($row['Name']); ?></td>
                                                        <td><?php echo $row['GP']; ?></td>
                                                        <td class="highlight"><?php echo $row['G']; ?></td>
                                                        <td class="highlight"><?php echo $row['A']; ?></td>
                                                        <td class="highlight-primary"><?php echo $row['P']; ?></td>
                                                        <td class="<?php echo $row['PlusMinus'] >= 0 ? 'text-success' : 'text-danger'; ?>">
                                                            <?php echo $row['PlusMinus'] >= 0 ? '+' : ''; ?><?php echo $row['PlusMinus']; ?>
                                                        </td>
                                                        <td><?php echo $row['Pim']; ?></td>
                                                        <td><?php echo $row['PPG']; ?></td>
                                                        <td><?php echo $row['Shots']; ?></td>
                                                        <td><?php echo $row['Hits']; ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>
</div>

<?php include "Footer.php"; ?>
