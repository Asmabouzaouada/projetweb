<?php

require_once 'C:\xampp\htdocs\xampp\projetweb\config.php';
require 'C:\xampp\htdocs\xampp\projetweb\vendor\autoload.php';

class CommandeController
{
    public function listCommand()
    {
        $sql = "SELECT * FROM commande";
        $dbo = Config::getConnexion();
        try {
            $liste = $dbo->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deleteCommand($id_c)
    {
        $sql = "DELETE FROM commande WHERE id_c = :id_c";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_c', $id_c, PDO::PARAM_INT);

        try {
            $req->execute();
            $this->sendEmailNotification("Commande Supprimer","Une commande a été supprimer");
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function addCommand($commande)
    {
        $sql = "INSERT INTO commande (adresse_livraison, date_commande, client_nom, id_panier)  
                VALUES (:adresse, :date_commande, :client_nom, :id_panier)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'adresse' => $commande->getAdresse(),
                'date_commande' => $commande->getDate_commande(),
                'client_nom' => $commande->getClient_nom(),
                'id_panier' => $commande->getId_panier(),
            ]);
            $this->sendEmailNotification("Nouvelle commande crée","Une nouvelle commande a été crée");
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showCommand($id_c)
    {
        $sql = "SELECT * FROM commande WHERE id_c = :id_c";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_c', $id_c, PDO::PARAM_INT);
            $query->execute();
            $commande = $query->fetch(PDO::FETCH_ASSOC);
            return $commande;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    //recherche
    public function showCommandsByUser($client_nom)
    {
        $sql = "SELECT * FROM commande WHERE client_nom = :client_nom";
        $db = Config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':client_nom', $client_nom, PDO::PARAM_STR);
            $query->execute();
            $commandes = $query->fetchAll(PDO::FETCH_ASSOC);
            return $commandes;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function updateCommand($commande, $id_c)
    {
        try {
            $db = Config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    adresse_livraison = :adresse, 
                    date_commande = :date_commande, 
                    client_nom = :client_nom,
                    id_panier = :id_panier
                WHERE id_c = :id_c'
            );

            $query->execute([
                'id_c' => $id_c,
                'date_commande' => $commande->getDate_commande(),
                'adresse' => $commande->getAdresse(),
                'client_nom' => $commande->getClient_nom(),
                'id_panier' => $commande->getId_panier(),
            ]);

            if ($query->rowCount() > 0) {
                $this->sendEmailNotification("Commande Mise a jour","Une commande a été mise a jour");
                echo $query->rowCount() . " record(s) updated successfully <br>";
            } else {
                echo "No records were updated. <br>";
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    private function sendEmailNotification($subject,$data)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sourournajjar2@gmail.com';
            $mail->Password = 'zkliiyesiwohrhgu';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('admin@php.com', 'Systeme de notification');
            $mail->addAddress('sourour.najjar@esprit.tn');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $data;

            $mail->send();
            echo "Le message n'a pas pu être envoyé. Erreur du messager : {$mail->ErrorInfo}";
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur du messager : {$mail->ErrorInfo}";
        }
    }
}

?>