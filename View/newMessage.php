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
                
               ?>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-9 col-md-10">
                                <form method="post" action="../Controler/newMessage.php">
                                    <input class="form-control" type="text" name="desti" placeholder="Destinataire">
                                    <input style="margin-top:10px;" class="form-control" type="text" name="obj" placeholder="Objet">
                                    <textarea style="height:200px; margin-top:10px;" class="form-control" name="texte" placeholder="Message..."></textarea>
                                    <button style="margin-top:15px;" class="btn btn-primary pull-right" type="submit" value="submit">Envoyer</button>
                                </form>
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