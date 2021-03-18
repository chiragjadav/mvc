<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Payment extends \Controller\Core\Admin {

	public function __construct() {
		
		Parent::__construct();
	}
	public function gridAction() {
		try {
			$grid = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
			$this->responseGrid($grid);
		} catch (Exception $e) {
			echo $e->getMessage();
			$this->redirect('grid',null,null,true);	
		}
	}

	public function formAction() {
		try {
			$payment =  \Mage::getModel('Model\Payment');
			if($id = $this->getRequest()->getGet('paymentId')) 
			{
				$payment = $payment->load($id);
				if(!$payment)
				{
					throw new \Exception("Record Not Found", 1);
				}
			}
			$form = \Mage::getBlock('Block\Admin\Payment\Edit')->setTableRow($payment)->toHtml();
			$this->responseGrid($form);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function saveAction() {
		try{
			$payment = \Mage::getModel('Model\Payment');
			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request.");
			}
			date_default_timezone_set("Asia/Calcutta");
			
			if($paymentId = $this->getRequest()->getGet('paymentId'))
			{
				$payment->load($paymentId);

				if(!$payment)
				{
					throw new Exception("Record Not Found", 1);
				}	
			} 
			$payment->createdDate = Date("Y-m-d H:i:s");
			$paymentData = $this->getRequest()->getPost('payment');		
			$payment->setData($paymentData);
			$payment->save();
			$this->redirect('grid',null,null,true);
		
		}catch(Exception $e) {
			echo $e->getMessage();
			die();
		}
	}
	public function deleteAction() {
       try {
			$session = \Mage::getModel('Model\Admin\Message');
			$payment = \Mage::getModel('Model\Payment');
	        $paymentId = $this->getRequest()->getGet('paymentId');
	        if(!$paymentId)
	        {
	        	throw new Exception("Invalid Request..!!  :(");
	        }
	        $payment = $payment->load($paymentId);
	        if(!$payment->delete())
	        {
	        	throw new Exception("Record Not Found..!!  :(", 1);
	        }
	        $session->setSuccess("Request Deleted Successfully..!! :)");
		} catch (Exception $e) {
			 $session->setFailure($e->getMessage());
		}
	        $this->redirect('grid',null,null,true);	
	}
}
?>