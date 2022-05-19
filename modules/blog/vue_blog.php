<?php


class VueBlog
{

    public function __construct()
    {
    }

    public function afficherBlogs($blogs)
    {
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
                        <a href="<?= PATHBASE ?>/blog/affichage/<?= $blog['id'] ?>" class="recette-container">
                            <div class="img-recette">
                                <div class="overlay"></div>
                                <img src="<?= PATHBASE ?>/data/img_actualite/<?php echo $blog['image'] ?>" alt="image de blog récente">
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

    public function afficherBlog($blogs)
    {
        foreach ($blogs as &$blog) {
        ?>
            <main class="actualite blog">
                <h1>Blog</h1>
                <section>
                    <article class="debut-actualite">
                        <div class="img-actualite">
                            <img src="<?= PATHBASE ?>/data/img_blog/<?php echo $blog['image'] ?>" alt="image de blog">
                            <div class="overlay">

                            </div>
                        </div>
                        <div class="pres-actualite">
                            <h2><?php echo $blog['titre'] ?></h2>
                            <div class="date-auteur">
                                <p>Posté le <strong><?php echo $blog['date'] ?></strong></p>
                                <p>Écrit par <strong><?php echo $blog['auteur'] ?></strong></p>
                            </div>
                        </div>
                    </article>
                    <article class="milieu-actualite">
                        <div class="texte-actualite">
                            <p class="corps-actualite">
                                <?php echo $blog['contenu'] ?>
                            </p>
                            <div class="partage">
                                <svg width="23" height="25" viewBox="0 0 23 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.1667 17.6707C18.1956 17.6707 17.3267 18.0472 16.6622 18.637L7.55167 13.4287C7.61556 13.1401 7.66667 12.8514 7.66667 12.5502C7.66667 12.249 7.61556 11.9603 7.55167 11.6717L16.56 6.51355C17.25 7.14106 18.1572 7.53012 19.1667 7.53012C21.2878 7.53012 23 5.84839 23 3.76506C23 1.68173 21.2878 0 19.1667 0C17.0456 0 15.3333 1.68173 15.3333 3.76506C15.3333 4.06626 15.3844 4.35492 15.4483 4.64357L6.44 9.80171C5.75 9.1742 4.84278 8.78514 3.83333 8.78514C1.71222 8.78514 0 10.4669 0 12.5502C0 14.6335 1.71222 16.3153 3.83333 16.3153C4.84278 16.3153 5.75 15.9262 6.44 15.2987L15.5378 20.5196C15.4739 20.7831 15.4356 21.0592 15.4356 21.3353C15.4356 23.3559 17.1094 25 19.1667 25C21.2239 25 22.8978 23.3559 22.8978 21.3353C22.8978 19.3148 21.2239 17.6707 19.1667 17.6707Z" fill="#2E5E4E"></path>
                                </svg>
                                <p><strong>Partagez !</strong></p>
                            </div>
                        </div>
                        <div class="ad hide-mobile">
                            <p>Publicité</p>
                        </div>
                    </article>
                </section>
                <div class="separation"></div>
                <section class="les-suggestions">
                    <h2>Vous pourriez aussi aimer</h2>
                    <div class="suggestion-container">
                        <a class="suggestion" href="http://" rel="noopener noreferrer">
                            <article class="small-suggestion">
                                <img src="https://images.unsplash.com/photo-1596346599094-4dfa5c61fd0d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8dGlrdG9rfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60" alt="">
                                <h4>
                                    Lancement de notre compte Tiktok !
                                </h4>
                            </article>
                        </a>
                        <a class="suggestion" href="http://" rel="noopener noreferrer">
                            <article class="small-suggestion">
                                <img src="https://images.unsplash.com/photo-1503485838016-53579610c389?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8c3RyYXdiZXJyeSUyMHBpZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60" alt="">
                                <h4>
                                    Aimez-vous les tartes aux fraises ? :)
                                </h4>
                            </article>
                        </a>
                        <a class="suggestion" href="http://" rel="noopener noreferrer">
                            <article class="small-suggestion">
                                <img src="https://images.unsplash.com/photo-1605522508768-f8697d6e8e24?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGNvb2tpbmd8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60" alt="">
                                <h4>
                                    On a testé et goûté vos recettes !
                                </h4>
                            </article>
                        </a>
                    </div>
                </section>
            </main>
<?php
        }
        unset($actualites);
    }
}

?>