<?php
$lang = "en";
require_once("LanguageEN.php");
$LeagueName = Null;
session_start();
mb_internal_encoding("UTF-8");
$PerformanceMonitorStart = microtime(true);
require_once("STHSSetting.php");

include "Header.php";

// Configuration des bases de données
$DatabaseFile = "LHSQC-STHS.db";
$TradeBoardDBFile = "LHSQC-TradeBoard.db";

try {
    // Vérifier que la DB principale existe
    if (file_exists($DatabaseFile) == false) {
        throw new Exception("Database principale non trouvée");
    }
    
    // Vérifier que la DB Trade Board existe
    if (file_exists($TradeBoardDBFile) == false) {
        throw new Exception("Base de données Trade Board non trouvée. <a href='InitializeTradeBoard.php'>Cliquez ici pour l'initialiser</a>");
    }
    
    // Ouvrir la DB principale pour infos générales et équipes
    $mainDB = new SQLite3($DatabaseFile);
    $db = $mainDB;
    
    // Ouvrir la DB Trade Board pour les annonces
    $tradeDB = new SQLite3($TradeBoardDBFile);
    
    // Récupération des informations générales de la ligue
    $Query = "SELECT Name FROM LeagueGeneral";
    $LeagueGeneral = $mainDB->querySingle($Query, true);
    $LeagueName = $LeagueGeneral['Name'];
    
    // Récupération de tous les joueurs disponibles
    $QueryPlayers = "SELECT * FROM trade_board 
                     WHERE type = 'player' AND is_active = 1
                     ORDER BY date_posted DESC";
    $PlayersAvailable = $tradeDB->query($QueryPlayers);
    
    // Récupération de tous les besoins
    $QueryNeeds = "SELECT * FROM trade_board 
                   WHERE type = 'need' AND is_active = 1
                   ORDER BY CASE need_priority 
                       WHEN 'high' THEN 1 
                       WHEN 'medium' THEN 2 
                       WHEN 'low' THEN 3 
                   END, date_posted DESC";
    $NeedsAvailable = $tradeDB->query($QueryNeeds);
    
} catch (Exception $e) {
    $LeagueName = "Database Error";
    $PlayersAvailable = null;
    $NeedsAvailable = null;
}

echo "<title>" . $LeagueName . " - Transfer Room</title>";
?>

<style>
.transfer-room-header {
    background: linear-gradient(135deg, #1f1f1f 0%, #000000 100%);
    color: white;
    padding: 40px 0;
    margin-bottom: 30px;
}

.transfer-room-header .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    gap: 10px;
}

.trade-card {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    background: white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.trade-card:hover {
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.team-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 12px;
    background: #f8f9fa;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
}

.team-logo-small {
    width: 24px;
    height: 24px;
    object-fit: contain;
}

.player-info {
    display: flex;
    align-items: center;
    gap: 15px;
    margin: 15px 0;
}

.player-stats {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.stat-badge {
    display: inline-block;
    padding: 4px 10px;
    background: #e3f2fd;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
}

.priority-high {
    background: #ffebee;
    color: #c62828;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.priority-medium {
    background: #fff3e0;
    color: #ef6c00;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.priority-low {
    background: #f1f8e9;
    color: #558b2f;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.date-posted {
    font-size: 12px;
    color: #999;
    display: flex;
    align-items: center;
    gap: 5px;
}

.section-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #999;
}

.empty-state i {
    font-size: 64px;
    margin-bottom: 20px;
    opacity: 0.3;
}

@media (max-width: 768px) {
    .transfer-room-header {
        padding: 20px 0;
    }
    
    .section-title {
        font-size: 20px;
    }
    
    .player-stats {
        gap: 8px;
    }
    
    .stat-badge {
        font-size: 11px;
        padding: 3px 8px;
    }
}
</style>

<body>
<header>
<?php include "components/GamesScroller.php"; ?>
<?php include "Menu.php"; ?>

<div class="transfer-room-header">
    <div class="container">
        <h1 class="m-0"><i class="fas fa-retweet me-3"></i>Trade Market</h1>
        <p class="mb-0 mt-2 text-primary">Joueurs disponibles et besoins des équipes</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <!-- Section Joueurs Disponibles -->
        <div class="col-lg-6 mb-4">
            <div class="section-title">
                <i class="fas fa-users text-primary"></i>
                <span>Joueurs Disponibles</span>
                <span class="badge bg-primary ms-2">
                    <?php 
                    if ($PlayersAvailable) {
                        $count = 0;
                        while ($PlayersAvailable->fetchArray()) { $count++; }
                        $PlayersAvailable->reset();
                        echo $count;
                    } else {
                        echo "0";
                    }
                    ?>
                </span>
            </div>
            
            <?php
            if ($PlayersAvailable) {
                $hasPlayers = false;
                while ($player = $PlayersAvailable->fetchArray()) {
                    $hasPlayers = true;
                    
                    // Récupérer le TeamThemeID depuis mainDB
                    $QueryTeam = "SELECT TeamThemeID FROM TeamProInfo WHERE Number = " . $player['team_number'];
                    $TeamTheme = $mainDB->querySingle($QueryTeam, true);
                    $TeamThemeID = $TeamTheme['TeamThemeID'] ?? null;
                    
                    // Déterminer si c'est un gardien (player_number > 10000)
                    $isGoalie = $player['player_number'] > 10000;
                    $actualPlayerNumber = $isGoalie ? $player['player_number'] - 10000 : $player['player_number'];
                    $playerLink = $isGoalie ? "GoalieReport.php?Goalie=" . $actualPlayerNumber : "PlayerReport.php?Player=" . $actualPlayerNumber;
                    ?>
                    <div class="trade-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="team-badge">
                                <?php if ($TeamThemeID): ?>
                                    <img src="images/<?php echo $TeamThemeID; ?>.png" 
                                         alt="<?php echo $player['team_name']; ?>" 
                                         class="team-logo-small">
                                <?php endif; ?>
                                <span><?php echo htmlspecialchars($player['team_name']); ?></span>
                            </div>
                            <div class="date-posted">
                                <i class="far fa-clock"></i>
                                <?php echo date('M d, Y', strtotime($player['date_posted'])); ?>
                            </div>
                        </div>
                        
                        <div class="player-info">
                            <div>
                                <h5 class="mb-1">
                                    <a href="<?php echo $playerLink; ?>">
                                        <?php echo htmlspecialchars($player['player_name']); ?>
                                    </a>
                                </h5>
                                <div class="player-stats">
                                    <span class="stat-badge">
                                        <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($player['player_position']); ?>
                                    </span>
                                    <span class="stat-badge">
                                        <i class="fas fa-star"></i> OV: <?php echo $player['player_overall']; ?>
                                    </span>
                                    <span class="stat-badge">
                                        <i class="fas fa-birthday-cake"></i> <?php echo $player['player_age']; ?> ans
                                    </span>
                                    <span class="stat-badge">
                                        <i class="fas fa-file-contract"></i> <?php echo $player['player_contract']; ?> année(s)
                                    </span>
                                    <span class="stat-badge">
                                        <i class="fas fa-dollar-sign"></i> $<?php echo number_format($player['player_salary']); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <?php if ($player['comments']): ?>
                            <div class="mt-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                                <small class="text-muted">
                                    <i class="fas fa-comment"></i> <?php echo htmlspecialchars($player['comments']); ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                }
                
                if (!$hasPlayers) {
                    echo '<div class="empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>Aucun joueur disponible pour le moment</p>
                          </div>';
                }
            } else {
                echo '<div class="empty-state">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p>Erreur de chargement</p>
                      </div>';
            }
            ?>
        </div>
        
        <!-- Section Besoins -->
        <div class="col-lg-6 mb-4">
            <div class="section-title">
                <i class="fas fa-search text-success"></i>
                <span>Besoins des Équipes</span>
                <span class="badge bg-success ms-2">
                    <?php 
                    if ($NeedsAvailable) {
                        $count = 0;
                        while ($NeedsAvailable->fetchArray()) { $count++; }
                        $NeedsAvailable->reset();
                        echo $count;
                    } else {
                        echo "0";
                    }
                    ?>
                </span>
            </div>
            
            <?php
            if ($NeedsAvailable) {
                $hasNeeds = false;
                while ($need = $NeedsAvailable->fetchArray()) {
                    $hasNeeds = true;
                    
                    // Récupérer le TeamThemeID depuis mainDB
                    $QueryTeam = "SELECT TeamThemeID FROM TeamProInfo WHERE Number = " . $need['team_number'];
                    $TeamTheme = $mainDB->querySingle($QueryTeam, true);
                    $TeamThemeID = $TeamTheme['TeamThemeID'] ?? null;
                    
                    // Déterminer la classe de priorité
                    $priorityClass = 'priority-' . strtolower($need['need_priority']);
                    $priorityText = ucfirst($need['need_priority']);
                    ?>
                    <div class="trade-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="team-badge">
                                <?php if ($TeamThemeID): ?>
                                    <img src="images/<?php echo $TeamThemeID; ?>.png" 
                                         alt="<?php echo $need['team_name']; ?>" 
                                         class="team-logo-small">
                                <?php endif; ?>
                                <span><?php echo htmlspecialchars($need['team_name']); ?></span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="<?php echo $priorityClass; ?>">
                                    <?php echo $priorityText; ?>
                                </span>
                                <div class="date-posted">
                                    <i class="far fa-clock"></i>
                                    <?php echo date('M d, Y', strtotime($need['date_posted'])); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h5 class="mb-2"><?php echo htmlspecialchars($need['need_description']); ?></h5>
                            <?php if ($need['need_position']): ?>
                                <span class="stat-badge">
                                    <i class="fas fa-map-marker-alt"></i> Position: <?php echo htmlspecialchars($need['need_position']); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <?php if ($need['comments']): ?>
                            <div class="mt-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                                <small class="text-muted">
                                    <i class="fas fa-comment"></i> <?php echo htmlspecialchars($need['comments']); ?>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                }
                
                if (!$hasNeeds) {
                    echo '<div class="empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>Aucun besoin publié pour le moment</p>
                          </div>';
                }
            } else {
                echo '<div class="empty-state">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p>Erreur de chargement</p>
                      </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php include "Footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

