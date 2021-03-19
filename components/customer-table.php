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
      <th scope="col">Id</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
      <th scope="col">Amount </th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Gyanendra Chaudhary</td>
      <td>abc123</td>

      <td>Hetauda</td>
      <td>9864374699</td>
      <td>chaudharygyane699@gmail.com</td>
      <td>500
      <span
          ><i
            class="fa fa-edit text-success"
            onclick="showUpdateAmount()"
          ></i></span
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
            onclick="showEditAmount()"
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
    <tr>
      <th scope="row">1</th>
      <td>Gyanendra Chaudhary</td>
      <td>abc123</td>
      <td>Hetauda</td>
      <td>9864374699</td>
      <td>chaudharygyane699@gmail.com</td>
      <td>500</td>

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
  </tbody>
</table>
