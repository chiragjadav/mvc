<?php $attribute = $this->getTableRow(); ?>
<form method="POST" action="<?php echo "{$this->geturl("save")}"; ?>">
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Name</label>
			<input type="text" name="attribute[name]" id="name" class="form-control" value="<?php echo $attribute->name; ?>">
		</div>
		<div class="col-md-4">
			<label>Code</label>
			<input type="text" name="attribute[code]" id="password" class="form-control" value="<?php echo $attribute->code; ?>">
		</div>
	</div>
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Entity Type Id</label>
             <select class="form-control" name="attribute[entityTypeId]">
            	<?php foreach ($attribute->getEntityTypeOptions() as $key => $value): ?> 
            		<option value="<?php echo $key ?>"><?php echo $value ?></option>
            	<?php endforeach; ?>
             </select>
        </div>
    </div>
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Input Type</label>
             <select class="form-control" name="attribute[inputType]">
            	<?php foreach ($attribute->getInputTypeOptions() as $key => $value): ?> 
            		<option value="<?php echo $key ?>"><?php echo $value ?></option>
            	<?php endforeach; ?>
             </select>
        </div>
        <div class="col-md-4 mr-4">
            <label>Backend Type</label>
             <select class="form-control" name="attribute[backendType]">
            	<?php foreach ($attribute->getBackendTypeOptions() as $key => $value): ?> 
            		<option value="<?php echo $key ?>"><?php echo $value ?></option>
            	<?php endforeach; ?>
             </select>
        </div>
    </div>
    <div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Sort Order</label>
			<input type="text" name="attribute[sortOrder]" id="name" class="form-control" value="<?php echo $attribute->sortOrder; ?>">
		</div>
		<div class="col-md-4">
			<label>Back End Model</label>
			<input type="text" name="attribute[backendModel]" id="password" class="form-control" value="<?php echo $attribute->backendModel; ?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			 <input type="button" onclick="object.setForm(this).load()" name="submit" class="btn btn-success" id="submit" value="save">
		</div>
	</div>
</form>