<?php 
include "C:/xampp/htdocs/projets/controller/reclamationC.php";
include "C:/xampp/htdocs/projets/model/reclamationM.php";
$reclamation=null;

$cmdC= new reclamationC();
try{
$conn=new PDO('mysql:host=localhost;dbname=projets;charset=utf8','root');
}
catch(PDOException $e){
echo "la connexion a échoué :".$e->getMessage();
}
if(isset($_POST['create'])){
$cin=isset($_POST['cin'])&&
$email=isset($_POST['email'])&&
$sujet=isset($_POST['sujet'])&&
$date=isset($_POST['date']);
$reclamation = new reclamation($_POST['cin'],$_POST['email'],$_POST['sujet'],$_POST['date']);
$cmdC->addreclamation($reclamation);
header('location: ../back/listereclamation.php');
}





?>



<!doctype html>
<html lang="en">
<script src="m.js"></script>
  <head>
    <title>SANTEE &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html">SANTEE</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="index.html" class="nav-link">Home</a></li>
                  <li><a href="services.html" class="nav-link">Creat</a></li>
                  <li><a href="barber-shop.html" class="nav-link">Shop</a></li>
                  <li class="active"><a href="about.html" class="nav-link">Reclamation</a></li>
                  <li><a href="blog.html" class="nav-link">Event</a></li>
                  <li><a href="contact.html" class="nav-link">Login</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/artswp.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h1 class="mb-3">Reclamation</h1>
              
            </div>
          </div>
        </div>
      </div>
    </div>

   
    

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img src="images/post_3.jpg" alt="Image" class="img-fluid mb-5">
            <h2 class="footer-heading mb-3">complèter la formulaire</h2>
               
          </div>
          <form action="" method="POST" onsubmit="return valide()">
          <div class="col-lg-8 ml-auto">
       
          <div class="form-group row">
             

                
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="CIN" id="cin" name="cin">
                  </div>
                 

                 <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="email" id="email" name="email">
                 </div>
                 
                 <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="sujet" id="sujet" required
                  minlength="3" maxlength="20" size="10"name="sujet">
                 </div>
                
                  <div class="col-md-6 mb-4 mb-lg-0">
                <input type="date"class="form-control" placeholder="date" id ="date" name="date">
                  </div>

                  <ul>
                    <input type="submit" value="Send" class="btn btn-primary"  name="create">
                
                </ul>

             
       
            
              
            </div>
          </div>
          </form>
    </div>
       
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="m.js"></script>

  </body>

</html>

