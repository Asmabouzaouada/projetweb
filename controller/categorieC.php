<?php

require_once __DIR__ . '/../config.php';

class categorieC {
    public function afficherProduit($id_categorie){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM produit WHERE categorie = :id");
            $query->execute(['id' => $id_categorie]);
            return $query->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function afficherCategories(){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT c.*, COUNT(p.id_prod) as productCount
                                   FROM categorie c
                                   LEFT JOIN produit p ON c.id_categorie = p.categorie
                                   GROUP BY c.id_categorie");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
