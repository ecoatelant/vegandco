<?php

//Fonction pour simplifier la construction d'URL
function buildpath(...$segments){
    return $pathbase."/".join("/", $segments);
}

//Pour la portabilité du projet
//define('PATHBASE','/~gaiennes/vegandco');
define('PATHBASE','/vegandco');

?>