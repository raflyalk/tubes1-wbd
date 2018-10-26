<?PHP
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/database.php");
include($_SERVER["DOCUMENT_ROOT"] . "/model/book-detail.php");

if (isset($_POST["user-id"]) and isset($_POST["book-id"]) and isset($_POST["total-order"])) {
    $order_id = createOrder($_POST["user-id"], $_POST["book-id"], $_POST["total-order"]);
    header('Content-Type: text/plain');
    echo $order_id;
}

?>
