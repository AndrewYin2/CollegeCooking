<?php session_start(); 
$server = 'localhost';
$user = 'root';
$pass = 'usbw';
$db = 'CollegeCooking';

$conn = new mysqli($server, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="new_recipe.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>CollegeCooking - View recipes and more!</title>
    </head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <body style="background-image: url('background2.jpg'); background-attachment: fixed; background-repeat: no-repeat;">
        <div style="text-align:center"><a href="college_cooking.php">
            <img src="Logo2.png" alt="logo" style="margin:auto;width:350px">
        </a></div>
        
        <?php

        $index = $_GET['indexes'];
        $indexes = explode ("/", $index);
        foreach ($indexes as $current_index)
        {
            $result = $conn->query("SELECT * FROM recipes WHERE recipes.index = '$current_index'");
            if ($row = $result->fetch_assoc())
            {
                echo '<div id="box" style="font-family:Indie Flower;border-radius: 25px;">';
                echo '<h2>';
                echo '<a href="recipe_page.php?index=';
                echo $current_index;
                echo '" style="color: #fb3f00; text-decoration: none;">';
                echo $row['rname'];
                echo '</a>';
                echo '</h2>';
                echo '<br>';
                echo 'Preptime: ';
                echo $row['preptime'];
                echo '<br>';
                echo 'Calories: ';
                echo $row['calories'];
                echo '<br>';
                echo 'Difficulty: ';
                echo $row['difficulty'];
                echo '<br>';
                echo 'Price: ';
                echo $row['price'];
                echo '</div>';
            }
          }
        
        ?>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
