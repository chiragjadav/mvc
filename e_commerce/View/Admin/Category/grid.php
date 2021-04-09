<?php
$categories = $this->getCategories();

echo "  HEY..!! WELL DONE..!! :)";
?>
<div class="container-fluid">
 
<a class="btn btn-success mt-4 float-right"  onclick="object.setUrl('<?php echo $this->geturl("form"); ?>').resetParams().load()"> Create Category <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
 <div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th>Category Id</th>
          <th>Name</th>
          <th>Parent Id</th>
          <th>Parent Path</th>
          <th>Status</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$categories): ?>
        <tr>
          <td>No Record Found..!! :(</td>
        </tr>

        <?php else: ?>
        <?php foreach($categories->getData() as $key=>$value):  ?>
        <tr>
          <td><?php echo $value->categoryId; ?></td>
          <td><?php echo $value->name; ?></td>
          <td><?php echo $value->parentId; ?></td>
          <td><?php echo $this->getName($value);?></td>
          <td><?php echo $value->status; ?></td>
          <td><?php echo $value->description; ?></td>
          <td><a onclick="object.setUrl('<?php echo $this->getUrl("form",null,['categoryId'=> $value->categoryId]);?>').resetParams().load();"  title="Update Contact"  class=" btn btn-warning" role="button">Update</a>
          <a onclick="object.setUrl('<?php echo $this->getUrl("delete",null,['categoryId'=> $value->categoryId]);?>').resetParams().load();" title="Delete Product" class=" btn btn-danger " role="button">Delete</a></td>
        </tr>
          <?php endforeach; ?>
          <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>
