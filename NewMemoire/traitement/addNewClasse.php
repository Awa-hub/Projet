<?php
    require_once "Traitement.php";
    
    // $traitement->addClasse($_POST['libelle'], $_POST['montant_total']);

    // $_SESSION['add_success']="success";
    // header('Location: ../LClasse.php');

    {
        try
        {
            $traitement->addClasse($_POST['libelle'], $_POST['montant_total']);
            $_SESSION['add_success']="success";
        }
        catch (PDOException $e)
        {
           $_SESSION['add_error']="error";

        }
    }
    header('Location: ../LClasse.php');

?>