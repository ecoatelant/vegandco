<?php

    class VueBlog{

        public function afficherBlogs($blogs){
            ?>
            <main class="recettes afficheRecettes blog">
                <div class="blog-wrapper">
                    <section>
                        <div class="debut">
                            <h1>Blog</h1>
                            <!-- affichage de la catégorie choisie sur le h3 -->
                            <h2>Tous les articles</h2>
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
                        <?php foreach ($blogs as &$blog) { ?>
                            <a href="<?php echo PATHBASE.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.'affichage'.DIRECTORY_SEPARATOR.$blog['id']; ?>" class="recette-container">
                                <div class="img-recette">
                                    <div class="overlay"></div>
                                    <img src="<?php echo PATHBASE.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'img_blog'.DIRECTORY_SEPARATOR.$blog['image']; ?>" alt="image de blog récente">
                                </div>
                                <h3><?= $blog['titre'] ?></h3>
                            </a>
                        <?php } ?>
                        </div>
                    </section>
                </div>
            </main>
            <?php unset($blogs);
        }

        public function afficherBlog($blog){
            ?>
                <main class="actualite blog">
                    <h1>Blog</h1>
                    <section>
                        <article class="debut-actualite">
                            <div class="img-actualite">
                                <img src="<?php echo PATHBASE.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'img_blog'.DIRECTORY_SEPARATOR.$blog[0]['image'];?>" alt="image de blog">
                                <div class="overlay">

                                </div>
                            </div>
                            <div class="pres-actualite">
                                <h2><?php echo $blog[0]['titre'] ?></h2>
                                <div class="date-auteur">
                                    <p>Posté le <strong><?php echo $blog[0]['date'] ?></strong></p>
                                    <p>Écrit par <strong><?php echo $blog[0]['auteur'] ?></strong></p>
                                </div>
                            </div>
                        </article>
                        <?php require 'includes'.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.$blog[0]['chemin'];?>
                    </section>
                </main>
            <?php
            unset($actualites);
        }
    }

?>