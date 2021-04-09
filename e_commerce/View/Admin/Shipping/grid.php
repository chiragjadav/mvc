<?php
$shippings = $this->getShippings();

echo "HEY..!! WELL DONE..!!  :)";
?>
<div class="container-fluid">
<a class="btn btn-success mt-4 float-right" onclick="object.setUrl('<?php echo $this->geturl('form',null,null,true);?>').resetParams().load()">Create Shipping  <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
<div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Shipping Id</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Code</th>
            <th>Description</th>
            <th>Status</th>
            <th>Create Date</th>
            <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$shippings): ?>
        <tr><td>No Record Found..!! :(</td></tr>

        <?php else: ?>
        <?php foreach($shippings->getData() as $key=>$value): ?>
            <tr>
              <td><?php echo $value->shippingId; ?></td>
              <td><?php echo $value->name; ?></td>
              <td><?php echo $value->amount; ?></td>
              <td><?php echo $value->code; ?></td>
              <td><?php echo $value->description; ?></td>
              <td><?php echo $value->status; ?></td>
              <td><?php echo $value->createdDate; ?></td>
              <td><a onclick="object.setUrl('<?php echo $this->geturl('form',null,['shippingId'=>$value->shippingId]) ?>').resetParams().load()" title="Update Contact" class=" btn btn-warning" role="button">Update</a>
              <a onclick="object.setUrl('<?php echo $this->geturl('delete',null,['shippingId'=>$value->shippingId]) ?>').resetParams().load()"title="Delete Product" class=" btn btn-danger " role="button">Delete</a></td>
            </tr>
          <?php endforeach; ?>
          <?php endif;?>
      </tbody>
    </table>
</div>
</div>
</div>