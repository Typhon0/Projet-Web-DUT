<?php
session_start();

include("../Model/config.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	

$destinataire = $_POST['desti'];
$objet = $_POST['obj'];
$texte = $_POST['texte'];

$emetteur  = $_SESSION['username'];

    
	$query = 'INSERT INTO Message (destinataire, emetteur, contenu, objet, lu) VALUES (?, ?, ?, ?, ?);';
        
		$stmt = $bdd->prepare($query);
		 
		$stmt->bindValue(1, $destinataire, PDO::PARAM_STR);
		$stmt->bindValue(2, $emetteur, PDO::PARAM_STR);
		$stmt->bindValue(3, $texte, PDO::PARAM_INT);
		$stmt->bindValue(4, $objet, PDO::PARAM_STR);
		$stmt->bindValue(5, 0, PDO::PARAM_INT);
		 
		$stmt->execute();

header('Location: ../View/messagerie.php');


?>