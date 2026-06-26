<?php

    function validerNom(string $nom): bool{
        if ($nom == "") {
            return false;
        }
        return true;
    }

    function validerSolde(int $solde): bool{
        if ($solde < 0) {
            return false;
        }
        return true;
    }

    function validerCode(int $code): bool{
        if ($code <= 0) {
            return false;
        }
        return true;
    }

    function validerTelephone(string $telephone): bool{
        if (strlen($telephone) != 9) {
            return false;
        }
        return true;
    }

    function telephoneExiste(string $telephone): bool{
        if (trouverWalletParTelephone($telephone) == -1) {
            return false;
        }
        return true;
    }

    function codeExiste(int $code): bool{
        if (trouverWalletParCode($code) == -1) {
            return false;
        }
        return true;
    }
?>
