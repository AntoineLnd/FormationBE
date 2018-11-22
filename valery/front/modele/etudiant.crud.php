<?php

require_once('etudiant.class.php');

function getAllEtudiant() {
    require_once('config.php');
    
    $data = $DBConnection->query("SELECT * FROM etudiant");
    $etudiants = [];

    while ($req = $data->fetch()) {
        $etudiants[] = new Etudiant($req["id"], $req["nom"], $req["prenom"]);
    }

    return $etudiants;
}

function selectEtudiant($id) {
    require_once('config.php');
    
    $data = $DBConnection->prepare("SELECT * FROM etudiant WHERE id = :id");
    $data->bindParam(':id', $id, PDO::PARAM_INT);
	$data->execute();
	$req = $data->fetch();

    $etudiant = new Etudiant($req["id"], $req["nom"], $req["prenom"]);
    var_dump($etudiant);
    return $etudiant;
}

?>