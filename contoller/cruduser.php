<?php 
include '../config.php';
include_once '../model/user.php';
	
class cruduser
{

    public function listuser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuser($ide)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function adduser($user)
    {
        $sql = "INSERT INTO user  
        VALUES (NULL, :pseudo, :email, :password ,:role)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'pseudo' => $user->getPseudo(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => 1,
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showuser($id)
    {
        $sql = "SELECT * from user where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $joueur = $query->fetch();
            return $joueur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateuser($user, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE userSET 
                  
                    pseudo = :pseudo,
                    password = :password, 
                    email = :email, 
                   role = :role
                WHERE id= :iduser'
            );
            
            $query->execute([
               
                'pseudo' => $user->getPseudo(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => $user->getrole(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
 ?>