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

$name = $_POST['profile_search'];

$result = $conn->query("SELECT * FROM recipes WHERE recipes.user = '$name'");

if ($result && $row = $result->fetch_assoc())
{
    $user = $row['user'];
    $conn->close();
    header("Location: profile_page.php?user=" . $user);
}
else
{
    $conn->close();
    header("Location: college_cooking.php");
}

?>
