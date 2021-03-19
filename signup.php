<?php session_start();?>
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
    <div id="frontpage" class="">
      <!-- NAVBAR -->
      <nav
        class="navbar navbar-expand-lg navbar-light bg-light w-100"
        id="navbar1"
      >
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Mero Khata</a>
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
          <div class="collapse navbar-collapse navbarNav1" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- CLOSE NAVBAR -->
      <div class="row h-100 mx-0">
        <div class="col-md-7">
          <div class="fontpage-site-title">
            <div class="content">
              <h1>Mero Khata</h1>
              <p>No more papers</p>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="font-page-form">
            <form
              method="POST"
              action="./backend/register.php"
              id="login-form"
              class="shadow p-3 mt-5"
            >
              <div class="form-group m-0">
                <p class="text-danger text-capitalize text-center bg-light">
                  <?php 
          if(isset($_SESSION['ERROR'])){
            echo $_SESSION['ERROR'];
          }
          ?>
                </p>

                <h3>Signup</h3>
              </div>
              <div class="form-group m-0">
                <label for="user-name">Full Name</label>
                <input
                  type="text"
                  class="form-control form-contraol-sm"
                  id="user-name"
                  name="user-name"
                  aria-describedby="emailHelp"
                  placeholder="Enter Your Name"
                  required
                />
              </div>
              <div class="form-group m-0">
                <label for="user-contact">Contact</label>
                <input
                  type="tel"
                  class="form-control form-contraol-sm"
                  id="user-contact"
                  name="user-contact"
                  placeholder="Contact Number"
                  required
                />
              </div>
              <div class="form-group m-0">
                <label for="user-address">Address</label>
                <input
                  type="text"
                  class="form-control form-contraol-sm"
                  id="user-address"
                  name="user-address"
                  placeholder="Your Address"
                  required
                />
              </div>
              <div class="form-group m-0">
                <label for="user-email">Email</label>
                <input
                  type="email"
                  class="form-control form-contraol-sm"
                  id="user-email"
                  name="user-email"
                  placeholder="Your Email"
                  required
                />
              </div>
              <div class="form-group m-0">
                <label for="user-password">Password</label>
                <input
                  type="password"
                  class="form-control form-contraol-sm"
                  id="user-password"
                  name="user-password"
                  placeholder="Enter Password"
                  required
                />
              </div>
              <div class="form-group m-0">
                <label for="user-confirm-password">Confirm Password</label>
                <input
                  type="password"
                  class="form-control form-contraol-sm"
                  id="user-confirm-password"
                  name="user-confirm-password"
                  placeholder="Enter Password"
                  required
                />
              </div>
              <div class="form-group m-0 mt-2 d-flex justify-content-center">
                <button type="submit" name="signup" class="btn">Signup</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php session_unset();?>
    <script>
      document.getElementById("frontpage").style.height =
        window.innerHeight + "px";
    </script>
    <script src="assets/animejs/anime.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
