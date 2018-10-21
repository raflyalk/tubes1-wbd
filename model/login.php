<?php

function findUsernamePassword($username, $password) {

    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "bookstore";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM user WHERE username=" . $username . " AND password=" . $password;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        setcookie(userId, $row["id"], 0, "/");
        $header = "Location: /view/profile";
        exit($header);
    } else {
        echo "0 results";
        $header = "Location: /view/login?failedLogin=true";
        exit($header);
    }
}