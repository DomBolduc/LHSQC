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
            $team = isset($row['TeamNumber']) ? $row['TeamNumber'] : (isset($row['FromTeam']) ? $row['FromTeam'] : 1);

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

<br />
<h3 class="STHSTeamProspect_DraftPick"><?php echo $TeamLang['DraftPicks'];?></h3>
<table class="STHSPHPTeamStat_Table"><tr><th class="STHSW140"><?php echo $TeamLang['Year'];?></th>
<?php
// Créer l'en-tête basé sur le nombre de rondes
for($x = 1; $x <= 7; $x++){
    echo "<th class=\"STHSW140\">R" . $x . "</th>";
}
echo "</tr>\n";

// Afficher les données des draft picks
foreach ($years as $year) {
    echo "<tr><td>" . $year . "</td>";
    for ($round = 1; $round <= 7; $round++) {
        echo "<td>";
        $teamNumber = isset($draftPicksData[$year][$round]) ? $draftPicksData[$year][$round] : $selectedTeam;
        $teamName = getTeamName($teamNumber, $teams);
        
        // Afficher l'image de l'équipe comme dans ProTeam.php
        if ($teamNumber > 0) {
            echo "<img src=\"images/" . $teamNumber . ".png\" alt=\"\" class=\"STHSPHPDraftPickTeamImage\" /> ";
        } else {
            echo $teamName . " ";
        }
        echo "</td>";
    }
    echo "</tr>\n";
}
?>
</table>
