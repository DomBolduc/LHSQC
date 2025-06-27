
<?php
// Inclusion du CSS moderne
echo '<link rel="stylesheet" href="css/components/transactions.css">';

// Nom du fichier de la base de données SQLite
$databaseFile = 'LHSQC-STHS.db';
// Connexion à la base de données SQLite
$db = new SQLite3($databaseFile);
// Requête pour récupérer les 20 dernières entrées (= 10 transactions complètes)
$query = "SELECT
    ReceivingTeamThemeID, ReceivingTeamName, ReceivingTeamText,
    SendingTeamThemeID, SendingTeamName, SendingTeamText,
    DateTxt, Number
FROM TradeLog
ORDER BY Number DESC
LIMIT 20";

$result = $db->query($query);

// Vérifier si la requête a réussi
if ($result === false) {
    echo "<!-- Erreur SQL: " . $db->lastErrorMsg() . " -->";
    // Requête de fallback plus simple
    $query = "SELECT ReceivingTeamThemeID, ReceivingTeamName, ReceivingTeamText, Number FROM TradeLog ORDER BY Number DESC LIMIT 15";
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

        // Trouver le numéro le plus élevé et regrouper par paires
        $maxNumber = max(array_keys($transactionsByNumber));
        $groupedTrades = array();

        // Commencer par le numéro le plus élevé et descendre par paires
        for ($num = $maxNumber; $num >= 1; $num -= 2) {
            // Pour chaque paire, vérifier si les deux numéros existent
            $pairNum = $num % 2 == 0 ? $num - 1 : $num + 1; // Trouver le numéro de la paire

            if (isset($transactionsByNumber[$num]) && isset($transactionsByNumber[$pairNum])) {
                // Paire complète trouvée
                $trade = array(
                    'type' => 'complete',
                    'transaction1' => $transactionsByNumber[max($num, $pairNum)], // Le plus grand numéro
                    'transaction2' => $transactionsByNumber[min($num, $pairNum)]  // Le plus petit numéro
                );
                $groupedTrades[] = $trade;

                // Retirer ces transactions de la liste pour éviter les doublons
                unset($transactionsByNumber[$num]);
                unset($transactionsByNumber[$pairNum]);
            }
        }

        // Ajouter les transactions orphelines restantes
        foreach ($transactionsByNumber as $num => $transaction) {
            $trade = array(
                'type' => 'single',
                'transaction1' => $transaction
            );
            $groupedTrades[] = $trade;
        }

        // Limiter à 10 trades maximum
        $groupedTrades = array_slice($groupedTrades, 0, 10);

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