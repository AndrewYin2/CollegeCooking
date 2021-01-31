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

$result = $conn->query('SELECT username, password FROM users');

$first = $_POST["username"];
$last = $_POST["password"];

$test = true;
while($row = $result->fetch_assoc())
{
  //$hashed_password = $row['password'];
  if($first == $row['username'] && $last == $row['password'])
  {
    $_SESSION['loggedin'] = $first;
    $test = false;
    $conn->close();
    header("Location: http://localhost:8080/TAMUHack/college_cooking.php");
  }
}

if($test)
{
$_SESSION['message'] = 'Invalid Username/Password';
$conn->close();
header("Location: http://localhost:8080/TAMUHack/login.php");
}
?>
