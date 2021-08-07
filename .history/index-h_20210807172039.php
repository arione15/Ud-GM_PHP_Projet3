<?php ob_start(); //NE PAS MODIFIER 
$titre = "Les animaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
require "MonPDO.class-h.php";
require "Animal.class-h.php";
require "AnimalDAO.class-h.php";

// tester la fonction getAnimauxBD() : récupérer tous les animaux de la BD
$animals = AnimalDAO::getAnimauxBD();

// Instancier chaque animal ( : on récupère la liste
// des animaux mais tous les champs ne sont pas forcement renseignés)
// mettre les types (int) pour éviter certains problème de la BD
// Pour le sexe on peut mettre (int) ou (bool)
// le dernier champs idType doit être modifier par la suite
foreach($animals as $animal){
    new Aniaml($animal['idAnimal'], $animal['nom'], (int)$animal['age'], (int)$animal['sexe'], $animal['idType']);
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