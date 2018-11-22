<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include('connect.php');
include('etudiant.class.php');

$reponse = $bdd->query("SELECT * FROM etudiant");
$reponse->execute();

$etudiants = [];

while($e = $reponse->fetch()) {
    $etudiants[] = new Etudiant($e["id"], $e["nom"], $e["prenom"]);
}

echo json_encode($etudiants);

?>