<?php
require_once "controller.php";

function afficherMenu(): void {
    echo "\n--------------Menu Distributeur----------------\n";
    echo "1 - Créer Wallet\n";
    echo "2 - Faire Dépôt\n";
    echo "3 - Faire Retrait\n";
    echo "4 - Lister les Transactions\n";
    echo "0 - Quitter\n";
}

$choix = -1;

do {

    afficherMenu();
    $choix = validite(0,4);
    controller($choix);

} while ($choix != 0);

?>