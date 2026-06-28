<?php
require_once "repository.php";
require_once "validator.php";
require_once "services.php";
require_once "controller.php";

use function Controllers\controller;
use function Validators\validite;

function afficherMenu(): void {
    echo "\n--------------Menu Distributeur----------------\n";
    echo "1 - Créer Wallet\n";
    echo "2 - Faire Dépôt\n";
    echo "3 - Faire Retrait\n";
    echo "4 - Lister les Transactions\n";
    echo "5 - Lister les wallets\n";
    echo "0 - Quitter\n";
}

$choix = -1;

do {
    afficherMenu();
    $choix = validite(0,5);
    controller($choix);

} while ($choix != 0);

?>