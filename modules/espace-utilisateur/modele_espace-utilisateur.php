<?php

    require_once 'config'.DIRECTORY_SEPARATOR.'connexion.php';

    class ModeleEspaceUtilisateur extends Connexion {

        function getUtilisateur($id){
            try{
                $requete = Connexion::$bdd->prepare('
                    SELECT * 
                    FROM utilisateur 
                    WHERE id= :id');
                $parametres = array(':id' => $id);
                $requete->execute($parametres);
                $resultat=$requete->fetchAll();
                return $resultat;
            } catch (PDOException $e) {}
        }

    }

?>