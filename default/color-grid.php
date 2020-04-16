
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
	<h1 class="text-primary">Inscription</h1>

	<div class="row">
		<div class="col">
			<?php
			include('../view/_errors.php');
			?>
		</div>
	</div>

	<div class="row">
		<div class="col bg black"> black</div>
		<div class="col bg black-900"> black-900</div>
		<div class="col bg black-800"> black-800</div>
		<div class="col bg black-700"> black-700</div>
		<div class="col bg black-600"> black-600</div>
		<div class="col bg black-500"> black-500</div>
		<div class="col bg black-400"> black-400</div>
		<div class="col bg black-300"> black-300</div>
		<div class="col bg black-200"> black-200</div>
		<div class="col bg black-100"> black-100</div>
		<div class="col bg black-main">black-main</div>
	</div>
	<!-- ./container -->
</div>

<?php
require '../view/_footer.php';
?>