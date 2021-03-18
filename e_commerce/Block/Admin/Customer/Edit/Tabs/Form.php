<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Customer\Edit');

class Form extends \Block\Admin\Customer\Edit
{
	// protected $customer = null;
	protected $customerGroups = [];
	function __construct()
	{
		$this->setTemplate('View/Admin/customer/edit/tabs/form.php');		
	}

/*	public function setCustomer($customer = null)
	{
		if($customer)
		{
			$this->customer = $customer;
		}
		$customer =  \Mage::getModel('Model\Customer');
		if($id = $this->getRequest()->getGet('customerId')) 
		{
			$customer = $customer->load($id);
		}
		$this->customer = $customer;
		return $this;
	}
	public function getCustomer()
	{
		if(!$this->customer)
		{
			$this->setCustomer();
		}
		return $this->customer;
	}
	*/
	public function getCustomerGroups() 
	{
		$this->customerGroups = \Mage::getModel('Block\Admin\CustomerGroup\Grid');
        return $this->customerGroups->getCustomerGroups();
	}
}

?>