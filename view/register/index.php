<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link type="text/css" rel="stylesheet" href="/view/register/register.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pathway+Gothic+One" rel="stylesheet">
</head>
<body>
    <div class="register-box">
    <h1>REGISTER</h1>
    <form class="register-form" action="" method="post">
        <table class="input-field-container">
            <tr class="form-input">
                <td><label for="fullname">Name</label></td>
                <td><input type="text" id="fullname" name="fullname" size="20"></td>
            </tr>
            <tr class="form-input">
                <td><label for="username">Username</label></td>
                <td><input type="text" id="username" name="username" size="20"></td>
                <td><span id="username-validation">ok</span></td>
            </tr>
            <tr class="form-input">
                <td><label for="email">Email</label></td>
                <td><input type="text" id="email" name="email" size="20"></td>
                <td><span id="email-validation">ok</span></td>
            </tr>
            <tr class="form-input">
                <td><label for="password">Password</label></td>
                <td><input type="password" id="password" name="password" size="20"></td>
            </tr>
            <tr class="form-input">
                <td><label for="confirmpassword">Congirm Password</label></td>
                <td><input type="password" id="confirmpassword" name="confirmpassword" size="20"></td>
            </tr>
            <tr class="form-input">
                <td><label for="address">Address</label></td>
                <td><textarea id="address" name="address" width="20" height="10"></textarea></td>
            </tr>
            <tr class="form-input">
                <td><label for="phonenumber">Phone Number</label></td>
                <td><input type="text" id="phonenumber" name="phonenumber" size="20"></td>
            </tr>
        </table>
        <div id="login-button">
            <a href="/view/login">Already have an account?</a>
        </div>
        <div class="register-button">
            <input id="register-button" type="submit" value="REGISTER">
        </div>
    </form>
    <script type="text/javascript" src="/view/register/script.js"></script>
</body>
</html>