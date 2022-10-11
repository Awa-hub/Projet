<?php
    require_once "Traitement.php";
    
    $traitement->modifyUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['username'], $_SESSION['id_utilisateur']);
     $id=$_SESSION['id_utilisateur'];


     $_SESSION['profil_success']="success";
    header("Location: ../profil.php?id=$id");

?>