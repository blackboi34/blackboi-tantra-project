<?php

session_start();

require 'dbinfo.php'; // This file sets up the $mysqli variable

// Check if the orderID is set in the POST request
if (isset($_POST['orderID'])) {
    $orderID = $_POST['orderID'];
    
    // Fetch the reservation details
    $query = "SELECT order_date FROM orders WHERE orderID = '$orderID' AND userFK = '".$_SESSION['userid']."'";
    $result = $mysqli->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Check if the reservation date is at least 2 days in the future
        if ((strtotime($row['order_date']) - strtotime('now')) >= 2 * 24 * 60 * 60) {
            // Delete the reservation
            $deleteQuery = "DELETE FROM orders WHERE orderID = '$orderID' AND userFK = '".$_SESSION['userid']."'";
            if ($mysqli->query($deleteQuery) === TRUE) {
                echo "Reservation canceled successfully.";
            } else {
                echo "Error canceling reservation: " . $mysqli->error;
            }
        } else {
            echo "Cannot cancel reservation within 2 days of the reservation date.";
        }
    } else {
        echo "Reservation not found.";
    }
} else {
    echo "Invalid request.";
}

$mysqli->close();

header('Location: reservations.php');
exit();
?>