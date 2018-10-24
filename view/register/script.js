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

function addUsernameValidation() {
    console.log('sampai username validation');
    console.log(xmlhttp.readyState);
    console.log(xmlhttp.status);
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var usernameValidation = document.getElementById('username-validation')
        if (xmlhttp.responseText === "taken") {
            usernameValidation.innerHTML = 'boo'
        } else if (xmlhttp.responseText === "available") {
            usernameValidation.innerHTML = 'yay'
        }
    }
}

function getUsername() {
    var username = document.getElementById('username').value;
    var qry = 'username=' + username;
    var url = '/controller/register.php?' + qry;
    xmlhttp.open('GET', url, true);
    xmlhttp.onreadystatechange = addUsernameValidation;
    xmlhttp.send(null);
}

var username = document.getElementById('username');
username.onchange = getUsername;