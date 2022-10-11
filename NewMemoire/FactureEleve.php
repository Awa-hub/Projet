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
    <title>Details du paiement</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	<link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/hello.css">
    <link rel="stylesheet" href="assets/css/toastr.min.css">
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
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- start notification dropdown -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        </li>
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="assets/img/ecole.png" />
                                <span class="username username-hide-on-mobile"> <?= $_SESSION['prenom'] ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">
                                <li>
                                    <a href="profil.php?id=<?php echo $_SESSION['id_utilisateur'] ?> ">
                                        <i class="icon-user"></i> Profile </a>
                                </li>

                                <li>
                                    <a href="traitement/deconnection.php">
                                        <i class="icon-logout"></i> Se déconnecter </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start page container -->
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
                                            <div class="sidebar-userpic-name"> <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> </div>
                                            <div class="profile-usertitle-job"><?php if($_SESSION['statut']==1){ echo "Directeur";
                                            }else{
                                               echo "Comptable";
                                               }?></div>
                                        </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link nav-toggle"> <i class="material-icons">home</i>
                                    <span class="title">Accueil</span> 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="material-icons">group</i>
                                    <span class="title">Inscription Elève</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="NEleve.php" class="nav-link ">
                                            <span class="title">Nouveau élève</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="LEleve.php" class="nav-link ">
                                            <span class="title">liste des inscrits</span>
                                        </a>
                                    </li>
                              
                                </ul>
                            </li>
                            <li class="nav-item active">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="material-icons">class</i>
                                    <span class="title">Classe et Paiement</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="NClasse.php" class="nav-link ">
                                            <span class="title">Nouvelle classe</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="LClasse.php" class="nav-link ">
                                            <span class="title">Liste des classes</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php   if($_SESSION['statut']==1){  ?>
						
						
						<li class="nav-item">
							<a href="#" class="nav-link nav-toggle">
								<i class="material-icons">person</i>
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
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
	                   <div class="row">
	                    <div class="col-md-12">
	                        <div class="white-box">
                            <?php
                                require_once 'traitement/traitement.php';
                                
                                //Récupérer l'élève par son id
                                $Eleve = $traitement->getEleveById($_GET['id_eleve']);

                                //On verifie si $_GET['id_classe'] existe, on le prend.
                                if(isset($_GET['id_classe']) && !empty($_GET['id_classe']))
                                {
                                    //On obtient le montant scolaire de la classe
                                    $montant_scolaire = $traitement->getMontantSclolaireByClasse($_GET['id_classe'])['montant_total'];
                                }
                                else
                                {
                                    //On obtient le montant scolaire de la classe
                                    $montant_scolaire = $traitement->getMontantSclolaireByClasse($Eleve['id_classe'])['montant_total'];
                                }
                                
                                //On récupère les paiements de l'élève dans la table d'associations
                                $elevePaiement = $traitement->getElevePaiement($_GET['id_eleve']);

                                $msg = null;
                                if(count($elevePaiement) == 0)
                                {
                                    $msg = "Pas encore de paiement éffectué pour ".$Eleve['nom']." ".$Eleve['prenom'];
                                }

                                //Initialise somme à zéro
                                $som_total = 0;

                                // $classe = $traitement->getClasseById($_GET['id']);



                            ?>
	                            <h3><b><?= $Eleve['nom'] ?> <?= $Eleve['prenom'] ?></b> <span class="pull-right">Montant total : <?= $montant_scolaire+$Eleve['frais_inscription']  ?></span></h3>
	                            <hr>
                                <h4>Frais d'inscription: <?= $Eleve['frais_inscription'] ?></h4>
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <div class="table-responsive m-t-40">
	                                        <table class="table table-hover">
	                                            <thead>
	                                                <tr>
	                                                    <th class="text-center">N reçu</th>
	                                                    <th class="text-center">Date</th>
	                                                    <th class="text-center">Description</th>
	                                                    <th class="text-center">Type paiement</th>
	                                                    <th class="text-center">Montant fixe</th>
	                                                    <th class="text-center">Réduction</th>
	                                                    <th class="text-center">Montant payer</th>
                                                        <th class="text-center">Solde restant à payer</th>
                                                        <th class="text-center"></th>
	                                                </tr>
	                                            </thead>
	                                            <tbody>
                                                    <?php foreach($elevePaiement as $id_paiement): ?>
	                                                <tr>
	                                                    <td class="text-center"><?= $traitement->getPaymentById($id_paiement['id_paiement'])['n_recu'] ?></td>
	                                                    <td class="text-center"><?= $traitement->getPaymentById($id_paiement['id_paiement'])['date_paiement'] ?></td>
	                                                    <td class="text-center"><?= $traitement->getPaymentById($id_paiement['id_paiement'])['nature_paiement'] ?></td>
	                                                    <td class="text-center"><?= $traitement->getPaymentById($id_paiement['id_paiement'])['type_paiement'] ?></td>
	                                                    <td class="text-center"><?= $traitement->getPaymentById($id_paiement['id_paiement'])['montant_fixe'] ?></td>
	                                                    <td class="text-center"><?= $traitement->getPaymentById($id_paiement['id_paiement'])['reduction'] ?>%</td>
	                                                    <td class="text-center"><?= $traitement->getPaymentById($id_paiement['id_paiement'])['montant_payer'] ?></td>
                                                        <td class="text-center"><?= $traitement->getPaymentById($id_paiement['id_paiement'])['solde_restant_a_payer'] ?></td>
                                                        <?php   if($_SESSION['statut']==0){  ?>
                                                        <td class="text-center"><a href="modifyPaiement.php?id=<?= $id_paiement['id_paiement'] ?>&id_classe=<?= $_GET['id_classe'] ?>&id_eleve=<?= $_GET['id_eleve'] ?>">
                                                                <button class="btn btn-primary btn-xs" title="Modifier">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                            </a></td>
                                                            <?php
                                                            }
                                                            ?>
                                                        
                                                        <?php $som_total += $traitement->getPaymentById($id_paiement['id_paiement'])['montant_payer'] ; ?>
	                                                </tr>
	                                                </tr>
                                                    <?php endforeach ?>
	                                            </tbody>
	                                        </table>
                                            <p class="text-center">
                                                <?php
                                                    if($msg != null)
                                                    {
                                                        echo $msg;
                                                    }
                                                ?>
                                            </p>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                    <div class="pull-right m-t-30 text-right">
	                                        <hr>
	                                        <h3><b>Total payé :</b> <?= $som_total+$Eleve['frais_inscription'] ?></h3> </div>
	                                    <div class="clearfix"></div>
                                        <hr>
	                                    <div class="text-right">
	                                        <button onclick="javascript:window.print();" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Imprimer</span> </button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                </div>
            </div>
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
    <!-- Common js-->
	<script src="assets/js/app.js" ></script>
    <script src="assets/js/layout.js" ></script>
	<script src="assets/js/theme-color.js" ></script>
	<!-- Material -->
	<script src="assets/plugins/material/material.min.js"></script>
	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js" ></script>
    <!-- end js include path -->

    <!-- Toast Script -->
    <?php if(isset($_SESSION['add_success']) && !empty($_SESSION['add_success'])): ?>

<script src="assets/custom_js/jquery3.3.1-comp.js"></script>
<script src="assets/custom_js/toastr.min.js"></script>
<script>
function success_toast()
{
    toastr.success("Paiement effectué avec succès");
}
success_toast()
</script>
<?php
endif ;
unset($_SESSION['add_success']);
?>

<?php if(isset($_SESSION['modify_success']) && !empty($_SESSION['modify_success'])): ?>

<script src="assets/custom_js/jquery3.3.1-comp.js"></script>
<script src="assets/custom_js/toastr.min.js"></script>
<script>
function success_toast()
{
    toastr.success("Paiement modifié avec succès");
}
success_toast()
</script>
<?php
endif ;
unset($_SESSION['modify_success']);
?>
</body>
</html>