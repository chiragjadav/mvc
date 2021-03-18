<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
class Payment extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		$this->setPrimaryKey('paymentId');
		$this->setTableName('payment');
	}
	public function getStatusOption() 
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}

}
?>