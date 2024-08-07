<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Garamond&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once("header.php"); ?>
    <section id="main">
    <fieldset>
    <h1>LOGIN</h1>
    <hr id="login">
        <div  id="logon" ><img id="logo" src="images/logo.png" alt="Logo"></div>
        <div align="center">
            <form action="login_process.php" method="post">
               
                <table>
                    <tr>
                        <td class="leftalign"><p><label for="userid"></label></p></td>
                        <td><input type="text" name="userid" placeholder="User ID" ></td>
                    </tr>
                    <tr>
                        <td class="leftalign"><p><label for="passwd"></label></p></td>
                        <td><input type="password" name="passwd" placeholder="Password" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="button" type="submit" value="Login"></td>
                    </tr>
                </table>
                
               
            </form>
        </div>
        </fieldset>
    </section>
    <?php require_once("footer.php")?>
    

</body>
</html>

