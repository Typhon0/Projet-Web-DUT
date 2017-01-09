<?php session_start(); ?>
    <!DOCTYPE html >
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">
        <link href="../css/messagerie.css" rel="stylesheet" title="Style" />
        <title>Boîte de réception</title>
    </head>

    <body>
        <?php require('menu.php');?>
            <div class="container">
                <?php require('menuProfile.php');?>
                    <?php
//On verifie que lutilisateur est connecte
if($_SESSION['logged']=1)
{
	include('../Model/Messagerie.php');
	$liste_non_lu = Messagerie::get_liste_message_non_lu($_SESSION['username']);
	$liste_lu = Messagerie::get_liste_message_lu($_SESSION['username']);
	include('../Model/Users.php');
	$users = Users::get_user($_SESSION['username']);
                
               ?>
                        <div class="row">
                            <div class="col-sm-3 col-md-2"> </div>
                            <div class="col-sm-9 col-md-10">
                                <div class="pull-right"> <a href="http://localhost/Projet-Web-DUT/View/messagerie.php" type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh"> &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;</a> </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3 col-md-2"> <a href="http://localhost/Projet-Web-DUT/View/newMessage.php" class="btn btn-danger btn-sm btn-block" role="button"><i class="glyphicon glyphicon-edit"></i> Nouveau</a>
                                <hr>
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#"><span class="badge pull-right"><?php echo count($liste_non_lu) ; ?></span> Boîte de réception </a> </li>
                                    <!--<li><a href="#">Envoyé</a></li>
                                    <li><a href="#">Corbeille</a></li>-->
                                </ul>
                            </div>
                            <div class="col-sm-9 col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <?php 
foreach($liste_non_lu as $mess)
{
	$emetteur = Users::get_user($mess['emetteur']);
?>
                                        <div class="tab-pane fade in active" id="home">
                                            <div class="list-group">
                                                <a href="Lire_message.php?id=<?php echo $mess['idMessage']; ?>" class="list-group-item"> <span class="glyphicon glyphicon-star-empty">
											</span> <span class="name" style="min-width: 120px; display: inline-block;">	
												<?php echo $mess['emetteur']; ?> 
											</span> <span class="">
												<?php if($mess['lu']==0)
												{
													?> <b> <?php
													echo $mess['objet'];?>		
												</b> <?php
												} else
												{
													echo $mess['objet'];
												}
												?>
											</span> <span class="text-muted" style="font-size: 11px;">
											- More content here
								</span> <span class="badge">
								<?php echo $mess['date_envoi'] ; ?>
								</span> <span class="pull-right">
								<span class="glyphicon glyphicon-paperclip">
                                </span> </span>
                                                </a>
                                            </div>
                                        </div>
                                        <?php }
?>
                                            <div class="tab-pane fade in" id="profile">
                                                <div class="list-group">
                                                    <div class="list-group-item"> <span class="text-center">This tab is empty.</span> </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade in" id="messages"> ...</div>
                                            <div class="tab-pane fade in" id="settings"> This tab is empty.</div>
                                </div>
                                <div class="row-md-12"> </div>
                            </div>
                        </div>
            </div>
            <?php
}
else
{
        echo 'Non connecté';
}
?>
                <div>
    </body>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    </html>