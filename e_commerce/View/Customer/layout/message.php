<div id="messageHtml">

<?php 

  if($success = $this->getMessage()->getSuccess()){
    ?>
    <div class="alert alert-success m-2 col-4 alert-dismissible" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $success; $this->getMessage()->unset('success'); ?>
    </div> 
 
  <?php  } else if ($failure = $this->getMessage()->getFailure()){ ?>
    <div class="alert alert-danger m-2 col-4 alert-dismissible"  role="alert">
    	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $failure; $this->getMessage()->unset('failure'); ?>
    </div>
<?php } ?>
</div>