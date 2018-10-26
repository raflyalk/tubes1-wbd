<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/database.php");

function getBookDetail($bookId) {
    global $mysqli;

    $query="
        SELECT * FROM book WHERE book_id = " . $bookId . "; 
    ";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function updateProfile($userId, $picturePath, $name, $address, $phoneNumber) {
    global $mysqli;

    $query = "
        UPDATE user
        SET
          fullname='" . $name . "',
          prof_pic='" . $picturePath . "',
          addrs='" . $address . "',
          phone_num='" . $phoneNumber . "'
        WHERE user_id='" . $userId . "';
    ";
    $mysqli->query($query);
}

?>