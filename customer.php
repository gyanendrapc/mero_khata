<?php require './components/header.php'?>

<div id="customer-page">
<?php include './components/navbar2.php'?>
<section class="customer-table">
<h3 class="text-center p-2">Customers Table</h3>
<?php include './components/customer-table.php'?>
</section>
<?php include './components/add-customer.php'?>
<?php include './components/view-customer.php'?>
<?php include './components/edit-customer.php'?>

</div>
<script>
document.getElementById("customer-page").style.height =
window.innerHeight + "px";
</script>
<?php require './components/footer.php'?>
