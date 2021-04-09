<?php $configration = $this->getConfigration();

// echo "HEY..!! WELL DONE..!!  :)";
?>
<div class="container-fluid">
 <div class="card">
<div id="table">
<form method="POST" action="<?php echo "{$this->geturl("save",'Admin\configration')}"; ?>">  
    <a class="btn btn-warning mt-4 float-right" onclick="object.setForm(this).setUrl('<?php echo $this->getUrl('save','Admin\configGroup\configration'); ?>').load()">Update Configration <i class="fa fa-plus" aria-hidden="true"></i></a>
    <input class="btn btn-success mr-4 mt-4 float-right" type="button" name="addOption" onclick="object.addRow()" value="Add configration">

    <table class="table table-hover" id="existingOption">
      <thead>
        <tr>
          <td>Title</td>
          <td>Code</td>
          <td>Value</td>
        </tr>
      </thead>
      <tbody>
        <?php  if(!$configration): ?>
          <tr><td>No record found</td></tr>
        <?php else: ?>
        <?php foreach($configration->getConfigrations()->getData() as $key=>$configration): ?>
            <tr>
              <td><input type="text" name="exist[<?php echo $configration->configId ?>][title]" value="<?php echo $configration->title; ?>"></td>
              <td><input type="text" name="exist[<?php echo $configration->configId ?>][code]" value="<?php echo $configration->code; ?>"></td>
              <td><input type="text" name="exist[<?php echo $configration->configId ?>][value]" value="<?php echo $configration->value; ?>"></td>
              <td><input type="button"  value="Remove Option" onclick="object.removeRow(this)"></td>

            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  <div style="display: none;" id="table">
  <table class="table table-hover" id="newOption">
    <tbody>
      <tr>
        <td><input type="text" name="new[title][]"></td>
        <td><input type="text" name="new[code][]"></td>
        <td><input type="text" name="new[value][]"></td>
        <td><input type="button" value="Remove Option" onclick="object.removeRow(this)"></td>
      </tr>
    </tbody>
  </table>
</div>
</form>
</div>
</div>
</div>