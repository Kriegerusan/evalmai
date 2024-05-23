<?php

require_once '../models/database_connect.php';

function InsertNewPost($dataArray) {

    $pdo = AutoConnectDatabase();

    $req = $pdo->prepare(
        "INSERT INTO logement (
            titre,
            adresse,
            ville,
            cp,
            surface,
            prix,
            photo,
            type,
            description)
        Values(
            :titre,
            :adresse,
            :ville,
            :cp,
            :surface,
            :prix,
            :photo,
            :type,
            :description
        );"
    );

    $req->bindValue(":titre", $dataArray['titre']);
    $req->bindValue(":adresse", $dataArray['adresse']);
    $req->bindValue(":ville", $dataArray['ville']);
    $req->bindValue(":cp", $dataArray['cp']);
    $req->bindValue(":surface", $dataArray['surface']);
    $req->bindValue(":prix", $dataArray['prix']);
    $req->bindValue(":photo", $dataArray['image']);
    $req->bindValue(":type", $dataArray['type']);
    $req->bindValue(":description", $dataArray['description']);

    $req->execute();

    $req->closeCursor();

}


function GetPostInfo() {
    $pdo = AutoConnectDatabase();

    $req = $pdo->prepare(
        "SELECT * FROM logement;"
    );

    $req->execute();

    $record = $req->fetchAll(PDO::FETCH_ASSOC);

    $req->closeCursor();

    return $record;
}

function GetSpecificPostInfo($postId){
    $pdo = AutoConnectDatabase();

    $req = $pdo->prepare(
        "SELECT * FROM logement WHERE id_logement = :id;"
    );

    $req->bindValue(":id", $postId);

    $req->execute();

    $record = $req->fetch(PDO::FETCH_ASSOC);

    $req->closeCursor();

    return $record;
}

function DeletePost($postId){
    $pdo = AutoConnectDatabase();

    $req = $pdo->prepare(
        "DELETE FROM logement WHERE id_logement = :id;"
    );

    $req->bindValue(":id", $postId);

    $req->execute();

    $req->closeCursor();

}

