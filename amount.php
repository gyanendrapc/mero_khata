<?php
 session_start();
 if(!isset($_SESSION['USER-EMAIL'])){
     header('location: index.php');
 }
//  if(isset($_SESSION['MESSAGE'])){
//      echo $_SESSION['MESSAGE'];
//     unset($_SESSION['MESSAGE']);
//  }

$customer_id = NULL;
 if(isset($_GET['customer_id'])){
  $customer_id = $_GET['customer_id'];
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/Fontawesome/css/all.css" />

    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div id="amount-page">
           <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-dark w-100" id="navbar2">
        <div class="container-fluid">
          <a class="navbar-brand" href="customers.php">Mero Khata</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse navbarNav2" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item mx-4">
                <a
                  class="nav-link btn border"
                  aria-current="page"
                  href="#"
                  id="add-customer-btn"
                  >Add Customer</a
                >
              </li>
                     
              <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 d-flex h-100" action="search.php" method="POST">
                <input type="text" name="search_content" class="form-control border" placeholder="@search" />	
								<input type="submit" class="font-weight-bold text-white border btn" name="search" value="search">
                </form>
              </li>
              <li class="nav-item logOutIn">
                <form action="./backend/submit.php" method="GET">
                  <input type="submit" class="btn text-white btn border" name="logout" value="logout"/>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- CLOSE NAVBAR -->

      <form
        id="amount-form"
        action="./backend/submit.php"
        method="GET"
        class="w-25"
      >
        <div class="d-flex justify-content-between">
        <h3 class="text-primary">Update Amount</h3>
        <span class="float-right">
          <a href="customers.php"
            ><i class="fa fa-window-close text-danger" onclick="closeFnx()"></i
          ></a>
        </span>
      </div>
        <input
          type="hidden"
          name="customer_id"
          value="<?php echo $customer_id; ?>"
        />
        <div class="form-group">
          <label for="customer-name">Amount</label>
          <input
            type="number"
            class="form-control"
            name="amount"
            id="amount"
            required
          />
        </div>
        <div class="form-group">
          <p for="custome">Details</p>
          <textarea
            name="amount_detail"
            id="amount_detail"
            class="w-100"
            required
          ></textarea>
        </div>

        <div class="form-group mt-2 d-flex justify-content-center">
          <i class="fa fa-plus"
            >&nbsp;<input
              type="submit"
              name="add_amount"
              class="btn btn-primary mx-2"
              value="Add"
          /></i>
          <i class="fa fa-minus"
            >&nbsp;<input
              type="submit"
              name="substract_amount"
              class="btn btn-primary mx-2"
              value="Substract"
          /></i>

          <!-- <button type="substract_amount" class="btn btn-primary mx-2"><i class="fa fa-minus"> &nbsp;&nbsp;Substract</i></button> -->
        </div>
      </form>
      <?php include './components/add-customer.php'?>

    </div>
    <?php 
        if(isset($_SESSION['MESSAGE'])){
          // echo $_SESSION['MESSAGE'];

          echo '
          <div id="alert_messages" class="bg-danger text-white justify-content-between">
            <span>'.
            $_SESSION['MESSAGE']
            .'</span>
            <span class="float-right">
            <i class="fa fa-window-close text-white" onclick="closeFnx1()"></i>
          </span>
          </div>
          ';
         unset($_SESSION['MESSAGE']);
     
      }
      ?>
    <script>
      document.getElementById("amount-page").style.height =
        window.innerHeight + "px";
    </script>
    <script src="assets/animejs/anime.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
