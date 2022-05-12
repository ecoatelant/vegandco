<?php

    require_once "modele_espace-utilisateur.php";
    require_once "vue_espace-utilisateur.php";

    class ContEspaceUtilisateur {

        public $modeleEspaceUtil;
        public $vueEspaceUtil;

        function __construct(){
            $this->modeleEspaceUtil = new ModeleEspaceUtilisateur();
            $this->vueEspaceUtil = new VueEspaceUtilisateur();
        }

        function profil(){
            $utilisateurCourant = $this->modeleEspaceUtil->getUtilisateur($_SESSION['idUtilisateur']);
            $this->vueEspaceUtil->affichageProfil($utilisateurCourant);
        }

        function modificationInformation(){
            
        }
       
    }

 ?>