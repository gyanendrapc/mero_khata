<?php
// starting session
session_start();
$_SESSION["ERROR"] = NULL;

// define variables
$userfullname = $useremail = $usercontact = $useraddress = $userpassword = "";

// getting data

  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['signup'])) {
    $userfullname = test_input($_POST["user-name"]);
    $usercontact = test_input($_POST["user-contact"]);
    $useraddress = test_input($_POST["user-address"]);
    $useremail = test_input($_POST["user-email"]);
    $userpassword = test_input($_POST["user-password"]);
    $userpassword1 = test_input($_POST["user-confirm-password"]);    
  }
}

// verifying data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// echo $userfullname;

// checking username length
if(strlen($userfullname)<5){
  $_SESSION['ERROR'] = "Your user name must be at least 5 character.";
  header('location: ../signup.php');
}elseif($userpassword != $userpassword1){
  $_SESSION['ERROR'] = " Your password do not match";
  header('location: ../signup.php');

}else{
  // form is valid
  require_once 'db.php';
  
  $vkey = md5(time().$userfullname);
  
  // inserting into database
  $userpassword = md5($userpassword);
  

  $sql = "insert into users (username, contact, address, email, password, vkey ) values ('$userfullname','$usercontact','$useraddress','$useremail','$userpassword','$vkey')";
  
  if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
    $to = $useremail;
    $subject = "Email verification";
    $message = "Click Here: <a href='http://localhost/mero_khata/backend/verify.php?vkey=$vkey'> <b>to register</b></a>";
    $headers = "from:<chaudharygyane699@gmail.com>";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";   
    if(mail($to,$subject,$message,$headers)){
      // echo "mail send";
    header("location: thankyou.php");

    }else{
      $_SESSION['ERROR'] = "Signup failed....";
      header('location: ../signup.php');
      
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  
}

?>