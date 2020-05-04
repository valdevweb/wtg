<?php 

/**
 * 
 */
class PiloteManager 
{
	
	

	public function __construct($pdo){
		$this->setPdo($pdo);
	}

	public function getPilote($id){
		$req=$this->pdo->prepare("SELECT * FROM pilotes WHERE id= :id");
		$req->execute([
			':id'	=>$id
		]);
		$data=$req->fetch(PDO::FETCH_ASSOC);
		if(empty($data)){
			return "";
		}
		return $data;
	}



	public function pseudoUniq($pseudo){
		$req=$this->pdo->prepare("SELECT pseudo FROM pilotes WHERE pseudo= :pseudo");
		$req->execute([
			':pseudo'	=>$pseudo
		]);
		$data=$req->fetch(PDO::FETCH_ASSOC);
		if(empty($data)){
			return true;
		}
		return false;
	}

	public function getListPeriphs(){
		$req=$this->pdo->query("SELECT * FROM periphs");
		
		$data=$req->fetchAll(PDO::FETCH_ASSOC);
		if(empty($data)){
			return "";
		}
		return $data;
	}

	public function getListMarques(){
		$req=$this->pdo->query("SELECT * FROM marques");
		
		$data=$req->fetchAll(PDO::FETCH_ASSOC);
		if(empty($data)){
			return "";
		}
		return $data;
	}
	public function getListEcuriesPref(){
		$req=$this->pdo->query("SELECT * FROM ecuries_pref");		
		$data=$req->fetchAll(PDO::FETCH_ASSOC);
		if(empty($data)){
			return "";
		}
		return $data;
	}

	public function getListPilotes($params=null){
		// exemple :
		// $piloteManager->getListPilotes(['authorized=0','console="ps4"']);
		$paramStr="";
		if(isset($params)){
			$paramStr='WHERE ' .join(' AND ',$params);	
		}
		$req=$this->pdo->query("SELECT * FROM pilotes {$paramStr}");
		
		$data=$req->fetchAll(PDO::FETCH_ASSOC);
		if(empty($data)){
			return "";
		}
		return $data;

	}



	public function setPdo($pdo){
		$this->pdo=$pdo;
		return $pdo;
	}
}



