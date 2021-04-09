<?php
namespace Block\Customer\Layout;
\Mage::loadFileByClassName('Block\Core\Template');
class Head extends \Block\Core\Template
{
	
	public function __construct()
	{
		$this->setTemplate('View/Customer/layout/head.php');
	}
}

?>