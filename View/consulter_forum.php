<html>
	<head>
		<title>Forum</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<?php 
		session_start();
		include("../Model/config.php");
		include("../Model/users.php");
		$titre=("Voir le Forum");
		
		$forum =(int) $_GET['f'];
	// Récupération des champs de la bdd	
$query=$bdd->prepare('Select Section, Categorie, Topic, Post, MessagePrive from Forum');
	
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

// Bouton poster un nouveau sujet
echo'<a href="./Poster_Sujet.php?action=nouveautopic&amp;f='.$forum.'">
<button type="button" class="btn btn-primary">Nouveau sujet</button>';
$query->CloseCursor();

// Recupération des données sur le forum
$query=$bdd->prepare('Select * from Topic ...');
		
?>

<?php
// Affichage des topics
if($query->rowCount()>0){


?>

<table>
<tr>
<th><strong>Titre</strong></th>
<th><strong>Auteur</strong></th>
<th><strong>Heure</strong></th>
</tr>

<?php
// On affiche chaque topic

while($data=$query->fetch()){
	// faire l'affichage avec les données
}
?>
</table>
<?php
}
$query->CloseCursor();
?>
	</body>
</html>
