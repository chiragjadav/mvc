<?php $collection = $this->getCollection(); ?>
<?php $actions = $this->getActions(); ?>
<?php $button = $this->getButton(); ?>
<?php $columns = $this->getColumns(); ?>

<form method="POST" action="<?php echo "{$this->geturl("filter")}"; ?>">
<div class="container-fluid">
  <?php echo "HEY..!! WELL DONE..!!  :)"; ?>
  <h3 class="mt-4"><?php echo $this->getTitle(); ?></h3>
  <hr>
  <?php if($button): ?>
    <?php foreach($button as $key => $button): ?>
      <?php if($button['ajax']): ?>
        <a class="btn btn-success mt-4 ml-4 float-right" href="javascript:void(0)" onclick="<?= $this->getButtonUrl($button['method']); ?>"><?= $button['label']; ?></a>
        <?php else: ?>
            <a href="<?= $this->getButtonUrl($button['method']); ?>"><?= $button['label']; ?><i class="fa fa-plus" aria-hidden="true"></i></a>
        <?php endif; ?>
    <?php endforeach;  ?>   
  <?php endif; ?>
  <br><br><br><br>
  <div class="card mt-6">
    <div id="table">
    
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <?php if($columns): ?>
                <?php foreach($columns as $key => $column): ?>
                  <th><?php echo $column['label']; ?></th>
                <?php endforeach; ?>
              <?php endif; ?>
              <?php if($actions): ?>
                <th>Action</th>
              <?php endif; ?>
            </tr>
            
          </thead>
          <tbody>
            <tr>
                <?php if($columns): ?>
                  <?php foreach($columns as $type => $column): ?>
                    <td><input type="text" name="filters[<?php echo $column['type']; ?>][<?php echo $column['field']; ?>]" value="<?= $this->getFilter()->getFilterValue($column['type'],$column['field']); ?>"></td>
                  <?php endforeach; ?>
                <?php endif; ?>
                <td><input type="button" onclick="object.setForm(this).load()" id="submit" name="submit" class="btn btn-success"  value="Add Filter"></td>
            </tr>
            <?php if(!$collection): ?>
              <tr><td>No Record Found..!! :(</td></tr>
            <?php else: ?>
           
              <?php foreach($collection->getData() as $key => $row) :?>
                <tr>
                  <?php if($columns): ?>
                    <?php foreach($columns as $key => $column): ?>
                      <td><?= $this->getFieldValue($row,$column['field']); ?>
                      </td>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <?php if($actions): ?>
                    <td>
                      <?php foreach($actions as $key => $action) : ?>
                        <?php if($action['ajax']): ?>
                          <a class="btn <?php echo $action['class'] ?>" href="javascript:void(0)" onclick="<?= $this->getMethodUrl($row,$action['method']); ?>"><?= $action['label']; ?></a>
                        <?php else: ?>
                          <a href="<?= $this->getMethodUrl($row,$action['method']); ?>"><?= $action['label']; ?></a>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
    </div>  
  </div>         
</div>
</form>



<?php /*
$attribute = $this->getCollection();
// echo'<pre>';
echo "HEY..!! WELL DONE..!!  :)";
?>
<div class="container-fluid">
 
<a class="btn btn-success mt-4 float-right" onclick="object.setUrl('<?php echo $this->geturl('form',null,null,true);?>').resetParams().load()">Create Attribute <i class="fa fa-plus" aria-hidden="true"></i></a><br><br><br><br>
 <div class="card">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
            <th>Attribute Id</th>
            <th>Entity Type Id</th>
            <th>Name </th>
            <th>Code</th>
            <th>Inpute Type</th>
            <th>BackendType</th>
            <th>Sort Order</th>
            <th>Backend Model</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!$attribute): ?>
        <tr>
          <td>No Record Found..!! :(</td>
        </tr>

        <?php else: ?>
        <?php foreach($attribute->getData() as $key=>$value): ?>
            <tr>
              <td><?php echo $value->attributeId; ?></td>
              <td><?php echo $value->entityTypeId; ?></td>
              <td><?php echo $value->name; ?></td>
              <td><?php echo $value->code; ?></td>
              <td><?php echo $value->inputType; ?></td>
              <td><?php echo $value->backendType; ?></td>
              <td><?php echo $value->sortOrder; ?></td>
              <td><?php echo $value->backendModel; ?></td>
              <td><a onclick="object.setUrl('<?php echo $this->geturl('form',null,['attributeId' => $value->attributeId]);?>').resetParams().load()" title="Update Contact"  class=" btn btn-warning" role="button">Update</a>
              <a onclick="object.setUrl('<?php echo $this->geturl('delete',null,['attributeId'=>$value->attributeId]);?>').resetParams().load()" title="Delete Product" class=" btn btn-danger " role="button">Delete</a>
            </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>
*/ ?>