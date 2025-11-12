<?php

require_once 'STHSSetting.php';

$gameNumber = isset($_GET['game']) ? (int)$_GET['game'] : 0;
$isFarm = isset($_GET['farm']) && filter_var($_GET['farm'], FILTER_VALIDATE_BOOLEAN);
$proFlag = $isFarm ? 'False' : 'True';

function renderError(string $message): void
{
    http_response_code(400);
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" />';
    echo '<title>Boxscore JSON Example - Error</title>';
    echo '<style>body{font-family:Arial,Helvetica,sans-serif;margin:2rem;color:#222}';
    echo 'section{max-width:780px}code{background:#f5f5f5;padding:0.2rem 0.4rem;border-radius:4px}</style>';
    echo '</head><body><section>';
    echo '<h1>Boxscore JSON Example</h1>';
    echo '<p>' . htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
    echo '<p>Usage: <code>?game=207</code> (add <code>&amp;farm=1</code> for farm games)</p>';
    echo '</section></body></html>';
    exit;
}

if ($gameNumber <= 0) {
    renderError('Aucun numéro de match valide n’a été fourni.');
}

if ($GameJSONDatabaseFile === '') {
    renderError('Le fichier SQLite JSON n’est pas configuré dans STHSSetting.ini.');
}

try {
    $leagueDb = new SQLite3($DatabaseFile);
} catch (Exception $exception) {
    renderError('Impossible d’ouvrir la base principale : ' . $exception->getMessage());
}

$leagueGeneral = $leagueDb->querySingle('SELECT Name, LeagueYear FROM LeagueGeneral', true);
$leagueDb->close();

if (!$leagueGeneral || !isset($leagueGeneral['LeagueYear'])) {
    renderError('Impossible de récupérer l’année de ligue.');
}

$leagueYear = (int)$leagueGeneral['LeagueYear'];
$gameDatabasePath = str_replace('@-@', $leagueYear . '-' . floor($gameNumber / 200), $GameJSONDatabaseFile);

if (!file_exists($gameDatabasePath)) {
    renderError('La base SQLite du match est introuvable : ' . htmlspecialchars($gameDatabasePath, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
}

try {
    $gameDb = new SQLite3($gameDatabasePath);
} catch (Exception $exception) {
    renderError('Impossible d’ouvrir la base JSON du match : ' . $exception->getMessage());
}

$statement = $gameDb->prepare('SELECT Title, JSON, Pro FROM GameResult WHERE Number = :number AND Pro = :pro');
$statement->bindValue(':number', $gameNumber, SQLITE3_INTEGER);
$statement->bindValue(':pro', $proFlag, SQLITE3_TEXT);
$row = $statement->execute()->fetchArray(SQLITE3_ASSOC);

if (!$row) {
    $fallbackFlag = $proFlag === 'True' ? 'False' : 'True';
    $fallbackStatement = $gameDb->prepare('SELECT Title, JSON, Pro FROM GameResult WHERE Number = :number AND Pro = :pro');
    $fallbackStatement->bindValue(':number', $gameNumber, SQLITE3_INTEGER);
    $fallbackStatement->bindValue(':pro', $fallbackFlag, SQLITE3_TEXT);
    $row = $fallbackStatement->execute()->fetchArray(SQLITE3_ASSOC);
    if ($row) {
        $proFlag = $fallbackFlag;
        $isFarm = ($proFlag === 'False');
    }
}

$gameDb->close();

if (!$row || empty($row['JSON'])) {
    renderError('Match non trouvé dans la base JSON.');
}

$isFarm = ($row['Pro'] ?? $proFlag) === 'False';
$decoded = gzdecode(base64_decode($row['JSON'], true));

if ($decoded === false) {
    renderError('Impossible de décoder le flux GZIP / Base64 du match.');
}

$gameData = json_decode($decoded, true);

if (!is_array($gameData) || empty($gameData['udtTeamStat']) || count($gameData['udtTeamStat']) < 2) {
    renderError('Le JSON du match ne contient pas les statistiques d’équipe attendues.');
}

[$homeTeam, $awayTeam] = $gameData['udtTeamStat'];

$pageTitle = strip_tags($row['Title'] ?? '');

function formatPowerPlay(array $team): string
{
    $attempts = (int)($team['intPPAttemp'] ?? 0);
    $goals = (int)($team['intPPGoal'] ?? 0);
    if ($attempts === 0) {
        return '0/0 (0%)';
    }
    $percentage = $attempts > 0 ? round(($goals / max($attempts, 1)) * 100, 1) : 0;
    return sprintf('%d/%d (%.1f%%)', $goals, $attempts, $percentage);
}

function formatMinutes(int $seconds): string
{
    $seconds = max($seconds, 0);
    $minutes = intdiv($seconds, 60);
    $rest = $seconds % 60;
    return sprintf('%d:%02d', $minutes, $rest);
}

function extractPlayers(array $team): array
{
    $players = [];
    foreach ($team['udtPlayer'] ?? [] as $player) {
        if (!empty($player['strName'])) {
            $players[] = $player;
        }
    }
    return $players;
}

function extractGoalies(array $team): array
{
    $goalies = [];
    foreach ($team['udtGoaler'] ?? [] as $goalie) {
        if (!empty($goalie['strName']) && $goalie['intPlayerNumber'] > 0) {
            $goalies[] = $goalie;
        }
    }
    return $goalies;
}

function calculateZonePossession(array $team): array
{
    $labels = ['Zone offensive', 'Zone neutre', 'Zone défensive'];
    $values = array_slice($team['PuckTimeControlinZone'] ?? [], 0, 3);
    $total = array_sum($values);
    if ($total <= 0) {
        $total = 1;
    }

    $result = [];
    foreach ($labels as $index => $label) {
        $seconds = (int)($values[$index] ?? 0);
        $result[] = [
            'label' => $label,
            'seconds' => $seconds,
            'percentage' => $seconds > 0 ? round(($seconds / $total) * 100, 1) : 0.0,
        ];
    }

    return $result;
}

function determinePeriodLabels(array $shotsPerPeriod): array
{
    $baseLabels = ['Période 1', 'Période 2', 'Période 3', 'Prolongation', 'Fusillade'];
    $labels = [];

    for ($index = 1; $index <= 4; $index++) {
        $value = (int)($shotsPerPeriod[$index] ?? 0);
        if ($index <= 3 || $value > 0) {
            $labels[$index] = $baseLabels[$index - 1];
        }
    }

    return $labels;
}

function buildPeriodDistribution(array $team): array
{
    $shots = $team['ShotsPerPeriod'] ?? [];
    $goals = $team['GoalsPerPeriod'] ?? [];
    $labels = determinePeriodLabels($shots);

    $distribution = [];
    foreach ($labels as $index => $label) {
        $distribution[$index] = [
            'label' => $label,
            'shots' => (int)($shots[$index] ?? 0),
            'goals' => (int)($goals[$index] ?? 0),
        ];
    }

    return $distribution;
}

function aggregateShotSituations(array $skaters, array $team): array
{
    $totals = [
        'shots' => (int)($team['intShotsFor'] ?? 0),
        'shots_ev' => 0,
        'shots_pp' => 0,
        'shots_pk' => 0,
        'missed' => 0,
        'blocked_for' => 0,
        'hits' => 0,
        'hits_taken' => 0,
    ];

    foreach ($skaters as $player) {
        $shots = (int)($player['intShots'] ?? 0);
        $ppShots = (int)($player['intPPShots'] ?? 0);
        $pkShots = (int)($player['intPKShots'] ?? 0);

        $totals['shots_ev'] += max($shots - $ppShots - $pkShots, 0);
        $totals['shots_pp'] += $ppShots;
        $totals['shots_pk'] += $pkShots;
        $totals['missed'] += (int)($player['intOwnShotsMissGoal'] ?? 0);
        $totals['blocked_for'] += (int)($player['intShotsBlock'] ?? 0);
        $totals['hits'] += (int)($player['intHits'] ?? 0);
        $totals['hits_taken'] += (int)($player['intHitsTook'] ?? 0);
    }

    return $totals;
}

function computeHeatIntensity(int $value, int $max): float
{
    if ($max <= 0) {
        return 0.0;
    }
    return round(min($value / $max, 1), 3);
}

function groupGoalsByPeriod(array $goalEvents, array $periodLabels): array
{
    $periodBuckets = [];
    foreach ($periodLabels as $index => $label) {
        $periodBuckets[$index] = [
            'label' => $label,
            'events' => [],
        ];
    }

    foreach ($goalEvents as $event) {
        $period = (int)($event['intPeriod'] ?? 0);
        $text = trim($event['strText'] ?? '');
        if ($text === '') {
            continue;
        }
        if (!isset($periodBuckets[$period])) {
            $periodBuckets[$period] = [
                'label' => "Période {$period}",
                'events' => [],
            ];
        }
        $periodBuckets[$period]['events'][] = $text;
    }

    return array_values($periodBuckets);
}

function formatScoreboardPeriodLabel(int $periodIndex): string
{
    return match ($periodIndex) {
        1 => '1',
        2 => '2',
        3 => '3',
        4 => 'OT',
        5 => 'SO',
        default => (string)$periodIndex,
    };
}

function buildScoreboardColumns(array $periodLabels): array
{
    $columns = [];
    foreach ($periodLabels as $index => $label) {
        $columns[] = [
            'index' => $index,
            'label' => formatScoreboardPeriodLabel($index),
        ];
    }

    return $columns;
}

function resolveTeamLogo(array $team): string
{
    $candidates = [];
    $themeId = (int)($team['intTeamThemeID'] ?? 0);
    $teamNumber = (int)($team['intNumber'] ?? 0);
    if ($themeId > 0) {
        $candidates[] = "images/{$themeId}.png";
    }
    if ($teamNumber > 0) {
        $candidates[] = "images/{$teamNumber}.png";
    }
    $cleanName = strtolower(preg_replace('/[^a-z0-9]+/i', '_', $team['strName'] ?? ''));
    if ($cleanName !== '') {
        $candidates[] = "images/{$cleanName}.png";
    }
    $candidates[] = "images/default.png";

    foreach ($candidates as $path) {
        if (file_exists($path)) {
            return $path;
        }
    }

    return end($candidates);
}

function getTeamThemePalette(int $themeId): array
{
    static $cache = null;

    if ($themeId <= 0) {
        return [];
    }

    if ($cache === null) {
        $cssPath = __DIR__ . '/css/nhlColors.css';
        $cssContent = @file_get_contents($cssPath);
        $cache = [
            'css' => $cssContent ?: '',
            'palettes' => []
        ];
    }

    if (!isset($cache['palettes'][$themeId])) {
        $css = $cache['css'];
        $palette = [];
        if ($css !== '') {
            $palette['dark'] = extractCssColor($css, 'teamColorDark' . $themeId, true);
            $palette['text'] = extractCssColor($css, 'teamColorDark' . $themeId, false);
            $palette['bright'] = extractCssColor($css, 'teamColorBright' . $themeId, false)
                ?? extractCssColor($css, 'teamColorBright' . $themeId, true);
            $palette['secondary'] = extractCssColor($css, 'teamColorSecondary' . $themeId, false)
                ?? extractCssColor($css, 'teamColorSecondary' . $themeId, true);
        }
        $cache['palettes'][$themeId] = array_filter($palette);
    }

    return $cache['palettes'][$themeId];
}

function extractCssColor(string $css, string $className, bool $background = false): ?string
{
    if (!preg_match('/\.' . preg_quote($className, '/') . '\s*\{([^}]*)\}/i', $css, $match)) {
        return null;
    }

    $block = $match[1];
    $property = $background ? 'background-color' : 'color';

    if (!preg_match('/' . preg_quote($property, '/') . '\s*:\s*([^;]+);/i', $block, $valueMatch)) {
        if (!$background && preg_match('/background-color\s*:\s*([^;]+);/i', $block, $valueMatch)) {
            // fallback to background color when regular color not defined
        } else {
            return null;
        }
    }

    $value = trim($valueMatch[1]);

    if (preg_match('/#([0-9a-f]{3,8})/i', $value, $hexMatch)) {
        return normalizeHexColor($hexMatch[0]);
    }

    if (preg_match('/rgba?\(([^)]+)\)/i', $value, $rgbaMatch)) {
        return 'rgba(' . trim($rgbaMatch[1]) . ')';
    }

    return null;
}

function normalizeHexColor(string $hex): string
{
    $hex = trim($hex);
    if (!preg_match('/^#([0-9a-f]{3,8})$/i', $hex, $match)) {
        return $hex;
    }

    $value = strtolower($match[1]);

    if (strlen($value) === 3) {
        $value = $value[0] . $value[0] . $value[1] . $value[1] . $value[2] . $value[2];
    } elseif (strlen($value) === 4) {
        $value = $value[0] . $value[0] . $value[1] . $value[1] . $value[2] . $value[2] . $value[3] . $value[3];
    }

    return '#' . strtoupper($value);
}

function colorToHex(string $color, string $fallback = '#FFFFFF'): string
{
    $color = trim($color);

    if (preg_match('/^#([0-9a-f]{6})$/i', $color)) {
        return strtoupper($color);
    }

    if (preg_match('/^#([0-9a-f]{8})$/i', $color, $match)) {
        return '#' . strtoupper(substr($match[1], 0, 6));
    }

    if (preg_match('/rgba?\(([^)]+)\)/i', $color, $match)) {
        $parts = array_map('trim', explode(',', $match[1]));
        if (count($parts) >= 3) {
            $r = max(0, min(255, (int)$parts[0]));
            $g = max(0, min(255, (int)$parts[1]));
            $b = max(0, min(255, (int)$parts[2]));
            return sprintf('#%02X%02X%02X', $r, $g, $b);
        }
    }

    return $fallback;
}

function colorToRgba(string $color, float $alpha = 1.0): string
{
    $color = trim($color);

    if ($color === '') {
        return 'rgba(0, 0, 0, ' . $alpha . ')';
    }

    if (stripos($color, 'rgba') === 0 || stripos($color, 'rgb') === 0) {
        if (preg_match('/rgba?\(([^)]+)\)/i', $color, $match)) {
            $parts = array_map('trim', explode(',', $match[1]));
            if (count($parts) >= 3) {
                $r = (int)$parts[0];
                $g = (int)$parts[1];
                $b = (int)$parts[2];
                $existingAlpha = count($parts) === 4 ? (float)$parts[3] : 1.0;
                $finalAlpha = max(min($existingAlpha * $alpha, 1), 0);
                return 'rgba(' . $r . ', ' . $g . ', ' . $b . ', ' . round($finalAlpha, 3) . ')';
            }
        }
        return $color;
    }

    if (preg_match('/^#([0-9a-f]{6})([0-9a-f]{2})?$/i', $color, $match)) {
        $hex = $match[1];
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        $existingAlpha = isset($match[2]) ? hexdec($match[2]) / 255 : 1.0;
        $finalAlpha = max(min($existingAlpha * $alpha, 1), 0);
        return 'rgba(' . $r . ', ' . $g . ', ' . $b . ', ' . round($finalAlpha, 3) . ')';
    }

    return $color;
}

function buildTeamGradient(array $palette, string $fallbackStart, string $fallbackEnd): string
{
    $start = colorToRgba($palette['bright'] ?? $fallbackStart, 0.88);
    $end = colorToRgba($palette['dark'] ?? $fallbackEnd, 0.94);
    return 'linear-gradient(135deg, ' . $start . ', ' . $end . ')';
}

$goalEvents = array_values(array_filter(
    $gameData['udtGoalText'] ?? [],
    static fn($event) => !empty(trim($event['strText'] ?? ''))
));
$goalEvents = array_values(array_filter(
    $gameData['udtGoalText'] ?? [],
    static fn($event) => !empty(trim($event['strText'] ?? ''))
));

$playerDirectory = [];

foreach ([$homeTeam, $awayTeam] as $team) {
    foreach ($team['udtPlayer'] ?? [] as $player) {
        if (!empty($player['strName']) && $player['intPlayerNumber'] > 0) {
            $playerDirectory[$player['intPlayerNumber']] = [
                'name' => $player['strName'],
                'team' => $team['strName'],
            ];
        }
    }
    foreach ($team['udtGoaler'] ?? [] as $goalie) {
        if (!empty($goalie['strName']) && $goalie['intPlayerNumber'] > 0) {
            $playerDirectory[$goalie['intPlayerNumber']] = [
                'name' => $goalie['strName'],
                'team' => $team['strName'],
            ];
        }
    }
}

$stars = [];
$starIds = $gameData['Star'] ?? [];

$rank = 1;
foreach ($starIds as $index => $playerId) {
    if ($index === 0 || !is_numeric($playerId) || (int)$playerId === 0) {
        continue;
    }
    $playerId = (int)$playerId;
    if (isset($playerDirectory[$playerId])) {
        $stars[] = [
            'rank' => $rank,
            'name' => $playerDirectory[$playerId]['name'],
            'team' => $playerDirectory[$playerId]['team'],
        ];
        $rank++;
    }
    if ($rank > 3) {
        break;
    }
}

$scoreTitle = sprintf(
    '%s %d – %d %s',
    $homeTeam['strName'],
    (int)$homeTeam['intGF'],
    (int)$awayTeam['intGF'],
    $awayTeam['strName']
);

$homeSkaters = extractPlayers($homeTeam);
$awaySkaters = extractPlayers($awayTeam);
$homeGoalies = extractGoalies($homeTeam);
$awayGoalies = extractGoalies($awayTeam);
$homePossession = calculateZonePossession($homeTeam);
$awayPossession = calculateZonePossession($awayTeam);
$homePeriodDistribution = buildPeriodDistribution($homeTeam);
$awayPeriodDistribution = buildPeriodDistribution($awayTeam);
$periodLabels = determinePeriodLabels($homeTeam['ShotsPerPeriod'] ?? []);

if (empty($periodLabels)) {
    $periodLabels = determinePeriodLabels($awayTeam['ShotsPerPeriod'] ?? []);
}

$maxShotsInPeriod = 0;
foreach ([$homePeriodDistribution, $awayPeriodDistribution] as $distribution) {
    foreach ($distribution as $entry) {
        if ($entry['shots'] > $maxShotsInPeriod) {
            $maxShotsInPeriod = $entry['shots'];
        }
    }
}

$homeShotProfile = aggregateShotSituations($homeSkaters, $homeTeam);
$awayShotProfile = aggregateShotSituations($awaySkaters, $awayTeam);
$homeScore = (int)$homeTeam['intGF'];
$awayScore = (int)$awayTeam['intGF'];
$otFlag = $gameData['booOverTime'] ?? false;
$soFlag = $gameData['booShootOut'] ?? false;
$wentToOT = $otFlag === true || $otFlag === 'True' || $otFlag === 1 || $otFlag === '1';
$wentToSO = $soFlag === true || $soFlag === 'True' || $soFlag === 1 || $soFlag === '1';
$goalsByPeriod = groupGoalsByPeriod($goalEvents, $periodLabels);
$homeLogo = resolveTeamLogo($homeTeam);
$awayLogo = resolveTeamLogo($awayTeam);
$homePalette = (!$isFarm ? getTeamThemePalette((int)($homeTeam['intTeamThemeID'] ?? 0)) : []);
$awayPalette = (!$isFarm ? getTeamThemePalette((int)($awayTeam['intTeamThemeID'] ?? 0)) : []);
$homeGradientStyle = buildTeamGradient($homePalette, '#1f5eff', '#09111f');
$awayGradientStyle = buildTeamGradient($awayPalette, '#ff4d6d', '#09111f');
$homeAbbrBg = colorToRgba($homePalette['dark'] ?? '#09111f', 0.58);
$awayAbbrBg = colorToRgba($awayPalette['dark'] ?? '#09111f', 0.58);
$homeAbbrText = colorToHex($homePalette['text'] ?? '#f5f7fa', '#f5f7fa');
$awayAbbrText = colorToHex($awayPalette['text'] ?? '#f5f7fa', '#f5f7fa');
$homeTeamColor = colorToHex($homePalette['bright'] ?? '#f5f7fa', '#f5f7fa');
$awayTeamColor = colorToHex($awayPalette['bright'] ?? '#f5f7fa', '#f5f7fa');
$homeMetaColor = colorToRgba($homePalette['secondary'] ?? ($homePalette['bright'] ?? '#9db4d3'), 0.72);
$awayMetaColor = colorToRgba($awayPalette['secondary'] ?? ($awayPalette['bright'] ?? '#9db4d3'), 0.72);
$accentColor = colorToHex($homePalette['bright'] ?? ($awayPalette['bright'] ?? '#00c6ff'), '#00c6ff');
$homeAccentColor = colorToHex($homePalette['bright'] ?? $accentColor, $accentColor);
$awayAccentColor = colorToHex($awayPalette['bright'] ?? $accentColor, $accentColor);
$bodyStyleVars = sprintf(
    '--accent:%s;--home-accent:%s;--away-accent:%s;',
    $accentColor,
    $homeAccentColor,
    $awayAccentColor
);
$homeScoreColor = $homeAccentColor;
$scoreboardColumns = buildScoreboardColumns($periodLabels);
$homeGoalsPerPeriod = $homeTeam['GoalsPerPeriod'] ?? [];
$awayGoalsPerPeriod = $awayTeam['GoalsPerPeriod'] ?? [];
$homeShotsPerPeriod = $homeTeam['ShotsPerPeriod'] ?? [];
$awayShotsPerPeriod = $awayTeam['ShotsPerPeriod'] ?? [];
$homePossessionChartData = array_map(static function ($entry) {
    return [
        'label' => $entry['label'],
        'seconds' => (int)$entry['seconds'],
        'time' => formatMinutes((int)$entry['seconds']),
        'percentage' => (float)$entry['percentage'],
    ];
}, $homePossession);
$awayPossessionChartData = array_map(static function ($entry) {
    return [
        'label' => $entry['label'],
        'seconds' => (int)$entry['seconds'],
        'time' => formatMinutes((int)$entry['seconds']),
        'percentage' => (float)$entry['percentage'],
    ];
}, $awayPossession);
$possessionChartsPayload = [
    'home' => [
        'team' => $homeTeam['strName'],
        'abbr' => $homeTeam['strAbbre'],
        'labels' => array_column($homePossessionChartData, 'label'),
        'seconds' => array_column($homePossessionChartData, 'seconds'),
        'time' => array_column($homePossessionChartData, 'time'),
        'percentages' => array_column($homePossessionChartData, 'percentage'),
    ],
    'away' => [
        'team' => $awayTeam['strName'],
        'abbr' => $awayTeam['strAbbre'],
        'labels' => array_column($awayPossessionChartData, 'label'),
        'seconds' => array_column($awayPossessionChartData, 'seconds'),
        'time' => array_column($awayPossessionChartData, 'time'),
        'percentages' => array_column($awayPossessionChartData, 'percentage'),
    ],
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?= htmlspecialchars($pageTitle !== '' ? $pageTitle : $scoreTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Rajdhani:wght@500;700&display=swap');
        :root {
            --primary: #1f5eff;
            --accent: #00c6ff;
            --danger: #ff4d6d;
            --bg-dark: #09111f;
            --card: rgba(11, 22, 43, 0.88);
            --border: rgba(255, 255, 255, 0.08);
            --text: #f5f7fa;
            --muted: #9db4d3;
            --table-header: rgba(255, 255, 255, 0.08);
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            min-height: 100vh;
            padding: 3rem 3.5vw;
            background:
                radial-gradient(circle at 20% 20%, rgba(31, 94, 255, 0.25), transparent 55%),
                radial-gradient(circle at 80% 0%, rgba(0, 198, 255, 0.28), transparent 45%),
                linear-gradient(135deg, #060b19 0%, #101c34 100%);
            color: var(--text);
            font-family: 'Barlow', 'Segoe UI', Arial, sans-serif;
            letter-spacing: 0.01em;
        }
        header {
            margin-bottom: 2.2rem;
        }
        .hero-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        .hero-banner {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
            border-radius: 26px;
            overflow: hidden;
            box-shadow: 0 28px 60px rgba(3, 9, 24, 0.55);
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(9, 17, 31, 0.85);
        }
        .hero-side {
            display: flex;
            align-items: center;
            gap: 1.1rem;
            padding: 2rem 2.4rem;
            background: linear-gradient(135deg, rgba(31, 94, 255, 0.78), rgba(9, 17, 31, 0.95));
        }
        .hero-side.home {
            justify-content: flex-start;
        }
        .hero-side.away {
            justify-content: flex-end;
            text-align: right;
            background: linear-gradient(135deg, rgba(255, 77, 109, 0.78), rgba(9, 17, 31, 0.95));
        }
        .hero-side-content {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }
        .hero-logo {
            width: 76px;
            height: 76px;
            object-fit: contain;
            filter: drop-shadow(0 8px 18px rgba(0, 0, 0, 0.48));
        }
        .hero-abbr {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.3rem 0.9rem;
            border-radius: 999px;
            background: rgba(9, 17, 31, 0.55);
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.16em;
        }
        .hero-team {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.7rem, 2.8vw, 2.4rem);
            font-weight: 700;
            letter-spacing: 0.06em;
        }
        .hero-meta-line {
            font-size: 0.85rem;
            color: var(--muted);
            letter-spacing: 0.08em;
        }
        .hero-score {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 0.75rem;
            padding: 2.4rem 3.5rem;
            background: rgba(9, 17, 31, 0.92);
        }
        .hero-scoreline {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(3.4rem, 6.5vw, 4.8rem);
            font-weight: 700;
            letter-spacing: 0.12em;
        }
        .hero-scoreline span {
            margin: 0 0.45rem;
            color: rgba(255, 255, 255, 0.4);
        }
        .hero-matchup {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: rgba(255, 255, 255, 0.65);
        }
        .hero-tags {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.5rem;
        }
        .chip {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.45rem 1rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.08);
            color: var(--muted);
            font-size: 0.8rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .chip.accent {
            background: rgba(31, 94, 255, 0.38);
            color: #ffffff;
        }
        .matrix-board {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.75rem;
        }
        .matrix-block {
            background: var(--card);
            border-radius: 18px;
            border: 1px solid var(--border);
            padding: 1.65rem;
            box-shadow: 0 18px 45px rgba(4, 10, 22, 0.4);
        }
        .matrix-block h3 {
            margin: 0;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.15rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }
        .matrix-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.1rem;
            font-size: 0.9rem;
        }
        .matrix-table th,
        .matrix-table td {
            padding: 0.65rem 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
        }
        .matrix-table th {
            font-size: 0.75rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.72);
            background: rgba(255, 255, 255, 0.05);
        }
        .matrix-table tbody tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.02);
        }
        .matrix-team {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-align: left;
        }
        .matrix-logo {
            width: 32px;
            height: 32px;
            object-fit: contain;
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.45));
        }
        .matrix-total {
            font-weight: 600;
        }
        .possession-compare {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.25rem;
        }
        .possession-card {
            background: rgba(9, 17, 31, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 1.25rem 1.4rem 1.4rem;
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.02);
        }
        .possession-card h3 {
            margin: 0;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.05rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        .possession-chart {
            width: 100%;
            height: 220px;
        }
        .possession-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }
        .possession-table th,
        .possession-table td {
            padding: 0.45rem 0.35rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-align: left;
        }
        .possession-table th {
            font-size: 0.7rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.65);
        }
        .possession-table td:last-child {
            text-align: right;
        }
        .possession-table tr:last-child td {
            border-bottom: none;
        }
        .score-tabs {
            display: flex;
            gap: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.14);
            padding-bottom: 0.7rem;
            margin: 2.2rem 0 1.4rem;
        }
        .score-tabs .tab {
            position: relative;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: rgba(255, 255, 255, 0.55);
            padding-bottom: 0.25rem;
        }
        .score-tabs .tab.active {
            color: #ffffff;
        }
        .score-tabs .tab.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -0.75rem;
            height: 3px;
            background: var(--accent);
            border-radius: 6px;
        }
        section {
            margin-bottom: 2rem;
            padding: 1.75rem;
            background: var(--card);
            border-radius: 18px;
            border: 1px solid var(--border);
            box-shadow: 0 20px 50px rgba(5, 11, 24, 0.45);
            backdrop-filter: blur(12px);
        }
        section h2 {
            margin-top: 0;
            margin-bottom: 1rem;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.4rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0.85rem;
            font-size: 0.9rem;
            color: var(--text);
        }
        th, td {
            padding: 0.65rem 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            text-align: left;
        }
        th {
            background: var(--table-header);
            font-size: 0.75rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.72);
        }
        tbody tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.03);
        }
        tbody tr:hover {
            background: rgba(31, 94, 255, 0.12);
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
        ol {
            padding-left: 1.25rem;
        }
        ol li {
            margin-bottom: 0.45rem;
            line-height: 1.45;
        }
        .two-col {
            display: grid;
            gap: 1.75rem;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        }
        .team-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 1rem;
        }
        .team-header .team-header-left {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }
        .team-header .mini-logo {
            width: 40px;
            height: 40px;
            object-fit: contain;
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.45));
        }
        .team-header h2 {
            margin: 0;
            font-size: 1.25rem;
            letter-spacing: 0.06em;
        }
        .team-header span {
            color: var(--muted);
            font-size: 0.85rem;
            letter-spacing: 0.08em;
        }
        .stars li {
            margin-bottom: 0.35rem;
            font-weight: 600;
            letter-spacing: 0.06em;
        }
        .empty {
            color: rgba(255, 255, 255, 0.5);
            font-style: italic;
        }
        .heat-table th, .heat-table td {
            text-align: center;
        }
        .heat-cell {
            position: relative;
            background: linear-gradient(90deg, rgba(0, 198, 255, 0.55), rgba(0, 198, 255, 0));
            background-size: calc(var(--intensity, 0) * 100%) 100%;
            background-repeat: no-repeat;
            border-radius: 8px;
            padding: 0.75rem 0.5rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .heat-cell strong {
            display: block;
            font-size: 1.05rem;
            font-family: 'Rajdhani', sans-serif;
        }
        .heat-cell span {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }
        .subtle {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.75rem;
            margin-top: 0.6rem;
        }
        @media (max-width: 768px) {
            body {
                padding: 2.4rem 1.4rem;
            }
            .hero-banner {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .hero-side {
                justify-content: center;
                flex-direction: column;
                text-align: center;
            }
            .hero-side.away {
                flex-direction: column;
            }
            .hero-side.away .hero-side-content {
                order: -1;
            }
            .hero-logo {
                width: 64px;
                height: 64px;
            }
            .hero-score {
                padding: 2rem 1.5rem;
            }
            .matrix-board {
                grid-template-columns: 1fr;
            }
            .score-tabs {
                flex-wrap: wrap;
                gap: 0.9rem;
            }
            .possession-chart {
                height: 200px;
            }
        }
    </style>
</head>
<body style="<?= htmlspecialchars($bodyStyleVars, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
    <header class="hero-wrapper">
        <div class="hero-banner">
            <div class="hero-side home" style="<?= htmlspecialchars('background: ' . $homeGradientStyle . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
                <img src="<?= htmlspecialchars($homeLogo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="<?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" class="hero-logo">
                <div class="hero-side-content">
                    <span class="hero-abbr" style="<?= htmlspecialchars('background: ' . $homeAbbrBg . '; color: ' . $homeAbbrText . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>"><?= htmlspecialchars($homeTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></span>
                    <div class="hero-team" style="<?= htmlspecialchars('color: ' . $homeTeamColor . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>"><?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></div>
                    <span class="hero-meta-line" style="<?= htmlspecialchars('color: ' . $homeMetaColor . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">Tirs <?= (int)$homeTeam['intShotsFor']; ?> · AN <?= htmlspecialchars(formatPowerPlay($homeTeam), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></span>
                </div>
            </div>
            <div class="hero-score">
                <div class="hero-scoreline" style="<?= htmlspecialchars('color: ' . $homeScoreColor . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>"><?= $homeScore; ?><span>-</span><?= $awayScore; ?></div>
                <div class="hero-matchup"><?= htmlspecialchars($homeTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?> vs <?= htmlspecialchars($awayTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></div>
                <div class="hero-tags">
                    <span class="chip">Match #<?= (int)$gameNumber; ?></span>
                    <span class="chip">Saison <?= (int)$leagueYear; ?></span>
                    <span class="chip accent"><?= $isFarm ? 'Farm' : 'Pro'; ?></span>
                    <?php if ($wentToOT) : ?>
                        <span class="chip accent">Prolongation</span>
                    <?php endif; ?>
                    <?php if ($wentToSO) : ?>
                        <span class="chip accent">Tirs de barrage</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="hero-side away" style="<?= htmlspecialchars('background: ' . $awayGradientStyle . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
                <div class="hero-side-content">
                    <span class="hero-abbr" style="<?= htmlspecialchars('background: ' . $awayAbbrBg . '; color: ' . $awayAbbrText . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>"><?= htmlspecialchars($awayTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></span>
                    <div class="hero-team" style="<?= htmlspecialchars('color: ' . $awayTeamColor . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>"><?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></div>
                    <span class="hero-meta-line" style="<?= htmlspecialchars('color: ' . $awayMetaColor . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">Tirs <?= (int)$awayTeam['intShotsFor']; ?> · AN <?= htmlspecialchars(formatPowerPlay($awayTeam), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></span>
                </div>
                <img src="<?= htmlspecialchars($awayLogo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="<?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" class="hero-logo">
            </div>
        </div>
    </header>

    <section class="matrix-board">
        <div class="matrix-block">
            <h3 style="<?= htmlspecialchars('color: ' . $accentColor . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">Buts</h3>
            <?php if (empty($scoreboardColumns)) : ?>
                <p class="empty">Aucune donnée de période.</p>
            <?php else : ?>
                <table class="matrix-table">
                    <thead>
                        <tr>
                            <th>Équipe</th>
                            <?php foreach ($scoreboardColumns as $column) : ?>
                                <th><?= htmlspecialchars($column['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></th>
                            <?php endforeach; ?>
                            <th>T</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="matrix-team">
                                    <img src="<?= htmlspecialchars($homeLogo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="<?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" class="matrix-logo">
                                    <?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
                                </span>
                            </td>
                            <?php foreach ($scoreboardColumns as $column) : ?>
                                <td><?= (int)($homeGoalsPerPeriod[$column['index']] ?? 0); ?></td>
                            <?php endforeach; ?>
                            <td class="matrix-total"><?= $homeScore; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="matrix-team">
                                    <img src="<?= htmlspecialchars($awayLogo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="<?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" class="matrix-logo">
                                    <?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
                                </span>
                            </td>
                            <?php foreach ($scoreboardColumns as $column) : ?>
                                <td><?= (int)($awayGoalsPerPeriod[$column['index']] ?? 0); ?></td>
                            <?php endforeach; ?>
                            <td class="matrix-total"><?= $awayScore; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div class="matrix-block">
            <h3 style="<?= htmlspecialchars('color: ' . $accentColor . ';', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">Tirs</h3>
            <?php if (empty($scoreboardColumns)) : ?>
                <p class="empty">Aucune donnée de période.</p>
            <?php else : ?>
                <table class="matrix-table">
                    <thead>
                        <tr>
                            <th>Équipe</th>
                            <?php foreach ($scoreboardColumns as $column) : ?>
                                <th><?= htmlspecialchars($column['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></th>
                            <?php endforeach; ?>
                            <th>T</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="matrix-team">
                                    <img src="<?= htmlspecialchars($homeLogo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="<?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" class="matrix-logo">
                                    <?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
                                </span>
                            </td>
                            <?php foreach ($scoreboardColumns as $column) : ?>
                                <td><?= (int)($homeShotsPerPeriod[$column['index']] ?? 0); ?></td>
                            <?php endforeach; ?>
                            <td class="matrix-total"><?= (int)($homeTeam['intShotsFor'] ?? array_sum($homeShotsPerPeriod)); ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="matrix-team">
                                    <img src="<?= htmlspecialchars($awayLogo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="<?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" class="matrix-logo">
                                    <?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
                                </span>
                            </td>
                            <?php foreach ($scoreboardColumns as $column) : ?>
                                <td><?= (int)($awayShotsPerPeriod[$column['index']] ?? 0); ?></td>
                            <?php endforeach; ?>
                            <td class="matrix-total"><?= (int)($awayTeam['intShotsFor'] ?? array_sum($awayShotsPerPeriod)); ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </section>

    <nav class="score-tabs">
        <span class="tab active">Résumé</span>
        <span class="tab">Statistiques d'équipe</span>
        <span class="tab">Alignements</span>
        <span class="tab">Play-by-play</span>
        <span class="tab">Play-by-play complet</span>
    </nav>

    <section class="two-col">
        <div>
            <div class="team-header">
                <div class="team-header-left">
                    <img src="<?= htmlspecialchars($homeLogo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="<?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" class="mini-logo">
                    <h2><?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h2>
                </div>
                <span><?= htmlspecialchars($homeTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></span>
            </div>
            <table>
                <tbody>
                    <tr><th>Buts</th><td><?= (int)$homeTeam['intGF']; ?></td></tr>
                    <tr><th>Tirs</th><td><?= (int)$homeTeam['intShotsFor']; ?></td></tr>
                    <tr><th>Avantage numérique</th><td><?= formatPowerPlay($homeTeam); ?></td></tr>
                    <tr><th>Gardien</th><td><?= $homeTeam['strGoalerHTML']; ?></td></tr>
                </tbody>
            </table>
        </div>
        <div>
            <div class="team-header">
                <div class="team-header-left">
                    <img src="<?= htmlspecialchars($awayLogo, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="<?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" class="mini-logo">
                    <h2><?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h2>
                </div>
                <span><?= htmlspecialchars($awayTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></span>
            </div>
            <table>
                <tbody>
                    <tr><th>Buts</th><td><?= (int)$awayTeam['intGF']; ?></td></tr>
                    <tr><th>Tirs</th><td><?= (int)$awayTeam['intShotsFor']; ?></td></tr>
                    <tr><th>Avantage numérique</th><td><?= formatPowerPlay($awayTeam); ?></td></tr>
                    <tr><th>Gardien</th><td><?= $awayTeam['strGoalerHTML']; ?></td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <section>
        <h2>Sommaire des buts</h2>
        <?php if (empty($goalEvents)) : ?>
            <p class="empty">Aucun but répertorié.</p>
        <?php else : ?>
            <?php foreach ($goalsByPeriod as $period) : ?>
                <h3><?= htmlspecialchars($period['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h3>
                <?php if (empty($period['events'])) : ?>
                    <p class="empty">Aucun but.</p>
                <?php else : ?>
                    <ol>
                        <?php foreach ($period['events'] as $text) : ?>
                            <li><?= htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <section>
        <h2>Trois étoiles</h2>
        <?php if (empty($stars)) : ?>
            <p class="empty">Aucune étoile disponible.</p>
        <?php else : ?>
            <ol class="stars">
                <?php foreach ($stars as $star) : ?>
                    <li>
                        <?= (int)$star['rank']; ?>. <?= htmlspecialchars($star['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
                        (<?= htmlspecialchars($star['team'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>)
                    </li>
                <?php endforeach; ?>
            </ol>
        <?php endif; ?>
    </section>

    <section class="two-col">
        <div>
            <h2>Statistiques - <?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>Joueur</th>
                        <th>G</th>
                        <th>A</th>
                        <th>Pts</th>
                        <th>Tirs</th>
                        <th>Mins</th>
                        <th>Diff</th>
                        <th>Pun</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($homeSkaters as $player) : ?>
                        <tr>
                            <td><?= htmlspecialchars($player['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></td>
                            <td><?= (int)$player['intG']; ?></td>
                            <td><?= (int)$player['intA']; ?></td>
                            <td><?= (int)$player['intG'] + (int)$player['intA']; ?></td>
                            <td><?= (int)$player['intShots']; ?></td>
                            <td><?= formatMinutes((int)$player['intMinutePlay']); ?></td>
                            <td><?= (int)$player['intPlusMinus']; ?></td>
                            <td><?= (int)$player['intPim']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($homeGoalies as $goalie) : ?>
                        <tr>
                            <td><?= htmlspecialchars($goalie['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?> (G)</td>
                            <td><?= (int)$goalie['intGA']; ?></td>
                            <td><?= (int)$goalie['intA']; ?></td>
                            <td><?= (int)$goalie['intGA'] + (int)$goalie['intA']; ?></td>
                            <td><?= (int)$goalie['intSA']; ?></td>
                            <td><?= formatMinutes((int)$goalie['intMinPlay']); ?></td>
                            <td>—</td>
                            <td><?= (int)$goalie['intPim']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div>
            <h2>Statistiques - <?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>Joueur</th>
                        <th>G</th>
                        <th>A</th>
                        <th>Pts</th>
                        <th>Tirs</th>
                        <th>Mins</th>
                        <th>Diff</th>
                        <th>Pun</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($awaySkaters as $player) : ?>
                        <tr>
                            <td><?= htmlspecialchars($player['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></td>
                            <td><?= (int)$player['intG']; ?></td>
                            <td><?= (int)$player['intA']; ?></td>
                            <td><?= (int)$player['intG'] + (int)$player['intA']; ?></td>
                            <td><?= (int)$player['intShots']; ?></td>
                            <td><?= formatMinutes((int)$player['intMinutePlay']); ?></td>
                            <td><?= (int)$player['intPlusMinus']; ?></td>
                            <td><?= (int)$player['intPim']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($awayGoalies as $goalie) : ?>
                        <tr>
                            <td><?= htmlspecialchars($goalie['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?> (G)</td>
                            <td><?= (int)$goalie['intGA']; ?></td>
                            <td><?= (int)$goalie['intA']; ?></td>
                            <td><?= (int)$goalie['intGA'] + (int)$goalie['intA']; ?></td>
                            <td><?= (int)$goalie['intSA']; ?></td>
                            <td><?= formatMinutes((int)$goalie['intMinPlay']); ?></td>
                            <td>—</td>
                            <td><?= (int)$goalie['intPim']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="two-col">
        <div>
            <h2>Possession de rondelle par zone</h2>
            <div class="possession-compare">
                <div class="possession-card">
                    <h3><?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?> (<?= htmlspecialchars($homeTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>)</h3>
                    <div class="possession-chart">
                        <canvas id="homePossessionChart"></canvas>
                    </div>
                    <table class="possession-table">
                        <thead>
                            <tr>
                                <th>Zone</th>
                                <th>Temps</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($homePossession as $entry) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($entry['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></td>
                                    <td><?= formatMinutes($entry['seconds']); ?></td>
                                    <td><?= number_format($entry['percentage'], 1); ?>%</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="possession-card">
                    <h3><?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?> (<?= htmlspecialchars($awayTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>)</h3>
                    <div class="possession-chart">
                        <canvas id="awayPossessionChart"></canvas>
                    </div>
                    <table class="possession-table">
                        <thead>
                            <tr>
                                <th>Zone</th>
                                <th>Temps</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($awayPossession as $entry) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($entry['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></td>
                                    <td><?= formatMinutes($entry['seconds']); ?></td>
                                    <td><?= number_format($entry['percentage'], 1); ?>%</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <p class="subtle">* Basé sur <code>PuckTimeControlinZone</code>. Mesure le temps de possession réel avec la rondelle dans chaque territoire.</p>
        </div>
        <div>
            <h2>Volume de tirs par situation</h2>
            <table>
                <thead>
                    <tr>
                        <th>Situation</th>
                        <th><?= htmlspecialchars($homeTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></th>
                        <th><?= htmlspecialchars($awayTeam['strAbbre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total (filet cadré)</td>
                        <td><?= $homeShotProfile['shots']; ?></td>
                        <td><?= $awayShotProfile['shots']; ?></td>
                    </tr>
                    <tr>
                        <td>5c5 / temps égal</td>
                        <td><?= $homeShotProfile['shots_ev']; ?></td>
                        <td><?= $awayShotProfile['shots_ev']; ?></td>
                    </tr>
                    <tr>
                        <td>Avantage numérique</td>
                        <td><?= $homeShotProfile['shots_pp']; ?></td>
                        <td><?= $awayShotProfile['shots_pp']; ?></td>
                    </tr>
                    <tr>
                        <td>Désavantage numérique</td>
                        <td><?= $homeShotProfile['shots_pk']; ?></td>
                        <td><?= $awayShotProfile['shots_pk']; ?></td>
                    </tr>
                    <tr>
                        <td>Lancers ratés</td>
                        <td><?= $homeShotProfile['missed']; ?></td>
                        <td><?= $awayShotProfile['missed']; ?></td>
                    </tr>
                    <tr>
                        <td>Tirs adverses bloqués</td>
                        <td><?= $homeShotProfile['blocked_for']; ?></td>
                        <td><?= $awayShotProfile['blocked_for']; ?></td>
                    </tr>
                    <tr>
                        <td>Mises en échec (données / reçues)</td>
                        <td><?= $homeShotProfile['hits']; ?> / <?= $homeShotProfile['hits_taken']; ?></td>
                        <td><?= $awayShotProfile['hits']; ?> / <?= $awayShotProfile['hits_taken']; ?></td>
                    </tr>
                </tbody>
            </table>
            <p class="subtle">* Dérivé des stats individuelles (<code>udtPlayer</code>). Offre un aperçu rapide des tendances offensives/physiques.</p>
        </div>
    </section>

    <section>
        <h2>Pression de tir par période</h2>
        <table class="heat-table">
            <thead>
                <tr>
                    <th>Équipe</th>
                    <?php foreach ($periodLabels as $label) : ?>
                        <th><?= htmlspecialchars($label, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($homeTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></td>
                    <?php foreach ($periodLabels as $index => $label) : ?>
                        <?php $entry = $homePeriodDistribution[$index] ?? ['shots' => 0, 'goals' => 0]; ?>
                        <?php $intensity = computeHeatIntensity($entry['shots'], $maxShotsInPeriod); ?>
                        <td class="heat-cell" style="--intensity: <?= $intensity; ?>;">
                            <strong><?= $entry['shots']; ?></strong>
                            <span><?= $entry['goals']; ?> buts</span>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?= htmlspecialchars($awayTeam['strName'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></td>
                    <?php foreach ($periodLabels as $index => $label) : ?>
                        <?php $entry = $awayPeriodDistribution[$index] ?? ['shots' => 0, 'goals' => 0]; ?>
                        <?php $intensity = computeHeatIntensity($entry['shots'], $maxShotsInPeriod); ?>
                        <td class="heat-cell" style="--intensity: <?= $intensity; ?>;">
                            <strong><?= $entry['shots']; ?></strong>
                            <span><?= $entry['goals']; ?> buts</span>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
        <p class="subtle">* Fond bleu = pression de tir relative (max de la rencontre). Permet d’identifier rapidement les périodes dominées par chaque club.</p>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script>
        (function () {
            const payload = <?= json_encode($possessionChartsPayload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
            if (!payload || !window.Chart) {
                return;
            }

            Chart.defaults.font = Chart.defaults.font || {};
            Chart.defaults.font.family = "'Barlow', 'Segoe UI', system-ui, sans-serif";
            Chart.defaults.color = '#f5f7fa';

            const homePalette = ['#1f5eff', '#00c6ff', '#13c2b7'];
            const awayPalette = ['#ff4d6d', '#ff8a5c', '#ffc34d'];

            function createPossessionChart(canvasId, dataset, palette) {
                const canvas = document.getElementById(canvasId);
                if (!canvas) {
                    return;
                }

                new Chart(canvas.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: dataset.labels,
                        datasets: [{
                            data: dataset.seconds,
                            backgroundColor: palette,
                            borderColor: '#060b19',
                            hoverOffset: 10,
                            meta: dataset
                        }]
                    },
                    options: {
                        responsive: true,
                        cutout: '58%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    color: '#f5f7fa',
                                    boxWidth: 18,
                                    padding: 16
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (context) {
                                        const meta = context.dataset.meta || {};
                                        const index = context.dataIndex;
                                        const pct = meta.percentages && meta.percentages[index] !== undefined
                                            ? meta.percentages[index].toFixed(1)
                                            : '0.0';
                                        const time = meta.time && meta.time[index] ? meta.time[index] : '0:00';
                                        return `${context.label}: ${pct}% (${time})`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            createPossessionChart('homePossessionChart', payload.home, homePalette);
            createPossessionChart('awayPossessionChart', payload.away, awayPalette);
        })();
    </script>
</body>
</html>

