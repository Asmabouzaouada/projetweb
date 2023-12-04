// verif.js
document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('signupForm').addEventListener('submit', function (event) {
      var email = document.getElementById('email').value;
      var password = document.getElementById('psw').value;

      var emailMsg = document.getElementById('emailMsg');
      var pswMsg = document.getElementById('pswmsg');

      // Reset error messages
      emailMsg.innerHTML = '';
      pswMsg.innerHTML = '';

      // Validate email
      if (email.trim() === '') {
          event.preventDefault();
          emailMsg.innerHTML = 'Email cannot be empty';
      }

      // Validate password
      if (password.length < 3) {
          event.preventDefault();
          pswMsg.innerHTML = 'Password must be at least 3 characters long';
      }
  });
});

  
