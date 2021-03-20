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
if(isset($_GET['logout'])){
  header('location: ../index.php');
}


// delete function

if(isset($_GET['deleteCustomer'])){
  echo $id = $_GET['deleteCustomer'];

  $sql = "delete from customers where id=$id";
  if(mysqli_query($conn, $sql)){
    echo $_SESSION['MESSAGE'] = "<script>alert('Customer deleted successfully');</script>";
    header('location: ../customers.php');
  }else{
    echo $_SESSION['MESSAGE'] = "<script>alert('Customer not deleted');</script>";
    // echo "Error deleting record: " . mysqli_error($conn);
    header('location: ../customers.php');


  }

}

// amount update
// if(isset($_GET['add_amount'])||isset($_GET['substract_amount'])){
//   $amount = $log = "";
//   if($_SERVER['REQUEST_METHOD']==='GET'){
//     $amount = input_method($_GET['amount']);
//     $log = input_method($_GET['amount-detail']);
//     $sql = "insert into customers_log (amount, log) values ('$amount', '$log')";
//   }
// }
?>