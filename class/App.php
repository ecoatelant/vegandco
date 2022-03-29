<?php
    
    class App {

        static function getOffers(){
            return [
                [
                    'name' => 'Abonnement mensuel',
                    'price' => 5,
                    'price_text' => '5e / mois'
                ],
                [
                    'name' => 'Abonnement anuel',
                    'price' => 50,
                    'price_text' => '50e / ans'
                ]
                ];
        }

    }


?>