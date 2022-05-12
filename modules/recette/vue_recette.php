<?php


class VueRecette {

    public function __construct(){
        ?>
        <head>
            <link rel="stylesheet" href="styles/recettes.css">
        </head>
        <?php
    }

    public function afficherRecettes($recettes){
        ?>
        <main>
            <h1>Recettes</h1>
            <input type="search">
            <select>
                <option value="categorie">Catégorie</option>
                <option value="entree">Entrée</option>
                <option value="plat">Plat</option>
                <option value="dessert">Dessert</option>
            </select>
            <a href="recette/nouvelle">Ajouter une recette</a>
        
        
            <div class="view_recipes">
                <?php foreach($recettes as &$recette){?>
                    <div class="view_one_recipe">
                    <img src="./data/img_recette/<?php echo $recette['image'] ?>">
                        <h2><?= $recette['titre']?></h2>
                        <a href="recette/affichage/<?=$recette['id']?>">Voir la recette</a>
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.017 3.00929C15.7958 2.42093 15.4704 1.87033 15.0502 1.39524C13.954 0.152445 12.2953 -0.1496 10.7504 0.34437C9.99217 0.586635 9.28448 0.995655 8.67473 1.50536C8.1724 1.92696 8.08078 1.76965 7.56581 1.40153C7.12667 1.09004 6.67488 0.791145 6.2073 0.523709C6.00195 0.407296 5.79343 0.294029 5.57544 0.212225C5.55332 0.202786 5.53121 0.196493 5.50909 0.187054C3.84097 -0.404451 1.80321 0.473368 0.855412 1.88606C-0.0481538 3.22953 -0.212438 5.0009 0.251982 6.53001C1.36722 10.2017 4.95621 12.0895 7.65743 14.4807C7.84699 14.6475 8.20399 15.1666 8.4757 14.9464C9.35715 14.2164 10.2986 13.6155 11.199 12.9107C12.1911 12.1367 13.0504 11.2274 13.9034 10.3087C14.9744 9.15717 15.6537 7.90494 16.1276 6.41674C16.4846 5.30609 16.4277 4.09162 16.017 3.00929Z" fill="#BD5338"/>
                        </svg>
                    </div>
                <?php }?>
            </div>
        </main>
        <?php unset($recettes);
    }


    public function afficherRecette($recette){
        foreach ($recette as &$recette) {
            ?>

        <head>
            <link rel="stylesheet" href="../../styles/recettes.css">
        </head>
            <main class="recettes">
                <section class="pres-recette">
                    <article class="pres-slot">
                        <h1><?= $recette['titre']?></h1>
                        <div class="img-recette">
                            <img src="../../data/img_recette/<?php echo $recette['image'] ?>">
                        </div>
                        <!-- TODO : avis -->
                    </article>
                    <article class="pre-preparation-slot">
                        <div class="temps">
                            <h5 class=""><?= $recette['titre'] ?></h5>
                        </div>
                                    <div class=""> Temps - <?= $recette['temps'] ?></div>
                                    <div class="">
                                    </div>
                    </article>
                </section>
            </main>
        <?php
        } unset($recettes);

    }

    public function nouvelleRecette() {
        ?>

<head>
            <link rel="stylesheet" href="../styles/recettes.css">
        </head>
        <main>
            <h1>Recettes</h1>
            <h2>Ajouter une recette</h2>
            <form action="recette/ajoutNouvelle" method="post">
                <div class="image">
                    <input type="file" name="img" accept="image/png, image/jpeg">
                </div>
                <div class="premier_ligne">
                    <input type="text" name="titre" placeholder="Titre de la recette">
                </div>
                <div class="deuxieme_ligne">
                    <input type="time" name="tmpsPreparation" placeholder="Temps de préparation">
                    <input type="time" name="tmpsCuisson" placeholder="Temps de cuisson">
                    <select name="difficulte">
                        <option value="facilite">Facilité</option>
                        <option value="1">Facile</option>
                        <option value="2">Intermédiaire</option>
                        <option value="3">Difficile</option>
                    </select>
                </div>
                <div class="enregistrer">
                    <input type="submit" value="Enregistrer">
                </div>
                    
                </form>
        </main>
        <?php
    }

}

?>
