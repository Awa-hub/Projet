<?php
    //On demarre la session si elle ne l'est pas
    if (session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }

    class Traitement
    {
        public $myPdo;

        function __construct()
        {
            try
            {
                $this->myPdo = new PDO("mysql:host=localhost;dbname=gestion", "root", "");
            }
            catch (PDOException $e)
            {
                echo "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        public function getutilisateurByUsername($username)
        {
            $req = $this->myPdo->prepare("SELECT * FROM utilisateur WHERE username= '$username'");
            $req->execute();
            $result = $req->fetch();
            //var_dump($result);
            return $result;
        }

        public function verifyLogin($username, $password)
        {
            try
            {
                
                $req = $this->myPdo->prepare("SELECT * FROM utilisateur WHERE username ='$username' AND utilisateur_password='$password'");
                $req->execute();
    
                $result = $req->fetchAll();
               
                // foreach($result as $res)
                // {
                    //var_dump($res['username']);
                    if($result)
                    {
                       // var_dump($result[0]['username']);
                      //  $user = $this->getutilisateurByUsername($username);
                      
                       
                        $_SESSION['username'] = $username;
                        $_SESSION['prenom'] = $result[0]['prenom'];
                        $_SESSION['nom'] = $result[0]['nom'];
                        $_SESSION['statut'] = $result[0]['statut'];
                        $_SESSION['id_utilisateur'] = $result[0]['id_utilisateur'];
                         // var_dump($_SESSION['statut']);
                        
                       header("Location: ../index.php");
                    }
                    else
                    {
                        $_SESSION['msg_error']="error";
                        header("Location: ../login.php");
                    }
                // }
            }
            catch (PDOException $e)
            {
                echo "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
            
        }

        public function getUtilisateur($id)
        {
            $req = $this->myPdo->prepare("SELECT `prenom`, `nom`, `username` FROM utilisateur WHere id_utilisateur =".$id);
            $req->execute();
            $result = $req->fetchAll();
           // var_dump($result[0]);
            return $result;
        }

        public function modifyUtilisateur($nom, $prenom, $username, $id)
        {
            $myReq = "UPDATE utilisateur SET nom = '$nom', prenom = '$prenom', username = '$username' WHERE id_utilisateur = $id;";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function getUtilisateurPassword($id)
        {
            $req = $this->myPdo->prepare("SELECT `utilisateur_password` FROM utilisateur WHERE id_utilisateur = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function modifyPassword($ancien, $password, $id)
        {
            $myReq = "UPDATE utilisateur SET utilisateur_password = '$password' WHERE id_utilisateur = $id;";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function getClasseLibelleById($id)
        {
            $req = $this->myPdo->prepare("SELECT `libelle` FROM classe WHERE id_classe = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function getClasseById($id)
        {
            $req = $this->myPdo->prepare("SELECT * FROM classe WHERE id_classe = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function getClasseByIdAndName()
        {
            $req = $this->myPdo->prepare("SELECT `id_classe`, `libelle` FROM classe;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getAnnee()
        {
            $req = $this->myPdo->prepare("SELECT `id_annee`, `annee_scolaire` FROM annee;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getClasseByName()
        {
            $req = $this->myPdo->prepare("SELECT  `libelle` FROM classe;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getAnneeById($id)
        {
            $req = $this->myPdo->prepare("SELECT `annee_scolaire` FROM annee WHERE id_annee = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }


        public function addEleve($nom, $n_matricule, $prenom, $date, $lieu, $adresse, $sexe, $annee, $pere, $mere, $contact, $date_ins, $frais_inscription, $id_classe)
        {
            $myReq = "INSERT INTO eleve(nom, n_matricule, prenom, date_naiss, lieu_naiss, adresse, sexe, annee, pere, mere, contact, date_ins, frais_inscription, id_classe) VALUES('$nom', '$n_matricule', '$prenom', '$date', '$lieu', '$adresse', '$sexe', '$annee', '$pere', '$mere', '$contact', '$date_ins', $frais_inscription,  $id_classe);";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function getAllEleve()
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function deleteEleveById($id)
        {
            $req = $this->myPdo->prepare("DELETE FROM eleve WHERE id_eleve = $id;");
            $req->execute();
        }

        public function getEleveById($id)
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve WHERE id_eleve = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }


        public function getEleveBymatricule($n_matricule)
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve WHERE n_matricule = $n_matricule;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function modifyEleveById($id_eleve, $nom, $prenom, $date, $lieu, $adresse, $sexe, $annee, $pere, $mere, $contact, $id_classe)
        {
            $myReq = "UPDATE eleve SET nom = '$nom', prenom = '$prenom', date_naiss = '$date', lieu_naiss = '$lieu', adresse = '$adresse', sexe = '$sexe', annee = '$annee', pere = '$pere', mere = '$mere', contact = $contact, id_classe = $id_classe AND id_annee = $id_annee WHERE id_eleve = $id_eleve;";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function addClasse($libelle, $montant)
        {
            $myReq = "INSERT INTO classe(libelle, montant_total) VALUES('$libelle', '$montant');";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function getAllClasse()
        {
            $req = $this->myPdo->prepare("SELECT * FROM classe;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getEleveByIdclasse($id)
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve WHERE id_classe = $id");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getAllPaiement()
        {
            $req = $this->myPdo->prepare("SELECT * FROM paiement;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getEleveBySexe($sexe)
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve WHERE sexe = '$sexe';");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getEleveBySexeAndClasse($sexe,$id_classe)
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve WHERE sexe = '$sexe' AND id_classe = $id_classe;");
            $req->execute();
            $result = $req->fetchAll();
            return $result; 
        }

        public function deleteClasseById($id)
        {
            $req = $this->myPdo->prepare("DELETE FROM classe WHERE id_classe = $id;");
            $req->execute();
        }

        public function modifyClasseById($id_classe, $libelle, $montant_total)
        {
            $myReq = "UPDATE classe SET libelle = '$libelle', montant_total = $montant_total WHERE id_classe = $id_classe;";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function getEleveByClasseAndSexe($id_classe, $sexe)
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve WHERE id_classe = $id_classe AND sexe = '$sexe';");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        } 

        public function addPaiement($type_paiement, $nature_paiement, $n_recu, $date_paiement, $montant_fixe, $montant_payer, $reduction, $solde_restant_a_payer, $id_annee)
        {
            $myReq = "INSERT INTO paiement(type_paiement, nature_paiement, n_recu, date_paiement, montant_fixe, montant_payer, reduction, solde_restant_a_payer, id_annee) VALUES('$type_paiement', '$nature_paiement', $n_recu, '$date_paiement', $montant_fixe, $montant_payer, $reduction, $solde_restant_a_payer, $id_annee);";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function saveElevePaiementData($id_eleve, $id_utilisateur, $id_paiement)
        {
            $myReq = "INSERT INTO eleve_paiement(id_eleve, id_utilisateur, id_paiement) VALUES($id_eleve, $id_utilisateur, $id_paiement);";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function getPaymentIdByN_Recu($N_Recu)
        {
            $req = $this->myPdo->prepare("SELECT `id_paiement` FROM paiement WHERE n_recu = $N_Recu;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function getPaymentById($id)
        {
            $req = $this->myPdo->prepare("SELECT * FROM paiement WHERE id_paiement = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function getMontantSclolaireByClasse($id)
        {
            $req = $this->myPdo->prepare("SELECT `montant_total` FROM classe WHERE id_classe = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function getElevePaiement($id)
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve_paiement WHERE id_eleve = $id;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getElevePaiementByPaiement($id)
        {
            $req = $this->myPdo->prepare("SELECT * FROM eleve_paiement WHERE id_paiement = $id;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }

        public function getMontantPayerById($id)
        {
            $req = $this->myPdo->prepare("SELECT montant_payer FROM paiement WHERE id_paiement = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function getMontantFixeById($id)
        {
            $req = $this->myPdo->prepare("SELECT montant_fixe FROM paiement WHERE id_paiement = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function getPaiementById($id)
        {
            $req = $this->myPdo->prepare("SELECT * FROM paiement WHERE id_paiement = $id;");
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        public function modifyPaiement($id_paiement, $type_paiement, $nature_paiement, $montant_fixe, $montant_payer, $reduction, $solde_restant_a_payer, $id_annee)
        {
            $myReq = "UPDATE paiement SET type_paiement = '$type_paiement', nature_paiement = '$nature_paiement', montant_fixe = $montant_fixe, montant_payer = $montant_payer, reduction= $reduction, solde_restant_a_payer = $solde_restant_a_payer, id_annee = $id_annee WHERE id_paiement = $id_paiement;";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function addComptable($nom, $prenom, $username, $genre, $utilisateur_password, $statut)
        {
            $myReq = "INSERT INTO utilisateur(nom, prenom, username, genre, utilisateur_password, statut) VALUES('$nom', '$prenom', '$username', '$genre', $utilisateur_password, $statut);";
            $req = $this->myPdo->prepare($myReq);
            $req->execute();
        }

        public function getAllUser()
        {
            $req = $this->myPdo->prepare("SELECT * FROM utilisateur WHERE statut =0;");
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        }


    }

    $traitement = new Traitement();

?>