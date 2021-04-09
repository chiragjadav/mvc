<?php $cart = $this->getCart(); //echo "<pre>"; print_r($this->getCart()); ?>
<?php $billing = $this->getBillingAddress(); ?>
<?php $shipping = $this->getShippingAddress(); ?>
<?php $paymentMethods = $this->getPaymentMethods(); //echo "<pre>"; print_r($paymentMethods); die();?>
<?php $shippingMethods = $this->getShippingMethods(); //echo "<pre>"; print_r($paymentMethods); die();?>
<div class="container-fluid">
<?php echo "HEY..!! WELL DONE..!!  :)"; ?>
    <h3 class="mt-4">Checkout Module</h3>
    <hr>
<a class="btn btn-primary float-right" href="<?php echo $this->getUrl('index') ?>">Back To cart</a><br>
<form method="POST" action="<?php echo $this->getUrl('update') ?>" id = "checkoutForm">
<div class="row mt-4">
<div class="col">
<div class="card p-2 m-2">
<div class="form-row mt-2">	
	<div class="col-md-6">
		<label class="card-title font-weight-bold">Billing Address</label>
	</div>
</div>
<div class="form-row mt-2">	
	<div class="col-md-6">
		<label>First Name</label>
		<input type="text" id="fname" class="form-control" value="<?php echo $this->getCustomerName($this->getCart()->customerId); ?>">
	</div>
</div>

<div class="form-row mt-2">	
	<div class="col-md-2 mr-1">
		<label>City</label>
		<input type="text" name="billing[city]" id="fname" class="form-control" value="<?php echo $billing->city; ?>">
	</div>
	<div class="col-md-2 mr-1">
		<label>State</label>
		<input type="text" name="billing[state]" id="fname" class="form-control" value="<?php echo $billing->state; ?>">
	</div>
	<div class="col-md-2 mr-1">
		<label>Country</label>
		<input type="text" name="billing[country]" id="fname" class="form-control" value="<?php echo $billing->country;  ?>">
	</div>
</div>
<div class="form-row mt-2">	
	<div class="col-md-3 mr-2">
		<label>Zip Code</label>
		<input type="text" name="billing[zipcode]" id="fname" class="form-control" value="<?php echo $billing->zipcode; ?>">
	</div>
</div>
<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
		<input class="btn btn-success" onclick="saveBilling()" value="Save">
	</div>
	<div class="col-md-6">
		<div class="form-check mt-2">
		    <input type="checkbox" name="billingCheckbox" class="form-check-input" id="billingCheckbox">
		    <label class="form-check-label" for="billingCheckbox">Save in address Book</label>
  		</div>
	</div>
</div>
</div>
</div>

<div class="col">
<div class="card p-2 m-2">
<div class="form-row mt-2">	
	<div class="col-md-6">
		<label class="card-title font-weight-bold">Shipping Address</label>
	</div>
</div>
<div class="fom-row mt-2">
	<div class="col-md-6">
		<div class="form-check">
		    <input type="checkbox" name="checkbox" <?php if($shipping->sameAsBilling == 1):?>checked <?php endif; ?> class="form-check-input" id="sameAsBilling">
		    <label class="form-check-label" for="sameAsBilling">Same as billing</label>
  		</div>
	</div>
</div>
<div class="form-row mt-2">	
	<div class="col-md-6">
		<label>First Name</label>
		<input type="text" id="fname" class="form-control" value="<?php echo $this->getCustomerName($this->getCart()->customerId); ?>">
	</div>
</div>
<div class="form-row mt-2">	
	<div class="col-md-2 mr-1">
		<label>City</label>
		<input type="text" name="shipping[city]" id="fname" class="form-control" value="<?php echo $shipping->city ?>">
	</div>
	<div class="col-md-2 mr-1">
		<label>State</label>
		<input type="text" name="shipping[state]" id="fname" class="form-control" value="<?php echo $shipping->state ?>">
	</div>
	<div class="col-md-2 mr-1">
		<label>Country</label>
		<input type="text" name="shipping[country]" id="fname" class="form-control" value="<?php echo $shipping->country ?>">
	</div>
</div>
<div class="form-row mt-2">	
	<div class="col-md-3 mr-2">
		<label>Zip Code</label>
		<input type="text" name="shipping[zipcode]" id="fname" class="form-control" value="<?php echo $shipping->zipcode ?>">
	</div>
</div>
<div class="form-row mt-2">
	<div class="col-md-4 mr-4">
		<input class="btn btn-success" onclick="saveShipping()" value="Save">
	</div>
	<div class="col-md-6 mt-2">
		<div class="form-check">
		    <input type="checkbox" name="shippingCheckbox" class="form-check-input" id="shippingCheckbox">
		    <label class="form-check-label" for="shippingCheckbox">Save in address Book</label>
  		</div>
	</div>
</div>
</div>
</div>
</div>



<div class="row mt-4">
<div class="col">
<div class="card p-2 m-2">
	<div class="form-row mt-2">	
		<div class="col-md-6">
			<label class="card-title font-weight-bold">Payment Methods</label>
		</div>
	</div>
	<?php foreach($paymentMethods->getData() as $key => $paymentMethod): ?>
		<div class="form-row mt-2">	
			<div class="col-md-6 mt-2">
				<div class="form-check">
				    <input type="radio" name="paymentMethod" value="<?php echo $paymentMethod->paymentId ?>" class="form-check-input" <?php if($paymentMethod->paymentId == $cart->paymentMethodId): ?> checked <?php endif; ?> id="radio">
				    <label><?php echo $paymentMethod->paymentId ?></label>
				    <label class="form-check-label" for="radio">- <?php echo $paymentMethod->name ?></label>
		  		</div>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="form-row mt-2">
	<div class="col-md-4 mr-4">
		<input class="btn btn-success" onclick="savePaymentMethod()" value="Save">
	</div>
</div>
</div>
</div>

<div class="col">
<div class="card p-2 m-2">
	<div class="form-row mt-2">	
		<div class="col-md-6">
			<label class="card-title font-weight-bold">Shipping Methods</label>
		</div>
	</div>
	<?php foreach($shippingMethods->getData() as $key => $shippingMethod): ?>
		<div class="form-row mt-2">	
			<div class="col-md-6 mt-2">
				<div class="form-check">
				    <input type="radio" name="shippingMethod" value="<?php echo $shippingMethod->shippingId ?>" class="form-check-input" <?php if($shippingMethod->shippingId == $cart->shippingMethodId): ?> checked <?php endif; ?> id="radio">
				    <label><?php echo $shippingMethod->shippingId ?></label>
				    <label class="form-check-label" for="radio">- <?php echo $shippingMethod->name ?></label>
		  		</div>
			</div>
	  		<div class="col-md-6 mt-2">
			    <label class="form-check-label" for="radio"><?php echo $shippingMethod->amount ?>$</label>
	  		</div>
		</div>
	<?php endforeach; ?>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<input class="btn btn-success" onclick="saveShippingMethod()" value="Save">
		</div>
	</div>
</div>
</div>
</div>
</form>

<div class="card p-2 m-2">
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4 float-right">
			<label class="font-weight-bold">Cart Summary</label>	
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4 float-right">
			<label class="form-check-label" for="radio">Base Total : <?php echo $cart->total ?>$</label>	
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4 float-right">
			<label class="form-check-label" for="radio">Shipping Charge : <?php echo $cart->shippingAmount ?>₹</label>
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4 float-right">
			<label class="form-check-label" for="radio">Coupon : 0₹</label>
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4 float-right">
			<label class="form-check-label font-weight-bold" for="radio">Grand Total : <?php echo ($cart->shippingAmount)+($cart->total) ?>₹</label>
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<input class="btn btn-danger" onclick="saveShippingMethod()" value="Place Order">
		</div>
	</div>
</div>		
</div>
</div>
<script type="text/javascript">
	function saveBilling()
	{
		var form = document.getElementById('checkoutForm');
		form.setAttribute('Action','<?php echo $this->getUrl('saveBilling') ?>');
		form.submit();
	}
	function saveShipping()
	{
		var form = document.getElementById('checkoutForm');
		form.setAttribute('Action','<?php echo $this->getUrl('saveShipping') ?>');
		form.submit();
	}
	function savePaymentMethod()
	{
		var form = document.getElementById('checkoutForm');
		form.setAttribute('Action','<?php echo $this->getUrl('savePaymentMethod') ?>');
		form.submit();
	}
	function saveShippingMethod()
	{
		var form = document.getElementById('checkoutForm');
		form.setAttribute('Action','<?php echo $this->getUrl('saveShippingMethod') ?>');
		form.submit();
	}
</script>