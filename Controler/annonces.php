<?php

	function verifier_utilisateurs_dispos() {
		
		global $bdd;
		
		$req = $bdd->prepare('SELECT idUtilisateur FROM UtilisateurService WHERE idService=? AND disponible=true');
		$req->bindValue(1, $service, PDO::PARAM_INT);
		$req->execute();
		$usersDispos = $req->fetchAll();
		
		return $usersDispos;
	}