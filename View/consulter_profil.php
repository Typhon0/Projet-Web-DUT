<html>
	<head>
		<title>Profil </title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	 <?php echo '<p>Voici les informations à propos de '.$users1['login'].'</p>'; ?>
		
		 <p><label>Pseudo : </label> <?php echo $users1['login'] ?></p>
		 <p><label>email : </label><?php echo $users1['email'] ?></p>
		 <p><label>Description : </label><?php echo $users1['description'] ?></p>
		 <p><label>Date de naissance : </label><?php echo $users1['dateNaiss'] ?></p>
		 <p><label>type : </label><?php echo $users1['type'] ?></p>
		 <p><label>Avatar :</label><?php echo $users1['avatar'] ?></p>
	</body>
</html>