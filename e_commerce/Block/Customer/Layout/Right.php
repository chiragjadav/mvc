<?php
namespace Block\Customer\Layout;
\Mage::loadFileByClassName('Block\Core\Template');
class Right extends \Block\Core\Template
{
	
	public function __construct()
	{
		$this->setTemplate('View/Customer/layout/right.php');
	}
}

?>