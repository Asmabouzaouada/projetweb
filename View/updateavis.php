<?php

include '../Controller/avisC.php';
include '../Model/avis.php';

$error = "";
$avis = null;
$avisC = new avisC();

if (isset($_POST["messagee"])) {
    if (!empty($_POST['messagee'])) {
        $avis = new avis(
            null,
            $_POST['messagee']
        );

        $avisC->updateavis($avis, $_POST['idavis']);
        header('Location: listavis.php');
        exit(); // Ensure that the script stops executing after redirect
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listavis.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idavis'])) {
        $avis = $avisC->showavis($_POST['idavis']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="nom">idavis :</label></td>
                    <td>
                        <input type="text" id="idavis" name="idavis" value="<?php echo $_POST['idavis'] ?>" readonly />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">messagee:</label></td>
                    <td>
                        <input type="text" id="messagee" name="messagee" value="<?php echo $avis['messagee'] ?>" />
                        <span id="erreurmessagee" style="color: red"></span>
                    </td>
                </tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>
        </form>

    <?php
    }
    ?>
</body>

</html>
