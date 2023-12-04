<?php

require_once '..\..\controller\CommandeController.php';
require_once '..\..\model\Commande.php';
require_once '..\..\controller\PanierController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $panierController = new PanierController();

    $panierList = $panierController->listPaniers();

    $commandeController = new CommandeController();
    $commande = $commandeController->showCommand($id);

    if ($commande) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commandeController = new CommandeController();

            $adresse = $_POST['adresse_livraison'];
            $date_commande = $_POST['date_commande'];
            $client_nom = $_POST['client_nom'];
            $id_panier = $_POST['id_panier'];

            $commande = new Commande($adresse, $date_commande, $client_nom, $id_panier);
            $commandeController->updateCommand($commande, $id);

            header("Location: ../Commande/AfficheListeCommande.php");
            exit();
        }
    } else {
        header("Location: ../Commande/AfficheListeCommande.php");
        exit;
    }
} else {
    header("Location: ../Commande/AfficheListeCommande.php");
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
            <div class="templatemo-content-container">
                <h2>Edit Commande</h2>
                <form method="post" action="" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="adresse_livraison">Adresse Livraison:</label>
                        <input type="text" name="adresse_livraison" class="form-control"
                            value="<?php echo isset($commande) ? htmlspecialchars($commande['adresse_livraison']) : ''; ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="date_commande">Date Commande:</label>
                        <input type="date" name="date_commande" id="date_commande" class="form-control" required
                            value="<?php echo isset($commande) ? htmlspecialchars($commande['date_commande']) : ''; ?>">
                        <span id="dateError" style="color: red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="client_nom">Client Nom (Caps only):</label>
                        <input type="text" name="client_nom" id="client_nom" class="form-control" required
                            value="<?php echo isset($commande) ? htmlspecialchars($commande['client_nom']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_panier">Nom Panier:</label>
                        <select name="id_panier" class="form-control" required>
                            <?php foreach ($panierList as $panier): ?>
                                <option value="<?php echo $panier['id_panier']; ?>">
                                    <?php echo $panier['nom_produit']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Commande</button>
                </form>
            </div>
        </div>

        <script>
            function validateForm() {
                var dateCommande = document.getElementById("date_commande").value;
                var currentDate = new Date().toISOString().split('T')[0];

                if (dateCommande <= currentDate) {
                    document.getElementById("dateError").innerHTML = "Invalid date. Please select a date greater than the current date.";
                    return false;
                } else {
                    document.getElementById("dateError").innerHTML = "";
                }

                var clientNom = document.getElementById("client_nom").value;

                if (!/^[A-Z\s]+$/.test(clientNom)) {
                    alert("Invalid client name. Please use only uppercase letters and spaces.");
                    return false;
                }

                return true;
            }
        </script>

        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://www.google.com/jsapi"></script>
        <script type="../back officetext/javascript" src="js/templatemo-script.js"></script>
</body>

</html>