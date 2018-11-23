<?php

class Prof {

    public $id;
    public $nom;
    public $prenom;
    public $email;

    function __construct($n, $p, $e, $id = NULL) {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $e;
    }
}

?>