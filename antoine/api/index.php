<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include('connect.php');
include('etudiant.class.php');

//var_dump($_SERVER['PATH_INFO']);

$reponse = $bdd->query("SELECT * FROM etudiant");
$reponse->execute();

$etudiants = [];

while($e = $reponse->fetchObject(Etudiant::class)) {
    $etudiants[] = $e;
}

echo json_encode($etudiants);

?>