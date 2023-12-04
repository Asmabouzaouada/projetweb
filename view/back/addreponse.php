<?php 
include "C:/xampp/htdocs/projets/controller/reponseC.php";
include "C:/xampp/htdocs/projets/model/reponseM.php";

$cmdC = new reponseC();

try {
    $conn = new PDO('mysql:host=localhost;dbname=projets;charset=utf8', 'root');
} catch (PDOException $e) {
    echo "la connexion a échoué :".$e->getMessage();
}

if (isset($_POST['create'])) {
    $id_rep = isset($_POST['id_rep']) ? $_POST['id_rep'] : null;
    $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : null;
    $date_rep = isset($_POST['id_rec']) ? $_POST['id_rec'] : null;
    $id_rec = isset($_POST['date_rep']) ? $_POST['date_rep'] : null;

    if ($id_rep && $contenu && $date_rep && $id_rec) {
        $newReponse = new reponse($id_rep, $contenu, $date_rep, $id_rec);
        $cmdC->addreponse($newReponse);
        header('location: ../back/listereponse.php');
        exit;
    } else {
        echo "Tous les champs doivent être remplis.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ARTSBOUDINAR &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Mettez le reste de votre en-tête HTML ici -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Assurez-vous d'inclure la bibliothèque Bootstrap depuis un CDN ou localement -->

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h2 class="mt-4 mb-4">Formulaire de Réponse</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="id_rep">ID Rep</label>
                    <input type="text" class="form-control" id="id_rep" name="id_rep">
                </div>
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <input type="text" class="form-control" id="contenu" name="contenu">
                </div>
                <div class="form-group">
                    <label for="id_rec">id_rec</label>
                    <input type="text" class="form-control" id="id_rec" required minlength="3" maxlength="20" size="10" name="id_rec">
                </div>
                <div class="form-group">
                    <label for="date_rep">date_rep</label>
                    <input type="date" class="form-control" id="date_rep" name="date_rep">
                </div>
                <button type="submit" class="btn btn-primary" name="create">Send</button>
            </form>
        </div>
    </div>
</div>

<!-- Mettez le reste de vos scripts et balises de fermeture ici -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
