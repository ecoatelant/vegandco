<?php

    require_once "modele_connexion.php";
    require_once "vue_connexion.php";

    class ContConnexion {

        public $modeleConnexion;
        public $vueConnexion;

        function __construct(){
            $this->modeleConnexion = new ModeleConnexion();
            $this->vueConnexion = new VueConnexion();
        }

        function connexion () {
            $requete = $this->modeleConnexion->getUtilisateurParEmail($_POST['email']);
            if ($requete != NULL) {
            // Vérification du mot de passe :
                if($this->modeleConnexion->verifMDP($_POST['mdp'], $requete[0]['hash_mdp'])){
                    //TODO Quand on se connecte
                    //?
                    $_SESSION['idUtilisateur'] = $requete[0]['id'];
                    /*setcookie(
                        'idUtilisateur', 
                        $requete[0]['id'], 
                        [
                            'expires' => time() + 365*24*3600,
                            'secure' => true,
                            'httponly' => true,
                        ]);*/
                    header('Location: '.PATHBASE.'/espace-utilisateur');
                    exit;
                } else {
                    //TODO corriger car quand on fait une erreur l'url fait nimp
                    $_SESSION['erreur'] = "L'identifiant ou le mot de passe que vous avez saisi est erroné, veuillez recommencer s'il vous plait.";
                    $this->vueConnexion->formConnexion();
                }
            } else {//TODO corriger car quand on fait une erreur l'url fait nimp
                $_SESSION['erreur'] = "L'identifiant ou le mot de passe que vous avez saisi est erroné, veuillez recommencer s'il vous plait.";
                $this->vueConnexion->formConnexion();
            }
        }

        function inscription($etat_inscription){
            //TODO : sécurité : pas le droit d'accéder à cet espace si connecté
            switch ($etat_inscription) {
                case '1':
                    //Affichage du formulaire pour le nom, le prénom, le pseudo, l'email et le mot de passe
                    $this->vueConnexion->formInscription();
                    break;
                case '1-traitement':
                    //Insertion dans la BD du nom, prénom, pseudo, email et mot de passe
                    //Vérifie si la page précédente est bien le formulaire d'inscription
                    if(isset($_POST['formulaireInscription'])){
                        //Vérifie si les deux mots de passe rentrées sont identiques
                        $mdpIdentique=$this->modeleConnexion->mDPRepetesIdentiques($_POST['mdp'], $_POST['mdp_repete']);
                        //TODO : diviser les deux
                        //Vérifie si l'utilisateur n'existe pas déjà (le pseudo et l'adresse e-mail doivent être différent)
                        $emailPseudoUnique=$this->modeleConnexion->verifPseudoEmailUnique($_POST['pseudo'], $_POST['email']);
                        if($mdpIdentique && $emailPseudoUnique){
                            $this->modeleConnexion->nouvelUtilisateurEtape1($_POST['pseudo'], $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['mdp']);
                            //TODO : Vérification de la bonne inscription de l'utilisateur donc attribution des cookies sinon affichage erreur d'inscription
                            $nouvelUtil = $this->modeleConnexion->getUtilisateurParEmail($_POST['email']);
                            if(isset($nouvelUtil)){
                                $_SESSION['idUtilisateur'] = $nouvelUtil[0]['id'];
                                //TODO : Affectation Cookies
                            }
                            header('Location: '.PATHBASE.'/connexion/inscription/2');
                            exit;
                        }else{
                            if(!$mdpIdentique){
                                $_SESSION['erreur'][0] = "Les mots de passe ne sont pas identiques";
                            }
                            if(!$emailPseudoUnique){
                                //DIVISER EN DEUX CETTE ERREUR
                                $_SESSION['erreur'][1] = "Le pseudo est déjà utilisé par quelqu'un d'autre, veuillez en précisez un autre";
                            }
                            header('Location:'.PATHBASE.'/connexion/inscription/1');
                            exit;
                        }
                    }
                    //Si l'utilisateur ne provient pas du formulaire
                    else{
                        require_once 'includes'.DIRECTORY_SEPARATOR.'error.php';
                    }
                    break;
                case '2':
                    //Affichage du formulaire pour le végétarisme
                    $this->vueConnexion->formVeg();
                    break;
                case '2-traitement':
                    //Vérifie si la page précédente est bien le formulaire d'inscription
                    if(isset($_POST['formulaireVegOui'])){
                        $this->vueConnexion->formCalendrier();
                    }else if(isset($_POST['formulaireVegNon'])){
                        $this->modeleConnexion->nouvelUtilisateurEtape2PasVeg($_SESSION['idUtilisateur']);
                        header('Location:'.PATHBASE.'/connexion/inscription/3');
                        exit;
                    }
                    //Si l'utilisateur ne provient pas du formulaire
                    else{
                        require_once 'includes'.DIRECTORY_SEPARATOR.'error.php';
                    }
                    break;
                case '2-bis':
                    //Affichage du formulaire pour le végétarisme
                    $this->vueConnexion->formCalendrier();
                    break;
                case '2-bis-traitement':
                    //Si végétarien, formulaire de date
                    //Vérifie si la page précédente est bien le formulaire de calendrier pour la date de végétarisme
                    if(isset($_POST['formCalendrierVeg'])){
                        $this->modeleConnexion->nouvelUtilisateurEtape2Veg($_SESSION['idUtilisateur'], $_POST['dateVegetarisme']);
                        header('Location:'.PATHBASE.'/connexion/inscription/3');
                        exit;
                    }
                    //Si l'utilisateur ne provient pas du formulaire
                    else{
                        require_once 'includes'.DIRECTORY_SEPARATOR.'error.php';
                    }
                    break;
                case '3':
                    //Formulaire de newsletter
                    $this->vueConnexion->formNewsletter();
                    break;
                case '3-traitement':
                    //Newsletter
                    //Vérifie si la page précédente est bien le formulaire de newsletter
                    if(isset($_POST['formNewsletterOui']) || isset($_POST['formNewsletterNon'])){
                        $newsletter=0;
                        if(isset($_POST['formNewsletterOui'])){
                            $newsletter=1;
                        }
                        $this->modeleConnexion->nouvelUtilisateurEtape3($_SESSION['idUtilisateur'], $newsletter);
                        //header('Location:'.PATHBASE.'/connexion/inscription/4');
                        header('Location:'.PATHBASE.'/espace-utilisateur');
                        //exit;
                    //Si l'utilisateur ne provient pas du formulaire
                    }else{
                        require_once 'includes'.DIRECTORY_SEPARATOR.'error.php';
                    }
                    break;
                case '4':
                    //Formulaire d'abonnement
                    //TODO
                    break;
                case '4-traitement':
                    //Abonnement
                    //TODO
                    break;

            }
            
        }

        function deconnexion(){
            session_unset();
            session_destroy();
            header('Location: '.PATHBASE.'/home');
            exit;
        }

        function formConnexion(){
            $this->vueConnexion->formConnexion();
        }

        function mDPOublie(){
            $this->vueConnexion->mDPOublie();
        }

        function recupMDPOublie(){
            if(isset($_POST['recup_submit'], $_POST['recup_email'])) {
                //Suppression de toutes les balises HTML afin d'éviter les injections SQL.
                $recup_email=htmlspecialchars($_POST['recup_email']);
                //Vérification de la validité de l'adresse e-mail.
                if(filter_var($recup_email, FILTER_VALIDATE_EMAIL)){
                    unset($_SESSION['erreur']);
                    if($this->modeleConnexion->emailExistant($recup_email)){
                        $_SESSION['recup_email'] = $recup_email;
                        $recup_code = "";
                        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $caracteresLength = strlen($caracteres);
                        for($i=0; $i<6; $i++){
                            $recup_code.=$caracteres[rand(0, $caracteresLength - 1)];
                        }
                        //Voir pour peut-être le remplacer par un cookie
                        $_SESSION['recup_code'] = $recup_code;
                        
                        //Vérification si l'utilisateur avait déjà demandé un code de récupération
                        if($this->modeleConnexion->verificationCodeRecuperationInexistant($_SESSION['recup_email'])){
                            //Si inexistant, création d'un élément
                            $this->modeleConnexion->nouveauCodeRecuperation($_SESSION['recup_email'], $_SESSION['recup_code']);
                        }else { //Sinon, mise à jour du code seulement
                            $this->modeleConnexion->mAJCodeRecuperation($_SESSION['recup_email'], $_SESSION['recup_code']);
                        }
                        $donneesEMail = $this->modeleConnexion->getUtilisateurParEMail($recup_email);
                        header('Location: '.PATHBASE.'/oops');
                        // $header="MIME-Version: 1.0\r\n";
                        // $header.='From:"VEG & CO"<emiliecoatelant2006@mail.com>'."\n";
                        // $header.='Content-Type:text/html; charset="utf-8"'."\n";
                        // $header.='Content-Transfer-Encoding: 8bit';
                        // $message = '
                        // <html>
                        // <head>
                        // <title>Récupération de mot de passe - VEG & CO</title>
                        // <meta charset="utf-8" />
                        // </head>
                        // <body>
                        // <font color="#303030";>
                        //     <div align="center">
                        //     <table width="600px">
                        //         <tr>
                        //         <td>
                                    
                        //             <div align="center">Bonjour <b>'.$donneesEMail[0]['pseudo'].'</b>,</div>
                        //             Voici votre code de récupération: <b>'.$recup_code.'</b>
                        //             Cliquez <a href="http://localhost/vegandco/connexion/recuperation-mdp-oublie?section=code&code='.$recup_code.'">ici</a> pour réinitialiser votre vot mot de passe.
                        //             A bientôt sur <a href="http://localhost/vegandco/">Votre site</a> !
                                    
                        //         </td>
                        //         </tr>
                        //         <tr>
                        //         <td align="center">
                        //             <font size="2">
                        //             Ceci est un email automatique, merci de ne pas y répondre
                        //             </font>
                        //         </td>
                        //         </tr>
                        //     </table>
                        //     </div>
                        // </font>
                        // </body>
                        // </html>
                        // ';
                        // mail($recup_email, "Récupération de mot de passe - VEG AND CO", $message, $header);
                    }else{
                        $_SESSION['erreur'] = "L'adresse e-mail renseignée n'existe pas dans notre base de donnée.";
                        header('Location: '.PATHBASE.'/connexion/mot-de-passe-oublie');
                    }
                }else{
                    $_SESSION['erreur'] = "Veuillez entre une adresse e-mail valide s'il vous plaît.";
                    header('Location: '.PATHBASE.'/connexion/mot-de-passe-oublie');
                } 
            }
        }
       
    }

 ?>