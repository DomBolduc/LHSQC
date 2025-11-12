// Assurez-vous que cette fonction existe pour récupérer les données

async function fetch_teams_stats() {

    const response = await fetch('../../components/sql/fetch_team_stats.php');

    const data = await response.json();

    if (data.error) {

        console.error(data.error);

    } else {

        return data; // Retourne les données des équipes

    }

}



// Fonction pour construire et afficher le tableau

async function displayTeamStandings() {

    const allProTeamStats = await fetch_teams_stats(); // Récupère les données depuis PHP



    if (!allProTeamStats || allProTeamStats.length === 0) {

        console.error("No team stats available.");

        document.getElementById('standings-container').innerHTML = "<p>No data available.</p>";

        return;

    }



    // Trier les équipes par Points, puis par différence de buts

    const sortedTeams = allProTeamStats.sort((a, b) =>

        b.Points - a.Points || (b.GF - b.GA) - (a.GF - a.GA)

    );



    // Construire le tableau HTML

    const table = `

        <table class="table table-striped table-dark table-bordered text-center">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Team</th>

                    <th>GP</th>

                    <th>W</th>

                    <th>L</th>

                    <th>PTS</th>

                    <th>+/-</th>

                </tr>

            </thead>

            <tbody>

                ${sortedTeams.map((team, index) => `

                    <tr>

                        <td>${index + 1}</td>

                        <td>${team.Name}</td>

                        <td>${team.GP}</td>

                        <td>${team.W}</td>

                        <td>${team.L}</td>

                        <td>${team.Points}</td>

                        <td>${team.GF - team.GA}</td>

                    </tr>

                `).join('')}

            </tbody>

        </table>

    `;



    // Ajouter le tableau au conteneur HTML

    document.getElementById('standings-container').innerHTML = table;

}



// Charger les données et afficher le tableau après le chargement de la page

document.addEventListener('DOMContentLoaded', displayTeamStandings);

