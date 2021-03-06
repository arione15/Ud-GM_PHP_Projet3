# Page Web complète : animaux

"Page Web complète" est un site internet présentant une vitrine pour animaux domestiques.

## I. Environnement de développement

* PHP 7.4
* POO
* PDO
* mySQL

## II. Démarches
Lister les animaux contenus dans une BD en réalisant :
- Une classe `Animal` pour gérer l'animal
- Une classe `AnimaDAO` pour récupérer les données de la BD
- Une classe PDO personnalisée `MonPDO`  pour créer une instance pdo pour connecter la BD au PHP
- Un fichier index.php qui fait le lien entre tous ces fichiers

## III. Points à retenir
 
1. dans la classe `MonPDO` mettre les infos de connexion sous forme de constante :
    ```php
    private const HOST_NAME = "localhost";
    private const DB_NAME = "animauxexercice";
    private const USER_NAME = "root";
    private const PWD = "";
    ```
2. **<u>Pour n'avoir qu'une seule instance d'une classe :</u>**
    - Définir et initialiser à null $monPDO (le pattern singleton)
        ```php
        private static $monPDO = null; 
            /* Accessible depuis n'importe quel objet de la classe 
            (car l'attribut est en private). ca évite de générer 
            un nouveau $pdo à chaque nouvelle requête.  On conserve 
            une seule instance de $pdo en utilisant le pattern singleton 
            . */
            ```
    - Créer une fonction pour pouvoir l'utiliser partout (donc static) pour, soit instancier la classe de PDO si `$monPDO` n'existe pas, soit récupérer l'instance (unique) `$monPDO` si elle existe :

        ```php
        public static function getPDO(){
            try{... }
            catch(){ ... }
            }
            return 
        ```
3. Dans la classe `Animal` mettre un tableau static pour y stocker tous les animaux crées.

4. Créer la classe `AnimalDAO` qui ne contient que des fonctions statiques pour les differentes requêtes sur nos différentes tables de la BD.

5. le but n'étant pas d'afficher les animaux récupérés depuis la BD grâce à la fonction getAnimauxBD() mais plutôt d'instancier chaque animal (on récupère la liste des animaux sous forme de tableau assoc. Mais on veut obtenir des objets instanciés pour pouvoir manipuler les propriétés de la classe), d'où :

    ```php
    $animaux = AnimalDAO::getAnimauxBD(); // on récupère les animaux de la BD : c'est un tableau assoc de plusieurs animaux
    foreach($animaux as $animal){
        // pour avoir des objets , on instancie en donnant au constructeur les paramètres récupérés depuis la BD 
        new Animal($animal['idAnimal'],$animal['nom'],(int)$animal['age'],(int)$animal['sexe'],$animal['idType'], ""); // puis régler le type (avoir le libellé par juste le numéro) et les images en créant de nouvelles requêtes (nouvelles fonctions : getTypeAnimal() et getImagesAnimal())

    ```

6. Pour récupérer l'image d'un animal et son type qui sont dans deux autres tables, on écrira 2 fonctions pour 2 requêtes différentes.

7. Vidéos 50-51 à revoir !!!

8. entre la classe `animal` et la classe `image` on a mis une classe intérmédiaire `image_animal` car si on eu directement `animal (1,n) -> image(1,1)` : un animal peut avoir une ou plusieurs images et une image ne contient qu'un et un seul animal. Ca sera une `CIF` et puisqu'on a `(1,1)` pas `(0,1)`, il faut mettre dans `image` une clé étrangère `idAnimal`. On sera donc bloqué si on veut faire qu'une image peut contenir plusieurs animaux. D'où la necessité, dans ce cas, de recourir à une table intermédiare.