<?php
namespace Block\Admin\CustomerGroup;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $customerGroups = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/CustomerGroup/grid.php');
	}
	public function setCustomerGroups($customerGroups=null) 
	{
		try {
			if(!$this->customerGroups)
			{
				$customerGroups = \Mage::getModel('Model\CustomerGroup');
				$this->customerGroups = $customerGroups->fetchAll();	
			}
			return $this;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getCustomerGroups() 
	{
		if(!$this->customerGroups)
		{
			$this->setCustomerGroups();
		}
		return $this->customerGroups;
	}

}
?>