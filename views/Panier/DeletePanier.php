<?php
require_once '..\..\controller\PanierController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $panierController = new PanierController();
    $id = $_GET['id'];

    $panierController->deletePanier($id);
    header("Location: ../Panier/AfficheListePanier.php");

} else {
    header("Location: ../Panier/AfficheListePanier.php");
    exit();
}
?>