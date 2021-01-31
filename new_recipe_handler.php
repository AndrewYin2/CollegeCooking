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
$instructions = $_POST['inames'];
$difficulty = $_POST['difficulty'];
$price = $_POST['price'];
$user = $_SESSION['loggedin'];

$img = $_FILES["pic"]["name"];
$tempName = $_FILES["pic"]["tmp_name"];
echo $img;
echo $tempName;
move_uploaded_file($tempName, $img);


$stmt = $conn->prepare("INSERT INTO recipes (rname, preptime, calories, ingredients, instructions, difficulty, price, pic, user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('siissssss', $name, $time, $calories, $ingredients, $instructions, $difficulty, $price, $img, $user);
$stmt->execute();

$stmt->close();
$conn->close();
header("Location: http://localhost:8080/TAMUHack/college_cooking.php");
?>
