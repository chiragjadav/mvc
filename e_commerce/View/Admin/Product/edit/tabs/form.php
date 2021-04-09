<?php $product = $this->getTableRow(); ?>
<form method="POST" action="<?php echo "{$this->getUrl('save')}"; ?>">
    <div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label class="card-title"><h4> <?php if(($product->productId)!=null){ ?> Update Product <?php } else { ?> Add Product <?php } ?> </h4></label>
        </div>
    </div><hr>
  <div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>SKU</label>
            <input type="text" name="product[sku]" id="sku" class="form-control" value="<?php echo $product->sku; ?>">
        </div>

        <div class="col-md-4">
            <label>Product Name</label>
            <input type="text" name="product[name]" id="name" class="form-control" value="<?php echo $product->name; ?>">
        </div>
    </div>
    <div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Price</label>
            <input type="text" name="product[price]" id="price" class="form-control" value="<?php echo $product->price; ?>">
        </div>
        <div class="col-md-4">
            <label>Discount</label>
            <input type="text" name="product[discount]" id="discount" class="form-control" value="<?php echo $product->discount; ?>">
        </div>
    </div>
    <div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Quantity</label>
            <input type="text" name="product[quantity]" id="quantity" class="form-control" value="<?php echo $product->quantity; ?>">
        </div>
        <div class="col-md-4">
            <label>Description</label>
            <input type="text" name="product[description]" id="description" class="form-control" value="<?php echo $product->description; ?>">
        </div>
    </div>
    <div class="form-row mt-2">
        <div class="col-md-4 mr-4">
            <label>Status</label>
             <select class="form-control" name="product[status]">
             <option value="">Select</option>
             <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value) {
            echo "<option value='{$key}'";
            if($product->status == $key){echo "selected"; }
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