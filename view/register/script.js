var xmlhttp = getXmlHttpRequest();

function getXmlHttpRequest() {
    var xmlHttpObj;
    if (window.XMLHttpRequest) {
        xmlHttpObj = new XMLHttpRequest();
    } else {
        try {
            xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttpObj = new
                    ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                xmlHttpObj = false;
            }
        }
    }
    return xmlHttpObj;
}

function validateFullname() {
    var fullname = document.getElementById('fullname').value;
    var fullnameValidationText = document.getElementById('fullname-validation-text')
    if (fullname.length === 0) {
        fullnameValidationText.innerHTML = 'This field is required';
    } else {
        fullnameValidationText.innerHTML = '';
    }
}

var fullname = document.getElementById('fullname');
fullname.onchange = validateFullname;

function addUsernameValidation() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var usernameValidationIcon = document.getElementById('username-validation-icon')
        var usernameValidationText = document.getElementById('username-validation-text')
        if (xmlhttp.responseText === "taken") {
            usernameValidationIcon.innerHTML = '<img src="/assets/images/wrong.png">';
            usernameValidationText.innerHTML = 'Username is already taken';
        } else if (xmlhttp.responseText === "available") {
            usernameValidationIcon.innerHTML = '<img src="/assets/images/right.png">';
            usernameValidationText.innerHTML = '';
        }
    }
}

function getUsername(username) {
    var qry = 'username=' + username;
    var url = '/controller/register.php?' + qry;
    xmlhttp.open('GET', url, true);
    xmlhttp.onreadystatechange = addUsernameValidation;
    xmlhttp.send(null);
}

function validateUsername() {
    var username = document.getElementById('username').value;
    var usernameValidationIcon = document.getElementById('username-validation-icon')
    var usernameValidationText = document.getElementById('username-validation-text')
    if (username.length === 0) {
        usernameValidationIcon.innerHTML = '<img src="/assets/images/wrong.png">';
        usernameValidationText.innerHTML = 'This field is required';
    } else if (/\s/.test(username)) {
        usernameValidationIcon.innerHTML = '<img src="/assets/images/wrong.png">';
        usernameValidationText.innerHTML = 'Username must not contain whitespace';
    } else if (username.length > 20) {
        usernameValidationIcon.innerHTML = '<img src="/assets/images/wrong.png">';
        usernameValidationText.innerHTML = 'Username must not exceed 20 characters';
    } else {
        getUsername(username)
    }
}

var username = document.getElementById('username');
username.onchange = validateUsername;

function addEmailValidation() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var emailValidationIcon = document.getElementById('email-validation-icon');
        var emailValidationText = document.getElementById('email-validation-text');
        if (xmlhttp.responseText === "taken") {
            emailValidationIcon.innerHTML = '<img src="/assets/images/wrong.png">';
            emailValidationText.innerHTML = 'Email has been used';
        } else if (xmlhttp.responseText === "available") {
            emailValidationIcon.innerHTML = '<img src="/assets/images/right.png">';
            emailValidationText.innerHTML = '';
        }
    }
}

function getEmail(email) {
    var qry = 'email=' + email;
    var url = '/controller/register.php?' + qry;
    xmlhttp.open('GET', url, true);
    xmlhttp.onreadystatechange = addEmailValidation;
    xmlhttp.send(null);
}

function validateEmail() {
    var email = document.getElementById('email').value;
    var emailValidationIcon = document.getElementById('email-validation-icon');
    var emailValidationText = document.getElementById('email-validation-text');
    var re = /[a-z0-9\._%+!$&*=^|~#%'`?{}/\-]+@([a-z0-9\-]+\.){1,}([a-z]{2,16})/;
    if (email.length === 0) {
        emailValidationIcon.innerHTML = '<img src="/assets/images/wrong.png">';
        emailValidationText.innerHTML = 'This field is required';
    } else if (! re.test(String(email).toLowerCase())) {
        emailValidationIcon.innerHTML = '<img src="/assets/images/wrong.png">';
        emailValidationText.innerHTML = 'Email is invalid';
    } else {
        getEmail(email)
    }
    
}

var email = document.getElementById('email');
email.onchange = validateEmail;


function validatePassword() {
    var password = document.getElementById('password').value;
    var passwordValidationText = document.getElementById('password-validation-text')
    if (password.length === 0) {
        passwordValidationText.innerHTML = 'This field is required';
    } else {
        passwordValidationText.innerHTML = '';
    }
}

var password = document.getElementById('password');
password.onchange = validatePassword;


function validateConfirmPassword() {
    var confirmpassword = document.getElementById('confirmpassword').value;
    var confirmPasswordValidationText = document.getElementById('confirmpassword-validation-text')
    if (confirmpassword.length === 0) {
        confirmPasswordValidationText.innerHTML = 'This field is required';
    } else {
        var password = document.getElementById('password').value;
        if (password !== confirmpassword) {
            confirmPasswordValidationText.innerHTML = 'Password doesn\'t match';
        } else {
            confirmPasswordValidationText.innerHTML = '';
        }
    }
}

var confirmpassword = document.getElementById('confirmpassword');
confirmpassword.onchange = validateConfirmPassword;

function validateAddress() {
    var address = document.getElementById('address').value;
    var addressValidationText = document.getElementById('address-validation-text')
    if (address.length === 0) {
        addressValidationText.innerHTML = 'This field is required';
    } else {
        addressValidationText.innerHTML = '';
    }
}

var address = document.getElementById('address');
address.onchange = validateAddress;

function validatePhonenumber() {
    var phonenumber = document.getElementById('phonenumber').value;
    var phonenumberValidationText = document.getElementById('phonenumber-validation-text')
    if (phonenumber.length === 0) {
        phonenumberValidationText.innerHTML = 'This field is required';
    } else if (!(/^[0-9]*$/.test(phonenumber))) {
        phonenumberValidationText.innerHTML = 'Phone number must only contain number';
    } else if (phonenumber.length < 9) {
        phonenumberValidationText.innerHTML = 'Phone number must have at least 9 numbers';
    } else if (phonenumber.length > 12) {
        phonenumberValidationText.innerHTML = 'Phone number must not exceed 12 numbers';
    } else {
        phonenumberValidationText.innerHTML = '';
    }
}

var phonenumber = document.getElementById('phonenumber');
phonenumber.onchange = validatePhonenumber;