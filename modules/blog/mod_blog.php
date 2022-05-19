<?php 

    require_once 'cont_blog.php';

    class ModBlog {

        function __construct($url){

            $controleurBlog = new ContBlog();

            if (isset($url[1])) {
                $action = $url['1'];
                switch ($action) {
                    case 'affichage' :
                        if(isset($url[2])){
                            $controleurBlog->afficherBlog($url[2]);
                        }else{
                            // TODO : ajouter ce qu'il se passe quand aucun blog à afficher n'est renseigné
                            // Page d'accueil avec toutes les blog
                   //         $controleurRecette->affichagePageRecettes($url[2]);
                        }
                        break;
                }
            }else {
                $controleurBlog->listeBlog();
            }
        }
    }

    $modBlog = new ModBlog((isset($url)) ? $url : null);
    
?>