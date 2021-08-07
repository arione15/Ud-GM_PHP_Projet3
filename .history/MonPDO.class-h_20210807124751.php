<?php

class MonPDO {
    
    private const HOST_NAME = "localhost";
    private const DB_NAME = "animauxprojet3php";
    private const USER_NAME = "root";
    private const PWD = "";

    private static $monPDOinstance = null; // accessible depuis n'importe quel objet de la classe 
                            // (car l'attribut est en private). ca évite de generer 
                            // un nouveau $pdo à chaque nouvelle requête.  On conserve 
                            // une seule instance de $pdo en utilisant le pattern singleton 
                            // pour n'avoir qu'une seule instance d'une classe.

    public function getPDO(){
        $connexion = "mysql:dbname=".self::DB_NAME.";host=".self::HOST_NAME;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
self::$monPDOinstance = new PDO($connexion)
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