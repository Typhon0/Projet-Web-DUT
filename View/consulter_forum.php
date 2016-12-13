<html>
	<head>
		<title>Forum</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<?php 
		session_start();
		include("../Model/config0php");
		include("../Model/users.php");
		$titre=("Voir le Forum");
		
		$forum =(int) $_GET['f'];
	// Récupération des champs de la bdd	
$query=$bdd->prepare('Select Categorie, Section, Topic, Post, MessagePrive from Forum');
	
//Formatte les pages quand trop de messages		
$TotalMessage= $data['forum_topic']+1;
$LimiteMessagePage= 20;
$NbPage=ceil($TotalMessage / $LimiteMessagePage);

// Affichage Page
$page = (isset($_GET['page']))?intval($_GET['page']):1;

echo '<p>Page : ';

for ($i = 1 ; $i <= $nombreDePages ; $i++)

{

    if ($i == $page){
    echo $i;
    }
    else{
    echo '<a href="Consulerforum.php?f='.$forum.'&amp;page='.$i.'">'.$i.'</a>';
    }

}

echo '</p>';
		?>

	</body>
</html>
