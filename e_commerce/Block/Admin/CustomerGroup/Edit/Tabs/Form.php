<?php
namespace Block\Admin\CustomerGroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\CustomerGroup\Edit');
class Form extends \Block\Admin\CustomerGroup\Edit
{
	
	function __construct()
	{
		$this->setTemplate('View/Admin/customerGroup/edit/tabs/form.php');		
	}
	// public function setCustomerGroup($customerGroup = null) 
	// {
	// 	if($customerGroup)
	// 	{
	// 		$this->customerGroup = $customerGroup;
	// 	}
	// 	$customerGroup =  \Mage::getModel('Model\CustomerGroup');
	// 	if($id = $this->getRequest()->getGet('groupId')) 
	// 	{
	// 		$customerGroup = $customerGroup->load($id);
	// 	}
	// 	$this->customerGroup = $customerGroup;
	// 	return $this;
	// }
	// public function getCustomerGroup() 
	// {
	// 	if(!$this->customerGroup) 
	// 	{
	// 		$this->setCustomerGroup();
	// 	}
	// 	return $this->customerGroup;
	// }
}
?>