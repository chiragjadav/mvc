<?php $attribute = $this->getAttributes(); ?>
<?php $product = $this->getTableRow(); ?>

<form method="POST" action="<?php echo $this->getUrl('save','product\attribute'); ?>">
	<?php if($attribute): ?>
		<?php foreach ($attribute->getData() as $attribute): ?>
		<?php $displayBlock = \Mage::getBlock('Block\Admin\Attribute\Display');
			$displayBlock->setAttribute($attribute)->setProduct($product);
			echo $displayBlock->toHtml();
		 ?>			
		<?php endforeach; ?>
	<?php else: ?>
		<div class="ml-5">
			Attributes are not available.
		</div>
	<?php endif; ?>


	   <div class="form-row mt-2">
        <div class="col-md-4 mr-4">
             <input type="button" onclick="object.setForm(this).load()" name="submit" class="btn btn-success" id="submit" value="save">
        </div>
    </div>
</form>