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
        $produit = new Produit(
            null,
            $_POST['nom_prod'],
            $_POST['image_prod'],
            $_POST['quantite'],
            $_POST['categorie'],
            $_POST['prix_prod'],
            $_POST['descrip']
        );
        $produitC->addproduct($produit);
        header('Location:back office appearance/preferences.php');
    } else {
        $error = '<span style="color: red;">Missing information</span>';

    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
    <script>
        function validateForm() {
            var nomProd = document.getElementById('nom_prod').value;
            var imageProd = document.getElementById('image_prod').value;
            var quantite = document.getElementById('quantite').value;
            var categorie = document.getElementById('categorie').value;
            var prix_prod = document.getElementById('prix_prod').value;
            var descrip = document.getElementById('descrip').value;

            // Reset error messages
            document.getElementById('erreurNomProd').innerHTML = '';
            document.getElementById('erreurImageProd').innerHTML = '';
            document.getElementById('erreurQuantite').innerHTML = '';
            document.getElementById('erreurCategorie').innerHTML = '';
            document.getElementById('erreurPrix').innerHTML = '';
            document.getElementById('erreurDescrip').innerHTML = '';

            var isValid = true;

            // Check if fields are empty
            if (nomProd === '') {
                document.getElementById('erreurNomProd').innerHTML = 'Nom du produit est requis.';
                isValid = false;
            }

            if (imageProd === '') {
                document.getElementById('erreurImageProd').innerHTML = 'Image du produit est requise.';
                isValid = false;
            }

            if (quantite === '') {
                document.getElementById('erreurQuantite').innerHTML = 'Quantité est requise.';
                isValid = false;
            }

            if (categorie === '') {
                document.getElementById('erreurCategorie').innerHTML = 'Catégorie est requise.';
                isValid = false;

            }

            if (prix_prod === '') {
                document.getElementById('erreurPrix').innerHTML = 'prix du produit est requis.';
                isValid = false;
            }
            if (descrip === '') {
                document.getElementById('erreurDescrip').innerHTML = 'description du produit est requis.';
                isValid = false;
            } else {
                // Check if the category is one of A, B, C, D, E, or F
                var validCategories = ['A', 'B', 'C', 'D', 'E', 'F'];
                if (validCategories.indexOf(categorie.toUpperCase()) === -1) {
                    document.getElementById('erreurCategorie').innerHTML = 'Catégorie doit être A, B, C, D, E, ou F.';
                    isValid = false;
                }
            }

            return isValid;
        }
    </script>
</head>

<body>
    <a href="listProduits.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table>

            <tr>
                <td><label for="nom_prod">Nom du produit :</label></td>
                <td>
                    <input type="text" id="nom_prod" name="nom_prod" />
                    <span id="erreurNomProd" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="image_prod">Image du produit :</label></td>
                <td>
                    <input type="text" id="image_prod" name="image_prod" />
                    <span id="erreurImageProd" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="quantite">Quantité :</label></td>
                <td>
                    <input type="text" id="quantite" name="quantite" />
                    <span id="erreurQuantite" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="categorie">Catégorie :</label></td>
                <td>
                    <input type="text" id="categorie" name="categorie" />
                    <span id="erreurCategorie" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prix_prod">Prix du produit :</label></td>
                <td>
                    <input type="text" id="prix_prod" name="prix_prod" />
                    <span id="erreurPrix" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="descrip">Description du produit :</label></td>
                <td>
                    <input type="text" id="descrip" name="descrip" />
                    <span id="erreurNomProd" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>