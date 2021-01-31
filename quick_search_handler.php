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

$name = $_POST['search'];
print ($name);

$result = $conn->query("SELECT * FROM recipes WHERE recipes.rname = '$name'");

while($result && $row = $result->fetch_assoc())
{
    $index = $row['index'];
    print ($index);
    $conn->close();
    header("Location: http://localhost:8080/TAMUHack/recipe_page.php?index=" . $index);
}


$conn->close();
header("Location: http://localhost:8080/TAMUHack/search_recipe.php");
?>
