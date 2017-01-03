<?php

	function verifier_utilisateurs_dispos($service) {
		
		global $bdd;
		$service = (string) $service;
		
		$req = $bdd->prepare('SELECT idUtilisateur FROM UtilisateurService WHERE idService=(SELECT idService FROM Service WHERE nom=:service;) AND disponible=true');
		$req->bindParam(':service', $service, PDO::PARAM_STR);
		$req->execute();
		$usersDispos = $req->fetchAll();
		
		return $usersDispos;
	}
?>