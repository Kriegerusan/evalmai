<?php

//se connecte a la DB en rentrant les info de co manuellement
function ConnectDatabase($protocol, $server, $port = null, $database, $user, $password = null){
    $connectionData = "$protocol:host=$server;port=$port;dbname=$database";
    $pdo = new PDO($connectionData,$user,$password);

    return $pdo;
}

//se connecte automatiquement a la DB avec les IDs de connection.ini
function AutoConnectDatabase(){
    $connectionData =parse_ini_file("../conf/connection.ini");
    $pdo = new PDO(
        $connectionData['protocol'] . ":host=". $connectionData['server'] . ";
        port=" . $connectionData['port'] . ";
        dbname=" . $connectionData['database'] . ";",
        $connectionData['user'],
        $connectionData['password']
    );
    return $pdo;
}