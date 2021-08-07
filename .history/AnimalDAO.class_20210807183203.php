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
        $pdo = MonPDO::getPDO();
        $req = "SELECT libelle FROM type t
        INNER JOIN animal a
        ON t.idType = a.idType
        WHERE a.idAnimal=:idAnimal";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue("idAnimal", $idAnimal, PDO_PA)
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
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