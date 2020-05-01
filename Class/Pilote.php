<?php 

/**
 * 
 */
class Pilote 
{
	private $pseudo;
	private $pwd;
	private $email;
	private $dateBirth;
	private $men;
	private $console;
	private $f2019;
	private $f2020;
	private $idPays;	
	private $periph;
	private $marque;
	private $modele;
	private $preferedEcurie;





	public function __construct(array $data){
		$this->hydrate($data);
	}

	public function hydrate($data){
		foreach($data as $key => $value){
			$underscore=explode('_',$key);
			if(count($underscore)>1){
				$method='';
				for ($i=0; $i < count($underscore) ; $i++) {
					$method.=ucfirst($underscore[$i]);
				}
				$method='set'.$method;
			}
			else{
				$method='set'.ucfirst($key);
			}
			if(method_exists($this,$method)){
				$this->$method($value);
			}
		}

	}




	public function getPseudo(){
	return $this->pseudo;
	}
	
	public function setPseudo($pseudo){
	$this->pseudo = $pseudo;
	return $this;
	}
	
	public function getPwd(){
	return $this->pwd;
	}
	
	public function setPwd($pwd){
	$this->pwd = $pwd;
	return $this;
	}
	}