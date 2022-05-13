<?php

    class VueEspaceUtilisateur {

        function __construct(){
            ?><link rel="stylesheet" href="__DIR__/../styles/espace-utilisateur.css"><?php
        }

        function affichageProfil($utilisateur){
            ?>
            <main>
                <a class="deconnexion" href="<?=PATHBASE?>//connexion/deconnexion">Se déconnecter</a>
                <div class="informations">
                    <div class="information_image"> 
                        <img src="data/img_utilisateur/<?php 
                            if(isset($utilisateur[0]['image'])) echo $utilisateur[0]['image'];   
                            ?>">
                    </div>
                    <div class="informations_ecrite">
                        <p><?php echo $utilisateur[0]['prenom'].' '.$utilisateur[0]['nom'] ?></p>
                        <p><?php echo $utilisateur[0]['email'] ?></p>
                        <p>Silver</p>
                    </div>
                </div>

                <div class="suivi_perso">
                    <a href="<?=PATHBASE?>/espace-utilisateur/suivi">Mon suivi personnel</a>
                </div>
                
                <div class="plus_information">
                    <a href="<?=PATHBASE?>/espace-utilisateur/modification-information">
                          <div>
                            <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.8323 13.4135C34.0898 10.357 31.7521 7.63686 29.124 5.31157C25.8569 2.21118 21.3412 0.32463 16.8254 1.11435C12.905 1.59696 8.86839 2.66454 5.9208 5.44319C2.17461 8.96768 -0.642292 15.0076 0.330556 20.2139C0.83876 24.7182 5.10768 26.9119 9.26043 26.6487C9.34755 26.6487 9.44919 26.6487 9.53631 26.6487C9.31851 27.3214 9.36207 28.1111 9.28947 28.7838C9.21687 30.8312 9.24591 32.8933 9.24591 34.9407C9.10071 36.7688 10.3785 37.7925 12.0483 38.0557C13.4422 38.2751 14.8797 38.202 16.2882 38.202C19.0615 38.1435 22.2995 38.2312 24.3759 36.0668C26.4377 33.8878 26.1909 30.6411 26.4523 27.8479C26.4668 27.6724 26.4668 27.4822 26.4377 27.2921C30.5469 27.4969 35.3095 26.3708 36.9939 22.1736C37.9522 19.3072 37.1681 16.0459 35.8323 13.4135Z" fill="#F3BD47"/>
                            </svg>
                            <p>Modifier mes informations</p>
                        </div>
                    </a>
                    <a href="">
                        <div>
                            <svg width="51" height="50" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="51" height="50" rx="8" fill="#9FB990"/>
                            </svg>
                            <p>Mes recettes postées</p>
                        </div>
                    </a>
                    <a href="">
                        <div>
                            <svg width="37" height="35" viewBox="0 0 37 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.6816 7.4381C35.1935 6.10204 34.4753 4.8517 33.5479 3.77285C31.1282 0.95067 27.4674 0.264774 24.0576 1.3865C22.3841 1.93665 20.8221 2.86546 19.4763 4.02291C18.3676 4.98031 18.1654 4.62307 17.0288 3.78714C16.0595 3.07981 15.0624 2.40105 14.0304 1.79375C13.5771 1.52939 13.1169 1.27218 12.6358 1.08642C12.587 1.06499 12.5381 1.0507 12.4893 1.02926C8.80758 -0.313951 4.30999 1.67943 2.21808 4.88743C0.223797 7.93824 -0.1388 11.9607 0.886234 15.4331C3.34771 23.771 11.2691 28.0579 17.231 33.4879C17.6494 33.8665 18.4373 35.0454 19.037 34.5453C20.9825 32.8877 23.0604 31.5231 25.0477 29.9226C27.2373 28.165 29.1339 26.1002 31.0166 24.0139C33.3805 21.3989 34.8797 18.5553 35.9257 15.1759C36.7136 12.6538 36.5881 9.8959 35.6816 7.4381Z" fill="#BD5338"/>
                            </svg>
                            <p>Mes recettes favorites</p>
                        </div>
                    </a>
                </div>

            </main>
            <?php
        }

    }

?>