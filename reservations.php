<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/reservations.css">
    <link href="https://fonts.googleapis.com/css2?family=Garamond&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once("header.php"); ?>
    <section id="main">
    <?php
    // Check if the user is logged in
    if (!isset($_SESSION["userid"])) {
        header("Location: login.php");
        exit();
    }

    require 'dbinfo.php'; // This file sets up the $mysqli variable

    // Fetch past reservations for the logged-in user
    $user_id = $_SESSION['userid'];
    $query = "SELECT orders.orderID, orders.orderDate, orders.order_date, orders.num_people, orders.special_requests
              FROM orders
              WHERE orders.userFK = '$user_id'
              ORDER BY orders.order_date ASC";
    $result = $mysqli->query($query);
    ?>

    <h1>Your Past Reservations</h1>
    <h2>cancelation is available until 2 days before the reservation date</h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Date</th>
                <th>Number of People</th>
                <th>Special Requests</th>
                <th>Cancelation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Calculate if the reservation can be canceled
                    $cancel_allowed = (strtotime($row['order_date']) - strtotime('now')) >= 2 * 24 * 60 * 60;
                    echo "<tr>";
                    echo "<td>" . $row['orderID'] . "</td>";
                    echo "<td>" . $row['orderDate'] . "</td>";
                    echo "<td>" . $row['order_date'] . "</td>";
                    echo "<td>" . $row['num_people'] . "</td>";
                    echo "<td>" . $row['special_requests'] . "</td>";
                    echo "<td>";
                    if ($cancel_allowed) {
                        echo "<form action='cancel_reservation.php' method='post'>
                                <input type='hidden' name='orderID' value='" . $row['orderID'] . "'>
                                <input class='button' type='submit' value='Cancel'>
                              </form>";
                    } else {
                        echo "Cannot cancel";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No past reservations found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // Close the connection
    $mysqli->close();
    ?>
    </section>
    <?php require_once("footer.php"); ?>
</body>
</html>