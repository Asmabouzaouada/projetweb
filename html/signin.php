<?php
require_once '../contoller/cruduser.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  $email = $_POST['email'];
  $password = $_POST['psw'];

  $cruduser = new cruduser();
  $user = $cruduser->authenticateUser($email, $password);

  if ($user) {
      session_start();
      $_SESSION['user'] = $user;

      if ($user['role'] == 'admin') {
          header('Location: views');
          exit();
      } else {
          header('Location: dashboard.php');
          exit();
      }
  } else {
      echo "Invalid email or password. Please try again.";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 20%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 100px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 20%;
  }
}
</style>
</head>
<body>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="avatar.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="email"><b>Email</b></label> <!-- Updated from 'uname' to 'email' -->
    <input type="email" placeholder="Enter Email" name="email" required> <!-- Updated from 'text' to 'email' -->
    <br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>

    <button type="submit">Login</button>
    <br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>


  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

  <div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
    <p>Not a registered user yet? <strong><a href="signup.php" class="blue-text">Sign up now!</a></strong></p>
  </div>
</form>

</body>
</html>
