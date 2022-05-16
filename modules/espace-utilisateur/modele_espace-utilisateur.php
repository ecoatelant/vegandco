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
                    var_dump($nbJoursVegetariens);
                    var_dump($dateCourante->format('Y'));

                    if($nbJoursVegetariens)

                    echo 'test de fou malade : '.$nbJoursVegetariens->y*365;
                    return ($nbJoursVegetariens->y*365+$nbJoursVegetariens->m*30.5+$nbJoursVegetariens->d)*$stat_co2;
                }else{

                }
                return NULL;
            } catch (PDOException $e) {}
        }

    }

?>