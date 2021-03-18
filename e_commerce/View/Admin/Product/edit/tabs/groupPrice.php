<?php 
	$product = $this->getTableRow();
	$customerGroups = $this->getCustomerGroup();
?>
<div class="container-fluid">
<form method="POST" action="<?php echo $this->geturl("save","Product\GroupPrice")?>">
	<a class="btn btn-warning mt-4 float-right" onclick="object.setForm(this).load()">Update </a><br><br><br><br>


<div id="table">
    <table class="table table-hover">
      <thead class="thead-light">
	
		<tr>
			<th>Group Id</th>
			<th>Group Name</th>
			<th>Price</th>
			<th>Group Price</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 	foreach ($customerGroups->getData() as $key => $value): ?>
			<?php  $rowStatus = ($value->entityId) ? 'exist':'new'; ?>
				<td><?php echo $value->groupId ?></td>
				<td><?php echo $value->name ?></td>
				<td><?php echo $value->price ?></td>
				<td><?php //echo $value->createdDate ?><input type="text" name="groupPrice[<?php echo $rowStatus; ?>][<?php echo $value->groupId ?>]" value="<?php echo $value->groupPrice ?>"></td>
							
		</tr>
			<?php endforeach;?>
	</tbody>
	</table>
</div>

</form>
</div>
 