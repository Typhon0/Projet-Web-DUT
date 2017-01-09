<?php 

	function inscription()
	{
		include_once('../Model/Users.php');
		$users1 = Users::get_user("wizou62");
		/*$sucessful = $users1->add_user($users1);
		if($sucessful=='true')
		include_once('../View/inscription_ok.php');
		else
			include_once('../View/inscription_error.php');*/
		include_once('../View/consulter_profil.php');
	}
	
	inscription() ;
?>