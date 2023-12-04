<?php
include '../config.php';


session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_connexion.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];
?>

<html>
<head>
    <title>Tableau de Bord Admin</title>
</head>
<body>
    <h2>Bienvenue sur le tableau de bord de l'administrateur, Admin <?php echo $admin_id; ?>!</h2>

    <br>
    <a href="admin_deconnexion.php">Se déconnecter</a>
    <br>
    <a href="listuser.php">Voir les inscriptions</a>
    <br>
    <a href="adduser.php">Ajouter un utilisateur</a>
</body>
</html>
