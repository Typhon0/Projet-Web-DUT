<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	
		include_once('../Model/Users.php');

        
		$users1 = new Users($_POST["pseudo"],$_POST["email"],$_POST["mdp"],$_POST["desc"],$_POST["ddn"],$_POST["type"]);
        

		// test de présence du login ou de l'email dans la bdd
     //$users->find_user($users);



		$sucessful = $users1->add_user($users1);
        echo $sucessful;
		if($sucessful=='true'){
$message = "Vous êtes maintenant inscrit";
echo "<script type='text/javascript'>alert('$message');</script>";		
            
                header('Location: ../View/login.php');

        }else {
	include_once('../View/inscription_error.php');}

?>