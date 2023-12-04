<?php
include '../Controller/avisC.php';
include '../Model/avis.php';

$error = "";

// create client
$avis = null;

// create an instance of the controller
$avisC = new avisC();
if (isset($_POST["messagee"])) {
    if (!empty($_POST['messagee'])) {
        $avis = new avis(
            null,
            $_POST['messagee']
        );
        $avisC->addavis($avis);
        header('Location:listavis.php');
    } else {
        $error = "Le champ 'messagee' ne doit pas être vide.";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>avis </title>

    <script>
        function validateForm() {
            var messagee = document.getElementById("messagee").value;
            var erreurMessage = document.getElementById("erreurmessage");

            if (messagee.trim() === "") {
                erreurMessage.textContent = "Le champ 'messagee' ne doit pas être vide.";
                return false;
            } else {
                erreurMessage.textContent = "";
                return true;
            }
        }

        function resetError() {
            var erreurMessage = document.getElementById("erreurmessage");
            erreurMessage.textContent = "";
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
      <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">
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
   
     <!-- clients section -->
     <div class="clients">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>What our clients say</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide clients_Carousel " data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption ">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="clients_box">
                                          <figure><img src="../assets/images/our.jpg" alt="#"/></figure>
                                          <h3>Sandy Mark</h3>
                                          <p>"Life becomes more vibrant with glasses that make colors stand 
                                             out. Therefore, my choice was 'Solar Spectrum Optix'."" </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="clients_box">
                                          <figure><img src="../assets/images/our1.jpg" alt="#"/></figure>
                                          <h3>Mandy Joli</h3>
                                          <p> "Change your perspective with glasses that transform the world 
                                             into apainting. And Solar Spectrum Optix, you were the cause of
                                             my joy."</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="clients_box">
                                          <figure><img src="../assets/images/our2.jpg" alt="#"/></figure>
                                          <h3>Manks Mark</h3>
                                          <p>"Your dedication to providing quality solutions for
                                              color blindness is commendable."</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <i class='fa fa-angle-left'></i>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <i class='fa fa-angle-right'></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end clients section -->
<body>
    <a href="listavis.php">Retour à la liste </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm();">
        <table>
            <tr>
                <td><label for="messagee">messagee:</label></td>
                <td>
                    <input type="text" id="messagee" name="messagee" oninput="resetError()" />
                    <span id="erreurmessage" style="color: red"></span>
                </td>
            </tr>

            <td>
                <input type="submit" value="Enregistrer">
            </td>
            <td>
                <input type="reset" value="Réinitialiser">
            </td>
        </table>
    </form>
</body>

</html>
