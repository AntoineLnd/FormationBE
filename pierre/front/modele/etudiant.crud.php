<?php

require_once('config.php');
require_once('etudiant.class.php');

function getAllEtudiant() {
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$host.';dbname='.$bdd,$util,$password,$pdo_options);
	}
	catch(Exception $e) {
		die('Erreur :'.$e->getMessage());
	}
}

?>