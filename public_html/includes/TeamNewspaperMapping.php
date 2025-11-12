<?php
/**
 * Correspondance entre les équipes et les images Newspaper
 * Format: 'Nom de l'équipe' => numéro_image_newspaper
 * 
 * Les images sont stockées dans images/Newspaper/ avec le format {numero}NP.png
 * Exemple: 1NP.png, 2NP.png, etc.
 */

$teamNewspaperMapping = array(
    // ========================================
    // CORRESPONDANCE ÉQUIPES -> IMAGES NEWSPAPER
    // ========================================
    // Basé sur les données de la base de données et les Theme ID

    'Avalanche' => 25,
    'Blackhawks' => 18,
    'Blue Jackets' => 19,
    'Blues' => 16,
    'Bruins' => 11,
    'Canadiens' => 13,
    'Canucks' => 24,
    'Capitals' => 9,
    'Devils' => 4,
    'Ducks' => 29,
    'Flames' => 23,
    'Flyers' => 5,
    'Golden Knights' => 32,
    'Hurricanes' => 6,
    'Islanders' => 2,
    'Jets' => 8,
    'Kings' => 26,
    'Kraken' => 33,
    'Lightning' => 7,
    'Maple Leafs' => 15,
    'Oilers' => 22,
    'Panthers' => 10,
    'Penguins' => 1,
    'Predators' => 20,
    'Rangers' => 3,
    'Red Wings' => 17,
    'Sabres' => 14,
    'Senators' => 12,
    'Sharks' => 30,
    'Stars' => 28,
    'Utah Hockey Club' => 27,
    'Wild' => 21
);

/**
 * Fonction pour obtenir l'image Newspaper d'une équipe
 * Priorités:
 * 1. Mapping par nom d'équipe
 * 2. TeamThemeID si disponible
 * 3. Numéro d'équipe si disponible
 * 4. Image par défaut LHSQC
 */
function getTeamNewspaperImage($teamNumber, $teamName, $teamThemeID) {
    global $teamNewspaperMapping;
    
    // Priorité 1: Utiliser le mapping par nom d'équipe si disponible
    if (!empty($teamName) && isset($teamNewspaperMapping[$teamName])) {
        $newspaperNum = $teamNewspaperMapping[$teamName];
        $imagePath = "images/Newspaper/{$newspaperNum}NP.png";
        if (file_exists($imagePath)) {
            return $imagePath;
        }
    }
    
    // Priorité 2: Utiliser le TeamThemeID si disponible
    if ($teamThemeID > 0) {
        $imagePath = "images/Newspaper/{$teamThemeID}NP.png";
        if (file_exists($imagePath)) {
            return $imagePath;
        }
    }
    
    // Priorité 3: Utiliser le numéro d'équipe si disponible
    if ($teamNumber > 0) {
        $imagePath = "images/Newspaper/{$teamNumber}NP.png";
        if (file_exists($imagePath)) {
            return $imagePath;
        }
    }
    
    // Fallback: Image par défaut LHSQC
    return "images/LHSQC_NEWS.png";
}

/**
 * Fonction pour obtenir la liste de toutes les équipes avec leurs images
 * Utile pour le debug et la vérification
 */
function getAllTeamNewspaperMappings() {
    global $teamNewspaperMapping;
    return $teamNewspaperMapping;
}

/**
 * Fonction pour vérifier si une image Newspaper existe
 */
function newspaperImageExists($imageNumber) {
    $imagePath = "images/Newspaper/{$imageNumber}NP.png";
    return file_exists($imagePath);
}

/**
 * Fonction pour lister toutes les images Newspaper disponibles
 */
function getAvailableNewspaperImages() {
    $images = [];
    $directory = "images/Newspaper/";
    
    if (is_dir($directory)) {
        $files = scandir($directory);
        foreach ($files as $file) {
            if (preg_match('/^(\d+)NP\.png$/', $file, $matches)) {
                $images[] = (int)$matches[1];
            }
        }
        sort($images);
    }
    
    return $images;
}

/**
 * Fonction de debug pour afficher les correspondances
 */
function debugTeamNewspaperMappings() {
    global $teamNewspaperMapping;
    
    echo "<h3>Correspondances Équipes -> Images Newspaper</h3>";
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr><th>Équipe</th><th>Numéro Image</th><th>Chemin</th><th>Existe?</th></tr>";
    
    foreach ($teamNewspaperMapping as $teamName => $imageNum) {
        $imagePath = "images/Newspaper/{$imageNum}NP.png";
        $exists = file_exists($imagePath) ? "✅" : "❌";
        echo "<tr>";
        echo "<td>{$teamName}</td>";
        echo "<td>{$imageNum}</td>";
        echo "<td>{$imagePath}</td>";
        echo "<td>{$exists}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    echo "<h3>Images Newspaper Disponibles</h3>";
    $availableImages = getAvailableNewspaperImages();
    echo "<p>Images trouvées: " . implode(", ", $availableImages) . "</p>";
}

?>
