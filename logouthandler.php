<?php
session_start();
unset($_SESSION['loggedin']);
header("Location: http://localhost:8080/TAMU&Hack/college_cooking.php");
?>
