<?php session_start();?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="#"> <img style="width: 55px;" src="http://localhost/Projet-Web-DUT/img/logo.png" alt=""> </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li> <a href="http://localhost/Projet-Web-DUT">Accueil</a> </li>
                    <li> <a href="#">Annonce</a> </li>
                    <li> <a href="#">Mon agenda</a> </li>
                    <li> <a href="#">Forum</a> </li>
                    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">Informations <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Données médicales</a></li>
                            <li><a href="#">Trouver où se soigner</a></li>
                        </ul>
                    </li>
                </ul>
                <?php if($_SESSION['logged']==0){?>
                    <li><a href="http://localhost/Projet-Web-DUT/View/login.php" style="padding : 30px 0; color:#9d9d9d;" class="pull-right userlogin">Login</a> </li>
                    <?php }else if($_SESSION['logged']==1){?>
                        <li>
                            <a href="http://localhost/Projet-Web-DUT/View/Profile.php" style="padding : 30px 0; color:#9d9d9d;" class="pull-right userlogin">
                                <?php echo $_SESSION['username']?>
                            </a> <a href="http://localhost/Projet-Web-DUT/Controler/logout.php" style="padding : 30px 0; color:#9d9d9d;" class="pull-right userlogin">
                              Logout
                            </a> </li>
                        <?php }?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>