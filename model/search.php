<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/database.php");

function getSearchResult($searchQ) {
    global $mysqli;
    $query = "
      SELECT 
        book.book_id,
        book.title,
        book.author,
        book.description,
        book.image_link
      FROM
        book
      WHERE title LIKE '%" . $searchQ . "%'
         OR description LIKE '%" . $searchQ . "%';
    ";

    $result = $mysqli->query($query);

    return $result;
}