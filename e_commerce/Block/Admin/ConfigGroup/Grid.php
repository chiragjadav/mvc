<?php
namespace Block\Admin\ConfigGroup;

class Grid extends \Block\Core\Template
{

	public function __construct()
	{
		$this->setTemplate('View/Admin/ConfigGroup/grid.php');
	}
	public function getTitle()
	{
		return "Config Group";
	}
	public function getConfigGroups()
	{
		return $configGroup = \Mage::getModel('Model\Config\Group')->fetchAll();
	}
	
}