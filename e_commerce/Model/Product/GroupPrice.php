<?php
namespace Model\Product;
\Mage::loadFileByClassName('Model\Core\Table');

class GroupPrice extends \Model\Core\Table{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	public function __construct() {

		$this->setPrimaryKey('entityId');
		$this->setTableName('product_group_price');
	}

	public function getStatusOption() {
		return [
			self::STATUS_DISABLED => 'Disable',
			self::STATUS_ENABLED => 'Enable'
		];
	}

}
	
?>