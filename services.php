<?php

require_once "validator.php";
require_once "repository.php";

function creerWalletService($newWallet){
   
    do {
        if ($newWallet['client']==null) {
            echo "votre nom ne doit pas etre vide \n";
            $newWallet['client'] = readline("ressaisir un nom : \n");
        } 
    } while ($newWallet['client']==null);

    do {
        if (!validerNumero($newWallet['telephone'])) {
            echo "votre numero est invalide commence par 77 / 76 / 78 / 70 (9 chiffres) \n";
            $newWallet['telephone'] = readline("ressaisir un telephone : \n");
        } 
    } while (!validerNumero($newWallet['telephone']));

    do {
        if (!validerCode($newWallet['code'])) {
            echo "Code invalide\n";
            $newWallet['code'] = readline("ressaisir le code : ");
        }
    } while (!validerCode($newWallet['code']));
    
    do {
        if (numeroExiste($newWallet["telephone"])) {
            echo "numero existe deja\n";
            $newWallet['telephone'] = readline("ressaisir le numero : ");
        }
    } while (numeroExiste($newWallet["telephone"]));

    do {
        if (codeExiste($newWallet["code"])) {
            echo "Code deja utuliser \n";
            $newWallet['code'] = (int) readline("ressaisir le code : ");
        }
    } while (codeExiste($newWallet["code"]));

    do {
        if ($newWallet["solde"] < 0) {
            echo "solde invalid\n";
            $newWallet['solde'] = (int) readline("ressaisir le solde : ");
        }
    } while ($newWallet["solde"] < 0);

    ajouterWallet($newWallet);
}


function creerTransactionService(array $wallets,array $newTrans, $type):?array {
  
    do {
        $index = rechercheWalletParTelephone($wallets, $newTrans['telephone']);
        if ($index == -1) {
            echo "numero non existant veiller ressaire \n";
            $newTrans['telephone']= readline("ressaisir le telephone : ");; 
        }
    } while ($index == -1); 
    
    if (!$type) {   
        if ($wallets[$index]['solde'] == 0) {
            echo "votre solde est nul, vous ne pouvez pas faire de retrait merci.\n";
            return null;
        }
        do {
            if ($newTrans['montant'] <= 0 || $newTrans['montant'] > $wallets[$index]['solde']) {
                echo "Le montant doit être strictement positif et inférieur ou égal au solde ". $wallets[$index]['solde'].".\n";
                $newTrans['montant']= readline("ressaisir le montant : ");; 
            }
        } while ($newTrans['montant'] <= 0 || $newTrans['montant'] > $wallets[$index]['solde']); 
    }

    $newTrans['indexClient']=$index;
    return $newTrans;
}

function faireTransactionService($newTrans,$type){
    global $wallets ;
    $newDepotAvecIndex = creerTransactionService($wallets,$newTrans,$type);

    $transaction=['montant'=>0,'indexClient'=>''];
    $transaction['indexClient'] = $newDepotAvecIndex['indexClient'];
    $transaction['montant'] = $newDepotAvecIndex['montant'];
    ajouterTransaction($transaction);
    gererSolde($wallets, $transaction['indexClient'], $transaction['montant'],$type);
}

function afficherWalletsService():void{
    global $wallets;

    afficherWallets($wallets);
}

function afficherTransactionsService():void{
    global $wallets, $transactions;

    afficherTransactions($wallets,$transactions);
}

?>