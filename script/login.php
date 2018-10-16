<?php
    if (isset($_POST["username"])) {
        $redirectLink = "/page/test-login";
        setcookie("username", $_POST["username"], time() + 1800, "/");
        header("Location: " . $redirectLink);
        exit();
    }
