<?php
if(!isset($_SESSION['USER-EMAIL'])){
    header('location: index.php');
}
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">User ID</th>
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
        $search_data = mysqli_real_escape_string($conn,$_REQUEST['search_content']);
        $search_data = preg_replace("#[^0-9a-z]i#","", $search_data);
        $sql = "SELECT * FROM customers WHERE cname like '%$search_data%' and user_id = '".$_SESSION['ID']."'";
        $result = mysqli_query($conn , $sql);
        
        if (mysqli_num_rows($result)>0) { while ($row =
    mysqli_fetch_assoc($result)) { ?>
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
        <span>
          <a href="amount.php?customer_id=<?php echo $row['id']?>"
            ><i class="fa fa-edit text-success" onclick="showUpdateAmount()"></i
          ></a>
        </span>
        <!-- close amount update -->
      </td>

      <td>
      <span
          >
          <a href="customer-details.php?id=<?php echo $row['id']?>">
          <i
            class="fa fa-eye text-primary"
            onclick="showViewCustomer()"
          ></i></a>
          </span
        >&nbsp;&nbsp;|&nbsp;&nbsp;
        <span
          ><a href="update-user.php?customer_id=<?php echo $row['id'];?>">
          <i
            class="fa fa-edit text-success"
            onclick="showEditCustomer()"
          ></i></a></span
        >&nbsp;&nbsp;|&nbsp;&nbsp;
        <span>
          <a
            href="./backend/submit.php?deleteCustomer='<?php echo $row['id'];?>'"
            onclick="confirm('are you sure want to delete');"
          >
            <i class="fa fa-trash delete-customer-btn text-danger"></i> </a
        ></span>
      </td>
    </tr>
    <?php
                    }
                }
                ?>
  </tbody>
</table>
