<?php

//se connecte automatiquement a la DB avec les IDs de connection.ini
function AutoConnectDatabase(){
    $connectionData =parse_ini_file("../conf/connection.ini");
    $pdo = new PDO(
        $connectionData['protocol'] . ":host=". $connectionData['server'] . ";
        dbname=" . $connectionData['database'] . ";",
        $connectionData['user'],
        $connectionData['password']
    );
    return $pdo;
}


//se connecte a la DB en rentrant les info de co manuellement
function ConnectDatabase($protocol, $server, $database, $user, $password = null){
    $connectionData = "$protocol:host=$server;dbname=$database";
    $pdo = new PDO($connectionData,$user,$password);

    return $pdo;
}