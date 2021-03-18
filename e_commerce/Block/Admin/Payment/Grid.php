<?php
namespace Block\Admin\Payment;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $payments = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/Payment/grid.php');
	}
	public function setPayments($payments=null) 
	{
		try {
			if(!$this->payments)
			{
				$payments =  \Mage::getModel('Model\Payment');
				$this->payments = $payments->fetchAll();	
				
			}
			return $this;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getPayments() 
	{
		if(!$this->payments)
		{
			$this->setPayments();
		}
		return $this->payments;
	}

}
?>