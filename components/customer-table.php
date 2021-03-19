<?php
 if(!isset($_SESSION['USER-EMAIL'])){
     header('location: index.php');
 }
 ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">Name</th>
      <!-- <th scope="col">Id</th> -->
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
      <th scope="col">Update Date</th>

      <th scope="col">Amount</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include './backend/db.php';
    $sql = "select * from customers";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){ while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['cname'];?></td>
      <!-- <td><?php //echo $row['cname']+$row['ccontact'];?></td> -->
      <td><?php echo $row['caddress'];?></td>
      <td><?php echo $row['ccontact'];?></td>
      <td><?php echo $row['cemail'];?></td>
      <td><?php echo $row['ccreatedate'];?></td>

      <td>
        <?php echo $row['camount'];?>
        <!-- amount update -->
        <span
          ><i class="fa fa-edit text-success" onclick="showUpdateAmount()"></i
        ></span>
        <!-- close amount update -->
      </td>

      <td>
        <span
          ><i
            class="fa fa-eye text-primary"
            onclick="showViewCustomer()"
          ></i></span
        >&nbsp;&nbsp;|&nbsp;&nbsp;
        <span
          ><i
            class="fa fa-edit text-success"
            onclick="showEditCustomer()"
          ></i></span
        >&nbsp;&nbsp;|&nbsp;&nbsp;
        <span
          ><i
            class="fa fa-trash delete-customer-btn text-danger"
            onclick="confirm('are you sure want to delete');"
          ></i
        ></span>
      </td>
    </tr>
    <?php
      }
    }
    
    ?>
  </tbody>
</table>
