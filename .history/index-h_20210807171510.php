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
foreach($animals as $animal){
    new Aniaml($animal['idAnimal'], )
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