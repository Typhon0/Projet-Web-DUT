<?php
session_start();
include('../Model/fonctions_profil.php');
$newDescription = $_POST['description'];
if($newDescription != "") {
	modifier_description($newDescription);
}

supprimer_services($_SESSION['user_id']);

foreach($_POST['service'] as $valeur)
{
	modifier_service($valeur);
}
header('Location: ../View/Profile.php');
?>