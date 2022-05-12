<?php

    require_once "modele_connexion.php";
    require_once "vue_connexion.php";

    class ContConnexion {

        public $modeleConnexion;
        public $vueConnexion;

        function __construct(){
            $this->modeleConnexion = new ModeleConnexion();
            $this->vueConnexion = new VueConnexion();
        }

        function connexion () {
            $requete = $this->modeleConnexion->getUtilisateurByEmail($_POST['email']);
            if ($requete != NULL) {
            // Vérification du mot de passe :
                if($this->modeleConnexion->verifMDP($_POST['mdp'], $requete[0]['hash_mdp'])){
                    //TODO Quand on se connecte
                    //?
                    $_SESSION['idUtilisateur'] = $requete[0]['id'];
                    header('Location: /espace-utilisateur');
                    exit;
                } else {
                    //TODO corriger car quand on fait une erreur l'url fait nimp
                    $this->vueConnexion->IDMDPErrone();
                }
            } else {//TODO corriger car quand on fait une erreur l'url fait nimp
                $this->vueConnexion->IDMDPErrone();
                $this->vueConnexion->formConnexion();
            }
        }

        function deconnexion(){
            session_unset();
            session_destroy();
            header('Location: /home');
            exit;
        }

        function inscription(){
            //Vérifie si les deux mots de passe rentrées sont identiques
            if($this->modeleConnexion->mDPRepetesIdentiques($_POST['mdp'], $_POST['mdp_repete'])){
                //Vérifie si l'utilisateur n'existe pas déjà (le pseudo et l'adresse e-mail doivent être différent)
                if(!($this->modeleConnexion->verifPseudoEmailUnique($_POST['pseudo'], $_POST['email']))){
                    //TODO : Le pseudo ou l'email est déjà utilisé
                    echo '<main>pseudo ou email déjà utilisé</main>';
                }else{
                    /*$nouvelUtilisateur =*/ $this->modeleConnexion->nouvelUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['mdp']);
                    //TODO : Vérification de la bonne inscription de l'utilisateur donc attribution des cookies sinon affichage erreur d'inscription
                    header('Location: /connexion/formConnexion');
                    exit;
                }
            }else{
                //TODO : Les mots de passe ne sont pas identiques.
                echo '<main>Les mots de passe ne sont pas identiques.</main>';
            }
            
            
        }

        function formConnexion(){
            $this->vueConnexion->formConnexion();
        }

        function formInscription(){
            $this->vueConnexion->formInscription();
        }


       
    }

 ?>