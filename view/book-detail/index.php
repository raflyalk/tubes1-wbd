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
        <title>Book Detail #<?php echo $bookId?></title>
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
                        <div class="book-description">Buku ajaib ini berisi nama-nama orang terpilih. Jika namamu tertulis di buku ini maka kamu adalah salah satu orang yang beruntung.</div>
                    </div>
                    <div class="right-object-holder">
                        <div class ="image-holder">
                            <img src="/assets/images/mail.png" alt="">
                        </div>
                            <div class="rating-star-holder">
                                <div><img class="rating-star" src="/assets/images/full-star-64.png"></div>
                                <div><img class="rating-star" src="/assets/images/full-star-64.png"></div>
                                <div><img class="rating-star" src="/assets/images/full-star-64.png"></div>
                                <div><img class="rating-star" src="/assets/images/full-star-64.png"></div>
                                <div><img class="rating-star" src="/assets/images/blank-star-64.png"></div>
                            </div>
                        <div class="rating-number-holder">4.5/5.0</div>
                    </div>
                </div>
                <form id="order-form" action="/controller/book-detail.php" method="POST">
                    <div>
                        <input type='hidden' name='order_id' value='<?php echo $bookId;?>'/>
                        <div id="order-holder">
                            <h2>Order</h2>
                            Jumlah: 
                            <select name="total-order" id="total-order">
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                            </select>
                        </div>
                        <div id="form-button">
                            <input type="submit" id="submit-order-button" value="Order">
                        </div>
                    </div>
                </form>
                <div id="review-holder">
                    <h2>Reviews</h2>
                    <div class="flex-container">
                        <div class="image-holder avatar">
                            <img src="/assets/images/edit.png">
                        </div>
                        <div class="center-holder">
                            <h3>@tayotoya</h3>
                            Buku ini keren bet!! wowowowowowowo mantap djiwa bismillah css jadi yeeeeeeeyyyyy
                        </div>
                        <div class="right-object-holder">
                            <div class="rating-star-holder review-rating-star"><img src="/assets/images/full-star-64.png"></div>
                            <div class="rating-number-holder">4.0 / 5.0</div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <script src="/view/review/script.js"></script>
    </body>
</html>