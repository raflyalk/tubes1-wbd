var username = document.querySelector('#username');
var password = document.querySelector('#password');
var loginForm = document.querySelector('.login-form');
var usernameValidation = document.querySelector('#username-validation');
var passwordValidation = document.querySelector('#password-validation');

const validateUsernameField = () => {
    if (username.value.length === 0) {
        usernameValidation.innerText = "Username cannot be empty!"
    } else {
        usernameValidation.innerText = ""
    }
};

const validatePasswordField = () => {
    if (password.value.length === 0) {
        passwordValidation.innerText = "Password cannot be empty!"
    } else {
        passwordValidation.innerText = "";
    }
};

username.onchange = validateUsernameField;

password.onchange = validatePasswordField;

loginForm.onsubmit = () => {
    if (username.value.length === 0 || password.value.length === 0) {
        validateUsernameField();
        validatePasswordField();
        return false;
    } else {
        return true;
    }
}