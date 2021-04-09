
  <div>
    
  <nav class="navbar navbar-expand-sm navbar-dark sticky-top " style="background-color: #0a4275;" >
      <a href="#" class="navbar-brand ">
      <img src="logo.PNG" style="width:20%;">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
           <li class="nav-item">
            <a class="nav-link" href="http://localhost/e_commerce/index.php?c=Admin\index&a=index">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\customer");?>').resetParams().load()">Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\customerGroup");?>').resetParams().load()">Customer Group</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\product");?>').resetParams().load()">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\attribute");?>').resetParams().load()">Attribute</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid", "Admin\category");?>').resetParams().load()" >Category</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\shipping");?>').resetParams().load()">Shipping</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\payment");?>').resetParams().load()">Payment</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->getUrl("grid","Admin\admin");?>').resetParams().load()">Admin</a>
          </li><li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->getUrl("grid","Admin\Cms");?>').resetParams().load()">Cms</a>
          </li> 
        </ul>
      </div>  
  </nav>
</div>