<?php 

/**
 * 
 */
class ChronoManager 
{
	private $pdo;
	private $idPilote;
	
	public function __construct($pdo, $idPilote){
		$this->setPdo($pdo);
		$this->setIdPilote($idPilote);
	}

	public function setPdo($pdo){
		$this->pdo=$pdo;
		return $pdo;
	}
	public function setIdPilote($idPilote){
		$this->idPilote=$idPilote;
		return $idPilote;
	}

	public function getListChronoCircuit(){
		$req=$this->pdo->prepare("SELECT * FROM chronos 			
			LEFT JOIN pilotes ON chronos.id_pilote=pilotes.id
			WHERE id_pilote= :id_pilote");
		$req->execute([
			':id_pilote'	=>$this->idPilote
		]);
		$datas=$req->fetchAll(PDO::FETCH_ASSOC);
		if(empty($datas)){
			return "";
		}
		return $datas;
	}

	public function getPointChrono($idSaison,$idDrapeau){

		$req=$this->pdo->prepare("SELECT * FROM chronos	WHERE id_pilote= :id_pilote AND id_saison= :id_saison AND id_drapeau = :id_drapeau");
		$req->execute([
			':id_pilote'	=>$this->idPilote,
			':id_saison'	=>$idSaison,
			':id_drapeau'	=>$idDrapeau,
		]);
		$data=$req->fetch(PDO::FETCH_ASSOC);
		if(empty($data)){
			return "";
		}
		return $data['point_chrono'];

	}

		public function getSaisonCircuit($idSaison){

		$req=$this->pdo->prepare("SELECT * FROM saison_circuits WHERE id_saison= :id_saison");
		$req->execute([
			':id_saison'	=>$idSaison
		]);
		$datas=$req->fetchAll(PDO::FETCH_ASSOC);
		if(empty($datas)){
			return "";
		}
		return $datas;

	}

	/*
	* renvoie le nom du fichier image du helper en fonction de la config pour le chronos (valeur 0 ou 1) et du nom du helper concerné (nom du champ)
	*/
	public function helpersToImg($field,$value){
		switch ($field) {
			case 'helper1':
			return ($value==1)?'1-patinage.png' : '1-patinage-ko.png';
			break;
			case 'helper2':
			return ($value==1)?'2-vitesse.png' : '2-vitesse-ko.png';

			break;
			case 'helper3':
			return ($value==1)?'3-blocage.png' : '3-blocage-ko.png';

			break;
			default:
			return "";
			break;
		}

	}



}




?>