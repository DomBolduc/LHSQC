<?php
// Composant Power Ranking - Affiche les 3 meilleures équipes
// Nécessite que $DatabaseFile soit défini dans le fichier parent

$PowerRankingTeams = array();

if (file_exists($DatabaseFile)) {
    try {
        $db = new SQLite3($DatabaseFile);
        
        // Requête pour récupérer les 3 meilleures équipes du power ranking
        $Query = "SELECT PowerRankingPro.*, TeamProInfo.Name, TeamProInfo.City, TeamProInfo.TeamThemeID 
                  FROM PowerRankingPro 
                  LEFT JOIN TeamProInfo ON PowerRankingPro.Teams = TeamProInfo.Number 
                  ORDER BY PowerRankingPro.TodayRanking 
                  LIMIT 3";
        
        $PowerRanking = $db->query($Query);
        
        if ($PowerRanking) {
            while ($row = $PowerRanking->fetchArray(SQLITE3_ASSOC)) {
                $PowerRankingTeams[] = $row;
            }
        }
        
    } catch (Exception $e) {
        // Erreur silencieuse - le composant ne s'affichera pas
    }
}

// Afficher le composant seulement s'il y a des données
if (!empty($PowerRankingTeams)) {
?>
<style>
.power-ranking-wrapper {
    width: 100%;
    max-width: 525px;
    margin: 2rem auto 0 auto;
    box-sizing: border-box;
    position: relative;
    z-index: 5;
    clear: both;
}

.power-ranking-container {
    background: #ffffff;
    border-radius: 8px;
    padding: 15px;
    min-height: 400px;
    height: auto;
    display: flex;
    flex-direction: column;
    width: 100%;
    box-sizing: border-box;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    position: relative;
    z-index: 5;
}

.power-ranking-title {
    text-align: center;
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 15px;
    color: #000000;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
}

.power-ranking-teams {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex: 1;
    gap: 10px;
}

.power-ranking-team {
    background: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    padding: 12px;
    text-align: center;
    flex: 1;
    height: 250px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.team-rank {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 8px;
    color: #000000;
}

.team-rank.gold { color: #000000; }
.team-rank.silver { color: #000000; }
.team-rank.bronze { color: #000000; }

.team-logo {
    width: 50px;
    height: 50px;
    margin: 0 auto 8px;
    border-radius: 50%;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
}

.team-name {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 4px;
    color: #000000;
}

.team-city {
    font-size: 0.85rem;
    color: #000000;
    margin-bottom: 8px;
}

.team-stats {
    display: flex;
    justify-content: space-around;
    font-size: 0.8rem;
    margin-top: 8px;
}

.team-stat {
    text-align: center;
}

.team-stat-value {
    font-weight: bold;
    font-size: 1rem;
    color: #000000;
}

.team-stat-label {
    color: #000000;
    font-size: 0.7rem;
    text-transform: uppercase;
}

.ranking-change {
    font-size: 0.75rem;
    margin-top: 4px;
    padding: 2px 6px;
    border-radius: 4px;
    display: inline-block;
}

.ranking-change.up {
    background: #d4edda;
    color: #000000;
}

.ranking-change.down {
    background: #f8d7da;
    color: #000000;
}

.ranking-change.same {
    background: #e2e3e5;
    color: #000000;
}

/* Responsive Design */
@media (max-width: 991px) {
    .power-ranking-wrapper {
        margin: 2rem 0 0 0;
        max-width: 100%;
        padding: 0 0.5rem;
        clear: both;
    }

    .power-ranking-container {
        min-height: auto;
        padding: 12px;
        margin-top: 1rem;
    }

    .power-ranking-teams {
        flex-direction: column;
        gap: 10px;
    }

    .power-ranking-team {
        width: 100%;
        height: auto;
        min-height: 100px;
        margin: 0;
    }

    .power-ranking-title {
        font-size: 1.1rem;
        margin-bottom: 12px;
    }
}

@media (max-width: 480px) {
    .power-ranking-wrapper {
        margin: 1.5rem 0 0 0;
        padding: 0 0.25rem;
        clear: both;
    }

    .power-ranking-container {
        padding: 10px;
        border-radius: 6px;
        margin-top: 1rem;
    }

    .power-ranking-team {
        min-height: 80px;
        padding: 8px;
    }

    .power-ranking-title {
        font-size: 1rem;
        margin-bottom: 10px;
    }
}
</style>

<div class="power-ranking-wrapper">
    <div class="power-ranking-container">
        <div class="power-ranking-title">
            Power Ranking - Top 3
        </div>

        <div class="power-ranking-teams">
        <?php 
        $rankClasses = ['gold', 'silver', 'bronze'];
        foreach ($PowerRankingTeams as $index => $team): 
            $rankClass = $rankClasses[$index];
            $rankChange = $team['TodayRanking'] - $team['LastRanking'];
        ?>
        <div class="power-ranking-team">
            <div class="team-rank <?php echo $rankClass; ?>">
                #<?php echo $team['TodayRanking']; ?>
            </div>
            
            <div class="team-logo">
                <?php if ($team['TeamThemeID'] > 0): ?>
                    <img src="<?php echo $ImagesCDNPath; ?>/images/<?php echo $team['TeamThemeID']; ?>.png" 
                         alt="<?php echo htmlspecialchars($team['Name']); ?>" 
                         style="width: 40px; height: 40px; object-fit: contain;">
                <?php else: ?>
                    <span style="font-size: 1.2rem;">🏒</span>
                <?php endif; ?>
            </div>
            
            <div class="team-name"><?php echo htmlspecialchars($team['Name']); ?></div>
            <div class="team-city"><?php echo htmlspecialchars($team['City']); ?></div>
            
            <div class="ranking-change <?php 
                if ($rankChange < 0) echo 'up';
                elseif ($rankChange > 0) echo 'down';
                else echo 'same';
            ?>">
                <?php 
                if ($rankChange < 0) {
                    echo '↑ ' . abs($rankChange);
                } elseif ($rankChange > 0) {
                    echo '↓ ' . $rankChange;
                } else {
                    echo '→ 0';
                }
                ?>
            </div>
            
            <div class="team-stats">
                <div class="team-stat">
                    <div class="team-stat-value"><?php echo $team['Points']; ?></div>
                    <div class="team-stat-label">Pts</div>
                </div>
                <div class="team-stat">
                    <div class="team-stat-value"><?php echo $team['W']; ?></div>
                    <div class="team-stat-label">V</div>
                </div>
                <div class="team-stat">
                    <div class="team-stat-value"><?php echo $team['L']; ?></div>
                    <div class="team-stat-label">D</div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php
}
?>