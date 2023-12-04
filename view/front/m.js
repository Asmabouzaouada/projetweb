function valide() {
    var cin = document.getElementById("cin").value;
    var cinLength = 8;

    if (!cin || isNaN(cin) || cin.length !== cinLength) {
        alert("NUM CIN INCORRECT !!!");
        return false;
    }

    var email = document.getElementById("email").value;

    if (!isValidEmail(email)) {
        alert("EMAIL INCORRECT !!!");
        return false;
    }

    fetch('https://api.validate.email/check/' + email)
        .then(response => response.json())
        .then(data => {
            if (data.valid) {
                alert("EMAIL VALIDE !!!");
            } else {
                alert("EMAIL INVALIDE !!!");
            }
        });

    var text = document.getElementById("sujet").value;

    if (text.length > 100) {
        alert("TEXT EXCEEDS MAXIMUM LIMIT OF 100 CHARACTERS !!!");
        return false;
    }

    alert("FORM VALID !!!");
    return true; // Allow form submission
}

function isValidEmail(email) {
    // Basic email validation, you might want to enhance this
    return email.includes('@') && email.length > 5;
}
