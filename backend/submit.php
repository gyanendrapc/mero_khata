<?php
 session_start();
 if(!isset($_SESSION['USER-EMAIL'])){
     header('location: index.php');
 }
// include database
include 'db.php';

// verifying data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// add customer
if(isset($_GET['add_customer'])){
$name = $address = $contact = $email = $amount = "";
if ($_SERVER['REQUEST_METHOD']==='GET') {
    $name = test_input($_GET['customer-name']);
    $address = test_input($_GET['customer-address']);
    $contact = test_input($_GET['customer-contact']);
    $email = test_input($_GET['customer-email']);
    $amount = test_input($_GET['customer-amount']);


    $sql = "select * from customers where ccontact = '$contact'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      $_SESSION['MESSAGE']="<script> alert('Customer already in the list');</script>";
      header('location: ../customers.php');
    }else{
      $sql = "insert into customers (cname, caddress, ccontact, cemail, camount) values ('$name','$address','$contact','$email','$amount')";
      if(mysqli_query($conn, $sql)){
      $_SESSION['MESSAGE']="<script> alert('Customer added');</script>";
      header('location: ../customers.php');
  
      }
    }

    

  }else{
    $_SESSION['MESSAGE']="<script> alert('Customer not added');</script>";
    header('location: ../customers.php');

  }
}



// logout
if($_GET['logout']){
  header('location: ../index.php');
}
?>