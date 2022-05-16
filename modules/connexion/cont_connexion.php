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

        function deconnexion(){
            session_unset();
            session_destroy();
            header('Location: '.PATHBASE.'/home');
            exit;
        }

        function inscription(){
            //Vérifie si la page précédente est bien le formulaire d'inscription
            if(isset($_POST['formulaireInscription'])){
                //Vérifie si les deux mots de passe rentrées sont identiques
                if($this->modeleConnexion->mDPRepetesIdentiques($_POST['mdp'], $_POST['mdp_repete'])){
                    //Vérifie si l'utilisateur n'existe pas déjà (le pseudo et l'adresse e-mail doivent être différent)
                    if(!($this->modeleConnexion->verifPseudoEmailUnique($_POST['pseudo'], $_POST['email']))){
                        //TODO : Le pseudo ou l'email est déjà utilisé
                        echo '<main>pseudo ou email déjà utilisé</main>';
                    }else{
                        /*$nouvelUtilisateur =*/ $this->modeleConnexion->nouvelUtilisateur($_POST['pseudo'], $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['mdp']);
                        
                        //TODO : Vérification de la bonne inscription de l'utilisateur donc attribution des cookies sinon affichage erreur d'inscription
                        header('Location: '.PATHBASE.'/connexion/formConnexion');
                        exit;
                    }
                }else{
                    //TODO : Les mots de passe ne sont pas identiques.
                    echo '<main>Les mots de passe ne sont pas identiques.</main>';
                }
            }
            //Si l'utilisateur ne provient pas du formulaire
            else{
                //TODO : envoie vers la page 404
            }
        }

        function formConnexion(){
            $this->vueConnexion->formConnexion();
        }

        function formInscription(){
            $this->vueConnexion->formInscription();
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