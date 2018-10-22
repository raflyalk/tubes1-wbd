<?php
    $errorMessage = '';
    if (isset($_GET["loginFailed"]) and $_GET["loginFailed"] === 'true') {
        $errorMessage = '
        <div class="error-message">
            Username/Password is incorrect
        </div>
        ';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="/view/login/login.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pathway+Gothic+One" rel="stylesheet">
</head>
<body>
    <div class="login-box">
        <h1>LOGIN</h1>
        <?php echo $errorMessage; ?>
        <form class="login-form" action="/controller/login.php" method="post">
            <div class="input-field-container">
                <div class="form-input">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" size="20">
                </div>
                <div class="validation" id="username-validation">

                </div>
                <div class="form-input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" size="20">
                </div>
                <div class="validation" id="password-validation">

                </div>
            </div>
            <div id="register-button">
                <a href="/view/register">Don't have an account?</a>
            </div>
            <div class="login-button">
                <input id="login-button" type="submit" value="LOGIN">
            </div>
        </form>
    </div>
    <script src="/view/login/login-validation.js"></script>
</body>
</html>