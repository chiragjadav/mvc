
<?php
$tabs = $this->getTabs();
?>
<?php foreach ($tabs as $key => $tab) { ?>
<hr><a class="btn btn-primary text-white font-weight-bold" onclick="object.setUrl('<?php echo $this->geturl(null,null, ['tab' => $key]); ?>').resetParams().load()" role="tab"><?php echo $tab['label']; ?></a>
	
<?php  } ?>

