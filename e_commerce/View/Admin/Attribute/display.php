<?php $attribute = $this->getAttribute(); ?>
<?php $product = $this->getProduct(); ?>
<?php $options = $this->getOptions(); ?>
<?php //echo "<pre>";  print_r($attribute); ?>

<?php if (!$options && $attribute->inputType != 'text'): ?>
No Optins Found.
<?php else: ?>
<?php switch ($attribute->inputType):
	  case 'select': ?>
	<div class="row form-group">
		<div class="col-4">
			<label for="<?php echo $attribute->name; ?>"><?php echo $attribute->name; ?></label>
			<select name = "product[<?php echo $attribute->name; ?>]" class="form-control">
			<option value="select">Select</option>
			<?php foreach ($options->getData() as $option): ?>
				
				<option value="<?php echo $option->name; ?>"><?php echo $option->name; ?></option>
			<?php endforeach; ?>
		</select>
		</div>
	</div>
	<?php break; ?>
	<?php case 'text': ?>
	<div class="row form-group">
		<div class="col-4">
			<label for="<?php echo $attribute->name; ?>"><?php echo $attribute->name;?></label>
			<input type="text" name="product[<?php echo $attribute->name; ?>]" class="form-control" id="<?php echo $attribute->name; ?> ">
	</div>
	</div>
	<?php break; ?>

	<?php case 'textarea': ?>
	<div class="row form-group">
		<div class="col-4">
			<label for="<?php echo $attribute->name; ?>"><?php echo $attribute->name; ?></label>
			<textarea name="product[<?php echo $attribute->name; ?>]" row="4" class="form-control" id="<?php echo $attribute->name; ?> ">
	</div>
	</div>
	<?php break; ?>

	<?php default: ?>
		Attribute Not Set.
	<?php break; ?>
<?php endswitch; ?>
<?php endif; ?>
