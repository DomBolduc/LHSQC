<?php include "Header.php"; ?>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<style>
/* Styles pour le menu déroulant d'équipe */
.team-filter-container {
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.team-filter-container label {
    color: #495057;
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}

.team-filter-container select {
    border: 2px solid #ced4da;
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.team-filter-container select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
}

.team-filter-container button {
    background: #007bff;
    border: none;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 500;
    transition: background-color 0.3s ease;
}

.team-filter-container button:hover {
    background: #0056b3;
    transform: translateY(-1px);
}

/* Amélioration des liens de lettres */
#letter-links {
    margin: 20px 0;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    text-align: center;
}

#letter-links a {
    display: inline-block;
    margin: 0 5px;
    padding: 8px 12px;
    background: #e9ecef;
    color: #495057;
    text-decoration: none;
    border-radius: 4px;
    transition: all 0.3s ease;
    font-weight: 500;
}

#letter-links a:hover {
    background: #007bff;
    color: white;
    transform: translateY(-2px);
}

#letter-links a.active {
    background: #007bff;
    color: white;
}

#letter-links a.all-letters {
    background: #28a745;
    color: white;
    font-weight: 600;
    margin-right: 15px;
    border: 2px solid #28a745;
}

#letter-links a.all-letters:hover {
    background: #218838;
    border-color: #218838;
    transform: translateY(-2px);
}

#letter-links a.all-letters.active {
    background: #218838;
    border-color: #218838;
    box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
}

/* Amélioration du tableau */
.table {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.table thead th {
    background: #343a40;
    color: white;
    border: none;
    padding: 12px 8px;
    font-weight: 600;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
}

/* Responsive design */
@media (max-width: 768px) {
    .team-filter-container select {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .team-filter-container button {
        width: 100%;
    }
    
    #letter-links a {
        margin: 2px;
        padding: 6px 8px;
        font-size: 12px;
    }
}

/* Styles pour l'édition en lot */
.edit-all-container {
    background: #e8f5e8;
    border: 2px solid #28a745;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
}

.edit-all-container button {
    background: #28a745;
    border: none;
    color: white;
    padding: 12px 24px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
}

.edit-all-container button:hover {
    background: #218838;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(40, 167, 69, 0.4);
}

.edit-all-container button:active {
    transform: translateY(0);
}

.edit-all-container button:disabled {
    background: #6c757d;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

#editAllStatus {
    font-weight: 500;
}

#editAllStatus.success {
    color: #28a745;
}

#editAllStatus.error {
    color: #dc3545;
}

/* Amélioration des champs de saisie */
.table input[type="number"], .table input[type="url"] {
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 4px 8px;
    font-size: 12px;
    width: 100%;
    transition: border-color 0.3s ease;
}

.table input[type="number"]:focus, .table input[type="url"]:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
}

/* Style pour les boutons d'édition individuels */
.SubmitButtonSmall {
    background: #007bff;
    border: none;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 11px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.SubmitButtonSmall:hover {
    background: #0056b3;
}

/* Style spécifique pour le bouton Auto-fill NHL ID */
#autoFillNhlIdBtn {
    background: #17a2b8;
    box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
}

#autoFillNhlIdBtn:hover {
    background: #138496;
    box-shadow: 0 6px 12px rgba(23, 162, 184, 0.4);
}

#autoFillNhlIdBtn:disabled {
    background: #6c757d;
    box-shadow: none;
}
</style>

<?php
$Team = (integer)-1; /* -1 All Team */
$Title = (string)"";
$InformationMessage = (string)"";

If (file_exists($DatabaseFile) == false){	Goto STHSErrorPlayerInfo; }else{
try{

	$Type = (integer)0; /* 0 = All / 1 = Pro / 2 = Farm */

	$TypeQuery = "Number > 0";
	$TeamQuery = "Team >= 0";
	$LeagueName = (string)"";
	$PlayerNumber = (integer)0;
	$PlayerName = (string)"";	
	$PlayerDraftYear = (integer)0;
	$PlayerDraftOverallPick = (integer)0;
	$PlayerNHLID = (integer)0;
	$PlayerJersey = (integer)0;
	$PlayerLink = (string)"";

	if(isset($_GET['Type'])){$Type = filter_var($_GET['Type'], FILTER_SANITIZE_NUMBER_INT);} 
	if(isset($_GET['Team'])){$Team = filter_var($_GET['Team'], FILTER_SANITIZE_NUMBER_INT);}


	$db = new SQLite3($DatabaseFile);


    // Fetch league name 
    $LeagueGeneral = $db->querySingle("SELECT Name FROM LeagueGeneral", true); 
    $LeagueName = $LeagueGeneral['Name'];

    // Récupération de toutes les équipes pour le menu déroulant
    $TeamsQuery = "SELECT Number, Name FROM TeamProInfo ORDER BY Name ASC";
    $TeamsResult = $db->query($TeamsQuery);
    $Teams = [];
    while ($team = $TeamsResult->fetchArray(SQLITE3_ASSOC)) {
        $Teams[] = $team;
    }

  
    if ($CookieTeamNumber > 0 AND $CookieTeamNumber <= 102){

        if(isset($_POST['TeamEdit'])){$TeamEdit = filter_var($_POST['TeamEdit'], FILTER_SANITIZE_NUMBER_INT);}

        if ($TeamEdit == $CookieTeamNumber){	

            // Gestion de l'édition en lot
            if(isset($_POST['bulkEdit']) && $_POST['bulkEdit'] == '1' && isset($_POST['players'])) {
                $bulkSuccess = 0;
                $bulkErrors = 0;
                
                foreach($_POST['players'] as $playerNumber => $playerData) {
                    try {
                        $PlayerNumber = (int)$playerNumber;
                        $PlayerName = filter_var($playerData['Name'], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW || FILTER_FLAG_STRIP_HIGH || FILTER_FLAG_NO_ENCODE_QUOTES || FILTER_FLAG_STRIP_BACKTICK);
                        $PlayerDraftYear = filter_var($playerData['DraftYear'], FILTER_SANITIZE_NUMBER_INT);
                        $PlayerDraftYear = ($PlayerDraftYear >= 1900 && $PlayerDraftYear <= date('Y')) ? (int)$PlayerDraftYear : 0;
                        $PlayerDraftOverallPick = filter_var($playerData['DraftOverallPick'], FILTER_SANITIZE_NUMBER_INT);
                        $PlayerDraftOverallPick = empty($PlayerDraftOverallPick) ? 0 : $PlayerDraftOverallPick;
                        $PlayerNHLID = filter_var($playerData['NHLID'], FILTER_SANITIZE_NUMBER_INT);
                        $PlayerNHLID = empty($PlayerNHLID) ? "" : $PlayerNHLID;
                        $PlayerJersey = filter_var($playerData['Jersey'], FILTER_SANITIZE_NUMBER_INT);
                        $PlayerJersey = empty($PlayerJersey) ? 0 : $PlayerJersey;
                        $PlayerLink = filter_var($playerData['URLLink'], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW || FILTER_FLAG_STRIP_HIGH || FILTER_FLAG_NO_ENCODE_QUOTES || FILTER_FLAG_STRIP_BACKTICK);
                        $IsGoalie = $playerData['PosG'] === "True";

                        if ($PlayerNumber > 0 and $PlayerNumber <= 10000 and !$IsGoalie){
                            $Query = "UPDATE PlayerInfo SET 
                            DraftYear = '" . $PlayerDraftYear . "', 
                            DraftOverallPick = '" . $PlayerDraftOverallPick . "', 
                            NHLID = '" . $PlayerNHLID . "', 
                            Jersey = '" . $PlayerJersey  . "', 
                            URLLink = '" . str_replace("'", "''", $PlayerLink) . "', 
                            WebClientModify = 'True' 
                        WHERE Number = " . $PlayerNumber;
                            
                            if ($db->exec($Query) !== false) {
                                $bulkSuccess++;
                            } else {
                                $bulkErrors++;
                            }

                        } elseif($PlayerNumber > 10000 and $PlayerNumber <= 11000 and $IsGoalie){
                            $Query = "UPDATE GoalerInfo SET 
                            DraftYear = '" . $PlayerDraftYear . "', 
                            DraftOverallPick = '" . $PlayerDraftOverallPick . "', 
                            NHLID = '" . $PlayerNHLID . "', 
                            Jersey = '" . $PlayerJersey  . "', 
                            URLLink = '" . str_replace("'","''",$PlayerLink). "', 
                            WebClientModify = 'True' 
                            WHERE Number = " . ($PlayerNumber - 10000);
                            
                            if ($db->exec($Query) !== false) {
                                $bulkSuccess++;
                            } else {
                                $bulkErrors++;
                            }
                        } else {
                            $bulkErrors++;
                        }
                    } catch (Exception $e) {
                        $bulkErrors++;
                    }
                }
                
                if ($bulkSuccess > 0) {
                    $InformationMessage = "Édition en lot réussie : $bulkSuccess joueur(s) mis à jour" . ($bulkErrors > 0 ? " ($bulkErrors erreur(s))" : "");
                } else {
                    $InformationMessage = "Échec de l'édition en lot : $bulkErrors erreur(s)";
                }
            } else {
                // Édition individuelle (code existant)
            if(isset($_POST['PlayerNumber'])){$PlayerNumber = filter_var($_POST['PlayerNumber'], FILTER_SANITIZE_NUMBER_INT);} 
            if(isset($_POST['PlayerName'])){$PlayerName =  filter_var($_POST['PlayerName'], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW || FILTER_FLAG_STRIP_HIGH || FILTER_FLAG_NO_ENCODE_QUOTES || FILTER_FLAG_STRIP_BACKTICK);}
            
            
            
            //if(isset($_POST['DraftYear'])){$PlayerDraftYear = filter_var($_POST['DraftYear'], FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_NUMBER_INT);} If (empty($PlayerDraftYear)){$PlayerDraftYear =0 ;}
            if (isset($_POST['DraftYear'])) {
                $PlayerDraftYear = filter_var($_POST['DraftYear'], FILTER_SANITIZE_NUMBER_INT);
                $PlayerDraftYear = ($PlayerDraftYear >= 1900 && $PlayerDraftYear <= date('Y')) ? (int)$PlayerDraftYear : 0;
            } else {
                $PlayerDraftYear = 0;
            }
            
            
            
            
            if(isset($_POST['DraftOverallPick'])){$PlayerDraftOverallPick = filter_var($_POST['DraftOverallPick'], FILTER_SANITIZE_NUMBER_INT);} If (empty($PlayerDraftOverallPick)){$PlayerDraftOverallPick =0 ;}
            if(isset($_POST['NHLID'])){$PlayerNHLID = filter_var($_POST['NHLID'], FILTER_SANITIZE_NUMBER_INT);} If (empty($PlayerNHLID)){$PlayerNHLID ="" ;}
            if(isset($_POST['Jersey'])){$PlayerJersey = filter_var($_POST['Jersey'], FILTER_SANITIZE_NUMBER_INT);} If (empty($PlayerJersey)){$PlayerJersey =0 ;}
            if(isset($_POST['Hyperlink'])){$PlayerLink = filter_var($_POST['Hyperlink'], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW || FILTER_FLAG_STRIP_HIGH || FILTER_FLAG_NO_ENCODE_QUOTES || FILTER_FLAG_STRIP_BACKTICK);}	

            try {

                if ($PlayerNumber > 0 and $PlayerNumber <= 10000){

                        $Query = "UPDATE PlayerInfo SET 
                        DraftYear = '" . $PlayerDraftYear . "', 
                        DraftOverallPick = '" . $PlayerDraftOverallPick . "', 
                        NHLID = '" . $PlayerNHLID . "', 
                        Jersey = '" . $PlayerJersey  . "', 
                        URLLink = '" . str_replace("'", "''", $PlayerLink) . "', 
                        WebClientModify = 'True' 
                    WHERE Number = " . $PlayerNumber;
                    
                    if ($db->exec($Query) === false) {
                       log2console("Error updating record: " . $db->lastErrorMsg());
                    } else {
                        log2console("Having fun: " . $db->lastErrorMsg());
                        $InformationMessage = $PlayersLang['EditConfirm'] . $PlayerName; 
                    }
                

                }elseif($PlayerNumber > 10000 and $PlayerNumber <= 11000){

                    $Query = "Update GoalerInfo SET DraftYear = '" . $PlayerDraftYear . "', DraftOverallPick = '" . $PlayerDraftOverallPick . "', NHLID = '" . $PlayerNHLID . "', Jersey = '" . $PlayerJersey  . "', NHLID = '" . $PlayerNHLID . "', URLLink = '" . str_replace("'","''",$PlayerLink). "', WebClientModify = 'True' WHERE Number = " . ($PlayerNumber - 10000);
                    $db->exec($Query);
                    $InformationMessage = $PlayersLang['EditConfirm'] . $PlayerName;

                }else{
                    $InformationMessage = $PlayersLang['EditFail'];
                }

            } catch (Exception $e) {  $InformationMessage = $PlayersLang['EditFail'];	}	
            }
        }
    }
		

    /* Team or All */
    if ($Team >= 0){
        $QueryTeam = "SELECT Name FROM TeamProInfo WHERE Number = " . $Team;
        $TeamName = $db->querySingle($QueryTeam,true);	 
        $TeamQuery = "Team = " . $Team;
    }else{
        $TeamQuery = "Team >= 0"; /* All Teams */
    }


    /* Pro Only or Farm  */
    if    ($Type == 1)	$TypeQuery = "Status1 >= 2";
    elseif($Type == 2)	$TypeQuery = "Status1 <= 1";
    else			    $TypeQuery = "Number > 0";    /* Default Place Order Where everything will return */
		

    /* Main Query with correct Variable */
    $start = microtime(true);
    $Query = "SELECT MainTable.* FROM (SELECT PlayerInfo.Number, PlayerInfo.Name, PlayerInfo.Team, PlayerInfo.TeamName, PlayerInfo.ProTeamName, PlayerInfo.TeamThemeID, PlayerInfo.Age, PlayerInfo.AgeDate, PlayerInfo.URLLink, PlayerInfo.NHLID, PlayerInfo.DraftYear, PlayerInfo.DraftOverallPick, PlayerInfo.Jersey, PlayerInfo.PosC, PlayerInfo.PosLW, PlayerInfo.PosRW, PlayerInfo.PosD, 'False' AS PosG, PlayerInfo.Retire as Retire FROM PlayerInfo WHERE " . $TeamQuery . " AND Retire = \"False\" AND " . $TypeQuery . " UNION ALL SELECT GoalerInfo.Number, GoalerInfo.Name, GoalerInfo.Team, GoalerInfo.TeamName, GoalerInfo.ProTeamName, GoalerInfo.TeamThemeID, GoalerInfo.Age, GoalerInfo.AgeDate, GoalerInfo.URLLink, GoalerInfo.NHLID, GoalerInfo.DraftYear, GoalerInfo.DraftOverallPick, GoalerInfo.Jersey, 'False' AS PosC, 'False' AS PosLW, 'False' AS PosRW, 'False' AS PosD, 'True' AS PosG, GoalerInfo.Retire as Retire FROM GoalerInfo WHERE " . $TeamQuery . " AND Retire = \"False\" AND " . $TypeQuery . ") AS MainTable ORDER BY MainTable.Name ASC";
    $end = microtime(true);
    log2console("Query Time: " . ($end - $start) . " seconds");
	

} catch (Exception $e) {
STHSErrorPlayerInfo:
	$LeagueName = $DatabaseNotFound;
	$PlayerInfo = Null;
	$FreeAgentYear = Null;	
}}?>


 


</head><body>

<?php include "Menu.php";?>


<?php if ($InformationMessage != ""){echo "<div class=\"STHSDivInformationMessage\">" . $InformationMessage . "<br /></div>";}?>

<div id="EditPlayerInfoMainDiv" style="width:99%;margin:auto;">
    <h1> Players Information - Edit </h1>

    <!-- Menu déroulant pour filtrer par équipe -->
    <div class="team-filter-container">
        <label for="teamFilter"><strong>Filtrer par équipe :</strong></label>
        <select id="teamFilter" class="form-select">
            <option value="-1" <?php echo ($Team == -1) ? 'selected' : ''; ?>>Toutes les équipes</option>
            <?php foreach ($Teams as $team): ?>
                <option value="<?php echo $team['Number']; ?>" <?php echo ($Team == $team['Number']) ? 'selected' : ''; ?>>
                    <?php echo $team['Name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button id="applyTeamFilter" class="btn btn-primary">Appliquer</button>
    </div>

    <div id="letter-links" >
        <a href="javascript:void(0);" class="letter-link all-letters" data-letter="ALL">ALL LETTER</a>
    <?php foreach (range('A', 'Z') as $letter) {
        echo "<a href=\"javascript:void(0);\" class=\"letter-link\" data-letter=\"$letter\">$letter</a>";
    } ?>
</div>


    <div class="mb-4">
        Toggle column: 
        <a class="toggle-vis" data-column="0" data-attribute="mainTable" ><?php echo $PlayersLang['PlayerName']; ?></a>
        <a class="toggle-vis" data-column="1" data-attribute="mainTable"><?php echo $PlayersLang['TeamName']; ?></a>
        <a class="toggle-vis" data-column="2" data-attribute="mainTable">POS</a>
        <a class="toggle-vis" data-column="3" data-attribute="mainTable"><?php echo $PlayersLang['Age']; ?></a>
        <a class="toggle-vis" data-column="4" data-attribute="mainTable"><?php echo $PlayersLang['Birthday']; ?></a>
        <a class="toggle-vis" data-column="5" data-attribute="mainTable"><?php echo $PlayersLang['DraftYear']; ?></a>
        <a class="toggle-vis" data-column="6" data-attribute="mainTable"><?php echo $PlayersLang['DraftOverallPick']; ?></a>
        <a class="toggle-vis" data-column="7" data-attribute="mainTable"><?php echo $PlayersLang['Jersey']; ?></a>
        <a class="toggle-vis" data-column="8" data-attribute="mainTable"><?php echo $PlayersLang['NHLID']; ?></a>
        <a class="toggle-vis" data-column="9" data-attribute="mainTable"><?php echo $PlayersLang['Link']; ?></a>
        <a class="toggle-vis" data-column="10" data-attribute="mainTable"><?php echo $PlayersLang['Edit']; ?></a>
    </div>

    <!-- Bouton Edit All -->
    <div class="edit-all-container mb-3">
        <button id="editAllBtn" class="btn btn-success btn-lg">
            <i class="fas fa-save"></i> Edit All Players
        </button>
        <button id="autoFillNhlIdBtn" class="btn btn-info btn-lg ms-2">
            <i class="fas fa-magic"></i> Auto-fill NHL ID
        </button>
        <span id="editAllStatus" class="ms-3 text-muted"></span>
    </div>

    <form id="bulkEditForm" method="post" action="EditPlayerInfo.php">
    <table id="mainTable" class="table table-striped table-bordered " style="width:100%;">
        <thead><tr>
        <th data-priority="critical" title="Player Name" class="STHSW140Min"><?php echo $PlayersLang['PlayerName'];?></th>
        <?php 
        if($Team >= 0){ echo "<th class=\"columnSelector-false STHSW140Min\" data-priority=\"6\" title=\"Team Name\">" . $PlayersLang['TeamName'] . "</th>";}
        else{ echo "<th data-priority=\"2\" title=\"Team Name\" class=\"STHSW140Min\">" . $PlayersLang['TeamName'] ."</th>";}?>
        <th data-priority="2" title="Position" class="STHSW45">POS</th>
        <th data-priority="5" title="Age" class=" STHSW25"><?php echo $PlayersLang['Age'];?></th>
        <th data-priority="5" title="Birthday" class="STHSW45"><?php echo $PlayersLang['Birthday'];?></th>
        <th data-priority="4" title="Draft Year" class="STHSW55"><?php echo $PlayersLang['DraftYear'];?></th>
        <th data-priority="4" title="Overall Pick" class="STHSW55"><?php echo $PlayersLang['DraftOverallPick'];?></th>
        <th data-priority="4" title="Jersey #" class="STHSW55"><?php echo $PlayersLang['Jersey'];?></th>
        <th data-priority="3" title="NHLID" class="STHSW55"><?php echo $PlayersLang['NHLID'];?></th>
        <th data-priority="3" title="Hyperlink" class="STHSW140Min"><?php echo $PlayersLang['Link'];?></th>
        <th data-priority="2" title="Edit" class="STHSW55"><?php echo $PlayersLang['Edit'];?></th>
        </tr></thead>
    
        <tbody>

        </tbody>
    </table>
    </form></div>




<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"> /* $(document).ready(function() {
        $('#mainTable').DataTable();
    });*/
</script>
    

<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // Gestion du filtre par équipe
    document.getElementById('applyTeamFilter').addEventListener('click', function() {
        const selectedTeam = document.getElementById('teamFilter').value;
        const currentUrl = new URL(window.location);
        
        if (selectedTeam == -1) {
            currentUrl.searchParams.delete('Team');
        } else {
            currentUrl.searchParams.set('Team', selectedTeam);
        }
        
        // Conserver les autres paramètres existants
        if (currentUrl.searchParams.has('Type')) {
            currentUrl.searchParams.set('Type', currentUrl.searchParams.get('Type'));
        }
        if (currentUrl.searchParams.has('Lang')) {
            currentUrl.searchParams.set('Lang', currentUrl.searchParams.get('Lang'));
        }
        
        window.location.href = currentUrl.toString();
    });
    
    document.querySelectorAll('.letter-link').forEach(link => {
        link.addEventListener('click', function() {
            // Retirer la classe active de tous les liens
            document.querySelectorAll('.letter-link').forEach(l => l.classList.remove('active'));
            // Ajouter la classe active au lien cliqué
            this.classList.add('active');
            
            const letter = this.getAttribute('data-letter');
            fetchPlayersByLetter(letter);
            $('#mainTable').DataTable(); // Re-initialize DataTable
        });
    });


    // Simulate click on "ALL LETTER" on page load
    const allLettersLink = document.querySelector('.letter-link[data-letter="ALL"]');
    if (allLettersLink) {
        allLettersLink.click();
    }

    // Configuration DataTables avec 100 entrées par défaut
    $.extend(true, $.fn.dataTable.defaults, {
        pageLength: 100,
        lengthMenu: [[25, 50, 100, 250, 500, -1], [25, 50, 100, 250, 500, "Tous"]],
        language: {
            lengthMenu: "Afficher _MENU_ entrées",
            info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            infoEmpty: "Aucune entrée à afficher",
            infoFiltered: "(filtré de _MAX_ entrées au total)",
            search: "Rechercher:",
            paginate: {
                first: "Premier",
                previous: "Précédent",
                next: "Suivant",
                last: "Dernier"
            }
        }
    });

    // Gestion du bouton Edit All
    document.getElementById('editAllBtn').addEventListener('click', function() {
        const button = this;
        const status = document.getElementById('editAllStatus');
        
        // Désactiver le bouton pendant le traitement
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sauvegarde en cours...';
        status.textContent = 'Sauvegarde de tous les joueurs...';
        status.className = 'ms-3 text-muted';
        
        // Récupérer tous les champs de saisie du tableau
        const table = $('#mainTable').DataTable();
        const formData = new FormData();
        formData.append('bulkEdit', '1');
        formData.append('TeamEdit', '<?php echo $CookieTeamNumber; ?>');
        
        // Collecter toutes les données du tableau
        const rows = table.rows().data();
        let playerCount = 0;
        
        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const rowNode = table.row(i).node();
            
            // Extraire le numéro du joueur depuis les champs cachés
            const hiddenInputs = rowNode.querySelectorAll('input[type="hidden"]');
            let playerNumber = null;
            let playerName = null;
            let isGoalie = false;
            
            hiddenInputs.forEach(input => {
                if (input.name.includes('[Number]')) {
                    playerNumber = input.value;
                }
                if (input.name.includes('[Name]')) {
                    playerName = input.value;
                }
                if (input.name.includes('[PosG]')) {
                    isGoalie = input.value === 'True';
                }
            });
            
            if (playerNumber) {
                // Collecter les valeurs des champs de saisie
                const draftYearInput = rowNode.querySelector(`input[name="players[${playerNumber}][DraftYear]"]`);
                const draftPickInput = rowNode.querySelector(`input[name="players[${playerNumber}][DraftOverallPick]"]`);
                const jerseyInput = rowNode.querySelector(`input[name="players[${playerNumber}][Jersey]"]`);
                const nhlIdInput = rowNode.querySelector(`input[name="players[${playerNumber}][NHLID]"]`);
                const urlInput = rowNode.querySelector(`input[name="players[${playerNumber}][URLLink]"]`);
                
                if (draftYearInput && draftPickInput && jerseyInput && nhlIdInput && urlInput) {
                    formData.append(`players[${playerNumber}][Name]`, playerName || '');
                    formData.append(`players[${playerNumber}][PosG]`, isGoalie ? 'True' : 'False');
                    formData.append(`players[${playerNumber}][Number]`, playerNumber);
                    formData.append(`players[${playerNumber}][DraftYear]`, draftYearInput.value || '0');
                    formData.append(`players[${playerNumber}][DraftOverallPick]`, draftPickInput.value || '0');
                    formData.append(`players[${playerNumber}][Jersey]`, jerseyInput.value || '0');
                    formData.append(`players[${playerNumber}][NHLID]`, nhlIdInput.value || '');
                    formData.append(`players[${playerNumber}][URLLink]`, urlInput.value || '');
                    playerCount++;
                }
            }
        }
        
        if (playerCount === 0) {
            status.textContent = '❌ Aucun joueur trouvé à sauvegarder';
            status.className = 'ms-3 text-muted error';
            button.disabled = false;
            button.innerHTML = '<i class="fas fa-save"></i> Edit All Players';
            return;
        }
        
        status.textContent = `Sauvegarde de ${playerCount} joueur(s)...`;
        
        // Envoyer les données
        fetch('EditPlayerInfo.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Réactiver le bouton
            button.disabled = false;
            button.innerHTML = '<i class="fas fa-save"></i> Edit All Players';
            
            // Afficher le statut
            if (data.includes('réussie') || data.includes('confirmé') || data.includes('success')) {
                status.textContent = '✅ Tous les joueurs ont été sauvegardés avec succès !';
                status.className = 'ms-3 text-muted success';
                
                // Recharger les données pour afficher les changements
                setTimeout(() => {
                    const activeLetter = document.querySelector('.letter-link.active');
                    if (activeLetter) {
                        activeLetter.click();
                    }
                }, 1000);
            } else {
                status.textContent = '❌ Erreur lors de la sauvegarde. Vérifiez les données.';
                status.className = 'ms-3 text-muted error';
            }
            
            // Masquer le statut après 5 secondes
            setTimeout(() => {
                status.textContent = '';
                status.className = 'ms-3 text-muted';
            }, 5000);
        })
        .catch(error => {
            // Réactiver le bouton en cas d'erreur
            button.disabled = false;
            button.innerHTML = '<i class="fas fa-save"></i> Edit All Players';
            status.textContent = '❌ Erreur de connexion. Réessayez.';
            status.className = 'ms-3 text-muted error';
            
            setTimeout(() => {
                status.textContent = '';
                status.className = 'ms-3 text-muted';
            }, 5000);
        });
    });

    // Gestion du bouton Auto-fill NHL ID
    document.getElementById('autoFillNhlIdBtn').addEventListener('click', function() {
        const button = this;
        const status = document.getElementById('editAllStatus');
        
        // Désactiver le bouton pendant le traitement
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Analyse en cours...';
        status.textContent = 'Analyse des liens pour remplir les NHL ID...';
        status.className = 'ms-3 text-muted';
        
        // Récupérer le tableau DataTable
        const table = $('#mainTable').DataTable();
        const rows = table.rows().data();
        let filledCount = 0;
        let skippedCount = 0;
        
        for (let i = 0; i < rows.length; i++) {
            const rowNode = table.row(i).node();
            
            // Trouver les champs NHL ID et Link
            const nhlIdInput = rowNode.querySelector('input[name*="[NHLID]"]');
            const urlInput = rowNode.querySelector('input[name*="[URLLink]"]');
            
            if (nhlIdInput && urlInput) {
                const currentNhlId = nhlIdInput.value.trim();
                const url = urlInput.value.trim();
                
                // Vérifier si le NHL ID est vide et si le lien contient des données
                if ((!currentNhlId || currentNhlId === '0' || currentNhlId === '') && url && url.length >= 7) {
                    // Extraire les 7 derniers caractères du lien
                    const last7Chars = url.slice(-7);
                    
                    // Vérifier si les 7 derniers caractères sont des chiffres
                    if (/^\d{7}$/.test(last7Chars)) {
                        nhlIdInput.value = last7Chars;
                        filledCount++;
                        
                        // Ajouter une classe pour indiquer que le champ a été modifié
                        nhlIdInput.classList.add('auto-filled');
                        nhlIdInput.style.backgroundColor = '#d4edda';
                        nhlIdInput.style.borderColor = '#28a745';
                    } else {
                        skippedCount++;
                    }
                } else {
                    skippedCount++;
                }
            }
        }
        
        // Réactiver le bouton
        button.disabled = false;
        button.innerHTML = '<i class="fas fa-magic"></i> Auto-fill NHL ID';
        
        // Afficher le statut
        if (filledCount > 0) {
            status.textContent = `✅ ${filledCount} NHL ID(s) rempli(s) automatiquement ! ${skippedCount} ligne(s) ignorée(s).`;
            status.className = 'ms-3 text-muted success';
            
            // Masquer l'effet visuel après 3 secondes
            setTimeout(() => {
                const autoFilledInputs = document.querySelectorAll('.auto-filled');
                autoFilledInputs.forEach(input => {
                    input.classList.remove('auto-filled');
                    input.style.backgroundColor = '';
                    input.style.borderColor = '';
                });
            }, 3000);
        } else {
            status.textContent = `ℹ️ Aucun NHL ID à remplir. ${skippedCount} ligne(s) analysée(s).`;
            status.className = 'ms-3 text-muted';
        }
        
        // Masquer le statut après 5 secondes
        setTimeout(() => {
            status.textContent = '';
            status.className = 'ms-3 text-muted';
        }, 5000);
    });

});
   

function fetchPlayersByLetter(letter) {
    // Récupérer l'équipe sélectionnée
    const selectedTeam = document.getElementById('teamFilter').value;
    
    // Construire l'URL avec les paramètres
    let url = `/components/sql/fetch_playersByLetter.php?letter=${letter}`;
    if (selectedTeam != -1) {
        url += `&team=${selectedTeam}`;
    }
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Reference the DataTable
            const table = $('#mainTable').DataTable();

            // Clear existing data in DataTable
            table.clear();

            // Prepare and add new rows
            const rows = data.map(player => [
                `<a href="${player.PosG === "True" ? "GoalieReport.php?Goalie=" : "PlayerReport.php?Player="}${player.Number}">
                    ${player.Name}
                 </a>`,
                `${player.TeamThemeID > 0 ? `<img loading="lazy" src="/images/${player.TeamThemeID}.png" alt="" class="STHSPHPGoaliesRosterTeamImage" />` : ''}
                 ${player.TeamName}`,
                formatPosition(player),
                player.Age,
                player.AgeDate,
                `<input type="number" min="0" max="3000" name="players[${player.Number}][DraftYear]" value="${player.DraftYear}" class="form-control">`,
                `<input type="number" min="0" max="1000" name="players[${player.Number}][DraftOverallPick]" value="${player.DraftOverallPick}" class="form-control">`,
                `<input type="number" min="0" max="99" name="players[${player.Number}][Jersey]" value="${player.Jersey}" class="form-control">`,
                `<input type="number" min="0" max="999999999" name="players[${player.Number}][NHLID]" value="${player.NHLID}" class="form-control">`,
                `<input type="url" name="players[${player.Number}][URLLink]" value="${player.URLLink}" class="form-control">`,
                `<input type="hidden" name="players[${player.Number}][Name]" value="${player.Name}">
                 <input type="hidden" name="players[${player.Number}][PosG]" value="${player.PosG}">
                 <input type="hidden" name="players[${player.Number}][Number]" value="${player.Number}">`
            ]);

            // Add rows to the DataTable and redraw
            table.rows.add(rows).draw();
            
            // Appliquer la configuration personnalisée après le redraw
            table.page.len(100).draw();
        });
}

function formatPosition(player) {
    let position = "";
    if (player.PosC === "True") position += "C";
    if (player.PosLW === "True") position += (position ? "/LW" : "LW");
    if (player.PosRW === "True") position += (position ? "/RW" : "RW");
    if (player.PosD === "True") position += (position ? "/D" : "D");
    if (player.PosG === "True") position += (position ? "/G" : "G");
    return position;
}

</script>
<?php include "Footer.php";?>




<script>

/*// Determine the letter filter (default to 'A')
$selectedLetter = isset($_GET['letter']) ? $_GET['letter'] : 'A';

// Filter the data dynamically for the selected letter
$FilteredPlayerInfo = array_filter($PlayerInfo, function ($row) use ($selectedLetter) {
    return stripos($row['Name'], $selectedLetter) === 0; // Match names starting with the letter
});*/

/*
$output = ''; // Buffer for the table rows
while ($Row = $FilteredPlayerInfo->fetchArray()) { 
    
    $output .= "<tr> <form action=\"EditPlayerInfo.php?Type={$Type}" . ($Team > 0 ? "&Team={$Team}" : "") . ($lang == "fr" ? "&Lang=fr" : "") . "\" method=\"post\">";
    // Determine the link based on position
    $linkType = $Row['PosG'] == "True" ? "GoalieReport.php?Goalie=" : "PlayerReport.php?Player=";
    $output .=  "<td><a href=\"{$linkType}{$Row['Number']}\">{$Row['Name']}</a></td>";

    // Display team name with optional image
    $output .=  "<td>";
    if ($Row['TeamThemeID'] > 0) {        $output .= "<img loading=\"lazy\" src=\"/images/{$Row['TeamThemeID']}.png\" alt=\"\" class=\"STHSPHPGoaliesRosterTeamImage\" />";    }
    $output .=  "{$Row['TeamName']}</td>";


    // Calculate position
    $Position = "";
    $Position .= $Row['PosC'] == "True" ? "C" : "";
    $Position .= $Row['PosLW'] == "True" ? ($Position ? "/LW" : "LW") : "";
    $Position .= $Row['PosRW'] == "True" ? ($Position ? "/RW" : "RW") : "";
    $Position .= $Row['PosD'] == "True" ? ($Position ? "/D" : "D") : "";
    $Position .= $Row['PosG'] == "True" ? ($Position ? "/G" : "G") : "";
    $output .= "<td>{$Position}</td>";




    // Age and birth date
    $output .=  "<td>{$Row['Age']}</td>";
    $output .=  "<td>{$Row['AgeDate']}</td>";

    // Draft Year, Draft Overall Pick, Jersey, NHL ID, and Hyperlink
    $output .=  "<td> <input type=\"number\" min=\"0\" max=\"3000\" name=\"DraftYear\" value=\"{$Row['DraftYear']}\"> </td>";
    $output .=  "<td> <input type=\"number\" min=\"0\" max=\"1000\" name=\"DraftOverallPick\" value=\"{$Row['DraftOverallPick']}\"> </td>";
    $output .=  "<td> <input type=\"number\" min=\"0\" max=\"99\" name=\"Jersey\" value=\"{$Row['Jersey']}\"> </td>";
    $output .=  "<td> <input type=\"number\" min=\"0\" max=\"999999999\" name=\"NHLID\" value=\"{$Row['NHLID']}\"> </td>";
    $output .=  "<td> <input type=\"url\" name=\"Hyperlink\" value=\"{$Row['URLLink']}\" size=\"60\"> </td>";

    // Submit button and hidden fields
    $output .=  "<td> 
                <input type=\"submit\" class=\"SubmitButtonSmall\" value=\"{$PlayersLang['Edit']}\">
                <input type=\"hidden\" name=\"TeamEdit\" value=\"{$CookieTeamNumber}\">
                <input type=\"hidden\" name=\"PlayerName\" value=\"{$Row['Name']}\">
                <input type=\"hidden\" name=\"PlayerNumber\" value=\"" . ($Row['PosG'] == "True" ? ($Row['Number'] + 10000) : $Row['Number']) . "\">
            </td>";
          
    $output .=  "</form> </tr>";


    

}
echo $output;*/

</script>