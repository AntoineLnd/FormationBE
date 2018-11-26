<?php

class Etudiant {
    private $prenom;
    private $nom;
    private static $nb = 0;

    function __construct($p, $n) {
        $this->prenom = $p;
        $this->nom = $n;
        self::$nb += 1;
    }

    function __get($argument) {
        switch($argument) {
            case "prenom":
                echo $this->prenom;
                break;
            case "nom":
                echo $this->prenom;
                break;
            case "nb":
                echo self::$nb;
                break;
            default:
                echo "erreur Get - argument not found !";
                break;
        }
    }

    function __set($argument, $value) {
        switch($argument) {
            case "prenom":
                $this->prenom = $value;
                break;
            default:
                echo "Erreur Set - argument not found";
                break;
        }
    }

    function __toString() {
        echo $this->prenom." - ".$this->nom;
    }
}

$etudiant = new Etudiant("Antoine", "Lienard");
$etudiant1 = new Etudiant("Phillipe", "Lienard");
$etudiant2 = new Etudiant("Sylvie", "Lienard");

$array_etudiant = array( $etudiant, $etudiant1, $etudiant2 );

foreach($array_etudiant as $etudiant) {
    $etudiant->__toString();
}

$etudiant->__get("nb");
?>