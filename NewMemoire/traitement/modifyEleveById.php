<?php

    require_once "Traitement.php";
   
    $traitement->modifyEleveById($_GET['id'], $_POST['nom'], $_POST['prenom'], $_POST['dateNaiss'], $_POST['lieu'], $_POST['adresse'],  $_POST['sexe'], $_POST['annee'], $_POST['pere'], $_POST['mere'], $_POST['contact'], $_POST['classe']);
    
   
    $_SESSION['modify_success']="success";
    header('Location: ../LEleve.php');

?>