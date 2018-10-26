<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/login.php");
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/book-detail.php");
    
    if (!isset($_COOKIE["userId"])) {
        header("Location: /view/login?auth=false");
        exit();
    }

    $activeTab = "browse";

    // Get user from database

    $user = getUser($_COOKIE["userId"]);
    $username = $user["username"];

    // Get orders and book details
    
    $bookId = $_GET["book-id"];

    $bookDetail = getBookDetail($bookId);

    $bookAvgRating = number_format(round((float) $bookDetail["rating"], 1, PHP_ROUND_HALF_UP), 1);

    $bookStarRating = (int) $bookAvgRating;

    function generateStarRating($nStar) {
        $retVal = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $nStar) {
                $retVal = $retVal . '<div><img class="rating-star" src="/assets/images/full-star-64.png"></div> ';
            } else {
                $retVal = $retVal . '<div><img class="rating-star" src="/assets/images/blank-star-64.png"></div> ';
            }
        }
        return $retVal;
    }

    $bookRatingView = '';

    if ($bookDetail["rating"]) {
        $bookRatingView = '
        <div class="rating-star-holder">
            ' . generateStarRating($bookStarRating) . '
        </div>
        <div class="rating-number-holder">' . $bookAvgRating . ' / 5.0</div>';
    } else {
        $bookRatingView = '<div class="rating-number-holder">No review</div>';
    }

    $bookDetailView = '
    <div class="detail-holder">
        <div class="book-title"><h1>' . $bookDetail["title"] . '</h1></div>
        <div class="book-author"><h3>' . $bookDetail["author"] . '</h3></div>
        <div class="book-description">' . $bookDetail["description"] . '</div>
    </div>
    <div class="right-object-holder">
        <div class ="image-holder">
            <img src="' . $bookDetail["image_link"] . '">
        </div>
        ' . $bookRatingView . '
    </div>';

    $bookReview = getBookReview($bookId);

    $bookReviewView = '';

    if ($bookReview  == null) {
        $bookReviewView = '
        This book has no review yet
        ';
    } else {
        while ($row = $bookReview->fetch_assoc()) {
            $userRating = number_format(round((float) $row["rating"], 1, PHP_ROUND_HALF_UP), 1);
            $bookReviewView =  $bookReviewView . '
            <div class="flex-container">
                <div class="image-holder avatar">
                    <img src="' . $row["prof_pic"] . '">
                </div>
                <div class="center-holder">
                    <h3>@' . $row["username"] . '</h3>
                    ' . $row["content"] . '
                </div>
                <div class="right-object-holder">
                    <div class="rating-star-holder review-rating-star"><img src="/assets/images/full-star-64.png"></div>
                    <div class="rating-number-holder">' . $userRating . ' / 5.0</div>
                </div>
            </div>';    
        }
    }
?>

<html>
    <head>
        <title><?php echo $bookDetail["title"]?></title>
        <link rel="stylesheet" href="/assets/global/global.css">
        <link rel="stylesheet" href="/view/book-detail/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER["DOCUMENT_ROOT"] . "/assets/header/header.php"); ?>
            <div class="content">
                <div class="flex-container">
                    <?php echo $bookDetailView ?>
                </div>
                <form id="order-form" action="">
                    <div>
                        <input type='hidden' name='user-id' id='user-id' value='<?php echo $user["user_id"];?>'/>
                        <input type='hidden' name='book-id' id='book-id' value='<?php echo $bookId;?>'/>
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
                    <?php echo $bookReviewView ?>
                </div>
                </div>
            </div>
        </div>
        </div>
        <div id="order-modal" class="modal">
            <div class="modal-content">
                <div class="close">
                    <div>&times;</div>
                </div>
                <div class="flex-container">
                    <div class="check-img"><img src="/assets/images/checked.png" alt=""></div>
                    <div class="modal-text">
                        <div><b>Pemesanan berhasil!</b></div>
                        <div id="nomor-transaksi">Nomor transaksi : 3</div>
                    </div>
                </div>
            </div>
        <script src="/view/book-detail/script.js"></script>
    </body>
</html>