
<?php
$tabs = $this->getTabs();


foreach ($tabs as $key => $tab) { ?>
	<a class="btn btn-primary  m-2" onclick="object.setUrl('<?php echo $this->geturl(null,null, ['tab' => $key]); ?>').resetParams().load()"><?php echo $tab['label']; ?></a><br><br>

<?php  } ?>