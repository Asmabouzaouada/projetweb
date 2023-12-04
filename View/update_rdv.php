<?php

include '../Controller/rendez_vousC.php';
include '../Model/rendez_vous.php';
$error = "";

// create client
$rendez_vous = null;
// create an instance of the controller
$rendez_vousC = new rendez_vousC();


if (
    isset($_POST["sujet"]) &&
    isset($_POST["etat"])&&
    isset($_POST["daternd"]) &&
    isset($_POST["demande_rdv"]) 
   
) {
    if (
        !empty($_POST["sujet"]) &&
        !empty($_POST["etat"]) &&
        !empty($_POST["daternd"]) &&
        !empty($_POST["demande_rdv"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $rendez_vous = new rendez_vous(
            null,
            $_POST['sujet'],
            $_POST['etat'],
            $_POST['daternd'],
            $_POST['demande_rdv']
        );
        var_dump($rendez_vous);
        
        $rendez_vousC->updaterendez_vous($rendez_vous, $_POST['id']);

        header('Location:liste_rdv.php');
    } else
        $error = "Missing information";
}



?>
<?php
if (isset($_POST['id'])) {
    $rendez_vous = $rendez_vousC->showrendez_vous($_POST['id']);
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Display</title>

    <script>
        function validateForm() {
            var daternd = document.getElementById('daternd').value;
            var sujet = document.getElementById('sujet').value;
            var demande_rdv = document.getElementById('demande_rdv').value;
            var etat = document.getElementById('etat').value;

            var errors = false;

            // Check if daternd is a valid date (YYYY-MM-DD format)
            var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            if (!dateRegex.test(daternd)) {
                document.getElementById('erreurdate').innerText = 'Invalid date format (YYYY-MM-DD)';
                errors = true;
            } else {
                document.getElementById('erreurdate').innerText = '';
            }

            // Check if sujet is empty
            if (sujet.trim() === '') {
                document.getElementById('erreursujet').innerText = 'Sujet cannot be empty';
                errors = true;
            } else {
                document.getElementById('erreursujet').innerText = '';
            }

            // Check if demande_rdv is empty
            if (demande_rdv.trim() === '') {
                document.getElementById('erreurdemande_rdv').innerText = 'Demande cannot be empty';
                errors = true;
            } else {
                document.getElementById('erreurdemande_rdv').innerText = '';
            }

            // Check if etat is a number between 0 and 1
            var etatNumber = parseFloat(etat);
            if (isNaN(etatNumber) || etatNumber < 0 || etatNumber > 1) {
                document.getElementById('erreuretat').innerText = 'Etat must be a number between 0 and 1';
                errors = true;
            } else {
                document.getElementById('erreuretat').innerText = '';
            }

            return !errors; // Return true if there are no errors, false otherwise
        }
    </script>

    </head>

    <body>
        <button><a href="liste_rdv.php">Back to list</a></button>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" method="POST" onsubmit="return validateForm();">
            <table>
                <tr>
                    <td><label for="id">id:</label></td>
                    <td>
                        <input type="number" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                        <span id="erreuridrdv" style="color: red"></span>
                    </td>
                </tr>
                
                <tr>
                    <td><label for="sujet">sujet:</label></td>
                    <td>
                        <input type="text" id="sujet" name="sujet" value="<?php echo $rendez_vous['sujet'] ?>" />
                        <span id="erreursujet" style="color: red"></span>
                    </td>
                </tr>

                
                <tr>
                    <td><label for="etat">etat:</label></td>
                    <td>
                        <input type="text" id="etat" name="etat" value="<?php echo $rendez_vous['etat'] ?>" />
                        <span id="erreuretat" style="color: red"></span>
                    </td>
                </tr>


                <tr>
                    <td><label for="daternd">daternd:</label></td>
                    <td>
                        <input type="text" id="daternd" name="daternd" value="<?php echo $rendez_vous['daternd'] ?>" />
                        <span id="erreurdate" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="demande_rdv">demande_rdv:</label></td>
                    <td>
                        <input type="text" id="demande_rdv" name="demande_rdv" value="<?php echo $rendez_vous['demande_rdv'] ?>" />
                        <span id="erreurdemande_rdv" style="color: red"></span>
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
    </body>

    </html>
<?php
}
?>