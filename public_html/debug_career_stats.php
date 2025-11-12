<?php
// Script de diagnostic pour les statistiques de carrière
require_once "STHSSetting.php";

echo "<h2>🔍 Diagnostic des Statistiques de Carrière</h2>";

// 1. Vérifier les fichiers de base de données
echo "<h3>1. Vérification des fichiers de base de données</h3>";
echo "<p><strong>Base principale :</strong> " . ($DatabaseFile ?: 'Non définie') . "</p>";
echo "<p><strong>Base de carrière :</strong> " . ($CareerStatDatabaseFile ?: 'Non définie') . "</p>";

if (file_exists($DatabaseFile)) {
    echo "<p>✅ Base principale existe</p>";
} else {
    echo "<p>❌ Base principale n'existe pas</p>";
}

if (file_exists($CareerStatDatabaseFile)) {
    echo "<p>✅ Base de carrière existe</p>";
} else {
    echo "<p>❌ Base de carrière n'existe pas</p>";
}

// 2. Vérifier la structure de la base de carrière
if (file_exists($CareerStatDatabaseFile)) {
    echo "<h3>2. Structure de la base de carrière</h3>";
    try {
        $careerDB = new SQLite3($CareerStatDatabaseFile);
        
        // Vérifier les tables
        $tables = $careerDB->query("SELECT name FROM sqlite_master WHERE type='table'");
        echo "<p><strong>Tables disponibles :</strong></p><ul>";
        while ($table = $tables->fetchArray()) {
            echo "<li>" . $table['name'] . "</li>";
        }
        echo "</ul>";
        
        // Vérifier la table PlayerProStatCareer
        $careerTableCheck = $careerDB->querySingle("SELECT Count(name) AS CountName FROM sqlite_master WHERE type='table' AND name='PlayerProStatCareer'", true);
        echo "<p><strong>Table PlayerProStatCareer :</strong> " . ($careerTableCheck['CountName'] == 1 ? '✅ Existe' : '❌ N\'existe pas') . "</p>";
        
        // Vérifier la table PlayerProStatHistory
        $historyTableCheck = $careerDB->querySingle("SELECT Count(name) AS CountName FROM sqlite_master WHERE type='table' AND name='PlayerProStatHistory'", true);
        echo "<p><strong>Table PlayerProStatHistory :</strong> " . ($historyTableCheck['CountName'] == 1 ? '✅ Existe' : '❌ N\'existe pas') . "</p>";
        
        // Vérifier la table PlayerFarmStatHistory
        $farmHistoryTableCheck = $careerDB->querySingle("SELECT Count(name) AS CountName FROM sqlite_master WHERE type='table' AND name='PlayerFarmStatHistory'", true);
        echo "<p><strong>Table PlayerFarmStatHistory :</strong> " . ($farmHistoryTableCheck['CountName'] == 1 ? '✅ Existe' : '❌ N\'existe pas') . "</p>";
        
    } catch (Exception $e) {
        echo "<p>❌ Erreur lors de l'ouverture de la base de carrière : " . $e->getMessage() . "</p>";
    }
}

// 3. Tester avec un joueur spécifique
echo "<h3>3. Test avec un joueur</h3>";
if (file_exists($DatabaseFile)) {
    try {
        $db = new SQLite3($DatabaseFile);
        
        // Récupérer un joueur pour tester
        $testPlayer = $db->querySingle("SELECT Number, Name, UniqueID FROM PlayerInfo WHERE Number > 0 LIMIT 1", true);
        
        if ($testPlayer) {
            echo "<p><strong>Joueur de test :</strong> " . $testPlayer['Name'] . " (ID: " . $testPlayer['Number'] . ", UniqueID: " . $testPlayer['UniqueID'] . ")</p>";
            
            // Tester la base de carrière
            if (file_exists($CareerStatDatabaseFile)) {
                $careerDB = new SQLite3($CareerStatDatabaseFile);
                
                echo "<h4>Test de la base de carrière</h4>";
                
                // Test 1: Statistiques de carrière totales depuis PlayerProStatCareer
                $careerStat = $careerDB->querySingle("SELECT * FROM PlayerProStatCareer WHERE UniqueID = " . $testPlayer['UniqueID'], true);
                echo "<p><strong>Statistiques de carrière totales (PlayerProStatCareer) :</strong> " . (is_array($careerStat) ? "Trouvées" : "Aucune donnée") . "</p>";
                
                if (is_array($careerStat)) {
                    echo "<p>✅ Données trouvées !</p>";
                    echo "<pre>" . print_r($careerStat, true) . "</pre>";
                } else {
                    echo "<p>❌ Aucune donnée trouvée</p>";
                }
                
                // Test 2: Statistiques de carrière totales (playoffs) depuis PlayerProStatHistory
                $playoffTotals = $careerDB->querySingle("SELECT SUM(GP) as GP, SUM(G) as G, SUM(A) as A, SUM(P) as P, SUM(PlusMinus) as PlusMinus, SUM(Pim) as Pim, 
                         SUM(PPG) as PPG, SUM(Shots) as Shots, SUM(ShotsBlock) as ShotsBlock, SUM(Hits) as Hits, SUM(GiveAway) as GiveAway, SUM(TakeAway) as TakeAway,
                         MIN(Year) as FirstYear, MAX(Year) as LastYear 
                         FROM PlayerProStatHistory WHERE UniqueID = " . $testPlayer['UniqueID'] . " AND Playoff = 'True'", true);
                echo "<p><strong>Statistiques de carrière totales (playoffs) :</strong> " . (is_array($playoffTotals) ? "Trouvées" : "Aucune donnée") . "</p>";
                
                if (is_array($playoffTotals)) {
                    echo "<p>✅ Données trouvées !</p>";
                    echo "<pre>" . print_r($playoffTotals, true) . "</pre>";
                } else {
                    echo "<p>❌ Aucune donnée trouvée</p>";
                }
                
                // Test 3: Statistiques par saison (saison régulière)
                $seasonStats = $careerDB->query("SELECT * FROM PlayerProStatHistory WHERE UniqueID = " . $testPlayer['UniqueID'] . " AND Playoff = 'False' ORDER BY Season DESC LIMIT 3");
                $seasonCount = 0;
                while ($season = $seasonStats->fetchArray()) {
                    $seasonCount++;
                }
                echo "<p><strong>Statistiques par saison (saison régulière) :</strong> " . $seasonCount . " saisons trouvées</p>";
                
                // Test 4: Statistiques de playoffs par saison
                $playoffStats = $careerDB->query("SELECT * FROM PlayerProStatHistory WHERE UniqueID = " . $testPlayer['UniqueID'] . " AND Playoff = 'True' ORDER BY Season DESC LIMIT 3");
                $playoffCount = 0;
                while ($playoff = $playoffStats->fetchArray()) {
                    $playoffCount++;
                }
                echo "<p><strong>Statistiques de playoffs par saison :</strong> " . $playoffCount . " saisons trouvées</p>";
                
            } else {
                echo "<p>❌ Base de carrière non trouvée</p>";
            }
        } else {
            echo "<p>❌ Aucun joueur trouvé dans la base</p>";
        }
        
    } catch (Exception $e) {
        echo "<p>❌ Erreur lors de l'ouverture de la base principale : " . $e->getMessage() . "</p>";
    }
}

// 4. Vérifier la configuration
echo "<h3>4. Configuration</h3>";
echo "<p><strong>Langue :</strong> " . $lang . "</p>";
echo "<p><strong>ImagesCDNPath :</strong> " . $ImagesCDNPath . "</p>";

// 5. Test direct de la base de carrière
if (file_exists($CareerStatDatabaseFile)) {
    echo "<h3>5. Test direct de la base de carrière</h3>";
    try {
        $careerDB = new SQLite3($CareerStatDatabaseFile);
        
        // Vérifier s'il y a des données dans PlayerProStatCareer
        $careerCount = $careerDB->querySingle("SELECT COUNT(*) FROM PlayerProStatCareer");
        echo "<p><strong>Nombre d'entrées dans PlayerProStatCareer :</strong> " . $careerCount . "</p>";
        
        if ($careerCount > 0) {
            // Récupérer un exemple
            $example = $careerDB->querySingle("SELECT * FROM PlayerProStatCareer LIMIT 1", true);
            echo "<p><strong>Exemple de données PlayerProStatCareer :</strong></p>";
            echo "<pre>" . print_r($example, true) . "</pre>";
            
            // Vérifier les colonnes disponibles
            $columns = $careerDB->query("PRAGMA table_info(PlayerProStatCareer)");
            echo "<p><strong>Colonnes disponibles dans PlayerProStatCareer :</strong></p><ul>";
            while ($column = $columns->fetchArray()) {
                echo "<li>" . $column['name'] . " (" . $column['type'] . ")</li>";
            }
            echo "</ul>";
        }
        
        // Vérifier s'il y a des données dans PlayerProStatHistory
        $historyCount = $careerDB->querySingle("SELECT COUNT(*) FROM PlayerProStatHistory");
        echo "<p><strong>Nombre d'entrées dans PlayerProStatHistory :</strong> " . $historyCount . "</p>";
        
        if ($historyCount > 0) {
            // Récupérer un exemple
            $example = $careerDB->querySingle("SELECT * FROM PlayerProStatHistory LIMIT 1", true);
            echo "<p><strong>Exemple de données PlayerProStatHistory :</strong></p>";
            echo "<pre>" . print_r($example, true) . "</pre>";
            
            // Vérifier les colonnes disponibles
            $columns = $careerDB->query("PRAGMA table_info(PlayerProStatHistory)");
            echo "<p><strong>Colonnes disponibles dans PlayerProStatHistory :</strong></p><ul>";
            while ($column = $columns->fetchArray()) {
                echo "<li>" . $column['name'] . " (" . $column['type'] . ")</li>";
            }
            echo "</ul>";
        }
        
        // Vérifier s'il y a des données dans PlayerFarmStatHistory
        $farmHistoryCount = $careerDB->querySingle("SELECT COUNT(*) FROM PlayerFarmStatHistory");
        echo "<p><strong>Nombre d'entrées dans PlayerFarmStatHistory :</strong> " . $farmHistoryCount . "</p>";
        
        if ($farmHistoryCount > 0) {
            // Récupérer un exemple
            $example = $careerDB->querySingle("SELECT * FROM PlayerFarmStatHistory LIMIT 1", true);
            echo "<p><strong>Exemple de données PlayerFarmStatHistory :</strong></p>";
            echo "<pre>" . print_r($example, true) . "</pre>";
        }
        
    } catch (Exception $e) {
        echo "<p>❌ Erreur lors du test direct : " . $e->getMessage() . "</p>";
    }
}

echo "<h3>6. Recommandations</h3>";
echo "<ul>";
echo "<li>Vérifiez que la base LHSQC-STHSCareerStat.db contient des données dans PlayerProStatCareer</li>";
echo "<li>Assurez-vous que le fichier STHSSetting.ini est correctement configuré</li>";
echo "<li>Vérifiez que les tables PlayerProStatCareer, PlayerProStatHistory et PlayerFarmStatHistory existent</li>";
echo "<li>Testez avec un joueur qui a des statistiques de carrière</li>";
echo "<li>Vérifiez que les colonnes GP, G, A, P, PlusMinus, Pim, PPG, Shots, ShotsBlock, Hits, GiveAway, TakeAway, Year sont présentes dans PlayerProStatCareer</li>";
echo "</ul>";

echo "<p><a href='PlayerReport.php?Player=1'>Tester avec le joueur #1</a></p>";
?> 