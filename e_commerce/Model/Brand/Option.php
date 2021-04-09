<?php
namespace Model\Brand;
\Mage::loadFileByClassName('Model\Attribute\Option');
class Option extends \Model\Attribute\Option
{
	public function getOptions()
	{
		if(!$this->getAttribute()->attributeId)
		{
			return false;
		}
		$optionModel = \Mage::getModel('Model\Brand');
		$query = "SELECT brandId As optionId, name, '$this->getAttribute()->attributeId' As attributeId, sortOrder
		FROM `{$optionModel->getTableName()}`
		ORDER BY `sortOrder` ASC";
		return  $optionModel->fetchAll($query);
	}
}
?>