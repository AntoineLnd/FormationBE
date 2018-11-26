<?php
require_once("personne.class.php");

class Etudiant extends Personne
{
    private $matricule;
    private $anneeEtude;
    private $cours;

    function __construct($m, $p, $n, $d) {
        parent::__construct($p, $n, $d);

        $this->matricule = $m;
        $this->anneeEtude = [ 
                            "2000" => [ 
                                "Majeur" => "Ok", 
                                "Mineur" => "Non"
                            ], 
                            "2001" => [ 
                                "Majeur" => "Ok", 
                                "Mineur" => "Oui"
                            ] 
                        ];
        $this->cours = ["anglais", "francais", "espagnol"];
    }

    function __get($attr) {
        switch($attr) {
            case "matricule":
                return $this->matricule;
                break;
            case "anneeEtude":
                return $this->anneeEtude;
                break;
            case "cours": 
                return $this->cours;
                break;
            default:
                echo "Get Error - Attribute not found !";
                break;              
        }
    }

    function __set($attr, $value) {
        switch($attr) {
            default:
                echo "SET Error - Attribute not found ! ";
                break;
        }
    }

    function afficherCours () {
        echo "L'étudiant ".$this->prenom." a choisis comme cours :<br/>";
        foreach($this->cours as $cours) {
            echo $cours;
            echo "<br/>";
        }
    }

    function afficherAnnee () {
        echo "Année de l'etudiant ".$this->prenom." :<br/>";
        foreach($this->anneeEtude as $annee => $type) {
            echo $annee." : <br/>";
            foreach($type as $key => $value) {
                echo $key." : ".$value."<br/>";
            }
        }
    }

    function __toString() {
        return "c'est un etudiant de matricule".$this->matricule;
    }
}
?>