<?php 

require_once("etudiant.class.php");
require_once("personne.class.php");


$etudiant = new Etudiant(1413011084, "Antoine", "LeMichelle", date("Y/m/d"));
$personne = new Personne("Kevin", "vavelin", date("Y/m/d"));

//$etudiant->afficherCours();
//$etudiant->afficherAnnee();
echo $etudiant;
echo $personne;
?>