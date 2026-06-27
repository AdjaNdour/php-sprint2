<?php
namespace Controllers;

require_once "services.php";

use function Services\creerWalletService;
use function Services\faireTransactionService;
use function Services\afficherTransactionsService;
use function Services\afficherWalletsService;


function controller($choix){

    switch($choix){

        case 1:
            creerWalletController();
            break;
        case 2:
            $depot=true;
            faireTransactionController($depot);
            break;
        case 3:
            $retrait=false;
            faireTransactionController($retrait);
            break;  
        case 4:
            listerTransactions();
            break;
        case 5:
            listerWallets();
            break;
        case 0:
            echo "Au revoir";
            break;
    }

}

function creerWalletController(){
    $newWallet = [];
    $newWallet["client"] = readline("saisir le nom : ");
    $newWallet["telephone"] = readline("saisir le téléphone : ");
    $newWallet["code"] = readline("saisir le code secret : ");
    $newWallet["solde"] = readline("saisir le solde initial : ");
    creerWalletService($newWallet);
}

function faireTransactionController($type){
    $trans=['montant'=>0,'indexClient'=>'','telephone'=>''];
    $trans['telephone'] = readline("Veuillez saisir le telephone:");
    $trans['montant'] = (int) readline("Veuillez saisir le montant de la transaction:");
    faireTransactionService($trans,$type);
}

function listerTransactions():void{
    afficherTransactionsService();
}
function listerWallets():void{
    afficherWalletsService();
}

?>