<?php
include "../contoller/cruduser.php";

$u = new cruduser();
$tab = $u->listuser();


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
           
            <div class="col-1">
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">User Table</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                  <tr>
        <th>Id</th>
        <th>pseudo</th>
        <th>Email</th>
         <th>password</th>
        <th>role</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $user) {
    ?>




        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['pseudo']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['password']; ?></td>
             <td><?= $user['role']; ?></td>
            <td align="center">
                <form method="POST" action="updateuser.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $user['id']; ?> name="iduser">
                </form>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
  
    <?php
    }
    ?>
    
                  </table>   
                  

                </div>                          
              </div>
            </div>           
          </div> <!-- Second row ends -->
          
          <a href="adduser.php">Add user</a>
         
          <br>
    <a href="admin_deconnexion.php">Se déconnecter</a> 
    <button class="btn btn-secondary" onclick="sortTable()">Trier le tableau</button>
   
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
    
   
<script>
    function sortTable() {
        $('#listeuser1').DataTable().order([1, 'asc']).draw();
    }
</script>
</div>
<script>
$(document).ready(function () {
$("#searchTitle").on("input", function () {
var searchTerm = $(this).val().toLowerCase();
$("#listuser1 tbody tr").each(function () {
var title = $(this).find("td:first-child").text().toLowerCase();
if (title.includes(searchTerm)) {
$(this).show();
} else {
$(this).hide();
}
});
});
});
</script>
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>