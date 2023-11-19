<?php
include 'C:/xampp/htdocs/projetweb/Controller/commandeC.php';
$clientC = new commandeC();
$clientC->deletecomm($_POST["id_c"]);
header('Location:back office appearance/preferences.php');
?>