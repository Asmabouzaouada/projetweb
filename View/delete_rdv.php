<?php
include '../Controller/rendez_vousC.php';


    $rendez_vous = new rendez_vousC();
    $rendez_vous->deleterendez_vous($_GET["id"]);
    header('Location: liste_rdv.php');
