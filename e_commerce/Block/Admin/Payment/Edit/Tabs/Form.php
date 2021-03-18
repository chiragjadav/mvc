<?php
namespace Block\Admin\Payment\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Payment\Edit');

class Form extends \Block\Admin\Payment\Edit
{
	
	function __construct()
	{
		$this->setTemplate('View/Admin/payment/edit/tabs/form.php');		
	}
}