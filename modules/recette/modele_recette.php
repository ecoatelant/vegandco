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
            $requete = Connexion::$bdd->prepare('
                SELECT * 
                FROM recette');
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
        $preparation,
        $cuisson,
        $categorie){
            try{
                $prepaInsert = Connexion::$bdd->prepare('
                    INSERT INTO recette 
                    (titre, temps, difficulte, cuisson, preparation, categorie, image)
                    VALUES (:titre, :temps, :difficulte, :cuisson, :preparation, :categorie, :image)');
                $reponse = array(':titre' => $titre, ':temps' => $tmps, ':difficulte' => $difficulte, ':cuisson' => $cuisson, ':preparation' => $preparation, ':categorie' => $categorie, ':image' => $img);
                $prepaInsert->execute($reponse);

                $dernier_id = Connexion::$bdd->lastInsertId();

                $dernier_recette = $this->getRecette($dernier_id);
                return $dernier_recette;
            } catch (PDOException $e) {
                echo $e;
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

    function getCategoriesParID($idRecette){
        try {
            $pasDeCategorieParente=false;
            $cat = array();
            $requete = Connexion::$bdd->prepare('
                SELECT 
                    T1.*
                FROM recette T0
                INNER JOIN categorie_recette T1 ON T0.categorie = T1.id
                WHERE T0.id=:idRecette');
            $reponse = array(':idRecette' => $idRecette);
            $requete->execute($reponse);
            $resultat = $requete->fetchAll();
            array_push($cat, $resultat[0]['nom']);
            if($resultat[0]['parent']==NULL){
                $pasDeCategorieParente=true;
            }
            while(!$pasDeCategorieParente){
                $requete = Connexion::$bdd->prepare('
                    SELECT 
                        *
                    FROM categorie_recette 
                    WHERE id=:idCategorie');   
                $reponse = array(':idCategorie' => $resultat[0]['parent']);
                $requete->execute($reponse);
                $resultat = $requete->fetchAll();
                array_push($cat, $resultat[0]['nom']);
                if($resultat[0]['parent']==NULL){
                    $pasDeCategorieParente=true;
                }
            }
            return $cat;
        } catch (PDOException $e) {}
    }

}
