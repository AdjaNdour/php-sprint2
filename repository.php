<?php
     // Creer wallet par defaut
    $wallets = [
        ["client" => "Rougui Sy","telephone" =>"773438165","solde" => 2345,"code" => 2005,],
        ["client" => "fatou wane","telephone" =>"773438165","solde" => 2345,"code" => 2005,]
    ];

    // Creer transaction par defaut
    $transactions=[
        ['montant'=>1000,'indexClient'=>0],
        ['montant'=>-5000,'indexClient'=>0]
    ];

    function ajouterWallet($wallet) : void {
        global $wallets;
        $wallets[] = $wallet;
    }

    function trouverWalletParTelephone(string $telephone): int{
        global $wallets;
        for ($index = 0; $index < count($wallets); $index++) {
            if ($wallets[$index]["telephone"] == $telephone) {
                return $index;
            }
        }
    return -1;
    }

    function trouverWalletParCode(int $code): int{
    global $wallets;
    for ($i = 0; $i < count($wallets); $i++) {
        if ($wallets[$i]["code"] == $code) {
            return $i;
        }
    }
    return -1;
    }

?>