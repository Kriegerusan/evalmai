<?php

require_once '../libs/format_checker.php';
require_once '../libs/strings_treatment.php';
require_once '../models/database_connect.php';
require_once '../models/post_management.php';

$uploadFolder = "../uploads/";
if (!file_exists($uploadFolder)) {
    mkdir($uploadFolder, 755);
}

$inputDatas = array();

//controle le remplissage des champs obligatoires 
switch (true) {
    case (!isset($_POST['title']) || $_POST['title'] == null):
        SetErrorMsg("Veuillez remplir les champs suivant : \n Titre, Adresse, Ville, Code postal, Prix, Surface, Type d'annonce.");
        header('location: ../views/add_post_form.php');
        break;
    case (!isset($_POST['address']) || $_POST['address'] == null):
        SetErrorMsg("Veuillez remplir les champs suivant : \n Titre, Adresse, Ville, Code postal, Prix, Surface, Type d'annonce.");
        header('location: ../views/add_post_form.php');
        break;
    case (!isset($_POST['city']) || $_POST['city'] == null):
        SetErrorMsg("Veuillez remplir les champs suivant : \n Titre, Adresse, Ville, Code postal, Prix, Surface, Type d'annonce.");
        header('location: ../views/add_post_form.php');
        break;
    case (!isset($_POST['postal']) || $_POST['postal'] == null):
        SetErrorMsg("Veuillez remplir les champs suivant : \n Titre, Adresse, Ville, Code postal, Prix, Surface, Type d'annonce.");
        header('location: ../views/add_post_form.php');
        break;
    case (!isset($_POST['surface']) || $_POST['surface'] == null):
        SetErrorMsg("Veuillez remplir les champs suivant : \n Titre, Adresse, Ville, Code postal, Prix, Surface, Type d'annonce.");
        header('location: ../views/add_post_form.php');
        break;
    case (!isset($_POST['price']) || $_POST['price'] == null):
        SetErrorMsg("Veuillez remplir les champs suivant : \n Titre, Adresse, Ville, Code postal, Prix, Surface, Type d'annonce.");
        header('location: ../views/add_post_form.php');
        break;
    case (!isset($_POST['type']) || $_POST['type'] == null):
        SetErrorMsg("Veuillez remplir les champs suivant : \n Titre, Adresse, Ville, Code postal, Prix, Surface, Type d'annonce.");
        header('location: ../views/add_post_form.php');
        break;

    case !IsCpValid($_POST['postal']):
        SetErrorMsg("le code postal n'est pas dans le bon format");
        header('location: ../views/add_post_form.php');
        break;

    case !IsFloat($_POST['price']):
        SetErrorMsg("le prix n'est pas au bon format.");
        header('location: ../views/add_post_form.php');
        break;

    case !IsFloat($_POST['surface']):
        SetErrorMsg("la surface n'est pas au bon format.");
        header('location: ../views/add_post_form.php');
        break;

    default:
        $inputDatas['cp'] = $_POST['postal'];
        $inputDatas['titre'] = trim($_POST['title']);
        $inputDatas['adresse'] = trim($_POST['address']);
        $inputDatas['ville'] = trim($_POST['city']);
        $inputDatas['description'] = trim($_POST['description']);
        $inputDatas['type'] = $_POST['type'];
        $inputDatas['prix'] = round((float)ConvertStringFloat($_POST['price']), 0, PHP_ROUND_HALF_UP);
        $inputDatas['surface'] = round((float)ConvertStringFloat($_POST['surface']), 0, PHP_ROUND_HALF_UP);
        break;
}



if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
    if ($_FILES['image']['size'] > pow(10, 6)) {
        SetErrorMsg("la taille de l'image est trop grande, merci d'uploader une image < 1Mo");
        header('location: ../views/add_post_form.php');
    }
    if ($_FILES['image']['type'] != "image/jpeg" && $_FILES['image']['type'] != "image/png") {
        SetErrorMsg("l'extension de l'image n'est pas conforme, merci d'uploader une image en format jpg ou png");
        header('location: ../views/add_post_form.php');
    }

    //$inputDatas['image'] = $_FILES['image']['name'];
    $extArray = explode(".", $_FILES['image']['name']);
    $extension = $extArray[count($extArray) - 1];
    $newName = "logement_" . time() . ".$extension";
    $inputDatas['image'] = $newName;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder . $newName);
} else {
    header('location: ../views/add_post_form.php');
}

InsertNewPost($inputDatas);
header('location: ../views/homepage.php');


function SetErrorMsg($msg) {
    setcookie('addErrorMsg', $msg, time() + 30, "/");
}