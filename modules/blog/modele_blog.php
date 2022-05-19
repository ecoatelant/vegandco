<?php

    require_once 'config/connexion.php';

    class ModeleBlog extends Connexion {

        public function __construct(){}

        public function getBlog($id){
            try{
                $requete = Connexion::$bdd->prepare('
                    SELECT 
                        T0.titre,
                        T0.image,
                        DATE_FORMAT(T0.date, "%d/%m/%Y") AS date,
                        CONCAT(T1.prenom, \' \', T1.nom) AS auteur,
                        T0.chemin
                    FROM blog T0
                    LEFT JOIN utilisateur T1 ON T0.auteur = T1.id
                    WHERE T0.id= :id');
                $reponse = array(':id' => $id);
                $requete->execute($reponse);
                $resultat=$requete->fetchAll();
                return $resultat;
            } catch (PDOException $e) {}
        }

        public function getListeBlog(){
            try {
                $requete = Connexion::$bdd->prepare('
                    SELECT * 
                    FROM blog');
                $requete->execute();
                $resultat = $requete->fetchAll();
                return $resultat;
            } catch (PDOException $e) {}
        }

    }

?>