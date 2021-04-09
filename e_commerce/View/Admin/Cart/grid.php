<?php $cartItem = $this->getCart()->getItems(); ?>
<?php $customers = $this->getCustomers() ?>
<?php $cart = $this->getCart();  ?>

<?php //echo "<pre>"; print_r($cart); ?>
<div class="container-fluid">
<?php echo "HEY..!! WELL DONE..!!  :)"; ?>
    <h3 class="mt-4">Cart Module</h3>
    <hr>

 <form method="POST" action="<?php echo $this->getUrl('update') ?>" id = "cartForm">
 <input class = "btn mt-4 btn-warning float-right" type="submit" name="" value="Update">
 <a class="btn btn-success mt-4 mr-2 float-right" onclick="object.setUrl('<?php echo $this->geturl('grid','Admin\Product',null,true);?>').resetParams().load()">Back to Cart<i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
 <div class="card">
 	<div class="form-row mt-2">
 		<div class="col-md-1 ml-2">
 			<label class="font-weight-bold">Customers</label>
 		</div>
 		<div class="col-md-4 mr-4">
			<select class="form-control" name="customer">
				<option>Select</option>
				<?php foreach ($customers->getData() as $key => $customer): ?>
					<option value="<?php echo $customer->customerId; ?>" <?php if($customer->customerId == $this->getCart()->customerId):?>selected <?php endif; ?>><?php echo $customer->fname; ?></option>
				<?php endforeach; ?>
			</select>		
 		</div>
 		<div class="col-1">
 			<input class="btn btn-primary" onclick="selectCustomer()" value="Go">
 		</div>
 	</div>
 	
<div id="table" class="mt-2">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Item Id</th>
            <th>Product Id</th>
            <th>Quantity</th>
            <th>Base Price</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Total</th>
            <th>Created Date</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$cartItem): ?>
        <tr>
          <td>No Record Found..!! :(</td>
        </tr>

        <?php else: ?>
        <?php foreach($cartItem->getData() as $key=>$item): ?>
            <tr>
              <td><?php echo $item->cartItemId; ?></td>
              <td><?php echo $item->productId; ?></td>
              <td><input type="text" name="quantity[<?php echo $item->cartItemId; ?>]" value="<?php echo $item->quantity; ?>"></td>
              <td><?php echo $item->basePrice; ?></td>
              <td><input type="text" name="price[<?php echo $item->cartItemId; ?>]" value="<?php echo $item->price; ?>"></td>
              <td><?php echo $item->discount * $item->quantity; ?></td>
              <td><?php echo ($item->price * $item->quantity - $item->discount * $item->quantity); ?></td>
              <td><?php echo $item->createdDate; ?></td>
              <td>
              <a href = "<?php echo $this->geturl('delete',null,['cartItemId'=>$item->cartItemId]);?>" title="Delete Product" class=" btn btn-danger " role="button">Delete</a></td>
            </tr>
          <?php endforeach; ?>
          <?php endif; ?>
      </tbody>
    </table>
    <div class="row">
		</div class="col-md-1">
			<a class="btn btn-success float-right mr-4 m-2" href="<?php echo $this->getUrl('Checkout') ?>">Procced To Checkout</a>
		</div>    	
    </div>


</form>
</div>
<script type="text/javascript">
	function selectCustomer()
	{
		var form = document.getElementById('cartForm');
		form.setAttribute('Action','<?php echo $this->getUrl('selectCustomer') ?>');
		form.submit();
	}
</script>