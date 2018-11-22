<?php

include('config.php');
require_once('etudiant.class.php');


function getAllEtudiant() {
    //  http://localhost:3200/ --> Lien vers l'api
    $path = Api::gePath()."/etudiants";

    // Envoie d'une requête de type GET
    $response = json_decode(file_get_contents($path), true); 
    $etudiants = [];
    
    //  Transformation des objets de type stdclass en objet Etudiant
    foreach($response as $e) {
        $etudiants[] = new Etudiant($e["id"], $e["nom"], $e["prenom"]);
    }

    return $etudiants;
}

function selectEtudiant($id) {
    include('config.php');

    $reponse = $bdd->prepare("SELECT * FROM etudiant where id = :id");
    $reponse->bindParam(':id', $id, PDO::PARAM_INT);
    $reponse->execute();

    $data = $reponse->fetch(PDO::FETCH_ASSOC);

    $etudiant = new Etudiant($data["id"], $data["nom"], $data["prenom"]);

    echo $etudiant;
}
?>