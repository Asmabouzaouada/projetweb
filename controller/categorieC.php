<?php

// require '../config.php';
require_once __DIR__ . '/../config.php';
class categorieC {
    public function afficherProduit ($id_categorie){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM produit WHERE categorie= :id");
            $query->execute(['id' => $id_categorie]);
            return $query->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function afficherCategories(){
        try{
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM categorie");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}