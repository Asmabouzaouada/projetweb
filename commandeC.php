<?php

use Config; // Assurez-vous que vous utilisez le bon espace de noms pour la classe Config

require '../config.php';

class commandeC
{
    public function listCommand()
    {
        $sql = "SELECT * FROM command";
        $dbo = Config::getConnexion();
        try {
            $liste = $dbo->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listCommand2()
    {
        $sql = "SELECT * FROM panier";
        $dbo = Config::getConnexion();
        try {
            $liste = $dbo->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteproduct($id_c)
    {
        $sql = "DELETE FROM produit WHERE id_c = :id_c";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_c', $id_c);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCommand($commande)
    {
        $sql = "INSERT INTO commande  
        VALUES (NULL, :adresse, :dat ,:id)";
        $dbo= Config::getConnexion();
        try {
            $query = $dbo->prepare($sql);
            $query->execute([
                'adresse' => $commande->getEmail(),
                'dat' => $commande->getTel(),
                'id' => $commande->getNumero(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showCommand($id)
    {
        $sql = "SELECT * FROM commande WHERE id = $id";
        $dbo = Config::getConnexion();
        try {
            $query = $dbo->query($sql);
            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCommand($commande, $id)
    {
        try {
            $dbo = Config::getConnexion();
            $query = $dbo->prepare(
                'UPDATE commande SET 
                    adresse = :adresse, 
                    dat = :dat, 
                WHERE id= :id'
            );

            $query->execute([
                'id' => $id,
                'adresse' => $commande->getadresse(),
                'dat' => $commande->getdate(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // Fonction pour obtenir des données à partir d'une autre table (ex : autre_table)
    function getAutreTableData()
    {
        $sql = "SELECT * FROM panier";
        $dbo = Config::getConnexion();
        try {
            $liste = $dbo->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
