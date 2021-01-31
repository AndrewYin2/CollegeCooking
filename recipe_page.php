<?php session_start(); 

$server = 'localhost';
$user = 'root';
$pass = 'usbw';
$db = 'CollegeCooking';

$conn = new mysqli($server, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$index = $_GET['index'];

$result = $conn->query("SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE recipes.index = '$index'");
$rname;
$preptime;
$calories;
$ingredients;
$instructions;
$difficulty;
$price;
$user;

while($row = $result->fetch_assoc())
{
  $rname = $row['rname'];
  $preptime = $row['preptime'];
  $calories = $row['calories'];
  $ingredients = $row['ingredients'];
  $instructions = $row['instructions'];
  $difficulty = $row['difficulty'];
  $price = $row['price'];
  $user = $row['user'];
}
    
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="recipe_page.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Recipe</title>
    </head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <body style="background-image: url('background2.jpg')"></body>        
        <div class="header" style="text-align:center">
          <a href="college_cooking.html">
            <img src="Logo2.png" alt="logo" style="margin:auto;width:350px">
          </a>
        </div><br>
        <div id="box" style="font-family:Indie Flower;border-radius: 25px;">

        <div class="accordion" id="box" style="font-family:Allura;font-size: 22px;border-radius: 25px;">
        <?php
            echo '<h3 style="text-align:center;font-weight: bold;font-size: 50px">';
            echo $rname;
            echo '</h3>';

            echo '<label>This recipe was made by: ';
            echo $user;
            echo '</label><br><br>';

            echo '<label>Difficulty: ';
            echo $difficulty;
            echo '</label><br>';

            echo '<label>Price Level: ';
            echo $price;
            echo '</label><br>';

            echo '<label>Approx. Prep Time: ';
            echo $preptime;
            echo '</label><br>';

            echo '<label>Calories per Serving:';
            echo $calories;
            echo '</label><br><br>';
            ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button style="text-align:center;font-weight: bold;font-size: 30px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Ingredients
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                <div class="accordion-body" style="background-color:white;">
                    <?php
                    echo '<div class="info-text">';
                    echo $ingredients;
                    echo '</div>';
                    ?>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button style="text-align:center;font-weight: bold;font-size: 30px" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Instructions
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                <div class="accordion-body" style="background-color:white;">
                    <?php
                    echo '<div class="info-text">';
                    echo $ingredients;
                    echo '</div>';
                    ?>
                </div>
              </div>
            </div>
          </div> <br>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
