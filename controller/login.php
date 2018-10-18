<?php
    if (isset($_POST["username"])) {
        $redirectLink = "/view/profile";
        setcookie("username", $_POST["username"], 0, "/");
        header("Location: " . $redirectLink);
        exit();
    }
