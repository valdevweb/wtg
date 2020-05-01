<?php 

/**
 * 
 */
class Drapeaux 
{
	public static function arrayDrapeauName($pdo){
		$req=$pdo->query("SELECT id,drapeau FROM drapeaux ORDER BY drapeau");		
		return $req->fetchAll(PDO::FETCH_KEY_PAIR);
	}

	public static function arrayDrapeauImg($pdo){
		$req=$pdo->query("SELECT id,img FROM drapeaux ORDER BY drapeau");
		return $req->fetchAll(PDO::FETCH_KEY_PAIR);
	}
	public static function getListDrapeau($pdo){
		$req=$pdo->query("SELECT * FROM drapeaux ORDER BY drapeau");		
		return $req->fetchAll(PDO::FETCH_ASSOC);
	}
}

