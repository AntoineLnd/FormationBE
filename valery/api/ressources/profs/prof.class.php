<?php

class Prof {

    private $id;
    private $nom;
    private $prenom;
    private $email;

    function __construct($n, $p, $e, $id = NULL) {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $p;
    }
}

?>