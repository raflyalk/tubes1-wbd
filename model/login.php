<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/database.php");

function findUsernamePassword($username, $password) {
    $query = "SELECT * FROM user WHERE username='" . $username . "' AND pass='" . $password . "'";
    global $mysqli;

    $result = $mysqli->query($query);
    error_log($result, 0);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}