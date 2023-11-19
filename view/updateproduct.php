<?php

include '../controller/produitC.php';
include '../model/produit.php';
$error = "";


// create product
$produit = null;
// create an instance of the controller
$produitC = new produitC();


if (
    isset($_POST["nom_prod"]) &&
    isset($_POST["image_prod"]) &&
    isset($_POST["quantite"]) &&
    isset($_POST["categorie"]) &&
    isset($_POST["prix_prod"]) &&
    isset($_POST["descrip"])
) {
    if (
        !empty($_POST["nom_prod"]) &&
        !empty($_POST["image_prod"]) &&
        !empty($_POST["quantite"]) &&
        !empty($_POST["categorie"]) &&
        !empty($_POST["prix_prod"]) &&
        !empty($_POST["descrip"])
    ) {

        $produit = new produit(
            null,
            $_POST['nom_prod'],
            $_POST['image_prod'],
            $_POST['quantite'],
            $_POST['categorie'],
            $_POST['prix_prod'],
            $_POST['descrip']
        );
        //var_dump($produit);

        $produitC->updateproduct($produit, $_POST['id_prod']);

        header('Location:back office appearance/preferences.php');
    } else
        $error = '<span style="color: red;">Missing information</span>';
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="back office appearance/preferences.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_prod'])) {
        $produit = $produitC->showproduit($_POST['id_prod']);

    ?>

        <form action="updateproduct.php" method="POST">

            <table>
                <tr>
                    <td><label for="nom_prod">Id produit :</label></td>
                    <td>
                        <input type="text" id="id_prod" name="id_prod" value="<?php echo $_POST['id_prod'] ?>" readonly />
                        <span id="erreurnom_prod" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_prod">Nom Produit :</label></td>
                    <td>
                        <input type="text" id="nom_prod" name="nom_prod" value="<?php echo $produit['nom_prod'] ?>" />
                        <span id="erreurnom_prod" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="image_prod">Image :</label></td>
                    <td>
                        <input type="text" id="image_prod" name="image_prod" value="<?php echo $produit['image_prod'] ?>" />
                        <span id="erreurimage_prod" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="quantite">quantite :</label></td>
                    <td>
                        <input type="text" id="quantite" name="quantite" value="<?php echo $produit['quantite'] ?>" />
                        <span id="erreurquantite" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="categorie">Catégorie :</label></td>
                    <td>
                        <input type="text" id="categorie" name="categorie" value="<?php echo htmlspecialchars($produit['categorie']) ?>" />
                        <span id="erreurcategorie" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="prix_prod">Prix :</label></td>
                    <td>
                        <input type="text" id="prix_prod" name="prix_prod" value="<?php echo $produit['prix_prod'] ?>" />
                        <span id="erreurPrix" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="descrip">Description :</label></td>
                    <td>
                        <input type="text" id="descrip" name="descrip" value="<?php echo $produit['descrip'] ?>" />
                        <span id="erreurDescrip" style="color: red"></span>
                    </td>
                </tr>



                <td>

                    <input type="submit" value="Save" onclick="console.log('Save button clicked');">
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