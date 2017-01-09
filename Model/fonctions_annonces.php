<?php 
function verifier_utilisateurs_dispos($service) {
		include_once('Users.php');
		global $bdd;
		$service = (string) $service;
		
		$req = $bdd->prepare('SELECT idUtilisateur FROM UtilisateurService WHERE idService=(SELECT idService FROM Service WHERE nom=:service;) AND disponible=true');
		$req->bindParam(':service', $service, PDO::PARAM_STR);
		$req->execute();
		if($req->num_rows == 0) {
			return false;
		}
		include_once('../Model/Users.php');
		$usersDispos = $req->fetchAll(PDO::FETCH_CLASS, "Users");
		return $usersDispos;
	}
	
	function poster_annonce($titre, $service, $lieu, $prix, $message) {
		include_once('config.php');
		
		$query = 'INSERT INTO Annonce (demandeur, titre, service, lieu, prix, message) VALUES (?, ?, ?, ?, ?, ?);';
		$stmt = $bdd->prepare($query);
		 
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->bindValue(2, $titre, PDO::PARAM_STR);
		$stmt->bindValue(3, $service, PDO::PARAM_INT);
		$stmt->bindValue(4, $lieu, PDO::PARAM_STR);
		$stmt->bindValue(5, $prix, PDO::PARAM_INT);
		$stmt->bindValue(6, $message, PDO::PARAM_STR);
		 
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
	
	function get_annonces_postees() {
		include_once('config.php');
		include_once('Annonce.php');
		
		$query = 'SELECT titre, service, lieu, prix, message FROM Annonce WHERE demandeur = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll(PDO::FETCH_CLASS, "Annonce");
		return $lesAnnonces;
	}
	
	function get_annonces_sauvegardees() {
		include_once('config.php');
		include_once('Annonce.php');
		
		$query = 'SELECT titre, service, lieu, prix, message FROM AnnonceSauv WHERE idUtilisateur = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll(PDO::FETCH_CLASS, "Annonce");
		return $lesAnnonces;
	}
	
	function delete_annonce($idAnnonce) {
		include_once('config.php');
		
		$query = 'DELETE FROM Annonce WHERE idAnnonce = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $idAnnonce, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
	
	function get_all_anonces() {
		include_once('config.php');
		include_once('Annonce.php');
		
		$query = 'SELECT titre, service, lieu, prix, message FROM Annonce';
		$stmt = $bdd->prepare($query);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll(PDO::FETCH_CLASS, "Annonce");
		return $lesAnnonces;
	}
	
	function get_annonces($nbAnnonces) {
		include_once('config.php');
		include_once('Annonce.php');
		
		$query = 'SELECT demandeur, titre, service, lieu, prix, message FROM Annonce LIMIT ?';
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
?>