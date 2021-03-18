<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Category\Edit');

class Media extends \Block\Admin\Category\Edit
{
	
	function __construct()
	{
		$this->setTemplate('View/Admin/category/edit/tabs/media.php');		
	}
}

?>