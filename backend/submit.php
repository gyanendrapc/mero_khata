<?php 
session_start();
?>
<?php
$uemail=$upass="";
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (isset($_POST['login'])) {
        $uemail = test_input($_POST["user-email"]);
        $upass = test_input($_POST["user-password"]);

    }
}
// verifying data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$upass = md5($upass);

// include database
include 'db.php';

$sql = "select username, password from users where email='$uemail' and password = '$upass' and verified = 1 LIMIT 1";
echo mysqli_num_rows(mysqli_query($conn,$sql));
if(mysqli_num_rows(mysqli_query($conn,$sql)) ==1 ){
  $sql = "select * from users where email ='$uemail' AND password = '$upass' LIMIT 1";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     
      $_SESSION['USER-NAME'] = $row['username'];
      $_SESSION['USER-EMAIL'] = $row['email'];

    }
  } else {
    echo "0 results";
  }
// *******************************************
header('location: ../home.php');
  
}else{
  $_SESSION['ERROR'] = 'login failed, please check your email or password';
  header('location: ../index.php');
}
?>