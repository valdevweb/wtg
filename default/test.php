<?php
require('../config/autoload.php');

$fieldseparator = ",";
$lineseparator = "\n";



$row=0;
// paramètre pour les requetes
$fieldName=['clt_g','clt_c','pseudo','id_drapeau','chrono','helper1','helper2','helper3','point_chrono','point_clt', 'id_saison', 'date_chrono'];
$args=join(',', array_map(function(){return '?';},$fieldName));
$fields=implode(', ',$fieldName);
	echo "<pre>";
	print_r($args);
	print_r($fields);
	echo '</pre>';
	
$file="C:\inetpub\wwwroot\wtg\\file\\CHRONOS.csv";

if (($handle = fopen($file, "r")) !== FALSE) {

	echo "ok";
// 	$errArr=[];
}else{

}
if (($handle = fopen($file, "r")) !== FALSE) {
	$errArr=[];

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		if($row==0){
			$row++;
		}else{
			array_push($data,3);
			array_push($data,date('Y-m-d H:i:s'));
			// echo $data[5];
			$req=$pdo->prepare("INSERT INTO chronos($fields) VALUES ($args)");
			if(!$req->execute($data)){
				$err=$req->errorInfo();
			
				$errArr[$row]['code']=$err[1];
				$errArr[$row]['message']=$err[2];
			
			}
		}
		$row++;
	}
	$row=0;
	fclose($handle);
}
	