<?php

require_once "services.php";

function controller($choix){

    switch($choix){

        case 1:
            creerWalletController();
            break;
        case 0:
            echo "Au revoir";
            break;
    }

}

function creerWalletController(){
    $wallet = [];
    $wallet["nom"] = readline("Nom : ");
    $wallet["telephone"] = readline("Téléphone : ");
    $wallet["code"] = readline("Code secret : ");
    $wallet["solde"] = readline("Solde initial : ");
    creerWalletService($wallet);
}