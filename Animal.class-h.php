<?php
class Animal{
    private $id;
    private $nom;
    private $age;
    private $sexe;
    private $type;
    private $images = []; // On aurait pu faire une classe Image toute seule

    public static $mesAnimaux = []; // Pour y stocker l'ensemble des animaux de la BD

    public function __construct($id,$nom,$age,$sexe,$type,$images){
        $this->id = $id;
        $this->nom = $nom;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->type = $type;
        $this->images = $images;

        self::$mesAnimaux[] = $this; // Stocker le nouveau animal qu'on vient de créer
    }

    public function getId(){return $this->id;}
    public function getNom(){return $this->nom;}
    public function getAge(){return $this->age;}
    public function getSexe(){return $this->sexe;}
    public function getType(){return $this->type;}
    public function getImages(){return $this->images;}

    public function setId($id){$this->id = $id;}
    public function setNom($nom){$this->nom = $nom;}
    public function setAge($age){$this->age = $age;}
    public function setSexe($sexe){$this->sexe = $sexe;}
    public function setType($type){$this->type = $type;}
    public function setImages($images){$this->images = $images;}
}