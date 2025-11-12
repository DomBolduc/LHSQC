<?php include('Header.php'); 
    //require_once("STHSSetting.php");
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
    // Make a connection variable to pass to API
	//$db = api_sqlite_connect($DatabaseFile);
    $db = new SQLite3($DatabaseFile);
    
    if ($db){

		// Look for a team ID in the URL, if non exists use 0
        $t = (isset($_REQUEST["TeamID"])) ? filter_var($_REQUEST["TeamID"], FILTER_SANITIZE_NUMBER_INT): 0;
    } else { echo "Error with DB. :("; }

    if ($CookieTeamNumber == 102){$DoNotRequiredLoginDynamicWebsite = TRUE;} 
            
    if(($CookieTeamNumber == $t OR $DoNotRequiredLoginDynamicWebsite == TRUE) AND $t > 0 AND $t <= 100){
        if($t > 0){
            $teamid = $t;
        }
    }else{
        echo "<div class=\"STHSDivInformationMessage\">" . $NoUserLogin . "<br /><br /></div>";
    }
?>
         
            
			
</head>
<body>
          

<header>
<?php include "Menu.php";?>
   
<div class="container">

    <?php include "components/RosterEditor.php";  ?>

</div>
   

</header> 
        
<script>
    function deactivateBanner() {
        const banner = document.querySelector('.confirm');
        if (banner) banner.style.display = 'none'; // Hides the banner
    }
   
    setTimeout(deactivateBanner, 5000);                    // Hide the confirm banner after 5 seconds
    document.addEventListener('click', deactivateBanner);  // Hide the confirm banner on user interaction
</script>
   

<?php include ("Footer.php"); ?>

</body>
</html>
