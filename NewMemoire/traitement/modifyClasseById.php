<?php
    require_once "Traitement.php";
    
    $traitement->modifyClasseById($_GET['id'], $_POST['libelle'], $_POST['montant_total']);

    $_SESSION['modify_success']="success";
    header('Location: ../LClasse.php');

?>