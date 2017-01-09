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
                <?php require('menuProfile.php');
                include('../Model/Messagerie.php');
                ?>
                    <?php
//On verifie que lutilisateur est connecte
if($_SESSION['logged']=1)
{?>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-9 col-md-10">
                                <?php 
                                    $id = $_GET['id']; 
                                    $mess = Messagerie::get_message($id);
                                    Messagerie::update_to_lu($id);
                                    ?>
                                    <h4 class="pull-right">De: <?php echo $mess['emetteur'] ?></h4>
                                    <h3>Objet: <?php echo $mess['objet'] ?></h3>
                                    <p>
                                        <?php echo $mess['contenu'] ?>
                                    </p>
                                    <p>
                                        <label> Date: </label>
                                        <?php echo $mess['date_envoi']?>
                                    </p>
                            </div>
                        </div>
                        <hr> </div>
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