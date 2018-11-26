<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

/*
*   $_SERVER['PATH_INFO'] = permet de recupérer la 2nd partie d'une url : 
*   
*   http://monAPi.be/etudiants/create ==> $_SERVER['PAHT_INFO'] = "etudiants/create";
*
*   Si $_SERVER['PATH_INFO'], $root = "etudiants" | $url = "etudiants/create"
*   Sinon root et page par défault
*
*/
if (isset($_SERVER['PATH_INFO'])) {
    $root = explode('/', $_SERVER['PATH_INFO'])[1]; // [1] car explode retourne ['', 'etudiant', ...]
    $url = $_SERVER['PATH_INFO'];
} else {
    $root = 'default';
    $url = '/';
}
/*
*
*   file_get_contents("php://input") ==> Permet de recupére le corps de la requpête http.
*   Concerne les requête POST/PUT/DELETE qui possède des données en json.
*
*/
$data = [];
if(file_get_contents("php://input") != "") {
    $jsonData = file_get_contents("php://input");
    $data = json_decode($jsonData, true);
}

/*
*   Require de la ressource rechercher
*/
if (!file_exists('./ressources/'.$root.'/router.php')) { 
    echo 'Ressource not found !';
} 
else {
  require('./ressources/'.$root.'/router.php');
}

?>