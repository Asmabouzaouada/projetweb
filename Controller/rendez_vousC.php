<?php

require '../config.php';

class rendez_vousC
{

    public function listrendez_vous()
    {
        $sql = "SELECT * FROM rendez_vous";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleterendez_vous($ide)
    {
        $sql = "DELETE FROM rendez_vous WHERE id= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addrendez_vous($rendez_vous)
    {
        $sql = "INSERT INTO rendez_vous 
        VALUES (NULL,:sujet,:etat,:daternd,:demande_rdv)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'sujet' => $rendez_vous->getsujet(),
                'etat' => $rendez_vous->getetat(),
                'daternd' => $rendez_vous->getdaternd(),
                'demande_rdv' => $rendez_vous->getdemande_rdv(),
               
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
   

    function showrendez_vous($id)
    {
        $sql = "SELECT * from rendez_vous where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $rendez_vous = $query->fetch();
            return $rendez_vous;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updaterendez_vous($rendez_vous, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE rendez_vous SET 
            
                    sujet = :sujet, 
                    etat = :etat,
                    daternd=:daternd,
                    demande_rdv= :demande_rdv
                   
                WHERE id= :id'
            );
            
            $query->execute([
                'id'=> $id,
    
                'sujet' => $rendez_vous->getsujet(),
                'etat' => $rendez_vous->getetat(),
                'daternd'=>$rendez_vous->getdaternd(),
                'demande_vous' => $rendez_vous->getdemande_rdv(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function search($r)
    {
        $sql = "SELECT * FROM rendez_vous where id like '%$r%' or sujet like '%$r%' ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function sort($demande_rdv)
    {
        $sql = "SELECT * FROM rendez_vous order by $demande_rdv";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    

}
