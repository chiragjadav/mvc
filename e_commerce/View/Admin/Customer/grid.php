<?php
$customers = $this->getCustomers();
/*print_r($customers);
die();*/
echo "HEY..!! WELL DONE..!!  :)";
?>
<div class="container-fluid">
<a class="btn btn-success mt-4 float-right" onclick="object.setUrl('<?php echo $this->geturl('form',null,null,true); ?>').resetParams().load()" >Create Customer <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
<div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Customer Id</th>
            <th>Customer Group Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>email</th>
            <th>Password</th>
            <th>Status</th>
           <!--  <th>Create Date</th> -->
            <th>Zipcode</th>
            <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
           <?php if(!$customers): ?>
        <tr><td>No Record Found..!! :(</td></tr>

        <?php else: ?>
        <?php foreach($customers->getData() as $key=>$value): ?>
            <tr>
              <td><?php echo $value->customerId; ?></td>
              <td><?php echo $value->name; ?></td>
              <td><?php echo $value->fName; ?></td>
              <td><?php echo $value->lName; ?></td>
              <td><?php echo $value->email; ?></td>
              <td><?php echo $value->password; ?></td>
              <td><?php echo $value->status; ?></td>
              <!-- <td><?php echo $value->createdDate; ?></td> -->
              <td><?php echo $value->zipcode; ?></td>
              <td><a onclick="object.setUrl('<?php echo $this->geturl('form',null,['customerId'=>$value->customerId]); ?>').resetParams().load()"  title="Update Contact" class=" btn btn-warning" role="button">Update</a>
              <a onclick="object.setUrl('<?php echo $this->geturl('delete',null,['customerId'=>$value->customerId]); ?>').resetParams().load()"  title="Delete Product" class=" btn btn-danger " role="button">Delete</a></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>