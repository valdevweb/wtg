
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

include '../Class/ChronoManager.php';
include '../Class/Drapeaux.php';
include '../Class/PiloteManager.php';

$chronoManager=new ChronoManager($pdo,$_SESSION['id']);
$chronos=$chronoManager->getListChronoCircuit();
// si pas de chono pour l'id, vérifier si on a un chrono pour le pseudo
//si oui, c'est que c'est sa 1ere connexion donc  on doit mettre à jour la table chrono avec l'id du pilote


$circuits=$chronoManager->getSaisonCircuit(1);
$nomDrapeau=Drapeaux::arrayDrapeauName($pdo);
$imgDrapeau=Drapeaux::arrayDrapeauImg($pdo);
$piloteManager=new PiloteManager($pdo);
$pilote=$piloteManager->getPilote($_SESSION['id']);
$general=0;

	


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
	<div class="row no-gutters mt-5">
		<div class="col-md-3 align-self-center text-center">
		</div>
		<div class="col mb-3">
			<h1 class="">Pilote <?=$_SESSION['pseudo']?></h1>			
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php
			include('../view/_errors.php');
			// echo "<pre>";
			// print_r($chronos);
			// echo '</pre>';
			

			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 align-self-center text-center">
			<img  class="img-fluid" src="../img/logo/wtg-1000.jpg" style="width: 300px;height:auto">
		</div>
		<div class="col">
			<!-- contenu -->
			<div class="row mt-5">
				<div class="col">
					<h3>Chronos : </h3>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<?php if (isset($chronos) && !empty($chronos)): ?>

					<table class="table table-sm border border-light">
						<thead>
							<tr >
								<th class="banner-size text-center align-middle">CL<br>console</th>
								<th class="banner-size text-center align-middle">CL<br>Général</th>
								<th colspan="3" class="align-middle text-center">Pilote</th>
								<th class="align-middle text-center">Console</th>
								<th colspan="2" class="align-middle text-center">Circuit</th>
								<th class="text-center align-middle">Chrono</th>
								<th colspan="3" class="align-middle text-center">Aides</th>
								<th class="text-right align-middle">Point Chrono</th>
								<th class="text-right align-middle">Point CL<br>général</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($chronos as $key => $chrono): ?>
								
								<tr>
									<td class="banner-c text-center"><?=$chrono['clt_c']?></td>
									<td class="banner-g text-center"><?=$chrono['clt_g']?></td>
									<td ><?=$chrono['pseudo']?></td>
									<td><?=($chrono['id_periph']==2)?'<img src="../img/pilote/volant.png" style="width:28px; height:auto">':''?></td>
									<td><img src="../img/drapeaux/<?=$imgDrapeau[$chrono['id_pays']]?>" style="width:28px; height:auto"></td>
									<td class="text-center"><?='<img src="../img/pilote/'.$chrono['console'].'.png" style="width:28px; height:auto">'?></td>
									<td><img src="../img/drapeaux/<?=$imgDrapeau[$chrono['id_drapeau']]?>" style="width:28px; height:auto"></td>
									<td><?=strtoupper($nomDrapeau[$chrono['id_drapeau']])?></td>
									<td class="text-center"><?=$chrono['chrono']?></td>
									<td class="text-center"><img src="../img/helpers/<?=$chronoManager->helpersToImg('helper1',$chrono['helper1']);?>" style="width:28px; height:auto"></td>
									<td class="text-center"><img src="../img/helpers/<?=$chronoManager->helpersToImg('helper2',$chrono['helper2']);?>" style="width:28px; height:auto"></td>
									<td class="text-center"><img src="../img/helpers/<?=$chronoManager->helpersToImg('helper3',$chrono['helper3']);?>" style="width:28px; height:auto"></td>
									<td class="text-right"><?=$chrono['point_chrono']?></td>
									<td class="text-right"><?=$chrono['point_clt']?></td>
								</tr>
							<?php endforeach ?>
							
						</tbody>
					</table>

				<?php endif ?>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col">
					<h3>Classement général CHRONO <span class="text-primary">F2 ESPORT 20/21</span> : </h3>				
			</div>
		</div>
		<div class="row">
			<div class="col"></div>
		</div>
		<div class="row">
			<div class="col">
				<?php if ($circuits): ?>
						<table class="table table-sm border border-light">
							<thead>
								<tr>
									<th>CL</th>
									<th>Vitesse xxx Pilotes</th>
									<th colspan="3">Pilote</th>
									<th>Console</th>
									<th>Saison</th>
									<?php foreach ($circuits as $circuit): ?>
									<th><img src="../img/drapeaux/<?=$imgDrapeau[$circuit['id_drapeau']]?>" style="width:28px; height:auto"></th>	
									<?php endforeach ?>
									<th>Général</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td ><?=$pilote['pseudo']?></td>
									<td><?=($pilote['id_periph']==2)?'<img src="../img/pilote/volant.png" style="width:28px; height:auto">':''?></td>
									<td><img src="../img/drapeaux/<?=$imgDrapeau[$pilote['id_pays']]?>" style="width:28px; height:auto"></td>
									<td class="text-center"><?='<img src="../img/pilote/'.$pilote['console'].'.png" style="width:28px; height:auto">'?></td>
									<td></td>
									<?php foreach ($circuits as $circuit): ?>
										<td><?= $chronoManager->getPointChrono(1, $circuit['id_drapeau'])?></td>
										<?php $general=$general + intval($chronoManager->getPointChrono(1, $circuit['id_drapeau'])) ?>
									<?php endforeach ?>
									<td><?=$general?></td>
									
								</tr>
							</tbody>
						</table>					
				<?php endif ?>
			</div>
		</div>

		Vitesse xxx Pilotes= nb de pilotes inscrit <br>
	
		<!-- chronos en cours -->
		
	</div>
	<div class="col-lg-1"></div>
</div>


<!-- ./container -->
</div>

<?php
require '../view/_footer.php';
?>