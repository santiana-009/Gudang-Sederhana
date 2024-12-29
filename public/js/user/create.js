document.addEventListener('DOMContentLoaded', function () {
    var password = document.getElementById('password');
    var password2 = document.getElementById('password2');
    var form = document.getElementById('yourFormId'); // Replace 'yourFormId' with the actual ID of your form

    function validatePassword() {
        if (password.value !== password2.value) {
            password2.setCustomValidity("Passwords do not match");
        } else {
            password2.setCustomValidity('');
        }
    }

    password.addEventListener('change', validatePassword);
    password2.addEventListener('keyup', validatePassword);

    form.addEventListener('submit', function (event) {
        if (password.value !== password2.value) {
            event.preventDefault();
            alert("Passwords do not match. Please check your passwords and try again.");
        }
    });
});