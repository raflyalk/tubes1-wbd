<?php
//    echo "hello";
    if (isset($_COOKIE["username"])) {
        $redirectLink = "/view/profile";
    } else {
        $redirectLink = "/view/login";
    }
    header("Location: " . $redirectLink);
    exit();