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
        $req = '
        SELECT libelle 
        FROM type t 
        INNER JOIN animal a ON t.idType = a.idType
        WHERE a.idAnimal = :idAnimal
        ';
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);  
        return $resultat['libelle'];
    }

    public static function getImagesAnimal($idAnimal){
        $pdo = MonPDO::getPDO();
        // On va faire 2 jointures : de image vers image_animal et de image_animal vers animal
        // Pas besoin de 2 jointures car l'idAnima on peut le récuperer après la 1ère jointures
        // Par contre si on voulait le nom de l'animal (une info qui n'existe pas dnas la table intermédiaire) il fallai!!! 
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