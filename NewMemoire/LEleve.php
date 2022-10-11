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
    <title>Liste des élèves</title>
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
    <link rel="stylesheet" href="assets/css/hello.css">
    <link rel="stylesheet" href="assets/css/toastr.min.css">

    <!-- Custom Styles -->
    <!-- <link rel="stylesheet" href="assets/custom_css/custom_css.css">
    <link rel="stylesheet" href="assets/custom_css/toastr.min.css"> -->

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" /> 
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
                            <li class="nav-item active">
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
                                        <a href="NClasse.php" class="nav-link ">
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
                    <div class="page-bar">
                        
                    </div>
                   <!-- start widget -->
         <div class="row">
                                <div class="col-md-12">
                                <?php
                                    require_once('traitement/Traitement.php');
                                    $allEleves = $traitement->getAllEleve(); // On recupère tous les élèves

                                    $message = null;
                                    if(count($allEleves) == 0)
                                    {
                                        $message = "Il n'y a pas d'élèves en ce moment !";
                                    }

                                    $nameClasse = $traitement->getClasseByName(); // On recupère les noms des classes

                                    $num = 1;

                                    
                                    
                                ?>
                                    <div class="card card-topline-purple">
                                        <div class="card-head">
                                            <header>Liste des élèves inscrits</header>
                                        </div>
                                        <div class="card-body ">
                                       <div class="table-responsive">
                                       <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche par prenom">
                                            <table class="table table-striped custom-table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Sexe</th>
                                                        <th>Date de naissance</th>
                                                        <th>Classe</th>
                                                        <th>Année</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myUL">
                                                <?php foreach($allEleves as $eleve): ?>
                                                    <tr>
                                                        <td><?= $num++ ?></td>
                                                        <td><?= $eleve['nom'] ?></td>
                                                        <td><?= $eleve['prenom'] ?></td>
                                                        <td><?= $eleve['sexe'] ?></td>
                                                        <td><?= $eleve['date_naiss'] ?></td>
                                                        <td><?= $traitement->getClasseLibelleById($eleve['id_classe'])['libelle'] ?></td>
                                                        <td><?= $traitement->getAnneeById($eleve['annee'])['annee_scolaire'] ?></td>
                                                        <td>
                                                            <a href="detailEleve.php?id=<?= $eleve['id_eleve'] ?>">
                                                            <button class="btn btn-success btn-xs" title="Detail">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            </a>
                                                            <a href="modifyEleve.php?id=<?= $eleve['id_eleve'] ?>">
                                                                <button class="btn btn-primary btn-xs" title="Modifier">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                            </a>
                                                            <!-- <a href="traitement/deleteEleve.php?id=<?= $eleve['id_eleve'] ?>">
                                                                <button class="btn btn-danger btn-xs">
                                                                    <i class="fa fa-trash-o "></i> -->
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <?php
                                                    if($message != null){
                                                        echo $message;
                                                    }
                                                ?>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <!-- end widget -->
                   
                </div>
            </div>
            <!-- end page content -->
            
        </div>
        <!-- end page container -->
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
    
    <!-- Toast Script -->
    <?php if(isset($_SESSION['delete_error']) && !empty($_SESSION['delete_error'])): ?>

        <script src="assets/custom_js/jquery3.3.1-comp.js"></script>
    <script src="assets/custom_js/toastr.min.js"></script>
    <script>
        function success_toast()
        {
            toastr.error("L'élève ne peut être supprimer");
        }
        success_toast()
    </script>
    <?php
     endif ;
     unset($_SESSION['delete_error']);
     ?>


<?php if(isset($_SESSION['delete_success']) && !empty($_SESSION['delete_success'])): ?>

<script src="assets/custom_js/jquery3.3.1-comp.js"></script>
<script src="assets/custom_js/toastr.min.js"></script>
<script>
function success_toast()
{
    toastr.success("Suppression reussie");
}
success_toast()
</script>
<?php
endif ;
unset($_SESSION['delete_success']);
?>

<?php if(isset($_SESSION['add_success']) && !empty($_SESSION['add_success'])): ?>

<script src="assets/custom_js/jquery3.3.1-comp.js"></script>
<script src="assets/custom_js/toastr.min.js"></script>
<script>
function success_toast()
{
    toastr.success("Elève ajouté avec succès");
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
    toastr.success("Elève modifié avec succès");
}
success_toast()
</script>
<?php
endif ;
unset($_SESSION['modify_success']);
?>

    <!-- end js include path -->

    <script>
        function myFunction() {
            var input, filter, table, tbody, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myUL");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                } else {
                tr[i].style.display = "none";
                }
            }       
            }
        }
    </script>
  </body>
</html