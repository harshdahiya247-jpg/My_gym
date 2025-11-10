<?php
$servername = "localhost";
$username = "root";   // default in XAMPP
$password = "";       // leave empty
$database = "gym_management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
