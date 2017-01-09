<?php
    session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function connection(){
    
	
	$login = $_POST["email"];
	$pass = $_POST["mdp"];
	include_once('../Model/Users.php');

	$usr = Users::get_info_connect_user($login);
    
    echo $usr['email'];
	if ($usr['mdp'] == $pass) {
		echo "connecté" ;
		$_SESSION['user_id'] = $usr['idUtilisateur'];
		$_SESSION['username'] = $usr['login'];
		$_SESSION['logged'] = true;
		return true;
	} else {
		echo "Connexion refusée : Mot de passe incorrect";
		$_SESSION['logged'] = false;
		return false;
	}
	}
 
 	connection();

if($_SESSION['logged'] = true){
    header('Location: ../index.php');

    
}else{
    header('Location: ../View/Errorlogin.php');

}
 
?>