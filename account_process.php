<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
    exit();
}

require_once("dbinfo.php");

$userid = $_SESSION["userid"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    // Check if the email already exists
    $check = "SELECT * FROM `users` WHERE email = '$email'";
    $confirm = $mysqli->query($check);

    if ($confirm->num_rows > 0) {
        $_SESSION["upderror"] = 122; // Email already exists
    } else {
        // Update the account details
        $sqlStatement = "UPDATE users SET `email`='$email', `mobile`='$mobile' WHERE userID='$userid'";
        if ($mysqli->query($sqlStatement) === TRUE) {
            $_SESSION["email"] = $email;
            $_SESSION["mobile"] = $mobile;
            unset($_SESSION["upderror"]); // Clear error if update is successful
        } else {
            $_SESSION["upderror"] = 123; // Update failed
        }
    }

    $mysqli->close();
    header("Location: account.php");
    exit();
}
?>
