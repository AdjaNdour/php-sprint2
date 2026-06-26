<?php
require_once "validator.php";

function creerWallet(string $nom, string $telephone, int $solde, int $code): bool
{
    if (!validerNom($nom)) {
        return false;
    }

    if (!validerTelephone($telephone)) {
        return false;
    }

    if (telephoneExiste($telephone)) {
        return false;
    }

    if (!validerSolde($solde)) {
        return false;
    }

    if (!validerCode($code)) {
        return false;
    }

    if (codeExiste($code)) {
        return false;
    }

    $wallet = [
        "client" => $nom,
        "telephone" => $telephone,
        "solde" => $solde,
        "code" => $code
    ];

    ajouterWallet($wallet);

    return true;
}