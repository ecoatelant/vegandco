<?php


class VueRecette {

    public function __construct(){}

    public function afficherRecettes($recettes){
        ?>
        <div class="content-block" id="latest-articles">
            <div class="container">
                <section class="row">
                    <h1>Recettes</h1>
                    <?php
                    foreach ($recettes as &$recette) {
                        ?>
                        <article class="card bg-transparent col-lg m-2 p-1">
                            <div class="card-header text-center" id="produit-title"><h5 class="card-title product-title"><?= $recette['titre'] ?></h5></div>
                            <div class="card-footer text-center"> Temps - <?= $recette['temps'] ?></div>
                            <div class="card-body">
                                <img class="w-50 center-img" src="<?= $recette['image'] ?>">
                            </div>
                        </article>
                        <?php
                    }
                    unset($recettes);
                    ?>
                </section>
            </div>
        </div>
        <?php
    }

}

?>