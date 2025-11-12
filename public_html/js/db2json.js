

// Global Data Variables

//  DB Tables

let GoalerInfo = [];

let GoalerProStat = [];

let PlayerInfo = [];

let PlayerProStat = [];

let TeamProInfo = [];

let allProTeamStats = [];

let allProTeamLines = [];

let leagueGeneral = [];



//Assembled Data

let playersInfoStat = [];







//  SQL Queries function



async function fetch_goalerInfo() {



    const response = await fetch('components/sql/fetch_goalerInfo.php');

    const data = await response.json();

    if (data.error) { console.error(data.error); }

    else { GoalerInfo = data; console.log("GoalerInfo", GoalerInfo);   }

}



async function fetch_goalerProStat() {



    const response = await fetch('components/sql/fetch_goalerProStat.php');

    const data = await response.json();

    if (data.error) { console.error(data.error); }

    else { GoalerProStat = data; console.log("GoalerProStat", GoalerProStat);   }

}



async function fetch_players_info() {



    const response = await fetch('components/sql/fetch_player_info.php');

    const data = await response.json();

    if (data.error) { console.error(data.error); }

    else { PlayerInfo = data; console.log("PlayerInfo", PlayerInfo);   }

}



async function fetch_players_stats() {

    const response = await fetch('components/sql/fetch_player_pro_stats.php');

    const data = await response.json();

    if (data.error) { console.error(data.error); }

    else {   PlayerProStat = data; console.log("PlayerProStat", PlayerProStat);  }

}





async function fetch_teams_info() {

    const response = await fetch('components/sql/fetch_team_info.php');

    const data = await response.json();

    if (data.error) {  console.error(data.error);     }

    else {  TeamProInfo = data; console.log("TeamProInfo", TeamProInfo);   }

}



async function fetch_teams_stats() {

    const response = await fetch('components/sql/fetch_team_stats.php');

    const data = await response.json();

    if (data.error) {   console.error(data.error);    }

    else { allProTeamStats = data;    console.log("ProTeamStats", allProTeamStats);  }

}



async function fetch_teams_lines() {

    const response = await fetch('components/sql/fetch_team_lines.php');

    const data = await response.json();

    if (data.error) {  console.error(data.error);     }

    else {  allProTeamLines = data;  console.log("ProLines", allProTeamLines);   }

}





async function fetch_leagueGeneral() {

    const response = await fetch('components/sql/fetch_leagueGeneral.php');

    const data = await response.json();

    if (data.error) { console.error(data.error);    }

    else { leagueGeneral = data; console.log("leagueGeneral", leagueGeneral);   }

}





//  Data Assembling function



function getPlayersInfoStat() {

    // TODO    rajouter un try n catch ici pour envoyer "" si nothing found

    const data = PlayerProStat.map(playerStat => {

        const playerInfo = PlayerInfo.find(player => player.Number === playerStat.Number);

        const teamInfo = TeamProInfo.find(team => team.Number === playerInfo.Team);

        

        return {

                G: playerStat.G,

                A: playerStat.A,

                P: playerStat.P,

                GP: playerStat.GP,

                PosD: playerInfo.PosD,

                Name: playerStat.Name,

                Number: playerStat.Number,

                Abbre: teamInfo ? teamInfo.Abbre : "N/A" ,

                TeamThemeID: teamInfo ? teamInfo.TeamThemeID : "N/A",

                NHLID: playerInfo.NHLID,

                Team: playerInfo.Team, 

                Rookie: playerInfo.Rookie

                };

    })

    

    playersInfoStat = data;

    return data;

}

    

   

    











//  Main Functions





async function getAllInfos() 

{

    await fetch_leagueGeneral()

    await fetch_teams_info()

    await fetch_teams_lines() 

    await fetch_teams_stats()

    await fetch_players_info() // Call filterPlayers with the desired ID to filter and display data

    await fetch_players_stats()

    await fetch_goalerInfo()

    await fetch_goalerProStat()



    await getPlayersInfoStat()

}







//  MUST BE CALLED BY USER

async function updateInfos(callback) { 

    await getAllInfos(); 

    console.log('All DB tables converted to json.  Launching field update callback.')

    if (callback && typeof callback === 'function') { callback(); }

}

















//helper functions



const ProMinimumGamePlayerLeader = 5;    //  TODO   reprendre la valeur dans la BD au lieu de cette variable dupliqué





function getLeaders()

{

    const sortedPlayers = playersInfoStat.filter(player => 

        player.GP >= ProMinimumGamePlayerLeader && 

        player.Team > 0 && 

        player.P > 0 

    ).sort((a, b) => b.P - a.P || b.G - a.G || a.GP - b.GP).slice(0, 5);



    return sortedPlayers;

}





function getTop5Scorer()

{

    const sortedPlayers = playersInfoStat.filter(player => 

        player.GP >= ProMinimumGamePlayerLeader && 

        player.Team > 0 && 

        player.G > 0 

    ).sort((a, b) => b.G - a.G || a.GP - b.GP).slice(0, 5);



    return sortedPlayers;

}





function getGoalerLeaders()

{

    // Calculate PCT and filter the data

    let filteredGoalers = GoalerProStat.map(goalStat => {

        const goalerInfo = GoalerInfo.find(goal => goal.Number === goalStat.Number);

        const teamInfo = TeamProInfo.find(team => team.Number === goalerInfo.Team);

        

        // Calculate PCT

        const PCT = parseFloat(((goalStat.SA - goalStat.GA) / goalStat.SA).toFixed(3));

        

        return {

                PCT: PCT,

                W: goalStat.W,

                SecondPlay: goalStat.SecondPlay,

                Name: goalStat.Name,

                Number: goalStat.Number,

                Abbre: teamInfo ? teamInfo.Abbre : "N/A",

                TeamThemeID: teamInfo ? teamInfo.TeamThemeID : "N/A",

                NHLID: goalerInfo.NHLID,

                Team: goalerInfo.Team

            };

    }).filter(goalStat => 

        goalStat.SecondPlay >= (ProMinimumGamePlayerLeader * 3600) && 

        goalStat.Team > 0 && 

        goalStat.PCT > 0

    ).sort((a, b) => b.PCT - a.PCT || b.W - a.W).slice(0, 5);



    return filteredGoalers;



}





function getTop5Defenses()

{  

    const filteredPlayers = playersInfoStat.filter(player => 

        player.PosD == 'True' && 

        player.Team > 0 && 

        player.P > 0

    ).sort((a, b) => b.P - a.P || b.G - a.G || a.GP - b.GP).slice(0, 5);



    return (filteredPlayers)

}





function getTop5Rookies()

{

    const filteredPlayers = playersInfoStat.filter(player => 

        player.Rookie == 'True' && 

        player.Team > 0 && 

        player.P > 0

    ).sort((a, b) => b.P - a.P || b.G - a.G || a.GP - b.GP).slice(0, 5);



    return (filteredPlayers)

}









