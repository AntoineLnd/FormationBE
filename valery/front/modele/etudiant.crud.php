<?php

require_once('config.php');
require_once('etudiant.class.php');

try{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO("mysql:host=" . $host . ";dbname=" . $bdd, $user, $password, $pdo_options);
    echo "bdd run";
}
catch (Exception $e){
    die("Error : " . $e->getMessage());
}

function getAllEtudiant() {

}

?>