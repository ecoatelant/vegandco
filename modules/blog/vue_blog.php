<?php


class VueBlog {

    public function __construct(){}

    public function afficherBlog($blogs){
        ?>
        <main class="">
            <div class='actualite-accueil'>
                <h1>Blog</h1>
            
                <div class="view_recipes">
                    <?php foreach($blogs as &$blog){?>
                        <div class="view_one_recipe">
                        <img src="<?=PATHBASE?>/data/img_actualite/<?php echo $blog['image'] ?>">
                            <h2><?= $blog['titre']?></h2>
                            <a href="<?=PATHBASE?>/blog/affichage/<?=$blog['id']?>">Voir l'actualité</a>
                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.017 3.00929C15.7958 2.42093 15.4704 1.87033 15.0502 1.39524C13.954 0.152445 12.2953 -0.1496 10.7504 0.34437C9.99217 0.586635 9.28448 0.995655 8.67473 1.50536C8.1724 1.92696 8.08078 1.76965 7.56581 1.40153C7.12667 1.09004 6.67488 0.791145 6.2073 0.523709C6.00195 0.407296 5.79343 0.294029 5.57544 0.212225C5.55332 0.202786 5.53121 0.196493 5.50909 0.187054C3.84097 -0.404451 1.80321 0.473368 0.855412 1.88606C-0.0481538 3.22953 -0.212438 5.0009 0.251982 6.53001C1.36722 10.2017 4.95621 12.0895 7.65743 14.4807C7.84699 14.6475 8.20399 15.1666 8.4757 14.9464C9.35715 14.2164 10.2986 13.6155 11.199 12.9107C12.1911 12.1367 13.0504 11.2274 13.9034 10.3087C14.9744 9.15717 15.6537 7.90494 16.1276 6.41674C16.4846 5.30609 16.4277 4.09162 16.017 3.00929Z" fill="#BD5338"/>
                            </svg>
                        </div>
                    <?php }?>
                </div>
            </div>
        </main>
        <?php unset($blogs);
    }


    public function afficherBlog($blogs){
        foreach ($blogs as &$blog) {
            ?>
            <main class="actualite blog">
                <h1>Blog</h1>
                <section>
                    <article class="debut-actualite">
                        <div class="img-actualite">
                            <img src="<?=PATHBASE?>/data/img_blog/<?php echo $blog['image'] ?>" alt="image de blog">
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
        } unset($actualites);

    }

}

?>
