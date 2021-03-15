<?php require './components/header.php'?>
<?php
$ERROR = NULL;
if($ERROR){
echo "<script>alert(".$ERROR.")";

}
?>

<div id="frontpage" class="">
  <?php include './components/navbar1.php'?>

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
            <button type="submit" name="submit" class="btn">Signup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById("frontpage").style.height = window.innerHeight + "px";
</script>
<?php require './components/footer.php'?>
