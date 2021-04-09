<?php
$customerGroups = $this->getCustomerGroups();
echo "HEY..!! WELL DONE..!!  :)";
?>
<div class="container-fluid">
<a class="btn btn-success mt-4 float-right" onclick="object.setUrl('<?php echo $this->geturl('form',null,null,true) ?>').resetParams().load()" >Create Customer Group <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
 <div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Group Id</th>
            <th>Name</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$customerGroups): ?>
        <tr><td>No Record Found..!! :(</td></tr>

        <?php else: ?>
        <?php foreach($customerGroups->getData() as $key=>$value): ?>
            <tr>
              <td><?php echo $value->groupId; ?></td>
              <td><?php echo $value->name; ?></td>
              <td><?php echo $value->status; ?></td>
              <td><?php echo $value->createdDate; ?></td>
              <td><a onclick="object.setUrl('<?php echo $this->geturl('form',null,['groupId'=>$value->groupId]); ?>').resetParams().load()" title="Update Contact"  class=" btn btn-warning" role="button">Update</a>
              <a onclick="object.setUrl('<?php echo $this->geturl('delete',null,['groupId'=>$value->groupId]); ?>').resetParams().load()" title="Delete Product" class=" btn btn-danger " role="button">Delete</a></td>
            </tr>
          <?php endforeach; ?>
          <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>
