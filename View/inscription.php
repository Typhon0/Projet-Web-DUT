<html>
	<head>
		<title>Incription</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	 <?php echo '<p>veuillez vous inscrire</p>'; ?>
		 <form action="../Controler/inscription_confirmation.php" method="post">
		 <p><label>Pseudo : </label><input type="text" name="pseudo" required /></p>
		 <p><label>Nom : </label><input type="text" name="nom" required /></p>
		 <p><label>Prenom : </label><input type="text" name="prenom" required/></p>
		 <p><label>Âge :</label><input type="text" name="age" required/></p>
		 <p><label>Adresse : </label><input type="text" name="adresse" required/></p>
		 <p><label>Code Postal : </label><input type="text" name="CP" required/></p>
		 <p><label>Ville : </label><input type="text" name="ville" required/></p>
		 <p><label>E-mail: </label><input type="text" name="email" required/></p>
		 <p><label>Numéro de téléphone : </label><input type="text" name="telephone" required/></p>

	 <p><input type="submit" value="valider"></p>
	</form>
	

	</body>
</html>