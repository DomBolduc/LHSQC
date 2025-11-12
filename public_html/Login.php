<?php 
require_once "STHSSetting.php";

// Enable PHP error reporting to catch any issues
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize variables
$TeamInput = 0;
$Password = "";
$HashMatch = false;
$Title = "";
$InformationMessage = "";


if (!file_exists($DatabaseFile)) {   goto STHSErrorLogin;
} else {
    try {

        $db = new SQLite3($DatabaseFile);
        $LeagueGeneral = $db->querySingle("SELECT Name, LeagueWebPassword, LeagueWebGuestPassword FROM LeagueGeneral", true);
        $LeagueName = $LeagueGeneral['Name'];

        //  Get Team who have the WebPassword Setup 
        $TeamName = $db->query("SELECT Number, Name, GMName FROM TeamProInfo WHERE WebPassword <> '' ORDER BY Name");

        if (isset($_POST["Team"]) && !empty($_POST["Team"]) && isset($_POST["Password"]) && !empty($_POST["Password"])) {
            $TeamInput = filter_var($_POST["Team"], FILTER_SANITIZE_NUMBER_INT);
            $Password = filter_var($_POST["Password"], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW || FILTER_FLAG_STRIP_HIGH || FILTER_FLAG_NO_ENCODE_QUOTES || FILTER_FLAG_STRIP_BACKTICK);

            /* Get Hash */
            If ($TeamInput > 0){

                If ($TeamInput == 101){
                    /* League Guest Hash */
                    $LeagueGuestCalculateHash = strtoupper(Hash('sha512', mb_convert_encoding(($LeagueName . $Password), 'ASCII')));
                    $LeagueDatabaseGuestHash = $LeagueGeneral['LeagueWebGuestPassword'];

                    If ($LeagueGuestCalculateHash == $LeagueDatabaseGuestHash && $LeagueDatabaseGuestHash != "" && $LeagueGeneral['LeagueWebGuestPassword'] != ""){ 
                        $HashMatch = True;/* Can only match if LeagueWebGuestPassword is not empty */	
                        $CookieArray = array(
                            'TeamNumber'		=> 101,
                            'TeamName'			=> $TopMenuLang['Guest'],
                            'TeamGM'			=> '',			
                        );						
                    }

                }ElseIf ($TeamInput == 102){

                    /* League Management Hash */
                    $LeagueCalculateHash = strtoupper(Hash('sha512', mb_convert_encoding(($LeagueName . $Password), 'ASCII')));
                    $LeagueDatabaseHash = $LeagueGeneral['LeagueWebPassword'];

                    If ($LeagueCalculateHash == $LeagueDatabaseHash && $LeagueDatabaseHash != "" && $LeagueGeneral['LeagueWebPassword'] != ""){

                        $HashMatch = True;

                        $CookieArray = array(
                            'TeamNumber'		=> 102,
                            'TeamName'			=> $TopMenuLang['LeagueManagement'],
                            'TeamGM'			=> '',			
                        );						

                    }/* Can only match if LeagueWebPassword is not empty */

                }else{

                    /* GM Hash */
                    $Query = "SELECT Number, Name, GMName, WebPassword FROM TeamProInfo WHERE Number = " . $TeamInput;
                    $TeamPasswordCookie = $db->querySingle($Query,true);


                    /* Confirm GM Hash */
                    $GMCalculateHash = strtoupper(Hash('sha512', mb_convert_encoding(($TeamPasswordCookie['GMName'] . $Password), 'ASCII')));
                    $GMDatabaseHash = $TeamPasswordCookie['WebPassword'];

                    If ($GMCalculateHash == $GMDatabaseHash && $GMDatabaseHash != ""){

                        $HashMatch = True;
                        $CookieArray = array(
                            'TeamNumber'		=> $TeamPasswordCookie['Number'],
                            'TeamName'			=> $TeamPasswordCookie['Name'],
                            'TeamGM'			=> $TeamPasswordCookie['GMName'],			
                        );						
                    }
                }
            }



            if ($HashMatch) {

                $CookieTeamNumber = $CookieArray['TeamNumber'];
                $CookieTeamName = $CookieArray['TeamName'];

                $CurrentLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                if (strpos($_SERVER['REQUEST_URI'],'?') !== false) {
                    $LoginLink = $CurrentLink . "&Logoff";
                }else{
                    $LoginLink = $CurrentLink . "?Logoff";
                }			


                $encryption_key = base64_decode($CookieTeamNumberKey);
                $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                $encrypted = openssl_encrypt(serialize($CookieArray), 'aes-256-cbc', $encryption_key, 0, $iv);

                if(PHP_VERSION_ID < 70300) {
                    setcookie($Cookie_Name, base64_encode($encrypted . '::' . $iv), time() + (86400 * 180), "/");
                } else {

                    $CookieArray = array(
                        'expires' => time() + (86400 * 180),
                        'path' => '/',
                        'domain' =>  $_SERVER['HTTP_HOST'],  // '192.168.1.161', //$_SERVER['HTTP_HOST'],
                        'secure' => false,
                        'httponly' => true,
                        'samesite' =>  'Strict' //'LAX' //'Strict'
                    );

                    if(setcookie($Cookie_Name, base64_encode($encrypted . '::' . $iv),$CookieArray)) {
                        error_log("Cookie set successfully.");
                        $_COOKIE[$Cookie_Name] = $TeamInput; // Update $_COOKIE variable
                    }  else {
                        error_log("Failed to set cookie.");
                    }
          
                    // Perform redirect after cookie is set and headers are flushed
                    header("Location: ProTeam.php?Team=" . $CookieTeamNumber);
                    exit();  // Ensure no further code is executed after the redirect
                }			
      

            } else {
                $InformationMessage = $TopMenuLang['IncorrectPassword'];
            }

        }

    } catch (Exception $e) {
        STHSErrorLogin:
        $LeagueName = $DatabaseNotFound;
        $Title = $DatabaseNotFound;
    }
}


include "Header.php";

echo "<title>" . $LeagueName . " - " . $TopMenuLang['Login'] . "</title>";
?>

  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }
      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
</head>

<body>



<header>
    <?php include "Menu.php"; ?>

    <?php 
    if ($InformationMessage != "") {
        echo "<div class=\"STHSDivInformationMessage\">" . htmlspecialchars($InformationMessage) . "<br /><br /></div>";
    }?>

<div class="row">
<div class="col-3"></div>
<div class="col">

<!-- Section: Design Block -->

<section class=" text-center text-lg-start">


  <div class="card mb-3">
   <div class="row g-0 d-flex align-items-center">
    <div class="col-lg-4 d-none d-lg-flex">
            <img src="images/lhsqc_logo_2.png" alt="LHSQC" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
    </div>

    <div class="col-lg-8">

        <div class="card-body py-5 px-md-5">

        <form method="POST" action="Login.php" >
            <div class="form-group">
                <select name="Team" class="form-control form-control-lg custom-select" id="teamSelect">
                    <?php
                    if ($LeagueGeneral['LeagueWebPassword'] != "") {    
                        echo "<option value=\"102\">" . htmlspecialchars($TopMenuLang['LeagueManagement']) . "</option>";
                    }
                    if ($LeagueGeneral['LeagueWebGuestPassword'] != "") {    
                        echo "<option value=\"101\">" . htmlspecialchars($TopMenuLang['Guest']) . "</option>";
                    }        
                    if ($TeamName) {
                        while ($Row = $TeamName->fetchArray()) {
                            echo "<option value=\"" . htmlspecialchars($Row['Number']) . "\">" . htmlspecialchars($Row['Name']) . "</option>"; 
                        }
                    }
                    ?>

                </select>
                <label for="teamSelect">GM - Team selection</label>
            </div>

            <!-- Password input -->
            <div class="form-group mt-5">
                <input type="password" id="form2Example2" class="form-control" name="Password" required/> 
                <label class="form-label" for="form2Example2"><strong>Password</strong></label>
            </div>
            <!-- Remember me checkbox 
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>
                <div class="col">
                    <a href="#!">Forgot password?</a>
                </div>
            </div>-->
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 SubmitButton">
                <?php echo htmlspecialchars($TopMenuLang['Login']); ?>
            </button>
        </form>

        </div>

        <?php  echo "<br />" . $TopMenuLang['LoginMessage'];            ?>

    </div>
   </div>
  </div>


</section>
<!-- Section: Design Block -->

</div>
<div class="col-3"></div>
</div>

</header>









<?php

echo "<h2>" . $TopMenuLang['CurrentLogin'] . $CookieTeamName ."</h2>"; 

echo "<h3>" . $CookieTeamNumber ."</h3>"; 

if($CookieTeamNumber > 0)

echo "<script>var teamID = \"". $CookieTeamNumber ."\"</script>"; 

else echo "<script>var teamID = 0</script>"; 



include "Footer.php";

?>