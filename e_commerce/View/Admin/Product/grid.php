<?php $collection = $this->getCollection(); ?>
<div class="container-fluid">
<?php echo "HEY..!! WELL DONE..!!  :)"; ?>
    <h3 class="mt-4"><?php  echo $this->getTitle(); ?></h3>
    <hr>
<?php foreach($this->getButton() as $key => $button) :?>
  <?php if($button['ajax']): ?>
      <a class="btn btn-success mt-4 float-right" href="javascript:void(0)" onclick="<?= $this->getButtonUrl($button['method']); ?>"><?= $button['label']; ?></a>
  <?php else: ?>
      <a href="<?= $this->getButtonUrl($button['method']); ?>"><?= $button['label']; ?><i class="fa fa-plus" aria-hidden="true"></i></a>
  <?php endif; ?>
<?php endforeach;  ?>   
<br><br><br><br>
<div class="card mt-6">
<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <?php foreach($this->getColumns() as $key => $column) : ?>
              <th><?= $column['label']; ?></th>
          <?php endforeach;  ?> 
           <th colspan="2">Action</th>
        </tr>
        
      </thead>
      <tbody>
        <?php if(!$collection): ?>
        <tr><td>No Record Found..!! :(</td></tr>

        <?php else: ?>
        <?php foreach($collection->getData() as $key=>$row) : ?>
          <tr>
          <?php foreach($this->getColumns() as $key => $column) : ?>
              <td><?= $this->getFieldValue($row,$column['field']); ?></td>
          <?php endforeach;  ?> 
          <td>
          <?php foreach($this->getActions() as $key => $action) :?>
            <?php if($action['ajax']): ?>
                <a href="javascript:void(0)" onclick="<?= $this->getMethodUrl($row,$action['method']); ?>"><?= $action['label']; ?></a>
            <?php else: ?>
                <a href="<?= $this->getMethodUrl($row,$action['method']); ?>"><?= $action['label']; ?></a>
            <?php endif; ?>
          <?php endforeach;  ?>   
              </td>
        </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
</div>
</div>
</div>