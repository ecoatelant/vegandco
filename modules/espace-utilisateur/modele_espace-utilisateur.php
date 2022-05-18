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

        function getStatCO2($idUtilisateur){
            //TODO meilleur gestion des jours : années bisextile, mois ...
            $stat_co2 = 3.81;
            try{
                $requete = Connexion::$bdd->prepare('
                    SELECT dateVegetarisme 
                    FROM utilisateur 
                    WHERE id= :idUtilisateur');
                $parametres = array(':idUtilisateur' => $idUtilisateur);
                $requete->execute($parametres);
                $resultat=$requete->fetchAll();
                if(isset($resultat[0]['dateVegetarisme'])){
                    //Quand la personne a une date de début de végétarisme renseigné
                    date_default_timezone_set('Europe/Paris');
                    $dateVegetarisme = new DateTime($resultat[0]['dateVegetarisme']);
                    $dateCourante = new DateTime();
                    $nbJoursVegetariens = $dateCourante->diff($dateVegetarisme);
                    $jours = $nbJoursVegetariens->format("%m");
                    if($nbJoursVegetariens)
                    return ($nbJoursVegetariens->y*365+$nbJoursVegetariens->m*30.5+$nbJoursVegetariens->d)*$stat_co2;
                }else{}
                return NULL;
            } catch (PDOException $e) {}
        }

        function getStatEau($idUtilisateur){
            //TODO meilleur gestion des jours : années bisextile, mois ...
            $stat_eau = 2325;
            try{
                $requete = Connexion::$bdd->prepare('
                    SELECT dateVegetarisme 
                    FROM utilisateur 
                    WHERE id= :idUtilisateur');
                $parametres = array(':idUtilisateur' => $idUtilisateur);
                $requete->execute($parametres);
                $resultat=$requete->fetchAll();
                if(isset($resultat[0]['dateVegetarisme'])){
                    //Quand la personne a une date de début de végétarisme renseigné
                    date_default_timezone_set('Europe/Paris');
                    $dateVegetarisme = new DateTime($resultat[0]['dateVegetarisme']);
                    $dateCourante = new DateTime();
                    $nbJoursVegetariens = $dateCourante->diff($dateVegetarisme);
                    $jours = $nbJoursVegetariens->format("%m");
                    if($nbJoursVegetariens)
                    return ($nbJoursVegetariens->y*365+$nbJoursVegetariens->m*30.5+$nbJoursVegetariens->d)*$stat_eau;
                }else{}
                return NULL;
            } catch (PDOException $e) {}
        }

        function getStatEconomieFinanciere($idUtilisateur){
            //TODO meilleur gestion des jours : années bisextile, mois ...
            $stat_economie = 2.57;
            try{
                $requete = Connexion::$bdd->prepare('
                    SELECT dateVegetarisme 
                    FROM utilisateur 
                    WHERE id= :idUtilisateur');
                $parametres = array(':idUtilisateur' => $idUtilisateur);
                $requete->execute($parametres);
                $resultat=$requete->fetchAll();
                if(isset($resultat[0]['dateVegetarisme'])){
                    //Quand la personne a une date de début de végétarisme renseigné
                    date_default_timezone_set('Europe/Paris');
                    $dateVegetarisme = new DateTime($resultat[0]['dateVegetarisme']);
                    $dateCourante = new DateTime();
                    $nbJoursVegetariens = $dateCourante->diff($dateVegetarisme);
                    $jours = $nbJoursVegetariens->format("%m");
                    if($nbJoursVegetariens)
                    return round((($nbJoursVegetariens->y*365+$nbJoursVegetariens->m*30.42+$nbJoursVegetariens->d)*$stat_economie), 2, PHP_ROUND_HALF_UP);
                }else{}
                return NULL;
            } catch (PDOException $e) {}
        }

        function getStatAnimaux($idUtilisateur){
            //TODO meilleur gestion des jours : années bisextile, mois ...
            $stat_animaux = 0.555;
            try{
                $requete = Connexion::$bdd->prepare('
                    SELECT dateVegetarisme 
                    FROM utilisateur 
                    WHERE id= :idUtilisateur');
                $parametres = array(':idUtilisateur' => $idUtilisateur);
                $requete->execute($parametres);
                $resultat=$requete->fetchAll();
                if(isset($resultat[0]['dateVegetarisme'])){
                    //Quand la personne a une date de début de végétarisme renseigné
                    date_default_timezone_set('Europe/Paris');
                    $dateVegetarisme = new DateTime($resultat[0]['dateVegetarisme']);
                    $dateCourante = new DateTime();
                    $nbJoursVegetariens = $dateCourante->diff($dateVegetarisme);
                    $jours = $nbJoursVegetariens->format("%m");
                    if($nbJoursVegetariens)
                        return round((($nbJoursVegetariens->y*365+$nbJoursVegetariens->m*30.5+$nbJoursVegetariens->d)*$stat_animaux), 0, PHP_ROUND_HALF_UP);
                }else{}
                return NULL;
            } catch (PDOException $e) {}
        }

    }

?>