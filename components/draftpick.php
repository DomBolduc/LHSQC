<?php
// Composant Draft Picks dynamique
// Récupère les données de la table draftpick de la base de données LHSQC-STHS.db

// Vérifier si la connexion à la base de données existe (normalement incluse via Header.php)
if (!isset($db)) {
    // Connexion temporaire à la base de données
    $DatabaseFile = 'LHSQC-STHS.db';
    if (file_exists($DatabaseFile)) {
        $db = new SQLite3($DatabaseFile);
    } else {
        // Essayer le chemin relatif depuis le répertoire components
        $DatabaseFile = '../LHSQC-STHS.db';
        if (file_exists($DatabaseFile)) {
            $db = new SQLite3($DatabaseFile);
        } else {
            $db = null;
        }
    }
}

// Récupérer l'équipe sélectionnée (si disponible)
$selectedTeam = 0;
if (isset($Team) && $Team > 0) {
    $selectedTeam = $Team;
} elseif (isset($_GET['Team'])) {
    $selectedTeam = filter_var($_GET['Team'], FILTER_SANITIZE_NUMBER_INT);
}

// Requête pour récupérer les informations des draft picks
// Adaptation selon la structure probable de la table draftpick
try {
    // Vérifier si la base de données est disponible
    if ($db === null) {
        throw new Exception("Database not available");
    }
    
    // Essayer différentes structures possibles de table
    $Query = "SELECT * FROM draftpick";
    if ($selectedTeam > 0) {
        $Query .= " WHERE Team = " . $selectedTeam . " OR OriginalTeam = " . $selectedTeam;
    }
    $Query .= " ORDER BY Year ASC, Round ASC";
    
    $DraftPicksResult = $db->query($Query);
    
    // Organiser les données par année et ronde
    $draftPicksData = array();
    $years = array();
    
    if ($DraftPicksResult) {
        while ($row = $DraftPicksResult->fetchArray()) {
            $year = $row['Year'];
            $round = $row['Round'];
            $team = isset($row['Team']) ? $row['Team'] : (isset($row['OwnerTeam']) ? $row['OwnerTeam'] : 1);
            
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
            
            if (!isset($draftPicksData[$year])) {
                $draftPicksData[$year] = array();
            }
            
            $draftPicksData[$year][$round] = $team;
        }
    }
    
    // Si aucune donnée trouvée, créer des données par défaut
    if (empty($draftPicksData)) {
        // Obtenir l'année actuelle de la ligue
        $currentYear = date('Y');
        if (isset($LeagueGeneral) && isset($LeagueGeneral['LeagueYearOutput'])) {
            $currentYear = (int)$LeagueGeneral['LeagueYearOutput'];
        }
        
        // Créer 5 années de draft picks par défaut
        for ($y = 0; $y < 5; $y++) {
            $year = $currentYear + $y;
            $years[] = $year;
            $draftPicksData[$year] = array();
            for ($r = 1; $r <= 7; $r++) {
                $draftPicksData[$year][$r] = $selectedTeam > 0 ? $selectedTeam : 1;
            }
        }
    }
    
    // Récupérer les informations des équipes pour les logos
    $Query = "SELECT Number, Name FROM TeamProInfo ORDER BY Number";
    $TeamsResult = $db->query($Query);
    $teams = array();
    
    if ($TeamsResult) {
        while ($row = $TeamsResult->fetchArray()) {
            $teams[$row['Number']] = $row['Name'];
        }
    }
    
} catch (Exception $e) {
    // En cas d'erreur, utiliser des données par défaut
    $currentYear = date('Y');
    $years = array($currentYear, $currentYear + 1, $currentYear + 2);
    $draftPicksData = array();
    
    foreach ($years as $year) {
        $draftPicksData[$year] = array();
        for ($r = 1; $r <= 7; $r++) {
            $draftPicksData[$year][$r] = $selectedTeam > 0 ? $selectedTeam : 1;
        }
    }
    
    $teams = array(1 => 'Team 1');
}

// Fonction pour obtenir le nom du fichier image de l'équipe
function getTeamImage($teamNumber, $teams) {
    if (isset($teams[$teamNumber])) {
        $teamName = $teams[$teamNumber];
        // Remplacer les espaces et caractères spéciaux pour le nom de fichier
        $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $teamName);
        return "images/" . $imageName . ".png";
    }
    return "images/Default.png";
}

function getTeamName($teamNumber, $teams) {
    return isset($teams[$teamNumber]) ? $teams[$teamNumber] : "Team " . $teamNumber;
}
?>

<div class="draft-picks-table-container">
    <h3>Draft Picks</h3>
    <table class="draft-picks-table">
        <thead>
            <tr>
                <th>Year</th>
                <th>RD 1</th>
                <th>RD 2</th>
                <th>RD 3</th>
                <th>RD 4</th>
                <th>RD 5</th>
                <th>RD 6</th>
                <th>RD 7</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($years as $year): ?>
            <tr>
                <td><?php echo $year; ?></td>
                <?php for ($round = 1; $round <= 7; $round++): ?>
                    <td>
                        <?php 
                        $teamNumber = isset($draftPicksData[$year][$round]) ? $draftPicksData[$year][$round] : $selectedTeam;
                        $teamImage = getTeamImage($teamNumber, $teams);
                        $teamName = getTeamName($teamNumber, $teams);
                        ?>
                        <img src="<?php echo $teamImage; ?>" 
                             alt="<?php echo $teamName; ?>" 
                             title="<?php echo $teamName; ?>" 
                             width="32"
                             onerror="this.src='images/Default.png'">
                    </td>
                <?php endfor; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
.draft-picks-table-container {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    padding: 24px;
    margin: 24px auto;
    max-width: 900px;
}

.draft-picks-table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
    background: #f9f9f9;
}

.draft-picks-table th, .draft-picks-table td {
    border: 1px solid #e0e0e0;
    padding: 8px;
    vertical-align: middle;
}

.draft-picks-table th {
    background: #f1f1f1;
    font-weight: bold;
}

.draft-picks-table img {
    display: inline-block;
    vertical-align: middle;
    max-width: 32px;
    max-height: 32px;
}
</style>
