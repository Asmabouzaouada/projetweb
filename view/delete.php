<?php
include '../contoller/cruduser.php';
$cruduser = new cruduser();
$cruduser->deleteuser($_GET["id"]);
header('Location:listuser.php');
?>