<?php 

require_once 'cont_recette.php';

class ModRecette {

    function __construct($url){

        $controleurRecette = new ContRecette();

        if(isset($url[1])){
            $action = $url[1];
            switch($action){
                // case 'recette' :
                //     if(isset($url[2])){
                //         $controleurRecette->afficherRecette($url[2]);
                //     }else{
                //         // TODO : ajouter ce qu'il se passe quand aucune recette à afficher n'est renseigné
                //         // Page d'accueil avec toutes les recettes
                //         $controleurRecette->affichagePageRecettes($url[2]);
                //     }
                
            }
        }else{
            $controleurRecette->listeRecettes();
        }


    }

}



?>


<?php
$modrecette = new ModRecette((isset($url)) ? $url : null);
?>