<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Logo Nav - Start Bootstrap Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/hover-min.css" rel="stylesheet">
    <link href="../css/swiper.min.css" rel="stylesheet">
    <link href="../css/profile.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php require("menu.php");?>
        <!-- Page Content -->
		<?php
		include('../Model/fonctions_profil.php');
		$user = get_user($_SESSION['username']);
		$services = get_services($_SESSION['user_id']);
		?>
		<div class="container">
            <?php require("menuProfile.php");?> <a href="EditProfile.php" class="btn btn-primary btn-lg" role="button">Editer</a>
                <div class="row">
                    <div class="col-xs-4">
                        <h1><?php echo $user['login'] ?></h1> </div>
                    <div class="col-xs-8">
                        <h3>Description :</h3>
                        <p>
                            <?php echo $user['description'] ?>
                        </p>
                    </div>
                </div>
                <h1>Mes services</h1>
				<?php 
				include('../Model/fonctions_annonces.php');
				foreach ($services as $service) {
				?>
                <div class="row">
                    <div class="col-xs-2">
                        <p><?php $nomServ = get_nomService($service['idService']);
							echo $nomServ ?></p>
                    </div>
                </div>
				<?php } ?>
        </div>
        </div>
        <!-- /.container -->
        <!-- jQuery -->
        <script src="../js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
</body>

</html>