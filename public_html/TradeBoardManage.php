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

// Vérification de la connexion
if ($CookieTeamNumber <= 0 || $CookieTeamNumber > 100) {
    header("Location: Login.php");
    exit;
}

$successMessage = "";
$errorMessage = "";
$TeamInfo = ['Name' => 'Unknown Team']; // Initialisation par défaut

try {
    // Vérifier que les DB existent
    if (file_exists($DatabaseFile) == false) {
        throw new Exception("Database principale non trouvée");
    }
    
    if (file_exists($TradeBoardDBFile) == false) {
        throw new Exception("Base de données Trade Board non trouvée. <a href='InitializeTradeBoard.php'>Cliquez ici pour l'initialiser</a>");
    }
    
    // Ouvrir la DB principale pour les infos des joueurs/équipes
    $mainDB = new SQLite3($DatabaseFile);
    $db = $mainDB;
    
    // Ouvrir la DB Trade Board pour les annonces
    $tradeDB = new SQLite3($TradeBoardDBFile);

    // S'assurer que la table existe (dans le cas où l'initialisation n'a pas été exécutée)
    $createTradeTable = "
        CREATE TABLE IF NOT EXISTS trade_board (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            team_number INTEGER NOT NULL,
            team_name TEXT,
            type TEXT NOT NULL CHECK(type IN ('player', 'need')),
            player_number INTEGER,
            player_name TEXT,
            player_position TEXT,
            player_overall INTEGER,
            player_age INTEGER,
            player_salary INTEGER,
            player_contract INTEGER,
            need_description TEXT,
            need_position TEXT,
            need_priority TEXT CHECK(need_priority IN ('high', 'medium', 'low')),
            comments TEXT,
            date_posted DATETIME DEFAULT CURRENT_TIMESTAMP,
            is_active INTEGER DEFAULT 1
        )
    ";

    if ($tradeDB->exec($createTradeTable) === false) {
        throw new Exception("Impossible de préparer la table trade_board: " . $tradeDB->lastErrorMsg());
    }
    
    // Récupération des informations de l'équipe
    $Query = "SELECT * FROM TeamProInfo WHERE Number = " . $CookieTeamNumber;
    $TeamInfo = $mainDB->querySingle($Query, true);
    
    // Traitement de l'ajout d'un joueur
    if (isset($_POST['action']) && $_POST['action'] == 'add_player') {
        $playerNumber = filter_var($_POST['player_number'], FILTER_SANITIZE_NUMBER_INT);
        $comments = htmlspecialchars(trim($_POST['comments'] ?? ''), ENT_QUOTES, 'UTF-8');
        
        // Récupération des infos du joueur
        $QueryPlayer = "SELECT Name, PosC, PosLW, PosRW, PosD, Overall, Age, Contract, Salary1 
                        FROM PlayerInfo WHERE Number = " . $playerNumber . " AND Team = " . $CookieTeamNumber;
        $PlayerInfo = $mainDB->querySingle($QueryPlayer, true);
        
        if ($PlayerInfo) {
            // Déterminer la position
            $position = "";
            if ($PlayerInfo['PosC'] == "True") $position .= "C";
            if ($PlayerInfo['PosLW'] == "True") $position .= ($position ? "/" : "") . "LW";
            if ($PlayerInfo['PosRW'] == "True") $position .= ($position ? "/" : "") . "RW";
            if ($PlayerInfo['PosD'] == "True") $position .= ($position ? "/" : "") . "D";
            
            $InsertQuery = "INSERT INTO trade_board (team_number, team_name, type, player_number, player_name, 
                           player_position, player_overall, player_age, player_salary, player_contract, comments) 
                           VALUES (?, ?, 'player', ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $tradeDB->prepare($InsertQuery);
            if (!$stmt) {
                $errorMessage = "Erreur lors de la préparation de l'ajout du joueur: " . $tradeDB->lastErrorMsg();
            } else {
                $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
                $stmt->bindValue(2, $TeamInfo['Name'], SQLITE3_TEXT);
                $stmt->bindValue(3, $playerNumber, SQLITE3_INTEGER);
                $stmt->bindValue(4, $PlayerInfo['Name'], SQLITE3_TEXT);
                $stmt->bindValue(5, $position, SQLITE3_TEXT);
                $stmt->bindValue(6, $PlayerInfo['Overall'], SQLITE3_INTEGER);
                $stmt->bindValue(7, $PlayerInfo['Age'], SQLITE3_INTEGER);
                $stmt->bindValue(8, $PlayerInfo['Salary1'], SQLITE3_INTEGER);
                $stmt->bindValue(9, $PlayerInfo['Contract'], SQLITE3_INTEGER);
                $stmt->bindValue(10, $comments, SQLITE3_TEXT);

                if ($stmt->execute()) {
                    $successMessage = "Joueur ajouté au marché des échanges!";
                } else {
                    $errorMessage = "Erreur lors de l'ajout du joueur: " . $tradeDB->lastErrorMsg();
                }
            }
        }
    }
    
    // Traitement de l'ajout d'un gardien
    if (isset($_POST['action']) && $_POST['action'] == 'add_goalie') {
        $goalieNumber = filter_var($_POST['goalie_number'], FILTER_SANITIZE_NUMBER_INT);
        $comments = htmlspecialchars(trim($_POST['comments'] ?? ''), ENT_QUOTES, 'UTF-8');
        
        // Récupération des infos du gardien
        $QueryGoalie = "SELECT Name, Overall, Age, Contract, Salary1 
                        FROM GoalerInfo WHERE Number = " . $goalieNumber . " AND Team = " . $CookieTeamNumber;
        $GoalieInfo = $mainDB->querySingle($QueryGoalie, true);
        
        if ($GoalieInfo) {
            $InsertQuery = "INSERT INTO trade_board (team_number, team_name, type, player_number, player_name, 
                           player_position, player_overall, player_age, player_salary, player_contract, comments) 
                           VALUES (?, ?, 'player', ?, ?, 'G', ?, ?, ?, ?, ?)";
            
            $stmt = $tradeDB->prepare($InsertQuery);
            if (!$stmt) {
                $errorMessage = "Erreur lors de la préparation de l'ajout du gardien: " . $tradeDB->lastErrorMsg();
            } else {
                $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
                $stmt->bindValue(2, $TeamInfo['Name'], SQLITE3_TEXT);
                $stmt->bindValue(3, $goalieNumber + 10000, SQLITE3_INTEGER); // Offset pour les gardiens
                $stmt->bindValue(4, $GoalieInfo['Name'], SQLITE3_TEXT);
                $stmt->bindValue(5, $GoalieInfo['Overall'], SQLITE3_INTEGER);
                $stmt->bindValue(6, $GoalieInfo['Age'], SQLITE3_INTEGER);
                $stmt->bindValue(7, $GoalieInfo['Salary1'], SQLITE3_INTEGER);
                $stmt->bindValue(8, $GoalieInfo['Contract'], SQLITE3_INTEGER);
                $stmt->bindValue(9, $comments, SQLITE3_TEXT);

                if ($stmt->execute()) {
                    $successMessage = "Gardien ajouté au marché des échanges!";
                } else {
                    $errorMessage = "Erreur lors de l'ajout du gardien: " . $tradeDB->lastErrorMsg();
                }
            }
        }
    }
    
    // Traitement de l'ajout d'un besoin
    if (isset($_POST['action']) && $_POST['action'] == 'add_need') {
        $description = htmlspecialchars(trim($_POST['need_description'] ?? ''), ENT_QUOTES, 'UTF-8');
        $position = htmlspecialchars(trim($_POST['need_position'] ?? ''), ENT_QUOTES, 'UTF-8');
        $priority = htmlspecialchars(trim($_POST['need_priority'] ?? ''), ENT_QUOTES, 'UTF-8');
        $comments = htmlspecialchars(trim($_POST['comments'] ?? ''), ENT_QUOTES, 'UTF-8');
        
        $InsertQuery = "INSERT INTO trade_board (team_number, team_name, type, need_description, 
                       need_position, need_priority, comments) 
                       VALUES (?, ?, 'need', ?, ?, ?, ?)";
        
        $stmt = $tradeDB->prepare($InsertQuery);
        if (!$stmt) {
            $errorMessage = "Erreur lors de la préparation du besoin: " . $tradeDB->lastErrorMsg();
        } else {
            $stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
            $stmt->bindValue(2, $TeamInfo['Name'], SQLITE3_TEXT);
            $stmt->bindValue(3, $description, SQLITE3_TEXT);
            $stmt->bindValue(4, $position, SQLITE3_TEXT);
            $stmt->bindValue(5, $priority, SQLITE3_TEXT);
            $stmt->bindValue(6, $comments, SQLITE3_TEXT);

            if ($stmt->execute()) {
                $successMessage = "Besoin ajouté au marché des échanges!";
            } else {
                $errorMessage = "Erreur lors de l'ajout du besoin: " . $tradeDB->lastErrorMsg();
            }
        }
    }
    
    // Traitement de la suppression
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        
        $DeleteQuery = "UPDATE trade_board SET is_active = 0 
                       WHERE id = ? AND team_number = ?";
        
        $stmt = $tradeDB->prepare($DeleteQuery);
        $stmt->bindValue(1, $id, SQLITE3_INTEGER);
        $stmt->bindValue(2, $CookieTeamNumber, SQLITE3_INTEGER);
        
        if ($stmt->execute()) {
            $successMessage = "Annonce retirée du marché!";
        }
    }
    
    // Récupération des annonces de l'équipe
    $QueryMyPosts = "SELECT * FROM trade_board 
                    WHERE team_number = " . $CookieTeamNumber . " AND is_active = 1 
                    ORDER BY date_posted DESC";
    $MyPosts = $tradeDB->query($QueryMyPosts);
    
    // Récupération des joueurs de l'équipe
    $QueryMyPlayers = "SELECT Number, Name, PosC, PosLW, PosRW, PosD, Overall, Age, Contract, Salary1 
                      FROM PlayerInfo 
                      WHERE Team = " . $CookieTeamNumber . " AND Status1 >= 2 
                      ORDER BY Overall DESC";
    $MyPlayers = $mainDB->query($QueryMyPlayers);
    
    // Récupération des gardiens de l'équipe
    $QueryMyGoalies = "SELECT Number, Name, Overall, Age, Contract, Salary1 
                      FROM GoalerInfo 
                      WHERE Team = " . $CookieTeamNumber . " AND Status1 >= 2 
                      ORDER BY Overall DESC";
    $MyGoalies = $mainDB->query($QueryMyGoalies);
    
} catch (Exception $e) {
    $errorMessage = "Erreur: " . $e->getMessage();
}

echo "<title>" . $TeamInfo['Name'] . " - Gestion Transfer Room</title>";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
$TeamLogoID = $TeamInfo['TeamThemeID'] ?? null;
?>

<style>
.manage-header {
    background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    color: white;
    padding: 30px 0;
    margin-bottom: 30px;
}

.manage-header .container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-custom {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.card-custom .card-header {
    background: #f8f9fa;
    border-bottom: 2px solid #e9ecef;
    padding: 15px 20px;
    font-weight: 600;
    border-radius: 12px 12px 0 0;
}

nav a,
nav a:hover,
nav a:focus {
    text-decoration: none !important;
}

.btn-trade {
    border-radius: 8px;
    padding: 8px 20px;
    font-weight: 500;
}

.post-item {
    padding: 15px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 15px;
    background: white;
    transition: all 0.2s ease;
}

.post-item:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.team-logo-header {
    width: 128px;
    height: 128px;
    object-fit: contain;
    background: rgba(255,255,255,0.15);
    border-radius: 12px;
    padding: 8px;
}

.team-name-fallback {
    font-size: 24px;
    font-weight: 600;
    margin: 0;
}

@media (max-width: 768px) {
    .manage-header {
        padding: 20px 0;
    }

    .team-logo-header {
        width: 96px;
        height: 96px;
    }
}
</style>

<body>
<header>
<?php include "components/GamesScroller.php"; ?>
<?php include "Menu.php"; ?>

<div class="manage-header">
    <div class="container">
        <?php if ($TeamLogoID): ?>
            <img src="images/<?php echo $TeamLogoID; ?>.png"
                 alt="<?php echo htmlspecialchars($TeamInfo['Name']); ?>"
                 class="team-logo-header">
        <?php else: ?>
            <p class="team-name-fallback"><?php echo htmlspecialchars($TeamInfo['Name']); ?></p>
        <?php endif; ?>
    </div>
</div>

<div class="container mb-5">
    <?php if ($successMessage): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i><?php echo $successMessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <?php if ($errorMessage): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-triangle-exclamation me-2"></i><?php echo $errorMessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <!-- Formulaires d'ajout -->
        <div class="col-lg-6">
            <!-- Ajouter un joueur -->
            <div class="card card-custom">
                <div class="card-header">
                    <i class="fa-solid fa-user-plus me-2"></i>Mettre un joueur sur le marché
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="add_player">
                        
                        <div class="mb-3">
                            <label class="form-label">Joueur</label>
                            <select name="player_number" class="form-select" required>
                                <option value="">-- Sélectionner un joueur --</option>
                                <?php
                                if ($MyPlayers) {
                                    while ($player = $MyPlayers->fetchArray()) {
                                        $pos = "";
                                        if ($player['PosC'] == "True") $pos .= "C";
                                        if ($player['PosLW'] == "True") $pos .= ($pos ? "/" : "") . "LW";
                                        if ($player['PosRW'] == "True") $pos .= ($pos ? "/" : "") . "RW";
                                        if ($player['PosD'] == "True") $pos .= ($pos ? "/" : "") . "D";
                                        
                                        echo "<option value='" . $player['Number'] . "'>" 
                                             . htmlspecialchars($player['Name']) 
                                             . " - " . $pos 
                                             . " - OV: " . $player['Overall'] 
                                             . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Commentaires (optionnel)</label>
                            <textarea name="comments" class="form-control" rows="3" 
                                     placeholder="Ex: Recherche choix de draft, jeune défenseur..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-trade w-100">
                            <i class="fa-solid fa-plus me-2"></i>Ajouter au marché
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Ajouter un gardien -->
            <div class="card card-custom">
                <div class="card-header">
                    <i class="fa-solid fa-hockey-puck me-2"></i>Mettre un gardien sur le marché
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="add_goalie">
                        
                        <div class="mb-3">
                            <label class="form-label">Gardien</label>
                            <select name="goalie_number" class="form-select" required>
                                <option value="">-- Sélectionner un gardien --</option>
                                <?php
                                if ($MyGoalies) {
                                    while ($goalie = $MyGoalies->fetchArray()) {
                                        echo "<option value='" . $goalie['Number'] . "'>" 
                                             . htmlspecialchars($goalie['Name']) 
                                             . " - G - OV: " . $goalie['Overall'] 
                                             . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Commentaires (optionnel)</label>
                            <textarea name="comments" class="form-control" rows="3" 
                                     placeholder="Ex: Recherche choix de draft, jeune défenseur..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-trade w-100">
                            <i class="fa-solid fa-plus me-2"></i>Ajouter au marché
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Ajouter un besoin -->
        <div class="col-lg-6">
            <div class="card card-custom">
                <div class="card-header">
                    <i class="fa-solid fa-magnifying-glass me-2"></i>Publier un besoin
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="add_need">
                        
                        <div class="mb-3">
                            <label class="form-label">Description du besoin</label>
                            <input type="text" name="need_description" class="form-control" 
                                  placeholder="Ex: Défenseur top-4 droitier" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Position recherchée</label>
                            <select name="need_position" class="form-select" required>
                                <option value="">-- Sélectionner --</option>
                                <option value="C">Centre</option>
                                <option value="LW">Ailier gauche</option>
                                <option value="RW">Ailier droit</option>
                                <option value="D">Défenseur</option>
                                <option value="G">Gardien</option>
                                <option value="Any">N'importe quelle position</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Priorité</label>
                            <select name="need_priority" class="form-select" required>
                                <option value="high">Haute</option>
                                <option value="medium" selected>Moyenne</option>
                                <option value="low">Basse</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Commentaires (optionnel)</label>
                            <textarea name="comments" class="form-control" rows="3" 
                                     placeholder="Ex: Prêt à offrir choix de 1ère ronde..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-trade w-100">
                            <i class="fa-solid fa-plus me-2"></i>Publier le besoin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mes annonces actuelles -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card card-custom">
                <div class="card-header">
                    <i class="fa-solid fa-list me-2"></i>Mes annonces actuelles
                </div>
                <div class="card-body">
                    <?php
                    if ($MyPosts) {
                        $hasPosts = false;
                        while ($post = $MyPosts->fetchArray()) {
                            $hasPosts = true;
                            ?>
                            <div class="post-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <?php if ($post['type'] == 'player'): ?>
                                            <h5 class="mb-2">
                                                <i class="fa-solid fa-user text-primary me-2"></i>
                                                <?php echo htmlspecialchars($post['player_name']); ?>
                                            </h5>
                                            <div class="text-muted small">
                                                <?php echo $post['player_position']; ?> - 
                                                OV: <?php echo $post['player_overall']; ?> - 
                                                <?php echo $post['player_age']; ?> ans - 
                                                <?php echo $post['player_contract']; ?> année(s) - 
                                                $<?php echo number_format($post['player_salary']); ?>
                                            </div>
                                        <?php else: ?>
                                            <h5 class="mb-2">
                                                <i class="fa-solid fa-magnifying-glass text-success me-2"></i>
                                                <?php echo htmlspecialchars($post['need_description']); ?>
                                            </h5>
                                            <div class="text-muted small">
                                                Position: <?php echo $post['need_position']; ?> - 
                                                Priorité: <?php echo ucfirst($post['need_priority']); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($post['comments']): ?>
                                            <div class="mt-2 small">
                                                <i class="fa-solid fa-comment"></i> <?php echo htmlspecialchars($post['comments']); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="mt-2 text-muted small">
                                            <i class="fa-regular fa-clock"></i> 
                                            Publié le <?php echo date('d/m/Y à H:i', strtotime($post['date_posted'])); ?>
                                        </div>
                                    </div>
                                    
                                    <form method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir retirer cette annonce?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i> Retirer
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                        
                        if (!$hasPosts) {
                            echo '<p class="text-center text-muted py-4">Aucune annonce active pour le moment</p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bouton pour voir le marché public -->
    <div class="text-center mt-4">
        <a href="TradeBoard.php" class="btn btn-lg btn-outline-primary btn-trade">
            <i class="fa-solid fa-arrow-up-right-from-square me-2"></i>Voir le Trade Market
        </a>
    </div>
</div>

<?php include "Footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

