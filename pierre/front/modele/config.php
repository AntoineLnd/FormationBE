<?php
	
	$host = "192.168.0.44:80";
	$util = "root";
	$password = "admin";
	$bdd = "baseetudiant";

	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$host.';dbname='.$bdd,$util,$password,$pdo_options);
	}
	catch(Exception $e) {
		die('Erreur :'.$e->getMessage());
	}
?>