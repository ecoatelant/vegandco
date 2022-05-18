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
            $this->vueEspaceUtil->modificationInformation();
        }

        function dashboard_perso(){
            $stat_co2 = $this->modeleEspaceUtil->getStatCO2($_SESSION['idUtilisateur']);
            $stat_eau = $this->modeleEspaceUtil->getStatEau($_SESSION['idUtilisateur']);
            $stat_economie = $this->modeleEspaceUtil->getStatEconomieFinanciere($_SESSION['idUtilisateur']);
            $stat_animaux = $this->modeleEspaceUtil->getStatAnimaux($_SESSION['idUtilisateur']);

            $stats = array(
                "co2" => $stat_co2,
                "eau" => $stat_eau,
                "economie" => $stat_economie,
                "animaux" => $stat_animaux
            );
            $this->vueEspaceUtil->dashboard($stats);
        }
       
    }

 ?>