<?php

define('PAYPAL_USERNAME','sb-uish114676885_api1.business.example.com');
define('PAYPAL_PASSWORD','LHQ98VZ3SEYW7HS4');
define('PAYPAL_SIGNATURE','A-zMrqrGLVzmuisNeb0shyf-U73yA1n1FTYBI2L-hrXvqGDFZf3hvK.G');

class PaypalSubscription {

    private $username, $password, $signature, $offers;

    public function __construct($username, $password, $signature, $offers){
        $this->username = $username;
        $this->password = $password;
        $this->signature = $signature;
        $this->offers = $offers;
    }

    public function subscribe($offer) {
        if(isset($this->offers[$offer])){
            throw new Excception('Cette offre nexiste pas');
        }
    }

    }

?>