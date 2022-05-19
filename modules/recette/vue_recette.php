<?php


class VueRecette
{

    public function __construct()
    {
    }

    public function afficherRecettes($recettes, $categories)
    {
?>
        <main class="afficheRecettes">
            <section>
                <div class="debut">
                    <h1>Recettes</h1>
                    <div class="recherche">
                        <input type="search" id="recette-search" name="recette" placeholder="Rechercher...">
                    </div>
                    <div class="categ-ajout">
                        <div class="select">
                            <select>
                                <option value="">Catégorie</option>
                                <?php
                                foreach ($categories as &$categorie) {
                                ?>
                                    <option value="<?=$categorie['id']?>"><?=$categorie['nom']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <a href="<?= PATHBASE ?>/recette/nouvelle">Ajouter une recette</a>
                    </div>
                </div>
                <div class="toutes-recettes">
                    <?php foreach ($recettes as &$recette) { ?>
                        <article class="une-recette" href="">
                            <a href="<?php echo PATHBASE.DIRECTORY_SEPARATOR.'recette'.DIRECTORY_SEPARATOR.'affichage'.DIRECTORY_SEPARATOR.$recette['id']?>" class="une-recette-link">
                                <div class="img-afficherRecette">
                                    <img src="<?php echo PATHBASE.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'img_recette'.DIRECTORY_SEPARATOR.$recette['image'] ?>">
                                </div>
                                <div class="overlay">
                                    <h4><?= $recette['titre'] ?></h4>
                                </div>
                                <div class="svg-coeur">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 480 480" preserveAspectRatio="xMidYMid meet">
                                        <g id="layer101" fill="#ff3d00" stroke="none">
                                            <path d="M185 357 c-122 -103 -135 -120 -135 -171 0 -39 5 -53 29 -77 24 -23 38 -29 73 -29 24 0 54 7 66 16 20 14 24 14 44 0 12 -9 42 -16 66 -16 35 0 49 6 73 29 24 24 29 38 29 77 0 42 -4 51 -43 88 -46 44 -144 126 -149 125 -2 0 -25 -19 -53 -42z" />
                                        </g>
                                    </svg>
                                </div>
                            </a>
                        </article>

                    <?php } ?>

                    <!-- NE PAS ENLEVER -->
                    <article class="une-recette derniere-recette" href="">
                        <a href="" class="une-recette-link">
                            <div class="img-recette">
                                <img src="../media/recettes/r_tarte_aux_fraises.jpg">
                            </div>
                            <div class="overlay">
                            </div>
                            <div class="svg-coeur">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 480 480" preserveAspectRatio="xMidYMid meet">
                                    <g id="layer101" fill="#ff3d00" stroke="none">
                                        <path d="M185 357 c-122 -103 -135 -120 -135 -171 0 -39 5 -53 29 -77 24 -23 38 -29 73 -29 24 0 54 7 66 16 20 14 24 14 44 0 12 -9 42 -16 66 -16 35 0 49 6 73 29 24 24 29 38 29 77 0 42 -4 51 -43 88 -46 44 -144 126 -149 125 -2 0 -25 -19 -53 -42z" />
                                    </g>
                                </svg>
                            </div>
                        </a>
                    </article>
                </div>
            </section>
        </main>

        <?php unset($recettes);
    }


    public function afficherRecette($recette)
    {
        foreach ($recette as &$recette) {
        ?>
            <main class="recettes">
                <section class="pres-recette">
                    <article class="pres-slot">
                        <h1><?= $recette['titre'] ?></h1>
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
        }
        unset($recettes);
    }

    public function nouvelleRecette()
    {
        ?>
        <main class="ajoutRecette">
        <section>
            <article>
                <div class="nouvelle-recette">
                    <h1>Recettes</h1>
                    <h2>Ajouter une recette</h2>
                    <div class="formulaire-creation-recette">
                        <form action="<?= PATHBASE ?>/recette/ajoutNouvelle" method="post">
                            <div class="selection-image">
                                <label for="image-recette" class="label-image-recette">
                                    <div class="recette-svg">
                                        <svg width="75" height="75" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9998 15.1998C13.7671 15.1998 15.1998 13.7671 15.1998 11.9998C15.1998 10.2325 13.7671 8.7998 11.9998 8.7998C10.2325 8.7998 8.7998 10.2325 8.7998 11.9998C8.7998 13.7671 10.2325 15.1998 11.9998 15.1998Z"
                                                fill="#E3B759" />
                                            <path
                                                d="M9 2L7.17 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4H16.83L15 2H9ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17Z"
                                                fill="#E3B759" />
                                        </svg>
                                    </div>
                                </label>
                                <input type="file" name="img-recette" id="image-recette" class="image-recette"
                                    accept="image/*">
                            </div>
                            <div class="description-recette">
                                <div class="titre-temps">
                                    <label for="titre">Titre de la recette</label>
                                    <input type="text" name="titre" placeholder="Entrez le titre de la recette">
                                    <div class="tmps">
                                        <div>
                                            <label for="tmpsPreparation">Temps de préparation</label>
                                            <input type="time" name="tmpsPreparation" placeholder="Temps de préparation">
                                        </div>
                                        <div>
                                            <label for="tmpsCuisson">Temps de cuisson</label>
                                            <input type="time" name="tmpsCuisson" placeholder="Temps de cuisson">
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="facilite-categ">
                                    <div class="select">
                                        <select name="difficulte">
                                            <option value="facilite">Facilité</option>
                                            <option value="1">Facile</option>
                                            <option value="2">Intermédiaire</option>
                                            <option value="3">Difficile</option>
                                        </select>
                                    </div>
                                    <div class="select">
                                        <select name="categ">
                                            <option value="categorie">Catégorie</option>
                                            <option value="1">Plats</option>
                                            <option value="2">Desserts</option>
                                            <option value="3">Snacks</option>
                                            <option value="4">Été</option>
                                            <option value="5">Automne</option>
                                            <option value="6">Hiver</option>
                                            <option value="7">Printemps</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ingredients">
                                    <label for="ingredients">Ingrédients</label>
                                    <input type="text" name="ingredients" id="ingredients"
                                        placeholder="Insérer vos ingrédients">
                                </div>
                                <div class="preparation">
                                    <label for="preparation">Préparation</label>
                                    <textarea name="preparation" id="preparation"
                                        placeholder="Premièrement, il faut mettre dans un saladier un peu d'amour et ..."></textarea>
                                </div>
                                <div class="enregistrer">
                                    <input class="cta" type="submit" value="Enregistrer">
                                </div>
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