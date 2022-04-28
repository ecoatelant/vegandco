<?php

require_once 'vue_recette.php';
require_once 'modele_recette.php';

class ContRecette {

    public $modeleRecette;
    public $vueRecette;

    public function __construct() {
		$this->modele = new  ModeleRecette();
        $this->vue = new VueRecette();
    }

    public function listeRecettes () {
        $listesRecettes = $this->modele->getListeRecettes();
        $this->vue->afficherRecettes($listesRecettes);
    }

}
