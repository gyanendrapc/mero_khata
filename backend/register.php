<?php
// starting session
session_start();
$_SESSION["ERROR"] = NULL;

// include database
require_once 'db.php';

// verifying data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// define variables
$userfullname = $useremail = $usercontact = $useraddress = $userpassword = "";

// getting data
if (isset($_POST['signup'])) {
  
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $userfullname = test_input($_POST["user-name"]);
    $usercontact = test_input($_POST["user-contact"]);
    $useraddress = test_input($_POST["user-address"]);
    $useremail = test_input($_POST["user-email"]);
    $userpassword = test_input($_POST["user-password"]);
    $userpassword1 = test_input($_POST["user-confirm-password"]); 
    
    
    // **********
    // checking username length
    if(strlen($userfullname)<5){
      $_SESSION['ERROR'] = "Your user name must be at least 5 character.";
      header('location: ../signup.php');
    }elseif($userpassword != $userpassword1){
      $_SESSION['ERROR'] = " Your password do not match";
      header('location: ../signup.php');
      
    }else{
 
      
      $vkey = md5(time().$userfullname);
      
      // inserting into database
      $userpassword = md5($userpassword);
      
      $sql = "select * from users where email = '$useremail' OR contact = '$usercontact'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        echo $_SESSION['ERROR']="<script> alert('You have already signup with this number or email please check your email for verification.');</script>";
        header('location: ../index.php');
      }else{
        // code here
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
    }
  }
}
?>