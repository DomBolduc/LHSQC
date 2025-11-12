<?php include "Header.php";

If ($lang == "fr"){include 'LanguageFR-League.php';}else{include 'LanguageEN-League.php';}

$Title = "Classement du Repêchage 2025";
If (file_exists($DatabaseFile) == false){
    Goto STHSErrorDraftRanking;
}else{try{
    $LeagueName = (string)"";
    $db = new SQLite3($DatabaseFile);
    
    // Récupérer les informations de la ligue
    $Query = "Select Name, LeagueYearOutput, NumbersOfTeam, PlayOffStarted from LeagueGeneral";
    $LeagueGeneral = $db->querySingle($Query,true);		
    $LeagueName = $LeagueGeneral['Name'];
    
    // Requête pour récupérer les résultats du repêchage 2025 depuis la table EntryDraft
    $Query = "SELECT EntryDraft.*,
                     TeamProInfoCurrent.Name AS CurrentTeamName,
                     TeamProInfoCurrent.TeamThemeID As CurrentTeamThemeID,
                     TeamProInfoOriginal.Name As OriginalTeamName,
                     TeamProInfoOriginal.TeamThemeID As OriginalTeamThemeID
              FROM (EntryDraft
                    LEFT JOIN TeamProInfo AS TeamProInfoCurrent ON EntryDraft.CurrentTeam = TeamProInfoCurrent.Number)
                    LEFT JOIN TeamProInfo AS TeamProInfoOriginal ON EntryDraft.OriginalTeam = TeamProInfoOriginal.Number
              ORDER BY EntryDraft.PickNumber";
    $DraftRanking = $db->query($Query);
    
    echo "<title>" . $LeagueName . " - Classement du Repêchage 2025</title>";

} catch (Exception $e) {
STHSErrorDraftRanking:
    $LeagueName = $DatabaseNotFound;
    $DraftRanking = Null;
    echo "<title>" . $DatabaseNotFound ."</title>";
}}?>

</head><body>

<?php include "Menu.php";?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <!-- En-tête de la page -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h1 class="mb-0">
                        <i class="fas fa-trophy me-2"></i>
                        Classement du Repêchage 2025
                    </h1>
                    <p class="mb-0 mt-2">Ordre de sélection basé sur les performances de la saison</p>
                </div>
            </div>

            <!-- Tableau du classement -->
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center" style="width: 80px;">Choix #</th>
                                    <th style="width: 60px;"></th>
                                    <th>Équipe Sélectionnante</th>
                                    <th>Équipe d'Origine</th>
                                    <th>Joueur Sélectionné</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $LoopCount = 0;
                                $currentRound = 0;

                                if (empty($DraftRanking) == false){
                                    while ($row = $DraftRanking->fetchArray()) {
                                        // Calculer la ronde basée sur le numéro de choix et le nombre d'équipes
                                        $calculatedRound = ceil($row['PickNumber'] / $LeagueGeneral['NumbersOfTeam']);

                                        // Vérifier si on change de ronde
                                        if ($currentRound != $calculatedRound) {
                                            $currentRound = $calculatedRound;
                                            echo "<tr class='table-info'>";
                                            echo "<td colspan='5' class='text-center fw-bold py-3'>";
                                            echo "<i class='fas fa-medal me-2'></i>RONDE " . $currentRound;
                                            echo "</td></tr>";
                                        }

                                        echo "<tr>";

                                        // Numéro de choix
                                        echo "<td class='text-center fw-bold'>" . $row['PickNumber'] . "</td>";

                                        // Logo de l'équipe sélectionnante
                                        echo "<td class='text-center'>";
                                        if ($row['CurrentTeamThemeID'] > 0) {
                                            echo "<img src='" . $ImagesCDNPath . "/images/" . $row['CurrentTeamThemeID'] . ".png' alt='" . $row['CurrentTeamName'] . "' class='team-logo' style='width: 32px; height: 32px;' />";
                                        }
                                        echo "</td>";

                                        // Équipe sélectionnante
                                        echo "<td class='fw-bold'>" . $row['CurrentTeamName'] . "</td>";

                                        // Équipe d'origine (si différente)
                                        echo "<td>";
                                        if ($row['CurrentTeam'] != $row['OriginalTeam']) {
                                            echo "<span class='text-muted'>via </span>";
                                            if ($row['OriginalTeamThemeID'] > 0) {
                                                echo "<img src='" . $ImagesCDNPath . "/images/" . $row['OriginalTeamThemeID'] . ".png' alt='" . $row['OriginalTeamName'] . "' class='team-logo me-1' style='width: 20px; height: 20px;' />";
                                            }
                                            echo "<span class='text-muted'>" . $row['OriginalTeamName'] . "</span>";
                                        } else {
                                            echo "<span class='text-muted'>Choix original</span>";
                                        }
                                        echo "</td>";

                                        // Joueur sélectionné
                                        echo "<td>";
                                        if (!empty($row['ProspectPick'])) {
                                            echo "<span class='fw-bold text-primary'>" . $row['ProspectPick'] . "</span>";
                                        } else {
                                            echo "<span class='text-muted fst-italic'>Non sélectionné</span>";
                                        }
                                        echo "</td>";

                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center py-4'>";
                                    echo "<i class='fas fa-exclamation-triangle text-warning me-2'></i>";
                                    echo "Aucune donnée de repêchage disponible pour 2025";
                                    echo "</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Informations supplémentaires -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-info-circle me-2"></i>
                        Informations
                    </h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-2"><strong>Légende :</strong></p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-circle text-primary me-2"></i><strong>Joueur sélectionné</strong> - Nom du prospect choisi</li>
                                <li><i class="fas fa-circle text-muted me-2"></i><strong>via [Équipe]</strong> - Choix acquis par échange</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2"><strong>Repêchage 2025 :</strong></p>
                            <p class="text-muted mb-0">
                                Résultats officiels du repêchage d'entrée 2025.
                                Affichage des joueurs sélectionnés par chaque équipe.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php include "Footer.php";?>

<style>
.team-logo {
    border-radius: 4px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.2);
}

.table-responsive {
    border-radius: 8px;
    overflow: hidden;
}

.card {
    border: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
}

.badge {
    font-size: 0.75em;
}

.table > :not(caption) > * > * {
    padding: 0.75rem 0.5rem;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.9rem;
    }
    
    .team-logo {
        width: 24px !important;
        height: 24px !important;
    }
    
    .card-body {
        padding: 1rem;
    }
}
</style>

</body></html>
