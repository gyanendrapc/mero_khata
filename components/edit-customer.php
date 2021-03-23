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

  <form action="./backend/submit.php" method="GET">
    <?php 
include './backend/db.php';
$sql = "select * from customers where user_id = '".$_SESSION['ID']."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){ while($row = mysqli_fetch_assoc($result)){ ?>
    <input type="hidden" name="customer-id" value="<?php echo $row['id'];?>" />

    <?php
}
}

?>

    <!-- <div class="form-group">
<label for="customer-name">Customer Name</label>
<input
type="text"
class="form-control"
name="customer-name"
id="customer-name"
required
/>
</div> -->
    <div class="form-group">
      <label for="customer-address">Customer Address</label>
      <input
        type="text"
        class="form-control"
        name="customer-address"
        id="customer-address"
        required
      />
    </div>
    <div class="form-group">
      <label for="customer-contact">Customer Contact</label>
      <input
        type="text"
        class="form-control"
        name="customer-contact"
        id="customer-contact"
        required
      />
    </div>
    <div class="form-group">
      <label for="customer-email">Customer Email</label>
      <input
        type="email"
        class="form-control"
        name="customer-email"
        id="customer-email"
      />
    </div>
    <!-- <div class="form-group">
      <label for="customer-name">Amount</label>
      <input
        type="number"
        class="form-control"
        name="customer-name"
        id="customer-name"
        min="0"
      />
    </div> -->
    <div class="form-group mt-2 d-flex justify-content-center">
      <button type="submit" name="update_customer" class="btn btn-primary">
        Update
      </button>
    </div>
  </form>
</div>
