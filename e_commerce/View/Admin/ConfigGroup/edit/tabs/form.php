<?php 
$configGroup = $this->getTableRow();
 ?>
<form method="POST" action="<?php echo "{$this->geturl("save")}"; ?>">
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label class="card-title"><h4> <?php if(($configGroup->groupId)!=null){ ?> Update ConfigrationGroup <?php } else { ?> Add ConfigrationGroup <?php } ?> </h4></label>
        </div>
    </div><hr>
 	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Name</label>
			<input type="text" name="configGroup" id="name" class="form-control" value="<?php echo $configGroup->name ?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			 <input type="button" onclick="object.setForm(this).load()" name="submit" class="btn btn-success" id="submit" value="save">
		</div>
	</div>
</form>