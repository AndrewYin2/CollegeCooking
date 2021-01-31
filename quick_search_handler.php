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

$result = $conn->query("SELECT index FROM recipes WHERE recipes.rname = '$name'");

while($row = $result->fetch_assoc())
{
    $index = $row['index'];
    $conn->close();
    header("Location: http://localhost:8080/TAMUHack/recipe_page.php?index='$index'");
  }
}


$conn->close();
header("Location: http://localhost:8080/TAMUHack/search_recipe.php");
?>
