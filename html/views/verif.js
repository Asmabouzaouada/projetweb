document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('form').addEventListener('submit', function (event) {
        var pseudo = document.getElementById('pseudo').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        var erreurNom = document.getElementById('erreurNom');
        var erreurEmail = document.getElementById('erreurEmail');
        var erreurPsw = document.getElementById('erreurPsw');

        // Reset error messages
        erreurNom.textContent = '';
        erreurEmail.textContent = '';
        erreurPsw.textContent = '';

        // Perform validation
        var isValid = true;

        if (pseudo.trim() === '') {
            erreurNom.textContent = 'Le pseudo est requis.';
            isValid = false;
        }

        if (email.trim() === '') {
            erreurEmail.textContent = 'L\'adresse email est requise.';
            isValid = false;
        }

        if (password.length < 3) {
            erreurPsw.textContent = 'Le mot de passe doit avoir au moins 3 caractères.';
            isValid = false;
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });
});
