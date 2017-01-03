<?php 

	function inscription()
	{
		include_once('../Model/Users.php');
		$users1 = new Users($_POST["pseudo"],$_POST["email"],$_POST["mdp"],$_POST["desc"],$_POST["ddn"],$_POST["type"]);
		$sucessful = $users1->add_user($users1);
		if($sucessful=='true')
		include_once('../View/inscription_ok.php');
		else
			include_once('../View/inscription_error.php');
	}
	
	inscription() ;
?>
