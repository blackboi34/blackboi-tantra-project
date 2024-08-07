<?php
require_once("dbInfo.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if a record with the same userid already exists
    $sqlStatement = "SELECT * FROM users WHERE userid = '$userid'";
    $result = $mysqli->query($sqlStatement);

    if ($result->num_rows > 0) {
        $_SESSION['err_label'] = "UserID already exists. Please choose a different UserID.";
        header("Location: create.php");
        exit;
    }

    // Check if a record with the same email already exists
    $sqlStatement = "SELECT * FROM users WHERE email = '$email'";
    $result = $mysqli->query($sqlStatement);

    if ($result->num_rows > 0) {
        $_SESSION['errr_label'] = "You have already created an account with this email.";
        header("Location: create.php");
        exit;
    } else {
        // Insert the new user into the database
        $sqlStatement = "INSERT INTO users (userid, mobile, email, password) VALUES ('$userid', '$mobile', '$email', '$password')";
        if ($mysqli->query($sqlStatement) === TRUE) {
            $mysqli->close();
            header("Location: login.php");
            exit;
        } else {
            $_SESSION['err_label'] = "Error creating account: " . $mysqli->error;
            header("Location: create.php");
            exit;
        }
    }
}
?>