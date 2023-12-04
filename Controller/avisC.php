<?php

require '../config.php';

class avisC
{

    public function listavis()
    {
        $sql = "SELECT * FROM avis";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteavis($ide)
    {
        $sql = "DELETE FROM avis WHERE idavis = :idavis";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idavis', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addavis($avis)
    {
        $sql = "INSERT INTO avis  
        VALUES (NULL, :messagee)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'messagee' => $avis->getmessagee(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showavis($id)
    {
        $sql = "SELECT * from avis where idavis = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $avis = $query->fetch();
            return $avis;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateavis($avis, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE avis SET 
                    messagee = :messagee
                   
                WHERE id= :idavis'
            );
            
            $query->execute([
                'idavis' => $id,
                'messagee' => $avis->getmessagee(),
               
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
