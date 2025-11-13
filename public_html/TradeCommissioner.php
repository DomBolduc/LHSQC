<?php include "Header.php";
If ($lang == "fr"){include 'LanguageFR-Main.php';}else{include 'LanguageEN-Main.php';}
$Title = (string)"";
$Team = (integer)0;
$LeagueName = (string)"";
$TradeFound = (string)False;
$Approve = False;
$Refuse = False;
$InformationMessage = (string)"";

$AlreadyShow = array();
for($Temp1 = 0; $Temp1 <= 100; $Temp1++){
	for($Temp2 = 0; $Temp2 <= 100; $Temp2++){
		$AlreadyShow[$Temp1][$Temp2] = "";
	}
}

If (file_exists($DatabaseFile) == false){
	Goto STHSErrorTradeCommissioner;
}else{try{
	$db = new SQLite3($DatabaseFile);
	
	// Base de données séparée pour les approbations (ne sera PAS écrasée par les exports)
	$TradeApprovalDBFile = "LHSQC-TradeApproval.db";
	$approvalDB = new SQLite3($TradeApprovalDBFile);
	
	// Créer la table si elle n'existe pas
	$createTable = "CREATE TABLE IF NOT EXISTS TradeCommissionerApproval (
		ApprovalID INTEGER PRIMARY KEY AUTOINCREMENT,
		FromTeam INTEGER NOT NULL,
		ToTeam INTEGER NOT NULL,
		Team2Confirmed TEXT DEFAULT NULL,
		CommissionerApproved TEXT DEFAULT NULL,
		ApprovalDate DATETIME DEFAULT CURRENT_TIMESTAMP,
		UNIQUE(FromTeam, ToTeam)
	)";
	$approvalDB->exec($createTable);
	$approvalDB->exec("CREATE INDEX IF NOT EXISTS idx_trade_teams ON TradeCommissionerApproval(FromTeam, ToTeam)");
	
	// Vérifier que l'utilisateur est le commissaire (Team 102)
	If ($CookieTeamNumber != 102){
		$InformationMessage = "Accès réservé au commissaire de la ligue.";
		$TradeFromTeam = Null;
	}else{
		$Query = "Select AllowTradefromWebsite from LeagueWebClient";
		$LeagueWebClient = $db->querySingle($Query,true);
		
		$Query = "Select Name, TradeDeadLinePass from LeagueGeneral";
		$LeagueGeneral = $db->querySingle($Query,true);		
		$LeagueName = $LeagueGeneral['Name'];
		$Title = "Approbation des Trades par le Commissaire";
		
		// Gérer l'approbation/refus
		if(isset($_POST['Approve'])){
			$FromTeam = filter_var($_POST['FromTeam'], FILTER_SANITIZE_NUMBER_INT);
			$ToTeam = filter_var($_POST['ToTeam'], FILTER_SANITIZE_NUMBER_INT);
			
			// Vérifier que Team1 a confirmé dans la table Trade principale
			$Query = "SELECT COUNT(*) as Count FROM Trade WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam . " AND ConfirmFrom = 'True'";
			$CheckConfirmFrom = $db->querySingle($Query, true);
			
			// Vérifier que Team2 a confirmé dans la table séparée
			$checkTeam2 = $approvalDB->querySingle("SELECT Team2Confirmed FROM TradeCommissionerApproval WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam, true);
			
			if($CheckConfirmFrom['Count'] > 0 && $checkTeam2 && $checkTeam2['Team2Confirmed'] == 'True'){
				// Enregistrer l'approbation du commissaire dans la table séparée
				$Query = "INSERT OR REPLACE INTO TradeCommissionerApproval (FromTeam, ToTeam, Team2Confirmed, CommissionerApproved, ApprovalDate) VALUES (" . $FromTeam . ", " . $ToTeam . ", 'True', 'True', datetime('now'))";
				try {
					$approvalDB->exec($Query);
					
					// MAINTENANT, mettre ConfirmTo = 'True' dans la table Trade principale
					$Query = "UPDATE Trade SET ConfirmTo = 'True' WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam;
					$db->exec($Query);
					
					// EXÉCUTER LE TRADE IMMÉDIATEMENT - Transférer tous les assets
					$tradeErrors = [];
					
					// Récupérer les infos des équipes pour les transferts
					$QueryTeam1 = "SELECT Number, Name FROM TeamProInfo WHERE Number = " . $FromTeam;
					$Team1Info = $db->querySingle($QueryTeam1, true);
					$QueryTeam2 = "SELECT Number, Name FROM TeamProInfo WHERE Number = " . $ToTeam;
					$Team2Info = $db->querySingle($QueryTeam2, true);
					
					// 1. Transférer les joueurs de Team1 vers Team2
					$QueryPlayers = "SELECT Player FROM Trade WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam . " AND Player > 0";
					$Players = $db->query($QueryPlayers);
					while ($player = $Players->fetchArray()) {
						if ($player['Player'] > 0 && $player['Player'] < 10000) {
							// Joueur
							$UpdateQuery = "UPDATE PlayerInfo SET Team = " . $Team2Info['Number'] . ", TeamName = '" . str_replace("'", "''", $Team2Info['Name']) . "', ProTeamName = '" . str_replace("'", "''", $Team2Info['Name']) . "' WHERE Number = " . $player['Player'];
							$db->exec($UpdateQuery);
						} elseif ($player['Player'] >= 10000) {
							// Gardien
							$UpdateQuery = "UPDATE GoalerInfo SET Team = " . $Team2Info['Number'] . ", TeamName = '" . str_replace("'", "''", $Team2Info['Name']) . "', ProTeamName = '" . str_replace("'", "''", $Team2Info['Name']) . "' WHERE Number = " . ($player['Player'] - 10000);
							$db->exec($UpdateQuery);
						}
					}
					
					// 2. Transférer les joueurs de Team2 vers Team1
					$QueryPlayers2 = "SELECT Player FROM Trade WHERE FromTeam = " . $ToTeam . " AND ToTeam = " . $FromTeam . " AND Player > 0";
					$Players2 = $db->query($QueryPlayers2);
					while ($player = $Players2->fetchArray()) {
						if ($player['Player'] > 0 && $player['Player'] < 10000) {
							// Joueur
							$UpdateQuery = "UPDATE PlayerInfo SET Team = " . $Team1Info['Number'] . ", TeamName = '" . str_replace("'", "''", $Team1Info['Name']) . "', ProTeamName = '" . str_replace("'", "''", $Team1Info['Name']) . "' WHERE Number = " . $player['Player'];
							$db->exec($UpdateQuery);
						} elseif ($player['Player'] >= 10000) {
							// Gardien
							$UpdateQuery = "UPDATE GoalerInfo SET Team = " . $Team1Info['Number'] . ", TeamName = '" . str_replace("'", "''", $Team1Info['Name']) . "', ProTeamName = '" . str_replace("'", "''", $Team1Info['Name']) . "' WHERE Number = " . ($player['Player'] - 10000);
							$db->exec($UpdateQuery);
						}
					}
					
					// 3. Transférer les prospects de Team1 vers Team2
					$QueryProspects = "SELECT Prospect FROM Trade WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam . " AND Prospect > 0";
					$Prospects = $db->query($QueryProspects);
					while ($prospect = $Prospects->fetchArray()) {
						$UpdateQuery = "UPDATE Prospects SET TeamNumber = " . $Team2Info['Number'] . " WHERE Number = " . $prospect['Prospect'];
						$db->exec($UpdateQuery);
					}
					
					// 4. Transférer les prospects de Team2 vers Team1
					$QueryProspects2 = "SELECT Prospect FROM Trade WHERE FromTeam = " . $ToTeam . " AND ToTeam = " . $FromTeam . " AND Prospect > 0";
					$Prospects2 = $db->query($QueryProspects2);
					while ($prospect = $Prospects2->fetchArray()) {
						$UpdateQuery = "UPDATE Prospects SET TeamNumber = " . $Team1Info['Number'] . " WHERE Number = " . $prospect['Prospect'];
						$db->exec($UpdateQuery);
					}
					
					// 5. Transférer les choix au repêchage de Team1 vers Team2
					$QueryDraft = "SELECT DraftPick FROM Trade WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam . " AND DraftPick > 0";
					$Drafts = $db->query($QueryDraft);
					while ($draft = $Drafts->fetchArray()) {
						$draftPickNum = $draft['DraftPick'];
						if ($draftPickNum >= 10000) {
							$draftPickNum = $draftPickNum - 10000; // Choix conditionnel
						}
						$UpdateQuery = "UPDATE DraftPick SET TeamNumber = " . $Team2Info['Number'] . " WHERE InternalNumber = " . $draftPickNum;
						$db->exec($UpdateQuery);
					}
					
					// 6. Transférer les choix au repêchage de Team2 vers Team1
					$QueryDraft2 = "SELECT DraftPick FROM Trade WHERE FromTeam = " . $ToTeam . " AND ToTeam = " . $FromTeam . " AND DraftPick > 0";
					$Drafts2 = $db->query($QueryDraft2);
					while ($draft = $Drafts2->fetchArray()) {
						$draftPickNum = $draft['DraftPick'];
						if ($draftPickNum >= 10000) {
							$draftPickNum = $draftPickNum - 10000; // Choix conditionnel
						}
						$UpdateQuery = "UPDATE DraftPick SET TeamNumber = " . $Team1Info['Number'] . " WHERE InternalNumber = " . $draftPickNum;
						$db->exec($UpdateQuery);
					}
					
					// 7. Transférer l'argent et salary cap
					// De Team1 vers Team2
					$QueryMoney = "SELECT SUM(Money) as TotalMoney, SUM(SalaryCapY1) as TotalCapY1, SUM(SalaryCapY2) as TotalCapY2 FROM Trade WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam;
					$Money1 = $db->querySingle($QueryMoney, true);
					
					// De Team2 vers Team1
					$QueryMoney2 = "SELECT SUM(Money) as TotalMoney, SUM(SalaryCapY1) as TotalCapY1, SUM(SalaryCapY2) as TotalCapY2 FROM Trade WHERE FromTeam = " . $ToTeam . " AND ToTeam = " . $FromTeam;
					$Money2 = $db->querySingle($QueryMoney2, true);
					
					// Mettre à jour les finances des équipes
					if ($Money1['TotalMoney'] > 0 || $Money2['TotalMoney'] > 0) {
						// Team1 donne de l'argent à Team2
						if ($Money1['TotalMoney'] > 0) {
							$db->exec("UPDATE TeamProInfo SET CurrentBankAccount = CurrentBankAccount - " . $Money1['TotalMoney'] . " WHERE Number = " . $FromTeam);
							$db->exec("UPDATE TeamProInfo SET CurrentBankAccount = CurrentBankAccount + " . $Money1['TotalMoney'] . " WHERE Number = " . $ToTeam);
						}
						// Team2 donne de l'argent à Team1
						if ($Money2['TotalMoney'] > 0) {
							$db->exec("UPDATE TeamProInfo SET CurrentBankAccount = CurrentBankAccount - " . $Money2['TotalMoney'] . " WHERE Number = " . $ToTeam);
							$db->exec("UPDATE TeamProInfo SET CurrentBankAccount = CurrentBankAccount + " . $Money2['TotalMoney'] . " WHERE Number = " . $FromTeam);
						}
					}
					
					// 8. SUPPRIMER le trade de la table Trade maintenant qu'il est exécuté
					// Cela permet aux équipes de faire un nouveau trade entre elles
					$DeleteQuery = "DELETE FROM Trade WHERE (FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam . ") OR (FromTeam = " . $ToTeam . " AND ToTeam = " . $FromTeam . ")";
					$db->exec($DeleteQuery);
					
					$InformationMessage = "✅ Trade approuvé avec succès ! Tous les joueurs, prospects et choix au repêchage ont été transférés.";
					$Approve = True;
				} catch (Exception $e) {
					$InformationMessage = "Erreur lors de l'approbation du trade: " . $e->getMessage();
				}
			}else{
				$InformationMessage = "Les deux équipes doivent confirmer le trade avant l'approbation.";
			}
		}
		
		if(isset($_POST['Refuse'])){
			$FromTeam = filter_var($_POST['FromTeam'], FILTER_SANITIZE_NUMBER_INT);
			$ToTeam = filter_var($_POST['ToTeam'], FILTER_SANITIZE_NUMBER_INT);
			
			// Supprimer l'approbation de la table séparée et le trade de la table principale
			$Query = "DELETE FROM TradeCommissionerApproval WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam;
			try {
				$approvalDB->exec($Query);
				// Supprimer aussi le trade de la table principale
				$Query = "DELETE FROM Trade WHERE FromTeam = " . $FromTeam . " AND ToTeam = " . $ToTeam;
				$db->exec($Query);
				$InformationMessage = "Trade refusé et supprimé.";
				$Refuse = True;
			} catch (Exception $e) {
				$InformationMessage = "Erreur lors du refus du trade: " . $e->getMessage();
			}
		}
		
		If($LeagueGeneral['TradeDeadLinePass'] == "False" AND $LeagueWebClient['AllowTradefromWebsite'] == "True"){
			// Vérifier si la base de données d'approbation existe
			if(!file_exists($TradeApprovalDBFile)){
				$InformationMessage = "⚠️ La base de données d'approbation n'existe pas encore. Les deux équipes doivent d'abord confirmer un trade pour créer la base de données.";
				$TradeFromTeam = Null;
			}else{
				// Récupérer les trades où :
				// - Team1 a confirmé (ConfirmFrom = 'True' dans Trade)
				// - Team2 a confirmé (Team2Confirmed = 'True' dans TradeCommissionerApproval)
				// - Mais le commissaire n'a pas encore approuvé (CommissionerApproved != 'True')
				// - Et ConfirmTo n'est PAS encore 'True' (pour éviter les doublons)
				
				$db->exec("ATTACH DATABASE '" . realpath($TradeApprovalDBFile) . "' AS ApprovalDB");
				
				$Query = "Select DISTINCT t.FromTeam, t.ToTeam 
					FROM Trade t 
					INNER JOIN ApprovalDB.TradeCommissionerApproval a ON t.FromTeam = a.FromTeam AND t.ToTeam = a.ToTeam
					WHERE t.ConfirmFrom = 'True' 
					AND t.ConfirmTo = 'False'
					AND a.Team2Confirmed = 'True'
					AND (a.CommissionerApproved IS NULL OR a.CommissionerApproved != 'True')
					GROUP BY t.FromTeam, t.ToTeam";
				
				$TradeFromTeam = $db->query($Query);
				
				// Debug: vérifier s'il y a des trades dans la table principale
				$debugQuery = "SELECT COUNT(*) as total FROM Trade WHERE ConfirmFrom = 'True' AND ConfirmTo = 'False'";
				$debugResult = $db->querySingle($debugQuery, true);
				
				// Debug: vérifier s'il y a des confirmations dans la table d'approbation
				$debugQuery2 = "SELECT COUNT(*) as total FROM ApprovalDB.TradeCommissionerApproval WHERE Team2Confirmed = 'True'";
				$debugResult2 = $db->querySingle($debugQuery2, true);
				
				if($debugResult['total'] > 0 && $debugResult2['total'] == 0){
					$InformationMessage = "ℹ️ Debug: Il y a " . $debugResult['total'] . " trade(s) où Team1 a confirmé, mais " . $debugResult2['total'] . " confirmation(s) de Team2 dans la base séparée. Team2 doit confirmer via TradeOtherTeam.php.";
				}	
			}
		}else{
			$TradeFromTeam = Null;
		}
	}
	
	echo "<title>" . $LeagueName . " - " . $Title  . "</title>";
} catch (Exception $e) {
STHSErrorTradeCommissioner:
	$LeagueName = $DatabaseNotFound;
	$LeagueOutputOption = Null;
	echo "<title>" . $DatabaseNotFound . "</title>";
	$Title = $DatabaseNotFound;
	$TradeFromTeam = Null;
}}?>
</head><body>
<?php include "Menu.php";?>
<div style="width:99%;margin:auto;">
	<?php echo "<h1>" . $Title . "</h1>"; 
	if ($InformationMessage != ""){echo "<div class=\"STHSDivInformationMessage\">" . $InformationMessage . "<br /><br /></div>";}?>
	<table class="STHSTableFullW">
	
<?php
if ($CookieTeamNumber == 102 && empty($TradeFromTeam) == false){while ($Row = $TradeFromTeam ->fetchArray()) {	
	$TradeFound = True;
	$Team = $Row['FromTeam'];
	$ToTeam = $Row['ToTeam'];
	echo "<tr><td style=\"vertical-align:top\">";

	// Vérifier que les deux équipes ont confirmé mais que le commissaire n'a pas encore approuvé
	$Query = "Select * From Trade WHERE FromTeam = " . $Team . " AND ToTeam = " . $ToTeam  . " AND ConfirmFrom = 'True' AND ConfirmTo = 'False'";
	$TradeMain =  $db->querySingle($Query,true);

	If ($AlreadyShow[$Team][$TradeMain['ToTeam']] == ""){
	$AlreadyShow[$Team][$TradeMain['ToTeam']] = "Y";
	$AlreadyShow[$TradeMain['ToTeam']][$Team] = "Y";
	
	$Query = "SELECT Number, Name, Abbre, TeamThemeID FROM TeamProInfo Where Number = " . $TradeMain['FromTeam'];
	$TeamFrom =  $db->querySingle($Query,true);
	$Query = "SELECT Number, Name, Abbre, TeamThemeID FROM TeamProInfo Where Number = " . $TradeMain['ToTeam'];
	$TeamTo =  $db->querySingle($Query,true);
	
	echo "<div class=\"STHSPHPTradeTeamName\">" .  $TradeLang['From'];
	If ($TeamFrom['TeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $TeamFrom['TeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTradeTeamImage \" />";}
    echo $TeamFrom['Name'] . "</div><br />";
		
	$Query = "Select * From Trade WHERE FromTeam = " . $Team . " AND ToTeam = " . $ToTeam  . " AND Player > 0 AND ConfirmFrom = 'True' ORDER BY Player";
	$Trade =  $db->query($Query);	
	$Count = 0;
	if (empty($Trade) == false){while ($Row = $Trade ->fetchArray()) {
		If ($Row['Player']> 0 and $Row['Player']< 10000){
			/* Players */
			$Count +=1;if ($Count > 1){echo " / ";}else{echo $TradeLang['Players'] . " : ";}
			$Query = "SELECT Name FROM PlayerInfo WHERE Number = " . $Row['Player'];
			$Data = $db->querySingle($Query,true);	
			echo $Data['Name'];
		}elseif($Row['Player']> 10000 and $Row['Player']< 11000){
			/* Goalies */
			$Count +=1;if ($Count > 1){echo " / ";}else{echo $TradeLang['Players'] . " : ";}
			$Query = "SELECT Name FROM GoalerInfo WHERE Number = (" . $Row['Player'] . " - 10000)";
			$Data = $db->querySingle($Query,true);	
			echo $Data['Name'];				
		}
	}}
	
	$Query = "Select * From Trade WHERE FromTeam = " . $Team . " AND ToTeam = " . $ToTeam  . " AND Prospect > 0 AND ConfirmFrom = 'True' ORDER BY Prospect";
	$Trade =  $db->query($Query);	
	$Count = 0;
	if (empty($Trade) == false){while ($Row = $Trade ->fetchArray()) {
			$Count +=1;if ($Count > 1){echo " / ";}else{echo "<br />" . $TradeLang['Prospects'] . " : ";}
			$Query = "SELECT Name FROM Prospects WHERE Number = " . $Row['Prospect'];
			$Data = $db->querySingle($Query,true);	
			echo $Data['Name'];
	}}
	
	$Query = "Select * From Trade WHERE FromTeam = " . $Team . " AND ToTeam = " . $ToTeam  . " AND DraftPick > 0 AND ConfirmFrom = 'True' ORDER BY DraftPick";
	$Trade =  $db->query($Query);	
	$Count = 0;
	if (empty($Trade) == false){while ($Row = $Trade ->fetchArray()) {
			$Count +=1;if ($Count > 1){echo " / ";}else{echo "<br />" .  $TradeLang['DraftPicks'] . " : ";}
			If ($Row['DraftPick'] >= 10000){ /* Conditionnal Draft Pick */
				$Query = "SELECT * FROM DraftPick WHERE InternalNumber = " . ($Row['DraftPick'] - 10000) . " AND TeamNumber = " . $Row['FromTeam'];
			}else{
				$Query = "SELECT * FROM DraftPick WHERE InternalNumber = " . $Row['DraftPick'] . " AND TeamNumber = " . $Row['FromTeam'];
			}
			$Data = $db->querySingle($Query,true);	
			echo "Y:" . $Data['Year'] . "-RND:" . $Data['Round'] . "-" . $Data['FromTeamAbbre'];
			If ($Row['DraftPick'] >= 10000){echo " (CON)";}
	}}
	echo "<br />";
	
	$Query = "Select Sum(Money) as SumofMoney, Sum(SalaryCapY1) as SumofSalaryCapY1, Sum(SalaryCapY2) as SumofSalaryCapY2 From Trade WHERE FromTeam = "  . $Team . " AND ToTeam = " . $ToTeam  . " AND ConfirmFrom = 'True'";
	$Trade =  $db->querySingle($Query,true);	
	
	If ($Trade['SumofMoney'] > 0){echo $TradeLang['Money'] . " : "  . number_format($Trade['SumofMoney'],0) . "$<br />";}
	If ($Trade['SumofSalaryCapY1'] > 0){	echo $TradeLang['SalaryCapY1'] . " : " . number_format($Trade['SumofSalaryCapY1'] ,0) . "$<br />";}
	If ($Trade['SumofSalaryCapY2'] > 0){	echo $TradeLang['SalaryCapY2'] . " : " . number_format($Trade['SumofSalaryCapY2'] ,0) . "$<br />";}
	
	echo "</td><td style=\"vertical-align:top\">";
	echo "<div class=\"STHSPHPTradeTeamName\">" .  $TradeLang['From'];
	If ($TeamTo['TeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $TeamTo['TeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPTradeTeamImage \" />";}
	echo $TeamTo['Name'] . "</div><br />";
		
	$Query = "Select * From Trade WHERE ToTeam = " . $Team . " AND FromTeam = " . $ToTeam . " AND Player > 0 AND ConfirmFrom = 'True' ORDER BY Player";
	$Trade =  $db->query($Query);	
	$Count = 0;
	if (empty($Trade) == false){while ($Row = $Trade ->fetchArray()) {
		If ($Row['Player']> 0 and $Row['Player']< 10000){
			/* Players */
			$Count +=1;if ($Count > 1){echo " / ";}else{echo $TradeLang['Players'] . " : ";}
			$Query = "SELECT Name FROM PlayerInfo WHERE Number = " . $Row['Player'];
			$Data = $db->querySingle($Query,true);	
			echo $Data['Name'];
		}elseif($Row['Player']> 10000 and $Row['Player']< 11000){
			/* Goalies */
			$Count +=1;if ($Count > 1){echo " / ";}else{echo $TradeLang['Players'] . " : ";}
			$Query = "SELECT Name FROM GoalerInfo WHERE Number = (" . $Row['Player'] . " - 10000)";
			$Data = $db->querySingle($Query,true);	
			echo $Data['Name'];				
		}
	}}
		
	$Query = "Select * From Trade WHERE ToTeam = " . $Team . " AND FromTeam = " . $ToTeam . " AND Prospect > 0 AND ConfirmFrom = 'True' ORDER BY Prospect";
	$Trade =  $db->query($Query);	
	$Count = 0;
	if (empty($Trade) == false){while ($Row = $Trade ->fetchArray()) {
			$Count +=1;if ($Count > 1){echo " / ";}else{echo "<br />" . $TradeLang['Prospects'] . " : ";}
			$Query = "SELECT Name FROM Prospects WHERE Number = " . $Row['Prospect'];
			$Data = $db->querySingle($Query,true);	
			echo $Data['Name'];
	}}
	
	$Query = "Select * From Trade WHERE ToTeam = " . $Team . " AND FromTeam = " . $ToTeam . " AND DraftPick > 0 AND ConfirmFrom = 'True' ORDER BY DraftPick";
	$Trade =  $db->query($Query);	
	$Count = 0;
	if (empty($Trade) == false){while ($Row = $Trade ->fetchArray()) {
			$Count +=1;if ($Count > 1){echo " / ";}else{echo "<br />" .  $TradeLang['DraftPicks'] . " : ";}
			If ($Row['DraftPick'] >= 10000){ /* Conditionnal Draft Pick */
				$Query = "SELECT * FROM DraftPick WHERE InternalNumber = " . ($Row['DraftPick'] - 10000) . " AND TeamNumber = " . $Row['FromTeam'];
			}else{
				$Query = "SELECT * FROM DraftPick WHERE InternalNumber = " . $Row['DraftPick'] . " AND TeamNumber = " . $Row['FromTeam'];
			}
			$Data = $db->querySingle($Query,true);	
			echo "Y:" . $Data['Year'] . "-RND:" . $Data['Round'] . "-" . $Data['FromTeamAbbre'];
			If ($Row['DraftPick'] >= 10000){echo " (CON)";}
	}}
	echo "<br />";
	
	$Query = "Select Sum(Money) as SumofMoney, Sum(SalaryCapY1) as SumofSalaryCapY1, Sum(SalaryCapY2) as SumofSalaryCapY2 From Trade WHERE ToTeam = "  . $Team . " AND FromTeam = " . $ToTeam . " AND ConfirmFrom = 'True'";
	$Trade =  $db->querySingle($Query,true);	
		
	If ($Trade['SumofMoney'] > 0){echo $TradeLang['Money'] . " : "  . number_format($Trade['SumofMoney'],0) . "$<br />";}
	If ($Trade['SumofSalaryCapY1'] > 0){	echo $TradeLang['SalaryCapY1'] . " : " . number_format($Trade['SumofSalaryCapY1'] ,0) . "$<br />";}	
	If ($Trade['SumofSalaryCapY2'] > 0){	echo $TradeLang['SalaryCapY2'] . " : " . number_format($Trade['SumofSalaryCapY2'] ,0) . "$<br />";}	
	echo "</td></tr>";
	
	// Formulaire d'approbation/refus
	echo "<tr><td colspan=\"2\" class=\"STHSPHPTradeType\">";
	echo "<form method=\"post\" action=\"TradeCommissioner.php\">";
	echo "<input type=\"hidden\" name=\"FromTeam\" value=\"" . $Team . "\">";
	echo "<input type=\"hidden\" name=\"ToTeam\" value=\"" . $ToTeam . "\">";
	echo "<input class=\"SubmitButton\" type=\"submit\" name=\"Approve\" value=\"Approuver le Trade\" style=\"background-color: #28a745; color: white; margin-right: 10px;\" /> ";
	echo "<input class=\"SubmitButton\" type=\"submit\" name=\"Refuse\" value=\"Refuser le Trade\" style=\"background-color: #dc3545; color: white;\" />";
	echo "</form>";
	echo "</td></tr>";
	echo "<tr><td colspan=\"2\" class=\"STHSPHPTradeType\"><hr /></td></tr>";
	}
}}

if ($CookieTeamNumber != 102){
	echo "<tr><td colspan=\"2\" class=\"STHSPHPTradeType\"><div class=\"STHSDivInformationMessage\">Accès réservé au commissaire de la ligue.</div></td></tr>";
}elseif ($TradeFound == False){
	echo "<tr><td colspan=\"2\" class=\"STHSPHPTradeType\"><div class=\"STHSDivInformationMessage\">Aucun trade en attente d'approbation.</div></td></tr>";
}	
?>
	
</table>

<br />

</div>

<?php include "Footer.php";?>

