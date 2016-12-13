<?php

class Users
{
	public $pseudo ;
	public $nom ;
	public $prenom ;
	public $age ;
	public $adresse ;
	public $CP ;
	public $ville ;
	public $email ;
	public $telephone ;
	
	public function __construct($new_pseudo,$new_nom,$new_prenom,$new_age,$new_adresse,$new_CP,$new_ville,$new_email,$new_telephone)
	{
		$this->pseudo = $new_pseudo ;
		$this->nom = $new_nom ;
		$this->prenom = $new_prenom ;
		$this->age = $new_age ;
		$this->adresse = $new_adresse ;
		$this->CP = $new_CP ;
		$this->ville =$new_ville ;
		$this->email =$new_email ;
		$this->telephone = $new_telephone;
	}
	
	public function add_user(Users $users)
	{
		include('config.php');
		//preparation de la requête pour ajouter
		$req = $bdd->prepare('INSERT INTO users(pseudo,nom,prenom,age,adresse,CP,ville,email,telephone) VALUES (:pseudo, :nom, :prenom, :age, :adresse, :CP, :ville,:email,:telephone)');
		
		$error = $users->find_user($users);
		if(!empty($error))
			return $error ;
		// tentative d'ajout dans la base de données avec les arguments
		if($req->execute(array('pseudo' => $users->pseudo, 'nom' => $users->nom,'prenom' => $users->prenom,'age' => $users->age,'adresse' => $users->adresse,'CP' => $users->CP,
		'ville' => $users->ville,'email' => $users->email,'telephone' => $users->telephone)))
			return 'true' ;
		else
			return 'false' ;
	}

	public function find_user(Users $users)
	{
		include('config.php');
		try {
			$req = $bdd->prepare('select * from users where pseudo = ?');
			$req->execute(array($users->pseudo));
			if($donnees = $req->fetch())
				return 'pseudo' ;
			
			$req1 = $bdd->prepare('select * from users where email = ?');
			$req1->execute(array($users->email));
			if($req1->fetch())
				return 'email' ;
			//if($)
			
		} catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public function get_user($pseudo)
	{
		include('config.php');
		try{
			$req = $bdd->prepare('select * from users where pseudo = ?');
			$req->execute(array($pseudo));
			if($donnees = $req->fetch())
				return $donnees ;
		} catch(Exception $e)
		{
			echo 'erreur :'.$e->getMessage();
		}
	}
}
?>