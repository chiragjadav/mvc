<?php $customerGroup = $this->getTableRow(); ?>
<form method="POST" action="<?php echo "{$this->geturl("save")}"; ?>">
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Name</label>
			<input type="text" name="customerGroup[name]" id="name" class="form-control" value="<?php echo $customerGroup->name; ?>">
		</div>
	</div>
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Status</label>
             <select class="form-control" name="customerGroup[status]">
             <option value="">Select</option>
             <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value) {
            echo "<option value='{$key}'";
            if($customerGroup->status == $key){echo "selected"; }
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