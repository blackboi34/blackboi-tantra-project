

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/account.css">
    <link href="https://fonts.googleapis.com/css2?family=Garamond&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
<?php
session_start();
if (!isset($_SESSION["userid"])) {
header("Location: login.php");
exit();
}


require_once("header.php");
?>
    <section id="main">
    <fieldset>
        <h1>PROFILE DETAILS</h1>
        <hr class="login">
        <h2>UserID : <?php echo $_SESSION["userid"]?></h2>
        <h2>Email : <?php echo $_SESSION["email"]?></h2>
        <h2>Mobile : <?php echo $_SESSION["mobile"]?></h2>
        <h2>Password : <?php echo $_SESSION["password"]?></h2>
        <hr class="login">
        <h1>CHANGE DETAILS</h1>
        <hr class="login">
        <?php
        if (isset($_SESSION["upderror"])) {
            if ($_SESSION["upderror"] == 122) {
                echo "<p style='color:red;'>Error: Email already exists.</p>";
            } elseif ($_SESSION["upderror"] == 123) {
                echo "<p style='color:red;'>Error: Update failed.</p>";
            }
            unset($_SESSION["upderror"]); // Clear the error message after displaying it
        }
        ?>
        <form action="account_process.php" method="post">
                <br>
                <label for="mobile"></label><br>
                <input type="text" name="mobile" id="mobile" size="20" placeholder="Enter your mobile number"><br>
                <br>
                <label for="email"></label><br>
                <input type="text" name="email" id="email" size="20" placeholder="Enter your email address"><br>
                <br>
                <input type="submit" id="submitbutton" class="button" value="Submit Form">
        </form>
    </fieldset>
    </section>
    <?php require_once("footer.php")?>
</body>
</html>
