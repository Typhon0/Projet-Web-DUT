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
    <title>Poster une annonce</title>
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
        <form class="form-signin" action="../Controler/PosterAnnonce.php" method="post">
            <h2 class="form-signin-heading">Poster une annonce</h2>
            <p>Titre :
                <input class="form-control" type="text" name="titre" /> </p>
            <SELECT class="form-control" name="service" size="1">
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
            <p> Expliquez votre besoin :</br>
                <TEXTAREA class="form-control" name="message" rows=4 cols=40 placeholder="Description du service :"></TEXTAREA>
                <p>Lieu :
                    <input class="form-control" type="text" name="lieu" /> </p>
                <p>Prix global :
                    <input class="form-control" type="number" name="prix" /> </p>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Poster annonce</button>
        </form>
    </div>
    <!-- /container -->
</body>

</html>