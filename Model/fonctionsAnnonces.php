<?php

	function verifier_utilisateurs_dispos($service) {
		
		global $bdd;
		$service = (string) $service;
		
		$req = $bdd->prepare('SELECT idUtilisateur FROM UtilisateurService WHERE idService=(SELECT idService FROM Service WHERE nom=:service;) AND disponible=true');
		$req->bindParam(':service', $service, PDO::PARAM_STR);
		$req->execute();
		if($req->num_rows == 0) {
			return false;
		}
		$usersDispos = $req->fetchAll();
		return $usersDispos;
	}
	
	function poster_annonce($service, $lieu, $prix, $message) {
		include_once('../Model/config.php');
		
		$query = 'INSERT INTO Annonce (demandeur, catService, lieu, prix, message) VALUES (?, ?, ?, ?, ?);';
		$stmt = $bdd->prepare($query);
		 
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->bindValue(2, $service, PDO::PARAM_INT);
		$stmt->bindValue(3, $lieu, PDO::PARAM_STR);
		$stmt->bindValue(4, $prix, PDO::PARAM_INT);
		$stmt->bindValue(5, $message, PDO::PARAM_STR);
		 
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
?>