
<?php
require('../config/autoload.php');

//------------------------------------------------------
//			css dynamique
//----------------------------------------------------------------
$pageCss=explode(".php",basename(__file__));
$pageCss=$pageCss[0];
$cssFile=ROOT_PATH ."css/".$pageCss.".css";


include('../Class/PiloteManager.php');
include('../function/form.fn.php');










//------------------------------------------------------
//			FONCTION
//------------------------------------------------------

function createPilote($pdo){
	$req=$pdo->prepare("INSERT INTO pilotes (pseudo, pwd, email, id_age, console, id_version, id_periph, id_marque, id_modele, id_ecurie_pref, date_insert) VALUES
		(:pseudo, :pwd, :email, :id_age, :console, :id_version, :id_periph, :id_marque, :id_modele, :id_ecurie_pref, :date_insert)");
	$req->execute([
		':pseudo'	=>trim($_POST['pseudo']),
		':pwd'	=>password_hash(trim($_POST['pwd']),PASSWORD_DEFAULT),
		':email'	=>trim($_POST['email']),
		':id_age'	=>$_POST['age-select'],
		':console'	=>$_POST['console'],
		':id_version'	=>$_POST['version'],
		':id_periph'	=>$_POST['periph'],
		':id_marque'	=> isset($_POST['marque']) && !empty($_POST['marque']) ? $_POST['marque'] : NULL,
		':id_modele'	=>isset($_POST['model']) && !empty($_POST['model']) ? $_POST['model'] : NULL,
		':id_ecurie_pref'	=>$_POST['ecurie'],
		':date_insert'		=>date('Y-m-d H:i:s')
	]);

	$err=$req->errorInfo();
	if(!empty($err[2])){
		return $err[2];
	}
	return false;

}



 //------------------------------------------------------
//			DECLARATIONS
//------------------------------------------------------
$errors=[];
$success=[];
$pageTitle="Inscription";

$piloteManager= new PiloteManager($pdo);
$listAge=$piloteManager->getListAges();
$listVersion=$piloteManager->getListVersions();
$listPeriph=$piloteManager->getListPeriphs();
$listMarque=$piloteManager->getListMarques();
$listEcuriesP=$piloteManager->getListEcuriesPref();


//------------------------------------------------------
//			TRAITEMENT
//------------------------------------------------------
if(isset($_POST['submit'])){
	$fields=['pseudo'=>"saisir un pseudo", 'pwd' =>"saisir un mot de passe",'email'=>"saisir un email", 'age-select' =>"sélectionner une tranche d'âge",'console' =>"séléctionner un modèle de console", 'version'=>"sélectionner une version de jeu", 'periph' => "sélectionner un type de périphérique"];

	foreach ($fields as $key => $field) {

		if (!isset($_POST[$key]) || (isset($_POST[$key]) && trim($_POST[$key])=="")) {
			$errors[]="Vous devez " .$field;			
		}else{
			$success[]="OK " .$field;	
		}
	}	
	// qd periph selectionné et = à volant cad 2, modele et marque doient être saisis
	if(empty($errors)){
		if($_POST['periph']==2){
			if(!isset($_POST['model']) || (isset($_POST['model']) && trim($_POST['model'])=="")  
				|| !isset($_POST['marque']) ||  (isset($_POST['marque']) && trim($_POST['marque'])==""))
			{
				$errors[]="vous devez sélectionner une marque et un modèle de volant";
			}
		}
	}


	if(empty($errors)){
		if(!$piloteManager->pseudoUniq($_POST['pseudo'])){
			$errors[]="Le pseudo que vous avez choisi est déjà utilisé, merci d'en choisir un autre";
		}
	}
	if(empty($errors)){
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$errors[]="L'adresse mail saisie n'est pas valide";

		}
	}
	if(empty($errors)){
		if(strlen(trim($_POST["pwd"])) < 6){
			$errors[] = "Le mot de passe n'est pas assez long, 6 caractères minimum";
		}
	}
	if(empty($errors)){
		$inserted=createPilote($pdo);
		if(!$inserted){
			unset($_POST);
			$successQ="?registered";
			header("Location: ../index.php".$successQ,true,303);

		}else{
			$errors[]= "une erreur est survenue, impossible d'enregistrer votre compte";

		}

	}
}
//------------------------------------------------------
//			VIEW
//------------------------------------------------------
include('../view/_head.php');




?>
<!--********************************
DEBUT CONTENU CONTAINER
*********************************-->
<div class="container-fluid">
	<div class="row">
		<div class="col pt-3 pl-5 mb-3 text-center">
			<h1 class="underline-anim">FORMULAIRE D'INSCRIPTION</h1>			
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php
			include('../view/_errors.php');
			?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
				<div class="row">
					<div class="col-md-4 align-self-center text-center">
						<img  class="img-fluid" src="../img/logo/wtg-1000.jpg" style="width: 400px;height:auto">
					</div>
					<div class="col">
						<fieldset>
							<legend>Informations Pilote : </legend>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="pseudo">GT/PSN</label>
										<input type="text" class="form-control" name="pseudo" id="pseudo" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] :""?>" required> 
										<div id="pseudo-result"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="pwd">Mot de passe</label>
										<input type="password" class="form-control" name="pwd" id="pwd" value="<?= isset($_POST['pwd']) ? $_POST['pwd'] :""?>" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] :""?>" required>
									</div>
									<div id="email-helper"></div>

								</div>
							</div>
							<div class="form-group">
								<label for="age-select">Age :</label>
								<select class="form-control" name="age-select" id="age-select" required>
									<option value="">Sélectionner</option>
									<?php foreach ($listAge as $key => $age): ?>
										<option value="<?=$age['id']?>" <?= checkSelected($age['id'],'age-select')?> > <?=$age['age']?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="ecurie">Ecurie F1 préféré :</label>
								<select class="form-control" name="ecurie" id="ecurie" required>
									<option value="">Sélectionner</option>
									<?php foreach ($listEcuriesP as $key => $ecurie): ?>
										<option value="<?=$ecurie['id']?>" <?= checkSelected($ecurie['id'],'ecurie')?> ><?=$ecurie['ecurie_p']?></option>
									<?php endforeach ?>

								</select>
							</div>
							<div id="console" class="mt-3">
								Console :<br>
								<div class="row pl-5">
									<div class="col ">
										<div class="form-check">
											<input class="form-check-input" type="radio" value="ps4" <?= checkChecked("ps4",'console')?> id="consoleps4" name="console" required>
											<label class="form-check-label" for="consoleps4">PS4</label>
										</div>
									</div>
									<div class="col">
										<div class="form-check">
											<input class="form-check-input" type="radio" value="xbox" <?= checkChecked("xbox",'console')?> id="consolexbox" name="console" required>
											<label class="form-check-label" for="consolexbox">XBOX</label>
										</div>
									</div>
								</div>
							</div>
							<div id="jeu" class="mt-3">
								Version :<br>
								<div class="row pl-5">
									<?php foreach ($listVersion as $key => $version): ?>
										<div class="col ">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="<?=$version['id']?>" <?= checkChecked($version['id'],'version')?> id="version<?=$version['id']?>" name="version" required>
												<label class="form-check-label" for="version<?=$version['id']?>"><?=$version['version']?></label>
											</div>
										</div>
									<?php endforeach ?>									
								</div>
							</div>
							<div id="periph"  class="my-3">
								Périphérique :<br>
								<div class="row pl-5">
									<?php foreach ($listPeriph as $key => $periph): ?>
										<div class="col ">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="<?=$periph['id']?>" id="periph<?=$periph['id']?>" name="periph"  required>
												<label class="form-check-label" for="periph<?=$periph['id']?>"><?=$periph['periph']?></label>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
							<div id="marque" class="hidden">
								<div class="form-group">
									<label for="marque">Marque volant :</label>
									<select class="form-control" name="marque" id="marque-select">
										<option value="">Sélectionner</option>
										<?php foreach ($listMarque as $key => $marque): ?>
											<option value="<?=$marque['id']?>" ><?=$marque['marque']?></option>											
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div id="modele" class="hidden">
								<div class="form-group">
									<label for="model">Modèle volant :</label>
									<select class="form-control" name="model" id="modele-select">
										
									</select>
								</div>
							</div>
							
							<div class="text-right">
								<button class="btn btn-primary" name="submit">S'inscrire</button>
							</div>
						</fieldset>
					</div>
					<div class="col-md-4"></div>

				</div>

			</form>
		</div>
	</div>
	
	<!-- ./container -->
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var x_timer;
		$("#pseudo").keyup(function (e){
			clearTimeout(x_timer);
			var pseudo = $(this).val();

			x_timer = setTimeout(function(){
				check_username_ajax(pseudo);
			}, 500);
		});
		function check_username_ajax(pseudo){
			$("#pseudo-result").html('<img src="../img/ajax-loader.gif" />');
			$.ajax({
				type:'POST',
				url:'ajax-pseudo-check.php',
				data:{pseudo:pseudo},
				success: function(html){
					$("#pseudo-result").html(html)
				}
			});
			
		}

		$("#email").keyup(function(){
			console.log("jkzejd");
			var email = $("#email").val();
			var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(email)) {
			 //alert('Please provide a valid email address');
			 $("#email-helper").text(email+" n'est pas une adresse valide");
			 $("#email-helper").addClass('alert alert-danger');
			 email.focus;
			} else {
				$("#email-helper").text("adresse mail valide");
				$("#email-helper").removeClass('alert-danger');
				$("#email-helper").addClass('alert-success');

			}
		});



		// manette = 1, volant =2
		$("#periph2").change(function(){
			if($(this).prop("checked")) {
				$('#marque').attr('class','shown');				
			}
		});
		$("#periph1").change(function(){
			if($(this).prop("checked")) {
				$('#marque').attr('class','hidden');
				$('#modele').attr('class','hidden');
			}
		});
		$('#marque-select').on("change",function(){
			var marque=$('#marque-select').val();
			$('#modele').attr('class','shown');				

			$.ajax({
				type:'POST',
				url:'ajax-get-model.php',
				data:{id_marque:marque},
				success: function(html){
					$("#modele-select").append(html)
				}
			});
		})


	});

</script>
<?php
require '../view/_footer.php';
?>