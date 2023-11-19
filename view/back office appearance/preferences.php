<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visual Admin Dashboard - Products</title>
  <meta name="description" content="">
  <meta name="author" content="templatemo">
  <!-- 
    Visual Admin Template
    https://templatemo.com/tm-455-visual-admin
    -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
    .glasses_box {
      text-align: center;
      margin-bottom: 30px;
    }

    .glasses_box img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
    }

    .glasses_box h3 {
      margin-top: 15px;
      font-size: 1.5em;
      color: #333;
    }

    .glasses_box .blu {
      color: #3498db;
    }

    .glasses_box p {
      font-size: 1.2em;
      color: #777;
    }

    .btn-container {
      margin-top: 15px;
      text-align: center;
      /* Center the button */
    }

    container-fluid {
      justify-content: left;
    }
  </style>
</head>

<body>
  <?php include "../../controller/produitC.php";
  include "../../model/produit.php";
  $c = new produitC();
  $tab = $c->listProduits();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ?>
  <!-- Left column -->
  <div class="templatemo-flex-row">
    <div class="templatemo-sidebar">
      <header class="templatemo-site-header">
        <div class="square"></div>
        <h1>Visual Admin</h1>
      </header>
      <div class="profile-photo-container">
        <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">
        <div class="profile-photo-overlay"></div>
      </div>
      <!-- Search box -->
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
          <li><a href="index.html"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
          <li><a href="data-visualization.html"><i class="fa fa-bar-chart fa-fw"></i>Charts</a></li>
          <li><a href="data-visualization.html"><i class="fa fa-database fa-fw"></i>Data Visualization</a></li>
          <li><a href="maps.html"><i class="fa fa-map-marker fa-fw"></i>Maps</a></li>
          <li><a href="manage-users.html"><i class="fa fa-users fa-fw"></i>Manage Users</a></li>
          <li><a href="#" class="active"><i class="fa fa-sliders fa-fw"></i>Products</a></li>
          <li><a href="login.html"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
        </ul>
      </nav>
    </div>
    <!-- Main content -->
    <div class="templatemo-content col-1 light-gray-bg">
      <div class="templatemo-top-nav-container">
        <div class="row">
          <nav class="templatemo-top-nav col-lg-12 col-md-12">
            <ul class="text-uppercase">
              <li><a href="" class="active">Admin panel</a></li>
              <li><a href="">Dashboard</a></li>
              <li><a href="">Overview</a></li>
              <li><a href="login.html">Sign in form</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="templatemo-content-container">
        <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10 text-center">Products</h2>
          <div class="btn-container text-center">
          <a class="btn btn-success" href="../addproduct.php">Add product</a>
          </div>



          <div class="container-lg">
            <div class="row">
              <?php
              foreach ($tab as $produit) {
              ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="glasses_box">
                    <figure><img src="<?php echo $produit['image_prod']; ?>" alt="#" /></figure>
                    <h3><?= $produit['prix_prod']; ?><span class="blu">TND</span></h3>
                    <p><?= $produit['nom_prod']; ?></p>
                    <p>quantity remaining : <?= $produit['quantite']; ?></p>

                    <p><?= $produit['descrip']; ?></p>

                    <div class="btn-container">
                      <a class="btn btn-danger" href="../deleteproduct.php?id_prod=<?php echo $produit['id_prod']; ?>">Delete</a>
  
                      <form method="POST" action="../updateproduct.php">
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                        <input type="hidden" value="<?php echo $produit['id_prod']; ?>" name="id_prod">
                      </form>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>





  <!-- JS -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
  <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script> <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
  <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
</body>

</html>