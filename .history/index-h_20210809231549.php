<?php ob_start(); //NE PAS MODIFIER 
$titre = "Les animaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
// --------------- Contrôleur ---------------//
//-------------------------------------------//
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

foreach ($animals as $animal) {
    // Après la création de la fonction permettant de récuperer le libellé du type :
    // new Animal($animal['idAnimal'], $animal['nom'], (int)$animal['age'], (int)$animal['sexe'], $animal['idType'], "");
    // Après la création de la fonction permettant de récuperer le libellé du type de mon animal : 
    $type = AnimalDAO::getTypeAnimal($animal["idAnimal"]);
    //new Animal($animal['idAnimal'], $animal['nom'], (int)$animal['age'], (int)$animal['sexe'], $type, "");
    $images = AnimalDAO::getImagesAnimal($animal["idAnimal"]);
    // Après la création de la fonction permettant de récuperer les images de mon animal  : 
    new Animal($animal['idAnimal'], $animal['nom'], (int)$animal['age'], (int)$animal['sexe'], $type, $images);
}
?>

<?php
// --------------- Vue ---------------//
//-------------------------------------------//
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Age</th>
            <th scope="col">Sexe</th>
            <th scope="col">Type</th>
            <th scope="col">Images</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Animal::$mesAnimaux as $animal) { ?> // Pour afficher, on utilise maintenant les objets
            <tr>
                <td style="vertical-align:middle"><?= $animal->getId() ?></td>
                <td style="vertical-align:middle"><?= $animal->getNom() ?></td>
                <td style="vertical-align:middle"><?= $animal->getAge() ?></td>
                <td style="vertical-align:middle"><?= ($animal->getSexe() === 0) ? "Femelle" : "Mâle"; ?></td>
                <td style="vertical-align:middle"><?= $animal->getType() ?></td>
                <td style="width:200px" class="text-center">
                    <?php foreach ($animal->getImages() as $image) : ?>
                        <img src="sources/<?= $image['url'] ?>" alt="<?= $image['libelle'] ?>" style="max-height:150px;" class="img-thumbnail img-fluid" />
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>







<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../../global/common/template.php";
?>