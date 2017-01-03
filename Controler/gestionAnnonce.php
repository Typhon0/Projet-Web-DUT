<?php
$service = $_POST['service'];
$message = $_POST['message'];
$lieu = $_POST['lieu'];
$prix = $_POST['prix'];
if(empty($lieu) || empty($message) || empty($prix)) {
	if(empty($lieu)) {
	print("<center>Le champ '<b>Lieu</b>' est vide</center>");
	}
	if(empty($prix)) {
	print("<center>Le champ '<b>Prix</b>' est vide</center>");
	}
	if(empty($message)) {
	print("<center>Le champ '<b>Message</b>' est vide</center>");
	exit();
	}
}
else {
	include_once('../Model/fonctionsAnnonces.php');
	poster_annonce($service, $lieu, $prix, $message);
	if(verifier_utilisateur_dispos($service) != false) {
		$users = verifier_utilisateur_dispos($service);
		//IL FAUT NOTIFIER TOUS LES UILISATEURS PAR UN MESSAGE PRIVE
	}
}
?>