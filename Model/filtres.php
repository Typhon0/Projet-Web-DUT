<?php
	function filtreService($services){
		$service = $services;
		include('config.php');
		$req = $bdd->prepare('Select * from Annonce where demandeur IN (Select idUtilisateur from UtilisateurService where idService IN (Select idService from service where nom LIKE ?))');
		$req->execute(array($service));
		$resultat = $req->fetchAll();
		return $resultat;
	}
	
	function recherche_annonce_service($service) {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE service = (SELECT idService FROM Service WHERE nom = ?)');
		$stmt->bindValue(1, $service, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function filtrePrix($Min,$Max){
		$prixmin = $Min;
		$prixmax = $Max;
		include('../Model/config.php');
		$req = $bdd->prepare('SELECT * FROM Annonce where prix > ? and prix < ?');
		$req->execute(array($prixmin,$prixmax));
		$result = $req->fetchAll();
		return $result;
	}
	
	function recherche_annonce_prix($min) {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE prix >= ?');
		$stmt->bindValue(1, $min, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function filtreLieu($newLieu){
		$lieu = $newLieu;
		include("../Model/config.php");
		$req = $bdd->prepare('SELECT * FROM Annonce where lieu = ?');
		$req->execute(array($lieu));
		$resultat = $req->fetchAll();
		return $resultat;
	}
	
	function recherche_annonce_lieu($lieu) {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE lieu = ?');
		$stmt->bindValue(1, $lieu, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function recherche_annonce_service_prix($service, $prix) {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE service = (SELECT idService FROM Service WHERE nom = ?) AND prix >= ?');
		$stmt->bindValue(1, $service, PDO::PARAM_STR);
		$stmt->bindValue(2, $prix, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function recherche_annonce_service_lieu($service, $lieu) {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE service = (SELECT idService FROM Service WHERE nom = ?) AND lieu = ?');
		$stmt->bindValue(1, $service, PDO::PARAM_STR);
		$stmt->bindValue(2, $lieu, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function recherche_annonce_prix_lieu($prix, $lieu) {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE lieu = ? AND prix >= ?');
		$stmt->bindValue(1, $lieu, PDO::PARAM_STR);
		$stmt->bindValue(2, $prix, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function recherche_annonce_service_lieu_prix($service, $lieu, $prix) {
		include('config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE service = (SELECT idService FROM Service WHERE nom = ?) AND lieu = ? AND prix >= ?');
		$stmt->bindValue(1, $service, PDO::PARAM_STR);
		$stmt->bindValue(2, $lieu, PDO::PARAM_STR);
		$stmt->bindValue(3, $prix, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
?>