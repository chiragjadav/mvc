<?php
namespace Block\Admin\Customer;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $customers = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/Customer/grid.php');
	}
	public function setCustomers($customers=null) 
	{
		if(!$this->customers)
		{
			$query = "SELECT c.`customerId`, c.`fName`, c.`lName`, c.`email`, c.`password`, c.`status`, cg.`name`, ca.`zipcode` 
            FROM customer c 
                LEFT JOIN customer_group cg 
                    ON c.`groupId` = cg.`groupId`
                LEFT JOIN customer_address ca 
                    ON c.`customerId` = ca.`customerId` AND ca.addressType = 'Billing'";
			$customers =  \Mage::getModel('Model\Customer');
			$this->customers = $customers->fetchAll($query);	
				}
		return $this;
	}
	public function getCustomers() 
	{
		if(!$this->customers)
		{
			$this->setCustomers();
		}
		return $this->customers;
	}

}
?>