<?php

$wallets=[
    0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>1234,'solde'=>0],
    1=>['client'=>'Hawa Baila Wane','telephone'=>'774799479','code'=>0000,'solde'=>100000]
];
$transactions=[
    0=>['montant'=>1000,'indexClient'=>0],
    1=>['montant'=>-5000,'indexClient'=>0]
];

function ajouterWallet($wallet) : void {
    global $wallets;
    $wallets[] = $wallet;
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

?>