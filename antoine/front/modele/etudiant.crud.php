<?php

require_once('config.php');
require_once('etudiant.class.php');


function getAllEtudiant() {
    $path = Config::getPathAPI();
    
    $response = json_decode(file_get_contents($path."/etudiants"), true);
    $etudiants = [];
    
    foreach($response as $e) {
        $etudiants[] = new Etudiant($e["id"], $e["nom"], $e["prenom"]);
    }

    return $etudiants;
}

?>