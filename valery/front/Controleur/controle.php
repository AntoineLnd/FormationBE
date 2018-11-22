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

        case 'Etudiant':
            require_once('vue/selectEtudiant.php');
        break;

        case 'selectEtudiant':
            if (isset($_POST["idEtudiant"])){
                require_once('modele/etudiant.crud.php');
                $etudiant = selectEtudiant($_POST["idEtudiant"]);
                include 'vue/selectEtudiant.php';
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
