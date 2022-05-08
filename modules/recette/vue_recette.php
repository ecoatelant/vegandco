<?php


class VueRecette {

    public function __construct(){}

    public function afficherRecettes($recettes){
        foreach ($recettes as &$recette) {
            ?>
            <main class="recettes">
                <section class="pres-recette">
                    <article class="pres-slot">
                        <h1><?= $recette['titre']?></h1>
                        <div class="img-recette">
                            <img src="<?= $recette['image'] ?>">
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
        unset($recettes);
    }

}

?>