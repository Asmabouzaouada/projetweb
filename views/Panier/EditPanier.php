<?php
require_once '..\..\controller\PanierController.php';
require_once '..\..\model\Panier.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $panierController = new PanierController();
    $panier = $panierController->getPanierById($id);

    if ($panier) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $panierController = new PanierController();

            $quantite = $_POST['quantite'];
            $prix = $_POST['prix'];
            $nom_produit = $_POST['nom_produit'];
            $description_produit = $_POST['description_produit'];

            $panier = new Panier($quantite, $prix, $nom_produit, $description_produit);
            $panierController->updatePanier($id, $panier);

            header("Location: ../Panier/AfficheListePanier.php");
            exit();
        }
    } else {
        header("Location: ../Panier/AfficheListePanier.php");
        exit;
    }
} else {
    header("Location: ../Panier/AfficheListePanier.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Admin Dashboard - Add Panier</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet'
        type='text/css'>
    <link href="../back office/css/font-awesome.min.css" rel="stylesheet">
    <link href="../back office/css/bootstrap.min.css" rel="stylesheet">
    <link href="../back office/css/templatemo-style.css" rel="stylesheet">
</head>

<body>
    <div class="templatemo-flex-row">
        <div class="templatemo-sidebar">
            <header class="templatemo-site-header">
                <div class="square"></div>
                <h1>Visual Admin</h1>
            </header>
            <div class="profile-photo-container">
                <img src="images/profile-photo.png" alt="Profile Photo" class="img-responsive">
                <div class="profile-photo-overlay"></div>
            </div>
            <div class="mobile-menu-icon">
                <i class="fa fa-bars"></i>
            </div>
            <nav class="templatemo-left-nav">
                <ul>
                    <li><a href="../Commande/AfficheListeCommande.php"><i class="fa fa-home fa-fw"></i>Commande</a></li>
                    <li><a href="../Panier/AfficheListePanier.php" class="active"><i
                                class="fa fa-bar-chart fa-fw"></i>Panier</a></li>
                </ul>
            </nav>
        </div>
        <div class="templatemo-content col-1 light-gray-bg">
            <div class="templatemo-top-nav-container">
            </div>
            <div class="templatemo-content-container">
                <h2>Edit TT</h2>
                <form method="post" action="" onsubmit="return validateForm()">
                    <span id="quantiteError" class="error"></span>
                    <span id="prixError" class="error"></span>
                    <span id="nomProduitError" class="error"></span>

                    <div class="form-group">
                        <label for="quantite">Quantite:</label>
                        <input type="number" name="quantite" class="form-control" required
                            value="<?php echo $panier['quantite']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix:</label>
                        <input type="number" name="prix" class="form-control" required
                            value="<?php echo $panier['prix']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="nom_produit">Nom Produit:</label>
                        <input type="text" name="nom_produit" class="form-control" required
                            value="<?php echo $panier['nom_produit']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="description_produit">Description Produit:</label>
                        <input type="text" name="description_produit" class="form-control" required
                            value="<?php echo $panier['description_produit']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Panier</button>
                </form>
            </div>
        </div>

        <script>
            function validateForm() {

                var quantite = document.forms[0]["quantite"].value;
                if (parseFloat(quantite) <= 0) {
                    document.getElementById("quantiteError").innerHTML = "Invalid quantity. Please enter a positive number.";
                    return false;
                } else {
                    document.getElementById("quantiteError").innerHTML = "";
                }

                var prix = document.forms[0]["prix"].value;
                if (parseFloat(prix) <= 0) {
                    document.getElementById("prixError").innerHTML = "Invalid price. Please enter a positive number.";
                    return false;
                } else {
                    document.getElementById("prixError").innerHTML = "";
                }
                var nomProduitInput = document.forms[0]["nom_produit"];
                var nomProduit = nomProduitInput.value;

                if (/^[A-Z\s]+$/.test(nomProduit)) {
                    document.getElementById("nomProduitError").innerHTML = "";
                    return true;
                } else {
                    document.getElementById("nomProduitError").innerHTML = "Invalid product name. Please use only uppercase letters and spaces.";
                    return false;
                }
                return true;
            }
        </script>

        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://www.google.com/jsapi"></script>
        <script type="../back officetext/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
</body>

</html>