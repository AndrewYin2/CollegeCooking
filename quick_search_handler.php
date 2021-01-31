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

$result = $conn->query("SELECT * FROM recipes WHERE recipes.rname = '$name'");

if ($result && $row = $result->fetch_assoc())
{
    $index = $row['index'];
    $conn->close();
    header("Location: recipe_page.php?index=" . $index);
}
else
{
    $conn->close();
    header("Location: search_recipe.php");
}

?>
