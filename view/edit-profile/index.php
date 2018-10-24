<?php
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/login.php");
    include ($_SERVER["DOCUMENT_ROOT"] . "/model/history.php");

    if (!isset($_COOKIE["userId"])) {
        header("Location: /view/login?auth=false");
        exit();
    }

    session_start();
    $_SESSION["activeTab"] = "profile";

    // Get user from database

    $user = getUser($_COOKIE["userId"]);
    $username = $user["username"];

?>

<html>
    <head>
        <title>History</title>
        <link rel="stylesheet" href="/assets/global/global.css">
        <link rel="stylesheet" href="/view/edit-profile/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include ($_SERVER[DOCUMENT_ROOT] . "/assets/header/header.php"); ?>
            <div class="content">
                <h1>Edit Profile</h1>
                <form method="post" action="/controller/edit-profile.php" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <div>
                                    <img src="<?php echo $user["prof_pic"] ?>">
                                </div>
                            </td>
                            <td>
                                <label for="profile-picture">Update profile picture</label>
                                <input type="file" id="profile-picture" name="profilePicture" accept="image/*">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">Name</label>
                            </td>
                            <td>
                                <input type="text" id="name" name="name" value="<?php echo $user["fullname"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="address">Address</label>
                            </td>
                            <td>
                                <textarea id="address" name="address"><?php echo $user["addrs"] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="phone-number">Phone Number</label>
                            </td>
                            <td>
                                <input type="tel" id="phone-number" name="phoneNumber" value="<?php echo $user["phone_num"] ?>">
                            </td>
                        </tr>

                    </table>
                    <a id="back-button" href="/view/profile">Back</a>
                    <input type="hidden" name="userId" value="<?php echo $user["user_id"] ?>">

                    <input id="save-button" type="submit" value="Save">
                </form>
            </div>
        </div>
    </body>
</html>