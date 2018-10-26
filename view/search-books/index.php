<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/profile.php");
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/login.php");

    if (!isset($_COOKIE["userId"])){
        header("Location: /view/login?auth=false");
        exit();
    }
    $activeTab = "browse";

    //Get User From Database

    $user = getUser($_COOKIE["userId"]);
    $username = $user["username"];

?>

<html>
    <head>
        <title>Search Book</title>
        <link rel="stylesheet" href="/assets/global/global.css">
        <link rel="stylesheet" href="/assets/search/searchBook.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER[DOCUMENT_ROOT] . "/assets/header/header.php"); ?>
            <h1>Search Book</h1>
            <input type="text" id="search-txt" placeholder="input search terms"/>
        </div>
    </body>
</html>