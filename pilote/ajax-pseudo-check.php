<?php 


include('../config/autoload.php');



$req=$pdo->prepare("SELECT pseudo FROM pilotes WHERE pseudo= :pseudo");
$req->execute([
	':pseudo'	=>$_POST['pseudo']
]);
$data=$req->fetch(PDO::FETCH_ASSOC);
if(!empty($data)){
	echo '<p class="alert alert-danger ">Ce login existe déjà</p>';
}
else{
	echo '<p class="alert alert-success">Login disponible</p>';
}