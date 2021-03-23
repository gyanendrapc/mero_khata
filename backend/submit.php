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
    
    
    $sql = "select * from customers where ccontact = '$contact' and user_id ='".$_SESSION['ID']."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      $_SESSION['MESSAGE']="<script> alert('Customer already in the list');</script>";
      header('location: ../customers.php');
    }else{
      $sql = "insert into customers (cname, caddress, ccontact, cemail, camount, user_id) values ('$name','$address','$contact','$email','$amount', '".$_SESSION['ID']."')";
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
  $id = $_GET['deleteCustomer'];
  
  $sql = "delete from customers where id=$id";
  if(mysqli_query($conn, $sql)){
    echo $_SESSION['MESSAGE'] = "<script>alert('Customer deleted successfully');</script>";
    
    $sql1 = "DELETE FROM customers_log WHERE customer_id = $id";
    if(mysqli_query($conn, $sql1)){
      echo "deleted in customers_log";
    }else{
      echo "not deleted in customers_log";
    }
    header('location: ../customers.php');
    
  }else{
    echo $_SESSION['MESSAGE'] = "<script>alert('Customer not deleted');</script>";
    // echo "Error deleting record: " . mysqli_error($conn);
    header('location: ../customers.php');
    
    
  }
  
  
}
// update customer
if(isset($_GET['update_customer'])){
  $address = $contact = $email = $cid="";
  if ($_SERVER['REQUEST_METHOD']==='GET') {
    $cid= test_input($_GET['customer-id']);
    $address = test_input($_GET['customer-address']);
    $contact = test_input($_GET['customer-contact']);
    $email = test_input($_GET['customer-email']);
    
    
    $sql = "update customers set caddress = '$address', ccontact = '$contact', cemail = '$email' where id='$cid'";
    if(mysqli_query($conn, $sql)){
      echo $_SESSION['MESSAGE'] = "<script>alert('Customer updated successfully');</script>";
      header('location: ../customers.php');
      
    }else{
      echo $_SESSION['MESSAGE'] = "<script>alert('Customer not updated');</script>";
      // echo "Error deleting record: " . mysqli_error($conn);
      header('location: ../customers.php');  
    }
    
  }
}
// 

// add amount
if(isset($_GET['add_amount'])){
  $customer_id = $user_id = $amount = $log="";
  $amountSubstracted=$amountAdded= 0;
  
  if($_SERVER['REQUEST_METHOD']==='GET') {
    $cid= test_input($_GET['customer_id']);
    $uid= test_input($_SESSION['ID']);
    $amount = test_input($_GET['amount']);
    
    $log = test_input($_GET['amount_detail']);
    
    $sql = "insert into customers_log (user_id, customer_id, amount, log, operation_id) values ('$uid','$cid','$amount', '$log', 0)";
    if(mysqli_query($conn, $sql)){ 
      // find total added
      $sql = "select * from customers_log where customer_id = '$cid' and operation_id=0";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $amountAdded += $row['amount'];
        }
      } else {
        echo "0 results";
      }
      echo $amountAdded;
      // ********    
      echo $_SESSION['MESSAGE'] = "<script>alert('Amount added');</script>";
      // header('location: ../customers.php');
    }else{
      echo $_SESSION['MESSAGE'] = "<script>alert('Amount not added');</script>";
      // echo "Error deleting record: " . mysqli_error($conn);
      // header('location: ../customers.php');  
    }
    
  }
  $sql = "select * from customers_log where customer_id = '$cid' and operation_id=1";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $amountSubstracted += $row['amount'];
    }
  } else {
    echo "0 results";
  }
  echo $amountSubstracted;
  // find and update amount
  // getting amount values as sessio from submit.php and updating amount value.
  
  $totalAmount = $amountAdded - $amountSubstracted;
  $sql = "update customers set camount = '$totalAmount' where id = '$cid' and user_id = '$uid'";
  mysqli_query($conn, $sql);      
  // ***********
  header('location: ../customers.php');
}




// substract amount
if(isset($_GET['substract_amount'])){
  // defining variables
  $customer_id = $user_id = $amount = $log="";
  $amountAdded=$amountSubstracted= 0;
  
  if ($_SERVER['REQUEST_METHOD']==='GET') {
    $cid= test_input($_GET['customer_id']);
    $uid= test_input($_SESSION['ID']);
    $amount = test_input($_GET['amount']);
    $log = test_input($_GET['amount_detail']);
    
    $sql = "insert into customers_log (user_id, customer_id, amount, log, operation_id) values ('$uid','$cid','$amount', '$log', 1)";
    if(mysqli_query($conn, $sql)){
      // find total substracted
      $sql = "select * from customers_log where customer_id = '$cid' and operation_id=1";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $amountSubstracted += $row['amount'];
        }
      } else {
        echo "0 results";
      }
      // ***********
      echo $_SESSION['MESSAGE'] = "<script>alert('Amount substracted');</script>";
      // header('location: ../customers.php');
      
    }else{
      echo $_SESSION['MESSAGE'] = "<script>alert('Amount not substracted');</script>";
      // echo "Error deleting record: " . mysqli_error($conn);
      // header('location: ../customers.php');  
    }    
  }
  $sql = "select * from customers_log where customer_id = '$cid' and operation_id=0";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $amountAdded += $row['amount'];
    }
  } else {
    echo "0 results";
  }
  
  
  // find and update amount
  // getting amount values as sessio from submit.php and updating amount value.
  $totalAmount = $amountAdded - $amountSubstracted;
  $sql = "update customers set camount = '$totalAmount' where id = '$cid' and user_id = '$uid'";
  mysqli_query($conn, $sql);      
  // ***********
  header('location: ../customers.php');
}





?>