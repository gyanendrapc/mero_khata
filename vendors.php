<?php
session_start();
if(!isset($_SESSION['USER-EMAIL'])){
    header('location: index.php');
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
    <div id="customer-page">
      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-dark w-100" id="navbar2">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Mero Khata</a>
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
              <li class="nav-item">
                <a
                  class="nav-link border"
                  aria-current="page"
                  href="#"
                  id="add-customer-btn"
                  >Add Customer</a
                >
              </li>
              <!-- <li class="nav-item">
        <a class="nav-link" href="#">Print</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Message Customer</a>
        </li> -->
              <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 d-flex h-100">
                  <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Search"
                  />
                  <button
                    class="btn my-2 my-sm-0 text-white border"
                    type="submit"
                  >
                    Search
                  </button>
                </form>
              </li>
              <li class="nav-item logOutIn">
                <a class="nav-link border" href="#">logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- CLOSE NAVBAR -->
      <section class="customer-table">
        <h3 class="text-center p-2">Customers Table</h3>
        <?php include './components/vendor-table.php'?>
      </section>
    </div>
    <script>
      document.getElementById("customer-page").style.height =
        window.innerHeight + "px";
    </script>
    <script src="assets/animejs/anime.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
