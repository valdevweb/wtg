										
<?php 
include('../config/autoload.php');

echo $_POST['id_marque'];
function getListModelesByMarques($pdo){
	$req=$pdo->prepare("SELECT * FROM modeles WHERE id_marque= :id_marque");
	$req->execute([
		':id_marque'	=>$_POST['id_marque']
	]);

	$data=$req->fetchAll(PDO::FETCH_ASSOC);
	if(empty($data)){
		return "";
	}
	return $data;
}
$datas=getListModelesByMarques($pdo);
if(!empty($datas)){
	echo '<option value="">Sélectionner</option>';
	foreach ($datas as $key => $data) {
		echo '<option value="'.$data['id'].'">'.$data['modele'].'</option>';
	
	}
}

