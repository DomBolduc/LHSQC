<?php

$CookieTeamNumber  = (integer)0;

$CookieTeamName  = (string)"";

$LoginLink = (string)"";

If (isset($Cookie_Name) == False){$Cookie_Name = (string)"";}



if (isset($_POST["Logoff"]) OR isset($_GET['Logoff'])) {   //  TODO  : devrait etre dans login.php, non?!?   

RemoveCookie:

	if(PHP_VERSION_ID < 70300) {

		setcookie($Cookie_Name, "", 1, "/");

	} else {

		$CookieArray = array(

			'expires' => 1,
			'path' => '/',
            'domain' =>  $_SERVER['HTTP_HOST'],// '192.168.1.161', //
			'secure' => false,
			'httponly' => true,
			'samesite' =>  'Strict' // 'LAX' //'Strict'

		);

		setcookie($Cookie_Name, "",$CookieArray);

	}	

	unset($_COOKIE[$Cookie_Name]);

	$CookieRemove = True;

	$CookieTeamNumber = 0;



    // Add redirection to index.php

    header("Location: index.php");

    exit();





}elseif(isset($_COOKIE[$Cookie_Name])) {

    $encryption_key = base64_decode($CookieTeamNumberKey);

    list($encrypted_data, $iv) = explode('::', base64_decode($_COOKIE[$Cookie_Name]), 2);

    $CookieArray = unserialize(openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv));

	$CookieTeamNumber = $CookieArray['TeamNumber'] ?? 0;

	$CookieTeamName = $CookieArray['TeamName'] ?? "";

	$CurrentLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	if (strpos($_SERVER['REQUEST_URI'],'?') !== false) {

		$LoginLink = $CurrentLink . "&Logoff";

	}else{

		$LoginLink = $CurrentLink . "?Logoff";

	}

	If ($CookieTeamNumber == 0){Goto RemoveCookie;} //Remove Cookie if cookie provived doesn't match.

}

?>