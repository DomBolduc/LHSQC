<?php
// Script de débogage pour vérifier la table SchedulePro

// Configuration de la base de données
$DatabaseFile = "LHSQC-STHS.db";

// Paramètre d'équipe (à modifier selon l'équipe que vous souhaitez vérifier)
$Team = 1; // Remplacez par l'ID de l'équipe que vous essayez d'afficher

echo "<h1>Débogage de la table SchedulePro</h1>";

try {
    if (file_exists($DatabaseFile) == false) {
        echo "<p>Fichier de base de données non trouvé: $DatabaseFile</p>";
    } else {
        echo "<p>Fichier de base de données trouvé: $DatabaseFile</p>";
        
        $db = new SQLite3($DatabaseFile);
        
        // Vérifier si la table SchedulePro existe
        $tableCheck = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='SchedulePro'");
        $tableExists = $tableCheck->fetchArray();
        
        if (!$tableExists) {
            echo "<p>La table SchedulePro n'existe pas dans la base de données.</p>";
        } else {
            echo "<p>La table SchedulePro existe dans la base de données.</p>";
            
            // Vérifier la structure de la table
            $columns = $db->query("PRAGMA table_info(SchedulePro)");
            echo "<h2>Structure de la table SchedulePro:</h2>";
            echo "<ul>";
            while ($column = $columns->fetchArray(SQLITE3_ASSOC)) {
                echo "<li>" . $column['name'] . " (" . $column['type'] . ")</li>";
            }
            echo "</ul>";
            
            // Compter le nombre total d'enregistrements
            $countQuery = $db->query("SELECT COUNT(*) as count FROM SchedulePro");
            $count = $countQuery->fetchArray();
            echo "<p>Nombre total d'enregistrements dans SchedulePro: " . $count['count'] . "</p>";
            
            // Vérifier les matchs joués pour l'équipe spécifiée
            $playedQuery = $db->query("SELECT COUNT(*) as count FROM SchedulePro WHERE (HomeTeam = $Team OR VisitorTeam = $Team) AND Play = 1");
            $playedCount = $playedQuery->fetchArray();
            echo "<p>Matchs joués pour l'équipe $Team: " . $playedCount['count'] . "</p>";
            
            // Vérifier les matchs à venir pour l'équipe spécifiée
            $upcomingQuery = $db->query("SELECT COUNT(*) as count FROM SchedulePro WHERE (HomeTeam = $Team OR VisitorTeam = $Team) AND Play = 0");
            $upcomingCount = $upcomingQuery->fetchArray();
            echo "<p>Matchs à venir pour l'équipe $Team: " . $upcomingCount['count'] . "</p>";
            
            // Afficher les 3 derniers matchs joués
            echo "<h2>3 derniers matchs joués:</h2>";
            $lastGamesQuery = $db->query("SELECT * FROM SchedulePro WHERE (HomeTeam = $Team OR VisitorTeam = $Team) AND Play = 1 ORDER BY GameNumber DESC LIMIT 3");
            
            if ($lastGamesQuery) {
                echo "<table border='1'>";
                echo "<tr><th>Game #</th><th>Home Team</th><th>Home Score</th><th>Visitor Team</th><th>Visitor Score</th></tr>";
                
                $hasRows = false;
                while ($game = $lastGamesQuery->fetchArray(SQLITE3_ASSOC)) {
                    $hasRows = true;
                    echo "<tr>";
                    echo "<td>" . $game['GameNumber'] . "</td>";
                    echo "<td>" . $game['HomeTeam'] . "</td>";
                    echo "<td>" . $game['HomeScore'] . "</td>";
                    echo "<td>" . $game['VisitorTeam'] . "</td>";
                    echo "<td>" . $game['VisitorScore'] . "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
                
                if (!$hasRows) {
                    echo "<p>Aucun match joué trouvé pour l'équipe $Team.</p>";
                }
            } else {
                echo "<p>Erreur lors de l'exécution de la requête pour les matchs joués.</p>";
            }
            
            // Afficher les 4 prochains matchs
            echo "<h2>4 prochains matchs:</h2>";
            $nextGamesQuery = $db->query("SELECT * FROM SchedulePro WHERE (HomeTeam = $Team OR VisitorTeam = $Team) AND Play = 0 ORDER BY GameNumber ASC LIMIT 4");
            
            if ($nextGamesQuery) {
                echo "<table border='1'>";
                echo "<tr><th>Game #</th><th>Home Team</th><th>Visitor Team</th></tr>";
                
                $hasRows = false;
                while ($game = $nextGamesQuery->fetchArray(SQLITE3_ASSOC)) {
                    $hasRows = true;
                    echo "<tr>";
                    echo "<td>" . $game['GameNumber'] . "</td>";
                    echo "<td>" . $game['HomeTeam'] . "</td>";
                    echo "<td>" . $game['VisitorTeam'] . "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
                
                if (!$hasRows) {
                    echo "<p>Aucun match à venir trouvé pour l'équipe $Team.</p>";
                }
            } else {
                echo "<p>Erreur lors de l'exécution de la requête pour les matchs à venir.</p>";
            }
        }
    }
} catch (Exception $e) {
    echo "<p>Erreur: " . $e->getMessage() . "</p>";
}
?>
