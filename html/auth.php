<?php
         session_start();
         if (isset($_SESSION['user'])) {
             $user = $_SESSION['user'];
             echo "<p>Welcome, {$user['pseudo']}!</p>";
             echo '<button onclick="location.href=\'logout.php\'" style="background-color: #4CAF50; color: white;">Logout</button>';
         } else {
             echo '<p>Not a registered user yet? <strong><a href="signup.php" class="blue-text">Sign up now!</a></strong></p>';
         }
         ?>