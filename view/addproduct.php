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
        header('Location: back office appearance/preferences.php');
    } else {
        $error = '<span style="color: red;">Missing information</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
    <script>
        function validateForm() {
            var nom_prod = document.getElementById("nom_prod").value;
            var image_prod = document.getElementById("image_prod").value;
            var quantite = document.getElementById("quantite").value;
            var categorie = document.getElementById("categorie").value;
            var prix_prod = document.getElementById("prix_prod").value;

            // Check for missing fields
            if (nom_prod === '' || image_prod === '' || quantite === '' || categorie === '' || prix_prod === '') {
                alert("Please fill in all fields");
                return false;
            }

            // Validate category
            // var validCategories = ['A', 'B', 'C', 'D', 'E', 'F'];
            // if (validCategories.indexOf(categorie.toUpperCase()) === -1) {
            //     alert("Invalid category. Category must be A, B, C, D, E, or F.");
            //     return false;
            // }

            // If all checks pass, allow the form to be submitted
            return true;
        }
    </script>


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

    <div class="container">
        <h2>Add Product</h2>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" method="POST" onsubmit="return validateForm()">
            <label for="nom_prod">Nom du produit:</label>
            <input type="text" id="nom_prod" name="nom_prod" required>

            <label for="image_prod">Image du produit:</label>
            <input type="text" id="image_prod" name="image_prod" required>

            <label for="quantite">Quantité:</label>
            <input type="text" id="quantite" name="quantite" required>




            <label for="prix_prod">Prix du produit:</label>
            <input type="text" id="prix_prod" name="prix_prod" required>

            <label for="descrip">Description du produit:</label>
            <input type="text" id="descrip" name="descrip" required>
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
            <input type="submit" value="Save">
            <input type="reset" value="Reset">
        </form>
    </div>
</body>

</html>