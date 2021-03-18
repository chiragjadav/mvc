<?php
namespace Block\Admin\CustomerGroup;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	
	// protected $customerGroup = null;
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs'));
		//$this->setTemplate('View/Admin/customerGroup/edit.php');
	}
	/*public function getTabContent()
	{
		$tabBlock = \Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs');
		$tabs = $tabBlock->getTabs(); 

		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());

		if(!array_key_exists($tab, $tabs))
		{
			return null;
		}

		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
		
	}
	public function setCustomerGroup($customerGroup = null)
	{
		if(!$customerGroup)
		{
			$customerGroup = \Mage::getModel('Model\CustomerGroup');
		}
		$this->customerGroup = $customerGroup;
		return $this;
	}
	public function getCustomerGroup()
	{
		if(!$this->customerGroup)
		{
			$this->setCustomerGroup();
		}
		return $this->customerGroup;
	}
	public function getFormUrl()
	{
		return $this->getModelUrl()->getUrl('save',null);
	}*/
}
?>