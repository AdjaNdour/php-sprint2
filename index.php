<?php
    require_once "controller.php";

    // --------------- Menu ---------------
    function afficherMenu(): void {
        echo "\n--------------Menu Distributeur----------------\n";
        echo "1 - Créer Wallet\n";
        echo "2 - Faire Dépôt\n";
        echo "3 - Faire Retrait\n";
        echo "4 - Lister les Transactions\n";
        echo "0 - Quitter\n";
    }

    $choix = 10;

    do {
        afficherMenu();
        $choix = readline("Faite un choix : ");
        controller($choix);
    } while ($choix !=0);



?>