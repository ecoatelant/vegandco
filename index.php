<?php

// Démarre une session s'il n'y a pas de login et idUtil et idTypeUtilisateur
// if (!isset($_SESSION['pseudonym']) && !isset($_SESSION['idUtil']) && !isset($_SESSION['idTypeUtilisateur'])) {
//     session_start();
// }

// setcookie('utilisateur','emilie', time()+60*60*24*30);

 $url = '';
// Récupere l'URL dans un tableau qui prendra les arguments de l'URL
if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

echo 'url get:'.$_GET['url'];

echo 'url : '.$url;

// Recupère la page si argument 0 de l'url pas vide, sinon on renvoie que la page est la page d'accueil
if (isset($url[0])) {
    $page = $url[0];
} else {
    $page = 'accueil';
}

echo $_GET['url'];


// Si c'est une page n'appartenant pas au module
if (!in_array($page, array('connexion', 'recette'))) {
    // Si c'est une page static
    if (in_array($page, array('home', 'propos', 'mention'))) {
        ob_start();
        $pageTitle = ucfirst($page) . ' - VEG AND CO\'';
        require "static/$page.php";
        $pageContent = ob_get_clean();
        require 'layout.php';
    } else { // Ni module ni page static
        // $error = '404';
        // require "static/error.php";
        // http_response_code(404);
        // die;
    }
} else { // Module
    $pageTitle = ucfirst($page) . ' - VEG AND CO\'';
    ob_start();
    require "modules/$page/mod_$page.php";
    $pageContent = ob_get_clean();
    require 'layout.php';
}

?>