<?php
	function filtreService($services){
		$service = $services;
		include('../Model/config.php');
		$req = $bdd->prepare('Select * from annonce where demandeur IN (Select idUtilisateur from utilisateurservice where idService IN (Select idService from service where nom LIKE ?))');
		$req->execute(array($service));
		$resultat = $req->fetchAll();
		return $resultat;
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
	
	function filtreLieu($newLieu){
		$lieu = $newLieu;
		include("../Model/config.php");
		$req = $bdd->prepare('SELECT * FROM annonce where lieu = ?');
		$req->execute(array($lieu));
		$resultat = $req->fetchAll();
		return $resultat;
	}
?>