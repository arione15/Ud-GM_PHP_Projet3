<?php ob_start(); //NE PAS MODIFIER 
$titre = "Les animaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
require 'MonPDO.class-h.php';

/* Connexion à une base MySQL avec l'invocation de pilote */


$req = "SELECT * FROM animal";
$query = $pdo->prepare($req);
$query->execute();
$animals = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($animals);
echo "</pre>";

?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../../global/common/template.php";
?>