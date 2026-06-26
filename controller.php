<?php

function creerWalletController() : void {
    $nom = readline("Nom : ");
    $telephone = readline("Téléphone : ");
    $solde = (int) readline("Solde : ");
    $code = (int) readline("Code secret : ");
}

function controller($choix): void {
    switch($choix){

        case 1:
            creerWalletController();
            break;

        case 2:
            echo "Faire Dépôt\n";
            break;

        case 3:
            echo "Faire Retrait\n";
            break;

        case 4:
            echo "Lister les Transactions\n";
            break;

        case 0:
            echo "Au revoir\n";
            break;

        default:
            echo "Choix invalide\n";
            break;
    }
}