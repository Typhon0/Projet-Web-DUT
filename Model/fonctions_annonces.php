<?php 


function verifier_utilisateurs_dispos($service) {
		include('config.php');
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
	
	function poster_annonce($titre, $service, $lieu, $prix, $message) {
		include_once('config.php');
        $query1 = 'SELECT idService FROM Service WHERE nom = ?';
        $req = $bdd->prepare($query1);
        $req->bindValue(1,$service, PDO::PARAM_STR);
        $req->execute();
        $idService=0;
        	if ($donnee = $req->fetch()) {
			$idService = $donnee['idService'];
		};

		
		$query = 'INSERT INTO Annonce (demandeur, titre, service, lieu, prix, message) VALUES (?, ?, ?, ?, ?, ?);';
        
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->bindValue(2, $titre, PDO::PARAM_STR);
		$stmt->bindValue(3, $idService, PDO::PARAM_INT);
		$stmt->bindValue(4, $lieu, PDO::PARAM_STR);
		$stmt->bindValue(5, $prix, PDO::PARAM_INT);
		$stmt->bindValue(6, $message, PDO::PARAM_STR);
		 
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
	
	function get_annonces_postees() {
		include('config.php');
		
		$query = 'SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE demandeur = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll();
		return $lesAnnonces;
	}
	
	function get_annonces_sauvegardees() {
		include('config.php');
		
		$query = 'SELECT idAnnonce FROM AnnonceSauv WHERE idUtilisateur = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll();
		return $lesAnnonces;
	}
	
	function get_full_annonce($idAnnonce) {
		include('config.php');
		
		$query = 'SELECT demandeur, titre, service, lieu, prix, message FROM Annonce WHERE idAnnonce = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $idAnnonce, PDO::PARAM_INT);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll();
		return $lesAnnonces;
	}
	
	function delete_annonce($idAnnonce) {
		include('config.php');
		
		$query = 'DELETE FROM Annonce WHERE idAnnonce = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $idAnnonce, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
	
	function get_all_annonces() {
		include('config.php');
		
		$query = 'SELECT demandeur, titre, service, lieu, prix, message GROUP BY id DESC FROM Annonce';
		$stmt = $bdd->prepare($query);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll();
		return $lesAnnonces;
	}
	
	function get_annonces($nbAnnonces) {
		include_once('config.php');
		include_once('Annonce.php');
		
		$query = 'SELECT demandeur, titre, service, lieu, prix, message FROM Annonce GROUP BY idAnnonce DESC LIMIT ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $nbAnnonces, PDO::PARAM_INT);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll();
		return $lesAnnonces;
	}
	
	function get_username_demandeur($demandeur) {
		include('config.php');
		
		$query = 'SELECT login FROM Utilisateur WHERE idUtilisateur = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $demandeur, PDO::PARAM_INT);
		$stmt->execute();
		//$username = $stmt->fetch();
		if ($donnee = $stmt->fetch()) {
			return $donnee['login'];
		}
	}
	
	function get_nomService($idService) {
		include('config.php');
		
		$query = 'SELECT nom FROM Service WHERE idService = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $idService, PDO::PARAM_INT);
		$stmt->execute();
		//$username = $stmt->fetch();
		if ($donnee = $stmt->fetch()) {
			return $donnee['nom'];
		}
	}
?>