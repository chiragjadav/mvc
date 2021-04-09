<?php $admin = $this->getTableRow(); ?>
<form method="POST" action="<?php echo "{$this->geturl("save")}"; ?>">
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label class="card-title"><h4> <?php if(($admin->adminId)!=null){ ?> Update Admin <?php } else { ?> Add Admin <?php } ?> </h4></label>
        </div>
    </div><hr>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Name</label>
			<input type="text" name="admin[name]" id="name" class="form-control" value="<?php echo $admin->name; ?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4">
			<label>Password</label>
			<input type="password" name="admin[password]" id="password" class="form-control" value="<?php echo $admin->password; ?>">
		</div>
	</div>
	    <div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Status</label>
             <select class="form-control" name="admin[status]">
             <option value="">Select</option>
             <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value) {
            echo "<option value='{$key}'";
            if($admin->status == $key){echo "selected"; }
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