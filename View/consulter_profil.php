<html>
	<head>
		<title>Profil </title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	 <?php echo '<p>Voici les informations à propos de '.$users1['pseudo'].'</p>'; ?>
		
		 <p><label>Pseudo : </label> <?php echo $users1['pseudo'] ?></p>
		 <p><label>Nom : </label><?php echo $users1['nom'] ?></p>
		 <p><label>Prenom : </label><?php echo $users1['prenom'] ?></p>
		 <p><label>Age :</label><?php echo $users1['age'] ?></p>
		 <p><label>Adresse : </label><?php echo $users1['adresse'] ?></p>
		 <p><label>Code Postal : </label><?php echo $users1['CP'] ?></p>
		 <p><label>Ville : </label><?php echo $users1['ville'] ?></p>
		 <p><label>E-mail: </label><?php echo $users1['email'] ?></p>
		 <p><label>Numéro de téléphone : </label><?php echo $users1['telephone'] ?></p>

	

	</body>
</html>