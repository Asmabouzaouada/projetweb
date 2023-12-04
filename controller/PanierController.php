<?php

require_once 'C:\xampp\htdocs\xampp\projetweb\config.php';

class PanierController
{
    public function listPaniers()
    {
        $sql = "SELECT * FROM panier";
        $dbo = Config::getConnexion();
        try {
            $liste = $dbo->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function deletePanier($id_panier)
    {
        $sql = "DELETE FROM panier WHERE id_panier = :id_panier";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_panier', $id_panier, PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addPanier($panier)
    {
        $sql = "INSERT INTO panier (quantite, prix, nom_produit, description_produit)  
                VALUES (:quantite, :prix, :nom_produit, :description_produit)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'quantite' => $panier->getQuantite(),
                'prix' => $panier->getPrix(),
                'nom_produit' => $panier->getNom_produit(),
                'description_produit' => $panier->getDescription_produit(),
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getPanierById($id_panier)
    {
        $sql = "SELECT * FROM panier WHERE id_panier = :id_panier";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_panier', $id_panier, PDO::PARAM_INT);
            $query->execute();
            $panier = $query->fetch(PDO::FETCH_ASSOC);
            return $panier;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function showPanier($id_panier)
    {
        $sql = "SELECT * FROM panier WHERE id_panier = :id_panier";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_panier', $id_panier, PDO::PARAM_INT);
            $query->execute();
            $panier = $query->fetch(PDO::FETCH_ASSOC);
            return $panier;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updatePanier($id_panier,$panier)
    {
        try {
            $db = Config::getConnexion();
            $query = $db->prepare(
                'UPDATE panier SET 
                    quantite = :quantite, 
                    prix = :prix, 
                    nom_produit = :nom_produit,
                    description_produit = :description_produit
                WHERE id_panier = :id_panier'
            );

            $query->execute([
                'id_panier' => $id_panier,
                'quantite' => $panier->getQuantite(),
                'prix' => $panier->getPrix(),
                'nom_produit' => $panier->getNom_produit(),
                'description_produit' => $panier->getDescription_produit(),
            ]);

            if ($query->rowCount() > 0) {
                echo $query->rowCount() . " record(s) updated successfully <br>";
            } else {
                echo "No records were updated. <br>";
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

?>