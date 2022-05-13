<?php 

    require_once 'cont_espace-utilisateur.php';

    class ModEspaceUtilisateur {

        function __construct($url){

            $controleurEspaceUtil = new ContEspaceUtilisateur();

            if (isset($url[1])) {
                $action = $url['1'];
                switch ($action) {
                    case 'modification-information':
                        $controleurEspaceUtil->modificationInformation();
                        break;
                }
            } else $controleurEspaceUtil->profil();
        }
    }

    $modEspaceUtilisateur = new ModEspaceUtilisateur((isset($url)) ? $url : null);
    
?>