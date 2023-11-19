<?php
include "../controller/commandeC.php";

$c = new commandeC();
$tab = $c->listcommand();
$tab2 = $c->listcommand2();

?>

<center>
    <h1>List of players</h1>
    <h2>
        <a href="addcomm.php">Add player</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id c</th>
        <th>adresse</th>
        <th>date</th>
        <th>id panier</th>
        <th>nom</th>
        <th>quantite</th>
        <th>montant</th>
        <th>Delete</th>
    </tr>

<tr>
    <?php
    foreach ($tab  as $command) {
    ?>
            <td><?= $command['id_c']; ?></td>
            <td><?= $command['adresse']; ?></td>
            <td><?= $command['date']; ?></td>

            <!--<td align="center">
                <form method="POST" action="updatecomm.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=.. //echo $command['id']; .. name="id">
                </form>
            </td>
            <td>
                <a href="deletecomm.php?id=.. echo $command['id']; ?>">Delete</a>
            </td>
        </tr>-->
    <?php
    }
    ?>
        <?php
    foreach ($tab2  as $command) {
    ?>
        
            <td><?= $command['id_panier']; ?></td>
            <td><?= $command['nom']; ?></td>
            <td><?= $command['quantite']; ?></td>
            <td><?= $command['prix']; ?></td>
            <!--<td align="center">
                <form method="POST" action="updatecomm.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=.. //echo $command['id']; .. name="id">
                </form>-->
            </td>
            </td>
            <td>
                <a href="deleteproduct.php?id_prod=<?php echo $command['id_c']; ?>">Delete</a>
            </td>
            </tr>
        
    <?php
    }
    ?></tr>
</table>