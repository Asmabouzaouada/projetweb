<?php
require_once '..\..\controller\CommandeController.php';
require_once '..\..\model\Commande.php';
require_once '..\..\controller\PanierController.php';

$panierController = new PanierController();
$panierList = $panierController->listPaniers();

if (isset($_GET['id_panier'])) {
    $id_panier = $_GET['id_panier'];
}else {
    header("Location: ../Panier/AfficheListePanierFront.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commandeController = new CommandeController();

    $adresse = $_POST['adresse_livraison'];
    $date_commande = $_POST['date_commande'];
    $client_nom = $_POST['client_nom'];

    $commande = new Commande($adresse , $date_commande, $client_nom, $id_panier);
    $commandeController->addCommand($commande);

    header("Location: ../Commande/AfficheListeCommandeFront.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>sungla</title>
    <link rel="stylesheet" href="../front office/css/bootstrap.min.css">
    <link rel="stylesheet" href="../front office/css/style.css">
    <link rel="stylesheet" href="../front office/css/responsive.css">
    <link rel="icon" href="../front office/images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="../front office/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-dLjNlY+4D1Zz2UuU09VuC1vYUAfxYlA6aOM2mM3U8QD9xl9YNT2Vb4piKcyjxmP" crossorigin="anonymous">
    <link rel="stylesheet" href="../front office/style.css">
</head>

<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="../front office/images/loading.gif" alt="#" /></div>
    </div>
    <header>
        <div class="header">
            <div class="container-fluid">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                                <li>
                                    <a class="nav-link" href="../Commande/AfficheListeCommandeFront.php">Mes
                                        Commandes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../Panier/AjouterNewPanierFront.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                        </svg>
                                        Shop
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../Panier/AfficheListePanierFront.php"> <svg
                                            xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M388.3 104.1a4.7 4.7 0 0 0 -4.4-4c-2 0-37.2-.8-37.2-.8s-21.6-20.8-29.6-28.8V503.2L442.8 472S388.7 106.5 388.3 104.1zM288.7 70.5a116.7 116.7 0 0 0 -7.2-17.6C271 32.9 255.4 22 237 22a15 15 0 0 0 -4 .4c-.4-.8-1.2-1.2-1.6-2C223.4 11.6 213 7.6 200.6 8c-24 .8-48 18-67.3 48.8-13.6 21.6-24 48.8-26.8 70.1-27.6 8.4-46.8 14.4-47.2 14.8-14 4.4-14.4 4.8-16 18-1.2 10-38 291.8-38 291.8L307.9 504V65.7a41.7 41.7 0 0 0 -4.4 .4S297.9 67.7 288.7 70.5zM233.4 87.7c-16 4.8-33.6 10.4-50.8 15.6 4.8-18.8 14.4-37.6 25.6-50 4.4-4.4 10.4-9.6 17.2-12.8C232.2 54.9 233.8 74.5 233.4 87.7zM200.6 24.4A27.5 27.5 0 0 1 215 28c-6.4 3.2-12.8 8.4-18.8 14.4-15.2 16.4-26.8 42-31.6 66.5-14.4 4.4-28.8 8.8-42 12.8C131.3 83.3 163.8 25.2 200.6 24.4zM154.2 244.6c1.6 25.6 69.3 31.2 73.3 91.7 2.8 47.6-25.2 80.1-65.7 82.5-48.8 3.2-75.7-25.6-75.7-25.6l10.4-44s26.8 20.4 48.4 18.8c14-.8 19.2-12.4 18.8-20.4-2-33.6-57.2-31.6-60.8-86.9-3.2-46.4 27.2-93.3 94.5-97.7 26-1.6 39.2 4.8 39.2 4.8L221.4 225.4s-17.2-8-37.6-6.4C154.2 221 153.8 239.8 154.2 244.6zM249.4 82.9c0-12-1.6-29.2-7.2-43.6 18.4 3.6 27.2 24 31.2 36.4Q262.6 78.7 249.4 82.9z" />
                                        </svg> Mon Panier</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" href="shop.html">Book a consulation</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contact Us</a>
                              </li>
                              <!--<li class="nav-item d_none">
                                 <a class="nav-link" href="cart.html">cart</a>
                              </li>-->
                              <li class="nav-item d_none login_btn">
                                 <a class="nav-link" href="login.html">login</a>
                              </li>
                              
                              <li class="nav-item d_none sea_icon">
                                 <a class="nav-link" href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i><i class="fa fa-search" aria-hidden="true"></i></a>
                              </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="glasses">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1>commande</h1>
                    <div class="titlepage">
                        <form method="post" action="" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="adresse_livraison">Adresse Livraison:</label>
                                <input type="text" name="adresse_livraison" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="date_commande">Date Commande:</label>
                                <input type="date" name="date_commande" id="date_commande" class="form-control"
                                    required>
                                <span id="dateError" style="color: red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="client_nom">Client Nom (Caps only):</label>
                                <input type="text" name="client_nom" id="client_nom" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">commande Confirmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <script src="../front office/js/jquery.min.js"></script>
    <script src="../front office/js/popper.min.js"></script>
    <script src="../front office/js/bootstrap.bundle.min.js"></script>
    <script src="../front office/js/jquery-3.0.0.min.js"></script>
    <script src="../front office/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../front office/js/custom.js"></script>
    <script src="../front office/script.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
</body>

</html>