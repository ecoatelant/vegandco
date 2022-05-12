<?php

    require_once 'config'.DIRECTORY_SEPARATOR.'connexion.php';

    class ModeleConnexion extends Connexion {

        function getUtilisateurByEmail ($email) {
            try{
                $selectPreparee =Connexion::$bdd->prepare('
                    SELECT id, pseudo, hash_mdp
                    FROM utilisateur 
                    WHERE email=:email');
                $reponse = array(':email' => $email);
                $selectPreparee->execute($reponse);
                return $selectPreparee->fetchAll();
            } catch (PDOException $e) {}

        }

        function verifMDP($mdpNonHashe, $mdpHashe) {
            return password_verify($mdpNonHashe, $mdpHashe);
        }

        function mDPRepetesIdentiques($mdp, $mdpRepete){
            return $mdp==$mdpRepete;
        }

        function verifPseudoEmailUnique($pseudo, $email){
            try{
                $selectPreparee =Connexion::$bdd->prepare('
                    SELECT pseudo, email
                    FROM utilisateur 
                    WHERE pseudo=:pseudo
                        OR email=:email');
                $reponse = array(':pseudo' => $pseudo, ':email' => $email);
                $selectPreparee->execute($reponse);
                $resultat = $selectPreparee->fetchAll();
                return count($resultat)==0;
            } catch (PDOException $e) {}
            
        }

        function nouvelUtilisateur($pseudo, $prenom, $nom, $email, $mdp) {
            try{
                $selectPrepareeInsert = Connexion::$bdd->prepare('
                INSERT INTO utilisateur(creation, pseudo, prenom, nom, email, hash_mdp) 
                    VALUES (NOW(), :pseudo, :prenom, :nom, :email, :mdp)');
                $reponse = array(':pseudo' => $pseudo, ':nom' => $nom, ':prenom' => $prenom, ':email' => $email, ':mdp' => password_hash($mdp, PASSWORD_DEFAULT));
                $selectPrepareeInsert->execute($reponse);
            } catch (PDOException $e) {}
        }

    }

?>