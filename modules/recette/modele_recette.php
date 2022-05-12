<?php

require_once 'config/connexion.php';

class ModeleRecette extends Connexion {

    public function __construct(){}

    public function getRecette($id)
    {
        try{
            $requete = Connexion::$bdd->prepare('
                SELECT * 
                FROM recette 
                WHERE id= :id');
            $reponse = array(':id' => $id);
            $requete->execute($reponse);
            $resultat=$requete->fetchAll();
            return $resultat;
        } catch (PDOException $e) {}
    }

    public function getListeRecettes()
    {
        try {
            $requete = Connexion::$bdd->prepare('select * from recette');
            $requete->execute();
            $resultat = $requete->fetchAll();
            return $resultat;
        } catch (PDOException $e) {
        }
    }

    public function ajoutNouvelleRecette(
        $titre, 
        $tmps, 
        $img, 
        $difficulte,
        $tmpsPreparation,
        $tmpsCuisson,
        $categorie){

            echo 'test';
            try{
            //     echo 'INSERT INTO recette 
            //     (titre, temps, difficulte, cuisson, preparation, categorie, image)
            // VALUES ('.$titre.', '..', '..', '..', '..', '..', '..')';
                $prepaInser = Connexion::$bdd->prepare('
                INSERT INTO recette 
                    (titre, temps, difficulte, cuisson, preparation, categorie, image)
                VALUES (:titre, :temps, :difficulte, :cuisson, :preparation, :categorie, :image)');
                $reponse = array(':titre' => $titre, ':temps' => $tmps, ':difficulte' => $difficulte, ':cuisson' => $cuisson, ':preparation' => $preparation, ':categorie' => $categorie, ':image' => $img);
                $prepaInser->execute($reponse);
            } catch (PDOException $e) {
        }
    }

    function getGrandeCategoriesRecettes(){
        try {
            $requete = Connexion::$bdd->prepare('
                SELECT * 
                FROM categorie_recette
                WHERE parent IS NULL');
            $requete->execute();
            $resultat = $requete->fetchAll();
            return $resultat;
        } catch (PDOException $e) {}
    }

}
