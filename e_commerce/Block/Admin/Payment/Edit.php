<?php
namespace Block\Admin\Payment;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Payment\Edit\Tabs'));

		//$this->setTemplate('View/Admin/payment/edit.php');
	}

	/*public function setPayment($payment = null)
	{
		if($payment)
		{
			$this->payment = $payment;
		}
		$payment =  \Mage::getModel('Model\Payment');
		if($id = $this->getRequest()->getGet('paymentId')) 
		{
			$payment = $payment->load($id);
		}
		$this->payment = $payment;
		return $this;
	}
	public function getPayment()
	{
		if(!$this->payment)
		{
			$this->setPayment();
		}
		return $this->payment;
	}
	public function getFormUrl()
	{
		return $this->getModelUrl()->getUrl('save',null);
	}*/
}
?>