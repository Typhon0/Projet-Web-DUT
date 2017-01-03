<?php
include('config.php');
?>
<!DOCTYPE html >
<html >
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" title="Style" />
        <title>Messages personnels</title>
    </head>
    <body>
        
        <div class="content">
<?php
//On verifie que lutilisateur est connecte
if(isset($_SESSION['login']))
{
//On affiche la liste des messages lus et non lus de l'utilisateur 
$req1 = mysql_query('select m1.idMessage, m1.destinataire, m1.emetteur, count(m2.idMessage) as reps,m1.contenu,m1.objet,m1.lu,m1.date_envoi, Utilisateur.idUtilisateur as userid, Utilisateur.login from Message as m1, Message as m2,Utilisateur where ((m1.emetteur="'.$_SESSION['userid'].'" and m1.lu=false and Utilisateur.idUtilisateur=m1.destinataire) or (m1.destinataire="'.$_SESSION['userid'].'" and m1.lu=false and Utilisateur.idUtilisateur=m1.emetteur)) and m2.idMessage=m1.idMessage group by m1.idMessage order by m1.idMessage desc');


$req2 = mysql_query('select m1.idMessage, m1.destinataire, m1.emetteur, count(m2.idMessage) as reps,m1.contenu,m1.objet,m1.lu,m1.date_envoi, Utilisateur.idUtilisateur as userid, Utilisateur.login from Message as m1, Message as m2,Utilisateur where ((m1.emetteur="'.$_SESSION['userid'].'" and m1.lu=true and Utilisateur.idUtilisateur=m1.destinataire) or (m1.destinataire="'.$_SESSION['userid'].'" and m1.lu=true and Utilisateur.idUtilisateur=m1.emetteur)) and m2.idMessage=m1.idMessage group by m1.idMessage order by m1.idMessage desc');
?>
Voici la liste de vos messages <br />
Nouveau message privé (bouton)/<br />
Messages non-lus(<?php echo intval(mysql_num_rows($req1)); ?>):
<table>
        <tr>
        <th class="title_cell">Titre</th>
        <th>Nb. Réponses</th>
        <th>Participant</th>
        <th>Date d'envoi</th>
    </tr>
<?php
//On affiche la liste des messages non-lus
while($dn1 = mysql_fetch_array($req1))
{
?>
        <tr>
        <td><a href="Lire_Message.php?id=<?php echo $dn1['idMessage']; ?>"><?php echo htmlentities($dn1['Objet'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn1['reps']-1; ?></td>
        <td><a href="consulter_profil.php?id=<?php echo $dn1['userid']; ?>"><?php echo htmlentities($dn1['login'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('d/m/Y H:i:s' ,$dn1['date_envoi']); ?></td>
    </tr>
<?php
}
//S'il aucun message non-lu, on le dit
if(intval(mysql_num_rows($req1))==0)
{
?>
        <tr>
        <td colspan="4">Vous n'avez aucun message non-lu.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Messages lus(<?php echo intval(mysql_num_rows($req2)); ?>):</h3>
<table>
        <tr>
        <th class="title_cell">Titre</th>
        <th>Nb. Réponses</th>
        <th>Participant</th>
        <th>Date d'envoi</th>
    </tr>
<?php
//On affiche la liste des messages lus
while($dn2 = mysql_fetch_array($req2))
{
?>
        <tr>
        <td><a href="Lire_message.php?id=<?php echo $dn2['idMessage']; ?>"><?php echo htmlentities($dn2['Objet'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn2['reps']-1; ?></td>
        <td><a href="consulter_profil.php?id=<?php echo $dn2['userid']; ?>"><?php echo htmlentities($dn2['login'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('d/m/Y H:i:s' ,$dn2['date_envoi']); ?></td>
    </tr>
<?php
}
//Sil na aucun message lu, on le dit
if(intval(mysql_num_rows($req2))==0)
{
?>
        <tr>
        <td colspan="4" >Vous n'avez aucun message lu.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
        echo 'Non connecter';
}
?>
                </div>
                
        </body>
</html>
