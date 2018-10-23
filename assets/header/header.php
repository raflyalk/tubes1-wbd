<div class="top-navbar">
    <ul>
        <li class="navbar-logo">
            <h1 class="header-logo"><span class="pro-logo">Pro</span>-Book</h1>
        </li>
        <li class="top-right-navbar logout">
            <a href="/controller/logout.php" class="logout-button">
                <img src="/assets/images/power.png">
            </a>
        </li>
        <li class="top-right-navbar user-greeting">
            <div>Hi, <?php echo $username ?></div>
        </li>
    </ul>
</div>
<div class="bottom-navbar">
    <ul>
        <li
            <?php if ($_SESSION['activeTab'] === 'browse') {
                echo 'class="active"';
            }?>
        ><a href="/view/search-books">Browse</a></li>
        <li
            <?php if ($_SESSION['activeTab'] === 'history') {
                echo 'class="active"';
            }?>
        ><a href="/view/history">History</a></li>
        <li <?php if ($_SESSION['activeTab'] === 'profile') {
                echo 'class="active"';
            }?>
        ><a href="/view/profile">Profile</a></li>
    </ul>
</div>