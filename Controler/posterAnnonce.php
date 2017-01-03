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
	try {
		$bdd = new PDO('mysql:host=86.105.212.158;dbname=ProjetWebDUT;charset=utf8', 'ProjetWebDUT', 'sVdWd4gt6VL01mOW');
	}
	catch(PDOException $e) {
		$msg = 'ERREUR PDO dans ' .$e->getFile() . ' L.' . $e->getLine() . ':' . $e->getMessage();
		die($msg);
	}
	
	$query = 'INSERT INTO Annonce (demandeur, catService, lieu, prix, message) VALUES (?, ?, ?, ?, ?);';
	$stmt = $bdd->prepare($query);
	 
	//PROBLEME AVEC L'ID DE L'UTILISTEUR
	$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
	$stmt->bindValue(2, $service, PDO::PARAM_INT);
	$stmt->bindValue(3, $lieu, PDO::PARAM_STR);
	$stmt->bindValue(4, $prix, PDO::PARAM_INT);
	$stmt->bindValue(5, $message, PDO::PARAM_STR);
	 
	$stmt->execute();
	$stmt->closeCursor();
	$stmt = NULL;
}
?>