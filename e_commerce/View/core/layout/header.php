
  <div>
    
  <nav class="navbar navbar-expand-sm navbar-dark sticky-top " style="background-color: #0a4275;" >
      <a href="#" class="navbar-brand ">
      <img src="logo.PNG" style="width:20%;">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav font-weight-bold ">
           <li class="nav-item">
            <a class="nav-link" href="http://localhost/e_commerce/index.php?c=Admin\index&a=index"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\customer");?>').resetParams().load()"><i class="fas fa-user"></i>Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\customerGroup");?>').resetParams().load()"><i class="fas fa-user-friends"></i>Customer Group</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\configGroup");?>').resetParams().load()"><i class="fas fa-cog"></i>Config Group</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\product");?>').resetParams().load()"><i class="fab fa-product-hunt"></i>Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\attribute");?>').resetParams().load()"><i class="fas fa-filter"></i>Attribute</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\brand");?>').resetParams().load()"><i class="fab fa-bandcamp"></i>Brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid", "Admin\category");?>').resetParams().load()" ><i class="fas fa-adjust"></i>Category</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\shipping");?>').resetParams().load()"><i class="fas fa-shipping-fast"></i>Shipping</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->geturl("grid","Admin\payment");?>').resetParams().load()"><i class="fas fa-credit-card"></i>Payment</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->getUrl("grid","Admin\admin");?>').resetParams().load()"><i class="fas fa-user-plus"></i>Admin</a>
          </li><li class="nav-item">
            <a class="nav-link" onclick="object.setUrl('<?php echo $this->getUrl("grid","Admin\Cms");?>').resetParams().load()"><i class="fas fa-atom"></i>Cms</a>
          </li> 
        </ul>
      </div>  
  </nav>
</div>