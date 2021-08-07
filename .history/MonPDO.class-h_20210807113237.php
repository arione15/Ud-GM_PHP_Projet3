<?php

class MonPDO {
    
    private const HOST_NAME = "localhost";
    private const DB_NAME = "animauxprojetexercice";
    private const USER_NAME = "root";
    private const PWD = "";

    public function __construct($dsn, $user, $pwd){

    }
   
}

/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=catalogue;host=127.0.0.1';
$user = 'root';
$password = '';

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