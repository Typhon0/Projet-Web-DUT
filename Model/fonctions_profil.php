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
		
		$stmt = $bdd->prepare('SELECT idService, nom FROM Service');
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
	
	function modifier_description($description) {
		include('config.php');
		
		$stmt = $bdd->prepare('UPDATE Utilisateur SET description = ? WHERE idUtilisateur = ?');
		$stmt->bindValue(1, $description, PDO::PARAM_STR);
		$stmt->bindValue(2, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
	
	function supprimer_services($idUser) {
		include('config.php');
		
		$stmt = $bdd->prepare('DELETE FROM UtilisateurService WHERE idUtilisateur = ?');
		$stmt->bindValue(1, $idUser, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
	
	function modifier_service($idService) {
		include('config.php');
		
		$stmt = $bdd->prepare('INSERT INTO UtilisateurService VALUES (?,?,1)');
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->bindValue(2, $idService, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
?>