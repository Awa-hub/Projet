<?php

    require_once "Traitement.php";

    $elevePaiement = $traitement->getElevePaiementByPaiement($_GET['id']);
    $som = 0;

    // print_r($elevePaiement);

    if(count($elevePaiement) != 0)
    {
        foreach($elevePaiement as $id_paiement)
        {
            $montantFixe = $traitement->getMontantFixeById($id_paiement['id_paiement'])['montant_fixe'];
            $som = $som + $montantFixe;
        }
    }


    $montant_total_fixe = $som;

    $new_montant_payer = $_POST['montant_fixe'] - ($_POST['montant_fixe'] * $_POST['reduction']) / 100;
    $montant_scolaire = $traitement->getMontantSclolaireByClasse($_GET['id_classe'])['montant_total'];
    $solde_restant_a_payer = $montant_scolaire - ($_POST['montant_fixe']);

   
    $traitement->modifyPaiement($_GET['id'], $_POST['type_paiement'], $_POST['nature_paiement'], $_POST['montant_fixe'], $new_montant_payer, $_POST['reduction'], $solde_restant_a_payer, $_POST['annee']);
    
   
    $_SESSION['modify_success']="success";
    header('Location: ../FactureEleve.php?id_classe='.$_GET['id_classe'].'&id_eleve='.$_GET['id_eleve']);
