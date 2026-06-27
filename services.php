<?php
namespace Services;

require_once "validator.php";
require_once "repository.php";

use function Validators\validerNumero;
use function Validators\validerCode;
use function Validators\numeroExiste;
use function Validators\codeExiste;

use function Repositories\ajouterWallet;
use function Repositories\ajouterTransaction;
use function Repositories\gererSolde;
use function Repositories\rechercheWalletParTelephone;
use function Repositories\afficherTransactions;
use function Repositories\afficherWallets;

function creerWalletService($newWallet):void{
   
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

function calculerFrais($montant): int{

    if($montant <= 10000){
        return 200;
    }
    if($montant <= 100000){
        return 500;
    }
    $frais = $montant * 0.01;
    if($frais > 5000){
        $frais = 5000;
    }
    return (int)$frais;
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
            $frais = calculerFrais($newTrans['montant']);
            $total = $newTrans['montant'] + $frais;
            if ($newTrans['montant'] <= 0 || $total > $wallets[$index]['solde']) {
                echo "Montant invalide ou solde insuffisant.\n";
                echo "Frais : ".$frais." CFA\n";
                $newTrans['montant'] = (int) readline("ressaisir le montant : ");
            }
        
        } while ($newTrans['montant'] <= 0 || ($newTrans['montant'] + calculerFrais($newTrans['montant'])) > $wallets[$index]['solde']); 
    }

    $newTrans['indexClient']=$index;
    return $newTrans;
}

function faireTransactionService($newTrans, $type):void{

    global $wallets;
    $newDepotAvecIndex = creerTransactionService($wallets, $newTrans, $type);

    if ($newDepotAvecIndex == null) {
        return;
    }
    $transaction = [
        'montant' => $newDepotAvecIndex['montant'],
        'indexClient' => $newDepotAvecIndex['indexClient'],
        'frais' => 0
    ];

    if($type){
        gererSolde($wallets, $transaction['indexClient'],$transaction['montant'],true);
    }else{
        $frais = calculerFrais($transaction['montant']);
        $transaction['frais'] = $frais;
        gererSolde($wallets, $transaction['indexClient'],$transaction['montant']+$frais,false);
        echo "Frais appliqués : ".$frais." CFA\n";
    }
    ajouterTransaction($transaction);
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