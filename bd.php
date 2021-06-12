<?php
//error_reporting(0);
//date_default_timezone_set("Africa/Algiers");    
// Changed the config to PDO connection
    
$hostname_canevas_connexion = "127.0.0.1";
$database_canevas_connexion = "guide";
$username_canevas_connexion = "root";
$password_canevas_connexion = "";
    // Les dlignes suivantes ont ete supprimees
/*$canevas_connexion = mysql_pconnect($hostname_canevas_connexion, $username_canevas_connexion, $password_canevas_connexion) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_canevas_connexion,$canevas_connexion);*/
    try {
    $dbh = new PDO('mysql:host='.$hostname_canevas_connexion.';dbname='.$database_canevas_connexion, $username_canevas_connexion, $password_canevas_connexion);
} catch (PDOException $e) {
        print "Error!:" . $e->getMessage() . "<br/>";
        die();
    }

	
	
?>
