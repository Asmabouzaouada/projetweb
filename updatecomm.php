<?php

include '../Controller/commandeC.php';
include '../model/commande.php';
$error = "";

// create client
$command = null;
// create an instance of the controller
$commandeC = new commandeC();


if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["quan"]) &&
    isset($_POST["dat"])
) {
    if (
        !empty($_POST['id']) &&
        !empty($_POST['nom']) &&
        !empty($_POST["prix"]) &&
        !empty($_POST['adresse']) &&
        !empty($_POST['quan']) &&
        !empty($_POST["dat"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $command = new commande(
            null,
            $_POST['id'],
            $_POST['nom'],
            $_POST['prix'],
            $_POST['adresse'],
            $_POST['quan'],
            $_POST['dat']

        );
        var_dump($commande);
        
        $commandC->updatecomm($commande, $_POST['id']);

        header('Location:listcomm.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listcomm.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $commande = $commandeC->showcommand($_POST['id']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id">Id :</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $commande['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="quan">qanutite :</label></td>
                    <td>
                        <input type="text" id="quan" name="quan" value="<?php echo $commande['quan'] ?>" />
                        <span id="erreurquan" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">adresse :</label></td>
                    <td>
                        <input type="text" id="adresse" name="adresse" value="<?php echo $commande['adresse'] ?>" />
                        <span id="erreuradresse" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix">prix :</label></td>
                    <td>
                        <input type="text" id="prix" name="prix" value="<?php echo $commande['prix'] ?>" />
                        <span id="erreurprix" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="dat">date :</label></td>
                    <td>
                        <input type="text" id="dat" name="dat" value="<?php echo $commande['dat'] ?>" />
                        <span id="erreurdat" style="color: red"></span>
                    </td>
                </tr>


                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>