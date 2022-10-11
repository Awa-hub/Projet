<?php
    require_once('Traitement.php');

    {
        try
        {
            $traitement->deleteEleveById($_GET['id']); //Delete eleve by Id
            $_SESSION['delete_success']="success";
        }
        catch (PDOException $e)
        {
           
           $_SESSION['delete_error']="error";

        }
    }
    header('Location: ../LEleve.php');
?>