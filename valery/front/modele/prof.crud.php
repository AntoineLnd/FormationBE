<?php

require_once('config.php');
require_once('prof.class.php');

function getAllProf(){
    $path = Api::getPath()."/profs";
    //Envoie une requte de type GET
    $data = json_decode(file_get_contents($path), true);
    $profs = [];
    
    foreach($data["data"] as $req) {
        $profs[] = new Prof($req["nom"], $req["prenom"], $req["email"], $req["id"]);
    }

    return $profs;
}

function createProf($nom, $prenom, $email){
    $path = Api::getPath()."/profs/create";
    
    $postdata = new Prof($nom, $prenom, $email);
    
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    
    $context  = stream_context_create($opts);
    
    $success = file_get_contents($path, false, $context);

    return $success;
}

function deleteProf($id){
    $path = Api::getPath()."/profs/delete";

    $postdata = ["id" => $id];
    
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    
    $context  = stream_context_create($opts);
    
    $success = file_get_contents($path, false, $context);
    
    return $success;
}

?>