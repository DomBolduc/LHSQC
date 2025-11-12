
<?php
// Inclusion du CSS moderne
echo '<link rel="stylesheet" href="css/components/transactions.css">';

// Nom du fichier de la base de données SQLite
$databaseFile = 'LHSQC-STHS.db';
// Connexion à la base de données SQLite
$db = new SQLite3($databaseFile);
// Requête pour récupérer les 20 premières entrées (numéros 1 à 20 = 10 transactions complètes)
// Les numéros les plus petits sont les plus récents
$query = "SELECT
    ReceivingTeamThemeID, ReceivingTeamName, ReceivingTeamText,
    SendingTeamThemeID, SendingTeamName, SendingTeamText,
    DateTxt, Number
FROM TradeLog
WHERE Number <= 20
ORDER BY Number ASC";

$result = $db->query($query);

// Vérifier si la requête a réussi
if ($result === false) {
    echo "<!-- Erreur SQL: " . $db->lastErrorMsg() . " -->";
    // Requête de fallback plus simple
    $query = "SELECT ReceivingTeamThemeID, ReceivingTeamName, ReceivingTeamText, Number FROM TradeLog WHERE Number <= 20 ORDER BY Number ASC";
    $result = $db->query($query);
}

// Fonction pour déterminer le type de transaction
function getTransactionType($text) {
    $text = strtolower($text);
    if (strpos($text, 'trade') !== false || strpos($text, 'échange') !== false) {
        return 'trade';
    } elseif (strpos($text, 'waiver') !== false || strpos($text, 'ballotage') !== false) {
        return 'waiver';
    } elseif (strpos($text, 'injury') !== false || strpos($text, 'blessure') !== false) {
        return 'injury';
    } elseif (strpos($text, 'suspension') !== false) {
        return 'suspension';
    }
    return 'trade'; // Par défaut
}

// Fonction pour obtenir le label du type
function getTransactionTypeLabel($type) {
    switch($type) {
        case 'trade': return 'Trade';
        case 'waiver': return 'Waiver';
        case 'injury': return 'Injury';
        case 'suspension': return 'Suspension';
        default: return 'Trade';
    }
}

?>


<div class="transactions-card">
    <div class="transactions-header">Latest Transactions</div>
    <div class="transactions-content">
        <?php
        $hasTransactions = false;
        $processedTrades = array(); // Pour éviter les doublons
        echo '<ul class="transactions-list">';

        // Collecter toutes les transactions
        $allTransactions = array();
        if ($result !== false) {
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $allTransactions[] = $row;
            }
        }

        // Créer un index des transactions par numéro
        $transactionsByNumber = array();
        foreach ($allTransactions as $transaction) {
            $num = isset($transaction['Number']) ? $transaction['Number'] : 0;
            $transactionsByNumber[$num] = $transaction;
        }

        // Regrouper par paires en commençant par les plus petits numéros (plus récents)
        $groupedTrades = array();
        $usedNumbers = array();

        // Trier les numéros par ordre croissant (1, 2, 3, 4, 5, 6...)
        $sortedNumbers = array_keys($transactionsByNumber);
        sort($sortedNumbers);

        // Regrouper par paires consécutives (1-2, 3-4, 5-6, etc.)
        for ($i = 0; $i < count($sortedNumbers); $i++) {
            $num = $sortedNumbers[$i];

            // Si ce numéro a déjà été utilisé, passer au suivant
            if (in_array($num, $usedNumbers)) {
                continue;
            }

            // Déterminer le numéro de la paire
            if ($num % 2 == 1) {
                // Numéro impair (1, 3, 5...) - chercher le suivant (2, 4, 6...)
                $pairNum = $num + 1;
            } else {
                // Numéro pair (2, 4, 6...) - chercher le précédent (1, 3, 5...)
                $pairNum = $num - 1;
            }

            if (isset($transactionsByNumber[$pairNum]) && !in_array($pairNum, $usedNumbers)) {
                // Paire complète trouvée - mettre le plus petit numéro en premier (plus récent)
                $trade = array(
                    'type' => 'complete',
                    'transaction1' => $transactionsByNumber[min($num, $pairNum)], // Plus petit = plus récent
                    'transaction2' => $transactionsByNumber[max($num, $pairNum)]  // Plus grand = plus ancien
                );
                $groupedTrades[] = $trade;

                // Marquer les deux numéros comme utilisés
                $usedNumbers[] = $num;
                $usedNumbers[] = $pairNum;
            } else {
                // Transaction orpheline
                $trade = array(
                    'type' => 'single',
                    'transaction1' => $transactionsByNumber[$num]
                );
                $groupedTrades[] = $trade;
                $usedNumbers[] = $num;
            }
        }

        // Pas besoin de limiter car nous récupérons déjà les 20 premières entrées (10 transactions)

        // Afficher les trades regroupés
        foreach ($groupedTrades as $trade) {
            $hasTransactions = true;
            $currentTransaction = $trade['transaction1'];
            $nextTransaction = isset($trade['transaction2']) ? $trade['transaction2'] : null;

                $transactionText = isset($currentTransaction['ReceivingTeamText']) ? $currentTransaction['ReceivingTeamText'] : '';
                $transactionType = getTransactionType($transactionText);
                $typeLabel = getTransactionTypeLabel($transactionType);
                ?>

                <li class="transaction-item">
                    <?php if ($nextTransaction): ?>
                        <!-- Trade complet avec deux équipes -->
                        <div class="trade-teams">
                            <div class="team-side">
                                <div class="team-logo-container">
                                    <img src="images/<?= isset($currentTransaction['ReceivingTeamThemeID']) ? $currentTransaction['ReceivingTeamThemeID'] : '0' ?>.png"
                                         alt="<?= htmlspecialchars(isset($currentTransaction['ReceivingTeamName']) ? $currentTransaction['ReceivingTeamName'] : 'Team') ?> Logo"
                                         class="team-logo">
                                </div>
                                <div class="team-name"><?= htmlspecialchars(isset($currentTransaction['ReceivingTeamName']) ? $currentTransaction['ReceivingTeamName'] : 'Team') ?></div>
                            </div>

                            <div class="trade-arrow">⇄</div>

                            <div class="team-side">
                                <div class="team-logo-container">
                                    <img src="images/<?= isset($nextTransaction['ReceivingTeamThemeID']) ? $nextTransaction['ReceivingTeamThemeID'] : '0' ?>.png"
                                         alt="<?= htmlspecialchars(isset($nextTransaction['ReceivingTeamName']) ? $nextTransaction['ReceivingTeamName'] : 'Team') ?> Logo"
                                         class="team-logo">
                                </div>
                                <div class="team-name"><?= htmlspecialchars(isset($nextTransaction['ReceivingTeamName']) ? $nextTransaction['ReceivingTeamName'] : 'Team') ?></div>
                            </div>
                        </div>

                        <div class="transaction-info">
                            <div class="transaction-details">
                                <div class="trade-detail"><?= htmlspecialchars(isset($currentTransaction['ReceivingTeamText']) ? $currentTransaction['ReceivingTeamText'] : '') ?></div>
                                <div class="trade-detail"><?= htmlspecialchars(isset($nextTransaction['ReceivingTeamText']) ? $nextTransaction['ReceivingTeamText'] : '') ?></div>
                            </div>
                        </div>

                    <?php else: ?>
                        <!-- Transaction simple -->
                        <div class="team-logo-container">
                            <img src="images/<?= isset($currentTransaction['ReceivingTeamThemeID']) ? $currentTransaction['ReceivingTeamThemeID'] : '0' ?>.png"
                                 alt="<?= htmlspecialchars(isset($currentTransaction['ReceivingTeamName']) ? $currentTransaction['ReceivingTeamName'] : 'Team') ?> Logo"
                                 class="team-logo">
                        </div>

                        <div class="transaction-info">
                            <div class="team-name"><?= htmlspecialchars(isset($currentTransaction['ReceivingTeamName']) ? $currentTransaction['ReceivingTeamName'] : 'Team') ?></div>
                            <div class="transaction-details"><?= htmlspecialchars(isset($currentTransaction['ReceivingTeamText']) ? $currentTransaction['ReceivingTeamText'] : '') ?></div>
                        </div>
                    <?php endif; ?>

                    <div class="transaction-type">
                        <span class="type-badge type-<?= $transactionType ?>"><?= $typeLabel ?></span>
                    </div>
                </li>

                <?php
        }

        // Si aucune transaction trouvée
        if (!$hasTransactions) {
            echo '<li class="no-transactions">';
            echo '<div class="no-transactions-icon">📋</div>';
            echo '<div class="no-transactions-text">Aucune transaction récente</div>';
            echo '</li>';
        }

        echo '</ul>';
        ?>
    </div>
</div>

<?php
    // Fermer la connexion à la base de données
    $db->close();
?>