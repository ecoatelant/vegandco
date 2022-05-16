<?php

require_once 'vue_actualite.php';
require_once 'modele_actualite.php';

class ContActualite {

    public $modeleActualite;
    public $vueActualite;

    public function __construct() {
		$this->modeleActualite = new  ModeleActualite();
        $this->vueActualite = new VueActualite();
    }

    public function afficherActualite($idActualite){
        $actualite = $this->modeleActualite->getActualite($idActualite);
        $this->vueActualite->afficherActualite($actualite);
    }

    public function listeActualites () {
        $listesActualites = $this->modeleActualite->getListeActualites();
        $this->vueActualite->afficherActualites($listesActualites);
    }

}
