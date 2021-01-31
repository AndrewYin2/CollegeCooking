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
$time = $_POST['time'];
$calories = $_POST['calories'];
$ingredients = $_POST['ingnames'];
$difficulty = $_POST['difficulty'];
$price = $_POST['price'];
$user = $_SESSION['loggedin'];

$result0 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE rname = $name');
$result1 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE ($time - 100) < preptime AND preptime < ($time + 100)');
$result2 = $conn->query('SELECT rname, preptime, calories, ingredients, instructions, difficulty, price, user FROM recipes WHERE ($calories - 100) < calories AND calories < ($calories + 100)');
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
