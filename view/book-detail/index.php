<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/login.php");
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/review.php");
    
    if (!isset($_COOKIE["userId"])) {
        header("Location: /view/login?auth=false");
        exit();
    }

    session_start();
    $_SESSION["activeTab"] = "browse";

    // Get user from database

    $user = getUser($_COOKIE["userId"]);
    $username = $user["username"];

    // Get orders and book details
    
    $bookId = $_GET["book-id"];

    // $bookDetail = getBookDetail($bookId);

    // $bookDetailView = '
    // <div class="detail-holder">
    //     <div class="book-title"><h1>' . $bookDetail["title"] . '</h1></div>
    //     <div class="book-detail"> </div><h3>' . $bookDetail["author"] . '</h3>
    // </div>
    // <div class ="image-holder">
    //     <img src="' . $bookDetail["image_link"] . '" alt="">
    // </div>'
?>

<html>
    <head>
        <title>Review</title>
        <link rel="stylesheet" href="/assets/global/global.css">
        <link rel="stylesheet" href="/view/book-detail/book-detail.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER[DOCUMENT_ROOT] . "/assets/header/header.php"); ?>
            <div class="content">
                <div class="flex-container">
                    <div class="detail-holder">
                        <div class="book-title"><h1>Nota Hidup</h1></div>
                        <div class="book-author"><h3>Light D. R. B.</h3></div>
                        <div class="book-description"><h3>Buku ajaib ini berisi nama-nama orang terpilih. Jika namamu tertulis di buku ini maka kamu adalah salah satu orang yang beruntung.</h3></div>
                    </div>
                    <div class ="image-holder">
                        <img src="/assets/images/blank-star-64.png" alt="">
                    </div>
                    <div class ="rating-holder">
                        <div id= "rating-star-holder">
                            <img src="/assets/images/full-star-64.png">
                            <img src="/assets/images/full-star-64.png">
                            <img src="/assets/images/full-star-64.png">
                            <img src="/assets/images/full-star-64.png">
                            <img src="/assets/images/blank-star-64.png">
                        </div>
                        <div id="rating-number-holder">4.5/5.0</div>
                    </div>
                </div>
                <form id="review-form" action="/controller/review.php" method="POST">
                    <input type='hidden' name='order_id' value='<?php echo $orderId;?>'/> 
                    <div id="rating-holder">
                        <h2>Add Rating</h2>
                        <div id="rating-star-holder">
                            <label>
                                <input type="radio" name="rating" value="1">
                                <img class="rating-img" id="star1" src="/assets/images/blank-star-64.png">
                            </label>
                            <label>
                                <input type="radio" name="rating" value="2">
                                <img class="rating-img" id="star2" src="/assets/images/blank-star-64.png">
                            </label>
                            <label>
                                <input type="radio" name="rating" value="3">
                                <img class="rating-img" id="star3" src="/assets/images/blank-star-64.png">
                            </label>
                            <label>
                                <input type="radio" name="rating" value="4">
                                <img class="rating-img" id="star4" src="/assets/images/blank-star-64.png">
                            </label>
                            <label>
                                <input type="radio" name="rating" value="5">
                                <img class="rating-img" id="star5" src="/assets/images/blank-star-64.png">
                            </label>
                        </div>
                        <div class="validation" id="rating-validation"><!-- --></div>
                    </div>
                    <div id="comment-holder">                    
                        <h2>Add Comment</h2>
                        <textarea name="comment" id="comment" rows="5"></textarea>
                        <div class="validation" id="comment-validation"><!-- --></div>
                    </div>
                    <div id="form-button">
                        <input type="submit" name="action" id="back" value="Back">
                        <input type="submit" name="action" id="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <script src="/view/review/script.js"></script>
    </body>
</html>