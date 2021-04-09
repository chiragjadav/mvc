<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
class Attribute extends \Model\Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		$this->setPrimaryKey('attributeId');
		$this->setTableName('attribute');
	}
	public function getStatusOption() 
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}
	public function getEntityTypeOptions()
	{
		return [
			'product' => 'Product',
			'category' => 'Category'
		];
	}
	public function getBackendTypeOptions()
	{
		return [
			'varchar' => 'Varcar',
			'int' => 'Int',
			'decimal' => 'Decimal',
			'text' => 'Text'
		];
	}
	public function getInputTypeOptions()
	{
		return [
			'text' => 'Text Box',
			'textarea' => 'Text Area',
			'select' => 'Select',
			'checkbox' => 'Checkbox',
			'radio' => 'Radio'
		];
	}
	public function getOptions() 
	{
		if(!$this->attributeId)
		{
			return false;
		}
		 $optionModel = \Mage::getModel($this->backendModel);
		// $query = "SELECT * FROM `{$optionModel->getTableName()}`
		// WHERE `{$this->getPrimaryKey()}`='{$this->attributeId}'
		// ORDER BY `sortOrder` ASC";
		 return  $optionModel->setAttribute($this)->getOptions();
	}
}
?>