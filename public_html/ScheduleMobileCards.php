<script>
/**
 * Script JavaScript pour transformer le tableau Schedule en cartes mobiles
 * Style moderne inspiré de NHL/ESPN
 */

document.addEventListener('DOMContentLoaded', function() {
    // Ne s'exécuter que sur mobile
    if (window.innerWidth <= 768) {
        transformTableToCards();
    }

    // Écouter les changements de taille d'écran
    window.addEventListener('resize', function() {
        if (window.innerWidth <= 768) {
            transformTableToCards();
        }
    });
});

function transformTableToCards() {
    const table = document.querySelector('.STHSPHPSchedule_ScheduleTable');
    const mobileContainer = document.querySelector('.schedule-mobile-cards');

    if (!table || !mobileContainer) return;

    // Vider le container mobile
    mobileContainer.innerHTML = '';

    // Récupérer les headers pour savoir quelle colonne correspond à quoi
    const headers = Array.from(table.querySelectorAll('thead th')).map(th => th.textContent.trim());

    // Récupérer toutes les lignes de données
    const rows = table.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length === 0) return;

        // Extraire les données de chaque cellule
        const rowData = {};
        cells.forEach((cell, index) => {
            if (headers[index]) {
                rowData[headers[index]] = cell.textContent.trim();
                rowData[headers[index] + '_html'] = cell.innerHTML;
            }
        });

        // Créer la carte
        const card = createGameCard(rowData);
        mobileContainer.appendChild(card);
    });
}

function createGameCard(data) {
    const card = document.createElement('div');
    card.className = 'schedule-game-card';

    // Déterminer le statut du match
    // Chercher les colonnes de score (il peut y en avoir plusieurs)
    let visitorScore = '';
    let homeScore = '';

    // Parcourir les données pour trouver les scores
    Object.keys(data).forEach(key => {
        if (key.includes('Score') && data[key] && data[key] !== '-') {
            if (!visitorScore) {
                visitorScore = data[key];
            } else if (!homeScore) {
                homeScore = data[key];
            }
        }
    });

    const hasScores = visitorScore !== '' && homeScore !== '' && visitorScore !== '-' && homeScore !== '-';

    let statusClass = 'upcoming';
    let statusText = 'À venir';

    if (hasScores) {
        statusClass = 'final';
        statusText = 'Terminé';
    }

    card.classList.add(statusClass);

    // Header de la carte
    const header = document.createElement('div');
    header.className = 'game-header';

    const gameInfo = document.createElement('div');
    gameInfo.className = 'game-info';
    gameInfo.textContent = `${data['Day'] || 'Jour'} - Match #${data['Game'] || ''}`;

    const gameStatus = document.createElement('div');
    gameStatus.className = `game-status ${statusClass}`;
    gameStatus.textContent = statusText;

    header.appendChild(gameInfo);
    header.appendChild(gameStatus);

    // Matchup principal
    const matchup = document.createElement('div');
    matchup.className = 'game-matchup';

    // Équipe visiteuse
    const visitorSection = document.createElement('div');
    visitorSection.className = 'team-section visitor';

    const visitorName = document.createElement('div');
    visitorName.className = 'team-name';
    // Chercher le nom de l'équipe visiteuse dans différentes colonnes possibles
    visitorName.textContent = data['Visitor Team'] || data['VisitorTeam'] || data['Équipe Visiteur'] || '';

    visitorSection.appendChild(visitorName);

    if (hasScores && visitorScore) {
        const visitorScoreEl = document.createElement('div');
        visitorScoreEl.className = 'team-score';
        visitorScoreEl.textContent = visitorScore;
        visitorSection.appendChild(visitorScoreEl);
    }

    // Séparateur
    const separator = document.createElement('div');
    separator.className = 'vs-separator';
    separator.textContent = '@';

    // Équipe locale
    const homeSection = document.createElement('div');
    homeSection.className = 'team-section home';

    if (hasScores && homeScore) {
        const homeScoreEl = document.createElement('div');
        homeScoreEl.className = 'team-score';
        homeScoreEl.textContent = homeScore;
        homeSection.appendChild(homeScoreEl);
    }

    const homeName = document.createElement('div');
    homeName.className = 'team-name';
    // Chercher le nom de l'équipe locale dans différentes colonnes possibles
    homeName.textContent = data['Home Team'] || data['HomeTeam'] || data['Équipe Locale'] || '';

    homeSection.appendChild(homeName);

    matchup.appendChild(visitorSection);
    matchup.appendChild(separator);
    matchup.appendChild(homeSection);

    // Badges pour OT, SO, Rivalry
    const badges = [];
    if (data['OT'] === '1' || data['OT'] === 'Yes') {
        badges.push('<span class="game-badge badge-ot">OT</span>');
    }
    if (data['SO'] === '1' || data['SO'] === 'Yes') {
        badges.push('<span class="game-badge badge-so">SO</span>');
    }
    if (data['RI'] === '1' || data['RI'] === 'Yes') {
        badges.push('<span class="game-badge badge-rivalry">Rivalité</span>');
    }

    let badgesContainer = null;
    if (badges.length > 0) {
        badgesContainer = document.createElement('div');
        badgesContainer.className = 'game-badges';
        badgesContainer.innerHTML = badges.join('');
    }

    // Lien vers le match
    let gameLink = null;
    if (data['Link'] && data['Link'] !== 'None' && data['Link'].includes('href')) {
        gameLink = document.createElement('div');
        gameLink.innerHTML = data['Link_html'] || data['Link'];
        const linkEl = gameLink.querySelector('a');
        if (linkEl) {
            linkEl.className = 'game-link';
            linkEl.innerHTML = '📊';
            linkEl.title = 'Voir le match';
        }
    }

    // Assembler la carte
    card.appendChild(header);
    card.appendChild(matchup);
    if (badgesContainer) {
        card.appendChild(badgesContainer);
    }
    if (gameLink && gameLink.querySelector('a')) {
        card.appendChild(gameLink.querySelector('a'));
    }

    return card;
}
</script>
