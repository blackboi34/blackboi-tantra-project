<?php 
    // set up 4 global variables that can be included by other PHP files 
    $hostname ="localhost"; 
    $dbUser = "root"; 
    $dbPassword = ""; 
    $db = "yantra"; 
 
    $mysqli = new mysqli($hostname,$dbUser,$dbPassword,$db); 
    if($mysqli->connect_errno) { 
        echo "Failed to connect to MySQL: ".$mysqli->connect_error; 
        exit(); 
    } 
