<?php
namespace Repositories;

$wallets=[
    0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>1234,'solde'=>0],
    1=>['client'=>'Hawa Baila Wane','telephone'=>'774799479','code'=>0000,'solde'=>100000]
];
$transactions=[
    0=>['montant'=>1000,'indexClient'=>0],
    1=>['montant'=>-5000,'indexClient'=>0]
];

//create
function ajouterWallet($newWallet) : void {
    global $wallets;
    array_push($wallets, $newWallet);
}

function ajouterTransaction($newTrans) : void {
    global $transactions;
    $transactions[] = $newTrans;
}

// gets
function getWallets(): array {
    global $wallets;
    return $wallets;
}

//show
function afficherWallets($wallets):void{ 
    for($index = 0; $index < count($wallets); $index++){
       echo "| Titulaire:".$wallets[$index]['client'] ." | Telephone:" .$wallets[$index]['telephone']." | Solde:" .$wallets[$index]['solde']."\n";
    }
}

function afficherTransactions($wallets, $transactions):void{ 
    foreach ($transactions as $index => $transaction) {
        $indexClient = $transaction['indexClient'];
        $client = $wallets[$indexClient];
        echo "| Titulaire : {$client['client']}" ."| Montant : {$transaction['montant']}\n";
    }

}

// lamda
function rechercheWalletParTelephones(array $wallets,string $telephone):int{
    $telephones = array_column($wallets ,'telephone');
    $index = array_search($telephone,$telephones);
    return $index === false ? -1 : $index;
}

function gererSolde(array &$wallets, int $index, int $montant, bool $addition): void {
    if ($addition) {
        $wallets[$index]['solde'] += $montant;
    }else{
        $wallets[$index]['solde'] -= $montant;
    }
}

?>