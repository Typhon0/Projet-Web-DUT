<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../Model/fonctions_annonces.php");

$_SESSION['user_id']=1;
$titre= $_POST['titre'];
$service= $_POST['service'];
$message= $_POST['message'];
$lieu= $_POST['lieu'];
$prix = $_POST['prix'];

poster_annonce($titre,$service,$lieu,$prix,$message);

echo "Sucess";


?>