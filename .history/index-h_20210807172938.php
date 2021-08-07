<?php ob_start(); //NE PAS MODIFIER 
$titre = "Les animaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
// --------------- Contrôleur ---------------//
//------------------------------------------//
require "MonPDO.class-h.php";
require "Animal.class-h.php";
require "AnimalDAO.class-h.php";

// tester la fonction getAnimauxBD() : récupérer tous les animaux de la BD
$animals = AnimalDAO::getAnimauxBD();

// Instancier chaque animal ( : on récupère la liste
// des animaux sous forme de tableau assoc. Mais on veut obtenir
// des objets instanciés pour pouvoir manipuler les propriétés de la classe)
// mettre les types (int) pour éviter certains problème de la BD
// Pour le sexe on peut mettre (int) ou (bool) car bien qu'il soit booléen
// il est conservé dans la BD en tant qu'entier.
// Le dernier champs idType doit être modifier par la suite car ici ca sera
// juste le chiffre mais il faut récupérer le nom.

foreach($animals as $animal){
    new Animal($animal['idAnimal'], $animal['nom'], (int)$animal['age'], (int)$animal['sexe'], $animal['idType'], "");
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