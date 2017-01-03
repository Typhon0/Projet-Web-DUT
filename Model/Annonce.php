<?php

class Annonce {
	
	public $idAnnonce;
	public $demandeur;
	public $service;
	public $lieu;
	public $prix;
	public $message;
	
	public function __construct($new_demandeur,$new_service,$new_lieu,$new_prix,$new_message)
	{
		$this->idAnnonce = -1 ;
		$this->demandeur = $new_demandeur;		
		$this->service =$new_service;
		$this->lieu = $new_lieu;
		$this->prix = $new_prix;
		$this->message = $new_message;
	}

	function verifier_utilisateurs_dispos($service) {
		
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
	
	function get_annonces_postees() {
		include_once('../Model/config.php');
		
		$query = 'SELECT * FROM Annonce WHERE demandeur = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll(PDO::FETCH_CLASS, "Annonce");
		return $lesAnnonces;
	}
	
	function get_annonces_sauvegardees() {
		include_once('../Model/config.php');
		
		$query = 'SELECT * FROM AnnonceSauv WHERE idUtilisateur = ?';
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll(PDO::FETCH_CLASS, "Annonce");
		return $lesAnnonces;
	}
	
	function delete_annonce($idAnnonce) {
		include_once('../Model/config.php');
		
		$query = 'DELETE FROM Annonce WHERE idAnnonce = ?');
		$stmt = $bdd->prepare($query);
		$stmt->bindValue(1, $idAnnonce, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closeCursor();
		$stmt = NULL;
	}
	
	function get_all_anonces() {
		include_once('../Model/config.php');
		
		$query = 'SELECT * FROM Annonce';
		$stmt = $bdd->prepare($query);
		$stmt->execute();
		$lesAnnonces = $stmt->fetchAll(PDO::FETCH_CLASS, "Annonce");
		return $lesAnnonces;
	}
}
?>