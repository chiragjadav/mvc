<?php
namespace Block\Admin\Shipping;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
 {
	
	
	
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Shipping\Edit\Tabs'));
		//$this->setTemplate('View/Admin/Shipping/edit.php');
	}

	/*public function setShipping($shipping = null)
	{
		if(!$shipping)
		{
			$shipping = \Mage::getModel('Model\Shipping');
		}

		$this->shipping = $shipping;
		return $this;
	}
	public function getShipping()
	{
		if(!$this->shipping)
		{
			$this->setShipping();
		}
		return $this->shipping;
	}
*/
}
?>