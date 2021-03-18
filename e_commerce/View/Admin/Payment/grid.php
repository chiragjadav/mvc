<?php
$payments = $this->getPayments();


echo "HEY..!! WELL DONE..!!  :)";
?>
<div class="container-fluid">
<a class="btn btn-success mt-4 float-right" onclick="object.setUrl('<?php echo "{$this->geturl("form", "payment")}"; ?>').resetParams().load()">Create Payment <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
<div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Payment Id</th>
            <th>Name</th>
            <th>Code</th>
            <th>Description</th>
            <th>Status</th>
            <th>Create Date</th>
            <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$payments): ?>
        <tr><td>No Record Found..!! :(</td></tr>

        <?php else: ?>
        <?php foreach($payments->getData() as $key=>$value): ?>
            <tr>
              <td><?php echo $value->paymentId; ?></td>
              <td><?php echo $value->name; ?></td>
              <td><?php echo $value->code; ?></td>
              <td><?php echo $value->description; ?></td>
              <td><?php echo $value->status; ?></td>
              <td><?php echo $value->createdDate; ?></td>
              <td><a onclick="object.setUrl('<?php echo "{$this->geturl("form","payment")}&paymentId={$value->paymentId}"; ?>').resetParams().load()" title="Update Contact" class=" btn btn-warning" role="button">Update</a>
              <a onclick="object.setUrl('<?php echo "{$this->geturl("delete", "payment")}&paymentId={$value->paymentId}"; ?>').resetParams().load()" title="Delete Product" class=" btn btn-danger " role="button">Delete</a></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>