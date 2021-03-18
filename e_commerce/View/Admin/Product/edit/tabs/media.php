
<?php $images = $this->getImages();

$id = \Mage::getModel('Model\Core\Url');
$productId = $id->getRequest()->getGet('productId');

 ?>
<form method="POST" action="<?php echo "{$this->getUrl('saveMedia')}"; ?>">
 
<div class="container mt-2">
  <input type="button" onclick="object.setForm(this).load()" name="submit" class="btn btn-warning" id="submit" value="uploads">
  <input type="button" onclick="object.setForm(this).setUrl('<?php echo $this->getUrl('deleteMedia') ?>').load()"  class="btn btn-danger" id="submit" value="remove">
<br><br><br><br>
<div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>IMAGE</th>
            <th>LABEL</th>
            <th>SMALL</th>
            <th>THUMB</th>
            <th>BASE</th>
            <th>GALLERY</th>
            <th>REMOVE</th>
        </tr>
      </thead>
      <tbody>
      	  <?php
    
        foreach($images->getData() as $key=>$value){
        	if($productId == $value->productId){
          ?>
            <tr>
              <td>
              <img src="View\Admin\Product\edit\tabs\uploads\<?php echo $value->name; ?> " alt="Cinque Terre" width="80" height="80"></td>
              <td><input type="text" name="image[data][<?php echo $value->imageId ?>][label]" value= <?php echo $value->label ?>></td>
              <td><input class="form-check-input" type="radio" name="image[small]" value="<?php echo $value->imageId ?>" <?php if($value->small=="1"):?> checked <?php endif;?>></td>
              <td><div class="form-check">
  				        <input class="form-check-input" type="radio" name="image[thumb]" value="<?php echo $value->imageId ?>" <?php if($value->thumb=="1"):?> checked <?php endif;?>>
  				        </div>
  			     </td>
  			     <td><div class="form-check">
  				       <input class="form-check-input" type="radio" name="image[base]"  value="<?php echo $value->imageId ?>" <?php if($value->base=="1"):?> checked <?php endif;?>>
  			         </div>
  			     </td>
  			     <td><input type="checkbox" name="image[data][<?php echo $value->imageId ?>][gallery]"  value="<?php echo $value->imageId ?>"<?php if($value->gallery=="1"):?> checked <?php endif;?>>
             </td>
  			     <td><input type="checkbox" name="imageremove[]"  value="<?php echo $value->imageId ?>">
  			     </td>
            </tr>
          <?php } } ?>
      </tbody>
    </table>
</div>
</div>
</div>
</form>

<form method="POST" action="<?php echo "{$this->getUrl('saveMedia')}"; ?>" enctype="multipart/form-data">
<div class="container mt-2">

    <div class="card p-1">
 <div class="form-row mt-2">

 	    <div class="col">
        <div class="custom-file">
        <label>Product Image</label>        
        <input type="file" id="imageFile" name="fileimg">
      </div>
      </div>
  </div>
  <div class="form-row mt-2">
        <div class="col-md-8 mr-4">
        	<!--<label class="form-label" for="customFile">Product Image</label>
			<input type="file" class="form-control" name="fileImage" id="customFile">-->
            <input type="button" onclick="object.setForm(this).setUrl('<?php echo $this->getUrl('saveMedia','product',null)?>').uploadFile() " name="submit" class="btn btn-success" id="submit" value="save">
        </div>
    </div>
</div>

</div>
</form>