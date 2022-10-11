<?php
    require_once "Traitement.php";
    
    $statut = 0;
    $utilisateur_password = 123456;
    $traitement->addComptable($_POST['nom'], $_POST['prenom'], $_POST['username'], $_POST['genre'], $utilisateur_password, $statut);

    $_SESSION['add_success']="success";
    header('Location: ../LComptable.php');
?>