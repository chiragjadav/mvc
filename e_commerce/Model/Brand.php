<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
class Brand extends Core\Table
{
	
	function __construct()
	{
		$this->setPrimaryKey('brandId');
		$this->setTableName('brand');
	}
	

}
?>