<?php
// starting session
session_start();
$ERROR=NULL;
$_SESSION["ERROR"] = "";

// define variables
$userfullname = $useremail = $usercontact = $useraddress = $userpassword = "";

// getting data
if (isset($_POST['submit'])) {
  if ($_SERVER['REQUEST_METHOD']=='POST') {
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
  $ERROR = "<p>Your user name must be at least 5 character</p>";
}elseif($userpassword != $userpassword1){
  $ERROR .= "<p>Your password do not match </p>";
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
      echo "mail not send";
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  
}

?>