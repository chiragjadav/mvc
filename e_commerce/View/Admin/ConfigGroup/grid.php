<?php
$configGroups = $this->getConfigGroups();
?>
<div class="container-fluid">
<?php echo "HEY..!! WELL DONE..!!  :)"; ?>
  <h3 class="mt-4"><?php echo $this->getTitle(); ?></h3>
  <hr>
<a class="btn btn-success mt-4 float-right" onclick="object.setUrl('<?php echo $this->geturl('form',null,null,true);?>').resetParams().load()">Create Config Group <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
<div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Group Id</th>
            <th>Name</th>
            <th>Created Date</th>
            <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$configGroups): ?>
        <tr><td>No Record Found..!! :(</td></tr>

        <?php else: ?>
        <?php foreach($configGroups->getData() as $key=>$group): ?>
            <tr>
              <td><?php echo $group->groupId; ?></td>
              <td><?php echo $group->name; ?></td>
              <td><?php echo $group->createdDate; ?></td>
              <td><a onclick="object.setUrl('<?php echo $this->geturl('form',null,['groupId'=>$group->groupId]) ?>').resetParams().load()" title="Update Contact" class=" btn btn-warning" role="button">Update</a>
              <a onclick="object.setUrl('<?php echo $this->geturl('delete',null,['groupId'=>$group->groupId]) ?>').resetParams().load()"title="Delete Product" class=" btn btn-danger " role="button">Delete</a></td>
            </tr>
          <?php endforeach; ?>
          <?php endif;?>
      </tbody>
    </table>
</div>
</div>
</div>