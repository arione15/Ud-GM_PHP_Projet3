<?php ob_start(); //NE PAS MODIFIER 
$titre = "Les animaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
require "MonPDO.class-h.php";
require "Animal.class-h.php";

/* Connexion à une base MySQL avec l'invocation de pilote */

// $pdo = MonPDO::getPDO();

// $req = "SELECT * FROM animal";
// $query = $pdo->prepare($req);
// $query->execute();
// $animals = $query->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($animals);
// echo "</pre>";

try {
    $connexion = "mysql:dbname=".self::DB_NAME.";host=".self::HOST_NAME;
    $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
    self::$monPDOinstance = new PDO($connexion, self::USER_NAME, self::PWD, $options);

} catch(PDOException $e){
$message = "La connexion à la bas de données a échoué".$e->getMessage();
die();
}
return self::$monPDOinstance;
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../../global/common/template.php";
?>