<?php
session_start();
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
              id="login-form"
              class="shadow p-4"
              action="./backend/login-check.php"
              method="POST"
            >
              <div class="form-group">
                <p class="text-danger text-capitalize text-center bg-light">
                  <?php 
          if(isset($_SESSION['ERROR'])){
            echo $_SESSION['ERROR'];
          }
          ?>
                </p>

                <h3>Login</h3>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Enter email"
                  name="user-email"
                />
              </div>
              <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="exampleInputPassword"
                  placeholder="Password"
                  name="user-password"
                />
              </div>
              <div class="form-group d-flex justify-content-center mt-2">
                <button type="submit" class="btn" name="login">Login</button>
              </div>
              <div class="form-group">
                <label for="sign-up"
                  >I don't have an account
                  <a href="signup.php">Signup!</a></label
                >
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.getElementById("frontpage").style.height =
        window.innerHeight + "px";
    </script>

    <script src="assets/animejs/anime.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
<?php session_unset();?>
