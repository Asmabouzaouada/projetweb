<?php

require_once '..\..\controller\CommandeController.php';
require_once '..\..\controller\PanierController.php';

$commandeController = new CommandeController();
$panierController = new PanierController();

$commands = $commandeController->listCommand();
$paniers = $panierController->listPaniers();

$commandeCount = count($commands);
$panierCount = count($paniers);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visual Admin Dashboard - Home</title>
  <meta name="description" content="">
  <meta name="author" content="templatemo">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
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
      <form class="templatemo-search-form" role="search">
        <div class="input-group">
          <button type="submit" class="fa fa-search"></button>
          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        </div>
      </form>
      <div class="mobile-menu-icon">
        <i class="fa fa-bars"></i>
      </div>
      <nav class="templatemo-left-nav">
        <ul>
          <li><a href="../Commande/AfficheListeCommande.php" class="active"><i class="fa fa-home fa-fw"></i>Commande</a>
          </li>
          <li><a href="../Panier/AfficheListePanier.php"><i class="fa fa-bar-chart fa-fw"></i>Panier</a></li>
        </ul>
      </nav>
    </div>
    <div class="templatemo-content col-1 light-gray-bg">
      <div class="templatemo-top-nav-container">
      </div>
      <div class="templatemo-content-container">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

        <canvas id="commandsPanierChart"></canvas>

        <script>
          const ctx = document.getElementById('commandsPanierChart').getContext('2d');
          const chart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: ['Commands', 'Paniers'],
              datasets: [{
                label: 'Count',
                data: [<?= $commandeCount ?>, <?= $panierCount ?>],
                backgroundColor: ['#ff6384', '#4bc0c0']
              }]
            },
            options: {
              responsive: true,
              legend: {
                display: true,
                position: 'right'
              }
            }
          });
        </script>
      </div>
    </div>
  </div>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://www.google.com/jsapi"></script>
  <script type="../back officetext/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
</body>

</html>