<?php
    require_once "Traitement.php";

    if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]))
    {
        $traitement->verifyLogin($_POST["username"], $_POST["password"]);
    }
    else
    {
        echo "Veillez verifiez vos champ";
    }
?>




