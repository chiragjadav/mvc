<div id="messageHtml">

<?php $session = Mage::getModel('Model_Admin_Message'); 

  if($session->getSuccess()){
    ?>
    <div class="alert alert-success col-4 alert-dismissible" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $session->getSuccess(); $session->unset('success'); ?>
    </div> 
 
  <?php } else if ($session->getFailure()){ ?>
    <div class="alert alert-danger col-4 alert-dismissible"  role="alert">
    	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $session->getFailure(); $session->unset('failure'); ?>
    </div>
<?php } ?>
</div>