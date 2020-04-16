
<?php
require('../config/autoload.php');

//------------------------------------------------------
//			css dynamique
//----------------------------------------------------------------
$pageCss=explode(".php",basename(__file__));
$pageCss=$pageCss[0];
$cssFile=ROOT_PATH ."/css/".$pageCss.".css";









//------------------------------------------------------
//			FONCTION
//------------------------------------------------------

 //------------------------------------------------------
//			DECLARATIONS
//------------------------------------------------------
$errors=[];
$success=[];
$pageTitle="Inscription";
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
			<form method="post" action=<?=$_SERVER['PHP_SELF']?>>
				<div class="row">
					<div class="col-md-4 align-self-center text-center">
						<img  class="img-fluid" src="../img/logo/wtg-400.png">
					</div>
					<div class="col">
						<fieldset>
							<legend>Informations Pilote : </legend>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="model">GT/PSN</label>
										<input type="text" class="form-control" name="model" id="model">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="model">Mot de passe</label>
										<input type="text" class="form-control" name="model" id="model">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="model">Email</label>
										<input type="text" class="form-control" name="model" id="model">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="model">Age :</label>
								<select class="form-control" name="model" id="model">
									<option value="">Sélectionner</option>
									<option value=""></option>
								</select>
							</div>
							<div id="console" class="mt-3">
								Console :<br>
								<div class="row">
									<div class="col pl-5">
										<div class="form-check">
											<input class="form-check-input" type="radio" value="" id="model" name="model">
											<label class="form-check-label" for="model">PS4</label>
										</div>
									</div>
									<div class="col">
										<div class="form-check">
											<input class="form-check-input" type="radio" value="" id="model" name="model">
											<label class="form-check-label" for="model">XBOX</label>
										</div>
									</div>
								</div>
							</div>
							<div id="jeu" class="mt-3">
								Version :<br>
								<div class="row">
									<div class="col pl-5">
										<div class="form-check">
											<input class="form-check-input" type="radio" value="" id="model" name="model">
											<label class="form-check-label" for="model">F1 2019</label>
										</div>
									</div>
									<div class="col">
										<div class="form-check">
											<input class="form-check-input" type="radio" value="" id="model" name="model">
											<label class="form-check-label" for="model">F1 2020</label>
										</div>
									</div>
								</div>
							</div>
							<div id="periph"  class="my-3">
								Périphérique :<br>
								<div class="row">
									<div class="col pl-5">
										<div class="form-check">
											<input class="form-check-input" type="radio" value="" id="model" name="model">
											<label class="form-check-label" for="model">Manette</label>
										</div>
									</div>
									<div class="col">
										<div class="form-check">
											<input class="form-check-input" type="radio" value="" id="model" name="model">
											<label class="form-check-label" for="model">Volant</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="model">Marque volant :</label>
								<select class="form-control" name="model" id="model">
									<option value="">Sélectionner</option>
									<option value=""></option>
								</select>
							</div>
							<div class="form-group">
								<label for="model">Modèle volant :</label>
								<select class="form-control" name="model" id="model">
									<option value="">Sélectionner</option>
									<option value=""></option>
								</select>
							</div>
							<div class="form-group">
								<label for="model">Ecurie F1 préféré :</label>
								<select class="form-control" name="model" id="model">
									<option value="">Sélectionner</option>
									<option value=""></option>
								</select>
							</div>
							<div class="text-right">
								<button class="btn btn-primary">S'inscrire</button>
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

<?php
require '../view/_footer.php';
?>