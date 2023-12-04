<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>sungla</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script src="/view/jquery-3.2.1.min.js"></script>
   <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

</head>
<!-- body -->

<body class="main-layout position_head">
   <?php require_once "../controller/produitC.php";
   include "../model/produit.php";
   require_once "../controller/categorieC.php";
   $CategorieC = new categorieC;
   $c = new produitC();
   $id_categorie = 'all';
   $sort = null;

   if ($_SERVER["REQUEST_METHOD"] == "POST") { //echo "Form submitted!";
      // if (isset($_POST['categorie']) && isset($_POST['search'])) {
      //    $id_categorie = $_POST['categorie'];
      //    if ($id_categorie == 'all') {
      //       // Retrieve and display all products
      //       $list = $c->listProduits();
      //    } else {
      //       // Retrieve and display products based on the selected category
      //       $list = $CategorieC->afficherProduit($id_categorie);
      //    }
      // }
      $list = $c->listProduits();
      if (isset($_POST['categorie'])) {
         $id_categorie = $_POST['categorie'];

         // Check if sorting is applied
         if (isset($_POST['apply_sort'])) {
            $sort = $_POST['sort'];
            //$list = $c->listProduits($id_categorie, $sort);
            $list = $c->listProduits(isset($_GET['category']) ? $_GET['category'] : null, 'asc');

         } else {
            // By default, retrieve and display products based on the selected category
            if ($id_categorie == 'all') {
               $list = $c->listProduits();
            } else {
               $list = $CategorieC->afficherProduit($id_categorie);
            }
         }
      } if (!isset($_POST['categorie'])) {
         $id_categorie = 'all';
      }
   }



   // $tab = $c->listProduits();
   $tab = $c->listProduits(isset($_GET['category']) ? $_GET['category'] : null);
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ?>
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item ">
                              <a class="nav-link" href="index.html">Home</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="about.html">About</a>
                           </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="glasses.html">shop</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="shop.html">Book a consulation</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="contact.html">Contact Us</a>
                           </li>
                           <li class="nav-item d_none">
                              <a class="nav-link" href="#">cart</a>
                           </li>
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
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->
   <!-- Our  Glasses section -->
   <div class="glasses">
      <div class="container">
         <div class="row">
            <div class="col-md-10 offset-md-1">
               <div class="titlepage">
                  <h2>Our Glasses</h2>
                  <form action="" method="POST">
                     <input type="hidden" name="sort" value="asc">
                     <input type="submit" value="Tri par prix" name="apply_sort">
                  </form>
               </div>
            </div>
         </div>


      </div>
      <div class="row justify-content-center"> <!-- Center the content within the row -->
         <div class="col-md-2">

            <!-- <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
               </button>
               <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                  <a class="dropdown-item" href="pour_enfant1.html">Pour Enfants</a>
                  <a class="dropdown-item" href="pour_femme1.html">Pour Femmes</a>
                  <a class="dropdown-item" href="pour_homme1.html">Pour Hommes</a>
               </div>
            </div> -->
            <!-- <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
               </button>
               <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                  <a class="dropdown-item" href="?category=all">All</a>
                  <a class="dropdown-item" href="?category=A">Category A</a>
                  <a class="dropdown-item" href="?category=B">Category B</a>
                  <a class="dropdown-item" href="?category=C">Category C</a>
                  <a class="dropdown-item" href="?category=D">Category D</a>
                  <a class="dropdown-item" href="?category=E">Category E</a>
                  <a class="dropdown-item" href="?category=F">Category F</a>
            
               </div>
            </div> -->
            <?php
            $categoriess = $CategorieC->afficherCategories();
            ?>
            <div class="dropdown">


               <form action="" method="POST">
                  <label for="categorie">Sélectionner une categorie</label>
                  <select name="categorie" id="categorie">
                     <option value="all" <?php echo ($id_categorie == 'all' || !isset($_POST['search'])) ? 'selected' : ''; ?>>Tous les produits</option>
                     <?php
                     foreach ($categoriess as $categ) {
                        $selected = ($categ['id_categorie'] == $id_categorie) ? 'selected' : '';
                        echo '<option value="' . $categ['id_categorie'] . '" ' . $selected . '>' . $categ['nom_categorie'] . '</option>';
                     }
                     ?>
                  </select>
                  <input type="submit" value="Rechercher" name="search">
               </form>



            </div>


         </div>
      </div>
      <!-- <div class="col-md-4">

         <input type="text" id="myInput" placeholder="Search for product.." title="Type in a name"><br />
      </div> -->

      <div class="container-fluid">
         <div class="row" id="list">
            <?php if (isset($list)) { ?>
               <br>
               <?php foreach ($list as $produit) { ?>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <div class="glasses_box">
                        <figure><img src="<?php echo $produit['image_prod']; ?>" alt="#" /></figure>
                        <h3>
                           <?= $produit['prix_prod']; ?>
                           <span class="blu">TND</span>
                        </h3>
                        <p class="name"><?= $produit['nom_prod']; ?></p>
                        <p><?= $produit['descrip']; ?></p>
                     </div>
                  </div>
               <?php } ?>
            <?php  } ?>
         </div>
      </div>


   </div>
   <!-- end Our  Glasses section -->
   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <ul class="location_icon">
                     <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> ghazela,ariena</li>
                     <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> +216 12345678</li>
                     <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> contact@esprit.tn</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </footer>
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script>
      var input = document.getElementById("myInput");
      input.addEventListener("input", myFunction);

      function myFunction(e) {
         var filter = e.target.value.toUpperCase();

         var list = document.getElementById("list");
         var divs = list.getElementsByTagName("div");
         for (var i = 0; i < divs.length; i++) {
            var a = divs[i].getElementsByTagName("a")[0];

            if (a) {
               if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  divs[i].style.display = "";
               } else {
                  divs[i].style.display = "none";
               }
            }
         }
      }
   </script>

</body>

</html>