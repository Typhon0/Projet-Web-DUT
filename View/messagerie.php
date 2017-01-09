<?php
include('config.php');
?>
    <!DOCTYPE html >
    <html>

    <head>
        <meta charset="utf-8">
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
$_SESSION['login'] = 'Loic';
if(isset($_SESSION['login']))
{
//On affiche la liste des messages lus et non lus de l'utilisateur 
$req1 = mysql_query('select m1.idMessage, m1.destinataire, m1.emetteur, count(m2.idMessage) as reps,m1.contenu,m1.objet,m1.lu,m1.date_envoi, Utilisateur.idUtilisateur as userid, Utilisateur.login from Message as m1, Message as m2,Utilisateur where ((m1.emetteur="'.$_SESSION['userid'].'" and m1.lu=false and Utilisateur.idUtilisateur=m1.destinataire) or (m1.destinataire="'.$_SESSION['userid'].'" and m1.lu=false and Utilisateur.idUtilisateur=m1.emetteur)) and m2.idMessage=m1.idMessage group by m1.idMessage order by m1.idMessage desc');


$req2 = mysql_query('select m1.idMessage, m1.destinataire, m1.emetteur, count(m2.idMessage) as reps,m1.contenu,m1.objet,m1.lu,m1.date_envoi, Utilisateur.idUtilisateur as userid, Utilisateur.login from Message as m1, Message as m2,Utilisateur where ((m1.emetteur="'.$_SESSION['userid'].'" and m1.lu=true and Utilisateur.idUtilisateur=m1.destinataire) or (m1.destinataire="'.$_SESSION['userid'].'" and m1.lu=true and Utilisateur.idUtilisateur=m1.emetteur)) and m2.idMessage=m1.idMessage group by m1.idMessage order by m1.idMessage desc');
                
               ?>
                        <div class="row">
                            <div class="col-sm-3 col-md-2"> </div>
                            <div class="col-sm-9 col-md-10">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh"> &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3 col-md-2"> <a href="#" class="btn btn-danger btn-sm btn-block" role="button"><i class="glyphicon glyphicon-edit"></i> Nouveau</a>
                                <hr>
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#"><span class="badge pull-right">32</span> Boîte de réception </a> </li>
                                    <li><a href="#">Envoyé</a></li>
                                    <li><a href="#">Corbeille</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-9 col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                display: inline-block;">Mark Otto</span> <span class="">Nice work on the lastest version</span> <span class="text-muted" style="font-size: 11px;">- More content here</span> <span class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                </span></span>
                                            </a>
                                        </div>
                                    </div>
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
//On affiche la liste des messages non-lus
while($dn1 = mysql_fetch_array($req1))
{
?>
                <tr>
                    <td>
                        <a href="Lire_Message.php?id=<?php echo $dn1['idMessage']; ?>">
                            <?php echo htmlentities($dn1['Objet'], ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $dn1['reps']-1; ?>
                    </td>
                    <td>
                        <a href="consulter_profil.php?id=<?php echo $dn1['userid']; ?>">
                            <?php echo htmlentities($dn1['login'], ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </td>
                    <td>
                        <?php echo date('d/m/Y H:i:s' ,$dn1['date_envoi']); ?>
                    </td>
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
                                    <td>
                                        <a href="Lire_message.php?id=<?php echo $dn2['idMessage']; ?>">
                                            <?php echo htmlentities($dn2['Objet'], ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $dn2['reps']-1; ?>
                                    </td>
                                    <td>
                                        <a href="consulter_profil.php?id=<?php echo $dn2['userid']; ?>">
                                            <?php echo htmlentities($dn2['login'], ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y H:i:s' ,$dn2['date_envoi']); ?>
                                    </td>
                                </tr>
                                <?php
}
//Sil na aucun message lu, on le dit
if(intval(mysql_num_rows($req2))==0)
{
?>
                                    <tr>
                                        <td colspan="4">Vous n'avez aucun message lu.</td>
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
                            <div>
    </body>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    </html>