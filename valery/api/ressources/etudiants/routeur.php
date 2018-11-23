<?php 

include('etudiant.class.php');

switch($url) {
    case '/'.$root:
        getAll();
        break;
    default:
        echo "Error Etudiant : no match root !";
        break;
}

function getAll() {
    include('connect.php');
    
    try {
        $data = $DBConnection->query("SELECT * FROM etudiant");
        $etudiants = [];
  
        while ($req = $data->fetch()) {
        $etudiants[] = new Etudiant($req["id"], $req["nom"], $req["prenom"]);
        }
        
        $message = ["success" => true, "data" => $etudiants];

        echo json_encode($message);
    
    } catch (Exception $e) {
    
        die('ERROR :'.$e->getMessage());
    }
}

?>