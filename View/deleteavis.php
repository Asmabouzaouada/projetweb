<?php
include '../Controller/avisC.php';
$avisC = new avisC();
$avisC->deleteavis($_GET["idavis"]);
header('Location:listavis.php');
