<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/reserve.css">
    <link href="https://fonts.googleapis.com/css2?family=Garamond&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once("header.php"); ?>
    <section id="main">
    <form class="search-form" method="get" action="">
        <div class="search-container">
            <input type="text" name="search" placeholder="Search for tables">
            <input type="submit" value="Search">
        </div>
    </form>

    </section>
    <section id="main">
    <?php 
        require_once("dbInfo.php");

        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $todo = "SELECT categories.picFilename, categories.catTitle, seat.title, seat.itemID 
                 FROM seat 
                 LEFT JOIN categories ON seat.categoryFK = categories.catID ";

        if ($search) {
            $todo .= "WHERE LOWER(categories.catTitle) LIKE LOWER('%$search%') ";
        }

        $todo .= "ORDER BY  seat.itemID"; 

        $results = $mysqli->query($todo); 

        if (!isset($_SESSION["userid"])) {
            header("Location: login.php");
            exit();
        }

        if ($results->num_rows > 0) {
            echo '<form action="submit_order.php" method="post">';
            echo '<div class="grid-container">';
            while ($result = $results->fetch_assoc()) {
                echo '<div class="col ' . $result["catTitle"] . '">';
                echo '<h1>' . $result["catTitle"] . '</h1>';
                echo '<div class="fooditem">';
                echo '<div class="fooditem-content">';
                echo '<img src="images/' . $result["picFilename"] . '" alt="' . $result["title"] . '">';
                echo '<span class="itemname">' . $result["title"] . '</span>';
                echo '<input type="checkbox" name="items[]" value="' . $result["itemID"] . '">';
                echo '</div></div></div>';
            }
            echo '<div class="col totalinfo">';
            echo '<h1>Order Information</h1>';
            echo '<div id="itemised"></div>';
            echo '<label for="date">Choose a date:</label>';
            echo '<input type="date" id="date" name="date" required><br><br>';
            echo '<label for="num_people">Number of People:</label>';
            echo '<input type="number" id="num_people" name="num_people" min="1" required><br><br>';
            echo '<label for="special_requests">Special Requests:</label>';
            echo '<textarea id="special_requests" name="special_requests" rows="4" cols="50"></textarea><br><br>';
            echo '<input id="submit_button" class="button" type="submit" value="Reserve">';
            echo '</div></div></form>';
        } else {
            echo '<p>No results found for "' .($search) . '".</p>';
        }
    ?>
    </section>
    <?php require_once("footer.php")?>
</body>

</html>
