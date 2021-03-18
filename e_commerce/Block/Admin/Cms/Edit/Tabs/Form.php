<?php
namespace Block\Admin\Cms\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Cms\Edit');

class Form extends \Block\Admin\Cms\Edit
{

	function __construct()
	{
		$this->setTemplate('View/Admin/cms/edit/tabs/form.php');		
	}
}

?>