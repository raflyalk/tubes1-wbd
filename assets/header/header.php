<?php
    // Username will use from cookies later on!
    $username = "tayotayo";
?>

<div class="top-navbar">
    <ul>
        <li class="navbar-logo">
            <h1 class="header-logo"><span class="pro-logo">Pro</span>-Book</h1>
        </li>
        <li class="top-right-navbar logout">
            <button class="logout-button">
                <img src="/assets/images/power.png">
            </button>
        </li>
        <li class="top-right-navbar">
            <span>Hi, <?php echo $username ?></span>
        </li>
    </ul>
</div>
<div class="bottom-navbar">
    <ul>
        <li
            <?php if ($_SESSION['activeTab'] === 'browse') {
                echo 'class="active"';
            }?>
        ><a href="#">Browse</a></li>
        <li
            <?php if ($_SESSION['activeTab'] === 'history') {
                echo 'class="active"';
            }?>
        ><a href="#">History</a></li>
        <li <?php if ($_SESSION['activeTab'] === 'profile') {
                echo 'class="active"';
            }?>
        ><a href="#">Profile</a></li>
    </ul>
</div>