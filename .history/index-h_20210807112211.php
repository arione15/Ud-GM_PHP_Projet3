<?php ob_start(); //NE PAS MODIFIER 
$titre = "Les animaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
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
$req = "SELECT * FROM projet";
$query = $pdo->prepare($req);
$query->execute();
$projets = $query->fetchAll(PDO::FETCH_ASSOC);

/*  echo "<pre>";
    print_r($projets);
    echo "</pre>";
*/
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../../global/common/template.php";
    ?>
