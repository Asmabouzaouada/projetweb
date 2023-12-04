<?php
require_once '..\..\controller\CommandeController.php';

$commandeController = new CommandeController();

$commands = $commandeController->listCommand();
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
        <a class="btn btn-primary" href="../Commande/StatsCommande.php" class="active"></i>Voir Stats</a>
        <div class="form-group">
          <label for="client_nom">Client Name:</label>
          <div class="input-group">
            <input type="text" id="client_nom" name="client_nom" class="form-control">
            <span class="input-group-addon">
              <button type="button" onclick="showCommandsByClient()" class="btn btn-primary">Show Commands</button>
            </span>
          </div>
        </div>
        <script>
          function showCommandsByClient() {
            var client_nom = document.getElementById('client_nom').value;
            window.location.href = 'AfficheListeCommandeUser.php?client_nom=' + client_nom;
          }
        </script>
        <h2>List of Commands</h2>
        <a href="../Commande/CreateNewCommande.php" class="btn btn-success"></i>Create Commande</a>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Delivery Address</th>
              <th>Order Date</th>
              <th>Client Name</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($commands as $command) {
              echo "<tr>";
              echo "<td>{$command['id_c']}</td>";
              echo "<td>{$command['adresse_livraison']}</td>";
              echo "<td>{$command['date_commande']}</td>";
              echo "<td>{$command['client_nom']}</td>";
              echo "<td>
              <a href=\"EditCommande.php?id={$command['id_c']}\" class=\"btn btn-primary\">Edit</a>
            <a href=\"DeleteCommande.php?id={$command['id_c']}\" class=\"btn btn-danger\" onclick=\"return confirm('Are you sure you want to delete this Commande?');\">Delete</a>
        "
              ;
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://www.google.com/jsapi"></script>
  <script type="../back officetext/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
</body>

</html>