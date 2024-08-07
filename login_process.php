<?php

    require_once("dbinfo.php");

    $sqlstatement = "SELECT COUNT(*) FROM users WHERE userid ='" . $_POST["userid"] . "' AND password = '" . $_POST["passwd"] . "'";

    echo $sqlstatement . "<br>";

    $result = $mysqli -> query($sqlstatement);

    $record = $result -> fetch_assoc();
        
    $result -> free_result();

    if ($record["COUNT(*)"] === '1')
    {
        session_start();

        $sqlstatement = "SELECT userid, email, password, mobile FROM users WHERE userid ='" . $_POST["userid"] . "' AND password = '" . $_POST["passwd"] . "'";

        $result = $mysqli -> query($sqlstatement);
        $record = $result -> fetch_assoc();
        $result -> free_result();

        $_SESSION["userid"] = $record["userid"];
        $_SESSION["email"] = $record["email"];
        $_SESSION["password"] = $record["password"];
        $_SESSION["mobile"] = $record["mobile"];


        $mysqli -> close();

        
        header("Location: reserve.php");
    }
    else{
        header("Location: create.php");
    }

