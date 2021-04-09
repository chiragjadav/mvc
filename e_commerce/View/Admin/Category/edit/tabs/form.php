<?php  $category = $this->getTableRow(); ?>
<?php  $categoryOptions = $this->getCategoryOption(); ?>

<form method="POST" action="<?php echo "{$this->getFormUrl()}"; ?>">
	<div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label class="card-title"><h4> <?php if(($category->categoryId)!=null){ ?> Update Category <?php } else { ?> Add Category <?php } ?> </h4></label>
        </div>
    </div><hr>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Parent Path</label>
			<select class="form-control" name=category[parentId]>
				<?php if($categoryOptions): ?>
            	<?php foreach($categoryOptions as $categoryId => $name):?>
                <option value="<?php echo $categoryId ?>" <?php if($categoryId == $category->parentId){ echo "selected"; } ?> ><?php echo $name; ?></option>  
            
            	<?php endforeach; ?>
            	<?php endif; ?>
			</select>
		</div>
		<div class="col-md-4 mr-4">
			<label>Name</label>
			<input type="text" name=category[name] id="name" class="form-control" value="<?php echo $category->name;?>">
		</div>
		
	</div>

	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Status</label>
			 <select class="form-control" name=category[status]>
         	 <option value="">Select</option>
         	 <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value) {
         	 	echo "<option value='{$key}'";
         	 	if($category->status == $key){echo "selected";}
         	 	echo ">{$value}</option>";
         	 }
         	 ?>
          	 </select>
		</div>
		<div class="col-md-4">
			<label>Description</label>
			<input type='description' name=category[description] class="form-control" id="description" value="<?php echo $category->description; ?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			 <input type="button" onclick="object.setForm(this).load()" name="submit" class="btn btn-success" id="submit" value="save">
		</div>
	</div>
</form>