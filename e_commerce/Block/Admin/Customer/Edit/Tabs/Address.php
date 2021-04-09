<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Customer\Edit');

class Address extends \Block\Admin\Customer\Edit
{
	protected $address = null;
	protected $billing = null; 
	protected $shipping = null;
	function __construct()
	{
		$this->setTemplate('View/Admin/customer/edit/tabs/address.php');		
	}

	public function setAddress($address = null)
	{
		if($address)
		{
			$this->address = $address;
			return $this;
		}
		$address =  \Mage::getModel('Model\CustomerAddress');
		$this->billing = $address;
		$this->shipping = $address;
		if($id =  $this->getTableRow()->customerId) 
		{
			$query = "SELECT * FROM {$address->getTableName()} WHERE `customerId` = {$id}; ";
			$address = $address->fetchAll($query);
			$this->address = $address;
	
			if($address)
			{

				foreach ($address->getData() as $key => $value) {
					
					if($value->addressType == 'Billing'){
						$this->billing = $value;						
					}if($value->addressType == 'Shipping'){
						$this->shipping = $value;
					}
				}
			
			}
		}
		return $this;
	}
	public function getBilling()
	{
	
		if(!$this->billing)
		{
			$this->setAddress();
		}		
	   return $this->billing;
	}
	public function getShipping()
	{
		//echo "<pre>";
		if(!$this->shipping)
		{
			$this->setAddress();
		}
		 return $this->shipping;
	}
	public function getAddress()
	{
		if(!$this->address)
		{
			$this->setAddress();
		}
		return $this->address;
	}
}

?>