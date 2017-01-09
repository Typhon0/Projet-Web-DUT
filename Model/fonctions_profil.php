<?php 
	function get_pseudo_user($idUser)
	{
		include('config.php');
		try{
			$req = $bdd->prepare('select * from utilisateur where idUtilisateur = ?');
			$req->bindValue(1, $idUser, PDO::PARAM_INT);
			$req->execute();
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
	
	function get_user($pseudo)
	{
		include('config.php');
		try{
			$req = $bdd->prepare('select * from utilisateur where login = ?');
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
	
	function get_services($idUser) {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT idService FROM UtilisateurService WHERE disponible = 1');
		$stmt->execute();
		$lesServices = $stmt->fetchAll();
		return $lesServices;
	}
	
	function get_all_services() {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT idService FROM Service');
		$stmt->execute();
		$lesServices = $stmt->fetchAll();
		return $lesServices;
	}
	
	function add_service($idUser, $idService) {
		include('config.php');
		
		$stmt = $bdd->prepare('INSERT INTO UtilisateurService VALUES (?, ?)');
		$stmt->bindValue(1, $idUser, PDO::PARAM_INT);
		$stmt->bindValue(2, $idService, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
?>