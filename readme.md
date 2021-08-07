# Page Web complète

"Page Web complète" est un site internet présentant une vitrine pour animaux domestiques.

## I. Environnement de développement

* PHP 7.4
* POO
* PDO
* mySQL

## II. Démarches
Lister les animaux contenus dans une BD en réalisant :
- Une classe Animal pour gérer l'animal
- Une classe AnimaDAO pour récupérer les données de la BD
- Une classe PDO pour créer une instance pdo pour connecter la BD au PHP
- Un fichier index.php qui fait le lien entre tous ces fichiers

## III. Points à retenir
 
1. dans la classe MonPDO mettre les infos de connexion sous forme de constante :
```php
    private const HOST_NAME = "localhost";
    private const DB_NAME = "animauxexercice";
    private const USER_NAME = "root";
    private const PWD = "";
```
2. $pdo avec le pattern singleton :
   ```php
   private static $monPDO = null; // accessible depuis n'importe quel objet de la classe 
                            // (car l'attribut est en private). ca évite de generer 
                            // un nouveau $pdo à chaque nouvelle requête.  On conserve 
                            // une seule instance de $pdo en utilisant le pattern singleton 
                            // pour n'avoir qu'une seule instance d'une classe.
    ```

3. créer une fonction pour pouvoir l'utiliser partout (donc static) pour instancier et retourner l'instance $pdo :
```php
public static function getPDO(){
        try{... }
        catch(){ ... }
        }
        return 
```
4. Dans la classe Animal.class-h mettre un tableau static pour y stocker tous les animaux crées.
5. Créer la classe AnimalDAO-h qui ne contient que des fonctions statiques pour les differentes requêtes sur nos différentes tables de la BD.
6. Pour récupérer l'image d'un animal et son type qui sont dans deux autres tables, on écrira 2 fonctions pour 2 requêtes différentes.
7. Vidéos 50-51 à revoir !!!