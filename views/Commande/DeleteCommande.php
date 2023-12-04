<?php
require_once '..\..\controller\CommandeController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $commandeController = new CommandeController();
    $id = $_GET['id'];

    $commandeController->deleteCommand($id);

    header("Location: ../Commande/AfficheListeCommande.php");
} else {
    header("Location: ../Commande/AfficheListeCommande.php");
    exit();
}
?>