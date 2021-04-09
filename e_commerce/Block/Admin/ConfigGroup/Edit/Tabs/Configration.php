<?php
namespace Block\Admin\ConfigGroup\Edit\Tabs;

class Configration extends \Block\Admin\ConfigGroup\Edit
{

	protected $configration = null;
	public function __construct()
	{
		$this->setTemplate('View/Admin/configGroup/edit/tabs/configration.php');		
	}
	public function setConfigration($configration = null)
	{
		if(!$configration)
		{
			$groupId = $this->getRequest()->getGet('groupId');
			$configration = \Mage::getModel('Model\Config\Group')->load($groupId);
		}
		$this->configration = $configration;
		return $this;
	}
	public function getConfigration() 
	{
		if(!$this->configration)
		{
			$this->setConfigration();
		}
		return $this->configration;
	}
	
}
?>