<?php

class Users
{
	public $id ;
	public $pseudo ;
	public $email ;
	public $mdp ;
	public $desc ;
	public $date_de_naissance ;
	public $type ;

	
	public function __construct($new_pseudo,$new_email,$new_mdp,$new_desc,$new_ddn,$new_type)
	{
		$this->pseudo = -1 ;
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
		$req = $bdd->prepare('INSERT INTO Utilisateur (login,email,mdp,description,dateNaiss,typeU) VALUES (?, ?, ?, ?, ?, ?)');

		// test de présence du login ou de l'email dans la bdd
		//$error = $users->find_user($users);
		//if(!empty($error))
			//return $error ;


			// tentative d'ajout dans la base de données avec les arguments
		$req->bindValue(1, $users->pseudo, PDO::PARAM_STR);
        $req->bindValue(2, $users->email, PDO::PARAM_STR);	
        $req->bindValue(3, $users->mdp, PDO::PARAM_STR);	
        $req->bindValue(4, $users->desc, PDO::PARAM_STR);	
        $req->bindValue(5, $users->date_de_naissance, PDO::PARAM_STR);	
        $req->bindValue(6, $users->type, PDO::PARAM_STR);	

      $req -> execute() or die("Error INSERT");
        
				$us = $users->get_user($users->pseudo) ;
				$id_user = $us['idUtilisateur'];
				$req1 = $bdd->prepare('INSERT INTO Agenda (idUtilisateur) VALUES (:idUtilisateur)');
				$req1->execute(array('idUtilisateur' => $id_user,));	
        return 'true';
			
    }

	public function find_user(Users $users)
	{
		include('config.php');
		try {
			$req = $bdd->prepare('select * from Utilisateur where login = ?');
			$req->execute(array($users->pseudo));
			if($donnees = $req->fetch())
				return 'pseudo' ;
			
			$req1 = $bdd->prepare('select * from Utilisateur where email = ?');
			$req1->execute(array($users->email));
			if($req1->fetch())
				return 'email' ;	
		} catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public function get_user($pseudo)
	{
		include('config.php');
		try{
			$req = $bdd->prepare('select * from Utilisateur where login = ?');
			$req->execute(array($pseudo));
			if($donnees = $req->fetch())
			{
				$originalDate = $donnees['dateNaiss'] ;
				$donnees['dateNaiss'] = date("d-m-Y", strtotime($originalDate));
				return $donnees ;
			}
		} catch(Exception $e)
		{
			echo 'erreur :'.$e->getMessage();
		}
		
	}
		
	public function get_info_connect_user($email)
	{
		include('config.php');
		try{
			$req = $bdd->prepare('select * from Utilisateur where email = ?');
			$req->execute(array($email));
			if($donnees = $req->fetch())
			{
                return $donnees;
			}
		} catch(Exception $e)
		{
			echo 'erreur :'.$e->getMessage();
		}
		
	}
}

?>