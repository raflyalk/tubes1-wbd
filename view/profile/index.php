<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/profile.php");
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/login.php");

    if (!isset($_COOKIE["userId"])){
        header("Location: /view/login?auth=false");
        exit();
    }
    session_start();
    $_SESSION["activeTab"] = "profile";

    //Get User From Database

    $user = getUser($_COOKIE["userId"]);
    $username = $user["username"];

    //Get Users data
    $userDat = getProfileData($user["user_id"]);
    $userPic = '
    <div class="white-font" align="center">
        <img id="avatar-img" src="/assets/images/' . $user["prof_pic"] . '"/>
        <h2>'.$user["fullname"] . '</h2>
    </div>';
    $userInf = '
    <div class="det2">
        @' . $user['username'] . '<br><br>
        ' . $user['email'] . '<br><br>
        ' . $user['addrs'] . '<br><br>
        ' . $user['phone_num'] . '<br><br>
    </div>
    ';
?>

<html>
    <head>
        <title>Profile</title>
        <link rel = "stylesheet" href="/assets/global/global.css">
        <link rel = "stylesheet" href="/assets/profile/profile.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER['DOCUMENT_ROOT'] . "/assets/header/header.php"); ?>
            <div class="content">
                <div class="pic-cont">
                    <div align="right">
                        <button id="but1">
                            <a href="/view/edit-profile" ><img id="img-but1" class="inverted" src="/assets/images/edit.png" /></a>
                        </button>
                        <?php
                            echo $userPic;
                        ?>
                    </div>
                </div>
                <div class="det-cont">
                    <h2 class="orange-font">  My Profile </h2>
                    <div class="more-det">
                        <div class="det1">
                            <span>
                                <img class="icon" src="/assets/images/username.png"/>
                                Username <br><br>
                            </span>
                            <span>
                                <img class="icon" src="/assets/images/mail.png"/>
                                Email<br><br>
                            </span>
                            <span>
                                <img class="icon" src="/assets/images/address.png"/>
                                Address<br><br>
                            </span>
                            <span>
                                <img class="icon" src="/assets/images/phone.png"/>
                                Phone Number<br><br>
                            </span>
                        </div>

                        <div class="det2">
                            <?php
                                echo $userInf;
                            ?>
                        </div>
                        <div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
    