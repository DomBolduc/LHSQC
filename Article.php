<?php include "Header.php";?>

<?php
// Définir les variables de base de données si elles ne sont pas définies
if (!isset($DatabaseFile)) {
    $DatabaseFile = "LHSQC-STHS.db";
}
if (!isset($NewsDatabaseFile)) {
    $NewsDatabaseFile = "LHSQC-STHSNews.db";
}

// Récupérer l'ID de l'article depuis l'URL
$articleId = $_GET['id'] ?? null;
$article = null;
$error = null;

if ($articleId) {
    try {
        if (file_exists($NewsDatabaseFile)) {
            $db = new SQLite3($NewsDatabaseFile);
            
            // Récupérer l'article depuis la base de données
            // D'abord, essayons une requête simple sans JOIN
            $query = "SELECT * FROM LeagueNews WHERE Number = " . intval($articleId) . " AND Remove = 'False'";
            $article = $db->querySingle($query, true);
            
            if (!$article) {
                // Si pas trouvé, essayons sans le filtre Remove
                $query = "SELECT * FROM LeagueNews WHERE Number = " . intval($articleId);
                $article = $db->querySingle($query, true);
                
                if ($article) {
                    // Article trouvé mais peut-être marqué comme supprimé
                    if ($article['Remove'] == 'True') {
                        $error = "Cet article a été supprimé.";
                    }
                } else {
                    $error = "Article non trouvé.";
                }
            } else {
                // Article trouvé, maintenant récupérer les infos de l'équipe si possible
                if (isset($article['TeamNumber']) && $article['TeamNumber'] > 0 && file_exists($DatabaseFile)) {
                    try {
                        // Attacher la base de données principale pour accéder à TeamProInfo
                        $db->exec("ATTACH DATABASE '" . realpath($DatabaseFile) . "' AS MainDB");
                        $teamQuery = "SELECT Name FROM MainDB.TeamProInfo WHERE Number = " . intval($article['TeamNumber']);
                        $teamResult = $db->querySingle($teamQuery);
                        if ($teamResult) {
                            $article['TeamName'] = $teamResult;
                        }
                    } catch (Exception $e) {
                        // Ignorer l'erreur de récupération d'équipe
                    }
                }
            }
        } else {
            $error = "Base de données des articles non trouvée.";
        }
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération de l'article : " . $e->getMessage();
    }
} else {
    $error = "Aucun article spécifié.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article ? htmlspecialchars($article['Title']) : 'Article'; ?> - LHSQC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        
        .article-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .article-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .article-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0 0 20px 0;
            line-height: 1.2;
        }
        
        .article-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .article-date {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .article-team {
            background: rgba(255,255,255,0.2);
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .article-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            margin: 0;
        }
        
        .article-content {
            padding: 40px 30px;
            font-size: 1.1rem;
            line-height: 1.7;
            color: #444;
        }
        
        .article-content p {
            margin-bottom: 1.5rem;
        }
        
        .error-message {
            text-align: center;
            color: #dc3545;
            font-size: 1.2rem;
            margin-top: 100px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        @media (max-width: 768px) {
            .article-container {
                margin: 20px;
                border-radius: 8px;
            }
            
            .article-header {
                padding: 30px 20px;
            }
            
            .article-title {
                font-size: 2rem;
            }
            
            .article-content {
                padding: 30px 20px;
            }
            
            .article-meta {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<?php include "Menu.php";?>

<?php if ($error): ?>
    <div class="container mt-5">
        <div class="error-message">
            <h3>Erreur</h3>
            <p><?php echo htmlspecialchars($error); ?></p>
            <a href="index.php" class="btn btn-primary mt-3">
                Retour à l'accueil
            </a>
        </div>
    </div>
<?php elseif ($article): ?>
    <div class="article-container">
        <!-- En-tête de l'article -->
        <div class="article-header">
            <h1 class="article-title"><?php echo htmlspecialchars($article['Title']); ?></h1>
            <div class="article-meta">
                <div class="article-date">
                    <i class="fas fa-calendar"></i>
                    <?php echo htmlspecialchars($article['Time']); ?>
                </div>
                <?php if (isset($article['TeamName']) && $article['TeamName']): ?>
                    <div class="article-team">
                        <?php echo htmlspecialchars($article['TeamName']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php 
        // Extraire l'image du message si elle existe
        $message = $article['Message'];
        $imgSrc = null;
        if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $message, $matches)) {
            $imgSrc = $matches[1];
            // Retirer la première balise <img> du message pour l'afficher séparément
            $message = preg_replace('/<img[^>]+src=["\']'.preg_quote($imgSrc, '/').'["\'][^>]*>/i', '', $message, 1);
        }
        ?>
        
        <?php if ($imgSrc): ?>
            <img src="<?php echo htmlspecialchars($imgSrc); ?>" 
                 alt="<?php echo htmlspecialchars($article['Title']); ?>" 
                 class="article-image">
        <?php endif; ?>
        
        <!-- Contenu de l'article -->
        <div class="article-content">
            <?php echo $message; ?>
        </div>
    </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>

</body>
</html>

<?php include "Footer.php";?> 