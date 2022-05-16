<?php 

    require_once 'cont_actualite.php';

    class ModActualite {

        function __construct($url){

            $controleurActualite = new ContActualite();

            if (isset($url[1])) {
                $action = $url['1'];
                switch ($action) {
                    case 'affichage' :
                        if(isset($url[2])){
                            $controleurActualite->afficherActualite($url[2]);
                    //    }else{
                            // TODO : ajouter ce qu'il se passe quand aucune recette à afficher n'est renseigné
                            // Page d'accueil avec toutes les recettes
                   //         $controleurRecette->affichagePageRecettes($url[2]);
                        }
                        break;
                }
            }else {
                $controleurActualite->listeActualites();
            }
        }
    }

    $modActualite = new ModActualite((isset($url)) ? $url : null);
    
?>