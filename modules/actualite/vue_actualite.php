<?php


class VueActualite {

    public function __construct(){}

    public function afficherActualite($actualite){
        ?>
        <main class="actualite">
            <h1>Actualités</h1>
            <section>
                <article class="debut-actualite">
                    <div class="img-actualite">
                        <img src="<?php echo PATHBASE.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'img_actualite'.DIRECTORY_SEPARATOR.$actualite[0]['image'];?>">
                        <div class="overlay">

                        </div>
                    </div>
                    <div class="pres-actualite">
                        <h2><?=$actualite[0]['titre']?></h2>
                        <div class="date-auteur">
                            <p>Posté le <strong><?=$actualite[0]['date']?></strong></p>
                            <p>Écrit par <strong><?=$actualite[0]['auteur']?></strong></p>
                        </div>
                    </div>
                </article>
                <?php require 'includes'.DIRECTORY_SEPARATOR.'actualite'.DIRECTORY_SEPARATOR.$actualite[0]['chemin'];?>
            </section>
        </main>
        <?php unset($actualites);
    }


    public function afficherActualites($actualites){
        ?>
        <main class="">
            <div class='actualite-accueil'>
                <h1>Actualités</h1>
            
                <div class="view_recipes">
                    <?php foreach($actualites as &$actualite){?>
                        <div class="view_one_recipe">
                        <img src="<?=PATHBASE?>/data/img_actualite/<?php echo $actualite['image'] ?>">
                            <h2><?= $actualite['titre']?></h2>
                            <a href="<?=PATHBASE?>/actualite/affichage/<?=$actualite['id']?>">Voir l'actualité</a>
                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.017 3.00929C15.7958 2.42093 15.4704 1.87033 15.0502 1.39524C13.954 0.152445 12.2953 -0.1496 10.7504 0.34437C9.99217 0.586635 9.28448 0.995655 8.67473 1.50536C8.1724 1.92696 8.08078 1.76965 7.56581 1.40153C7.12667 1.09004 6.67488 0.791145 6.2073 0.523709C6.00195 0.407296 5.79343 0.294029 5.57544 0.212225C5.55332 0.202786 5.53121 0.196493 5.50909 0.187054C3.84097 -0.404451 1.80321 0.473368 0.855412 1.88606C-0.0481538 3.22953 -0.212438 5.0009 0.251982 6.53001C1.36722 10.2017 4.95621 12.0895 7.65743 14.4807C7.84699 14.6475 8.20399 15.1666 8.4757 14.9464C9.35715 14.2164 10.2986 13.6155 11.199 12.9107C12.1911 12.1367 13.0504 11.2274 13.9034 10.3087C14.9744 9.15717 15.6537 7.90494 16.1276 6.41674C16.4846 5.30609 16.4277 4.09162 16.017 3.00929Z" fill="#BD5338"/>
                            </svg>
                        </div>
                    <?php }?>
                </div>
            </div>
        </main>
        <?php unset($actualites);
    }

}

?>
