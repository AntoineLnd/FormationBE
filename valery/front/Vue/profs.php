<div class="container">
    <h1>
        ICI LA LISTE DES ENSEIGNANTS
    </h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>FirstName</th>
            <th>Mail</th>
            <th>Delete</th>
        </tr>
        <?php
            foreach($profs as $prof) {
                ?>
                <tr>
                    <td><?php echo $prof->id; ?></td>
                    <td><?php echo $prof->nom; ?></td>
                    <td><?php echo $prof->prenom; ?></td>
                    <td><?php echo $prof->email; ?></td>
                    <td>
                        <a href="?page=controleProf&action=deleteProf&id=<?php echo $prof->id; ?>">Supprimer !</a>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
    <h2>
            Create Prof :
    </h2>
    <form method="post" action="?page=controleProf&action=createProf">
            <label for="nom">Nom :</label>
            <input id="nom" name="nom" type="text">
            <label for="prenom">Prenom :</label>
            <input id="prenom" name="prenom" type="text">
            <label for="email">Mail :</label>
            <input id="email" name="email" type="text">
            <button> Créer !</button>
    </form>
</div>