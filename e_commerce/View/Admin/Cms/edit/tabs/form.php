<?php $cms = $this->getTableRow(); ?>
<form method="POST" id="form" action="<?php echo "{$this->geturl("save")}"; ?>">
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Title</label>
			<input type="text" name="cms[title]" id="name" class="form-control" value="<?php echo $cms->name; ?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			<label>Identifier</label>
			<input type="text" name="cms[identifier]" id="identifier" class="form-control" value="<?php echo $cms->identifier; ?>">
		</div>
	</div>
	<div class="form-row mt-2">
		<div class="col-md-4">
			<label>Content</label>
			<textarea class="form-control" name="cms[content]" rows="3"><?php echo $cms->content; ?></textarea>
		</div>
	</div>
	    <div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Status</label>
             <select class="form-control" name="cms[status]">
             <option value="">Select</option>
             <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value) {
            echo "<option value='{$key}'";
            if($cms->status == $key){echo "selected"; }
            echo ">{$value}</option>";
            }?>
             </select>
        </div>
    </div>
	<div class="form-row mt-2">
		<div class="col-md-4 mr-4">
			 <input type="button" onclick="object.setCms().load()" name="submit" class="btn btn-success" id="submit" value="save">
		</div>
	</div>
</form>
<script>
  CKEDITOR.replace('cms[content]');
</script>