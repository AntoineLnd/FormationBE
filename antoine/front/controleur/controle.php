<?php
if(isset($_GET['action']))
{
    switch ($_GET['action'])
    {
        case 'listEtudiant':
            require_once('modele/etudiant.crud.php');
            $etudiants = getAllEtudiant();
            include 'vue/etudiants.php';

        break;

        case 'etudiant':

        require_once("vue/selectEtudiant.php");

        break;

        case 'selectEtudiant':

        if(isset($_POST["id"])) 
        {   
            $id = $_POST["id"];
            require_once('modele/etudiant.crud.php');
            $etudiant = selectEtudiant($id);
        }

        break;

        default:

            include 'vue/include/error.inc.php';

        break;
    }
}
else
{
    header('Location:index.php');
}

 ?>
