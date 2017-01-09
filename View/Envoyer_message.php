<?php
include('config.php');
?>

<?php
session_start();
if (!isset($_SESSION['login'])) {
	// si ce n'est pas le cas, on le redirige vers l'accueil
	header ('Location: index.php');
	exit();
}

// on teste si le formulaire a bien été soumis
if (isset($_POST['go']) && $_POST['go'] == 'Envoyer') {
	if (empty($_POST['destinataire']) || empty($_POST['objet']) || empty($_POST['contenu'])) {
	$erreur = 'Au moins un des champs est vide.';
	}
	else {
	$base = mysql_connect ('serveur', 'login', 'password');
	mysql_select_db ('nom_base', $base);

	// si tout a été bien rempli, on insère le message dans notre table SQL
	$sql = 'INSERT INTO Message VALUES("'.$_SESSION['idMessage'].'", "'.$_POST['destinataire'].'","'.$_SESSION['emetteur'].'", "'.mysql_escape_string($_POST['contenu']).'", "'.mysql_escape_string($_POST['objet']).'","'.mysql_escape_string($_POST['lu']).'", "'.date("Y-m-d H:i:s").'")';
	mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

	mysql_close();

	header('Location: Utilisateur.php');
	exit();
	}
}
?>

<html>
<head>
<title>Espace Utilisateur</title>
</head>

<body>
<a href="profile.php">Retour à l'accueil</a><br /><br />
Envoyer un message :<br /><br />

<?php
$base = mysql_connect ('serveur', 'login', 'password');
mysql_select_db ('nom_base', $base);

// on prépare une requete SQL selectionnant tous les login des membres du site en prenant soin de ne pas selectionner notre propre login, le tout, servant à alimenter le menu déroulant spécifiant le destinataire du message
$sql = 'SELECT Utilisateur.login as nom_destinataire, Utilisateur.idUtilisateur as id_destinataire FROM Utilisateur WHERE idUtilisateur <> "'.$_SESSION['id'].'" ORDER BY login ASC';
// on lance notre requete SQL
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$nb = mysql_num_rows ($req);

if ($nb == 0) {
	// si aucun utilisateur n'a été trouvé, on affiche tout simplement aucun formulaire
	echo 'Vous êtes le seul utilisateur inscrit.';
}
else {
	// si au moins un membre qui n'est pas nous même a été trouvé, on affiche le formulaire d'envoie de message
	?>
	<form action="envoyer.php" method="post">
	Pour : <select name="destinataire">
	<?php
	// on alimente le menu déroulant avec les login des différents membres du site
	while ($data = mysql_fetch_array($req)) {
	echo '<option value="' , $data['id_destinataire'] , '">' , stripslashes(htmlentities(trim($data['nom_destinataire']))) , '</option>';
	}
	?>
	</select><br />
	Objet : <input type="text" name="objet" value="<?php if (isset($_POST['objet'])) echo stripslashes(htmlentities(trim($_POST['objet']))); ?>"><br />
	Message : <textarea name="message"><?php if (isset($_POST['contenu'])) echo stripslashes(htmlentities(trim($_POST['contenu']))); ?></textarea><br />
	<input type="submit" name="go" value="Envoyer">
	</form>
	<?php
}
mysql_free_result($req);
mysql_close();
?>
</select>

<br />
<?php
// si une erreur est survenue lors de la soumission du formulaire, on l'affiche
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>
</html>