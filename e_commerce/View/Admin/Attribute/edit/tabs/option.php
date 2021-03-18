<?php $option = $this->getOption();

echo "HEY..!! WELL DONE..!!  :)";
?>
<div class="container-fluid">
 <div class="card">
<div id="table">
<form method="POST" action="<?php echo "{$this->geturl("save")}"; ?>">  
    <a class="btn btn-warning mt-4 float-right" onclick="object.setForm(this).setUrl('<?php echo $this->getUrl('SaveOption') ?>').load()">Update option <i class="fa fa-plus" aria-hidden="true"></i></a>
    <input class="btn btn-success mr-4 mt-4 float-right" type="button" name="addOption" onclick="object.addRow()" value="Add option">

    <table class="table table-hover" id="existingOption">
      <tbody>
        <?php  if(!$option): ?>
          <tr><td>No record found</td></tr>
        <?php else: ?>
        <?php foreach($option->getOptions()->getData() as $key=>$option): ?>
            <tr>
              <td><input type="text" name="exist[<?php echo $option->optionId ?>][name]" value="<?php echo $option->name; ?>"></td>
              <td><input type="text" name="exist[<?php echo $option->optionId ?>][sortOrder]" value="<?php echo $option->sortOrder; ?>"></td>
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
        <td><input type="text" name="new[<?php echo $option->optionId; ?>][name]"></td>
        <td><input type="text" name="new[<?php echo $option->optionId; ?>][sortOrder]"></td>
        <td><input type="button" value="Remove Option" onclick="object.removeRow(this)"></td>
      </tr>
    </tbody>
  </table>
</div>
</form>
</div>
</div>
</div>
<!-- <script type="text/javascript">

  function addRow(button) {
    var newOptionTable = document.getElementById('newOption');
    var existingOptionTable = document.getElementById('existingOption').children[0];

    existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));
  }
  function removeRow(button){
    var objTr = button.parentElement.parentElement;
    objTr.remove();

    
  }

</script> -->