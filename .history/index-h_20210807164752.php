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

new Animal(1,"toto",23,true,"chien","");
new Animal(2,"titi",223,false,"poisson","");

foreach(Animal::$mesAnimaux as $animal){
    echo "Nom :" . $animal->getNom() . "";


}

?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../../global/common/template.php";
?>