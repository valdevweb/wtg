<?php
define("SITE_NAME", "WTG France");
define("ROOT_PATH", "http://217.160.170.62:81/wtg/");
define("DIR_NOSESSION", "http://217.160.170.62:81/wtg/index.php");

function connectToDb($dbname) {
	$host='localhost';
	$username='user';
	$pwd='120420@Users';
	try {
		$pdo=new PDO("mysql:host=$host;dbname=$dbname", $username, $pwd);

	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	return  $pdo;
}
$pdo=connectToDb("wtg");










