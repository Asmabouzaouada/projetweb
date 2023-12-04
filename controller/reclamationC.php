<?php

include __DIR__."/../config.php";

class reclamationC
{
    public function listreclamation()
    {
        $sql = "SELECT * FROM reclmation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deletereclamation($cin)
    {
        $sql = "DELETE FROM reclmation WHERE cin = :cin";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':cin', $cin);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function addreclamation($reclamation)
    {
        $sql = "INSERT INTO reclmation(cin,email,sujet,date)
        VALUES (:cin,:email,:sujet,:date)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $reclamation->getCin(),
                'email' => $reclamation->getEmail(),
                'sujet' => $reclamation->getSujet(),
                'date' => $reclamation->getDate(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showReclamation($cin)
    {
        $sql = "SELECT * from reclmation where cin = :cin";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':cin', $cin);
            $query->execute();
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateReclamation($reclamation, $cin)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclmation SET 
                    cin = :cin, 
                    email = :email, 
                    sujet = :sujet, 
                    date = :date
                WHERE cin = :cin'
            );

            $query->execute([
                'cin' => $reclamation->getCin(),
                'email' => $reclamation->getEmail(),
                'sujet' => $reclamation->getSujet(),
                'date' => $reclamation->getDate(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

?>
