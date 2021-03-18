<?php $customer = $this->getTableRow(); 
$customerGroups = $this->getCustomerGroups();


/*echo "<pre>";
//foreach ($customerGroups as $key => $value) { print_r();}
print_r($customer);
die();*/
?>
<form method="POST" action="<?php echo "{$this->getFormUrl()}"; ?>">
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label class="card-title"> <?php if(($customer->customerId)!=null){ ?> Update Customer <?php } else { ?> Add Customer <?php } ?> </label>
        </div>
    </div><hr>
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Customer Group</label>
             <select class="form-control" name="customer[groupId]">
           
             <?php foreach ($customerGroups->getData() as $key => $value) {
            	echo "<option value='$value->groupId'";
            	echo ">{$value->name}</option>";  
            }?>
             </select>
        </div>
    </div>
	<div class="form-row mt-2">
		
		<div class="col-md-4 mr-4">
			<label>First Name</label>
			<input type="text" name="customer[fname]" id="fname" class="form-control" value="<?php echo $customer->fname; ?>">
		</div>
		<div class="col-md-4">
			<label>Last Name</label>
			<input type="text" name="customer[lname]" id="lname" class="form-control" value="<?php echo $customer->lname; ?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Email</label>
			<input type="email" name="customer[email]" id="email" class="form-control" value="<?php echo $customer->email; ?>">
		</div>
		<div class="col-md-4">
			<label>Password</label>
			<input type="password" name="customer[password]" id="password" class="form-control" value="<?php echo $customer->password; ?>">
		</div>
	</div>

	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Status</label>
             <select class="form-control" name="customer[status]">
             <option value="">Select</option>
             <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value) {
            echo "<option value='{$key}'";
            if($customer->status == $key){echo "selected"; }
            echo ">{$value}</option>";
            }?>
             </select>
        </div>
    </div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			 <input type="button" onclick="object.setForm(this).load()" name="submit" class="btn btn-success" id="submit" value="save">
		</div>
	</div>
</form>