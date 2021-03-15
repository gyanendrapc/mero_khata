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
<form id="login-form" class="shadow p-4">
<div class="form-group">
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
/>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input
type="password"
class="form-control"
id="exampleInputPassword1"
placeholder="Password"
/>
</div>
<div class="form-group d-flex justify-content-center mt-2">
<button type="submit" class="btn">Login</button>
</div>
<div class="form-group">
<label for="sign-up"
>I don't have an account <a href="signup.php">Signup!</a></label
>
</div>
</form>
</div>
</div>
</div>
</div>
<script>
document.getElementById("frontpage").style.height = window.innerHeight + "px";

</script>