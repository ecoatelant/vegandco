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
        $listesCategories = $this->modeleRecette->getGrandeCategoriesRecettes();
        $this->vueRecette->afficherRecettes($listesRecettes, $listesCategories);
    }

    public function nouvelleRecette() {
        $this->vueRecette->nouvelleRecette();
    }

    // TODO : Voir pour ajouter l'auteur
    public function ajoutNouvelleRecette() {
        // echo '<main>test</main>';
        // var_dump($_POST);
        // var_dump($_FILES);
        // $image_recette = $_FILES['img-recette']['name'];
        // $dossier_import = 'data'.$image_recette;
        // move_uploaded_file($_FILES['img-recette']['tmp_name'], $dossier_import);
        //$temps = $_POST['tmpsPreparation']+$_POST['tmpsCuisson'];
        $idNouvelleRecette = $this->modeleRecette->ajoutNouvelleRecette(
            $_POST['titre'],
            NULL, 
            NULL,
            $_POST['difficulte'],
            $_POST['tmpsPreparation'],
            $_POST['tmpsCuisson'],
            NULL);
        $this->vueRecette->afficherRecette($idNouvelleRecette, $this->modeleRecette->getGrandeCategoriesRecettes());
    }

    function getCategoriesParID($id){
        return $this->modeleRecette->getCategoriesParID($id);
    }

}
