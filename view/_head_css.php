<!DOCTYPE html>
<html lang="fr">
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" href="" />
	<link rel="stylesheet" href="<?= (basename($_SERVER['PHP_SELF']))? 'css/main.css' :'../css/main.css'?> ">	
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<?php
	if(isset($cssFile))
	{

		$hexplodedCssfile=explode('/',$cssFile);

		$hcssFileName=$hexplodedCssfile[count($hexplodedCssfile)-1];
		$hcssUrl='../css/'.$hcssFileName;

		if(file_exists($hcssUrl)){
			echo '<link rel="stylesheet" href="' .$hcssUrl .'?'.filemtime($hcssUrl).'">';
		}
	}
		echo "<pre>";
		print_r(basename($_SERVER['PHP_SELF']));
		echo '</pre>';
		
	?>

<!-- 	<link href="../../vendor/fontawesome5/css/all.css" rel="stylesheet">
	<script src="../../vendor/jquery/jquery-3.2.1.min_ex.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.js"></script>
	<script src="../../vendor/igorescobar/jquery-mask-plugin/src/jquery.mask.js"></script> -->

	<title></title>
</head>
<body>