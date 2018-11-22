<?php

class Etudiant {

    public $id;
    public $nom;
    public $prenom;

    function __construct($id, $n, $p) {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
    }
}

?>