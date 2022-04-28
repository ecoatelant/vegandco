<?php

require_once 'config/connexion.php';

class ModeleRecette extends Connexion {

    public function __construct(){}

    public function getListeRecettes()
    {
        try {
            $req = Connexion::$bdd->prepare('select * from recette');
            $req->execute();
            $result = $req->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }

}
