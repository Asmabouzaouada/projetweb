<?php 
include "C:/xampp/htdocs/projets/controller/reclamationC.php";
$reclamationC=new reclamationC();
$reclamationC->deletereclamation($_GET['cin']);
header('location:listereclamation.php');