
<?php $brands = $this->getBrands(); ?>

<form method="POST" action="<?php echo "{$this->getUrl('save')}"; ?>">
 
<div class="container mt-2">
  <input type="button" onclick="object.setForm(this).load()" name="submit" class="btn btn-warning" id="submit" value="uploads">
  <input type="button" onclick="object.setForm(this).setUrl('<?php echo $this->getUrl('delete') ?>').load()"  class="btn btn-danger" id="submit" value="remove">
<br><br><br><br>
<div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Brand Id</th>
            <th>Brand Image</th>
            <th>Name</th>
            <th>Freature</th>
            <th>Remove</th>
        </tr>
      </thead>
      <tbody>
          <?php if(!$brands): ?>
            <tr><td>No Record Found :(</td></tr>
          <?php else: ?>
      	  <?php foreach($brands->getData() as $key=>$value): ?>
            <tr>
              <td>
                <input type="text"  value= <?php echo $value->brandId ?>>
              </td>
              <td>
                <img src="View\Admin\Brand\uploads/<?php echo $value->imageName; ?> " alt="Cinque Terre" width="80" height="80">
              </td>
              <td>
                <input type="text" name="brand[<?php echo $value->brandId ?>][name]" value="<?php echo $value->name ?>">
              </td>
  			      <td>
                <input type="checkbox" name="brand[<?php echo $value->brandId ?>][feature]"  value="<?php echo $value->feature ?>"<?php if($value->feature == "1"):?> checked <?php endif;?>>
             </td>
  			     <td>
                <input type="checkbox" name="brandremove[]"  value="<?php echo $value->brandId ?>">
  			     </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>
</form>

<form method="POST" action="<?php echo "{$this->getUrl('save')}"; ?>" enctype="multipart/form-data">
<div class="container mt-2">

    <div class="card p-1">
 <div class="form-row mt-2">

 	    <div class="col">
        <div class="custom-file">
        <label>Brand Image</label>        
        <input type="file" id="imageFile" name="fileimg">
      </div>
      </div>
  </div>
  <div class="form-row mt-2">
        <div class="col-md-8 mr-4">
        	<!--<label class="form-label" for="customFile">Product Image</label>
			<input type="file" class="form-control" name="fileImage" id="customFile">-->
            <input type="button" onclick="object.setForm(this).uploadFile() " name="submit" class="btn btn-success" id="submit" value="save">
        </div>
    </div>
</div>

</div>
</form>