<?php
function Connection(){
	$login =$_POST['login'];
	$pass = $_POST['mdp'];
	try{
			$bdd = new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8', 'root', '');
		}
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
	}
	$req = $bdd->prepare('SELECT mot_de_passe FROM utilisateur where nom_dutilisateur = ?');
	$req->execute(array($login));
	if($res = $req->fetch()){
		if($res['mot_de_passe'] == $pass){
			echo 'Vous êtes bien connecté';
		}
		else{
			echo 'Mot de passe incorrect';
		}
	}
 }
?>