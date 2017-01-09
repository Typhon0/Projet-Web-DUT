<?php
	function filtreService($services){
		$service = $services;
		include('../Model/config.php');
		$req = $bdd->prepare('Select * from annonce where demandeur IN (Select idUtilisateur from utilisateurservice where idService IN (Select idService from service where nom LIKE ?))');
		$req->execute(array($service));
		$resultat = $req->fetchAll();
		return $resultat;
	}
	
	function recherche_annonce_service($service) {
		include('Config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE service = (SELECT idService FROM Service WHERE nom = ?)');
		$stmt->bindValues(1, $service, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function filtrePrix($Min,$Max){
		$prixmin = $Min;
		$prixmax = $Max;
		include('../Model/config.php');
		$req = $bdd->prepare('SELECT * FROM annonce where prix > ? and prix < ?');
		$req->execute(array($prixmin,$prixmax));
		$result = $req->fetchAll();
		return $result;
	}
	
	function recherche_annonce_prix($min) {
		include('Config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE prix >= ?');
		$stmt->bindValues(1, $min, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function filtreLieu($newLieu){
		$lieu = $newLieu;
		include("../Model/config.php");
		$req = $bdd->prepare('SELECT * FROM annonce where lieu = ?');
		$req->execute(array($lieu));
		$resultat = $req->fetchAll();
		return $resultat;
	}
	
	function recherche_annonce_lieu($lieu) {
		include('Config.php');
		
		$stmt = $bdd->prepare('SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE lieu = ?');
		$stmt->bindValues(1, $lieu, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
?>