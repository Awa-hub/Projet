<?php
    session_start();    //On demarre la session
    
    if(!isset($_SESSION['username'])) //On verifie si la donnée login existe dans la session
    {
        header('Location: traitement/deconnection.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Les informations de l'élève</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- morris chart -->
    <link href="assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	<link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="assets/img/logo/_logo.png" />
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="index.php">
                    <img alt="" src="assets/img/logo1.png">
                    <span class="logo-default" >Mon école</span> </a>
                </div>
                <!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        
 						<!-- start manage user dropdown -->
 						<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="assets/img/ecole.png" />
                                <span class="username username-hide-on-mobile"><?= $_SESSION['prenom'] ?></span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">
								<li>
                                    <a href="profil.php?id=<?php echo $_SESSION['id_utilisateur'] ?> ">
                                        <i class="icon-user"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="traitement/deconnection.php">
                                        <i class="icon-logout"></i>Se déconnecter</a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start page content -->
        <div class="page-container">
            <!-- start sidebar menu -->
            <div class="sidebar-container">
                <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                    <div id="remove-scroll">
                        <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="sidebar-user-panel">
                                <div class="user-panel">
                                    <div class="row">
                                            <div class="sidebar-userpic">
                                                <img src="assets/img/ecole.png" class="img-responsive" alt=""> </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div class="sidebar-userpic-name"><?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></div>
                                            <div class="profile-usertitle-job"><?php if($_SESSION['statut']==1){ echo "Directeur";
                                            }else{
                                               echo "Comptable";
                                               }?> </div>
                                        </div>
                                      
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link nav-toggle"> <i class="material-icons">home</i>
                                    <span class="title">Accueil</span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="material-icons">group</i>
                                    <span class="title">Inscription Elève</span>
                                    <span class="arrow"></span>
                                    <!-- <span class="label label-rouded label-menu label-danger">new</span> -->
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="NEleve.php" class="nav-link ">
                                            <span class="title">Nouveau éléve</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="LEleve.php" class="nav-link ">
                                            <span class="title">Liste des inscrits</span>
                                        </a>
                                    </li>
                              
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="material-icons">class</i>
                                    <span class="title">Classe et Paiement</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="Nclasse.php" class="nav-link ">
                                            <span class="title">Nouvelle classe</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="LClasse.php" class="nav-link ">
                                            <span class="title">Liste des classes</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php   if($_SESSION['statut']==1){  ?>
						
						
						<li class="nav-item">
							<a href="#" class="nav-link nav-toggle">
								<i class="material-icons">class</i>
								<span class="title">Comptable</span>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li class="nav-item">
									<a href="NComptable.php" class="nav-link ">
										<span class="title">Nouveau comptable</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="LComptable.php" class="nav-link ">
										<span class="title">Liste des comptable</span>
									</a>
								</li>
							</ul>
						</li>
						<?php
					 }
					 ?>
             
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end sidebar menu --> 
            <div class="page-content-wrapper">
    <div class="page-content">
             <?php
                require_once('traitement/Traitement.php');
                $eleve = $traitement->getEleveById($_GET['id']); // On recupère toutes les infos du comptable
            ?>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-itms-center">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <div class="card card-topline-aqua" style="margin-right: -190px;">
                        <div class="card-body no-padding height-9">
                            <div  style="text-align:center; padding-top: 20px; margin-bottom: 20px; font-size:20px; border-bottom: solid 2px;" >
                               Les informations générales
                            </div>
                                <div class="row">
                                <div class="form-group col-md-6">
                                        <b>Nom: </b> <?= $eleve['nom'] ?>
                               </div>
                               <div class="form-group col-md-6">
                                    <b>Prenom: </b> <?= $eleve['prenom'] ?>
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <b>Date de naissance: </b> <?= $eleve['date_naiss'] ?>
                            </div>
                            <div class="form-group col-md-6">
                                    <b>Lieu de naissance: </b> <?= $eleve['lieu_naiss'] ?>
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <b>Adresse: </b> <?= $eleve['adresse'] ?>
                            </div>
                            <div class="form-group col-md-6">
                                    <b>Sexe: </b> <?= $eleve['sexe'] ?>
                            </div>
                            </div>
                                <div class="row"> 
                                    <div class="form-group col-md-6">
                                        <b>Matricule: </b> <?= $eleve['n_matricule'] ?>
                            </div>
                                <div class="form-group col-md-6">
                                    <b>Année scolaire: </b> <?= $traitement->getAnneeById($eleve['annee'])['annee_scolaire'] ?>
                            </div>
                        </div>
                        <div class="row"> 
                                    <div class="form-group col-md-6">
                                    <b>Fils/Fille: </b> <?= $eleve['pere'] ?>
                            </div>
                            <div class="form-group col-md-6">
                                    <b>Et de: </b> <?= $eleve['mere'] ?>
                            </div>
                            </div>
                            <div class="row"> 
                                    <div class="form-group col-md-6">
                                    <b>Contact: </b> <?= $eleve['contact'] ?>
                            </div>
                            <div class="form-group col-md-6">
                                    <b>Date d'inscription: </b> <?= $eleve['date_ins'] ?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    <!-- end page content -->

        <!-- end page content -->
          <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2022 &copy; Design By Awa  
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="assets/plugins/jquery/jquery.min.js" ></script>
    <script src="assets/plugins/popper/popper.min.js" ></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js" ></script>
    <script src="assets/js/pages/sparkline/sparkline-data.js" ></script>
    <!-- Common js-->
    <script src="assets/js/app.js" ></script>
    <script src="assets/js/layout.js" ></script>
    <script src="assets/js/theme-color.js" ></script>
    <!-- material -->
    <script src="assets/plugins/material/material.min.js"></script>
    <!-- animation -->
    <script src="assets/js/pages/ui/animations.js" ></script>
    <!-- morris chart -->
    <script src="assets/plugins/morris/morris.min.js" ></script>
    <script src="assets/plugins/morris/raphael-min.js" ></script>
    <script src="assets/js/pages/chart/morris/morris_home_data.js" ></script>
    <!-- end js include path -->
  </body>
</html>