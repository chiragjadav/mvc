<?php $collection = $this->getCollection(); ?>
<?php $actions = $this->getActions(); ?>
<?php $button = $this->getButton(); ?>
<?php $columns = $this->getColumns(); ?>

<div class="container-fluid">
<?php echo "HEY..!! WELL DONE..!!  :)"; ?>
    <h3 class="mt-4"><?php  echo $this->getTitle(); ?></h3>
    <hr>
    <?php if($button): ?>
    	<?php foreach($button as $key => $button) :?>
			  <?php if($button['ajax']): ?>
			      <a class="btn btn-success mt-4 float-right" href="javascript:void(0)" onclick="<?= $this->getButtonUrl($button['method']); ?>"><?= $button['label']; ?></a>
			  <?php else: ?>
			      <a class="btn btn-success mt-4 float-right" href="<?= $this->getButtonUrl($button['method']); ?>"><?= $button['label']; ?><i class="fa fa-plus" aria-hidden="true"></i></a>
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
        		<?php foreach($columns as $key => $column) : ?>
              		<th><?= $column['label']; ?></th>
          		<?php endforeach;  ?> 
			<?php endif; ?>
			<?php if($actions): ?>
           		<th>Action</th>
           	<?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php if(!$collection): ?>
        	<tr><td>No Record Found..!! :(</td></tr>
	    <?php else: ?>
	        <?php foreach($collection->getData() as $key=>$row) : ?>
	         	<tr>
	          		<?php if($columns): ?>
	          			<?php foreach($columns as $key => $column) : ?>
	              			<td><?= $this->getFieldValue($row,$column['field']); ?></td>
	          			<?php endforeach;  ?> 
	          		<?php endif; ?>
	          
	          		<?php if($actions): ?>
	          			<td>
	          				<?php foreach($actions as $key => $action) :?>
			            		<?php if($action['ajax']): ?>
			                		<a class="btn <?php echo $action['class'] ?>" href="javascript:void(0)" onclick="<?= $this->getMethodUrl($row,$action['method']); ?>"><?= $action['label']; ?></a>
			            		<?php else: ?>
			                		<a class="btn <?php echo $action['class'] ?>" href="<?= $this->getMethodUrl($row,$action['method']); ?>"><?= $action['label']; ?></a>
			            		<?php endif; ?>
			          		<?php endforeach;  ?>   		
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