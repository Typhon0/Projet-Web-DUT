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
		include('../Model/fonctions_annonces.php');
		include('../Model/config.php');
		?>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-3"></div>
                        <div class="col-xs-6">
                            <form action="resultats_recherche.php" method="post" >
                                <SELECT class="form-control" name="service" size="1">
									<OPTION></OPTION>
                                    <OPTION>Bricolage - Travaux</OPTION>
									<OPTION>Jardinage - Piscine</OPTION>
									<OPTION>Déménagement - Manutention</OPTION>
									<OPTION>Services véhiculés</OPTION>
									<OPTION>Services à la personne</OPTION>
									<OPTION>Enfants</OPTION>
									<OPTION>Animaux</OPTION>
									<OPTION>Informatique et web</OPTION>
									<OPTION>Photographie - Vidéo</OPTION>
									<OPTION>Animation - Evenements</OPTION>
									<OPTION>Cours - Formations</OPTION>
									<OPTION>Administratif - Bureautique </OPTION>
									<OPTION>Mode - Santé - Bien être</OPTION>
									<OPTION>Sport-Partenaires</OPTION>
									<OPTION>Restauration - Réception</OPTION>
                                </SELECT>
                                <input class="form-control" type="text" name ="prixMin">
                                <input class="form-control" type="text" name = "lieu">
                                <button class="btn btn-primary pull-right" value="submit" type="submit">Rechercher</button>
                            </form>
                        </div>
                        <div class="col-xs-3"></div>
                    </div>
                    <h3>Toutes les annonces</h3>
                    <div id="listannonceP" class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-12">
                                <?php $allAnnonces = get_all_annonces();
                                    foreach ($allAnnonces as $annonce) { ?>
                                    <div id="listannonce" class="row">
                                        <a href="#">
                                            <div class="col-xs-3 col-sm-2 text-center no-padding"> </div>
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
                </div>
                <!-- /.container -->
                <!-- jQuery -->
                <script src="../js/jquery.js"></script>
                <!-- Bootstrap Core JavaScript -->
                <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>