<?php

    class Connexion{

        protected static $bdd;

        public function __construct(){}

        public static function initConnexion(){
            $db_host = "localhost";
            $user = "VC_emilie.coatelant";
            $password = "projetTUTEURE2022!";
            $db_name = "vegandco";
            $dns = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';
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