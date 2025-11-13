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

	// Vérifier s'il y a des messages non lus pour l'utilisateur connecté
	$hasUnreadMessages = false;
	$unreadMessagesCount = 0;
	$MessagesDBFile = "LHSQC-Messages.db";

	if ($CookieTeamNumber > 0 && $CookieTeamNumber <= 102 && file_exists($MessagesDBFile)) {
		try {
			$messagesDB = new SQLite3($MessagesDBFile);

			// Compter les messages non lus pour cet utilisateur
			$unreadQuery = "
			SELECT COUNT(*) as unread_count
			FROM PrivateMessages
			WHERE RecipientTeamID = ?
			AND IsRead = 0
			AND IsDeleted = 0
			";

			$stmt = $messagesDB->prepare($unreadQuery);
			$stmt->bindValue(1, $CookieTeamNumber, SQLITE3_INTEGER);
			$result = $stmt->execute();
			$row = $result->fetchArray(SQLITE3_ASSOC);

			$hasUnreadMessages = ($row['unread_count'] > 0);
			$unreadMessagesCount = $row['unread_count'];

			$messagesDB->close();
		} catch (Exception $e) {
			// En cas d'erreur, on considère qu'il n'y a pas de messages non lus
			$hasUnreadMessages = false;
			$unreadMessagesCount = 0;
		}
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

    $menuStatsItems .= "<li>";
    $menuStatsItems .= "<a href=\"#\">Players Stats</a>";
    $menuStatsItems .= "<ul>";
    $menuStatsItems .= "<li><a href=\"PlayersStat.php?\">PRO</a></li>";
    $menuStatsItems .= "<li><a href=\"PlayersStat.php?Farm\">FARM</a></li>";
    $menuStatsItems .= "</ul>";
    $menuStatsItems .= "</li>";
    $menuStatsItems .= "<li>";
    $menuStatsItems .= "<a href=\"#\">Goalies Stats</a>";
    $menuStatsItems .= "<ul>";
    $menuStatsItems .= "<li><a href=\"GoaliesStat.php?\">PRO</a></li>";
    $menuStatsItems .= "<li><a href=\"GoaliesStat.php?Farm\">FARM</a></li>";
    $menuStatsItems .= "</ul>";
    $menuStatsItems .= "</li>";
    $menuStatsItems .= "<li><a href=\"TeamsStat.php?\">" . $TopMenuLang['TeamsStats'] . "</a></li>";
   // $menuStatsItems .= "<li><a href=\"Transaction.php?SinceLast\">" . $TopMenuLang['TodaysTransactions'] . "</a></li>";
    $menuStatsItems .= "<li><a href=\"PowerRanking.php\"> Power Ranking </a></li>";
  


    //Teams
    $menuTeamsItems .= "<li><a href=\"#\">Atlantic</a><ul>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=3\"><img src=\"images/11.png\">Boston</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=4\"><img src=\"images/14.png\">Buffalo</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=11\"><img src=\"images/17.png\">Detroit</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=13\"><img src=\"images/10.png\">Florida</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=16\"><img src=\"images/13.png\">Montreal</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=21\"><img src=\"images/12.png\">Ottawa</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=27\"><img src=\"images/7.png\">Tampa Bay</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=28\"><img src=\"images/15.png\">Toronto</a></li>";
    $menuTeamsItems .= "</ul></li>";
    $menuTeamsItems .= "<li><a href=\"#\">Metropolitan</a><ul>";
    $menuTeamsItems .="<li><a href=\"ProTeam.php?Team=6\"><img src=\"images/6.png\">Carolina</a></li>";
    $menuTeamsItems .="<li><a href=\"ProTeam.php?Team=9\"><img src=\"images/19.png\">Columbus</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=18\"><img src=\"images/4.png\">New Jersey</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=20\"><img src=\"images/3.png\">New York</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=19\"><img src=\"images/2.png\">New York</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=22\"><img src=\"images/5.png\">Philadelphia</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=24\"><img src=\"images/1.png\">Pittsburgh</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=30\"><img src=\"images/9.png\">Washington</a></li>";
    $menuTeamsItems .= "</ul></li>";
    $menuTeamsItems .= "<li><a href=\"#\">Central</a><ul>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=7\"><img src=\"images/18.png\">Chicago</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=8\"><img src=\"images/25.png\">Colorado</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=10\"><img src=\"images/28.png\">Dallas</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=15\"><img src=\"images/21.png\">Minnesota</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=17\"><img src=\"images/20.png\">Nashville</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=25\"><img src=\"images/16.png\">St. Louis</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=23\"><img src=\"images/27.png\">Utah</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=2\"><img src=\"images/8.png\">Winnipeg</a></li>";
    $menuTeamsItems .= "</ul></li>";
    $menuTeamsItems .= "<li><a href=\"#\">Pacific</a><ul>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=1\"><img src=\"images/29.png\">Anaheim</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=5\"><img src=\"images/23.png\">Calgary</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=12\"><img src=\"images/22.png\">Edmonton</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=14\"><img src=\"images/26.png\">Los Angeles</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=26\"><img src=\"images/30.png\">San Jose</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=32\"><img src=\"images/33.png\">Seattle</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=29\"><img src=\"images/24.png\">Vancouver</a></li>";
    $menuTeamsItems .= "<li><a href=\"ProTeam.php?Team=31\"><img src=\"images/32.png\">Vegas</a></li>";
    $menuTeamsItems .= "</ul></li>";


    //Teams Mobile
    $menuMobileTeamsItems .= "<div class=\"row px-0\">";
        $menuMobileTeamsItems .= "<div class=\"col px-0 mx-0\">";
            $menuMobileTeamsItems .= "<div class=\"bg-warning subMenuHighlight\"> Atlantic </div>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=3\"><img src=\"images/11.png\">BOS</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=4\"><img src=\"images/14.png\">BUF</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=11\"><img src=\"images/17.png\">DET</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=13\"><img src=\"images/10.png\">FLA</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=16\"><img src=\"images/13.png\">MTL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=21\"><img src=\"images/12.png\">OTT</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=27\"><img src=\"images/7.png\">TB</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=28\"><img src=\"images/15.png\">TOR</a>";
        $menuMobileTeamsItems .= "</div>";

        $menuMobileTeamsItems .= "<div class=\"col  px-0 mx-0\">";
            $menuMobileTeamsItems .= "<div class=\"bg-warning subMenuHighlight\"> Metropolitan </div>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=6\"><img src=\"images/6.png\"><span>CAR</span></a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=9\"><img src=\"images/19.png\">CBJ</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=18\"><img src=\"images/4.png\">NJ</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=20\"><img src=\"images/3.png\">NYR</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=19\"><img src=\"images/2.png\">NYI</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=22\"><img src=\"images/5.png\">PHL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=24\"><img src=\"images/1.png\">PIT</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=30\"><img src=\"images/9.png\">WSH</a>";
        $menuMobileTeamsItems .= "</div>";

        $menuMobileTeamsItems .= "<div class=\"col  px-0 mx-0\">";
            $menuMobileTeamsItems .= "<div class=\"bg-warning subMenuHighlight\"> Central </div>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=7\"><img src=\"images/18.png\">CHI</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=8\"><img src=\"images/25.png\">COL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=10\"><img src=\"images/28.png\">DAL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=15\"><img src=\"images/21.png\">MIN</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=17\"><img src=\"images/20.png\">NSH</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=25\"><img src=\"images/16.png\">STL</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=23\"><img src=\"images/27.png\">ARI</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=2\"><img src=\"images/8.png\">WPG</a>";
        $menuMobileTeamsItems .= "</div>";

        $menuMobileTeamsItems .= "<div class=\"col  px-0 mx-0\">";
            $menuMobileTeamsItems .= "<div class=\"bg-warning subMenuHighlight\"> Pacific </div>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=1\"><img src=\"images/29.png\">ANA</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=5\"><img src=\"images/23.png\">CGY</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=12\"><img src=\"images/22.png\">EDM</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=14\"><img src=\"images/26.png\">LA</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=26\"><img src=\"images/30.png\">SJ</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=32\"><img src=\"images/33.png\">SEA</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=29\"><img src=\"images/24.png\">VAN</a>";
            $menuMobileTeamsItems .= "<a href=\"ProTeam.php?Team=31\"><img src=\"images/32.png\">VGK</a>";
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
                <li><a href="Standing.php">PRO</a></li>
                <li><a href="StandingAhl.php?Farm">FARM</a></li>
            </ul>
        </li>

        <!-- Menu Players avec sous-menus -->
        <li>
            <a href="PlayersRoster.php">League</a>
            <ul>
                <li>
                    <a href="#">Players</a>
                    <ul>
                        <li><a href="PlayersRoster.php?Type=1">Pro</a></li>
                        <li><a href="PlayersRoster.php?Type=2">Farm</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Goalies</a>
                    <ul>
                        <li><a href="GoaliesRoster.php?Type=1">Pro</a></li>
                        <li><a href="GoaliesRoster.php?Type=2">Farm</a></li>
                    </ul>
                </li>
                <li><a href="Prospects.php">Prospects</a></li>
                <li><a href="Coaches.php">Coaches</a></li>
                <li><a href="PlayersRoster.php?Team=0&Type=0">UFA</a></li>
                <li><a href="TradeBoard.php">Trade Market</a></li>
                <li><a href="Transaction.php?TradeLogHistory">Latest Transaction</a></li>
                <li><a href="DraftRanking2025.php">Entry Draft 2025</a></li>
                <li><a href="LHSQC_Cap_Summary.php">Salary Cap Summary</a></li>
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
                <li>
                    <a href="#">Lines Editor</a>
                    <ul>
                        <li><a href="WebClientLines.php?TeamID=<?php echo $CookieTeamNumber ?>">PRO</a></li>
                        <li><a href="WebClientLines.php?League=Farm&TeamID=<?php echo $CookieTeamNumber ?>">FARM</a></li>
                    </ul>
                </li>
                <li><a href="WebClientTeam.php">Gestion</a></li>
                <li><a href="TeamSalaryCapDetail.php?TeamID=<?php echo $CookieTeamNumber ?>">Contract Overview</a></li>
                <li><a href="PlayersCompare.php">Players Compare</a></li>
                <li><a href="Trade.php">Trade</a></li>
                <li><a href="TradeBoardManage.php">Trade Market</a></li>
                <?php if ($CookieTeamNumber == 102): ?>
                <li><a href="TradeCommissioner.php">Approuver Trades</a></li>
                <?php endif; ?>
                <li><a href="EntryDraftProjection.php">Draft Projection</a></li>
                <li><a href="Messages.php" id="messages-link">
                    <i class="fas fa-envelope me-1"></i>Messagerie
                    <span id="message-badge" class="badge bg-danger ms-1" style="display: none;">0</span>
                </a></li>
                <!-- <li><a href="upload.php">Upload Lines</a></li> -->
            </ul>
        </li>

        <!-- Gestion Login/Logout via Cookie -->
        <?php if (isset($_COOKIE[$Cookie_Name])): ?>
            <li><a href="Login.php?Logoff=STHS" class="button yellow-bg">LOGOUT</a></li>
        <?php else: ?>
            <li><a href="Login.php" class="button yellow-bg">LOGIN</a></li>
        <?php endif; ?>

        <!-- Bouton Discord -->
        <li><a href="https://discord.com/channels/576758362440597526/1279079731924307981" target="_blank" class="discord-btn" title="Ouvrir le salon Discord">
            <img src="images/Discord.png" alt="Discord" class="discord-logo">
        </a></li>

        <!-- Bouton Mail -->
        <li><a href="Messages.php" class="mail-btn<?php echo $hasUnreadMessages ? ' has-new-messages' : ''; ?>" title="Messagerie<?php echo $hasUnreadMessages ? ' - ' . $unreadMessagesCount . ' nouveau(x) message(s)!' : ''; ?>">
            <div class="mail-icon-container">
                <img src="images/Mail.png" alt="Mail" class="mail-logo">
                <?php if ($hasUnreadMessages && $unreadMessagesCount > 0): ?>
                    <span class="mail-notification-badge"><?php echo $unreadMessagesCount; ?></span>
                <?php endif; ?>
            </div>
        </a></li>
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

        <li><div> Stats  <i class="fas fa-chevron-right"></i></div><ul> <?php echo $menuStatsItems; ?> </ul></li>


        <?php echo $menuTradesItems; ?>

        <li><div> Teams  <i class="fas fa-chevron-right"></i></div><ul> <?php echo $menuMobileTeamsItems; ?> </ul></li>

       
   

<li>
    <div> GM's Corner  <i class="fas fa-chevron-right"></i></div>
    <ul>
        <li><a href="WebClientRoster.php?TeamID=<?php echo $CookieTeamNumber ?>">Roster Editor</a></li>
        <li>
            <a href="#">Lines Editor</a>
            <ul>
                <li><a href="WebClientLines.php?TeamID=<?php echo $CookieTeamNumber ?>">PRO</a></li>
                <li><a href="WebClientLines.php?League=Farm&TeamID=<?php echo $CookieTeamNumber ?>">FARM</a></li>
            </ul>
        </li>
        <li><a href="WebClientTeam.php">Gestion</a></li>
        <li><a href="TeamSalaryCapDetail.php?TeamID=<?php echo $CookieTeamNumber ?>">Contract Overview</a></li>
        <li><a href="PlayersCompare.php">Players Compare</a></li>
        <li><a href="Trade.php">Trade</a></li>
        <li><a href="TradeBoardManage.php">Trade Market</a></li>
        <?php if ($CookieTeamNumber == 102): ?>
        <li><a href="TradeCommissioner.php">Approuver Trades</a></li>
        <?php endif; ?>
        <li><a href="EntryDraftProjection.php">Draft Projection</a></li>
        <li><a href="Messages.php" id="messages-link-mobile">
            <i class="fas fa-envelope me-1"></i>Messagerie
            <span id="message-badge-mobile" class="badge bg-danger ms-1" style="display: none;">0</span>
        </a></li>
    </ul>
</li>
        
        
        <li><div> League <i class="fas fa-chevron-right"></i></div>
            <ul>
                <li>
                    <a href="#">Players</a>
                    <ul>
                        <li><a href="PlayersRoster.php?Type=1">Pro</a></li>
                        <li><a href="PlayersRoster.php?Type=2">Farm</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Goalies</a>
                    <ul>
                        <li><a href="GoaliesRoster.php?Type=1">Pro</a></li>
                        <li><a href="GoaliesRoster.php?Type=2">Farm</a></li>
                    </ul>
                </li>
                <li><a href="Prospects.php">Prospects</a></li>
                <li><a href="Coaches.php">Coaches</a></li>
                <li><a href="PlayersRoster.php?Type=0&FreeAgent=1">UFA</a></li>
                <li><a href="TradeBoard.php">Trade Market</a></li>
                <li><a href="Transaction.php?TradeLogHistory">Latest Transaction</a></li>
                <li><a href="DraftRanking2025.php">Entry Draft 2025</a></li>
                <li><a href="LHSQC_Cap_Summary.php">Salary Cap Summary</a></li>
            </ul>
        </li>

        <li><div> Schedule  <i class="fas fa-chevron-right"></i></div>
            <ul>
                <li><a href="Schedule.php">LHSQC</a></li>
                <li><a href="Schedule.php?Farm">AHL</a></li>
            </ul>
        </li>
        <li><div> Standing  <i class="fas fa-chevron-right"></i></div>
            <ul>
                <li><a href="Standing.php">PRO</a></li>
                <li><a href="StandingAhl.php?Farm">FARM</a></li>
            </ul>
        </li>
        
     
           <?php if (isset($_COOKIE[$Cookie_Name])): ?>
            <li><a href="Login.php?Logoff=STHS" class="button yellow-bg">LOGOUT</a></li>
        <?php else: ?>
            <li><a href="Login.php" class="button yellow-bg">LOGIN</a></li>
        <?php endif; ?>

        <!-- Bouton Discord Mobile -->
        <li><a href="https://discord.com/channels/576758362440597526/1279079731924307981" target="_blank" class="discord-btn-mobile" title="Ouvrir le salon Discord">
            <img src="images/Discord.png" alt="Discord" class="discord-logo-mobile"> Discord
        </a></li>

        <!-- Bouton Mail Mobile -->
        <li><a href="Messages.php" class="mail-btn-mobile<?php echo $hasUnreadMessages ? ' has-new-messages' : ''; ?>" title="Messagerie<?php echo $hasUnreadMessages ? ' - ' . $unreadMessagesCount . ' nouveau(x) message(s)!' : ''; ?>">
            <div class="mail-icon-container-mobile">
                <img src="images/Mail.png" alt="Mail" class="mail-logo-mobile"> Messages
                <?php if ($hasUnreadMessages && $unreadMessagesCount > 0): ?>
                    <span class="mail-notification-badge-mobile"><?php echo $unreadMessagesCount; ?></span>
                <?php endif; ?>
            </div>
        </a></li>
    </ul>

    <ul class="button-menu">
        <li>
        <i class="fas fa-bars" ></i>
        </li>
    </ul>
</div>

<!-- Script pour les notifications de messagerie -->
<script>
// Fonction pour vérifier les nouveaux messages
function checkNewMessages() {
    // Vérifier si l'utilisateur est connecté
    <?php if ($CookieTeamNumber > 0 && $CookieTeamNumber <= 100): ?>
    fetch('MessageAPI.php?action=checkNew')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.newMessages > 0) {
                // Mettre à jour les badges de notification
                const badge = document.getElementById('message-badge');
                const badgeMobile = document.getElementById('message-badge-mobile');

                if (badge) {
                    badge.textContent = data.newMessages;
                    badge.style.display = 'inline';
                }

                if (badgeMobile) {
                    badgeMobile.textContent = data.newMessages;
                    badgeMobile.style.display = 'inline';
                }
            } else {
                // Cacher les badges s'il n'y a pas de nouveaux messages
                const badge = document.getElementById('message-badge');
                const badgeMobile = document.getElementById('message-badge-mobile');

                if (badge) badge.style.display = 'none';
                if (badgeMobile) badgeMobile.style.display = 'none';
            }
        })
        .catch(error => {
            console.log('Erreur lors de la vérification des messages:', error);
        });
    <?php endif; ?>
}

// Vérifier les messages au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    checkNewMessages();

    // Vérifier les nouveaux messages toutes les 30 secondes
    setInterval(checkNewMessages, 30000);
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const SUBMENU_TRIGGER_CLASS = 'nav-mobile-trigger';
    const topLevelTriggers = document.querySelectorAll('.nav-mobile-menu > li > div, .nav-mobile-menu > li > a[href="#"]');

    function closeAllTopLevel() {
        document.querySelectorAll('.nav-mobile-menu > li.active').forEach(li => {
            li.classList.remove('active');
            const sub = li.querySelector(':scope > ul');
            if (sub) {
                sub.classList.remove('active');
                sub.querySelectorAll(':scope > li').forEach(nestedLi => nestedLi.classList.remove('active'));
            }
            const trigger = li.querySelector(':scope > .' + SUBMENU_TRIGGER_CLASS);
            if (trigger) {
                trigger.classList.remove('open');
            }
        });
    }

    topLevelTriggers.forEach(trigger => {
        trigger.classList.add(SUBMENU_TRIGGER_CLASS);
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const li = this.parentElement;
            const sub = li.querySelector(':scope > ul');
            const isOpen = li.classList.contains('active');

            // Si le menu est déjà ouvert, on le ferme simplement
            if (isOpen) {
                li.classList.remove('active');
                this.classList.remove('open');
                if (sub) {
                    sub.classList.remove('active');
                }
            } else {
                // Sinon, on ferme tous les autres menus et on ouvre celui-ci
                closeAllTopLevel();
                li.classList.add('active');
                this.classList.add('open');
                if (sub) {
                    sub.classList.add('active');
                }
            }
        });
    });

    const nestedTriggers = document.querySelectorAll('.nav-mobile-menu li > ul > li > a[href="#"]');
    nestedTriggers.forEach(trigger => {
        trigger.classList.add(SUBMENU_TRIGGER_CLASS);
        trigger.addEventListener('click', function(e) {
            const sub = this.nextElementSibling;
            if (!sub || sub.tagName !== 'UL') {
                return;
            }
            e.preventDefault();
            e.stopPropagation();

            const parentLi = this.parentElement;
            const isOpen = parentLi.classList.contains('active');

            // Si le sous-menu est déjà ouvert, on le ferme simplement
            if (isOpen) {
                parentLi.classList.remove('active');
                this.classList.remove('open');
                sub.classList.remove('active');
            } else {
                // Sinon, on ferme tous les autres sous-menus du même niveau et on ouvre celui-ci
                parentLi.parentElement.querySelectorAll(':scope > li').forEach(li => {
                    if (li !== parentLi) {
                        li.classList.remove('active');
                        const liTrigger = li.querySelector(':scope > a.' + SUBMENU_TRIGGER_CLASS);
                        if (liTrigger) {
                            liTrigger.classList.remove('open');
                        }
                        const liSub = li.querySelector(':scope > ul');
                        if (liSub) {
                            liSub.classList.remove('active');
                        }
                    }
                });

                // S'assurer que le menu parent de premier niveau est ouvert
                const parentTopLi = this.closest('.nav-mobile-menu > li');
                if (parentTopLi) {
                    document.querySelectorAll('.nav-mobile-menu > li').forEach(li => {
                        if (li !== parentTopLi) {
                            li.classList.remove('active');
                            const liSub = li.querySelector(':scope > ul');
                            if (liSub) {
                                liSub.classList.remove('active');
                                liSub.querySelectorAll(':scope > li').forEach(nestedLi => nestedLi.classList.remove('active'));
                            }
                            const liTrigger = li.querySelector(':scope > .' + SUBMENU_TRIGGER_CLASS);
                            if (liTrigger) {
                                liTrigger.classList.remove('open');
                            }
                        }
                    });

                    parentTopLi.classList.add('active');
                    const topTrigger = parentTopLi.querySelector(':scope > .' + SUBMENU_TRIGGER_CLASS);
                    if (topTrigger) {
                        topTrigger.classList.add('open');
                    }
                    const topSub = parentTopLi.querySelector(':scope > ul');
                    if (topSub) {
                        topSub.classList.add('active');
                    }
                }

                // Ouvrir le sous-menu cliqué
                parentLi.classList.add('active');
                this.classList.add('open');
                sub.classList.add('active');
            }
        });
    });

    document.querySelectorAll('.nav-mobile-menu li > ul > li > ul a[href]:not([href="#"])').forEach(link => {
        link.addEventListener('click', () => {
            closeAllTopLevel();
        });
    });
});
</script>
