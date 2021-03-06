<?php 
    session_start();?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Recherche</title>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/hover-min.css" rel="stylesheet">
        <link href="../css/swiper.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>
        <?php require("../View/menu.php"); ?>
            <!-- Page Content -->
            <div class="container"> </div>
            <?php
				include('../Model/filtres.php');
				include('../Model/fonctions_annonces.php');
				$filtreService = $_POST['service'];
				$filtrePrix = $_POST['prixMin'];
				$filtreLieu = $_POST['lieu'];
				if (!empty($filtreService) && !empty($filtrePrix) && !empty($filtreLieu)) {
					$lesAnnonces = recherche_annonce_service_lieu_prix($filtreService, $filtreLieu, $filtrePrix);
				} else {
					if (empty($filtreService)) {
						$lesAnnonces = recherche_annonce_prix_lieu($filtrePrix, $filtreLieu);
					} else if (empty($filtreLieu)) {
						$lesAnnonces = recherche_annonce_service_prix($filtreService, $filtrePrix);
					} else if (empty($filtrePrix)) {
						$lesAnnonces = recherche_annonce_service_lieu($filtreService, $filtreLieu);
					} else if (empty($filtrePrix) && empty($filtreLieu)) {
						$lesAnnonces = recherche_annonce_service($filtreService);
					} else if (empty($filtreService) && empty($filtreLieu)) {
						$lesAnnonces = recherche_annonce_prix($filtrePrix);
					} else if (empty($filtrePrix) && empty($filtreService)) {
						$lesAnnonces = recherche_annonce_lieu($filtreLieu);
					} else { ?>
                <h3>Veuillez remplir au moins un champ</h3>
                <?php 
					header('Location: all_annonces.php');
					}
				}
				foreach ($lesAnnonces as $annonce) {
				?>
                    <div id="listannonceP" class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-4">
                                <div id="listannonce" class="row">
                                    <a href="#">
                                        <div class="col-xs-3 col-sm-2 text-center no-padding">
                                            <div class="search-icon"></div>
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
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                        </div>
                        <!-- /.container -->
                        <!-- jQuery -->
                        <script src="../js/jquery.js"></script>
                        <!-- Bootstrap Core JavaScript -->
                        <script src="../js/bootstrap.min.js"></script>
                        <!-- Swipper -->
                        <script src="../js/swiper.min.js"></script>
                        <!-- Initialize Swiper -->
                        <script>
                            var swiper = new Swiper('.swiper-container', {
                                pagination: '.swiper-pagination'
                                , paginationClickable: true
                                , autoplay: 3000
                                , loop: true
                                , nextButton: '.swiper-button-next'
                                , prevButton: '.swiper-button-prev'
                                , spaceBetween: 30
                                , effect: 'fade'
                            });
                        </script>
    </body>

    </html>