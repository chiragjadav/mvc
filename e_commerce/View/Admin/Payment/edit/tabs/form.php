<?php $payment = $this->getTableRow(); ?>

<div class="container">
<form method="POST" action="<?php echo "{$this->geturl("save")}"; ?>">
<div class="card p-5">
   	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Name</label>
			<input type="text" name="payment[name]" id="name" class="form-control" value="<?php echo $payment->name;?>">
		</div>
	</div>
  	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Code</label>
			<input type="text" name="payment[code]" id="code" class="form-control" value="<?php echo $payment->code;?>">
		</div>
		<div class="col-md-4">
			<label>Description</label>
			<input type="text" name="payment[description]" id="description" class="form-control" value="<?php echo $payment->description;?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Status</label>
			<select class="form-control" name=payment[status]>
         	 <option value="">Select</option>
         	 <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value) {
         	 	echo "<option value='{$key}'";
         	 	if($payment->status == $key){echo "selected";}
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
</div>
</form>
</div>