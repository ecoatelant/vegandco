<?php

    // require 'nav_test.html';
    require 'class/App.php';
    if (isset($_POST['offer'])){
        $paypal = new PaypalSubscription(PAYPAL_USERNAME, PAYPAL_PASSWORD, PAYPAL_SIGNATURE, App::getOffers());
        $paypal->subscribe($_POST['offer']);
    }

?>
<body>
<h1>S'abonner</h1>
<form action="" method="post">
    <ul>
        <?php foreach(App::getOffers() as $k => $offer) :?>
            <li><input type="radio" name="offer" value="<?= $k ?>"> <?= $offer['name'] ?> - <?= $offer['price_text']; ?> </li>
        <?php endforeach; ?>
        </ul>
    <button>S'abonner</button>
</form>
        </body>
