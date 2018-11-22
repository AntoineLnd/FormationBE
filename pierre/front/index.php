<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>
            Gestion Etudiant
        </title>
        <link rel="stylesheet" href="style/css/style.css">
    </head>
    <body>
    <?php
        include 'vue/include/header.inc.php';

        if(!isset($_GET['page']))
        {
            include 'vue/include/index.inc.php';
        }
        else
        {
            $page = $_GET['page'];

            if(file_exists("controler/$page.php"))
            {
                include "controler/$page.php";
            }
            else
            {
                include "vue/include/error.inc.php";
            }
        }
        include "vue/include/footer.inc.php";
     ?>

    </body>
</html>