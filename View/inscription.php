<html>
	<head>
		<title>Incription</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	 <?php echo '<p>veuillez vous inscrire</p>'; ?>
		<form action="../Controler/inscription_confirmation.php" method="post">
		<p><label>Pseudo : </label><input type="text" name="pseudo" required /></p>
		<p><label>E-mail : </label><input type="text" name="email" required/></p>
		<p><label>Mot de passe: </label><input type="text" name="mdp" required /></p>
		<p><label>description : </label><input type="text" name="desc" required/></p>
		<p><label>date de naissance : </label><input type="date" name="ddn" required/></p>
		<p><label>Type : </label><input type="text" name="type" required/></p>
		
	 <p><input type="submit" value="valider"></p>
	</form>
	

	</body>
</html>