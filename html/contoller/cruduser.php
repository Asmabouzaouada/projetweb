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
                'role' => $user->getrole(),
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
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateuser($user, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE user SET 
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
            'iduser' => $id,
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error updating user: ' . $e->getMessage();
    }
}
function authenticateUser($email, $password)
{
    $sql = "SELECT * FROM user WHERE email = :email";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'email' => $email,
        ]);

        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Mot de passe correct, utilisateur authentifié
            return $user;
        } else {
            // Mot de passe incorrect ou utilisateur non trouvé
            return null;
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function isEmailRegistered($email)
    {
        $sql = "SELECT COUNT(*) as count FROM user WHERE email = :email";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['email' => $email]);

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'] > 0;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}