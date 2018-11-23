<?php
if(isset($_GET['action']))
{
    switch ($_GET['action'])
    {
        case 'listProf':
            require_once('modele/prof.crud.php');
            $profs = getAllProf();
            include 'vue/profs.php';
            
            break;
            
        case 'createProf':
            require_once('modele/prof.crud.php');
            $success = createProf($_POST["nom"], $_POST["prenom"], $_POST["email"]);

            if($success == true) {
                $profs = getAllProf();
                include 'vue/profs.php';
            }
            else {
                header('Location:index.php');
            }

        break;

        case 'deleteProf':
            require_once('modele/prof.crud.php');
            
            $success = deleteProf($_GET["id"]);
            
            if($success == true) {
                $etudiants = getAllProf();
                include 'vue/profs.php';
            }
            else {
                header('Location:index.php');
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
