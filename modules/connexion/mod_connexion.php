<?php 

    require_once 'cont_connexion.php';

    class ModConnexion {

        function __construct($url){

            $controleurConnexion = new ContConnexion();

            $action = $url['1'];

            if (isset($url[1])) {
                switch ($action) {
                    case "connexion":
                        $controleurConnexion->connexion();
                        break;
                    case "deconnexion":
                        $controleurConnexion->deconnexion();
                        break;
                    case "inscription":
                        $controleurConnexion->inscription();
                        break;
                    case "formConnexion":
                        $controleurConnexion->formConnexion();
                        break;
                    case "formInscription":
                        $controleurConnexion->formInscription();
                        break;
                }
            }
        }
    }

    $modConnexion = new ModConnexion((isset($url)) ? $url : null);
    
?>