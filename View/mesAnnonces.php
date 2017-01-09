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
<<<<<<< Updated upstream
		<?php
		include('../Model/fonctions_annonces.php');
		include('../Model/config.php');
=======
        <?php
		include('../Model/fonctions_annonces.php');
		include('../Model/config.php');

>>>>>>> Stashed changes
		?>
        <div class="container">
            <?php require("menuProfile.php");?>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Annonces postées</a></li>
                    <li><a data-toggle="tab" href="#menu1">Annonce enregistrées</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>Annonces postées</h3>
                        <div id="listannonceP" class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <?php $annoncesP = get_annonces_postees();
                                    foreach ($annoncesP as $annonce) { ?>
                                            <div id="listannonce" class="row">
                                                <a href="#">
                                                    <div class="col-xs-3 col-sm-2 text-center no-padding">
                                                        <button type="button" class="glyphicon glyphicon-remove btn btn-danger"></button>
                                                    </div>
                                                    <div class="col-xs-9 col-sm-10">
														<h4 class="title">
														<?php echo $annonce['titre'] ?>                                       </h4>
														<div class="username"> Type de service : <span class="capitalize firstname">
														<?php $service = get_nomService($annonce['service']);
																echo $service ?></span></div>
														<div class="username"> Utilisateur : <span class="capitalize firstname">
														<?php $username = get_username_demandeur($annonce['demandeur']);
																echo $username ?></span></div>
														<div class="budget"> Budget : <b>
														<?php echo $annonce['prix'] ?> €</b> </div>
														<div class="duration"> Lieu : <b>
														<?php echo $annonce['lieu'] ?> </b> </div>
													</div>
                                                </a>
                                            </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>Annonces enregistrées</h3>
                        <div id="listannonceP" class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-12">
<<<<<<< Updated upstream
                                    <?php $idAnnonces = get_annonces_sauvegardees();
                                    foreach ($idAnnonces as $id) { 		
										$annonceE = get_full_annonce($id['idAnnonce']);					
										foreach ($annonceE as $ae) {
=======
                                    <<<<<<< Updated upstream <?php $idAnnonces=g et_annonces_sauvegardees(); foreach ($idAnnonces as $id) { $annonceE=g et_full_annonce($id[ 'idAnnonce']); foreach ($annonceE as $ae) {=======< div class="col-xs-12">
                                        <?php $idAnnonces = get_annonces_sauvegardees();

                                    foreach ($idAnnonces as $val) { 
										$annonce = get_full_annonce($val);
                                         
>>>>>>> Stashed changes
>>>>>>> Stashed changes
									?>
                                            <div id="listannonce" class="row">
                                                <a href="#">
                                                    <div class="col-xs-3 col-sm-2 text-center no-padding">
                                                        <button type="button" class="glyphicon glyphicon-remove btn btn-danger"></button>
                                                    </div>
                                                    <div class="col-xs-9 col-sm-10">
<<<<<<< Updated upstream
														<h4 class="title">
														<?php echo $ae['titre'] ?>                                       </h4>
														<div class="username"> Type de service : <span class="capitalize firstname">
=======
                                                        <<<<<<< Updated upstream <h4 class="title">
                                                            <?php echo $ae['titre'] ?>
                                                                </h4>
                                                                <div class="username"> Type de service : <span class="capitalize firstname">
>>>>>>> Stashed changes
														<?php $service = get_nomService($ae['service']);
																echo $service ?></span></div>
                                                                <div class="username"> Utilisateur : <span class="capitalize firstname">
														<?php $username = get_username_demandeur($ae['demandeur']);
																echo $username ?></span></div>
                                                                <div class="budget"> Budget : <b>
														<?php echo $ae['prix'] ?> €</b> </div>
                                                                <div class="duration"> Lieu : <b>
														<?php echo $ae['lieu'] ?> </b> </div>
                                                    </div>
                                                </a>
                                            </div>
<<<<<<< Updated upstream
										<?php } ?>
                                    <?php } ?>
=======
                                            <?php } ?>
                                                <?php } ?> =======
                                                    <h4 class="title">
														<?php echo $annonce['titre'] ?>                                       </h4>
                                                    <div class="username"> Type de service : <span class="capitalize firstname">
														<?php $service = get_nomService($annonce['service']);
																echo $service ?></span></div>
                                                    <div class="username"> Utilisateur : <span class="capitalize firstname">
														<?php $username = get_username_demandeur($annonce['demandeur']);
																echo $username ?></span></div>
                                                    <div class="budget"> Budget : <b>
														<?php echo $annonce['prix'] ?> €</b> </div>
                                                    <div class="duration"> Lieu : <b>
														<?php echo $annonce['lieu'] ?> </b> </div>
>>>>>>> Stashed changes
                                </div>
                                </a>
                            </div>
<<<<<<< Updated upstream
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <!-- /.container -->
        <!-- jQuery -->
        <script src="../js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
=======
                            <?php } ?>
                        </div> >>>>>>> Stashed changes </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <!-- /.container -->
            <!-- jQuery -->
            <script src="../js/jquery.js"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="../js/bootstrap.min.js"></script>
>>>>>>> Stashed changes
</body>

</html>