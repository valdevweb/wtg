<?php
session_start();

define("SITE_NAME", "WTG FRANCE");
define("ROOT_PATH", "http://217.160.170.62:81/wtg/");
define("DIR_NOSESSION", "http://217.160.170.62:81/wtg/index.php");

function connectToDb($dbname) {
	$host='localhost';
	$username='sql';
	$pwd='User19092017+';
	try {
		$pdo=new PDO("mysql:host=$host;dbname=$dbname", $username, $pwd);

	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	return  $pdo;
}











