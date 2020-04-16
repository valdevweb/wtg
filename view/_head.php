<!DOCTYPE html>
<html lang="fr">
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" href="<?= (basename($_SERVER['PHP_SELF'])=='index.php')? 'wtg.ico': '../wtg.ico'?>" />
	<script src="<?= (basename($_SERVER['PHP_SELF'])=='index.php')? 'vendor/jquery.js':'../vendor/jquery.js'?> "></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="<?= (basename($_SERVER['PHP_SELF'])=='index.php') ? 'css/main.css' :'../css/main.css'?> ">	
	<!-- style de la page -->
	<?php
	if(isset($cssFile)){
		
		$hexplodedCssfile=explode('/',$cssFile);
		$hcssFileName=$hexplodedCssfile[count($hexplodedCssfile)-1];
		if(basename($_SERVER['PHP_SELF'])=='index.php'){
			$hcssUrl='css/'.$hcssFileName;
		}else{
			$hcssUrl='../css/'.$hcssFileName;
		}
		if(file_exists($hcssUrl)){
			echo '<link rel="stylesheet" href="' .$hcssUrl .'">';
		}
	}
	?>
	<link href="<?= (basename($_SERVER['PHP_SELF'])=='index.php')? 'vendor/fontawesome/css/all.css': '../vendor/fontawesome/css/all.css'?>" rel="stylesheet">
	<title><?= !isset($pageTitle)? 'WTG France - Accueil': SITE_NAME .' - ' . $pageTitle?></title>
</head>
<body>
