<?php
namespace Model\Attribute;
\Mage::loadFileByClassName('Model\Core\Table');
class Option extends \Model\Core\Table
{
	protected $attribute = null;
	public function __construct()
	{
		$this->setPrimaryKey('optionId');
		$this->setTableName('attribute_option');
	}
	public function setAttribute(\Model\Attribute $attribute)
	{
		$this->attribute = $attribute;
		return $this;
	}
	public function getAttribute()
	{
		return $this->attribute;
	}
	public function getOptions()
	{
		if(!$this->getAttribute()->attributeId)
		{
			return null;
		}

		$query = "SELECT * FROM `attribute_option`
		WHERE `attributeId`='{$this->getAttribute()->attributeId}'
		ORDER BY `sortOrder` ASC";
		return $this->fetchAll($query);
		//return $this->getAttribute()->getOptions();
	}
}
?>