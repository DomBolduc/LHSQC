<?php
$MenuFreeAgentYear = (integer)1;
$MenuTeamTeamID = (integer)0;
$MenuQueryOK = (boolean)False;

If (file_exists($DatabaseFile) == false){	
    Goto STHSErrorMenu;
}else{try{

	$dbMenu = new SQLite3($DatabaseFile);

	$Query = "Select ShowExpansionDraftLinkinTopMenu, ShowWebClientInDymanicWebsite, ShowRSSFeed, OutputCustomURL1, OutputCustomURL1Name, OutputCustomURL2, OutputCustomURL2Name, SplitTodayGames from LeagueOutputOption";
	$LeagueOutputOptionMenu = $dbMenu->querySingle($Query,true);
	$Query = "Select Name, OutputName, LeagueOwner, OutputFileFormat, EntryDraftStart, EntryDraftStop, FantasyDraftStart, OffSeason, ExpireWarningDateYear, ExpireWarningDateMonth, TradeDeadLinePass, DatabaseCreationDate, PlayOffStarted, ProConferenceName1, ProConferenceName2, FarmConferenceName1, FarmConferenceName2, Version from LeagueGeneral";
	$LeagueGeneralMenu = $dbMenu->querySingle($Query,true);
	$Query = "Select FarmEnable, WaiversEnable, ProTwoConference, FarmTwoConference from LeagueSimulation";
	$LeagueSimulationMenu = $dbMenu->querySingle($Query,true);	
	$Query = "Select AllowFreeAgentOfferfromWebsite, AllowDraftSelectionfromWebsite, AllowTradefromWebsite, AllowPlayerEditionFromWebsite, AllowProspectEditionFromWebsite from LeagueWebClient";
	$LeagueWebClientMenu = $dbMenu->querySingle($Query,true);

	If (isset($LeagueName ) == False){$LeagueName = $LeagueGeneralMenu['Name'];}
	If ($LeagueName == ""){$LeagueName = $LeagueGeneralMenu['Name'];}
	If (isset($LeagueOwner) == False){$LeagueOwner = $LeagueGeneralMenu['LeagueOwner'];}

	If ($LeagueGeneralMenu['OffSeason'] === "True") { $MenuFreeAgentYear = 0; }

	If (date("Y") > $LeagueGeneralMenu['ExpireWarningDateYear']){
		echo "<div class=\"STHSPHPMenuOutOfDate\">" . $OutOfDateVersion . "</div>";
	}elseif(date("Y") == $LeagueGeneralMenu['ExpireWarningDateYear'] AND date("m") > $LeagueGeneralMenu['ExpireWarningDateMonth']){
		echo "<div class=\"STHSPHPMenuOutOfDate\">" . $OutOfDateVersion . "</div>";
	}
	If (PHP_MAJOR_VERSION < 8){echo "<div class=\"STHSPHPMenuOutOfDate\">" . $PHPVersionOutOfDate . "</div>";}

	if($CookieTeamNumber > 0 AND $CookieTeamNumber <= 100){
		$Query = "Select Number, Name, Abbre, TeamThemeID from TeamProInfo Where Number = " . $CookieTeamNumber;
		$TeamMenuCookie =  $dbMenu->querySingle($Query,true);
		$MenuTeamTeamID = $TeamMenuCookie['TeamThemeID'];
	}
	$MenuQueryOK = True;
} catch (Exception $e) {
STHSErrorMenu:
	$LeagueName = $DatabaseNotFound;
	$LeagueOutputOptionMenu = Null;
	$LeagueGeneralMenu = Null;
	$LeagueSimulationMenu = Null;
	$TeamProMenu = Null;
	$TeamProMenu1 = Null;
	$TeamProMenu2 = Null;
	$TeamFarmMenu = Null;
	$TeamFarmMenu1 = Null;
	$TeamFarmMenu2 = Null;
	$MenuTeamTeamID = (integer)0;
	echo "<br /><br /><h1 class=\"STHSCenter\">" . $DatabaseNotFound . "</h1>";
}}
/* Following 3 Lines Required for Game Output Before 3.2.9 */
If (isset($CookieTeamNumber) == False){$CookieTeamNumber  = (integer)0;}
If (isset($CookieTeamName) == False){$CookieTeamName  = (string)"";}
If (isset($LoginLink) == False){$LoginLink = (string)"";}
If (isset($LeagueOwner) == False){$LeagueOwner = (string)"";}
?>



<div class="desktop-only">
    <?php include "components/ProTeamsBar.php" ?>
</div>



<?php
$menuStatsItems = '';
$menuTradesItems = '';
$menuToolsItems = '';
$menuTeamsItems = '';
$menuMobileTeamsItems = '';

if ($MenuQueryOK == True) {

    $menuStatsItems .= "<li><a href=\"PlayersStat.php?\">" . $TopMenuLang['PlayersLeader'] . "</a></li>";
    $menuStatsItems .= "<li><a href=\"GoaliesStat.php?\">" . $TopMenuLang['GoaliesLeader'] . "</a></li>";
    $menuStatsItems .= "<li><a href=\"PlayersStat.php?Farm\">" . $TopMenuLang['PlayersLeaderAhl'] . "</a></li>";
    $menuStatsItems .= "<li><a href=\"GoaliesStat.php?Farm\">" . $TopMenuLang['GoaliesLeaderAhl'] . "</a></li>";
    $menuStatsItems .= "<li><a href=\"TeamsStat.php?\">" . $TopMenuLang['TeamsStats'] . "</a></li>";
   // $menuStatsItems .= "<li><a href=\"Transaction.php?SinceLast\">" . $TopMenuLang['TodaysTransactions'] . "</a></li>";
    $menuStatsItems .= "<li><a href=\"PowerRanking.php\"> Power Ranking </a></li>";
  


    //Teams
    $menuTeamsItems .= "<li><a href=\"#\">Atlantic</a><ul>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=3\"><img src=\"/images/11.png\">Boston</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=4\"><img src=\"/images/14.png\">Buffalo</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=11\"><img src=\"/images/17.png\">Detroit</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=13\"><img src=\"/images/10.png\">Florida</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=16\"><img src=\"/images/13.png\">Montreal</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=21\"><img src=\"/images/12.png\">Ottawa</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=27\"><img src=\"/images/7.png\">Tampa Bay</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=28\"><img src=\"/images/15.png\">Toronto</a></li>";
    $menuTeamsItems .= "</ul></li>";
    $menuTeamsItems .= "<li><a href=\"#\">Metropolitan</a><ul>";
    $menuTeamsItems .="<li><a href=\"ProTeam.php?Team=6\"><img src=\"/images/6.png\">Carolina</a></li>";
    $menuTeamsItems .="<li><a href=\"ProTeam.php?Team=9\"><img src=\"/images/19.png\">Columbus</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=18\"><img src=\"/images/4.png\">New Jersey</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=20\"><img src=\"/images/3.png\">New York</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=19\"><img src=\"/images/2.png\">New York</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=22\"><img src=\"/images/5.png\">Philadelphia</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=24\"><img src=\"/images/1.png\">Pittsburgh</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=30\"><img src=\"/images/9.png\">Washington</a></li>";
    $menuTeamsItems .= "</ul></li>";
    $menuTeamsItems .= "<li><a href=\"#\">Central</a><ul>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=7\"><img src=\"/images/18.png\">Chicago</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=8\"><img src=\"/images/25.png\">Colorado</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=10\"><img src=\"/images/28.png\">Dallas</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=15\"><img src=\"/images/21.png\">Minnesota</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=17\"><img src=\"/images/20.png\">Nashville</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=25\"><img src=\"/images/16.png\">St. Louis</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=23\"><img src=\"/images/27.png\">Utah</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=2\"><img src=\"/images/8.png\">Winnipeg</a></li>";
    $menuTeamsItems .= "</ul></li>";
    $menuTeamsItems .= "<li><a href=\"#\">Pacific</a><ul>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=1\"><img src=\"/images/29.png\">Anaheim</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=5\"><img src=\"/images/23.png\">Calgary</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=12\"><img src=\"/images/22.png\">Edmonton</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=14\"><img src=\"/images/26.png\">Los Angeles</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=26\"><img src=\"/images/30.png\">San Jose</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=32\"><img src=\"/images/33.png\">Seattle</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=29\"><img src=\"/images/24.png\">Vancouver</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=31\"><img src=\"/images/32.png\">Vegas</a></li>";
    $menuTeamsItems .= "</ul></li>";


    //Teams Mobile
    $menuMobileTeamsItems .= "<div class=\"row px-0\">";
        $menuMobileTeamsItems .= "<div class=\"col px-0 mx-0\">";
            $menuMobileTeamsItems .= "<div class=\"bg-warning subMenuHighlight\"> Atlantic </div>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=3\"><img src=\"/images/11.png\">BOS</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=4\"><img src=\"/images/14.png\">BUF</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=11\"><img src=\"/images/17.png\">DET</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=13\"><img src=\"/images/10.png\">FLA</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=16\"><img src=\"/images/13.png\">MTL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=21\"><img src=\"/images/12.png\">OTT</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=27\"><img src=\"/images/7.png\">TB</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=28\"><img src=\"/images/15.png\">TOR</a>";
        $menuMobileTeamsItems .= "</div>";

        $menuMobileTeamsItems .= "<div class=\"col  px-0 mx-0\">";
            $menuMobileTeamsItems .= "<div class=\"bg-warning subMenuHighlight\"> Metropolitan </div>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=6\"><img src=\"/images/6.png\"><span>CAR</span></a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=9\"><img src=\"/images/19.png\">CBJ</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=18\"><img src=\"/images/4.png\">NJ</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=20\"><img src=\"/images/3.png\">NYR</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=19\"><img src=\"/images/2.png\">NYI</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=22\"><img src=\"/images/5.png\">PHL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=24\"><img src=\"/images/1.png\">PIT</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=30\"><img src=\"/images/9.png\">WSH</a>";
        $menuMobileTeamsItems .= "</div>";

        $menuMobileTeamsItems .= "<div class=\"col  px-0 mx-0\">";
            $menuMobileTeamsItems .= "<div class=\"bg-warning subMenuHighlight\"> Central </div>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=7\"><img src=\"/images/18.png\">CHI</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=8\"><img src=\"/images/25.png\">COL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=10\"><img src=\"/images/28.png\">DAL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=15\"><img src=\"/images/21.png\">MIN</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=17\"><img src=\"/images/20.png\">NSH</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=25\"><img src=\"/images/16.png\">STL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=23\"><img src=\"/images/27.png\">ARI</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=2\"><img src=\"/images/8.png\">WPG</a>";
        $menuMobileTeamsItems .= "</div>";

        $menuMobileTeamsItems .= "<div class=\"col  px-0 mx-0\">";
            $menuMobileTeamsItems .= "<div class=\"bg-warning subMenuHighlight\"> Pacific </div>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=1\"><img src=\"/images/29.png\">ANA</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=5\"><img src=\"/images/23.png\">CGY</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=12\"><img src=\"/images/22.png\">EDM</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=14\"><img src=\"/images/26.png\">LA</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=26\"><img src=\"/images/30.png\">SJ</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=32\"><img src=\"/images/33.png\">SEA</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=29\"><img src=\"/images/24.png\">VAN</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=31\"><img src=\"/images/32.png\">VGK</a>";
        $menuMobileTeamsItems .= "</div>";

    $menuMobileTeamsItems .= "</div>";  
}
?>

<nav>
    <div class="logo">
        <a href="index.php">
            <img src="images/lhsqc_logo_2.png" alt="LHSQC" class="header-logo">
        </a>
    </div>

    <ul>
        <!-- Menu principal -->
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="TodayGames.php">Scoreboard</a></li>
        <li><a href="Schedule.php">Schedule</a></li>

        <!-- Menu Standings avec sous-menus -->
        <li>
            <a href="Standing.php">Standings</a>
            <ul>
                <li><a href="Standing.php">LHSQC</a></li>
                <li><a href="StandingAhl.php?Farm">AHL</a></li>
            </ul>
        </li>

        <!-- Menu Players avec sous-menus -->
        <li>
            <a href="PlayersRoster.php">League</a>
            <ul>
                <li><a href="PlayersRoster.php">Players</a></li>
                <li><a href="GoaliesRoster.php">Goalies</a></li>
                <li><a href="Prospects.php">Prospects</a></li>
                <li><a href="Coaches.php">Coaches</a></li>
                <li><a href="PlayersRoster.php?Team=0&Type=0">UFA</a></li>
                <li><a href="Transaction.php?TradeLogHistory">Latest Transaction</a></li>
                <!-- <li><a href="PlayerContracts.php">Contracts</a></li> -->
            </ul>
        </li>

        <!-- Menu Stats généré par PHP -->
        <li>
            <a href="#">Stats</a>
            <ul>
                <?php echo $menuStatsItems; ?>
            </ul>
        </li>

        <!-- Commenté: Menu Trades -->
        <!--
        <li>
            <a href="#">Trades</a>
            <ul>
                <?php echo $menuTradesItems; ?>
            </ul>
        </li>
        -->

        <!-- Menu Teams généré par PHP avec le numéro d'équipe -->
        <li>
            <a href="ProTeam.php?TeamID=<?php echo $CookieTeamNumber ?>">Teams</a>
            <ul class="team-list">
                <?php echo $menuTeamsItems; ?>
            </ul>
        </li>

        <!-- Menu GM's Corner avec sous-menus -->
        <li>
            <a href="#">GM's Corner</a>
            <ul>
                <li><a href="WebClientRoster.php?TeamID=<?php echo $CookieTeamNumber ?>">Roster Editor</a></li>
                <li><a href="WebClientLines.php?TeamID=<?php echo $CookieTeamNumber ?>">Lines Editor NHL</a></li>
                <li><a href="WebClientLines.php?League=Farm&TeamID=<?php echo $CookieTeamNumber ?>">Lines Editor AHL</a></li>
                <li><a href="TeamSalaryCapDetail.php?TeamID=<?php echo $CookieTeamNumber ?>">Contract Overview</a></li>
                <li><a href="PlayersCompare.php">Players Compare</a></li>
                <li><a href="Trade.php">Trade</a></li>
                <li><a href="EntryDraftProjection.php">Draft Projection</a></li>
                <!-- <li><a href="upload.php">Upload Lines</a></li> -->
            </ul>
        </li>

        <!-- Gestion Login/Logout via Cookie -->
        <?php if (isset($_COOKIE[$Cookie_Name])): ?>
            <li><a href="Login.php?Logoff=STHS" class="button yellow-bg">LOGOUT</a></li>
        <?php else: ?>
            <li><a href="Login.php" class="button yellow-bg">LOGIN</a></li>
        <?php endif; ?>
    </ul>
</nav>

<div class="nav-mobile">
    <ul class="nav-mobile-menu">
        <li class="active">
            <div class="row">
                <div class="col"> <div class="logo"><img src="images/lhsqc_logo_2.png" alt="LHSQC" class="header-logo"></div> </div>
                <div class="col"> <a href="index.php">HOME </a></div>
                <div class="col"><div class="logo"><img src="images/lhsqc_logo_2.png" alt="LHSQC" class="header-logo"></div></div>
            </div>
        </li>		

        <li><div> Stats  <i class="fa fa-chevron-right"></i></div><ul> <?php echo $menuStatsItems; ?> </ul></li>
        

        <?php echo $menuTradesItems; ?>  

        <li><div> Teams  <i class="fa fa-chevron-right"></i></div><ul> <?php echo $menuMobileTeamsItems; ?> </ul></li>

       
   

<li>
    <div> GM's Corner  <i class="fa fa-chevron-right"></i></div>
    <ul>
        <li><a href="WebClientRoster.php?TeamID=<?php echo $CookieTeamNumber ?>">Roster Editor</a></li>
        <li><a href="WebClientLines.php?TeamID=<?php echo $CookieTeamNumber ?>">Lines Editor NHL</a></li>
        <li><a href="WebClientLines.php?League=Farm&TeamID=<?php echo $CookieTeamNumber ?>">Lines Editor AHL</a></li>
        <li><a href="TeamSalaryCapDetail.php?TeamID=<?php echo $CookieTeamNumber ?>">Contract Overview</a></li>
        <li><a href="PlayersCompare.php">Players Compare</a></li>
        <li><a href="Trade.php">Trade</a></li>
        <li><a href="EntryDraftProjection.php">Draft Projection</a></li>
    </ul>
</li>  
        
        
        <li><div> League <i class="fa fa-chevron-right"></i></div>
            <ul>
                <li><a href="PlayersRoster.php">Players</a></li>
                <li><a href="GoaliesRoster.php">Goalies</a></li>
                <li><a href="Prospects.php">Prospects</a></li>
                <li><a href="Coaches.php">Coaches</a></li>
                <li><a href="PlayersRoster.php?Type=0&FreeAgent=1">UFA</a></li>
                <li><a href="Transaction.php?TradeLogHistory">Latest Transaction</a></li>
            </ul>
        </li>

        <li><div> Schedule  <i class="fa fa-chevron-right"></i></div>
            <ul>
                <li><a href="Schedule.php">LHSQC</a></li>
                <li><a href="Schedule.php?Farm">AHL</a></li>
            </ul>
        </li>
        <li><div> Standing  <i class="fa fa-chevron-right"></i></div>
            <ul>
                <li><a href="Standing.php">LHSQC</a></li>
                <li><a href="StandingAhl.php?Farm">AHL</a></li>
            </ul>
        </li>
        
     
           <?php if (isset($_COOKIE[$Cookie_Name])): ?>
            <li><a href="Login.php?Logoff=STHS" class="button yellow-bg">LOGOUT</a></li>
        <?php else: ?>
            <li><a href="Login.php" class="button yellow-bg">LOGIN</a></li>
        <?php endif; ?>     
    </ul>	

    <ul class="button-menu">			
        <li>
        <i class="fa fa-bars" ></i>
        </li>
    </ul>								
</div>


