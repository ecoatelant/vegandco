<?php

    class VueConnexion{

        function formInscription(){
            ?>
                <main class="inscription">
                    <section>
                        <article>
                            <div class="image-slot">
                                <picture>
                                    <source srcset="<?=PATHBASE?>/media/inscription_mob.jpg" media="(max-width: 1023px)">
                                    <img src="<?=PATHBASE?>/media/inscription_desktop.jpg" alt="visuel téléphone avec des légumes autour">
                                </picture>
                            </div>
                            <div class="signup">
                                <h1>Inscription</h1>
                                <div class="fsignup">
                                    <form action="<?= PATHBASE ?>/connexion/inscription/1-traitement" method="post">
                                        <div>
                                            <label for="nom">Nom</label>
                                            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required="">
                                        </div>
                                        <div>
                                            <label for="prenom">Prénom</label>
                                            <input type="texte" id="prenom" name="prenom" placeholder="Entrez votre prénom" required="">
                                        </div>
                                        <div>
                                            <label for="pseudo">Pseudo</label>
                                            <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required="">
                                        </div>
                                        <div>
                                            <label for="email">Email</label>
                                            <input type="text" placeholder="Entrez votre adresse email" name="email" id="email" required="">
                                        </div>
                                        <div>
                                            <label for="psw">Mot de passe</label>
                                            <input type="password" placeholder="Entrez votre mot de passe" name="mdp" id="psw" required="">
                                        </div>
                                        <div>
                                            <label for="psw-repeat">Répétez votre mot de passe</label>
                                            <input type="password" placeholder="Répétez votre mot de passe" name="mdp_repete" id="psw-repeat" required="">
                                        </div>
                                        <p class="texte-cgu">
                                            En créant mon compte, j'ai lu et accepte les&nbsp;
                                            <a href="<?= PATHBASE ?>/CGU">Conditions Générales d'Utilisation</a>
                                        </p>
                                        <div>
                                            <?php 
                                                if(isset($_SESSION['erreur'])){
                                                    foreach($_SESSION['erreur'] as &$erreur){
                                                        echo '<span>'.$erreur.'</span>';
                                                    }
                                                }
                                                unset($_SESSION['erreur']);
                                            ?>
                                        </div>
                                        <div>
                                            <button class="registerbtn cta" type="submit" name="formulaireInscription">S'inscrire</button>
                                        </div>
                                    </form>
                                    <div class="login-slot">
                                        <p>Avez-vous déjà un compte ?&nbsp;
                                            <a href="<?= PATHBASE ?>/connexion/formConnexion">Se connecter</a>
                                        </p>
                                    </div>
                                    <div class="login-Google">
                                        <a href="">
                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M43.611 20.083H42V20H24V28H35.303C33.654 32.657 29.223 36 24 36C17.373 36 12 30.627 12 24C12 17.373 17.373 12 24 12C27.059 12 29.842 13.154 31.961 15.039L37.618 9.382C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24C4 35.045 12.955 44 24 44C35.045 44 44 35.045 44 24C44 22.659 43.862 21.35 43.611 20.083Z" fill="#FFC107"></path>
                                                <path d="M6.30591 14.691L12.8769 19.51C14.6549 15.108 18.9609 12 23.9999 12C27.0589 12 29.8419 13.154 31.9609 15.039L37.6179 9.382C34.0459 6.053 29.2679 4 23.9999 4C16.3179 4 9.65591 8.337 6.30591 14.691Z" fill="#FF3D00"></path>
                                                <path d="M24.0001 44.0002C29.1661 44.0002 33.8601 42.0232 37.4091 38.8082L31.2191 33.5702C29.1436 35.1486 26.6075 36.0023 24.0001 36.0002C18.7981 36.0002 14.3811 32.6832 12.7171 28.0542L6.19507 33.0792C9.50507 39.5562 16.2271 44.0002 24.0001 44.0002Z" fill="#4CAF50"></path>
                                                <path d="M43.611 20.083H42V20H24V28H35.303C34.5142 30.2164 33.0934 32.1532 31.216 33.571L31.219 33.569L37.409 38.807C36.971 39.205 44 34 44 24C44 22.659 43.862 21.35 43.611 20.083Z" fill="#1976D2"></path>
                                            </svg>
                                            <p>
                                                Se connecter avec Google
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                </main>
            <?php
        }

        function formVeg(){
            ?>
                <main class="inscription vege">
                    <section>
                        <article>
                            <div class="image-slot">
                                <picture>
                                    <source srcset="<?=PATHBASE?>/media/inter_mob.jpg" media="(max-width: 1023px)">
                                    <img src="<?=PATHBASE?>/media/inter_desk.jpg" alt="visuel téléphone avec des légumes autour" />
                                </picture>
                            </div>
                            <div class="signup">
                                <h1>Raconte-nous tout !</h1>
                                <div class="fsignup">
                                    <form class="codepromo" action="<?= PATHBASE ?>/connexion/inscription/2-traitement" method="post">
                                        <div>
                                            <h4>Êtes-vous végétarien.ne ?</h4>
                                        </div>
                                        <div class="cta-row">
                                            <button class="yes cta" type="submit" name="formulaireVegOui">Oui</button>
                                            <button class="no cta" type="submit" name="formulaireVegNon">Non</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </section>
                </main>
            <?php
        }

        function formCalendrier(){
            ?>
                <main class="inscription vege calendrier">
                    <section>
                        <article>
                            <div class="image-slot">
                                <picture>
                                    <source srcset="<?=PATHBASE?>/media/inter_mob.jpg" media="(max-width: 1023px)">
                                    <img src="<?=PATHBASE?>/media/inter_desk.jpg" alt="visuel téléphone avec des légumes autour" />
                                </picture>
                            </div>
                            <div class="signup">
                                <h1>Raconte-nous tout !</h1>
                                <div class="fsignup">
                                    <form class="codepromo" action="<?= PATHBASE ?>/connexion/inscription/2-bis-traitement" method="post">
                                        <div>
                                            <label for="dateReduit">Date où vous avez réduit</label>
                                            <input type="date" id="dateReduit" name="dateVegetarisme" placeholder="" required>
                                        </div>
                                        <div>
                                            <button class="registerbtn cta" type="submit" name="formCalendrierVeg">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </section>
                </main>
            <?php
        }

        function formNewsletter(){
            ?>
            <main class="inscription vege">
                <section>
                    <article>
                        <div class="image-slot">
                            <picture>
                                <source srcset="<?=PATHBASE?>/media/newsletter_mob.jpg" media="(max-width: 1023px)">
                                <img src="<?=PATHBASE?>/media/newsletter_desk.jpg" alt="visuel téléphone avec des légumes autour" />
                            </picture>
                        </div>
                        <div class="signup">
                            <h1>Newsletter</h1>
                            <div class="fsignup">
                                <form class="codepromo" action="<?= PATHBASE ?>/connexion/inscription/3-traitement" method="post">
                                    <div>
                                        <h4>Voulez-vous abonner à notre newsletter ?</h4>
                                    </div>
                                    <div class="cta-row">
                                        <button class="yes cta" type="submit" name="formNewsletterOui">Oui</button>
                                        <button class="no cta" type="submit" name="formNewsletterNon">Non</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </article>
                </section>
            </main>
            <?php
        }

        function formConnexion(){
            ?>
            <main class="inscription mot-de-passe connexion">
                <section>
                    <article>
                        <div class="image-slot login-image">
                            <div class="svg-co">
                                <svg width="84" height="81" viewBox="0 0 84 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M52.4821 52.0349C52.471 55.3921 52.18 58.7421 51.6125 62.0475C50.8735 66.41 50.1952 70.6015 48.3866 74.7254C47.2823 77.2376 45.4346 80.38 42.4087 80.38C40.6697 80.38 39.2697 78.9754 38.2828 77.6292C36.0221 74.5453 34.9308 71.1012 33.67 67.4905C32.3563 63.9435 31.3623 60.2782 30.7006 56.5415C30.4182 54.7553 30.2728 52.9489 30.2659 51.139C30.2659 49.3381 30.6354 47.6183 30.9354 45.8535C31.0299 45.221 31.1635 44.5955 31.3354 43.9807C32.3397 40.5951 35.2482 38.2225 38.3872 37.1015C41.0803 36.1441 44.0283 36.3171 46.5998 37.5832C48.3705 38.4892 49.8424 39.9179 50.83 41.6891C52.0603 43.8096 52.2212 45.6284 52.369 48.055C52.4531 49.3847 52.4908 50.7113 52.4821 52.0349Z" fill="#fff"></path>
                                    <path d="M42.4296 29.785C42.1978 29.785 41.963 29.767 41.7253 29.7309C36.7821 29.1322 32.1606 24.9858 31.8693 19.6463C31.465 12.596 39.195 6.22107 45.7121 9.19244C46.3081 9.48144 46.8698 9.841 47.3859 10.2639C50.9509 13.1048 53.7986 17.9175 52.2422 22.5636C50.7814 26.9216 46.8598 29.9786 42.4296 29.785Z" fill="#fff"></path>
                                    <path d="M83.2888 44.2278C83.3323 51.4581 80.8759 58.3958 77.8891 64.8113C76.6717 67.418 74.9501 72.4648 71.5807 72.4648C66.8984 72.4648 64.1246 63.0104 62.9464 59.5934C60.59 52.7142 57.9075 44.1197 60.2248 36.8984C61.8812 31.73 66.3114 28.511 71.5807 28.511C75.0588 28.511 77.4326 30.6495 79.8064 33.1526C81.6889 35.1381 82.6758 37.8888 83.0453 40.6441C83.2045 41.8316 83.2858 43.0289 83.2888 44.2278V44.2278Z" fill="#fff"></path>
                                    <path d="M71.5808 21.6585C70.7591 21.6585 69.9243 21.627 69.0722 21.5774C68.4395 21.5659 67.8121 21.4551 67.2114 21.2488C65.6246 20.6365 63.7986 18.7456 62.7856 17.3635C61.6094 15.7983 60.9196 13.9003 60.8074 11.9205C60.6118 7.67951 62.9812 4.52355 66.1941 2.31303C71.9373 -1.6308 80.9759 1.74126 81.6107 9.29576C81.9324 13.073 81.3802 16.5396 78.5674 19.2003C76.5501 21.1407 74.1415 21.627 71.5808 21.6585Z" fill="#fff"></path>
                                    <path d="M25.509 44.1556C25.2617 46.603 24.8359 49.0276 24.2351 51.4084C23.2054 56.0582 21.7119 60.5846 19.7789 64.9147C18.6528 67.3773 16.4921 72.3882 13.2575 72.3882C10.4837 72.3882 9.29681 69.7544 8.31426 67.5529L4.58402 59.1926C2.16672 53.5848 0.912241 47.5144 0.901611 41.3733C0.835298 39.7314 1.09116 38.0927 1.65374 36.5561C3.21888 32.7923 5.47963 30.0236 9.43594 28.9385C12.7923 28.0082 16.3663 28.4634 19.405 30.2081C23.2308 32.4862 25.4394 37.0468 25.5785 41.4949C25.6054 42.3824 25.5822 43.2708 25.509 44.1556V44.1556Z" fill="#fff"></path>
                                    <path d="M13.2617 22.0774C8.85763 22.0369 4.29266 19.007 3.38836 14.3609C3.21837 13.2565 3.17459 12.1353 3.25793 11.0203C3.34488 8.62971 3.47966 6.90541 4.8448 4.87948C5.90919 3.23336 7.44477 1.97384 9.23587 1.27781C12.3748 0.143283 17.4224 0.733056 19.9657 3.06964C21.1301 4.16567 22.0502 5.51101 22.6621 7.01225C23.274 8.51349 23.563 10.1346 23.509 11.7632C23.3438 17.1657 18.6354 22.0504 13.4139 22.0774H13.2617Z" fill="#fff"></path>
                                </svg>
                            </div>
                            <picture>
                                <source srcset="../media/connexion_mob.jpg" media="(max-width: 1023px)">
                                <img src="../media/connexion_desk.jpg" alt="visuel téléphone avec des légumes autour">
                            </picture>
                        </div>
                        <div class="signup">
                            <h1>Se connecter</h1>
                            <div class="fsignup">
                                <form action="<?= PATHBASE ?>/connexion/connexion" method="post">
                                    <div>
                                        <label for="email">Adresse-email</label>
                                        <input type="text" id="email" name="email" placeholder="Entrez votre adresse-email" required="">
                                    </div>
                                    <div>
                                        <label for="pwd">Mot de passe</label>
                                        <input type="password" id="pwd" name="mdp" placeholder="Entrez votre mot de passe" required="">
                                    </div>

                                    <p class="oubli">Avez-vous oublié votre mot de passe ?
                                        <a href="<?= PATHBASE ?>/connexion/mot-de-passe-oublie">Mot de passe oublié</a>
                                    </p>
                                    <div>
                                        <button class="registerbtn cta" type="submit">Se connecter</button>
                                    </div>
                                </form>
                                <div class="login-slot">
                                    <p>Pas de compte ?
                                        <a href="<?= PATHBASE ?>/connexion/inscription/1">Inscrivez-vous</a>
                                    </p>
                                </div>
                                <div class="login-Google">
                                    <a href="">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M43.611 20.083H42V20H24V28H35.303C33.654 32.657 29.223 36 24 36C17.373 36 12 30.627 12 24C12 17.373 17.373 12 24 12C27.059 12 29.842 13.154 31.961 15.039L37.618 9.382C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24C4 35.045 12.955 44 24 44C35.045 44 44 35.045 44 24C44 22.659 43.862 21.35 43.611 20.083Z" fill="#FFC107"></path>
                                            <path d="M6.30591 14.691L12.8769 19.51C14.6549 15.108 18.9609 12 23.9999 12C27.0589 12 29.8419 13.154 31.9609 15.039L37.6179 9.382C34.0459 6.053 29.2679 4 23.9999 4C16.3179 4 9.65591 8.337 6.30591 14.691Z" fill="#FF3D00"></path>
                                            <path d="M24.0001 44.0002C29.1661 44.0002 33.8601 42.0232 37.4091 38.8082L31.2191 33.5702C29.1436 35.1486 26.6075 36.0023 24.0001 36.0002C18.7981 36.0002 14.3811 32.6832 12.7171 28.0542L6.19507 33.0792C9.50507 39.5562 16.2271 44.0002 24.0001 44.0002Z" fill="#4CAF50"></path>
                                            <path d="M43.611 20.083H42V20H24V28H35.303C34.5142 30.2164 33.0934 32.1532 31.216 33.571L31.219 33.569L37.409 38.807C36.971 39.205 44 34 44 24C44 22.659 43.862 21.35 43.611 20.083Z" fill="#1976D2"></path>
                                        </svg>
                                        <p>
                                            Se connecter avec Google
                                        </p>
                                    </a>
                                </div>
                                <div>
                                    <?php
                                    if (isset($_SESSION['erreur'])) echo '<span>' . $_SESSION['erreur'] . '</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
            </main>
            <?php
        }

        function mDPOublie(){
            ?>
                <main class="inscription mot-de-passe">
                    <section>
                        <article>
                            <div class="image-slot">
                                <picture>
                                    <source srcset="../media/inscription/motdepasse_mob.jpg" media="(max-width: 1023px)">
                                    <img src="../media/inscription/motdepasse_desktop.jpg" alt="visuel téléphone avec des légumes autour" />
                                </picture>
                            </div>
                            <div class="signup">
                                <h1>Mot de passe oublié</h1>
                                <div class="fsignup">
                                    <form action="" method="post">
                                        <div>
                                            <label for="email">Adresse-email</label>
                                            <input type="text" id="email" name="email" placeholder="Entrez votre adresse-email" required>
                                        </div>
                                        <div>
                                            <button class="registerbtn cta" type="submit">Valider</button>
                                        </div>
                                        <div>
                                            <?php 
                                                if(isset($_SESSION['erreur'])) echo '<span>'.$_SESSION['erreur'].'</span>';
                                                unset($_SESSION['erreur']);
                                            ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </section>
                </main>
            <?php
        }

    }

?>