<?php

class Connexion
{
    protected static $bdd;

    public function __construct(){}

    public static function initConnexion()
    {
        $db_host = "localhost";
        $user = "gaiennes";
        $password = "iNPdOPJdWHBH";
        $db_name = "2122_Gaiennes";
        $dns = 'mysql:host=' . $db_host . ';dbname=' . $db_name. ';charset=utf8';
        try {
            self::$bdd = new PDO($dns, $user, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
<?php
Connexion::initConnexion();
?>