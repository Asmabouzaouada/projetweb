
<?php

require_once '../contoller/cruduser.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cruduser = new cruduser();
    $user = $cruduser->authenticateUser($email, $password);

    if ($user && $user['role'] == 'admin') {
        header('Location: listuser.php');
        exit();
    } else {
        echo "Invalid email or password. Please try again.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
</head>

<body>
    <h2>Login</h2>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>
