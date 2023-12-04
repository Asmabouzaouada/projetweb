<?php

include "../../controller/reponseC.php";

if (isset($_POST['submit'])) {
    $search = new reponseC();
    $id_rep = $_POST['id_rep'];
    $reponse = $search->showReponse($id_rep);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>

<form method="post" action="searchreponse.php">
    <label>Id :</label>
    <input type="text" name="id_rep">
    <input type="submit" name="submit" value="Search">
</form>

<?php if (isset($reponse) && $reponse): ?>
    <div>
        <h2>Information</h2>
        <p>id_rep : <?= $reponse['id_rep'] ?></p>
        <p>contenu : <?= $reponse['contenu'] ?></p>
        <p>date_rep : <?= $reponse['date_rep'] ?></p>
        <p>id_rec : <?= $reponse['id_rec'] ?></p>
    </div>
<?php elseif (isset($_POST['submit'])): ?>
    <p>No result found</p>
<?php endif; ?>

</body>
</html>
