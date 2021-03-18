<?php $billing = $this->getBilling(); ?>
<?php $shipping = $this->getShipping(); ?>
<form method="POST" action="<?php echo "{$this->getFormUrl()}"; ?>">
<div class="card p-2 m-2">
<div class="form-row mt-2">	
	<div class="col-md-6">
		<label class="card-title">Billing Address</label>
	</div>
</div>
<div class="form-row mt-2">	
	<div class="col-md-6">
		<label>Address</label>
		<input type="text" name="billing[address]" id="fname" class="form-control" value="<?php echo $billing->address; ?>">
	</div>
</div>

<div class="form-row mt-2">	
	<div class="col-md-2 mr-1">
		<label>City</label>
		<input type="text" name="billing[city]" id="fname" class="form-control" value="<?php echo $billing->city; ?>">
	</div>
	<div class="col-md-2 mr-1">
		<label>State</label>
		<input type="text" name="billing[State]" id="fname" class="form-control" value="<?php echo $billing->state; ?>">
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
</div>

<div class="card p-2 m-2">
<div class="form-row mt-2">	
	<div class="col-md-6">
		<label class="card-title">Shipping Address</label>
	</div>
</div>

<div class="form-row mt-2">	
	<div class="col-md-6">
		<label>Address</label>
		<input type="text" name="shipping[address]" id="fname" class="form-control" value="<?php echo $shipping->address ?>">
	</div>
</div>

<div class="form-row mt-2">	
	<div class="col-md-2 mr-1">
		<label>City</label>
		<input type="text" name="shipping[city]" id="fname" class="form-control" value="<?php echo $shipping->city ?>">
	</div>
	<div class="col-md-2 mr-1">
		<label>State</label>
		<input type="text" name="shipping[State]" id="fname" class="form-control" value="<?php echo $shipping->state ?>">
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

</div>

<div class="form-row mt-2">
	<div class="col-md-4 mr-4">
		<input type="button" onclick="object.setForm(this).load()" class="btn btn-success" id="submit" value="save">
	</div>
</div>
</form>