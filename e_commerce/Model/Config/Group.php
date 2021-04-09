<?php 
namespace Model\Config;

class Group extends \Model\Core\Table
{
	public function __construct()
	{
		$this->setTableName('config_group')->setPrimaryKey('groupId');		
	}
	public function getConfigrations()
	{
		$configration = \Mage::getModel('Model\configration');
		$query = "SELECT * FROM `{$configration->getTableName()}` WHERE `groupId` = '{$this->groupId}'";
		$configration = $configration->fetchAll($query);
		if(!$configration)
		{
			return \Mage::getModel('Model\configration');
		}
		return $configration;
	}
}
?>