<?php
require_once '..\..\controller\PanierController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $panierController = new PanierController();
    $id = $_GET['id'];

    $panierController->deletePanier($id);
    header("Location: ../Panier/AfficheListePanierFront.php");

} else {
    header("Location: ../Panier/AfficheListePanierFront.php");
    exit();
}
?>