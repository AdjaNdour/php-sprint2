<?php

require_once "validator.php";
require_once "repository.php";

function creerWalletService($wallet){
    if(!validerNom($wallet["nom"])){
        echo "Nom invalide\n";
        return;
    }

    if(!validerNumero($wallet["telephone"])){
        echo "Numéro invalide\n";
        return;
    }

    if(numeroExiste($wallet["telephone"])){
        echo "Numéro déjà existant\n";
        return;
    }

    if(codeExiste($wallet["code"])){
        echo "Code déjà utilisé\n";
        return;
    }

    if($wallet["solde"] < 0){
        echo "Solde invalide\n";
        return;
    }

    ajouterWallet($wallet);

}