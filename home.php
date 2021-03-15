<?php require './components/header.php'?>
<!-- include navbar -->
<main>
<div id="pageHome">
<div class="contents">
<h1 class="text-center">
Welcome Gyanendra Chaudhary Please Choose a mode..
</h1>
<div class="d-flex justify-content-center">
<button class="m-2"><a href="vendor.php">Customer</a></button>
<button class="m-2"><a href="customer.php">Vendor</a></button>
</div>
</div>
</div>
</main>
<script>
document.getElementById("pageHome").style.height = window.innerHeight + "px";
</script>
<?php require './components/footer.php'?>
