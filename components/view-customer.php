<?php
if(!isset($_SESSION['USER-EMAIL'])){
  header('location: index.php');
}
?>
<?php 
$totalPaid = 0;
$totalUdharo = 0;


?>
<div class="pt-5 container">
  <!-- <h3 class="pt-4 border-bottom">Details</h3> -->
  <div class="row mx-0 pt-3">
    <div class="col-md-6">
      <h4 class="">Total Creadit</h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">S.N.O</th>
            <th scope="col">Goods</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php 
$cid =  $_GET['id'];
$sql = "select * from customers_log where customer_id = '$cid' and operation_id=0";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) >
          0) { while($row = mysqli_fetch_assoc($result)){ $totalUdharo +=
          $row['amount']; ?>

          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['log']?></td>
            <td><?php echo $row['amount']?></td>
            <td><?php echo $row['create_time']?></td>
          </tr>

          <?php
    $i++;
  } 
} else {
  echo "No results"; 
  
} ?>
          <tr>
            <td colspan="4">
              Credit Amount =
              <?php echo $totalUdharo;?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <h4 class="">Total Paid</h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">S.N.O</th>
            <th scope="col">Goods</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php 
$cid =  $_GET['id'];
$sql = "select * from customers_log where customer_id = '$cid' and operation_id=1";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) >
          0) { while($row = mysqli_fetch_assoc($result)){ $totalPaid +=
          $row['amount']; ?>

          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['log']?></td>
            <td><?php echo $row['amount']?></td>
            <td><?php echo $row['create_time']?></td>
          </tr>

          <?php
    $i++;
  } 
} else {
  echo "No results"; 
  
} ?>
          <tr>
            <td colspan="4">
              Total Paid =
              <?php echo $totalPaid;?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="text-white bg-primary text-center">
    <span
      >Balance =
      <?php echo $result = $totalUdharo - $totalPaid?></span
    >
  </div>
</div>
