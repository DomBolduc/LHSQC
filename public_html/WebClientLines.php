<?php
	$lang = "en"; 	require_once("LanguageEN.php");	$LeagueName = Null;	session_start();	mb_internal_encoding("UTF-8");	$PerformanceMonitorStart = microtime(true); 
	require_once("STHSSetting.php");
	require_once("WebClientAPI.php");

    require_once("helperTool.php");
	
	$exempt = array();  // exempt is an array of api names.  if you do not need the html or layout api then add as an array item   example:  $exempt = array("html","layout");
	load_apis($exempt); // Call the required APIs
	
	// Make a connection variable to pass to API
	$db = api_sqlite_connect($DatabaseFile);// Debug: vérifier si $CookieTeamNumber est défini
error_log("CookieTeamNumber value: " . (isset($CookieTeamNumber) ? $CookieTeamNumber : 'NOT SET'));
var_dump($CookieTeamNumber);


	if ($db){
		
		$Query = "Select ShowWebClientInDymanicWebsite FROM LeagueOutputOption";
		$LeagueOutputOption = $db->querySingle($Query,true);
		
		$Query = "Select BlockAutoProLineFunctionForGM,BlockAutoFarmLineFunctionForGM FROM LeagueWebClient";
		$LeagueWebClient = $db->querySingle($Query,true);

		// Look for a team ID in the URL, if non exists use 0
		$t = (isset($_REQUEST["TeamID"])) ? filter_var($_REQUEST["TeamID"], FILTER_SANITIZE_NUMBER_INT): 0;
		$l = (isset($_REQUEST["League"])) ? filter_var($_REQUEST["League"], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW || FILTER_FLAG_STRIP_HIGH) : false;
		If (strtolower($l) <> "farm"){$l = "Pro";}else{$l = "Farm";}
		$row = array();
		if($t > 0 AND $t <= 100){
			$rs = api_dbresult_teamsbyname($db,"Pro",$t);
			$row = $rs->fetchArray();
		}
		If ($l == "Pro" AND $LeagueWebClient['BlockAutoProLineFunctionForGM'] == "True"){echo "<style>#autolines {display:none};</style>";}
		If ($l == "Farm" AND $LeagueWebClient['BlockAutoFarmLineFunctionForGM'] == "True"){echo "<style>#autolines {display:none};</style>";}
		
        
        // LHSQC
        $WebClientHeadCode = "
        <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css\" rel=\"stylesheet\">  
                                             
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js\"></script>
        <script src=\"https://code.jquery.com/ui/1.14.1/jquery-ui.min.js\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js\"></script>
       
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH\" crossorigin=\"anonymous\">
       
        <link href=\"STHSMain-CSSOverwrite.css\" rel=\"stylesheet\" type=\"text/css\" /> 
        <script src=\"js/lhsqc_new.js\"    type=\"text/javascript\"></script>
        <link href=\"https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap\" rel=\"stylesheet\">
        <link href=\"css/nhlColors.css\" rel=\"stylesheet\" type=\"text/css\" /> ";
        //<script src=\"js/db2json.js\"    type=\"text/javascript\"></script>";
        

        //<link rel=\"stylesheet\" href=\"https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css\">";
        //<script src=\"LHSQC.js\"    type=\"text/javascript\"></script>";  


		// Make a default header 
		api_layout_header("lineeditor",$db,$t,$l,$WebClientHeadCode);
        

		If ($CookieTeamNumber == 102){$DoNotRequiredLoginDynamicWebsite = TRUE;} // Commish is allow to edit any Teams so we are using the code from the 'Do Not Required Login Dynamic Website' to achieve this goal.
		
		if(($CookieTeamNumber == $t OR $DoNotRequiredLoginDynamicWebsite == TRUE) AND $t > 0 AND $t <= 100){
			// Display the line editor page using API.
			// use 4 paramaters Database, TeamID, $league("Pro","Farm"), showH1Tag (DEFAULT true/false)   
			if($t > 0){   // Check to see if there is a team selected.
                
                $league=$l;
                $useServerURIInTabLink=false;
                // $db = sqlite DB
                // $teamid is a teamid to use that teams roster.
                // $league is "Pro" or "Farm" based on selection.         
            
                $teamid = $t;
                
                $Query = "SELECT * FROM TeamProInfo WHERE Number = " . $teamid;
		        $TeamProInfo = $db->querySingle($Query,true);
                $Theme = $TeamProInfo['TeamThemeID'];


                $Query = "SELECT * FROM PlayerInfo WHERE Team = " . $teamid; 
                $results = $db->query($Query); 
                $TeamPlayerInfo = []; 
                while ($row = $results->fetchArray(SQLITE3_ASSOC)) { $TeamPlayerInfo[] = $row; }
        



                // Set the status value if the league is Pro or Farm
                $status = ($league == "Pro") ? 3: 1;
                // Select all the players and goalies if they are dressed.
                $sql = "SELECT Number, Name FROM PlayerInfo WHERE Team = " . $teamid . " AND Status1 = " . $status . " ";
                $sql .= "UNION ";
                $sql .= "SELECT Number, Name FROM GoalerInfo WHERE Team = " . $teamid . " AND Status1 = " . $status . " ";
    
                // Get the recordset of all the players
                $oRS = $db->query($sql);
                // Make an array of available players to use.
                // This makes comparing from a roster change easier.
                // i.e. Database could show a player in a position in the lines table, but if that
                // player was scratched, or moved between farm and pro, there has to be a way to
                // show he isn't there and show blank on the line. 
                $availableplayers = array();
                while($row = $oRS->fetchArray()){
                    $availableplayers[api_MakeCSSClass($row["Name"])]["id"] = $row["Number"];
                    $availableplayers[api_MakeCSSClass($row["Name"])]["Name"] = $row["Name"];
                }
                log2console($availableplayers);
               
                // Check to see if Custom OT lines are turned on 
                $sql = "SELECT " . $league . "CustomOTLines AS CustomLines FROM LeagueGeneral;";
                $oRS = $db->query($sql);
                $row = $oRS->fetchArray();
                $customOTlines = ($row["CustomLines"] == "True") ? true: false;
                $cpfieldsOTLines = ($customOTlines) ? 'true': 'false';
    
                // get the fields needed for the ChangePlayer function onClick
                $dbfields = api_dbresult_line_editor_fields($db);
                $cpfields = "";
                foreach($dbfields AS $f){$cpfields .= strtolower($f) .",";}
                $cpfields .= $cpfieldsOTLines;
                //$cpfields = rtrim($cpfields,",");

                $bannertext = "";

                // Fonction pour obtenir les matchs par jour pour cette équipe
                function getGamesByDayForTeam($db, $teamid, $league, $maxDays = 10) {
                    $games = array();

                    // Récupérer les paramètres de la ligue
                    $Query = "SELECT ScheduleNextDay FROM LeagueGeneral";
                    $LeagueGeneral = $db->querySingle($Query, true);
                    $startDay = $LeagueGeneral['ScheduleNextDay'];

                    // Récupérer les prochains matchs pour cette équipe
                    for($day = $startDay; $day < $startDay + $maxDays; $day++) {
                        $sql = "SELECT GameNumber, Day, VisitorTeamName, HomeTeamName, VisitorTeam, HomeTeam, ";
                        $sql .= "CASE WHEN VisitorTeam = ". $teamid ." THEN 'at' ELSE 'vs' END AS AtVs, ";
                        $sql .= "CASE WHEN VisitorTeam = ". $teamid ." THEN HomeTeamName ELSE VisitorTeamName END AS Opponent ";
                        $sql .= "FROM Schedule" . $league . " ";
                        $sql .= "WHERE (VisitorTeam = ". $teamid ." OR HomeTeam = ". $teamid .") AND Day = " . $day . " AND Play = 'False' ";
                        $sql .= "LIMIT 1";

                        $result = $db->query($sql);
                        if($result && $row = $result->fetchArray()) {
                            $games[$day - $startDay + 1] = array(
                                'opponent' => $row['Opponent'],
                                'atvs' => $row['AtVs'],
                                'day' => $day
                            );
                        } else {
                            $games[$day - $startDay + 1] = array(
                                'opponent' => 'Pas de match',
                                'atvs' => '',
                                'day' => $day
                            );
                        }
                    }
                    return $games;
                }

                // Gérer la copie des alignements vers tous les jours
                if(isset($_POST["copyToAllDays"])) {
                    $currentDay = isset($_REQUEST["selectedDay"]) ? (int)$_REQUEST["selectedDay"] : 1;

                    // Vérifier qu'on est bien sur le jour 1
                    if($currentDay == 1) {
                        try {
                            $db->exec("BEGIN TRANSACTION;");

                            // Obtenir toutes les données du jour 1
                            $sql = "SELECT * FROM Team". $league ."Lines WHERE TeamNumber = " . $teamid . " AND Day = 1";
                            $day1Data = $db->query($sql);
                            $day1Row = $day1Data->fetchArray(SQLITE3_ASSOC);

                            $sql = "SELECT * FROM Team". $league ."LinesNumberOnly WHERE TeamNumber = " . $teamid . " AND Day = 1";
                            $day1DataNo = $db->query($sql);
                            $day1RowNo = $day1DataNo->fetchArray(SQLITE3_ASSOC);

                            if($day1Row && $day1RowNo) {
                                // Copier vers les jours 2-10
                                for($toDay = 2; $toDay <= 10; $toDay++) {
                                    // S'assurer que le jour de destination existe
                                    $checkSQL = "SELECT COUNT(*) as cnt FROM Team". $league ."Lines WHERE TeamNumber = " . $teamid . " AND Day = " . $toDay;
                                    $count = $db->querySingle($checkSQL);

                                    if ($count == 0) {
                                        // Créer l'entrée si elle n'existe pas
                                        $insertSQL = "INSERT INTO Team". $league ."Lines (TeamNumber, Day) VALUES (" . $teamid . ", " . $toDay . ")";
                                        $db->exec($insertSQL);
                                        $insertSQL = "INSERT INTO Team". $league ."LinesNumberOnly (TeamNumber, Day) VALUES (" . $teamid . ", " . $toDay . ")";
                                        $db->exec($insertSQL);
                                    }

                                    // Construire la requête UPDATE pour Team[League]Lines
                                    $updateFields = array();
                                    foreach($day1Row as $field => $value) {
                                        if($field != 'TeamNumber' && $field != 'Day') {
                                            $updateFields[] = $field . " = '" . api_sqlite_escape($value) . "'";
                                        }
                                    }

                                    if(!empty($updateFields)) {
                                        $sql = "UPDATE Team". $league ."Lines SET " . implode(", ", $updateFields) . " WHERE TeamNumber = " . $teamid . " AND Day = " . $toDay;
                                        $db->exec($sql);
                                    }

                                    // Construire la requête UPDATE pour Team[League]LinesNumberOnly
                                    $updateFieldsNo = array();
                                    foreach($day1RowNo as $field => $value) {
                                        if($field != 'TeamNumber' && $field != 'Day') {
                                            $updateFieldsNo[] = $field . " = '" . api_sqlite_escape($value) . "'";
                                        }
                                    }

                                    if(!empty($updateFieldsNo)) {
                                        $sql = "UPDATE Team". $league ."LinesNumberOnly SET " . implode(", ", $updateFieldsNo) . " WHERE TeamNumber = " . $teamid . " AND Day = " . $toDay;
                                        $db->exec($sql);
                                    }
                                }

                                $db->exec("COMMIT;");
                                echo "<div class='alert alert-success' role='alert'>Alignements du Jour 1 copiés vers tous les autres jours avec succès!</div>";
                            } else {
                                $db->exec("ROLLBACK;");
                                echo "<div class='alert alert-warning' role='alert'>Aucune donnée trouvée pour le Jour 1 à copier.</div>";
                            }

                        } catch (Exception $e) {
                            $db->exec("ROLLBACK;");
                            echo "<div class='alert alert-danger' role='alert'>Erreur lors de la copie: " . $e->getMessage() . "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning' role='alert'>La copie vers tous les jours n'est disponible que depuis le Jour 1.</div>";
                    }
                }

                // Si le bouton de mise à jour des lignes est cliqué
                if(isset($_POST["sbtUpdateLines"])){
                    $fminfo = "";
                    $dbfields = api_get_fields($db,$customOTlines,$league);
                    $fmfields = array_merge($_POST["txtLine"],$_POST["txtStrategies"]);
                    
                    // Utiliser le jour sélectionné
                    $currentDay = isset($_REQUEST["selectedDay"]) ? (int)$_REQUEST["selectedDay"] : 1;
                    
                    try {
                        $db->exec("BEGIN TRANSACTION;");
                        
                        // Pour chaque jour de 1 à 10, assurez-vous qu'il existe une entrée
                        for($day = 1; $day <= 10; $day++) {
                            $checkSQL = "SELECT COUNT(*) as cnt FROM Team". $league ."Lines WHERE TeamNumber = " . $teamid . " AND Day = " . $day;
                            $count = $db->querySingle($checkSQL);
                            
                            if ($count == 0) {
                                // Si le jour n'existe pas, créer une nouvelle entrée
                                $insertSQL = "INSERT INTO Team". $league ."Lines (TeamNumber, Day) VALUES (" . $teamid . ", " . $day . ")";
                                $db->exec($insertSQL);
                                $insertSQL = "INSERT INTO Team". $league ."LinesNumberOnly (TeamNumber, Day) VALUES (" . $teamid . ", " . $day . ")";
                                $db->exec($insertSQL);
                            }
                        }
                        
                        $db->exec("COMMIT;");
                    } catch (Exception $e) {
                        $db->exec("ROLLBACK;");
                        echo "<div class='alert alert-danger'>Erreur lors de l'initialisation des jours : " . $e->getMessage() . "</div>";
                        return;
                    }
        
                    // Charger les données actuelles du jour sélectionné
                    $sql = "SELECT " . implode(" || ',' || ", $dbfields) . " AS LineValues FROM Team". $league ."Lines WHERE TeamNumber = " . $teamid . " AND Day = " . $currentDay . ";";
                    $oRS = $db->query($sql);
                    $row = $oRS->fetchArray();
                    $dbinfo = $row["LineValues"];
                    foreach($dbfields AS $f){
                        if (array_key_exists($f,$fmfields)){$fminfo .= $fmfields[$f] . ",";}else{$fminfo .= "0,";}
                    }
                    $fminfo = rtrim($fminfo,",");
                
                    if(trim($fminfo) != trim($dbinfo)){
                        $arrDB = explode(",",$dbinfo);
                        $arrFM = explode(",",$fminfo);
                        $dbfields = array_values($dbfields);
                        
                        // Need 2 running query strings: one for the regular lines table
                        // And one for the numberonly table.
                        // Update only the selected day
                        $currentDay = isset($_REQUEST["selectedDay"]) ? (int)$_REQUEST["selectedDay"] : 1;
                        
                        // Ne mettre à jour que le jour sélectionné
                        $sql   = "UPDATE Team". $league ."Lines SET ";
                        $sqlno = "UPDATE Team". $league ."LinesNumberOnly SET ";
                        
                        // S'assurer que nous ne mettons à jour que le jour sélectionné
                        foreach($dbfields AS $i=>$f){
                            if($arrDB[$i] != $arrFM[$i]){
                                if(is_numeric($arrFM[$i])){
                                    $val    = api_sqlite_escape($arrFM[$i]);
                                    $valno  = api_sqlite_escape($arrFM[$i]);
                                }else{
                                    $val    = "'" . api_sqlite_escape($arrFM[$i]) . "'";
                                    if ($val == "''" || !isset($availableplayers[api_MakeCSSClass($arrFM[$i])])){$valno = 0;}else{$valno  = $availableplayers[api_MakeCSSClass($arrFM[$i])]["id"];}
                                }
                                $sql   .= $f . " = " . $val . ", ";
                                $sqlno .= $f . " = " . $valno . ", ";
                            }
                        }
          
                        
                        $sql = rtrim($sql,", ");
                        $sqlno .= " WebClientModify = 'True' ";
                        $sqlno .= ", WebClientIP = '" . $_SERVER['REMOTE_ADDR'] . "' ";
                        
                        // S'assurer que la mise à jour ne concerne que le jour sélectionné
                        $sql .= " WHERE TeamNumber = " . $teamid . " AND Day = " . $currentDay . ";";
                        $sqlno .= " WHERE TeamNumber = " . $teamid . " AND Day = " . $currentDay . ";";
                        
                        try {
                            $db->busyTimeout(5000);
                            $db->exec("BEGIN TRANSACTION;");
                            $db->exec("pragma journal_mode=memory;");
                            
                            // Exécution des requêtes avec vérification des erreurs - uniquement pour le jour sélectionné
                            if (trim($sql) != "UPDATE Team". $league ."Lines SET") {
                                // Log de débogage
                                error_log("Executing SQL for day " . $currentDay . ": " . $sql);
                                
                                if ($db->exec($sql) === false) {
                                    throw new Exception("Erreur lors de la mise à jour des lignes: " . $db->lastErrorMsg());
                                }
                                
                                // Vérification après mise à jour
                                $verifySQL = "SELECT * FROM Team". $league ."Lines WHERE TeamNumber = " . $teamid . " AND Day = " . $currentDay;
                                $verifyResult = $db->query($verifySQL);
                                if (!$verifyResult) {
                                    throw new Exception("Erreur de vérification après mise à jour des lignes");
                                }
                            }
                            
                            if (trim($sqlno) != "UPDATE Team". $league ."LinesNumberOnly SET") {
                                // Log de débogage
                                error_log("Executing SQLNO for day " . $currentDay . ": " . $sqlno);
                                
                                if ($db->exec($sqlno) === false) {
                                    throw new Exception("Erreur lors de la mise à jour des numéros: " . $db->lastErrorMsg());
                                }
                                
                                // Vérification après mise à jour
                                $verifySQL = "SELECT * FROM Team". $league ."LinesNumberOnly WHERE TeamNumber = " . $teamid . " AND Day = " . $currentDay;
                                $verifyResult = $db->query($verifySQL);
                                if (!$verifyResult) {
                                    throw new Exception("Erreur de vérification après mise à jour des numéros");
                                }
                            }
                            
                            // Vérifier que les données ont bien été sauvegardées
                            $verifySQL = "SELECT COUNT(*) as cnt FROM Team". $league ."Lines WHERE TeamNumber = " . $teamid . " AND Day = " . $currentDay;
                            $result = $db->querySingle($verifySQL);
                            
                            if ($result == 0) {
                                throw new Exception("Les données n'ont pas été sauvegardées correctement");
                            }
                            
                            $db->exec("COMMIT;");
                            
                            // Afficher un message de succès
                            echo "<div class='alert alert-success' role='alert'>Alignement sauvegardé avec succès!</div>";
                            
                        } catch (Exception $e) {
                            // En cas d'erreur, on annule la transaction
                            $db->exec("ROLLBACK;");
                            echo "<div class='alert alert-danger' role='alert'>Erreur: " . $e->getMessage() . "</div>";
                        }
                        
                        $row = ($teamid > 0) ? api_dbresult_teamname($db,$teamid,$league) : array();
                        $teamname = (!empty($row)) ? $row["FullTeamName"] . " - " : "";
                        $TransactionSQL = "INSERT Into LeagueLog (Number, Text, DateTime, TransactionType) VALUES ('" . rand(90000,99999) . "','Save Lines for " . $teamname . "','" . gmdate('Y-m-d H:i:s') . "','8')";
                        $db->exec($TransactionSQL);
                        
                        $c = "Lines have been saved.";
                    }else{
                        $bannertext = "No changes have been made.";
                    }
                }// end isset $_POST[sbtUpdateLines]?>












<header class="teamColorPale<?= $Theme ?>">
<?php include "Menu.php";?>


<div id="lineeditor">
    <div class="container pagewrapper pagewrapperlineeditor ">

             <?php
             // Définir les variables nécessaires pour l'affichage des matchs
             $currentDay = isset($_REQUEST['selectedDay']) ? (int)$_REQUEST['selectedDay'] : 1;
             $gamesByDayGlobal = getGamesByDayForTeam($db, $t, $league);
             ?>

             <div class="lineSave pb-3 ">
                <div class="row  darkText justify-content-center pt-1 m-0 px-0">

                    <div class="col-3 ">
                        <button id="autolines" onClick="javascript:auto_lines('<?= $league ?>',<?= $cpfields ?>);" type="button" name="btnAutoLines" class="btn btn-info  m-1 shadow "> Auto </button>
                        <button id="linesubmit" type="submit" name="sbtUpdateLines" form="submissionform" class="btn btn-warning  m-1 shadow "> Save</button>
                    </div>
                    <div class="col "> 
                        <div id="errors"></div>
                        <div id="confirmDiv" class="confirm banner"><?php if($bannertext) echo $bannertext; else  echo ""; ?>    </div>
                        <?php
                        // Afficher le match du jour sélectionné
                        $currentDayGame = isset($gamesByDayGlobal[$currentDay]) ? $gamesByDayGlobal[$currentDay] : array('opponent' => 'Pas de match', 'atvs' => '');
                        if($currentDayGame['opponent'] != 'Pas de match') {
                            $currentGameText = $league . " Jour " . $currentDay . ": " . $currentDayGame['atvs'] . " " . $currentDayGame['opponent'];
                        } else {
                            $currentGameText = $league . " Jour " . $currentDay . ": " . $currentDayGame['opponent'];
                        }
                        ?>
                        <h4 class="darkText"><?= $currentGameText ?></h4>
                    </div> 

                    <div class="col-3"> 
                        <button type="button" class="btn btn-warning btn-custom openList btn-lg shadow " > <img src="images/roster.png" alt="Button 2" ><br>Roster </button>
                    </div> 
                </div>
            </div>
           
       
 

        <form id="submissionform" class="STHSWebClient_Form" name="frmEditLines" method="POST" onload="checkCompleteLines();">
            <div class="container-fluid mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <label for="daySelect" class="me-2">Jour:</label>
                            <select class="form-select" id="daySelect" name="selectedDay" style="width: auto;">
                                <?php
                                for($i = 1; $i <= 10; $i++) {
                                    $selected = ($i == $currentDay) ? 'selected' : '';
                                    $gameInfo = isset($gamesByDayGlobal[$i]) ? $gamesByDayGlobal[$i] : array('opponent' => 'Pas de match', 'atvs' => '');

                                    if($gameInfo['opponent'] != 'Pas de match') {
                                        $displayText = "Jour $i: " . $gameInfo['atvs'] . " " . $gameInfo['opponent'];
                                    } else {
                                        $displayText = "Jour $i: " . $gameInfo['opponent'];
                                    }

                                    echo "<option value='$i' $selected>$displayText</option>";
                                }
                                ?>
                            </select>
                            <?php if($currentDay == 1): ?>
                            <button type="button" class="btn btn-outline-primary ms-2" onclick="copyToAllDays()">
                                <i class="fas fa-copy"></i> Copier vers tous les jours
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-secondary me-2" onclick="navigateDay('prev')">
                                <i class="fas fa-chevron-left"></i> Jour précédent
                            </button>
                            <button type="button" class="btn btn-outline-secondary" onclick="navigateDay('next')">
                                Jour suivant <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                        $nextgames = api_get_nextgames($db,$t); // Create a next 10 games array to see the games both Pro and Farm will play.



                        if($league == "Pro"){ $status1 = 3; $isPro = true;  } // Set Pro variables
                        else                { $status1 = 1; $isPro = false; } // Set Farm variables
                        
                        // Select all the lines and players in them for the selected day.
                        $sql = "SELECT l.* FROM Team". $league ."Lines AS l LEFT JOIN Team". $league ."Info AS t ON t.Number = l.TeamNumber ";
                        $sql .= "WHERE t.Number = '" . $teamid . "' AND Day = " . $currentDay . " ";
                        $oRS = $db->query($sql);
                        $row = $oRS->fetchArray();

                        // Si aucune donnée n'existe pour ce jour, créer une entrée vide
                        if (!$row) {
                            // Vérifier si le jour 1 existe pour copier la structure
                            $sql = "SELECT l.* FROM Team". $league ."Lines AS l WHERE l.TeamNumber = '" . $teamid . "' AND Day = 1 ";
                            $oRS = $db->query($sql);
                            $day1Row = $oRS->fetchArray();

                            if ($day1Row) {
                                // Créer une nouvelle entrée pour ce jour en copiant la structure du jour 1 mais avec des valeurs vides pour les joueurs
                                $insertSQL = "INSERT INTO Team". $league ."Lines (TeamNumber, Day) VALUES (" . $teamid . ", " . $currentDay . ")";
                                $db->exec($insertSQL);
                                $insertSQL = "INSERT INTO Team". $league ."LinesNumberOnly (TeamNumber, Day) VALUES (" . $teamid . ", " . $currentDay . ")";
                                $db->exec($insertSQL);

                                // Recharger les données du jour créé
                                $sql = "SELECT l.* FROM Team". $league ."Lines AS l WHERE l.TeamNumber = '" . $teamid . "' AND Day = " . $currentDay . " ";
                                $oRS = $db->query($sql);
                                $row = $oRS->fetchArray();
                            } else {
                                // Si même le jour 1 n'existe pas, créer une structure de base
                                $row = array();
                            }
                        }

                        //log2console($row);        
                        // Fill in arrays needed. // tabs = line pages, 	blocks =  section per page, positions = different position combination for the blocks,	strategy = strategy slider info.  
                        $tabs = api_get_line_arrays("tabs");
                        $blocks = api_get_line_arrays("blocks");
                        $positions = api_get_line_arrays("positions");
                        $strategy = api_get_line_arrays("strategy");
                    ?>
                        
                        



                    <div id="tabs" class="linetabs">
                        <div class="menuPin">
                            <div class="tabsMenu ">
                                <ul class="nav flex-column  " role="tablist">
                                    <?php  
                                    // loop through the tab names creating clickable tabs.
                                    $count = 0; 
                                    $tablink = ($useServerURIInTabLink) ? $_SERVER["REQUEST_URI"] . "#tabs-" : "#tabs-";
                                    foreach($tabs AS $i=>$t){
                                        $displaytab = false;
                                        if($i != "OT")                       $displaytab = true;
                                        elseif($i == "OT" && $customOTlines) $displaytab = true;
                                        else                                 $displaytab = false;
                                        
                                        if($displaytab){

                                            $activeClass = $count ? '' : 'active';
                                        
                                            
                                            ?> 
                                            <li class=" nav-item <?= $activeClass ?>" >
                                                <button class="nav-link <?= $activeClass ?>  id="<?= $t?>-tab" data-bs-toggle="tab" data-bs-target="<?= $tablink . ++$count?>" type="button" role="tab"  tabindex="-1"><?= $t?></button> 
                                            </li><?php


                                            
                                        }
                                    }
                                    $count = 0;
                                    ?>	
                                </ul>
                            </div>
                        </div>

                        <div id="tabs" class="teamColorSecondary<?= $Theme ?> tab-content ">
                                <?php // Loop through the tabs info making the lines pages.
                                foreach($tabs AS $i=>$t) {
                                    $displaytab = false;
                                    if($i != "OT")                       $displaytab = true;
                                    elseif($i == "OT" && $customOTlines) $displaytab = true; 
                                    else                                 $displaytab = false;
                                    
                                    if($displaytab) { ?>
                                        <div id="tabs-<?= ++$count ?>" class="tabcontainer  tab-pane <?php echo ($count == 1) ? 'active show' : ''; ?>  teamColorSecondary<?= $Theme ?> ">
                                        <?php 
//  TABS LINES 
                                        if($i == "Forward" || $i == "Defense" || $i == "PP" || $i == "PK4" || $i == "4VS4" || $i == "PK3"){	
                                            // Each of the if'ed statements above have the same kind of info. 
                                            // display the blocks based on which tabbed page you are on.
                                           
                                            $bcount = 0;
                                            foreach($blocks[$i] AS $bid=>$block){?>
                                                    <div class="  card p-1 id<?= api_MakeCSSClass($i)?> id<?= api_MakeCSSClass($bid)?> teamColorSecondary<?= $Theme ?> ">
                                                        
                                                        <div class=" d-flex justify-content-between align-items-center" >
                                                            <div class=" fs-10 text-start px-2"><?= $block ?> </div>
                                                            <div class="text-end m-0"> 
                                                                <div class="button-container">
                                                                    <div class="btn-group">   
                                                                        <button type="button" class="btn btn-warning btn-custom"  class="toggle-active"  id="toggleButton<?= api_MakeCSSClass($bid)?> " onclick="toggler(event,`sliders<?= api_MakeCSSClass($bid)?>`)" > 
                                                                            <img src="images/strategy.png" alt="Button 1" ></button>
                                                                        <button type="button" class="btn btn-warning btn-custom " class="toggle-active"  id="toggleButton<?= api_MakeCSSClass($bid)?> " onclick="toggler(event, 'persona<?= api_MakeCSSClass($bid)?>')" >
                                                                            <i class="fa-solid fa-user"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="blockcontainer">
                                                            <div class="positionwrapper">
                                                                <?php 	
                                                                // Depending on which page you are on sets up how many blocks are needed.
                                                                // If its anything but 5vs5
                                                                if($i == "PP" || $i == "PK4" || $i == "4VS4" || $i == "PK3"){
                                                                     if($bid == strtolower($i) . "line1" || $bid == strtolower($i) . "line2"){
                                                                        if($i == "PP"){
                                                                            $posit = $positions["Forward"];
                                                                        }elseif($i == "PK3"){
                                                                            $posit = $positions["Forward3"];
                                                                        }else{
                                                                            $posit = $positions["Forward4"];
                                                                        }
                                                                        $exp = explode("line",$bid);
                                                                        $field = "Line". $exp[1] ."". $i ."Forward";
                                                                    }else{
                                                                        $exp = explode("pair",$bid);
                                                                        $posit = $positions["Defense"];
                                                                        $field = "Line". $exp[1] ."". $i ."Defense";
                                                                    }
                                                                // else its 5vs5
                                                                }else{
                                                                    $field = "Line". ++$bcount ."5vs5" . $i;
                                                                    $posit = $positions[$i];                                                                
                                                                }?>

                                                                <div class='row pt-1 ' id='divF<?= $bcount; ?>'>
                                                                    <?php 
                                                                    foreach($posit as $pid => $pos) {
                                                                        // Set player name in each position
                                                                        $playerName = isset($availableplayers[api_MakeCSSClass($row[$field . $pid])]) ? $row[$field . $pid] : ""; //log2console($playername ."  " . $field . " -  ". $pid );
                                                                        ?>
                                                                        <div class='col-4 p-1 '>
                                                                            <div class="card rosterElm draggable p-0" draggable="true">
                                                                                <div class="card-body p-0" >
                                                                                    <input class='colorName  form-control p-0' readonly type="text" placeholder="." aria-label=".." aria-describedby="positionlabel" 
                                                                                        onclick="ChangePlayer('<?= $field . $pid; ?>','<?= $league; ?>','<?= $cpfields; ?>')" 
                                                                                        id="<?= $field . $pid; ?>" name="txtLine[<?= $field . $pid; ?>]" value="<?= $playerName ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php         
                                                                    }
                                                                    ?>

                                                                </div>
    
                                                            </div><!-- end positionwrapper-->
                                                            

                                                            <div class="container sliders " id='sliders<?= api_MakeCSSClass($bid)?>'>
                                                                
                                                                <?php 
                                                                foreach($strategy AS $sid=>$strat){
                                                                    $id = $field . $sid; 
                                                                    $size = 0;
                                                                    if($strat == "Strat"){$size = 1;}
                                                                    elseif($strat == "Time"){$size=3;}
                                                                    else{
                                                                        $exp = explode("-",$strat);
                                                                        if($exp[1] <= 10){$size = 2;}
                                                                        else{$size = 3;}
                                                                    } ?>
                                                                    <div class="row ">    
                                                                        <div class=" strategy strats d-flex align-items-center justify-content-center">
                                                                            <div class="stratlabel my-0 py-0 "><?= $sid?> </div>
                                                                        
                                                                            <div class="plusMinusBtn input-group mx-2 d-flex justify-content-center align-items-center" style="width: auto;">

                                                                                <span class="input-group-btn"  style="">
                                                                                    <button type="button" class="btn btn-danger btn-number form-control"  data-type="minus"   name="btnDown-<?= $id ?>" onclick="valChange('<?= $id ?>','Strat','<?=$field?>','down', '<?=$cpfields?>')">
                                                                                    <i class="fa-solid fa-minus"></i>
                                                                                    </button>
                                                                                </span>
                                                                                <input readonly type="text" id="<?= $id?>" style="width: 75px;" name="txtStrategies[<?= $id ?>]" class="form-control input-number" value="<?= $row[$id] ?>" min="1" max="100">
                                                                                <span class="input-group-btn">
                                                                                    <button type="button" class="btn btn-success btn-number m-0" name="btnUp-<?= $id ?>" data-type="plus"  onclick="valChange('<?= $id ?>','Strat','<?=$field?>','up','<?=$cpfields?>')">
                                                                                    <i class="fa-solid fa-plus"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div> <?php
                                                                }?>  

                                                                <div class="row">  
                                                                    <div class="  time d-flex align-items-center justify-content-center ">
                                                                        <div class="timelabel my-0 py-0">Time%</div>
                                                                    
                                                                        <?php   $id = $field . "Time";   ?>                                                                       
                                                                        <div class="input-group  plusMinusBtn mx-2 d-flex justify-content-center align-items-center" style="width: auto;">
                                                                            <span class="input-group-btn  "  style="">
                                                                                <button type="button" class="btn btn-danger btn-number "  data-type="minus" data-field="quant[2]"  name="btnDown-Time" onclick="valChange('<?= $id ?>','Time','<?=$field?>','down','<?=$cpfields?>')">
                                                                                <i class="fa-solid fa-minus"></i>
                                                                                </button>
                                                                            </span>
                                                                            <input readonly type="text" id="<?= $id?>" style="width: 75px;" name="txtStrategies[<?= $id ?>]" class="form-control input-number" value="<?= $row[$id] ?>" min="1" max="100">
                                                                            <span class="input-group-btn">
                                                                                <button type="button" class="btn btn-success btn-number  m-0" data-type="plus" data-field="quant[2]"  name="btnUp-Time"    onclick="valChange('<?= $id ?>','Time','<?=$field?>','up','<?=$cpfields?>')">
                                                                                <i class="fa-solid fa-plus"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                            </div><!-- end sliders-->


                                                            <div class="container persona" id='persona<?= api_MakeCSSClass($bid)?>'>

                                                                <div class='row pt-1 '>
                                                                    <?php 
                                                                    foreach($posit as $pid => $pos) {
                                                                        // Set player name in each position
                                                                        $playerName = isset($availableplayers[api_MakeCSSClass($row[$field . $pid])]) ? $row[$field . $pid] : ""; 
                                                                        log2console($playername ."  " . $field . " -  ". $pid );

                                                                        ?>
                                                                        <div class='col-4 p-1 '>
                                                                            <div class="card rosterElm  p-0" >
                                                                                <div class="card-body p-0" >
                                                                                   
                                                                                    <span>Overall: </span> <span id="smPov">00 </span>
                                                                                    <span>Condition: </span> <span id="smPco">00 </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php         
                                                                    }
                                                                    ?>

                                                                </div>
    

                                                            </div>


                                        
                                                        </div><!-- end blockcontainer-->
                                                    </div><!-- end linesection <?= api_MakeCSSClass($i)?> <?= api_MakeCSSClass($bid)?>--><?php 
                                                }

                                        }
//  TABS OTHERS                                       
                                        elseif($i == "Others"){ ?>
                                            
                                            <div class="linesection id<?= api_MakeCSSClass($i)?> goalies tab-pane"> <?php // Start with the goalies. ?>
                                                <div class="row">                                                                   
                                                    <?php 
                                                    $GoalerInGame = api_GoalerInGame($db,$league);																
                                                    foreach(array(1=>"Starting Goalie",2=>"Backup Goalie",3=>"Third Goalie") AS $gid=>$g){?>
                                                        <div class=" p-1 m-1 ">
                                                            <?php 
                                                            if ($g == "Third Goalie" AND $GoalerInGame['GoalerInGame'] == 2){echo "<h4 style=\"display:none\">". $g ."</h4>";}else{echo "<h4>". $g ."</h4>";}
                                                            $row["Goaler" . $gid] = (isset($availableplayers[api_MakeCSSClass($row["Goaler".$gid])])) ? $row["Goaler".$gid]: ""; 
                                                            ?>
                                                            <div class="blockcontainer"<?php if ($g == "Third Goalie" AND $GoalerInGame['GoalerInGame'] == 2) echo "style=\"display:none\""; ?>>
                                                                <div class="positionline">
                                                                
                                                                    <input class="textName" id="Goaler<?= $gid ?>" onclick="ChangePlayer('Goaler<?= $gid ?>', '<?= $league ?>', <?= $cpfields ?>)" readonly type="text" name="txtLine[Goaler<?= $gid ?>]" value="<?= $row["Goaler".$gid] ?>">

                                                                </div>
                                                            </div>
                                                        </div><?php 
                                                            
                                                    }?>
                                                </div>    
                                            </div><!-- end linesection goalies-->

                                            <?php 
                                            $field = api_get_line_arrays("otherfield");// Get the other page fields needed for the blocks.
                                            // Make the extra forwards and extra defense.
                                            foreach($field["start"] AS $fsid=>$fs){?>
                                                <div class="linesection id<?= api_MakeCSSClass($i)?> extra <?= $fs?>">
                                                    <h4>Extra <?= $fs?></h4>
                                                            <div class="blockcontainer">
                                                                <?php foreach($field["end"] AS $feid=>$fe){
                                                                    $usefield = "Extra" .$fsid . $fe;
                                                                    if(array_key_exists($usefield, $row)){?>
                                                                        <div class="positionline">
                                                                            <div class="paleText"><?= $fe?></div>
                                                                            <div class="positionname">
                                                                                <?php  $row[$usefield] = (isset($availableplayers[api_MakeCSSClass($row[$usefield])])) ? $row[$usefield] : "";?>
                                                                                <input id="<?= $usefield ?>" onclick="ChangePlayer('<?= $usefield ?>','<?= $league ?>',<?=$cpfields?>);" class="textName" readonly type="text" name="txtLine[<?= $usefield ?>]" value="<?= $row[$usefield] ?>">
                                                                            </div>
                                                                        </div><?php 
                                                                    }
                                                                }?>
                                                            </div><!--end blockcontainer -->
                                                        </div><!-- end linesection --><?php 
                                                    }?>
                                                    <?php // Make the penalty shots order?>
                                                    <div class="linesection id<?= api_MakeCSSClass($i)?> penaltyshots">
                                                        <h4>Penalty Shots</h4>
                                                        <div class="blockcontainer">								
                                                            <div class="penaltyshot">
                                                                <?php  for($x=1;$x<6;$x++){?>
                                                                <div class="positionline">
                                                                    <div class="paleText"><?= $x ?>.</div>
                                                                    <div class="positionname">
                                                                        <?php  $row["PenaltyShots" . $x] = (isset($availableplayers[api_MakeCSSClass($row["PenaltyShots" . $x])])) ? $row["PenaltyShots" . $x] : "";?>
                                                                        <input id="PenaltyShots<?= $x ?>" onclick="ChangePlayer('PenaltyShots<?= $x ?>','<?= $league ?>',<?=$cpfields?>);" class="textName" readonly type="text" name="txtLine[PenaltyShots<?= $x ?>]" value="<?= $row["PenaltyShots" . $x] ?>">
                                                                    </div>	
                                                                </div>
                                                                <?php }?>
                                                            </div>
                                                        </div><!-- end blockcontainer-->
                                                    </div><!-- end linesection penaltyshots-->
                                                <?php


//  TABS OT
                                        }else if($i == "OT"){ 
                                            foreach(array(10=>"Forward",5=>"Defense") AS $i=>$p){?>
                                            <div class="linesection card idot ot<?= $p?>">
                                                            <h4><?= $p?></h4>
                                                            <div class="blockcontainer">
                                                                <?php
                                                                for($x=1;$x<=$i;$x++){
                                                                    ?>
                                                                    <div class="positionline">
                                                                        <div class="positionlabel"><?= $x?>.</div>
                                                                        <div class="positionname">
                                                                            <?php  $row["OT" . $p.$x] = (isset($availableplayers[api_MakeCSSClass($row["OT" . $p.$x])])) ? $row["OT" . $p.$x] : "";?>															
                                                                            <input class="textName" id="OT<?= $p.$x;?>" onclick="ChangePlayer('OT<?= $p.$x;?>','<?= $league ?>',<?=$cpfields?>);"  readonly type="text" name="txtLine[OT<?=$p.$x;?>]" value="<?= $row["OT". $p.$x]; ?>">
                                                                        </div>
                                                                    </div><?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    <?php	
                                                    }
                                        }else if($i == "Strategy"){?>
                                                        <h4>Team Wide Strategy</h4>
                                                                            <div class="strategieswrapper linesection">
                                                                                <?php
                                                                                    $text = "";
                                                                                     for($x=1;$x<=5;$x++){
                                                                                         if($x == 1 || $x == 2){$text = "If winning by ";}
                                                                                         else if($x == 4 || $x == 5){
                                                                                             $text = "If losing by";}
                                                                                         else{$text = "If the score is equal  ";
                                                                                         }
            
                                                                                         ?><div class="strategywrapper teamstrategy teamstrategy<?= $x; ?>">
                                                                                            <div class="strategyamount">
                                                                                                <?= $text ?> 
                                                                                                <?php if($x != 3){?><?php api_make_strategies($row,"Strategy". $x,"GoalDiff","Int-10",$cpfields);?><?php } ?>
                                                                                                then strategy is 
                                                                                            </div>
                                                                                            <div class="strategystrategies">
                                                                                                <div class="">
                                                                                                    <div class="strategy">
                                                                                                        <?php foreach($strategy AS $sid=>$strat){?>
                                                                                                            <div class="strats">
                                                                                                                <div class="stratlabel"><?= $sid?> : </div>
                                                                                                                <div class="stratvalue">
                                                                                                                    <?php api_make_strategies($row,"Strategy" .$x,$sid,"Strat",$cpfields);?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php }?>
                                                                                                    </div><!-- end strategy-->
                                                                                                </div><!-- end strategywrapper-->
                                                                                            </div>
                                                                                        </div><?php
                                                                                     }
                                                                                ?>
                                                                                <div class="strategywrapper PullGoalerMinGoal">
                                                                                    <div class="strategyamount">Goalie Minimum # of Goals before Remove from Game</div>
                                                                                    <div class="strategystrategies"><?php api_make_strategies($row,"PullGoaler","MinGoal","Int-10",$cpfields);?></div>
                                                                                </div>
                                                                                <div class="strategywrapper PullGoalerMinPct">
                                                                                    <div class="strategyamount">Goalie Save PCT Under before Remove from Game</div>
                                                                                    <div class="strategystrategies"><?php api_make_strategies($row,"PullGoaler","MinPct","Int-100",$cpfields);?></div>
                                                                                </div>
                                                                                <div class="strategywrapper RemoveGoalieSecond">
                                                                                    <div class="strategyamount">When to remove the goalies from goal if trailing by 1 in the third period (in seconds)</div>
                                                                                    <div class="strategystrategies"><?php api_make_strategies($row,"Remove","GoaliesSecond","Int-180",$cpfields);?></div>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                    }else{
                                                                        // Make the Offsensive and Defensive Lines.
                                                                        $types = array("Off"=>"Offensive Line","Def"=>"Defensive Line");
                                                                        foreach($types AS $tid=>$t){?>
                                                                            <div class="linesection id<?= api_MakeCSSClass($i)?> penaltyshots">
                                                                                <h4><?= $t?></h4>
                                                                                <div class="blockcontainer"><?php 
                                                                                    $fordef = array("Forward", "Defense");
                                                                                    foreach($fordef AS $fd){
                                                                                        foreach($positions[$fd] AS $pid=>$pos){
                                                                                            $usefield = "LastMin" . $tid . $fd . $pid;
                                                                                            if(array_key_exists($usefield, $row)){
                                                                                                ?>
                                                                                                <div class="positionline">
                                                                                                    <div class="positionlabel"><?= $pos?></div>
                                                                                                    <div class="positionname">
                                                                                                        <?php  $row[$usefield] = (isset($availableplayers[api_MakeCSSClass($row[$usefield])])) ? $row[$usefield]: "";?>
                                                                                                        <?= "<input id=\"". $usefield ."\" onclick=\"ChangePlayer('". $usefield ."','". $league ."',".$cpfields.");\" class=\"textName\" readonly type=\"text\" name=\"txtLine[". $usefield ."]\" value=\"". $row[$usefield] ."\">";?>
                                                                                                    </div>
                                                                                                </div><?php 
                                                                                            }
                                                                                        }
                                                                                    }?>
                                                                                </div><!-- end blockcontainer-->
                                                                            </div><!-- end linesection <?= api_MakeCSSClass($i)?> penaltyshots--><?php 
                                                                        }
                                                                    }?>
                                                                </div><!-- end tabs-<?= $count ?>--><?php 
                                                            }
                                                        }?>
                                              
                        </div><!-- end tabs-->
                    </div><!-- end linetabs-->
                </form>              
            
         

    </div><!-- end pagewrapper-->
</div><!-- end id lineeditor-->


        
        <div id="sideList" class="sideList">
            
            <?php
            // Get all the players and goalies of the team who are dressed
            $sql = api_sql_players_base("Player",$isPro);
            $sql .= "WHERE Team = " . $teamid . " AND Status1 = " . $status1 . " ";
            $sql .= "UNION ";
            $sql .= api_sql_players_base("Goaler",$isPro);
            $sql .= "WHERE Team = " . $teamid . " AND Status1 = " . $status1 . " ";
            $sql .= "ORDER BY Name ASC, Overall DESC ";
            ?>
            <div class="col-12">
                <button type="button" class="btn btn-warning btn-block" onclick="closeList()"> X </button>
            </div>
            <div class="alert alert-info darkText p-1"> <i class="fas fa-info-circle"></i> Double Click to see Player Info card </div> 
            <div class='row justify-content-center'>
                <div class='col-10  d-flex justify-content-center'>
                     <?php api_html_checkboxes_positionlist("sltPlayerList","true","list-item",null,null); ?>
                </div> 
            </div> 
             
            
            <div class="playerlist justify-content-start p-0">
                
                <form name="frmPlayerList">                
                    <ul class="playerselect list-group">
                        <?php 
                        $oRS = $db->query($sql);
                        $first = true;
                        while($row = $oRS->fetchArray()) {
                            if($first){$s = " checked"; $first = false;} else {$s = "";}
                            $values = api_fields_input_values($row); ?>
                            
                            <li id="line1_<?= api_MakeCSSClass($row["Name"])?>" class="option list-group-item" data-id="<?= $row['Number'] ?>">
                                <input name="sltPlayerList" type="radio" id="a<?= api_MakeCSSClass($row["Name"]); ?>" <?= $s;?> value="<?= $values; ?>">
                                <label for="a<?= api_MakeCSSClass($row["Name"]); ?>"><?= $row['Name']; ?> - <?= $row['PositionString']; ?> 
                                    <span class=""><small>(<?= $row['Overall']; ?> OV)</small></span>
                                </label>
                            
                            </li>
                        <?php } ?>
                        <li class="option">
                            <input name="sltPlayerList" type="radio" id="aRemove" value="">
                            <label for="aRemove">Remove Player/Goalie</label>
                        </li>
                    </ul>
                </form><!-- end frmPlayerList-->

            </div><!-- end playerlist-->

        </div>
        
                  

</header>                






<!-- Side Navigation -->
<div id="sideNavR" class="sidenavR">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div id="sideNavContent">PlayerCardC will appear here...</div>
</div>
            
            
            
<script>
    function deactivateBanners() {
        const banners = document.querySelectorAll('.banner'); 
        banners.forEach(banner => { banner.style.display = 'none'; // Hides the banner 
        });
    }
   
    setTimeout(deactivateBanners, 5000);                    // Hide the confirm banner after 5 seconds
    document.addEventListener('click', deactivateBanners);  // Hide the confirm banner on user interaction
</script>



<div id="playerInfoContainer"></div>            


<?php 
            }
		}else{
			echo "<div class=\"STHSDivInformationMessage\">" . $NoUserLogin . "<br /><br /></div>";		
		}
?>

<script type="text/javascript">
    function navigateDay(direction) {
        const select = document.getElementById('daySelect');
        const currentDay = parseInt(select.value);
        let newDay = currentDay;

        if (direction === 'prev' && currentDay > 1) {
            newDay = currentDay - 1;
        } else if (direction === 'next' && currentDay < 10) {
            newDay = currentDay + 1;
        }

        if (newDay !== currentDay) {
            const currentUrl = new URL(window.location);
            currentUrl.searchParams.set('selectedDay', newDay);
            window.location.href = currentUrl.toString();
        }
    }

    function copyToAllDays() {
        if (confirm('Voulez-vous copier les alignements du jour 1 vers tous les autres jours (2-10)?')) {
            // Créer un champ caché pour indiquer l'action de copie vers tous les jours
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'copyToAllDays';
            input.value = 'true';
            document.getElementById('submissionform').appendChild(input);
            
            // Soumettre le formulaire
            document.getElementById('submissionform').submit();
        }
    }

    // Ajouter un écouteur d'événements pour le changement de jour
    document.getElementById('daySelect').addEventListener('change', function() {
        const selectedDay = this.value;
        const currentUrl = new URL(window.location);
        currentUrl.searchParams.set('selectedDay', selectedDay);
        window.location.href = currentUrl.toString();
    });
</script>

<?php
	// Close the db connection
	$db->close();
       
}?>
    
<?php include ("Footer.php"); ?>

<script>

const TeamProInfo = <?php echo json_encode($TeamProInfo); ?>;
console.log(TeamProInfo)

const TeamPlayerInfo = <?php echo json_encode($TeamPlayerInfo); ?>;
console.log(TeamPlayerInfo)

// League status for dressed players (3 = Pro, 1 = Farm)
const isProLeague = <?php echo isset($isPro) && $isPro ? 'true' : 'false'; ?>;
const dressedStatus = isProLeague ? 3 : 1;


</script>

<script type="text/javascript">
// Prevent duplicate players in 5v5 Forwards when saving; show "incomplete lines" if duplicates
(function() {
    const form = document.getElementById('submissionform');
    if (!form) return;

    function getVal(id){
        const el = document.getElementById(id);
        return el ? (el.value || '').trim() : '';
    }
    function setVal(id, v){
        const el = document.getElementById(id);
        if (el) el.value = v;
    }

    function hasDuplicateForwards(){
        const ids = [
            'Line15vs5ForwardLeftWing','Line15vs5ForwardCenter','Line15vs5ForwardRightWing',
            'Line25vs5ForwardLeftWing','Line25vs5ForwardCenter','Line25vs5ForwardRightWing',
            'Line35vs5ForwardLeftWing','Line35vs5ForwardCenter','Line35vs5ForwardRightWing',
            'Line45vs5ForwardLeftWing','Line45vs5ForwardCenter','Line45vs5ForwardRightWing'
        ];
        const seen = new Set();
        for (let i=0;i<ids.length;i++){
            const v = getVal(ids[i]);
            if (!v) continue;
            const k = v.toLowerCase();
            if (seen.has(k)) return true;
            seen.add(k);
        }
        return false;
    }

    function eligibleForwardNames(){
        try{
            return (TeamPlayerInfo || [])
                .filter(p => String(p['Status1']) == String(dressedStatus))
                .filter(p => (p['PosC'] === 'True' || p['PosLW'] === 'True' || p['PosRW'] === 'True'))
                .map(p => p['Name']);
        }catch(e){ return []; }
    }

    function enforceUniqueForwards(){ // legacy: now replaced by auto-fill variant
        const ids = [
            'Line15vs5ForwardLeftWing','Line15vs5ForwardCenter','Line15vs5ForwardRightWing',
            'Line25vs5ForwardLeftWing','Line25vs5ForwardCenter','Line25vs5ForwardRightWing',
            'Line35vs5ForwardLeftWing','Line35vs5ForwardCenter','Line35vs5ForwardRightWing',
            'Line45vs5ForwardLeftWing','Line45vs5ForwardCenter','Line45vs5ForwardRightWing'
        ];
        const seen = new Set();
        let cleared = false;
        for (let i=0;i<ids.length;i++){
            const id = ids[i];
            const v = getVal(id);
            if (!v) continue;
            const k = v.toLowerCase();
            if (seen.has(k)){
                setVal(id, '');
                cleared = true;
            } else {
                seen.add(k);
            }
        }
        if (cleared){
            autoFillForwardBlanks();
        }
        return !cleared;
    }

    function autoFillForwardBlanks(){
        const ids = [
            'Line15vs5ForwardLeftWing','Line15vs5ForwardCenter','Line15vs5ForwardRightWing',
            'Line25vs5ForwardLeftWing','Line25vs5ForwardCenter','Line25vs5ForwardRightWing',
            'Line35vs5ForwardLeftWing','Line35vs5ForwardCenter','Line35vs5ForwardRightWing',
            'Line45vs5ForwardLeftWing','Line45vs5ForwardCenter','Line45vs5ForwardRightWing'
        ];
        const pool = new Set(eligibleForwardNames().map(n => n.toLowerCase()));
        // Remove already uniquely assigned names from pool
        const usedOnce = new Set();
        for (let i=0;i<ids.length;i++){
            const v = getVal(ids[i]);
            if (!v) continue;
            const k = v.toLowerCase();
            if (!usedOnce.has(k)) usedOnce.add(k);
        }
        usedOnce.forEach(k => pool.delete(k));

        let filled = false;
        for (let i=0;i<ids.length;i++){
            if (!getVal(ids[i])){
                const next = pool.values().next();
                if (!next.done){
                    const name = next.value;
                    // restore original casing using TeamPlayerInfo
                    const original = (TeamPlayerInfo || []).find(p => p['Name'].toLowerCase() === name);
                    setVal(ids[i], original ? original['Name'] : name);
                    pool.delete(name);
                    filled = true;
                }
            }
        }
        const banner = document.getElementById('confirmDiv');
        if (banner){
            banner.classList.add('alert','alert-info');
            banner.textContent = filled
                ? 'Auto: empty/duplicate forward slots filled with unused eligible forwards.'
                : 'Auto: no unused eligible forwards available to fill remaining slots.';
            banner.style.display = 'block';
        }
        if (typeof checkCompleteLines === 'function'){
            try { checkCompleteLines(); } catch(_){}
        }
    }

    form.addEventListener('submit', function(e){
        if (hasDuplicateForwards()){
            e.preventDefault();
            const banner = document.getElementById('confirmDiv');
            if (banner){
                banner.classList.add('alert','alert-danger');
                banner.textContent = 'Incomplete lines: a player is used twice in 5v5 Forwards.';
                banner.style.display = 'block';
            } else {
                alert('Incomplete lines: duplicate player in 5v5 Forwards.');
            }
            // Try to show the Forwards tab
            const fwTabBtn = document.querySelector('button#Forward-tab');
            if (fwTabBtn) { try { fwTabBtn.click(); } catch(_){} }
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    // After clicking Auto, enforce uniqueness on the auto-filled forwards
    const autoBtn = document.getElementById('autolines');
    if (autoBtn){
        autoBtn.addEventListener('click', function(){
            // auto_lines runs on click; enforce uniqueness right after a brief delay
            setTimeout(function(){
                // First remove duplicates if any, then fill remaining blanks with unused eligible forwards
                if (!enforceUniqueForwards()) {
                    // duplicates were found and cleared; enforceUniqueForwards already calls autoFillForwardBlanks
                } else {
                    autoFillForwardBlanks();
                }
            }, 50);
        });
    }
})();
</script>


</body></html>









