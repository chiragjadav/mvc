<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
class CustomerAddress extends Core\Table
{
	const BILLING_ADDRESS = 'Billing Address';
	const SHIPPING_ADDRESS = 'Shipping Address';
	function __construct()
	{
		$this->setPrimaryKey('addressId');
		$this->setTableName('customer_address');
	}
	public function getAddressOption() 
	{
		return [
			self::BILLING_ADDRESS => 'Billing Address',
			self::SHIPPING_ADDRESS => 'Shipping Address'
		];
	}
	public function deleteCustomerAddress($id)
	{
		$query = "SELECT * FROM {$this->getTableName()} WHERE `customerId` = {$id}; ";
		$address = $this->fetchAll($query);
		{
			foreach ($address->getData() as $address) {
				if($address->addressType == 'Billing'){
					$this->load($address->addressId);
					$this->delete();						
				}if($address->addressType == 'Shipping'){
					 $this->load($address->addressId);
					$this->delete();						
				}
			}
		}
		return $this;
	}
}
?>