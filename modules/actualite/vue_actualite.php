<?php


class VueActualite{

    public function afficherActualites($actualites){
        ?>
        <main class="recettes afficheRecettes blog">
            <div class="actualites-wrapper">
                <section>
                    <div class="debut">
                        <h1>Actualités</h1>
                        <!-- affichage de la catégorie choisie sur le h3 -->
                        <h2>Toutes les actualités</h2>
                        <div class="recherche">
                            <input type="search" id="recette-search" name="recette" placeholder="Rechercher..">
                        </div>
                        <div class="categ-ajout">
                            <div class="select">
                                <select>
                                    <option value="">Catégorie</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="hp-recettes">
                    <div class="recette-wrapper">
                        <?php foreach ($actualites as &$actualite) { ?>
                            <a href="<?= PATHBASE ?>/actualite/affichage/<?= $actualite['id'] ?>" class="recette-container">
                                <div class="img-recette">
                                    <div class="overlay"></div>
                                    <img src="<?= PATHBASE ?>/data/img_actualite/<?php echo $actualite['image'] ?>" alt="image d'actualité récente">
                                </div>
                                <h3>Une rencontre ?</h3>
                            </a>

                        <?php } ?>

                        <!-- NE PAS ENLEVER -->
                        <a class="recette-container">
                            <div class="img-recette">
                                <div class="overlay"></div>
                            </div>
                        </a>
                    </div>
                </section>
            </div>

        </main>
        <?php unset($actualites);
    }

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
    
}

?>
