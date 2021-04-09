
<div id="left">
	<nav class="navbar">
    <ul class="navbar-nav mr-auto">

<?php foreach ($this->getChildren() as $child) { ?>
      <li class="nav-item active">
  			<?php echo $child->toHtml(); } ?>
      </li>
    </ul>
</nav>

</div>

