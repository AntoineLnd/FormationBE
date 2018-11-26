<?php

class Etudiant implements JsonSerializable {
    
    /*
    *   Attributs
    */
    private $id;
    private $nom;
    private $prenom;

    /*
    *   Constructeur vide pour permettre le fetchObject() dans le router
    */
    function __construct() {

    }

    /*
    *   Permet le json_encode avec des attributs privée
    */
    public function jsonSerialize() {
        return array(
            "id" => $this->id, 
            "nom" => $this->nom, 
            "prenom" => $this->prenom);
    }
}

?>