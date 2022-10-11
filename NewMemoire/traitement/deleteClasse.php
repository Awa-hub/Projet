<?php
    require_once('Traitement.php');

    {
        try
        {
            $traitement->deleteClasseById($_GET['id']);
            $_SESSION['delete_success']="success";
        }
        catch (PDOException $e)
        {
           $_SESSION['delete_error']="error";

        }
    }
    header('Location: ../LClasse.php');
?>