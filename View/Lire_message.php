<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href=style.css" rel="stylesheet" title="Style" />
        <title>Lecture d'un Message</title>
    </head>
    <body>
       
<?php
//On verifie si lutilisateur est connecte
if(isset($_SESSION['login']))
{
//On verifie que lidentifiant de la discution est defini
if(isset($_GET['idMessage']))
{
$id = intval($_GET['idMessage']);
//On recupere le titre et les narateurs de la discution
$req1 = mysql_query('select idMessage, emeteteur, destinataire from Message where idMessage="'.$id);
$dn1 = mysql_fetch_array($req1);
//On verifie que la discution existe
if(mysql_num_rows($req1)==1)
{
//On verifie que lutilisateur a le droit dafficher les messages
if($dn1['emetteur']==$_SESSION['userid'] or $dn1['destinataire']==$_SESSION['userid'])
{
//La discution sera placee dans les messages lus
if($dn1['emetteur']==$_SESSION['userid'])
{
        mysql_query('update Message set lu=true where idMessage="'.$id);
        $user_partic = 2;
}
else
{
        mysql_query('update Message set lu=true where idMessage="'.$id);
        $user_partic = 1;
}
//On recupere la liste des messages
$req2 = mysql_query('select Message.date_envoi, Message.contenu, Utilisateur.idUtilisateur as userid, Utilisateur.login from Message, Utilisateur where Message.idMessage="'.$id.'" and Utilisateur.idUtilisateur=Message.destinataire order by Message.date_envoi');
//On verifie si lutilisateur a valide le formulaire de reponse
if(isset($_POST['contenu']) and $_POST['contenu']!='')
{
        $message = $_POST['contenu'];
        //On enleve lechappement si get_magic_quotes_gpc est active
        if(get_magic_quotes_gpc())
        {
                $message = stripslashes($message);
        }
        //On echape le message pour pouvoir le mettre dans une requette SQL
        $message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
        //On envoi la reponse et le statut de la discution passe a non-lu pour lautre utilisateur
        if(mysql_query('insert into Message (idMessage, destinataire, emetteur, contenu, lu, date_envoi)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('update Message set Utilisateur'.$user_partic.'lu=true where idMessage="'.$id))
        {
?>
<div class="message">Votre message a bien ete envoye.<br />
<a href="Lire_message.php?id=<?php echo $id; ?>">Retour a la discussion</a></div>
<?php
        }
        else
        {
?>
<div class="message">Une erreur c'est produite lors de l'envoi du message.<br />
<a href="Lire_message.php?id=<?php echo $id; ?>">Retour a la discussion</a></div>
<?php
        }
}
else
{
//On affiche la liste des messages
?>
<div class="content">
<?php echo $dn1['objet']; ?>
<table class="messages_table">
        <tr>
        <th class="author">Utilisateur</th>
        <th>Message</th>
    </tr>
<?php
while($dn2 = mysql_fetch_array($req2))
{
?>
        <tr>
        <td class="author center">
		><br /><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo $dn2['login']; ?></a></td>
        <td class="left"><div class="date">Date d'envoi: <?php echo date('d/m/Y H:i:s' ,$dn2['date_envoi']); ?></div>
        <?php echo $dn2['contenu']; ?></td>
    </tr>
<?php
}
//On affiche le formulaire de reponse
?>
</table><br />
<h2>Repondre</h2>
<div class="center">
    <form action="Lire_message.php?id=<?php echo $id; ?>" method="post">
        <label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>
</div>
<?php
}
}
else
{
        echo '<div class="message">Vous n\'avez pas le droit d\'acceder a cette page.</div>';
}
}
else
{
        echo '<div class="message">Ce message n\'existe pas.</div>';
}
}
else
{
        echo '<div class="message">L\'identifiant du message n\'est pas defini.</div>';
}
}
else
{
        echo '<div class="message">Vous devez etre connecte pour acceder a cette page.</div>';
}
?>
                 </body>
</html>
