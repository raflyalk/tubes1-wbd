<?php
    session_start();
    $_SESSION["activeTab"] = "history";
?>

<html>
    <head>
        <title>History</title>
        <link rel="stylesheet" href="/assets/global/global.css">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER[DOCUMENT_ROOT] . "/assets/header/header.php"); ?>
        </div>
    </body>
</html>