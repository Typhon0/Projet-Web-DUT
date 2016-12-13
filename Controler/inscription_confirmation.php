<?php 


	function inscription()
	{
		include_once('../Model/Users.php');
		$users1 = new Users($_POST["pseudo"],$_POST["nom"],$_POST["prenom"],$_POST["age"],$_POST["adresse"],$_POST["CP"],$_POST["ville"],$_POST["email"],$_POST["telephone"]);
		$sucessful = $users1->add_user($users1);
		if($sucessful=='true')
		include_once('../View/inscription_ok.php');
		else
			include_once('../View/inscription_error.php');
	}
	
	inscription() ;
?>
