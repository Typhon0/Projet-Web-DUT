<?php
function connection(){
	$login =$_POST['login'];
	$pass = $_POST['mdp'];
	include_once('../Model/Users.php');
	
	$usr = get_user($login);
	if ($usr->mdp == $pass) {
		$_SESSION['user_id'] = $usr->id;
		$_SESSION['username'] = $login;
		$_SESSION['logged'] = true;
		return true;
	} else {
		echo "Connexion refusée : Mot de passe incorrect";
		$_SESSION['logged'] = false;
		return false;
	}
	
 }
 
 /*function login_check($mysqli) {
	 include_once('../Model/config.php');
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], $_SESSION['username'])) {
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];

        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $bdd->prepare("SELECT mdp 
				      FROM Utilisateur 
				      WHERE idUtilisateur = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bindValue(1, $user_id, PDO::PARAM_STR);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

            
}
*/
?>