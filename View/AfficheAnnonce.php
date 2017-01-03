<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Test Base de donnée</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <?php //Connection avec la BDD.
		include_once('../Model/config.php');
                 
        $req = $bdd->prepare("SELECT * FROM Annonce");
		$req->execute();
		$reponse = req->fetchAll();
        ?>
         
        <table>
                <tr>
                    <td>idAnnonce</td>
                    <td>Demandeur</td>
                    <td>idUtilisateur</td>
                    <td>Service</td>
                    <td>Lieu</td>
                    <td>Prix</td>
                    <td>Message</td>
                </tr>
            <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
            while($donnees = mysql_fetch_array($reponse))
            {
            ?>
                <tr>
                    <td><?php echo $donnees['idAnnonce'];?></td>
                    <td><?php echo $donnees['demandeur'];?></td>
                    <td><?php echo $donnees['idUtilisateur'];?></td>
                    <td><?php echo $donnees['catService'];?></td>
                    <td><?php echo $donnees['idService'];?></td>
                    <td><?php echo $donnees['lieu'];?></td>
                    <td><?php echo $donnees['prix'];?></td>
					<td><?php echo $donnees['message'];?></td>
                </tr>
            <?php
            } //fin de la boucle, le tableau contient toute la BDD
            mysql_close(); //deconnection de mysql
            ?>
        </table>
    </body>
</html>