<?php

$wallets=[
    0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>1234,'solde'=>0],
    1=>['client'=>'Hawa Baila Wane','telephone'=>'774799479','code'=>0000,'solde'=>100000]
];
$transactions=[
    0=>['montant'=>1000,'indexClient'=>0],
    1=>['montant'=>-5000,'indexClient'=>0]
];

function ajouterWallet($newWallet) : void {
    global $wallets;
    $wallets[] = $newWallet;
}
function ajouterTransaction($newTrans) : void {
    global $transactions;
    $transactions[] = $newTrans;
}

function afficherWallets( $wallets):void{ 
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

function rechercheWalletParTelephone(array $wallets,string $telephone):int{
    foreach ($wallets as $index => $wallet) {
        if ($wallet['telephone']==$telephone) {
            return $index;
        }
    }
    return -1;
}
function rechercheWalletParCode(array $wallets,string $code):int{
    foreach ($wallets as $index => $wallet) {
        if ($wallet['code']==$code) {
            return $index;
        }
    }
    return -1;
}
function gererSolde(array &$wallets, int $index, int $montant, bool $addition): void {
    if ($addition) {
        $wallets[$index]['solde'] += $montant;
    }else{
        $wallets[$index]['solde'] -= $montant;
    }
}

?>