<?php

// require '../config.php';

require __DIR__ . '/../config.php';


class produitC
{

    // public function listProduits()
    // {
    //     $sql = "SELECT * FROM produit";
    //     $db = config::getConnexion();
    //     try {
    //         $liste = $db->query($sql);
    //         return $liste;
    //     } catch (Exception $e) {
    //         die('Error:' . $e->getMessage());
    //     }
    // }
    public function listProduits($category = null)
    {
        $sql = "SELECT * FROM produit";

        // If a category is provided, add a WHERE clause to filter by category
        if ($category !== null && $category !== 'all') {
            $sql .= " WHERE categorie = :category";
        }

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            // Bind the category parameter if it is provided
            if ($category !== null && $category !== 'all') {
                $query->bindValue(':category', $category);
            }

            $query->execute();
            $liste = $query->fetchAll();
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function deleteproduct($id_prod)
    {
        $sql = "DELETE FROM produit WHERE id_prod = :id_prod";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_prod', $id_prod);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addproduct($produit)
    {
        // Validate input data
        if (
            empty($produit->getNom()) || empty($produit->getimageprod()) || empty($produit->getquantite()) || empty($produit->getcategorie())
            || empty($produit->getPrix_prod())
        ) {
            throw new Exception('Missing information');
        }

        // // Validate category
        // $validCategories = ['A', 'B', 'C', 'D', 'E', 'F'];
        // if (!in_array(strtoupper($produit->getcategorie()), $validCategories)) {
        //     throw new Exception('Invalid category. Category must be A, B, C, D, E, or F.');
        // }


        $sql = "INSERT INTO produit  
        VALUES (NULL, :nom_prod,:image_prod, :quantite,:categorie,:prix_prod,:descrip)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_prod' => $produit->getNom(),
                'image_prod' => $produit->getimageprod(),
                'quantite' => $produit->getquantite(),
                'categorie' => $produit->getcategorie(),
                'prix_prod' => $produit->getPrix_prod(),
                'descrip' => $produit->getDescrip(),
            ]);
        } catch (Exception $e) {
            // Log the error to a file or output it for debugging
            error_log('Error: ' . $e->getMessage());
            // Output a message to the browser for debugging
            echo 'Error: ' . $e->getMessage();
        }
    }



    function showproduit($id_prod)
    {
        $sql = "SELECT * FROM produit WHERE id_prod = $id_prod";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit = $query->fetch();

            if (!$produit) {
                // No record found
                echo 'No product found with the given ID.';
                return null;
            }

            return $produit;
        } catch (Exception $e) {
            // Log the error to a file or output it for debugging
            error_log('Error: ' . $e->getMessage());
            // Output a message to the browser for debugging
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }


    function updateproduct($produit, $id_produit)
    { 
        $validCategories = ['A', 'B', 'C', 'D', 'E', 'F'];
        if (!in_array(strtoupper($produit->getcategorie()), $validCategories)) {
            throw new Exception('Invalid category. Category must be A, B, C, D, E, or F.');
        }

        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                nom_prod = :nom_prod, 
                image_prod = :image_prod, 
                quantite = :quantite, 
                categorie = :categorie,
                prix_prod = :prix_prod,
                descrip = :descrip
            WHERE id_prod = :id_prod'
            );
            $query->execute([
                'id_prod' => $id_produit,
                'nom_prod' => $produit->getNom(),
                'image_prod' => $produit->getimageprod(),
                'quantite' => $produit->getquantite(),
                'categorie' => $produit->getcategorie(),
                'prix_prod' => $produit->getPrix_prod(),
                'descrip' => $produit->getDescrip(),
            ]);

         echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            //echo 'Error: ' . $e->getMessage(); // Output the error message
            
        }
    }
}
