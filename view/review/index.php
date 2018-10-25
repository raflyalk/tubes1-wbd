<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/login.php");
    // include ($_SERVER["DOCUMENT_ROOT"] .     "/model/history.php");

    if (!isset($_COOKIE["userId"])) {
        header("Location: /view/login?auth=false");
        exit();
    }

    session_start();
    $_SESSION["activeTab"] = "history";

    // Get user from database

    $user = getUser($_COOKIE["userId"]);
    $username = $user["username"];

    // Get orders and review
    // $historyList = getHistory($user["user_id"]);
    // $historyView = '';
    // while ($row = $historyList->fetch_assoc()) {
    //     $historyView = $historyView . '
    //           <li>
    //                 <div class="list-content flex-container">
    //                     <div class="image-holder"><a href="/view/book-detail?book-id=' . $row["book_id"] . '"><img src="' . $row["image_link"] . '"></a></div>
    //                     <div class="left-text-holder">
    //                         <a href="/view/book-detail?book-id=' . $row["book_id"] . '"><h2>' . $row["title"] . '</h2></a>
    //                         <div class="left-order-details">Jumlah ' . $row["num_book"] . '</div>
    //                         <div class="left-order-details">' . ((isset($row["rating"])) ? "Anda sudah memberikan review" : 'Belum direview') . '</div>
    //                     </div>
    //                     <div class="right-text-holder">
    //                         <div class="right-order-details">' . $row["order_date"] . '</div>
    //                         <div class="right-order-details">Nomor Order : #' . $row["order_id"] . '</div>
    //                         ' . ((!isset($row["rating"]))? '<div class="review-button"><a href="/view/review?order-id=' . $row["order_id"] . '">Review</a></div>' : "") . '
    //                     </div>
    //                 </div>
    //             </li>
    //     ';
    // }
?>

<html>
    <head>
        <title>Review</title>
        <link rel="stylesheet" href="/assets/global/global.css">
        <link rel="stylesheet" href="/view/history/history.css">
        <!-- <link rel="stylesheet" href="/view/review/review.css"> -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER[DOCUMENT_ROOT] . "/assets/header/header.php"); ?>
            <div class="content">
                <div class="left-book-detail">
                    <div class="book-title"><h1>Nota Hidup</h1></div>
                    <div class="left-book-details"> </div><h3>Light R. D. B.</h3>
                </div>
                <div class ="right-book-image"><img src="https://store-images.s-microsoft.com/image/apps.34477.9007199266245907.4a4e2c37-33a9-40ae-8daf-c3b4776b9a89.41c21cd6-697f-4de5-b77c-4ef74a2bfedc?mode=scale&q=90&h=270&w=270&background=%234267B2" alt=""></div>
                <h2>Add Rating</h2>
                <div class="rating">Rating</div>
                <h2>Add Comment</h2>
                <textarea name="comment" id="comment" rows="10"></textarea>
                <input type="button" id="back" value="Back">
                <input type="button" id="submit" value="Submit">
                <!-- <ul>
                    
                </ul> -->
            </div>
        </div>
    </body>
</html>