<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Client</title>
    <style>
        /* Ajoutez du CSS pour styliser votre formulaire selon vos préférences */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            margin-left: 500px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Formulaire Client</h2>

    <form id="formulaireClient" method="get" action="">

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required oninput="validerAdresse()">
        <!-- Ajout d'un élément span pour afficher le message de validation -->
        <span id="myAdresse"></span>

        <label for="date">Date de livraison :</label>
        <input type="date" id="date" name="date" required>
        <!-- Ajout d'un élément span pour afficher le message de validation -->
        <span id="myDate"></span>

        <button type="submit">Commande</button>
    </form>

    <script>
        // Vous pouvez ajouter un script JavaScript pour traiter le formulaire ici
        document.getElementById("formulaireClient").addEventListener("submit", function(event) {
            event.preventDefault(); // Empêche l'envoi du formulaire par défaut

            // Récupérer les valeurs du formulaire
            var adresse = document.getElementById("adresse").value;
            var date = document.getElementById("date").value;

            // Appeler les fonctions de validation
            validerAdresse();
            checkDate();

            // Vous pouvez maintenant traiter ces données (par exemple, les envoyer au serveur) selon vos besoins
            console.log("Adresse:", adresse);
            console.log("Date:", date);
        });

        function validerAdresse() {
            var adresseInput = document.getElementById('adresse');
            var adressePattern = /^[a-zA-Z0-9._-]+$/;  // Modifié le pattern
            var msg = document.getElementById('myAdresse');

            if(adresseInput.value.match(adressePattern)) {
                msg.innerHTML = '<span style="color:green">Correct</span>';
            } else {
                msg.innerHTML = '<span style="color:red">Incorrect</span>';
            }
        }

        function checkDate() {
            var dateInput = document.getElementById('date');
            var msg = document.getElementById('myDate');
            const deliveryDate = dateInput.value;
            const selectedDate = new Date(deliveryDate);
            const today = new Date();

            if (selectedDate >= today) {
                msg.innerHTML = '<span style="color:green">Correct</span>';
            } else {
                msg.innerHTML = '<span style="color:red">Incorrect</span>';
            }
        }
    </script>

</body>
</html>
