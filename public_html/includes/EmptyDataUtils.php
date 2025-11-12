<?php
/**
 * Utilitaires pour gérer l'affichage de données vides
 * Améliore l'expérience utilisateur pendant la saison morte
 */

/**
 * Génère une requête SQL avec LEFT JOIN pour obtenir toutes les équipes
 * même si elles n'ont pas de statistiques
 */
function getTeamsWithStatsQuery($TypeText, $TypeTextTeam, $conditions = "", $orderBy = "", $limit = "") {
    $teamTable = ($TypeTextTeam === "Farm") ? "TeamFarmInfo" : "TeamProInfo";
    $statTable = ($TypeTextTeam === "Farm") ? "TeamFarmStat" : "TeamProStat";
    
    $query = "SELECT 
        ti.Number, ti.Name, ti.TeamThemeID, ti.Conference, ti.Division, ti.DivisionNumber,
        COALESCE(ts.GP, 0) as GP,
        COALESCE(ts.W, 0) as W,
        COALESCE(ts.L, 0) as L,
        COALESCE(ts.T, 0) as T,
        COALESCE(ts.OTW, 0) as OTW,
        COALESCE(ts.OTL, 0) as OTL,
        COALESCE(ts.SOW, 0) as SOW,
        COALESCE(ts.SOL, 0) as SOL,
        COALESCE(ts.Points, 0) as Points,
        COALESCE(ts.GF, 0) as GF,
        COALESCE(ts.GA, 0) as GA,
        COALESCE(ts.Pim, 0) as Pim,
        COALESCE(ts.Hits, 0) as Hits,
        COALESCE(ts.PPGoal, 0) as PPGoal,
        COALESCE(ts.PPAttemp, 0) as PPAttemp,
        COALESCE(ts.PKGoal, 0) as PKGoal,
        COALESCE(ts.PKAttemp, 0) as PKAttemp,
        COALESCE(ts.ShotsFor, 0) as ShotsFor,
        COALESCE(ts.ShotsAga, 0) as ShotsAga
    FROM $teamTable ti
    LEFT JOIN $statTable ts ON ti.Number = ts.Number";
    
    if (!empty($conditions)) {
        $query .= " WHERE " . $conditions;
    }
    
    if (!empty($orderBy)) {
        $query .= " ORDER BY " . $orderBy;
    } else {
        // Ordre par défaut : Points DESC, différence de buts DESC, nom ASC
        $query .= " ORDER BY COALESCE(ts.Points, 0) DESC, COALESCE(ts.GF, 0) - COALESCE(ts.GA, 0) DESC, ti.Name ASC";
    }
    
    if (!empty($limit)) {
        $query .= " LIMIT " . $limit;
    }
    
    return $query;
}

/**
 * Vérifie si une requête retourne des données
 */
function hasQueryResults($db, $query) {
    $result = $db->query($query);
    if ($result) {
        $row = $result->fetchArray();
        return $row !== false;
    }
    return false;
}

/**
 * Exécute une requête avec fallback vers LEFT JOIN si pas de résultats
 */
function executeQueryWithFallback($db, $originalQuery, $fallbackQuery) {
    $result = $db->query($originalQuery);
    
    // Vérifier si on a des résultats
    if ($result) {
        $testRow = $result->fetchArray();
        if ($testRow) {
            // On a des données, réexécuter la requête originale
            return $db->query($originalQuery);
        }
    }
    
    // Pas de données, utiliser la requête de fallback
    return $db->query($fallbackQuery);
}

/**
 * Génère des statistiques par défaut pour une équipe
 */
function getDefaultTeamStats($teamNumber, $teamName, $teamThemeID = null, $conference = "", $division = "") {
    return [
        'Number' => $teamNumber,
        'Name' => $teamName,
        'TeamThemeID' => $teamThemeID,
        'Conference' => $conference,
        'Division' => $division,
        'GP' => 0,
        'W' => 0,
        'L' => 0,
        'T' => 0,
        'OTW' => 0,
        'OTL' => 0,
        'SOW' => 0,
        'SOL' => 0,
        'Points' => 0,
        'GF' => 0,
        'GA' => 0,
        'Pim' => 0,
        'Hits' => 0,
        'PPGoal' => 0,
        'PPAttemp' => 0,
        'PKGoal' => 0,
        'PKAttemp' => 0,
        'ShotsFor' => 0,
        'ShotsAga' => 0
    ];
}

/**
 * Affiche un message informatif quand il n'y a pas de données de saison
 */
function displayOffSeasonMessage($context = "standings") {
    $messages = [
        'standings' => 'Aucune donnée de classement disponible pour le moment. Les équipes seront affichées avec des statistiques à zéro en attendant le début de la saison.',
        'schedule' => 'Aucun match programmé pour le moment. Le calendrier sera mis à jour dès que la saison commencera.',
        'stats' => 'Aucune statistique disponible pour le moment. Les données seront mises à jour dès le début de la saison.',
        'general' => 'Aucune donnée disponible pour le moment. Les informations seront mises à jour dès que la saison commencera.'
    ];
    
    $message = isset($messages[$context]) ? $messages[$context] : $messages['general'];
    
    echo '<div class="alert alert-info off-season-notice">';
    echo '<i class="fas fa-info-circle"></i> ';
    echo '<strong>Saison morte :</strong> ' . $message;
    echo '</div>';
}

/**
 * Ajoute du CSS pour les messages de saison morte
 */
function addOffSeasonCSS() {
    echo '<style>
    .off-season-notice {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        border: 1px solid #2196f3;
        border-radius: 8px;
        padding: 1rem;
        margin: 1rem 0;
        color: #1565c0;
        font-size: 0.9rem;
    }
    
    .off-season-notice i {
        color: #2196f3;
        margin-right: 0.5rem;
    }
    
    .off-season-notice strong {
        color: #0d47a1;
    }
    
    .empty-stats-row {
        opacity: 0.7;
        font-style: italic;
    }
    
    .empty-stats-row:hover {
        opacity: 1;
        background-color: rgba(0, 123, 255, 0.1);
    }
    
    .position-indicator {
        font-weight: bold;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 0.85rem;
    }
    
    .position-regular {
        background-color: #f8f9fa;
        color: #495057;
    }
    
    .position-playoff {
        background-color: #d4edda;
        color: #155724;
    }
    
    .position-wildcard {
        background-color: #fff3cd;
        color: #856404;
    }
    
    .position-lottery {
        background-color: #f8d7da;
        color: #721c24;
    }
    </style>';
}

/**
 * Détermine la classe CSS pour la position dans le classement
 */
function getPositionClass($position, $totalTeams = 30) {
    if ($position <= 8) {
        return 'position-playoff';
    } elseif ($position <= 16) {
        return 'position-wildcard';
    } elseif ($position >= $totalTeams - 5) {
        return 'position-lottery';
    } else {
        return 'position-regular';
    }
}

/**
 * Formate les statistiques pour l'affichage (gère les valeurs nulles)
 */
function formatStat($value, $default = 0, $format = 'number') {
    if ($value === null || $value === '') {
        $value = $default;
    }
    
    switch ($format) {
        case 'percentage':
            return number_format($value * 100, 1) . '%';
        case 'decimal':
            return number_format($value, 2);
        case 'number':
        default:
            return number_format($value);
    }
}

?>
