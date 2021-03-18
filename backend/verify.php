<?php
session_start();
if(isset($_GET['vkey'])){
    // Process Verification
    $vkey = $_GET['vkey'];
    // database connection
    include 'db.php';

    // query
    $sql = "SELECT verified, vkey FROM users WHERE verified = 0 AND vkey='$vkey' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    // checking rows
    if(mysqli_num_rows($result) == 1){
        // validate the email
        $update = mysqli_query($conn, "UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        if($update){
            $_SESSION['MESSAGE'] = "<script>alert(Your account has been verified. Your may now login);</script>";
            header('location: ../index.php');
        }else{
            echo mysqli->error();
        }
    }else{
        // email not validated
        $_SESSION['ERROR'] = "This account invalid or already verified";

    }

}else{
    die("Something went wrong");
}





?>