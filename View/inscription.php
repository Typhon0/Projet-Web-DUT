<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Signin Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <form action="../Controler/inscription_confirmation.php" method="post" class="form-signin">
            <h2 class="form-signin-heading">Inscription</h2>
            <label for="inputPseudo" class="sr-only">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required>

            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required>
            
            <label for="inputPseudo" class="sr-only">Description</label>
          <!--  <textarea class="form-control" rows="3" name="desc" placeholder="Description" required></textarea>-->
            	<p><label>description : </label><input type="text" name="desc" required/></p>

            
            <label for="inputPseudo" class="sr-only">Date de naissance</label>
            <input type="text" name="ddn" class="form-control" placeholder="Date de naissance" required>
            
            <label for="inputPseudo" class="sr-only">Type</label>
            <input type="text" name="type" class="form-control" placeholder="Type" required>
            
        
            <button class="btn btn-lg btn-primary btn-block" value="valider" type="submit">Valider</button>
        </form>
    </div>
    <!-- /container -->
</body>

</html>
<!--
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
-->