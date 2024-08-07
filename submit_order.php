<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>submitReservation</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Garamond&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once("header.php"); ?>
    <section id="main">
    <?php
    require_once("dbInfo.php");

    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $date = $_POST['date'];
        $num_people = $_POST['num_people'];
        $special_requests = $_POST['special_requests'];
        $userFK = $_SESSION["userid"];

        echo "<p>User " . $userFK . " submitted an order on " . date("Y-m-d") . " with the following items:</p>";

        // Insert the order details into the orders table
        $sql = "INSERT INTO orders (userFK, order_date, num_people, special_requests) VALUES ('$userFK', '$date', '$num_people', '$special_requests')";
        if ($mysqli->query($sql) === TRUE) {
            $oid = $mysqli->insert_id;
            // Insert selected items into orderitems table
            if (!empty($_POST['items'])) {
                foreach($_POST['items'] as $itemID) {
                    echo "<p>ItemID $itemID</p>";
                    // Use 'seat' table column names
                    $sql = "INSERT INTO orderitems (orderFK, seatitemFK) VALUES ('$oid', '$itemID')";
                    $mysqli->query($sql);
                }
            } else {
                echo "<p>No items selected.</p>";
            }
        } else {
            echo "Error: " . $mysqli->error;
        }

        $mysqli->close();
    }
    ?>
    </section>
    <?php require_once("footer.php"); ?>
</body>

</html>
