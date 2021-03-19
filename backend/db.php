<?php
 session_start();
 if(!isset($_SESSION['USER-EMAIL'])){
     header('location: index.php');
 }
 ?>
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
echo "Connected successfully";
?>