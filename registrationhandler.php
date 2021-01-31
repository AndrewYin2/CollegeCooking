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

$result = $conn->query('SELECT username FROM users');

$first = $_POST['username'];
$last = $_POST['password'];

$legal = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_';
if(strlen($first) < 3 || strlen($first) > 20)
{
  $_SESSION['message'] = 'Illegal Username';
  $conn->close();
  header("Location: http://localhost:8080/Soundboard/registration.php");
}
if(strlen($last) < 3 || strlen($last) > 20)
{
  $_SESSION['message'] = 'Illegal Password';
  $conn->close();
  header("Location: http://localhost:8080/TAMUHack/registration.php");
}
$usernameletters = str_split($first);
foreach($usernameletters as $char)
{
  if(strpos($legal, $char) === false)
  {
    $_SESSION['message'] = 'Illegal Username';
    $conn->close();
    header("Location: http://localhost:8080/TAMUHack/registration.php");
  }
}
while($row = $result->fetch_assoc())
{
  if($first == $row['username'])
  {
    $_SESSION['message'] = 'Username Taken';
    $conn->close();
    header("Location: http://localhost:8080/TAMUHack/registration.php");
  }
}

//$last = password_hash($last, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param('ss', $first, $last);
$stmt->execute();

$stmt->close();
$conn->close();
$_SESSION['loggedin'] = $first;
header("Location: http://localhost:8080/TAMUHack/college_cooking.php");
?>
