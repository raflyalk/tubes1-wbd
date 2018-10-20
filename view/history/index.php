<?php
    session_start();
    $_SESSION["activeTab"] = "history";
?>

<html>
    <head>
        <title>History</title>
        <link rel="stylesheet" href="/assets/global/global.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER[DOCUMENT_ROOT] . "/assets/header/header.php"); ?>
        </div>
    </body>
</html>