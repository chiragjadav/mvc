<?php
$admins = $this->getAdmins();
// echo'<pre>';
echo "HEY..!! WELL DONE..!!  :)";


?>
<div class="container-fluid">
 
<a class="btn btn-success text-white mt-4 float-right" onclick="object.setUrl('<?php echo $this->geturl('form',null,null,true);?>').resetParams().load()">Create Admin <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
 <div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Admin Id</th>
            <th>Name</th>
            <th>Password</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$admins): ?>
        <tr>
          <td>No Record Found..!! :(</td>
        </tr>

        <?php else: ?>
        <?php foreach($admins->getData() as $key=>$value): ?>
            <tr>
              <td><?php echo $value->adminId; ?></td>
              <td><?php echo $value->name; ?></td>
              <td><?php echo $value->password; ?></td>
              <td><?php echo $value->status; ?></td>
              <td><?php echo $value->createdDate; ?></td>
              <td><a onclick="object.setUrl('<?php echo $this->geturl('form',null,['adminId' => $value->adminId]);?>').resetParams().load()" title="Update Contact"  class=" btn btn-warning text-white" role="button"><i class="fas fa-cog"></i></a>
              <a onclick="object.setUrl('<?php echo $this->geturl('delete',null,['adminId'=>$value->adminId]);?>').resetParams().load()" title="Delete Product" class=" btn btn-danger text-white" role="button"><i class="fas fa-trash"></i></a></td>
            </tr>
          <?php endforeach; ?>
          <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>
