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
