<?php

require_once('etudiant.class.php');

function getAllEtudiant() {
    require_once('config.php');
    
    $data = $DBConnection->query("SELECT * FROM etudiant");
    $etudiants = [];

    while ($req = $data->fetch()) {
        $etudiant = new Etudiant($req["id"], $req["nom"], $req["prenom"]);
        array_push($etudiants, $etudiant);
    }

    return $etudiants;
}

?>