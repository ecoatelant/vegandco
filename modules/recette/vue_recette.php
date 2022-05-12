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
            <main class="recettes">
                <section class="pres-recette">
                    <article class="pres-slot">
                        <h1><?= $recette['titre']?></h1>
                    <div class="img-recette">
                        <img src="../../data/img_recette/<?php echo $recette['image'] ?>">
                    </div>
                    <div class="svg-avis">
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.09789 1.8541C8.69659 0.011477 11.3034 0.0114784 11.9021 1.8541L12.6942 4.2918C12.9619 5.11584 13.7298 5.67376 14.5963 5.67376H17.1594C19.0969 5.67376 19.9024 8.15299 18.335 9.29179L16.2614 10.7984C15.5604 11.3077 15.2671 12.2104 15.5348 13.0344L16.3269 15.4721C16.9256 17.3148 14.8166 18.847 13.2492 17.7082L11.1756 16.2016C10.4746 15.6923 9.5254 15.6923 8.82443 16.2016L6.7508 17.7082C5.18337 18.847 3.07441 17.3148 3.67312 15.4721L4.46517 13.0344C4.73292 12.2104 4.43961 11.3077 3.73863 10.7984L1.665 9.29179C0.0975747 8.15299 0.903127 5.67376 2.84057 5.67376H5.40372C6.27017 5.67376 7.03808 5.11584 7.30583 4.2918L8.09789 1.8541Z" fill="black"></path>
                        </svg>
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.09789 1.8541C8.69659 0.011477 11.3034 0.0114784 11.9021 1.8541L12.6942 4.2918C12.9619 5.11584 13.7298 5.67376 14.5963 5.67376H17.1594C19.0969 5.67376 19.9024 8.15299 18.335 9.29179L16.2614 10.7984C15.5604 11.3077 15.2671 12.2104 15.5348 13.0344L16.3269 15.4721C16.9256 17.3148 14.8166 18.847 13.2492 17.7082L11.1756 16.2016C10.4746 15.6923 9.5254 15.6923 8.82443 16.2016L6.7508 17.7082C5.18337 18.847 3.07441 17.3148 3.67312 15.4721L4.46517 13.0344C4.73292 12.2104 4.43961 11.3077 3.73863 10.7984L1.665 9.29179C0.0975747 8.15299 0.903127 5.67376 2.84057 5.67376H5.40372C6.27017 5.67376 7.03808 5.11584 7.30583 4.2918L8.09789 1.8541Z" fill="black"></path>
                        </svg>
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.09789 1.8541C8.69659 0.011477 11.3034 0.0114784 11.9021 1.8541L12.6942 4.2918C12.9619 5.11584 13.7298 5.67376 14.5963 5.67376H17.1594C19.0969 5.67376 19.9024 8.15299 18.335 9.29179L16.2614 10.7984C15.5604 11.3077 15.2671 12.2104 15.5348 13.0344L16.3269 15.4721C16.9256 17.3148 14.8166 18.847 13.2492 17.7082L11.1756 16.2016C10.4746 15.6923 9.5254 15.6923 8.82443 16.2016L6.7508 17.7082C5.18337 18.847 3.07441 17.3148 3.67312 15.4721L4.46517 13.0344C4.73292 12.2104 4.43961 11.3077 3.73863 10.7984L1.665 9.29179C0.0975747 8.15299 0.903127 5.67376 2.84057 5.67376H5.40372C6.27017 5.67376 7.03808 5.11584 7.30583 4.2918L8.09789 1.8541Z" fill="black"></path>
                        </svg>
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.09789 1.8541C8.69659 0.011477 11.3034 0.0114784 11.9021 1.8541L12.6942 4.2918C12.9619 5.11584 13.7298 5.67376 14.5963 5.67376H17.1594C19.0969 5.67376 19.9024 8.15299 18.335 9.29179L16.2614 10.7984C15.5604 11.3077 15.2671 12.2104 15.5348 13.0344L16.3269 15.4721C16.9256 17.3148 14.8166 18.847 13.2492 17.7082L11.1756 16.2016C10.4746 15.6923 9.5254 15.6923 8.82443 16.2016L6.7508 17.7082C5.18337 18.847 3.07441 17.3148 3.67312 15.4721L4.46517 13.0344C4.73292 12.2104 4.43961 11.3077 3.73863 10.7984L1.665 9.29179C0.0975747 8.15299 0.903127 5.67376 2.84057 5.67376H5.40372C6.27017 5.67376 7.03808 5.11584 7.30583 4.2918L8.09789 1.8541Z" fill="black"></path>
                        </svg>
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.09789 1.8541C8.69659 0.011477 11.3034 0.0114784 11.9021 1.8541L12.6942 4.2918C12.9619 5.11584 13.7298 5.67376 14.5963 5.67376H17.1594C19.0969 5.67376 19.9024 8.15299 18.335 9.29179L16.2614 10.7984C15.5604 11.3077 15.2671 12.2104 15.5348 13.0344L16.3269 15.4721C16.9256 17.3148 14.8166 18.847 13.2492 17.7082L11.1756 16.2016C10.4746 15.6923 9.5254 15.6923 8.82443 16.2016L6.7508 17.7082C5.18337 18.847 3.07441 17.3148 3.67312 15.4721L4.46517 13.0344C4.73292 12.2104 4.43961 11.3077 3.73863 10.7984L1.665 9.29179C0.0975747 8.15299 0.903127 5.67376 2.84057 5.67376H5.40372C6.27017 5.67376 7.03808 5.11584 7.30583 4.2918L8.09789 1.8541Z" fill="black"></path>
                        </svg>
                    </div>
                    </article>
                    <article class="pre-preparation-slot">
                        <div class="temps">
                            <p><strong>Temps : </strong><?= $recette['temps'] ?></p>
                            <p><?= $recette['preparation'] ?> de préparation</p>
                            <p><?= $recette['cuisson'] ?> de cuisson</p>
                        </div>
                        <div class="categ-facili">
                            <!-- MODIFICATION -->
                            <p><strong>Auteur : </strong> <?= $recette['auteur'] ?></p>
                            <p><strong>Catégorie : </strong> <?= $recette['categorie'] ?></p>
                            <p><strong>Facilité : </strong><?= $recette['difficulte'] ?></p>
                        </div>
                    </article>
                </section>
                    
                <section class="slot-ingredients">
                    <h2>Ingrédients</h2>
                    <strong>La pâte</strong>
                    <p>180 g farine de blé</p>
                    <p>50 g poudre d’amande</p>
                    <p>2 cuillères à soupe d'huile de tournesol</p>
                    <p>20 g sucre vanillé</p>
                    <strong>La crème</strong>
                    <p>25 cl lait de riz</p>
                    <p>2 gousses vanillé</p>
                    <p>20 g sucre vanillé</p>
                    <p>2 jaunes oeuf</p>
                    <p>20 g sucre de canne complet</p>
                    <p>180 g farine de blé</p>
                    <p>50 g poudre d’amande</p>
                    <p>2 càs huile de tournesol</p>
                    <p>20 g sucre vanillé</p>
                    <p>1 oeuf</p>
                    <strong>La garniture</strong>
                    <p>500 g de fraises</p>
                </section>
                <section class="slot-preparation">
                    <h2>Préparation</h2>
                    <div class="slot-etape">
                        <h3>Etape 1 :</h3>
                        <p>
                            Mélanger la farine et la poudre d’amande dans un saladier avec le sucre. Faire un puit et
                            ajouter l’huile et l'œuf. Ajouter un peu d’eau jusqu’à pouvoir former une boule de pâte.
                            Laisser reposer au réfrigérateur pendant une heure (recouvrir d’un papier film). L’étaler sur du
                            papier cuisson et le disposer dans le moule à tarte. Piquer la pâte à l’aide d’une fourchette et
                            faire précuire 10 minutes.
                        </p>
                    </div>
                    <div class="slot-etape">
                        <h3>Etape 2 :</h3>
                        <p>
                            Porter le lait à ébullition avec les gousses de vanille fendues et grattées. Fouetter les jaunes
                            avec les sucres puis ajouter la fécule (maïzena). Incorporer le lait bouillant en continuant à
                            fouetter puis remettre sur le feu pendant une minute tout en continuant à remuer. La crème va
                            épaissir. Sortir du feu et laisser refroidir.
                        </p>
                    </div>
                    <div class="slot-etape">
                        <h3>Etape 3 :</h3>
                        <p>
                            Verser la crème refroidie sur la pâte légèrement précuite. Disposer les fraises.
                            Laisser reposer 1h au réfrigérateur avant de déguster.
                        </p>
                    </div>

                    <!-- pas dans la base de donnée-->
                    <div class="slot-etape">
                        <h3>Vous avez aimé cette recette ? Dites-le nous en commentaire ? :) </h3>
                    </div>
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
