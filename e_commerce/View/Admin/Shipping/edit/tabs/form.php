<?php $shipping = $this->getTableRow(); ?>
<form method="POST" action="<?php echo "{$this->geturl("save")}"; ?>">
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label class="card-title"><h4> <?php if(($shipping->shippingId)!=null){ ?> Update Shipping <?php } else { ?> Add Shipping <?php } ?> </h4></label>
        </div>
    </div><hr>
 	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Name</label>
			<input type="text" name="shipping[name]" id="name" class="form-control" value="<?php echo $shipping->name;?>">
		</div>
		<div class="col-md-4">
			<label>Amount</label>
			<input type="text" name="shipping[amount]" id="amount" class="form-control" value="<?php echo $shipping->amount;?>">
		</div>
	</div>
  	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Code</label>
			<input type="text" name="shipping[code]" id="code" class="form-control" value="<?php echo $shipping->code;?>">
		</div>
		<div class="col-md-4">
			<label>Description</label>
			<input type="text" name="shipping[description]" id="description" class="form-control" value="<?php echo $shipping->description;?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Status</label>
			 <select class="form-control" name="shipping[status]">
         	 <option value="">Select</option>
         	 <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value) {
         	 	echo "<option value='{$key}'";
         	 	if($shipping->status == $key){ echo "selected";}
         	 	echo ">{$value}</option>";
         	 }
         	 ?>
          	 </select>
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			 <input type="button" onclick="object.setForm(this).load()" name="submit" class="btn btn-success" id="submit" value="save">
		</div>
	</div>
</form>