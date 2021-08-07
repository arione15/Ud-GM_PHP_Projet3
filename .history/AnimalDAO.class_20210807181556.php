<?php
class AnimalDAO{
    public static function getAnimauxBD(){
        $pdo = MonPDO::getPDO();
        $req = "SELECT * FROM animal";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
    
    public static function getTypeAnimal($idAnimal){
      
    }

    public static function getImagesAnimal($idAnimal){
        $pdo = MonPDO::getPDO();
        $req = '
        SELECT libelle, url 
        FROM image i
        INNER JOIN image_animal ia ON i.idImage = ia.idImage
        WHERE ia.idAnimal = :idAnimal
        ';
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    } 
}