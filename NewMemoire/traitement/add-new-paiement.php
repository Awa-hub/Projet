<?php
    require_once "Traitement.php";
    $elevePaiement = $traitement->getElevePaiement($_GET['id_eleve']);
    $som = 0;

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
    $solde_restant_a_payer = $montant_scolaire - ($montant_total_fixe + $_POST['montant_fixe']);

    //Save new payment
    $traitement->addPaiement($_POST['type_paiement'], $_POST['nature_paiement'], $_POST['n_recu'], $_POST['date_paiement'], $_POST['montant_fixe'], $new_montant_payer, $_POST['reduction'], $solde_restant_a_payer, $_POST['annee']);

    $idPayment = $traitement->getPaymentIdByN_Recu($_POST['n_recu'])['id_paiement'];

    //Save all id on table association
    $traitement->saveElevePaiementData($_GET['id_eleve'], $_SESSION['id_utilisateur'], $idPayment);

    $_SESSION['add_success']="success";
    header('Location: ../FactureEleve.php?id_eleve='.$_GET['id_eleve'].'&id_classe='.$_GET['id_classe']);
?>