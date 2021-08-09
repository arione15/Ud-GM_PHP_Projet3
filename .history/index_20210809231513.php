<?php ob_start(); //NE PAS MODIFIER 
$titre = "Les animaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
/** 
 * CONTROLLER
 */
require "MonPDO.class.php";
require "Animal.class.php";
require "AnimalDAO.class.php";
$animaux = AnimalDAO::getAnimauxBD();
foreach($animaux as $animal){
    $type = AnimalDAO::getTypeAnimal($animal['idAnimal']);
    $images = AnimalDAO::getImagesAnimal($animal['idAnimal']);
    new Animal($animal['idAnimal'],$animal['nom'],(int)$animal['age'],(int)$animal['sexe'],$type,$images);
}
?>


<?php
/** 
 * VIEW
 */
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
    <?php foreach(Animal::$mesAnimaux as $animal){ ?>
           <tr>
                <td style="vertical-align:middle"><?= $animal->getId() ?></td>
                <td style="vertical-align:middle"><?= $animal->getNom() ?></td>
                <td style="vertical-align:middle"><?= $animal->getAge() ?></td>
                <td style="vertical-align:middle"><?= ($animal->getSexe() ===0) ? "Femelle" : "Mâle"; ?></td>
                <td style="vertical-align:middle"><?= $animal->getType() ?></td>
                <td style="width:200px" class="text-center">
                    <?php foreach ($animal->getImages() as $image) : ?>
                        <img src="sources/<?= $image['url'] ?>" alt="<?= $image['libelle'] ?>" style="max-height:150px;" class="img-thumbnail img-fluid"/>
                    <?php endforeach; ?>
                </td>
           </tr>
    <?php }?>
    </tbody>
</table>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
