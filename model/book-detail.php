<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/database.php");

function getBookDetail($bookId) {
    global $mysqli;

    $query="
    SELECT book_id, title, author, description, image_link, AVG(rating) as rating
    FROM review NATURAL JOIN orders RIGHT OUTER JOIN book USING (book_id)
    WHERE book_id = " . $bookId . "
    GROUP BY book.book_id; 
    ";
    
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function getBookReview($bookId) {
    global $mysqli;

    $query="
        SELECT review.rating, review.content, user.username, user.prof_pic
        FROM review INNER JOIN orders USING (order_id) INNER JOIN user ON (user.user_id = orders.user_id)
        WHERE book_id = " . $bookId . ";
    ";
    
    $result = $mysqli->query($query);

    if ($result->num_row <= 0) {
        return null;
    }
    return $result;
}

?>