<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
class Customer extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		$this->setPrimaryKey('customerId');
		$this->setTableName('customer');
	}
	public function getStatusOption() 
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}
	public function getBillingAddress()
	{
		$customerAddress = \Mage::getModel('Model\CustomerAddress');
		$query = "SELECT * FROM `{$customerAddress->getTableName()}` WHERE `customerId`='{$this->customerId}' AND `addressType`='Billing' ";
		$customerAddress = $customerAddress->fetchRow($query);
		if(!$customerAddress)
		{
			return false;
		}
		return $customerAddress;
	}
	public function getShippingAddress()
	{
		$customerAddress = \Mage::getModel('Model\CustomerAddress');
		$query = "SELECT * FROM `{$customerAddress->getTableName()}` WHERE `customerId`='{$this->customerId}' AND `addressType`='Shipping' ";
		$customerAddress = $customerAddress->fetchRow($query);
		if(!$customerAddress)
		{
			return false;
		}
		return $customerAddress;
	}

}
?>