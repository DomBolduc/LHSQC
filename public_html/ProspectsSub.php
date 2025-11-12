<?php If (isset($ProspectsLang) == False){include 'LanguageEN-League.php';} If (isset($Team) == False){$Team = (integer)-1;}If (isset($AllowProspectEdition) == False){$AllowProspectEdition =(boolean)False;}

echo "<th data-priority=\"critical\" title=\"Prospect Name\" class=\"STHSW140Min sortable\" data-sort=\"string\" style=\"cursor: pointer; position: relative;\">" . $ProspectsLang['Prospect']. " <span class=\"sort-indicator\"></span></th>";

if($Team >= 0){echo "<th class=\"columnSelector-false STHSW140Min sortable\" data-priority=\"6\" title=\"Team Name\" data-sort=\"string\" style=\"cursor: pointer; position: relative;\">" . $ProspectsLang['TeamName'] . " <span class=\"sort-indicator\"></span></th>";}else{echo "<th data-priority=\"2\" title=\"Team Name\" class=\"STHSW140Min sortable\" data-sort=\"string\" style=\"cursor: pointer; position: relative;\">" . $ProspectsLang['TeamName'] ." <span class=\"sort-indicator\"></span></th>";}

echo "<th data-priority=\"4\" title=\"Draft Year\" class=\"STHSW35 sortable\" data-sort=\"number\" style=\"cursor: pointer; position: relative;\">" . $ProspectsLang['DraftYear']. " <span class=\"sort-indicator\"></span></th>";

echo "<th data-priority=\"3\" title=\"Overall Pick\" class=\"STHSW35 sortable\" data-sort=\"number\" style=\"cursor: pointer; position: relative;\">" . $ProspectsLang['OverallPick']. " <span class=\"sort-indicator\"></span></th>";

if ($AllowProspectEdition == True){

	echo "<th data-priority=\"4\" title=\"Edit\" class=\"STHSW35\">" . $ProspectsLang['Edit'] . "</th>";

}

echo "</tr></thead><tbody>\n";

if (empty($Prospects) == false){while ($Row = $Prospects ->fetchArray()) {

	$nameTrimmed = trim($Row['Name'] ?? '');
	if ($nameTrimmed === ''){
		$firstLetter = '#';
	}else{
		if (function_exists('mb_substr')){
			$firstLetter = mb_strtoupper(mb_substr($nameTrimmed, 0, 1, 'UTF-8'));
		}else{
			$firstLetter = strtoupper(substr($nameTrimmed, 0, 1));
		}
	}
	$dataFirstLetter = htmlspecialchars($firstLetter, ENT_QUOTES, 'UTF-8');

	echo "<tr class=\"prospect-row\" data-first-letter=\"" . $dataFirstLetter . "\"><td>" . $Row['Name'] . "</td><td>";

	If ($Row['TeamThemeID'] > 0){echo "<img src=\"" . $ImagesCDNPath . "/images/" . $Row['TeamThemeID'] .".png\" alt=\"\" class=\"STHSPHPProspectsTeamImage\" />";}		

	echo $Row['TeamName'] . "</td>";

	if($AllowProspectEdition == True){

		echo "<form name=\"" . $Row['Number'] . "\" action=\"Prospects.php?Edit";If ($lang == "fr"){echo "&Lang=fr";} echo "\" method=\"post\">";

		echo "<td class=\"STHSCenter\"><input type=\"number\" min=\"0\" max=\"9999\" name=\"Year\" value=\"";If(isset($Row['Year'])){Echo $Row['Year'];}echo "\"></td>";

		echo "<td class=\"STHSCenter\"><input type=\"number\" min=\"0\" max=\"1000\" name=\"OverallPick\" value=\"";If(isset($Row['OverallPick'])){Echo $Row['OverallPick'];}echo "\"></td>";

		echo "<td class=\"STHSCenter\"><input type=\"submit\" class=\"SubmitButtonSmall\" value=\"" . $ProspectsLang['Edit'] . "\">";

		echo "<input type=\"hidden\" name=\"TeamEdit\" value=\"" . $CookieTeamNumber . "\">";

		echo "<input type=\"hidden\" name=\"ProspectName\" value=\"" . $Row['Name'] . "\">";

		echo "<input type=\"hidden\" name=\"ProspectNumber\" value=\"" . $Row['Number'] . "\"></form></td>";		

	}else{

		echo "<td>" . $Row['Year'] . "</td>";

		echo "<td>" . $Row['OverallPick'] . "</td>";

	}

	echo "</tr>\n"; /* The \n is for a new line in the HTML Code */

}}

?>
