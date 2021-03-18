<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Shipping extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	
	public function __construct()	
	{
		$this->setPrimaryKey('shippingId');
		$this->setTableName('shipping');
	}

	public static function getStatusOption()
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}

}
 ?>