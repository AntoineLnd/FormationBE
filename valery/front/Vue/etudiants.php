<div class="container">
    <h1>
        ICI LA LISTE DES ETUDIANTS
    </h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>FirstName</th>
        </tr>
        <?php
            foreach($etudiants as $e) {
                ?>
                <tr>
                    <td><?php echo $e->id; ?></td>
                    <td><?php echo $e->nom; ?></td>
                    <td><?php echo $e->prenom; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>
</div>