<?php
$servername = "localhost";
$username = "root";
$password = "";
// $database = "mero_khata";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "create database mero_khata";
$result = mysqli_query($conn, $sql);
?>