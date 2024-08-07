<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/create.css">
    <link href="https://fonts.googleapis.com/css2?family=Garamond&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once("header.php"); 
    if (!isset($_SESSION["userid"])) {
        header("Location: login.php");
        exit();
    }

    ?>
    <section id="main">
    <fieldset>
        <h1>CREATE ACCOUNT</h1>
        <hr id="login">
        <div id="logon"><img id="logo" src="images/logo.png" alt="Logo"></div>
        <div align="center">
        <form name="createform" id="createform" action="create_process.php" method="post">
                <br>
                <label for="userid"></label><br>
                <input type="text" name="userid" id="userid" size="20" placeholder="UserID"><br>
                <div id="userid_err" class="err_label"></div>
                <br>
                <label for="mobile"></label><br>
                <input type="text" name="mobile" id="mobile" size="20" placeholder="Enter your mobile number"><br>
                <div id="mobile_err" class="err_label"></div>
                <br>
                <label for="email"></label><br>
                <input type="text" name="email" id="email" size="20" placeholder="Enter your email address"><br>
                <div id="email_err" class="err_label"></div>
                <br>
                <label for="password"></label><br>
                <input type="password" name="password" id="password" size="20" placeholder="Enter your password"><br>
                <div id="password_err" class="err_label"></div>
                <br>
                <label for="confirm_password"></label><br>
                <input type="password" name="confirm_password" id="confirm_password" size="20" placeholder="Re-enter your password"><br>
                <div id="confirm_password_err" class="err_label"></div>
                <br>
                <input type="submit" id="submitbutton" class="button" value="Submit Form">
                <div class="err_label">
                <?php
                    if (isset($_SESSION['err_label'])) {
                        echo "<p style='color: red;'>".$_SESSION['err_label']."</p>";
                        unset($_SESSION['err_label']);
                    }
                    if (isset($_SESSION['errr_label'])) {
                        echo "<p style='color: red;'>".$_SESSION['errr_label']."</p>";
                        unset($_SESSION['errr_label']);
                    }
                ?>
                </div>
        </form>
        </div>
    </fieldset>
    </section>
    <?php require_once("footer.php"); ?>
    <script src="js/create.js"></script>
</body>
</html>

