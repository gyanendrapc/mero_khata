<?php require './components/header.php'?>

<div id="customer-page">
<?php include './components/navbar3.php'?>
<section class="customer-table">
<h3 class="text-center p-2">Customers Table</h3>
<?php include './components/vendor-table.php'?>

</section>
</div>
<script>
document.getElementById("customer-page").style.height =
window.innerHeight + "px";

</script>
<?php require './components/footer.php'?>
