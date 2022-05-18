<?php 

    require_once 'cont_connexion.php';

    class ModConnexion {

        function __construct($url){

            $controleurConnexion = new ContConnexion();

            if (isset($url[1])) {
                $action = $url['1'];
                switch ($action) {
                    case "connexion":
                        $controleurConnexion->connexion();
                        break;
                    case "deconnexion":
                        $controleurConnexion->deconnexion();
                        break;
                    case "inscription":
                        if(isset($url[2])){
                            $controleurConnexion->inscription($url[2]);
                        }else{
                            require_once 'includes'.DIRECTORY_SEPARATOR.'error.php';
                        }
                        break;
                    case "inscription2":
                        $controleurConnexion->inscription2();
                        break;
                    case "formConnexion":
                        $controleurConnexion->formConnexion();
                        break;
                    case "formInscription":
                        $controleurConnexion->formInscription();
                        break;
                    case "formVeg":
                        $controleurConnexion->formVeg();
                        break;
                    case "formCalendrier":
                        $controleurConnexion->formCalendrier();
                        break;
                    case "formNewsletter":
                        $controleurConnexion->formNewsletter();
                        break;
                    case "mot-de-passe-oublie":
                        $controleurConnexion->mDPOublie();
                        break;
                    case "recuperation-mdp-oublie":
                        $controleurConnexion->recupMDPOublie();
                        break;
                }
            }
        }
    }

    $modConnexion = new ModConnexion((isset($url)) ? $url : null);
    
?>