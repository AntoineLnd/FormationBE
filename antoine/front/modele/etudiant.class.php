<?php

class Etudiant {
    /*
    *   Attributs
    */
    private $id;
    private $nom;
    private $prenom;

    /*
    *   Contructeur de notre objet, on peut passer des valeur par défault dans les paramètres
    */
    function __construct($id, $n, $p) {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
    }

    /*
    *   Permet d'accéder en lecture aux attributs : $monObjet->nom 
    */
    function __get($attr) {
        switch($attr) {
            case "id":
                return $this->id;
                break;
            case "prenom":
                return $this->prenom;
                break;
            case "nom":
                return $this->nom;
                break;
            default:
                return "Unknow";
                break;
        }
    }

    /*
    *   Permet d'accéder en écriture aux attributs : $monObjet->nom = "monNom" 
    */
    function __set($attr, $value) {
        switch($attr) {
            case "prenom":
                $this->prenom = $value;
                break;
            case "nom":
                $this->nom = $value;
                break;
            default:
                return "Unknow";
                break;
        }
    }

    /*
    *   Redéfinir la méthode toString() de notre objet; 
    *   ici :
    *       -   $monEtudiant = new Etudiant(1, "Antoine", "Lienard");
    *       -   echo $monEtudiant //affichera : 1 - antoine - lienard
    *
    *   Php ira chercher notre définition de toString() pour afficher notre objet
    */
    function __toString() {
        return $this->id." - ".$this->prenom.' - '.$this->nom;
    }
}

?>