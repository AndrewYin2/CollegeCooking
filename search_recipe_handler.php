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

$where_clause = "";
if (!empty ($_POST['rname']))
{
  $where_clause .= "rname = '" . $_POST['rname'] . "' AND ";
}
if (!empty ($_POST['minTime']))
{
  $where_clause .= "preptime >= '" . $_POST['minTime'] . "' AND ";
}
if (!empty ($_POST['maxTime']))
{
  $where_clause .= "preptime <= '" . $_POST['maxTime'] . "' AND ";
}
if (!empty ($_POST['minCalories']))
{
  $where_clause .= "calories >= '" . $_POST['minCalories'] . "' AND ";
}
if (!empty ($_POST['maxCalories']))
{
  $where_clause .= "calories <= '" . $_POST['maxCalories'] . "' AND ";
}
if (!empty ($_POST['difficulty']))
{
  $where_clause .= "difficulty = '" . $_POST['difficulty'] . "' AND ";
}
if (!empty ($_POST['price']))
{
  $where_clause .= "price = '" . $_POST['price'] . "' AND ";
}
// will need to eventually make it so at least one condition must be searched for
$where_clause = substr ($where_clause, 0, -5);

$result = $conn->query('SELECT * FROM recipes WHERE ' . $where_clause);


$hit = false;
$indexes = "";
while ($result && $row = $result->fetch_assoc())
{
  if (!empty ($_POST['ingnames']))
  {
    $ingredients_array = explode (" ,", $_POST['ingnames']);
    $contains_all = true;
    foreach ($ingredients_array as $ingredient)
    {
      if (strpos ($row['ingredients'], $ingredient) === false)
      {
        $contains_all = false;
      }
    }
    if ($contains_all)
    {
      $hit = true;
      $indexes .= $row['index'] . "/";
    }
  }
  else
  {
    $hit = true;
    $indexes .= $row['index'] . "/";
  }
}

if ($hit)
{
  $conn->close();
  header("Location: search_results.php?indexes=" . $indexes);
}
else
{
  $_SESSION['message'] = 'No Recipes Found';
  $conn->close();
  header("Location: http://localhost:8080/TAMUHack/search_recipe.php");
}
?>
