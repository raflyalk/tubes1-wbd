<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/login.php");
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/review.php");
    
    if (!isset($_COOKIE["userId"])) {
        header("Location: /view/login?auth=false");
        exit();
    }

    session_start();
    $_SESSION["activeTab"] = "history";

    // Get user from database

    $user = getUser($_COOKIE["userId"]);
    $username = $user["username"];

    // Get orders and book details
    
    $orderId = $_GET["order-id"];

    $bookDetail = getBookDetail($orderId);

    $bookDetailView = '
    <div class="detail-holder">
        <div class="book-title"><h1>' . $bookDetail["title"] . '</h1></div>
        <div class="book-detail"> </div><h3>' . $bookDetail["author"] . '</h3>
    </div>
    <div class ="image-holder">
        <img src="' . $bookDetail["image_link"] . '" alt="">
    </div>'
?>

<html>
    <head>
        <title>Review</title>
        <link rel="stylesheet" href="/assets/global/global.css">
        <link rel="stylesheet" href="/view/review/review.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER[DOCUMENT_ROOT] . "/assets/header/header.php"); ?>
            <div class="content">
                <div class="flex-container">
                    <?php
                        echo $bookDetailView
                    ?>
                </div>
                <form id="review-form" action="/controller/review.php" method="POST">
                    <input type='hidden' name='order_id' value='<?php echo $orderId;?>'/> 
                    <div id="rating-holder">
                        <h2>Add Rating</h2>
                        <input type="radio" name="rating" id="star1" value="1"> 1
                        <input type="radio" name="rating" id="star2" value="2"> 2
                        <input type="radio" name="rating" id="star3" value="3"> 3
                        <input type="radio" name="rating" id="star4" value="4"> 4
                        <input type="radio" name="rating" id="star5" value="5"> 5
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