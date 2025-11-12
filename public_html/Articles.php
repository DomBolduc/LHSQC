<?php include "Header.php";?>

<?php
// Paramètres de pagination
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$perPage = 6;
$offset = ($page - 1) * $perPage;

// Paramètres de recherche
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$teamFilter = isset($_GET['team']) ? intval($_GET['team']) : '';

$articles = array();
$totalArticles = 0;
$error = null;

try {
    $NewsDatabaseFile = "LHSQC-STHSNews.db";
    
    if (file_exists($NewsDatabaseFile)) {
        $db = new SQLite3($NewsDatabaseFile);
        
        // Construire la requête de base
        $baseQuery = "SELECT LeagueNews.*, TeamProInfo.TeamThemeID, TeamProInfo.Name as TeamName 
                     FROM LeagueNews 
                     LEFT JOIN TeamProInfo ON LeagueNews.TeamNumber = TeamProInfo.Number 
                     WHERE LeagueNews.Remove = 'False'";
        
        // Ajouter les filtres
        $whereConditions = array();
        $params = array();
        
        if (!empty($search)) {
            $whereConditions[] = "(LeagueNews.Title LIKE :search OR LeagueNews.Message LIKE :search)";
            $params[':search'] = '%' . $search . '%';
        }
        
        if (!empty($teamFilter)) {
            $whereConditions[] = "LeagueNews.TeamNumber = :team";
            $params[':team'] = $teamFilter;
        }
        
        if (!empty($whereConditions)) {
            $baseQuery .= " AND " . implode(" AND ", $whereConditions);
        }
        
        $baseQuery .= " ORDER BY LeagueNews.Time DESC";
        
        // Compter le total
        $countQuery = "SELECT COUNT(*) as total FROM (" . $baseQuery . ")";
        $stmt = $db->prepare($countQuery);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $totalResult = $stmt->execute()->fetchArray();
        $totalArticles = $totalResult['total'];
        
        // Récupérer les articles pour la page courante
        $query = $baseQuery . " LIMIT " . $perPage . " OFFSET " . $offset;
        $stmt = $db->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $result = $stmt->execute();
        
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $articles[] = $row;
        }
        
        // Récupérer la liste des équipes pour le filtre
        $teamsQuery = "SELECT DISTINCT TeamProInfo.Number, TeamProInfo.Name 
                      FROM LeagueNews 
                      LEFT JOIN TeamProInfo ON LeagueNews.TeamNumber = TeamProInfo.Number 
                      WHERE LeagueNews.Remove = 'False' AND TeamProInfo.Name IS NOT NULL 
                      ORDER BY TeamProInfo.Name";
        $teamsResult = $db->query($teamsQuery);
        $teams = array();
        while ($team = $teamsResult->fetchArray(SQLITE3_ASSOC)) {
            $teams[] = $team;
        }
        
    } else {
        $error = "Base de données des articles non trouvée.";
    }
} catch (Exception $e) {
    $error = "Erreur lors de la récupération des articles : " . $e->getMessage();
}

$totalPages = ceil($totalArticles / $perPage);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - LHSQC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .articles-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .article-card {
            background-color: rgba(0, 0, 0, 0.9);
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s;
            border: 1px solid #007bff;
        }
        
        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.3);
        }
        
        .article-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        
        .article-meta {
            font-size: 0.9rem;
            color: #ccc;
            margin-bottom: 15px;
        }
        
        .article-preview {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .article-image {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .read-more-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .read-more-btn:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
        }
        
        .filters-section {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .pagination-container {
            text-align: center;
            margin-top: 30px;
        }
        
        .page-link {
            background-color: rgba(0, 0, 0, 0.9);
            border-color: #007bff;
            color: #007bff;
        }
        
        .page-link:hover {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        
        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 100vh;">

<?php include "Menu.php";?>

<div class="articles-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 style="color: white; margin: 0;">Articles</h1>
        <a href="index.php" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Retour à l'accueil
        </a>
    </div>
    
    <?php if ($error): ?>
        <div class="alert alert-danger">
            <h3>Erreur</h3>
            <p><?php echo htmlspecialchars($error); ?></p>
        </div>
    <?php else: ?>
        <!-- Filtres -->
        <div class="filters-section">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label" style="color: white;">Rechercher</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="<?php echo htmlspecialchars($search); ?>" 
                           placeholder="Rechercher dans les articles...">
                </div>
                <div class="col-md-4">
                    <label for="team" class="form-label" style="color: white;">Équipe</label>
                    <select class="form-select" id="team" name="team">
                        <option value="">Toutes les équipes</option>
                        <?php foreach ($teams as $team): ?>
                            <option value="<?php echo $team['Number']; ?>" 
                                    <?php echo $teamFilter == $team['Number'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($team['Name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Filtrer</button>
                    <a href="Articles.php" class="btn btn-secondary">Réinitialiser</a>
                </div>
            </form>
        </div>
        
        <!-- Résultats -->
        <div class="mb-3">
            <p style="color: white;">
                <?php echo $totalArticles; ?> article(s) trouvé(s)
                <?php if (!empty($search) || !empty($teamFilter)): ?>
                    avec les filtres appliqués
                <?php endif; ?>
            </p>
        </div>
        
        <!-- Liste des articles -->
        <?php if (empty($articles)): ?>
            <div class="alert alert-info">
                <h3>Aucun article trouvé</h3>
                <p>Aucun article ne correspond à vos critères de recherche.</p>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($articles as $article): ?>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="article-card">
                            <h3 class="article-title"><?php echo htmlspecialchars($article['Title']); ?></h3>
                            
                            <div class="article-meta">
                                <strong>Date :</strong> <?php echo htmlspecialchars($article['Time']); ?>
                                <?php if (!empty($article['TeamName'])): ?>
                                    <br><strong>Équipe :</strong> <?php echo htmlspecialchars($article['TeamName']); ?>
                                <?php endif; ?>
                            </div>
                            
                            <?php 
                            // Extraire l'image du message si elle existe
                            $message = $article['Message'];
                            $imgSrc = null;
                            if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $message, $matches)) {
                                $imgSrc = $matches[1];
                            }
                            
                            // Tronquer le message pour l'aperçu
                            $previewMessage = strip_tags($message);
                            if (strlen($previewMessage) > 150) {
                                $previewMessage = substr($previewMessage, 0, 150) . '...';
                            }
                            ?>
                            
                            <?php if ($imgSrc): ?>
                                <img src="<?php echo htmlspecialchars($imgSrc); ?>" 
                                     alt="<?php echo htmlspecialchars($article['Title']); ?>" 
                                     class="article-image">
                            <?php endif; ?>
                            
                            <div class="article-preview">
                                <?php echo htmlspecialchars($previewMessage); ?>
                            </div>
                            
                            <a href="Article.php?id=<?php echo $article['Number']; ?>" class="read-more-btn">
                                Lire l'article complet
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <div class="pagination-container">
                    <nav>
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>&team=<?php echo $teamFilter; ?>">
                                        Précédent
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <?php for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++): ?>
                                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>&team=<?php echo $teamFilter; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                            
                            <?php if ($page < $totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>&team=<?php echo $teamFilter; ?>">
                                        Suivant
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>

</body>
</html>

<?php include "Footer.php";?> 