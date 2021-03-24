<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mero_khata";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database );

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$users = "CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(45) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `vkey` varchar(45) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
)";
mysqli_query($conn, $users);

$customers = "CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `cname` varchar(45) NOT NULL,
  `caddress` varchar(45) NOT NULL,
  `ccontact` varchar(20) NOT NULL,
  `cemail` varchar(45) NOT NULL,
  `camount` int(20) NOT NULL,
  `ccreatedate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_id` int(11) NOT NULL
)";
mysqli_query($conn, $customers);

$customers_log ="CREATE TABLE `customers_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `log` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `operation_id` int(1) NOT NULL
)
";
mysqli_query($conn, $customers_log);
// echo "Connected successfully";
?>