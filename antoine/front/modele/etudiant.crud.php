<?php

include('config.php');
require_once('etudiant.class.php');

function getAllEtudiant() {
    //  http://localhost:3200/ --> Lien vers l'api
    $path = Api::gePath()."/etudiants";

    // Envoie d'une requête de type GET
    $response = json_decode(file_get_contents($path), true);
    
    $etudiants = [];
    if($response['success'] == true) {
        //  Transformation des objets de type stdclass en objet Etudiant
        foreach($response['data'] as $e) {
            $etudiants[] = new Etudiant($e["id"], $e["nom"], $e["prenom"]);
        }
        return $etudiants;
    }else {
        echo "erreur";
        var_dump($response['message']);
        die;
    }

}

function createEtudiant($nom, $prenom) {
    $path = Api::gePath()."/etudiants/create";
    //  Creation de notre tableau de donnée a envoyer a l'API
    // On peut aussi creer un objet, et l'encoder en JSON (La class doit redefinir la methode jsonSerialize() voir API)
    $postdata = array (
        "nom" => $nom,
        "prenom" => $prenom
    );
    // Création de notre requete HTTP
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    //  Création d'un context
    $context  = stream_context_create($opts);
    
    //  Envoie de la requête a l'api, stock le retour dans $success
    //  Attention :
    //      - au message JSON retourner : Si JSON retour = [ "success" => "true", "data" => [....]]
    //      - alors Les données se trouvent dans $success[1]
    $success = file_get_contents($path, false, $context);
    
    return $success;
}

function deleteEtudiant($id) {
    $path = Api::gePath()."/etudiants/delete";
    
    $postdata = array (
        "id" => $id
    );
    
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    
    $context  = stream_context_create($opts);
    
    $success = file_get_contents($path, false, $context);
    
    return $success;
}

?>