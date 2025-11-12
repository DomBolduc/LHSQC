<?php include "Header.php"; ?>

<!-- CSS moderne pour la page Cap Summary -->
<link href="css/proteam-modern.css" rel="stylesheet" type="text/css">

<!-- CSS pour les tables triables -->
<style>
.sortable-table th.sortable {
    cursor: pointer;
    user-select: none;
    position: relative;
}

.sortable-table th.sortable:hover {
    background-color: #e9ecef !important;
}

.sort-indicator {
    position: absolute;
    right: 2px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 8px;
    color: #666;
    opacity: 0.5;
}

.sort-indicator:after {
    content: "↕";
}

.sortable-table th.sortable.sort-asc .sort-indicator:after {
    content: "↑";
    color: #007bff;
    opacity: 1;
}

.sortable-table th.sortable.sort-desc .sort-indicator:after {
    content: "↓";
    color: #007bff;
    opacity: 1;
}

.sortable-table tbody tr:hover {
    background-color: #f8f9fa !important;
}

.cap-summary-page {
    padding: 20px;
    max-width: 1400px;
    margin: 0 auto;
}

.page-header {
    text-align: center;
    margin-bottom: 30px;
    padding: 20px;
    color: black;
}

.league-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    text-align: center;
}

.stat-value {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.stat-label {
    font-size: 12px;
    color: #666;
    margin-top: 5px;
}

.cap-table-container {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
}

.team-logo {
    width: 24px;
    height: 24px;
    object-fit: contain;
    vertical-align: middle;
    margin-right: 8px;
}

.positive { color: #28a745; font-weight: bold; }
.negative { color: #dc3545; font-weight: bold; }
.neutral { color: #6c757d; }
</style>

<?php
// Configuration de la base de données
$DatabaseFile = "LHSQC-STHS.db";

try {
    if (file_exists($DatabaseFile) == false){
        throw new Exception("Base de données non trouvée");
    }
    
    $db = new SQLite3($DatabaseFile);
    
    // Récupération des informations générales de la ligue
    $Query = "SELECT Name, LeagueYearOutput FROM LeagueGeneral";
    $LeagueGeneral = $db->querySingle($Query, true);
    $LeagueName = $LeagueGeneral['Name'];
    $LeagueYear = (int)$LeagueGeneral['LeagueYearOutput'];
    
    // Récupération des informations financières de la ligue
    $Query = "SELECT SalaryCapOption, ProSalaryCapValue, ProMinimumSalaryCap FROM LeagueFinance";
    $LeagueFinance = $db->querySingle($Query, true);
    $LeagueSalaryCap = (int)$LeagueFinance['ProSalaryCapValue'];
    $LeagueMinSalaryCap = (int)$LeagueFinance['ProMinimumSalaryCap'];
    
    // Récupération de toutes les équipes avec leurs données financières et nombre de contrats
    $Query = "SELECT
        tpi.Number,
        tpi.Name,
        tpi.Abbre,
        tpi.TeamThemeID,
        tpf.CurrentBankAccount,
        tpf.TotalPlayersSalaries,
        tpf.ExpensePerDay,
        tpf.ExpenseThisSeason,
        tpf.TotalIncome,
        tpf.SalaryCapToDate,
        tps.GP,
        tps.W,
        tps.L,
        tps.OTL,
        tps.SOL,
        tps.Points,
        (SELECT COUNT(*) FROM PlayerInfo WHERE Team = tpi.Number AND Retire = 'False' AND Contract > 0) +
        (SELECT COUNT(*) FROM GoalerInfo WHERE Team = tpi.Number AND Retire = 'False' AND Contract > 0) AS TotalContracts
    FROM TeamProInfo tpi
    LEFT JOIN TeamProFinance tpf ON tpi.Number = tpf.Number
    LEFT JOIN TeamProStat tps ON tpi.Number = tps.Number
    ORDER BY tpi.Name";
    
    $Teams = $db->query($Query);
    
    // Calcul des statistiques de la ligue
    $totalTeams = 0;
    $totalSalaries = 0;
    $totalBankAccounts = 0;
    $teamsOverCap = 0;
    $teamsUnderFloor = 0;
    
} catch (Exception $e) {
    $LeagueName = "Erreur";
    $Teams = null;
    $LeagueFinance = null;
}

echo "<title>" . $LeagueName . " - Salary Cap Summary</title>";
?>

<body>

<header>
<?php include "components/GamesScroller.php"; ?>	 
<?php include "Menu.php"; ?>	

<div class="cap-summary-page">
    
    <!-- En-tête de la page -->
    <div class="page-header">
        <h1><?php echo $LeagueName; ?> - Salary Cap Summary</h1>
        <p>League Year <?php echo $LeagueYear; ?> | Salary Cap: $<?php echo number_format($LeagueSalaryCap); ?></p>
    </div>

    <!-- Statistiques de la ligue -->
    <div class="league-stats">
        <div class="stat-card">
            <div class="stat-value">$<?php echo number_format($LeagueSalaryCap); ?></div>
            <div class="stat-label">League Salary Cap</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">$<?php echo number_format($LeagueMinSalaryCap); ?></div>
            <div class="stat-label">Salary Floor</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" id="total-teams"><?php echo $totalTeams; ?></div>
            <div class="stat-label">Total Teams</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" id="avg-salary">$<?php echo $totalTeams > 0 ? number_format($totalSalaries / $totalTeams) : '0'; ?></div>
            <div class="stat-label">Average Team Salary</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" id="teams-over-cap"><?php echo $teamsOverCap; ?></div>
            <div class="stat-label">Teams Over Cap</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" id="teams-under-floor"><?php echo $teamsUnderFloor; ?></div>
            <div class="stat-label">Teams Under Floor</div>
        </div>
    </div>

    <!-- Tableau principal -->
    <div class="cap-table-container">
        <table id="cap-summary-table" class="sortable-table" style="width: 100%; border-collapse: collapse; font-size: 12px;">
            <thead>
                <tr style="background: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                    <th class="sortable" data-sort="string" style="padding: 12px 8px; border: 1px solid #dee2e6; text-align: left; font-weight: bold; cursor: pointer; position: relative;">Team <span class="sort-indicator"></span></th>
                    <th class="sortable" data-sort="number" style="padding: 12px 8px; border: 1px solid #dee2e6; text-align: center; font-weight: bold; cursor: pointer; position: relative;">Contracts <span class="sort-indicator"></span></th>
                    <th class="sortable" data-sort="number" style="padding: 12px 8px; border: 1px solid #dee2e6; text-align: center; font-weight: bold; cursor: pointer; position: relative;">Total Salaries <span class="sort-indicator"></span></th>
                    <th class="sortable" data-sort="number" style="padding: 12px 8px; border: 1px solid #dee2e6; text-align: center; font-weight: bold; cursor: pointer; position: relative;">Cap Space <span class="sort-indicator"></span></th>
                    <th class="sortable" data-sort="number" style="padding: 12px 8px; border: 1px solid #dee2e6; text-align: center; font-weight: bold; cursor: pointer; position: relative;">Cap % <span class="sort-indicator"></span></th>
                    <th class="sortable" data-sort="number" style="padding: 12px 8px; border: 1px solid #dee2e6; text-align: center; font-weight: bold; cursor: pointer; position: relative;">Bank Account <span class="sort-indicator"></span></th>
                    <th class="sortable" data-sort="string" style="padding: 12px 8px; border: 1px solid #dee2e6; text-align: center; font-weight: bold; cursor: pointer; position: relative;">Status <span class="sort-indicator"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Stocker les données des équipes pour calculer les statistiques
                $teamsData = array();

                if ($Teams) {
                    while ($Team = $Teams->fetchArray()) {
                        $teamsData[] = $Team;
                    }
                }

                // Calculer les statistiques
                foreach ($teamsData as $Team) {
                    $totalTeams++;

                    // Calcul du salary cap effectif pour cette équipe
                    $teamSalaryCap = $LeagueSalaryCap;
                    if ($LeagueFinance['SalaryCapOption'] == 2 || $LeagueFinance['SalaryCapOption'] == 5) {
                        $teamSalaryCap = $LeagueSalaryCap + ($Team['CurrentBankAccount'] ?? 0);
                    }

                    $totalSalaries += ($Team['TotalPlayersSalaries'] ?? 0);
                    $totalBankAccounts += ($Team['CurrentBankAccount'] ?? 0);

                    // Vérifier les statuts
                    if (($Team['TotalPlayersSalaries'] ?? 0) > $teamSalaryCap) {
                        $teamsOverCap++;
                    } elseif (($Team['TotalPlayersSalaries'] ?? 0) < $LeagueMinSalaryCap) {
                        $teamsUnderFloor++;
                    }
                }

                // Afficher les équipes
                foreach ($teamsData as $Team) {
                    // Calcul du salary cap effectif pour cette équipe
                    $teamSalaryCap = $LeagueSalaryCap;
                    if ($LeagueFinance['SalaryCapOption'] == 2 || $LeagueFinance['SalaryCapOption'] == 5) {
                        $teamSalaryCap = $LeagueSalaryCap + ($Team['CurrentBankAccount'] ?? 0);
                    }

                    $capSpace = $teamSalaryCap - ($Team['TotalPlayersSalaries'] ?? 0);
                    $capPercentage = $teamSalaryCap > 0 ? (($Team['TotalPlayersSalaries'] ?? 0) / $teamSalaryCap) * 100 : 0;

                    // Déterminer le statut
                    $status = "OK";
                    $statusClass = "neutral";

                    if (($Team['TotalPlayersSalaries'] ?? 0) > $teamSalaryCap) {
                        $status = "OVER CAP";
                        $statusClass = "negative";
                    } elseif (($Team['TotalPlayersSalaries'] ?? 0) < $LeagueMinSalaryCap) {
                        $status = "UNDER FLOOR";
                        $statusClass = "negative";
                    } elseif ($capSpace < 1000000) { // Moins de 1M d'espace
                        $status = "TIGHT";
                        $statusClass = "neutral";
                    }
                        
                        echo "<tr>";
                        
                        // Nom de l'équipe avec logo
                        echo "<td style='padding: 8px; border: 1px solid #dee2e6;'>";
                        if ($Team['TeamThemeID'] && file_exists("images/" . $Team['TeamThemeID'] . ".png")) {
                            echo "<img src='images/" . $Team['TeamThemeID'] . ".png' alt='" . htmlspecialchars($Team['Name']) . "' class='team-logo'>";
                        }
                        echo "<a href='ProTeam.php?Team=" . $Team['Number'] . "' style='text-decoration: none; color: #007bff;'>";
                        echo htmlspecialchars($Team['Name']);
                        echo "</a></td>";

                        // Nombre de contrats
                        $contractsCount = $Team['TotalContracts'] ?? 0;
                        $contractsClass = $contractsCount >= 48 ? "negative" : ($contractsCount >= 45 ? "neutral" : "positive");
                        echo "<td style='padding: 8px; border: 1px solid #dee2e6; text-align: center;' class='" . $contractsClass . "'>" . $contractsCount . "/50</td>";

                        // Salaires totaux
                        echo "<td style='padding: 8px; border: 1px solid #dee2e6; text-align: center;'>$" . number_format($Team['TotalPlayersSalaries'] ?? 0) . "</td>";

                        // Espace sous le cap
                        $capSpaceClass = $capSpace >= 0 ? "positive" : "negative";
                        echo "<td style='padding: 8px; border: 1px solid #dee2e6; text-align: center;' class='" . $capSpaceClass . "'>$" . number_format($capSpace) . "</td>";

                        // Pourcentage du cap
                        $capPercentageClass = $capPercentage > 100 ? "negative" : ($capPercentage > 95 ? "neutral" : "positive");
                        echo "<td style='padding: 8px; border: 1px solid #dee2e6; text-align: center;' class='" . $capPercentageClass . "'>" . number_format($capPercentage, 1) . "%</td>";

                        // Compte en banque
                        $bankClass = ($Team['CurrentBankAccount'] ?? 0) >= 0 ? "positive" : "negative";
                        echo "<td style='padding: 8px; border: 1px solid #dee2e6; text-align: center;' class='" . $bankClass . "'>$" . number_format($Team['CurrentBankAccount'] ?? 0) . "</td>";

                        // Statut
                        echo "<td style='padding: 8px; border: 1px solid #dee2e6; text-align: center;' class='" . $statusClass . "'>" . $status . "</td>";

                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php include "Footer.php"; ?>

<script>
// JavaScript pour rendre la table triable et calculer les statistiques
document.addEventListener('DOMContentLoaded', function() {
    const table = document.getElementById('cap-summary-table');
    if (!table) return;

    const headers = table.querySelectorAll('th.sortable');
    let currentSort = { column: -1, direction: 'asc' };

    // Calculer et afficher les statistiques
    updateLeagueStats();

    headers.forEach((header, index) => {
        header.addEventListener('click', function() {
            sortTable(index, header.dataset.sort);
        });
    });

    function sortTable(columnIndex, sortType) {
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));

        // Déterminer la direction du tri
        let direction = 'asc';
        if (currentSort.column === columnIndex && currentSort.direction === 'asc') {
            direction = 'desc';
        }

        // Supprimer les classes de tri précédentes
        headers.forEach(h => {
            h.classList.remove('sort-asc', 'sort-desc');
        });

        // Ajouter la classe de tri actuelle
        headers[columnIndex].classList.add(direction === 'asc' ? 'sort-asc' : 'sort-desc');

        // Trier les lignes
        rows.sort((a, b) => {
            let aValue = a.cells[columnIndex].textContent.trim();
            let bValue = b.cells[columnIndex].textContent.trim();

            // Traitement spécial pour différents types de données
            if (sortType === 'number') {
                // Pour les nombres, extraire la valeur numérique
                aValue = parseFloat(aValue.replace(/[^0-9.-]/g, '')) || 0;
                bValue = parseFloat(bValue.replace(/[^0-9.-]/g, '')) || 0;

                if (direction === 'asc') {
                    return aValue - bValue;
                } else {
                    return bValue - aValue;
                }
            } else {
                // Pour les chaînes de caractères
                if (direction === 'asc') {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue.localeCompare(aValue);
                }
            }
        });

        // Réorganiser les lignes dans le tableau
        rows.forEach(row => tbody.appendChild(row));

        // Mettre à jour l'état du tri actuel
        currentSort = { column: columnIndex, direction: direction };
    }

    function updateLeagueStats() {
        const tbody = table.querySelector('tbody');
        const rows = tbody.querySelectorAll('tr');

        let totalTeams = rows.length;
        let totalSalaries = 0;
        let teamsOverCap = 0;
        let teamsUnderFloor = 0;

        rows.forEach(row => {
            const cells = row.cells;

            // Extraire les salaires totaux (colonne 2 maintenant)
            const salaryText = cells[2].textContent.trim();
            const salary = parseFloat(salaryText.replace(/[^0-9.-]/g, '')) || 0;
            totalSalaries += salary;

            // Vérifier le statut (dernière colonne)
            const status = cells[cells.length - 1].textContent.trim();
            if (status === 'OVER CAP') {
                teamsOverCap++;
            } else if (status === 'UNDER FLOOR') {
                teamsUnderFloor++;
            }
        });

        const avgSalary = totalTeams > 0 ? totalSalaries / totalTeams : 0;

        // Mettre à jour l'affichage
        document.getElementById('total-teams').textContent = totalTeams;
        document.getElementById('avg-salary').textContent = '$' + Math.round(avgSalary).toLocaleString();
        document.getElementById('teams-over-cap').textContent = teamsOverCap;
        document.getElementById('teams-under-floor').textContent = teamsUnderFloor;
    }
});
</script>

</body>
</html>
