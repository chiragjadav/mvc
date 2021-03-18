<?php
namespace Block\Admin\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Shipping\Edit');

class Form extends \Block\Admin\Shipping\Edit
{
	
	function __construct()
	{
		$this->setTemplate('View/Admin/shipping/edit/tabs/form.php');		
	}

	/*public function setShipping($shipping = null) 
	{
		if($shipping)
		{
			$this->shipping = $shipping;
		}
		$shipping =  \Mage::getModel('Model\Shipping');
		if($id = $this->getRequest()->getGet('shippingId')) 
		{
			$shipping = $shipping->load($id);
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
	}*/
}

?>