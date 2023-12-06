<?php

include '../controller/produitC.php';
include '../model/produit.php';
$error = "";



$produit = null;
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="reset"] {
            background-color: #f44336;
            color: #fff;
            cursor: pointer;
        }

        #error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php require_once "../controller/categorieC.php";
    $CategorieC = new categorieC;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['categorie']) && isset($_POST['search'])) {
            $id_categorie = $_POST['categorie'];
            $list = $CategorieC->afficherProduit($id_categorie);
        }
    }
    ?>
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
                    <td><label for="prix_prod">Prix :</label></td>
                    <td>
                        <input type="text" id="prix_prod" name="prix_prod" value="<?php echo $produit['prix_prod'] ?>" />
                        <span id="erreurPrix" style="color: red"></span>
                    </td>
                </tr>

                <div class="dropdown">

                    <?php
                    $categoriess = $CategorieC->afficherCategories();
                    ?>
                    <label for="categorie">Categorie :</label>
                    <select name="categorie" id="categorie">
                        <?php
                        foreach ($categoriess as $categ) {
                            echo '<option value="' . $categ['id_categorie'] . '">' . $categ['nom_categorie'] . '</option>';
                        }
                        ?>
                </div>
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