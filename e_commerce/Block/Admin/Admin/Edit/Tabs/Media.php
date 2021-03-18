<?php
namespace Block\Admin\Admin\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Admin\Edit');

class Media extends \Block\Admin\Admin\Edit
{
	function __construct()
	{
		$this->setTemplate('View/Admin/admin/edit/tabs/media.php');		
	}
}

?>