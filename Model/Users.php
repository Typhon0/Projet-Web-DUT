<?php

class Users
{
	public $pseudo ;
	public $email ;
	public $mdp ;
	public $desc ;
	public $date_de_naissance ;
	public $type ;

	
	public function __construct($new_pseudo,$new_email,$new_mdp,$new_desc,$new_ddn,$new_type)
	{
		$this->pseudo = $new_pseudo ;		
		$this->email =$new_email ;
		$this->mdp = $new_mdp ;
		$this->desc = $new_desc ;
		$this->date_de_naissance = $new_ddn ;
		$this->type = $new_type ;
	}
	
	public function add_user(Users $users)
	{
		include('config.php');
		//preparation de la requête pour ajouter
		$req = $bdd->prepare('INSERT INTO Utilisateur(login,email,mdp,description,dateNaiss,type,numAgenda) VALUES (:pseudo, :email, :mdp, :description, :ddn, :type, :numAgenda)');

		// test de présence du login ou de l'email dans la bdd
		$error = $users->find_user($users);
		if(!empty($error))
			return $error ;
		// tentative d'ajout dans la base de données avec les arguments
		if($req->execute(array('login' => $users->pseudo,
							'email' => $users->email,
							'mdp' => $users->mdp,
							'description' => $users->description,
							'dateNaiss' => $users->ddn,
							'type' => $users->type,
							'numAgenda' => $num_ag
							)
						)
			)
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
