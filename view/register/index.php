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
        <div class="input-field-container">
            <div class="form-input">
                <label for="fullname">Name</label>
                <input type="text" id="fullname" name="fullname" size="20">
            </div>
            <div class="form-input">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" size="20">
            </div>
            <div class="form-input">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" size="20">
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" size="20">
            </div>
            <div class="form-input">
                <label for="confirmpassword">Congirm Password</label>
                <input type="password" id="confirmpassword" name="confirmpassword" size="20">
            </div>
            <div class="form-input">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" size="20">
            </div>
            <div class="form-input">
                <label for="phonenum">Phone Number</label>
                <input type="text" id="phonenum" name="phonenum" size="20">
            </div>
        </div>
        <div id="login-button">
            <a href="/view/login">Already have an account?</a>
        </div>
        <div class="register-button">
            <input id="register-button" type="submit" value="REGISTER">
        </div>
    </form>
</body>
</html>