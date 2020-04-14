
<?php
require('../config/autoload.php');

// if(!isset($_SESSION['id'])){
// 	echo "pas de variable session";
// 	header('Location:'. DIR_NOSESSION);
// }
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
//------------------------------------------------------
//			VIEW
//------------------------------------------------------
include('../view/_head.php');
include('../view/_navbar.php');
?>
<!--********************************
DEBUT CONTENU CONTAINER
*********************************-->
<div class="container-fluid">
	<h1 class="text-primary">Main title</h1>

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