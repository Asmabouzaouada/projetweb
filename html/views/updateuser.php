<?php

require_once '../contoller/cruduser.php';
require_once '../model/user.php';
$error = "";

$user = null;

$cruduser = new cruduser();

if (
    isset($_POST["pseudo"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["role"])
) {
    if (
        !empty($_POST["pseudo"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["role"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        $user = new user(
            null,
            $_POST['pseudo'],
            $_POST['email'],
            $_POST['password'],
            $_POST['role']
        );

        var_dump($user);

        $cruduser->updateuser($user, $_POST['iduser']);

        header('Location: listuser1.php');
    } else {
        $error = "Missing information";
    }
}
?>




?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Visual Admin Dashboard - Home</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    
    
</head>

<body>
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
        
        
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="#" class="active"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
            <li><a href="data-visualization.html"><i class="fa fa-bar-chart fa-fw"></i>Charts</a></li>
            <li><a href="data-visualization.html"><i class="fa fa-database fa-fw"></i>Data Visualization</a></li>
            <li><a href="maps.html"><i class="fa fa-map-marker fa-fw"></i>Maps</a></li>
            <li><a href="manage-users.html"><i class="fa fa-users fa-fw"></i>Manage Users</a></li>
            <li><a href="preferences.html"><i class="fa fa-sliders fa-fw"></i>Preferences</a></li>
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
                <li><a href="adduser.php">Dashboard</a></li>
                <li><a href="">Overview</a></li>
                <li><a href="connexion.php">Sign in form</a></li>
              </ul>  
            </nav> 
          </div>
        </div>

        <div class="templatemo-content-container">
          


          <div class="templatemo-flex-row flex-content-row">
           
             
          </div> <!-- Second row ends -->
         
          <button><a href="listuser1.php">Back to list</a></button>
          <hr>
      
          <div id="error">
              <?php echo $error; ?>
          </div>
      
          <?php
          if (isset($_POST['iduser'])) {
              $user = $cruduser->showuser($_POST['iduser']);
              
          ?>
      
              <form action="" method="POST">
              <table>
              <tr>
                          <td><label for="nom">Iduser :</label></td>
                          <td>  
                              <input type="text" id="iduser" name="iduser" value="<?php echo $_POST['iduser'] ?>" readonly />
                              <span id="erreurNom" style="color: red"></span>
                          </td>
                      </tr>
              
                  <tr>
                      <td><label for="pseudo">pseudo :</label></td>
                      <td>
                          <input type="text" id="pseudo" name="pseudo" />
                          <span id="erreurNom" style="color: red"></span>
                      </td>
                  </tr>
                  
                  <tr>
                      <td><label for="email">Email :</label></td>
                      <td>
                          <input type="text" id="email" name="email" />
                          <span id="erreurEmail" style="color: red"></span>
                      </td>
                  </tr>
                  <tr>
                      <td><label for="password">psw:</label></td>
                      <td>
                          <input type="text" id="password" name="password" />
                          <span id="erreurPsw" style="color: red"></span>
                      </td>
                  </tr>
                  <tr>
                      <td><label for="role">role :</label></td>
                      <td>
                          <select name="role">
                              <option value="user">Utilisateur</option>
                              <option value="admin">Administrateur</option>
                          </select><br>
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
          <?php
          }
          ?>
          
          
        </div>
      </div>


    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
    <script>
    
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart); 
      
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      
      $(document).ready(function(){
        if($.browser.mozilla) {
          //refresh page on browser resize
          // http://www.sitepoint.com/jquery-refresh-page-browser-resize/
          $(window).bind('resize', function(e)
          {
            if (window.RT) clearTimeout(window.RT);
            window.RT = setTimeout(function()
            {
              this.location.reload(false); /* false to get page from cache */
            }, 200);
          });      
        } else {
          $(window).resize(function(){
            drawChart();
          });  
        }   
      });
      
    </script>
    <script type="text/javascript" src="js/templatemo-script.js"></script>  
</body>

</html>