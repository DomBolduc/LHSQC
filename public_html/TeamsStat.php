<?php include "Header.php"; ?>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
</head>
<body>
<?php include "Menu.php";?>

<div class="dataTables_wrapper container p-0 m-0">
    
    <div id="title" class="m-4 mb-1"><h1> Team Stats </h1></div>
  
    <div class='row'>
        <div id="toggleTeams" class="dropdown mx-4">
            <button class="btn btn-warning dropdown-toggle" type="button" id="toggleTeamsButton" data-bs-toggle="dropdown" aria-expanded="false">Select Teams </button>
            <ul class="dropdown-menu dropdown-menu-teams" aria-labelledby="toggleTeamsButton"> <!-- Checkboxes will be dynamically added here -->        </ul>
        </div>

        
        <div id="toggleColumns" class="dropdown mx-4" >
            <button class="btn btn-warning dropdown-toggle" type="button" id="toggleColumnsButton" data-bs-toggle="dropdown" aria-expanded="false">Select Columns </button>
            <ul class="dropdown-menu dropdown-menu-cols" aria-labelledby="toggleColumnsButton"> <!-- Checkboxes will be dynamically added here -->        </ul>
        </div>
    </row>



    <table id="teamStatsTable" class="display m-4 p-1"> </table>
</div>

<script>
$(document).ready(function() {

    let teamsInfo;

    function calculateStats(teamsInfo) {
    return teamsInfo.map(team => {
        // Vérifier si les valeurs sont récupérées correctement
        const ppGoal = parseFloat(team.PPGoal) || 0;
        const ppAttempt = parseFloat(team.PPAttemp) || 1; // Pour éviter une division par zéro
        team.PPP = ((ppGoal / ppAttempt) * 100).toFixed(2);

        const pkGoalGA = parseFloat(team.PKGoalGA) || 0;
        const pkAttempt = parseFloat(team.PKAttemp) || 1; // Éviter division par zéro

        // 🛠 Debug : Afficher les valeurs dans la console
        console.log(`Team: ${team.OrderName}, PKgoalGA: ${pkGoalGA}, PKAttemp: ${pkAttempt}`);

        if (pkAttempt === 0) {
            team.PKP = "N/A"; // Si aucune tentative en PK, on affiche N/A
        } else {
            team.PKP = (100 - ((pkGoalGA / pkAttempt) * 100)).toFixed(2);
        }

        return team;
    });
}




    function initTable() {

    // Dynamically generate columns array with default visibility
    const defaultVisibleKeys = [ "OrderName", "GP", "W", "L", "OTW", "SOW", "SOL","GF", "GA","Points", "ShotsFor", "ShotsAga" , "ShotsBlock", "Pim", "Hits", "PPP", "PKP" ]; // Ajout de PKP

    const columns = Object.keys(teamsInfo[0]).map((key) => {
    const isVisible = defaultVisibleKeys.includes(key);
    return {
        title: key,
        data: key,
        visible: isVisible, 
        render: key === "PPP" || key === "PKP" ? function (data, type, row) {
            return `${data} %`; // Ajoute un pourcentage pour PPP et PKP
        } : undefined,
    };
});





 
    // Initialize the DataTable
    const table = $('#teamStatsTable').DataTable({
        paging: false,
        data: teamsInfo,
        columns: columns,
        autoWidth: false, // Disable automatic column width expansion
    });


    // Dynamically generate toggle checkboxes
    const toggleColumnsDiv = document.getElementById("toggleColumns");
    const colsDropdownMenu = toggleColumnsDiv.querySelector(".dropdown-menu-cols"); 

    columns.forEach((col, index) => {
       
        const listItem = document.createElement("li");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.className = "form-check-input";
        checkbox.id = `toggle-column-${index}`;
        checkbox.dataset.column = index; // Set column index
        checkbox.checked = col.visible; // Sync with column visibility

        const label = document.createElement("label");
        label.className = "form-check-label";
        label.htmlFor = `toggle-column-${index}`;
        label.textContent = col.title;

        listItem.appendChild(checkbox);
        listItem.appendChild(label);
        colsDropdownMenu.appendChild(listItem);

        // Add event listener for toggling column visibility
        checkbox.addEventListener("change", function () {
            const column = table.column(index);
            column.visible(this.checked); // Sync visibility with checkbox state
        });
    });




    // Dynamically generate toggle checkboxes for teams
    const toggleTeamsDiv = document.getElementById("toggleTeams"); 
    const teamsDropdownMenu = toggleTeamsDiv.querySelector(".dropdown-menu-teams");
    
    teamsInfo.forEach((team, index) => {
       
       const listItem = document.createElement("li");

       const checkbox = document.createElement("input");
       checkbox.type = "checkbox";
       checkbox.className = "form-check-input";
       checkbox.id = `toggle-team-${index}`;
       checkbox.dataset.team = team.Name; // Set team name
   
       const label = document.createElement("label");
       label.className = "form-check-label";
       label.htmlFor = `toggle-team-${index}`;
       label.textContent = team.Name

       listItem.appendChild(checkbox);
       listItem.appendChild(label);
       teamsDropdownMenu.appendChild(listItem);

       // Add event listener for toggling team visibility
       checkbox.addEventListener("change", function () {
           
        filterTable();
       });
   });

   // Function to filter table based on selected teams 
   function filterTable() { 
        const selectedTeams = []; 
        teamsDropdownMenu.querySelectorAll(".form-check-input:checked").forEach((checkbox) => { 
            selectedTeams.push(checkbox.dataset.team); 
        }); 
        console.log(selectedTeams)
        // Filter table data based on selected teams 
        const filteredData = teamsInfo.filter((item) => selectedTeams.includes(item.Name)); 
      
        table.clear().rows.add(filteredData.length ? filteredData : teamsInfo).draw(); 
    }


}

    // Add click event for column visibility toggle
    document.querySelectorAll('a.toggle-vis').forEach((el) => {
        el.addEventListener('click', function (e) {
            e.preventDefault();

            const columnIdx = e.target.getAttribute('data-column');
            const column = table.column(columnIdx);

            column.visible(!column.visible());
        });
    });



    async function fetch_teamStats(successCallback = null) { 
    const response = await fetch('TeamsInfo_fetch.php'); 
    const data = await response.json(); 
    if (data.error) { 
        console.error(data.error); 
    } else { 
        teamsInfo = calculateStats(data); // 🆕 Calcul du PPP & PKP
        console.log("teamsInfo", teamsInfo);  
        if (successCallback) successCallback();
    } 
}



    fetch_teamStats(initTable);

});
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

<?php include "Footer.php"; ?>

