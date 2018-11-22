<?php
  
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

  include('connect.php');
  include('etudiant.class.php');

  $data = $DBConnection->query("SELECT * FROM etudiant");
  $etudiants = [];

  while ($req = $data->fetch()) {
      $etudiants[] = new Etudiant($req["id"], $req["nom"], $req["prenom"]);
  }

  echo json_encode($etudiants);

  //phpinfo();
?>