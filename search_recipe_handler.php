<?php
session_start();
$server = 'localhost';
$user = 'root';
$pass = 'usbw';
$db = 'CollegeCooking';

$conn = new mysqli($server, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['rname'];
$minTime = $_POST['minTime'];
$maxTime = $_POST['maxTime'];
$minCalories = $_POST['minCalories'];
$maxCalories = $_POST['maxCalories'];
$ingredients = $_POST['ingnames'];
$difficulty = $_POST['difficulty'];
$price = $_POST['price'];
$user = $_SESSION['loggedin'];

$result0 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE rname = $name');
$result1 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE ($minTime) < preptime AND preptime < ($maxTime)');
$result2 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE ($minCalories) < calories AND calories < ($maxCalories)');
$result3 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes');
$result4 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE difficulty = $difficulty');
$result5 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE price = $price');
$result6 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE user = $user');

while($row = $result->fetch_assoc())
{
  if($first == $row['username'] && $last == $row['password'])
  {
    $_SESSION['loggedin'] = $first;
    $test = false;
    $conn->close();
    header("Location: http://localhost:8080/TAMUHack/college_cooking.php");
  }
}


$conn->close();
header("Location: http://localhost:8080/TAMUHack/college_cooking.php");
?>
