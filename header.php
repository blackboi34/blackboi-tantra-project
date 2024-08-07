<?php
// header.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <nav>
        <label for="hamburger">&#9776;</label>
        <input type="checkbox" id="hamburger">
        <ul>
            <li><a href="index.php"><img id="logo" src="images/logo.png" alt="Logo"></a></li>
        </ul>
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <?php
                if (!isset($_SESSION["userid"])) {
                    echo '<li><a href="login.php">Login</a></li>';
                } else {
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
            ?>
            <li><a href="create.php">Create</a></li>
            <li><a href="reserve.php">Reserve</a></li>
            <li><a href="reservations.php">Reservations</a></li>
            <li><a href="account.php">Account</a></li>
        </ul>
    </nav>
    <hr>
</header>
