<?php

include '../controller/commandeC.php';
include '../model/commande.php';

$error = "";

// create product
$commande = null;

// create an instance of the controller
$commandeC = new commandeC();

if (
    isset($_POST["id_c"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["date"]) &&
    isset($_POST["id_panier"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["quantite"])&&
    isset($_POST["prix"])

) {
    if (
        !empty($_POST["id_c"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["id_panier"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["quantite"])&&
        !empty($_POST["prix"])
    ) {
        $commande = new commande(
            null,
            $_POST['id_c'],
            $_POST['adresse'],
            $_POST['date'],
            $_POST['id_panier'],
            $_POST['nom'],
            $_POST['quantite'],
            $_POST['prix']
        );
        $commandeC->addCommand($commande);
        header('Location:back office listcomm.php');
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>commande</title>
   <!-- <script>
        function validateForm() {
            var idc = document.getElementById('id_c').value;
            var adresse = document.getElementById('adresse').value;
            var date = document.getElementById('date').value;
            var idp = document.getElementById('id_panier').value;
            var prix = document.getElementById('prix').value;
            var nom = document.getElementById('nom').value;
            var quantite = document.getElementById('quantite').value;


            // Reset error messages
            document.getElementById('erreuridc').innerHTML = '';
            document.getElementById('erreuradresse').innerHTML = '';
            document.getElementById('erreuridp').innerHTML = '';
            document.getElementById('erreurprix').innerHTML = '';
            document.getElementById('erreurnom').innerHTML = '';
            document.getElementById('erreurdate').innerHTML = '';
            document.getElementById('erreurquantite').innerHTML = '';

            var isValid = true;

            // Check if fields are empty
            if (idc === '') {
                document.getElementById('erreuridc').innerHTML = 'idc du produit est requis.';
                isValid = false;
            }

            if (adresse === '') {
                document.getElementById('erreuradresse').innerHTML = 'adresse du produit est requise.';
                isValid = false;
            }

            if (date === '') {
                document.getElementById('erreurdate').innerHTML = 'date est requise.';
                isValid = false;
            }

            if (prix === '') {
                document.getElementById('erreurprix').innerHTML = 'prix est requise.';
                isValid = false;

            }

            if (nom === '') {
                document.getElementById('erreurnom').innerHTML = 'nom du produit est requis.';
                isValid = false;
            }
            if (quantite === '') {
                document.getElementById('erreurquantite').innerHTML = 'quantite du produit est requis.';
                isValid = false;
            } else {
                if (idp === '') {
                document.getElementById('erreuridp').innerHTML =  'idp du produit est requis.';
                isValid = false;
            }
        }
            return isValid;
        }
    </script>-->
</head>

<body>
    <a href="listcomm.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table>

            <tr>
                <td><label for="idc">id de commande :</label></td>
                <td>
                    <input type="text" id="idc" name="idc" />
                    <span id="erreuridc" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="adresse">adresse :</label></td>
                <td>
                    <input type="text" id="adresse" name="adresse" />
                    <span id="erreuradresse" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date">date de livrison:</label></td>
                <td>
                    <input type="text" id="date" name="date" />
                    <span id="erreurdate" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="idp">id panier :</label></td>
                <td>
                    <input type="text" id="idp" name="idp" />
                    <span id="erreuridp" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prix">Prix totale:</label></td>
                <td>
                    <input type="text" id="prix" name="prix" />
                    <span id="erreurPrix" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nom">Description du produit :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="quantite">quantite :</label></td>
                <td>
                    <input type="text" id="quantite" name="quantite" />
                    <span id="erreurquantite" style="color: red"></span>
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