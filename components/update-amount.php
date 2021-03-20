<?php
 if(!isset($_SESSION['USER-EMAIL'])){
     header('location: index.php');
 }
 ?>
<div id="update-amount" class="w-50">
  <div class="d-flex justify-content-between">
    <h3 class="text-primary">Update Amount</h3>
    <span class="float-right">
      <i class="fa fa-window-close text-danger" onclick="closeFnx()"></i>
    </span>
  </div>

  <form action="../backebd/submit.php">
    <div class="form-group">
      <label for="customer-name">Amount</label>
      <input
        type="number"
        class="form-control"
        names="amount"
        id="amount"
        required
      />
    </div>
    <div class="form-group">
      <p for="custome">Details</p>
      <!-- <input
        type="text"
        class="form-control"
        names="amount-detail"
        id="amount-detail"
        required
      /> -->
      <textarea name="amount-detail" id="amount-detail" class="w-100" required></textarea>
    </div>

    <div class="form-group mt-2 d-flex justify-content-center">
      <button type="insert_amount" class="btn btn-primary mx-2">Done</button>
      <!-- <button type="substract_amount" class="btn btn-primary mx-2"><i class="fa fa-minus"></i></button> -->
    </div>
  </form>
</div>
