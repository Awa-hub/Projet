<?php
    require_once "Traitement.php";

    $utilisateurPassword = $traitement->getUtilisateurPassword($_SESSION['id_utilisateur'])['utilisateur_password'];

    if($utilisateurPassword == $_POST['ancien'])
    {
        if($_POST['nouveau'] == $_POST['confirme'])
        {
            $traitement->modifyPassword($_POST['ancien'], $_POST['nouveau'], $_SESSION['id_utilisateur']);
            $id=$_SESSION['id_utilisateur'];

            $_SESSION['modify_success']="success";
            header("Location: ../profil.php?id=$id");

        }
        else
        {
            echo "Les mots de passe (nouveau et confirme) sont différents.";
        }
    }
    else
    {
        echo "Ancien mot de passe incorrecte !";
    }
   

?>