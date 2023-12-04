<?php

include '../Controller/rendez_vousC.php';
include '../Model/rendez_vous.php';

$error = "";

// create client
$rendez_vous = null;

// create an instance of the controller
$rendez_vousC = new rendez_vousC();
if (
   
    isset($_POST["sujet"]) &&
    isset($_POST["etat"])&&
    isset($_POST["daternd"]) &&
    isset($_POST["demande_rdv"]) 
   
) {
    if (
       
        !empty($_POST["sujet"]) &&
        !empty($_POST["etat"])&&
        !empty($_POST["daternd"]) &&
        !empty($_POST["demande_rdv"]) 
       
    ) {
        $rendez_vous = new rendez_vous(
            null,
          
            $_POST['sujet'],
            $_POST['etat'],
            $_POST['daternd'],
            $_POST['demande_rdv']
          
        );
        $rendez_vousC->addrendez_vous($rendez_vous);
        header('Location:liste_rdv.php');
    } else
        $error = "Missing information";
}?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rendez_vous</title>

   <script>
        function validateForm() {
            var daternd = document.getElementById('daternd').value;
            var sujet = document.getElementById('sujet').value;
            var demande_rdv = document.getElementById('demande_rdv').value;
            var etat = document.getElementById('etat').value;

            var errors = false;

            // Check if daternd is a valid date (YYYY-MM-DD format)
            var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            if (!dateRegex.test(daternd)) {
                document.getElementById('erreurdate').innerText = 'Invalid date format (YYYY-MM-DD)';
                errors = true;
            } else {
                document.getElementById('erreurdate').innerText = '';
            }

            // Check if sujet is empty
            if (sujet.trim() === '') {
                document.getElementById('erreursujet').innerText = 'Sujet cannot be empty';
                errors = true;
            } else {
                document.getElementById('erreursujet').innerText = '';
            }

            // Check if demande_rdv is empty
            if (demande_rdv.trim() === '') {
                document.getElementById('erreurdemande_rdv').innerText = 'Demande cannot be empty';
                errors = true;
            } else {
                document.getElementById('erreurdemande_rdv').innerText = '';
            }

            // Check if etat is a number between 0 and 1
            var etatNumber = parseFloat(etat);
            if (isNaN(etatNumber) || etatNumber < 0 || etatNumber > 1) {
                document.getElementById('erreuretat').innerText = 'Etat must be a number between 0 and 1';
                errors = true;
            } else {
                document.getElementById('erreuretat').innerText = '';
            }

            return !errors; // Return true if there are no errors, false otherwise
        }
    </script>
</head>
<head>
<header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="../assets/images/logo.png" alt="#" /></a>
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
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
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
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="../assets/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../assets/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../assets/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../assetscss/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  
      

   </head>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
<body>
<!-- Book a consultation section -->
<div id="about" class="shop">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-5">
                  <div  class="shop_img">
                     <figure><img src="../assets/images/shop_img.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-7 padding_right0">
                  <div class="max_width">
                     <div class="titlepage">
                        <h2>Book a consultation now</h2>
                        <p>We recognize the importance of personalized care for addressing color 
                           blindness, which comes in different types such as Protanopia and Deuteranopia.
                            To better understand your specific needs and explore suitable solutions, 
                            book now. You have the flexibility to choose a doctor based on your schedule
                           and geographic location.Let's embark on a journey towards a more colorful and
                           vibrant world !</p>
                        <a class="read_more" href="shop.html">Book now</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </body>
<body>
    <a href="liste_rdv.php">Back to list </a>
    <hr>

    

    <form action="" method="POST" onsubmit="return validateForm();">
        <table>
       

            <tr>
                <td><label for="sujet">Sujet:</label></td>
                <td>
                    <input type="text" id="sujet" name="sujet" />
                    <span id="erreursujet" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="etat">Etat :</label></td>
                <td>
                    <input type="text" id="etat" name="etat" />
                    <span id="erreuretat" style="color: red"></span>
                </td>
            </tr>
            <tr>
            <td><label for="daternd">daternd:</label></td>
            <td>
            <input type="text" id="daternd" name="daternd" />
             <span id="erreurdate" style="color: red"></span>
            </td>
        </tr>
            
            <tr>
                <td><label for="demande_rdv">Demande:</label></td>
                <td>
                    <input type="text" id="demande_rdv" name="demande_rdv" />
                    <span id="erreurdemande_rdv" style="color: red"></span>
                </td>
            </tr>
           

            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>


</html>

