<?php

//controle la validite d'un Code postal Francais
function IsCpValid($input):bool {
    $template = "/^\d{5}$/";
    return preg_match($template , $input);
}

//controle la chaine de caractere si elle correspond a un nombre flottant
function IsFloat($input):bool {
    $template = "/^[0-9,]*$/";
    return preg_match($template, $input);
}

//controle la chaine de caractere si elle correspond a un nombre entier
function IsInteger($input):bool  {
    $template = "/^(\d)*$/";
    return preg_match($template, $input);
}