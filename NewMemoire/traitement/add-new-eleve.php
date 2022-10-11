<?php
    require_once "Traitement.php";

    $traitement->addEleve($_POST['nom'], $_POST['n_matricule'], $_POST['prenom'], $_POST['dateNaiss'], $_POST['lieu'], $_POST['adresse'],  $_POST['sexe'], $_POST['annee'], $_POST['pere'], $_POST['mere'], $_POST['contact'], $_POST['date_ins'], $_POST['frais_inscription'],  $_POST['classe']);

    $_SESSION['add_success']="success";
    header('Location: ../LEleve.php');
?>