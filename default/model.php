
<?php
require('../config/autoload.php');
if(!isset($_SESSION['id']) || ($_SESSION['authorized'] !=1)){
	echo "pas de variable session";
	header('Location:'. DIR_NOSESSION);
}

//------------------------------------------------------
//			css dynamique
//----------------------------------------------------------------
$pageCss=explode(".php",basename(__file__));
$pageCss=$pageCss[0];
$cssFile=ROOT_PATH ."css/".$pageCss.".css";









//------------------------------------------------------
//			FONCTION
//------------------------------------------------------

 //------------------------------------------------------
//			DECLARATIONS
//------------------------------------------------------
$errors=[];
$success=[];
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
		<div class="col pt-3  mb-3 text-center">
			<h1 class="underline-anim">WTG France - Bienvenue</h1>			
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php
			include('../view/_errors.php');
			?>
		</div>
	</div>

	<!-- ./container -->
</div>

<?php
require '../view/_footer.php';
?>