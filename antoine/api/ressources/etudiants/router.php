<?php 

// Include de notre classe Etudiant
include('etudiant.class.php');

/*
*   Switch sur le type de route demandé
*/
switch($url) {
    case '/'.$root:             // /etudiant
        getAll();
        break;
    case '/'.$root.'/create':   // /etudiant/create
        createEtudiant($data);
        break;
    case '/'.$root.'/delete':   // /etudiant/delete
        deleteEtudiant($data);
        break;
    default:
        echo "Error Etudiant : no match root !";
        break;
}

function getAll() {
    include('connect.php'); // Include de notre connexion a la DBO
    
    try {
        /*
        *   Utilisation de l'objet PDO $bdd pour la requête
        */
        $reponse = $bdd->query("SELECT * FROM etudiant");
        $reponse->execute();
        
        $etudiants = [];
        
        //  Stocke chacune des lignes de la reponse dans notre tableau etudiant [],
        //  Ici utilisation de fetchObjec(Etudiant::class)
        while ($e = $reponse->fetchObject(Etudiant::class)) {
            $etudiants[] = $e;
        }
        
        //  Création  de notre message de retour 
        $message = ["success" => true, "data" => $etudiants];

    } catch (Exception $e) {
        $message = ["success" => false, "data" => null, "message" => $e->getMessage()];
    }
    //  Renvoi de notre message a l'applicatif
    echo json_encode($message);
}

function createEtudiant($data) {
    include('connect.php');
    
    try {
        $reponse = $bdd->prepare("INSERT INTO etudiant(nom, prenom) VALUES (:nom, :prenom)");
        $reponse->bindParam(':nom', $data["nom"], PDO::PARAM_STR);
        $reponse->bindParam(':prenom', $data["prenom"], PDO::PARAM_STR);
        $reponse->execute();

        echo true;
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
}

function deleteEtudiant($data) {
    include('connect.php');
    
    try {
        $reponse = $bdd->prepare("DELETE FROM etudiant WHERE id = :id ");
        $reponse->bindParam(':id', $data["id"], PDO::PARAM_INT);
        $reponse->execute();

        echo true;
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
}

?>