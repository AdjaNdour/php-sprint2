<?php
namespace Validators;

require_once "repository.php";

use function Repositories\getWallets;

function validite($min,$max):int{
    do{
        $choix = readline("Votre choix : ");
        if(!is_numeric($choix) || $choix<$min || $choix>$max){
            echo "Choix invalide.\n";
        }
    }while(!is_numeric($choix) || $choix<$min || $choix>$max);
    return $choix;
}

function validerNom($nom):string{
    return $nom != "";
}

function validerNumero($numero):bool{
    if(strlen($numero)!=9){
        return false;
    }
    $indicateurs = ["77", "78", "76", "70", "75"];
    $result = "";

    for ($i = 0; $i < 2; $i++) {
        $result .= $numero[$i];
    }
    return in_array($result,$indicateurs);
}

function validerCode($code):bool{
    if(strlen($code) != 4){
        return false;
    }
    return true;
}

function numeroExiste(string $numero): bool{
    $telephones = array_column(getWallets(), "telephone");
    return in_array($numero, $telephones);
}

function codeExiste(string $codeSecret):bool{
    $codes = array_column(getWallets(), "code");
    return in_array($codeSecret , $codes);
}

?>