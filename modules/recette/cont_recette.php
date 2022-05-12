<?php

require_once 'vue_recette.php';
require_once 'modele_recette.php';

class ContRecette {

    public $modeleRecette;
    public $vueRecette;

    public function __construct() {
		$this->modeleRecette = new  ModeleRecette();
        $this->vueRecette = new VueRecette();
    }

    public function afficherRecette($idRecette){
        $recette = $this->modeleRecette->getRecette($idRecette);
        $this->vueRecette->afficherRecette($recette);
    }

    public function listeRecettes () {
        $listesRecettes = $this->modeleRecette->getListeRecettes();
        $this->vueRecette->afficherRecettes($listesRecettes);
    }

    public function nouvelleRecette() {
        $this->vueRecette->nouvelleRecette();
    }

    // TODO : Voir pour ajouter l'auteur
    public function ajoutNouvelleRecette() {
        $idNouvelleRecette = $this->modeleRecette->ajoutNouvelleRecette(
            $_POST['titre'],
            ($_POST['tmpsCuisson']+$_POST['tmpsPreparation']), 
            $_POST['img'],
            $_POST['difficulte'],
            $_POST['tmpsPreparation'],
            $_POST['tmpsCuisson'],
            $_POST['categorie']);
        $this->vueRecette->afficherRecette($recette);
    }

}
