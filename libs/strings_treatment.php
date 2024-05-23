<?php

//converti un input chaine de caractere dans un format strfloat Fr en format strFloat compatible avec l'ordinateur
function ConvertStringFloat($input) {
    return str_replace(",",".",$input);
}