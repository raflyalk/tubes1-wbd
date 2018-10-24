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
        fullnameValidationText.innerHTML = 'This field is required'
    }
}

var fullname = document.getElementById('fullname');
fullname.onchange = validateFullname;

function addUsernameValidation() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var usernameValidationIcon = document.getElementById('username-validation-icon')
        var usernameValidationText = document.getElementById('username-validation-text')
        if (xmlhttp.responseText === "taken") {
            usernameValidationIcon.innerHTML = 'boo'
            usernameValidationText.innerHTML = '<font color="red">Username is already taken</font>'
        } else if (xmlhttp.responseText === "available") {
            usernameValidationIcon.innerHTML = 'yay'
            usernameValidationText.innerHTML = ''
        }
    }
}

function getUsername(username) {
    // var username = document.getElementById('username').value;
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
        usernameValidationIcon.innerHTML = 'boo'
        usernameValidationText.innerHTML = 'This field is required'
    } else if (username.length > 20) {
        usernameValidationIcon.innerHTML = 'boo'
        usernameValidationText.innerHTML = 'Username must not exceed 20 characters'
    } else {
        getUsername(username)
    }
}

var username = document.getElementById('username');
username.onchange = validateUsername;