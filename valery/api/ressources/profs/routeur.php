<?php 

include('prof.class.php');

switch($url) {
    case '/'.$root:
        getAll();
        break;
    case '/'.$root.'/create':
        createProf($data);
        break;
    case '/'.$root.'/delete':
        deleteProf($data);
        break;
    default:
        echo "Error Etudiant : no match root !";
        break;
}

function getAll() {
    include('connect.php');
    
    try {
        $data = $DBConnection->query("SELECT * FROM professeur");
        $profs = [];
  
        while ($req = $data->fetch()) {
        $profs[] = new Prof($req["nom"], $req["prenom"], $req["email"], $req["id"]);
        }
        
        $message = ["success" => true, "data" => $profs];
        
        echo json_encode($message);
    
    } catch (Exception $e) {
    
        die('ERROR :'.$e->getMessage());
    }
}

function createEtudiant($dataReq) {
    include('connect.php');
    
    try {
        $data = $DBConnection->prepare("INSERT INTO professeur(nom, prenom, email) VALUES (:nom, :prenom, :email)");
        $data->bindParam(':nom', $dataReq["nom"], PDO::PARAM_STR);
        $data->bindParam(':prenom', $dataReq["prenom"], PDO::PARAM_STR);
        $data->bindParam(':email', $dataReq["email"], PDO::PARAM_STR);
        $data->execute();

        echo true;
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
}

function deleteProf($dataReq) {
    include('connect.php');
    
    try {
        $reponse = $bdd->prepare("DELETE FROM professeur WHERE id = :id ");
        $reponse->bindParam(':id', $dataReq["id"], PDO::PARAM_INT);
        $reponse->execute();

        echo true;
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
}

?>