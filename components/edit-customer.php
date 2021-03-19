<?php
 if(!isset($_SESSION['USER-EMAIL'])){
     header('location: index.php');
 }
 ?>
<div id="edit-customer" class="w-50">
<div class="d-flex justify-content-between">
<h3 class="text-primary">Edit customer</h3>
<span class="float-right">
<i class="fa fa-window-close text-danger" onclick="closeFnx()"></i>
</span>
</div>

<form action="">
<div class="form-group">
<label for="customer-name">Customer Name</label>
<input
type="text"
class="form-control"
names="customer-name"
id="customer-name"
required
/>
</div>
<div class="form-group">
<label for="customer-address">Customer Address</label>
<input
type="text"
class="form-control"
names="customer-address"
id="customer-address"
required
/>
</div>
<div class="form-group">
<label for="customer-contact">Customer Contact</label>
<input
type="text"
class="form-control"
names="customer-contact"
id="customer-contact"
required
/>
</div>
<div class="form-group">
<label for="customer-email">Customer Email</label>
<input
type="email"
class="form-control"
names="customer-email"
id="customer-email"
/>
</div>
<div class="form-group">
<label for="customer-name">Amount</label>
<input
type="number"
class="form-control"
names="customer-name"
id="customer-name"
min="0"
/>
</div>
<div class="form-group mt-2 d-flex justify-content-center">
<button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
</div>
