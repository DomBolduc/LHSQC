<?php
// Composant Draft Picks dynamique
// Fonctionne exactement comme dans ProTeam.php
// Affiche l'équipe spécifiée dans l'URL ou l'équipe de l'utilisateur connecté

// Vérifier si la connexion à la base de données existe (normalement incluse via Header.php)
if (!isset($db)) {
    // Connexion temporaire à la base de données
    $DatabaseFile = 'LHSQC-STHS.db';
    if (file_exists($DatabaseFile)) {
        $db = new SQLite3($DatabaseFile);
    } else {
        // Essayer le chemin relatif depuis le répertoire components
        $DatabaseFile = '../LHSQC-STHS.db';
        if (file_exists($DatabaseFile)) {
            $db = new SQLite3($DatabaseFile);
        } else {
            $db = null;
        }
    }
}

// Vérifier si CookieTeamNumber est défini (normalement inclus via Cookie.php)
if (!isset($CookieTeamNumber)) {
    $CookieTeamNumber = 0;
}

// Récupérer l'équipe sélectionnée (comme dans ProTeam.php)
$selectedTeam = 0;
if (isset($Team) && $Team > 0) {
    $selectedTeam = $Team;
} elseif (isset($_GET['Team'])) {
    $selectedTeam = filter_var($_GET['Team'], FILTER_SANITIZE_NUMBER_INT);
}

// Si aucune équipe spécifiée, utiliser l'équipe de l'utilisateur connecté
if ($selectedTeam == 0 && $CookieTeamNumber > 0 && $CookieTeamNumber <= 100) {
    $selectedTeam = $CookieTeamNumber;
}

// Récupérer les informations de la ligue et de l'équipe
try {
    // Vérifier si la base de données est disponible
    if ($db === null) {
        throw new Exception("Database not available");
    }
    
    // Vérifier si une équipe valide est sélectionnée
    if ($selectedTeam == 0 || $selectedTeam > 100) {
        throw new Exception("No valid team selected");
    }
    
    // Récupérer les informations de la ligue
    $Query = "Select Name, DraftPickByYear from LeagueGeneral";
    $LeagueGeneral = $db->querySingle($Query, true);
    
    // Récupérer les informations de l'équipe
    $Query = "SELECT Name, Abbre FROM TeamProInfo WHERE Number = " . $selectedTeam;
    $TeamInfo = $db->querySingle($Query, true);
    
    // Requêtes exactement comme dans ProTeam.php
    $Query = "SELECT * FROM DraftPick WHERE TeamNumber = " . $selectedTeam . " ORDER By Year, Round";
    $TeamDraftPick = $db->query($Query);
    
    $Query = "SELECT * FROM DraftPick WHERE ConditionalTrade = '" . $TeamInfo['Abbre'] . "' ORDER By Year, Round";
    $TeamDraftPickCon = $db->query($Query);
    
} catch (Exception $e) {
    // En cas d'erreur, utiliser des variables null
    $LeagueGeneral = null;
    $TeamInfo = null;
    $TeamDraftPick = null;
    $TeamDraftPickCon = null;
}

// Vérifier si les variables de langue sont disponibles
if (!isset($TeamLang)) {
    $TeamLang = array(
        'DraftPicks' => 'Draft Picks',
        'Year' => 'Year'
    );
}

if (!isset($TradeLang)) {
    $TradeLang = array(
        'DraftPicksCon' => 'Conditional Draft Picks'
    );
}

// Vérifier si le chemin des images est disponible
if (!isset($ImagesCDNPath)) {
    $ImagesCDNPath = '';
}
?>

<br />
<h3 class="STHSTeamProspect_DraftPick">
    <?php 
    if ($TeamInfo !== null) {
        echo $TeamInfo['Name'] . " - " . $TeamLang['DraftPicks'];
    } else {
        echo $TeamLang['DraftPicks'];
    }
    ?>
</h3>
<table class="STHSPHPTeamStat_Table"><tr><th class="STHSW140"><?php echo $TeamLang['Year'];?></th>
<?php
if (empty($TeamDraftPick) == false && $LeagueGeneral !== null){
	/* Create Header Based on the $LeagueGeneral['DraftPickByYear'] Variable */
	$LoopCount = (integer)0;
	$DraftPickByYear = (integer)$LeagueGeneral['DraftPickByYear'];
	if($DraftPickByYear >= 10){$DraftPickByYear = 10;}
	for($x = 1; $x <= $LeagueGeneral['DraftPickByYear'];$x++){
		$LoopCount +=1;
		echo "<th class=\"STHSW140\">R" . $LoopCount . "</th>";
	}
	echo "</tr>\n";

	/* Very Complexe Logic to Loop throw Variable and make a valid HTML5 Table */
	$CurrentYear = (integer)0;
	$CurrentRound = (integer)0;
	while ($row = $TeamDraftPick ->fetchArray()) {
		If ($CurrentYear <> $row['Year']){
			if ($CurrentRound < $DraftPickByYear  AND $CurrentRound > 0){for($x = $CurrentRound; $x < $DraftPickByYear; $x++){echo "<td></td>";}echo "</tr>\n"; /* Code to Create Empty TD if team doesn't have last round Pick */
			}elseif ($CurrentYear > 0){echo "</td></tr>\n"; /* Close the Row for this Year */}
			$CurrentYear = $row['Year'];
			$CurrentRound = 0;
			Echo "<tr><td>" . $CurrentYear; /* Open for Row for the Year */
		}
		for($x = $CurrentRound; $x < $row['Round'];$x++){
			echo "</td><td>"; /* Close the Cell for last Round and Reopen a new one */
			$CurrentRound = $row['Round'];
		}
		If ($row['FromTeamThemeID'] > 0){
			echo "<img src=\"" . $ImagesCDNPath . "/images/" . $row['FromTeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPDraftPickTeamImage \" /> ";		
		}else{
			echo $row['FromTeamAbbre'] . " ";
		}
		if ($row['ConditionalTrade'] != ""){echo "<span title=\"" . $row['ConditionalTradeExplication'] . "\">[CON: " . $row['ConditionalTrade'] . "]</span>";}
	}
	if ($CurrentRound < $DraftPickByYear  AND $CurrentRound > 0){for($x = $CurrentRound; $x < $DraftPickByYear; $x++){echo "<td></td>";}echo "</tr>\n";}else{echo "</td></tr>";} /* Code to Create Empty TD if team doesn't have last round Pick for the last year*/
	if (empty($TeamDraftPickCon) == false){
		echo "<tr><td><strong>" . $TradeLang['DraftPicksCon']. "</strong></td><td colspan=\"4\">";
		while ($row = $TeamDraftPickCon ->fetchArray()) {
			echo "<span title=\"" . $row['ConditionalTradeExplication'] . "\">" . $row['FromTeamAbbre'] . " - Y:" . $row['Year'] . " - R:" . $row['Round'] . "</span> / ";
		}
		echo "</td></tr>\n";
	}
	echo "</table>\n";
}else{
	echo "</tr></table>";
}
?>
