<?php

$products = $this->getProducts();
echo "HEY..!! WELL DONE..!!  :)";

?>

<div class="container-fluid">
<a class="btn btn-success mt-4 float-right" onclick="object.setUrl('<?php echo $this->geturl('form',null,null,true);?>').resetParams().load()" >Create Product <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
<div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Product Id</th>
            <th>SKU</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Status</th>
            <th>Create Date</th>
            <th>Updated Date</th>
            <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$products): ?>
        <tr><td>No Record Found..!! :(</td></tr>

        <?php else: ?>
        <?php foreach($products->getData() as $key=>$value) : ?>
            <tr>
              <td><?php echo $value->productId; ?></td>
              <td><?php echo $value->sku; ?></td>
              <td><?php echo $value->name; ?></td>
              <td><?php echo $value->price; ?></td>
              <td><?php echo $value->discount; ?></td>
              <td><?php echo $value->quantity; ?></td>
              <td><?php echo $value->description; ?></td>
              <td><?php echo $value->status; ?></td>
              <td><?php echo $value->createdDate; ?></td>
              <td><?php echo $value->updatedDate; ?></td>
              <td><a onclick="object.setUrl('<?php echo $this->geturl('form','product',['productId'=>$value->productId]) ?>').resetParams().load()" title="Update Contact" class=" btn btn-warning " role="button">Update</a>
                  <a onclick="object.setUrl('<?php echo $this->geturl('delete','product',['productId'=>$value->productId]) ?>').resetParams().load()" title="Delete Product" class=" btn btn-danger " role="button">Delete</a>
                  
            </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>