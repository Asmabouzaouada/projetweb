<?php

include __DIR__."/../config.php";


class reponseC
{
    public function listereponse($tri)
    {
        $sql = "SELECT * FROM reponse";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deletereponse($id_rep)
    {
        $sql = "DELETE FROM reponse WHERE id_rep = :id_rep";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rep', $id_rep);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function addreponse($reponse)
    {
        $sql = "INSERT INTO reponse(id_rep,contenu,date_rep,id_rec)
        VALUES (:id_rep,:contenu,:date_rep,:id_rec)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_rep' => $reponse->getid_rep(),
                'contenu' => $reponse->getcontenu(),
                'date_rep' => $reponse->getdate_rep(),
                'id_rec' => $reponse->getid_rec(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showReponse($id_rep)
{
    $sql = "SELECT * from reponse where id_rep = :id_rep";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_rep', $id_rep);
        $query->execute();
        $reponse = $query->fetch();
        return $reponse;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    function updatereponse($reponse, $id_rep)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    id_rep = :id_rep, 
                    contenu = :contenu, 
                    date_rep = :date_rep, 
                    id_rec = :id_rec
                WHERE id_rep= :id_rep'
            );

            $query->execute([
                'id_rep' => $reponse->getid_rep(),
                'contenu' => $reponse->getcontenu(),
                'date_rep' => $reponse->getdate_rep(),
                'id_rec' => $reponse->getid_rec(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

?>