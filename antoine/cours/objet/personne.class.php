<?php 

class Personne {

    private $prenom;
    private $nom;
    private $age;

    function __construct($p, $n, $a) {
        $this->prenom = $p;
        $this->nom = $n;
        $this->age = $a;
    }

    function __get($attr) {
        switch($attr) {
            case "prenom":
                return $this->prenom;
                break;
            case "nom":
                return $this->nom;
                break;
            case "age":
                return $this->age;
                break;
            default: 
                echo "GET Error - Attribute not found ! ";
                break;
        }
    }

    function __toString() {
        return "Ici une personne : ".$this->prenom." ".$this->nom;
    }
}


?>