<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

class Product extends Core\Table{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	public function __construct() {

		$this->setPrimaryKey('productId');
		$this->setTableName('product');
	}

	public function getStatusOption() {
		return [
			self::STATUS_DISABLED => 'Disable',
			self::STATUS_ENABLED => 'Enable'
		];
	}

}
	
?>