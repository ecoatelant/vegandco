<?php


class VueRecette {

    public function __construct(){}

    public function afficherRecettes($recettes, $categories){
        ?>
        <main>
            <div class='recette_emilie'>
                <h1>Recettes</h1>
                <input type="search">
                <select>
                    <option value="">Catégorie</option>
                    <?php 
                    foreach($categories as &$categorie){
                        ?>
                            <option value="<?=$categorie['id']?>"><?=$categorie['nom']?></option>
                        <?php } ?>
                </select>
                <a href="<?=PATHBASE?>/recette/nouvelle">Ajouter une recette</a>
            
            
                <div class="view_recipes">
                    <?php foreach($recettes as &$recette){?>
                        <div class="view_one_recipe">
                        <img src="./data/img_recette/<?php echo $recette['image'] ?>">
                            <h2><?= $recette['titre']?></h2>
                            <a href="<?=PATHBASE?>/recette/affichage/<?=$recette['id']?>">Voir la recette</a>
                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.017 3.00929C15.7958 2.42093 15.4704 1.87033 15.0502 1.39524C13.954 0.152445 12.2953 -0.1496 10.7504 0.34437C9.99217 0.586635 9.28448 0.995655 8.67473 1.50536C8.1724 1.92696 8.08078 1.76965 7.56581 1.40153C7.12667 1.09004 6.67488 0.791145 6.2073 0.523709C6.00195 0.407296 5.79343 0.294029 5.57544 0.212225C5.55332 0.202786 5.53121 0.196493 5.50909 0.187054C3.84097 -0.404451 1.80321 0.473368 0.855412 1.88606C-0.0481538 3.22953 -0.212438 5.0009 0.251982 6.53001C1.36722 10.2017 4.95621 12.0895 7.65743 14.4807C7.84699 14.6475 8.20399 15.1666 8.4757 14.9464C9.35715 14.2164 10.2986 13.6155 11.199 12.9107C12.1911 12.1367 13.0504 11.2274 13.9034 10.3087C14.9744 9.15717 15.6537 7.90494 16.1276 6.41674C16.4846 5.30609 16.4277 4.09162 16.017 3.00929Z" fill="#BD5338"/>
                            </svg>
                        </div>
                    <?php }?>
                </div>
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
        <main class="recette">
            <section>
                <article>
                    <div class="nouvelle-recette">
                        <h1>Recettes</h1>
                        <h2>Ajouter une recette</h2>
                        <div class="formulaire-creation-recette">
                            <form action="<?=PATHBASE?>/recette/ajoutNouvelle" method="post">
                                <div class="selection-image">
                                    <label for="image-recette" class="label-image-recette">
                                        <div>
                                            <svg width="125" height="124" viewBox="0 0 125 124" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="125" height="124" fill="url(#pattern0)"/>
                                                <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_929_6053" transform="translate(0 -0.00403226) scale(0.015625)"/>
                                                </pattern>
                                                <image id="image0_929_6053" width="64" height="64" xlink:href="data:image/png;base64,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"/>
                                                </defs>
                                            </svg>
                                        </div>
                                        <div>
                                            <p>Ajouter une photo</p>
                                        </div>
                                    </label>
                                    <input type="file" name="img-recette" id="image-recette" class="image-recette" accept="image/*">
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
                        </div>
                    </div>
                </article>
            </section>

            
        </main>
        <?php
    }

}

?>
