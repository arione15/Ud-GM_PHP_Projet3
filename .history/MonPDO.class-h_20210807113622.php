<?php

class MonPDO {
    
    private const HOST_NAME = "localhost";
    private const DB_NAME = "animauxprojet3php";
    private const USER_NAME = "root";
    private const PWD = "";

    private static $monPDO; // accessible depuis n'importe quel objet de la classe()

    public function __construct($dsn, $user, $pwd){

    }
   
}


// Ajout d'options dans $pdo pour éviter le mauvais affichage des cractères accentués
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

try {
    //  $pdo = new PDO($dsn, $user, $password);
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    echo "La connexion a échoué :" . $e->getMessage();
}
$pdo = new PDO("mysql:dbname=animauxprojet3php;host=127.0.0.1", "root", "");