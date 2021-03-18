<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Shipping extends \Controller\Core\Admin {
	
	public function __construct() {
		Parent::__construct();
	}
	public function gridAction() {
		try{
			$grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
			$this->responseGrid($grid);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	   
	}

	public function formAction() {
		try{
			
			$shipping =  \Mage::getModel('Model\Shipping');
			if($id = $this->getRequest()->getGet('shippingId')) 
			{
				$shipping = $shipping->load($id);
				if(!$shipping)
				{
					throw new \Exception("Record Not Found", 1);
				}
			}
			
			$form = \Mage::getBlock('Block\Admin\Shipping\Edit')->setTableRow($shipping)->toHtml();
			$this->responseGrid($form);
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
	public function saveAction() {
		try{
			$session = \Mage::getModel('Model\Admin\Message');
			$shipping = \Mage::getModel('Model\Shipping');
			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request.");
			}
			date_default_timezone_set("Asia/Calcutta");
			
			if($shippingId = $this->getRequest()->getGet('shippingId'))
			{
				$shipping = $shipping->load($shippingId);
				if(!$shipping)
				{
					throw new Exception("Record Not Found", 1);
				}
				$session->setSuccess('Record Updated Successfully..!! :)');	
			} else {
				$session->setSuccess('Record Inserted Successfully..!! :)');
			} 
			$shipping->createdDate = Date("Y-m-d H:i:s");
			$shippingData = $this->getRequest()->getPost('shipping');		
			$shipping->setData($shippingData);
			$shipping->save();
		
		}catch(Exception $e) {
			$session->setFailure($e->getMessage());
		}
		$this->gridAction();
	}
	public function deleteAction() {
		try{
			$session = \Mage::getModel('Model\Admin\Message');
			$shipping = \Mage::getModel('Model\Shipping');
        	$shippingId = $this->getRequest()->getGet('shippingId');
			 if (!$shippingId) {
                throw new Exception("Invalid Request..!! :(");
            }	
			$shipping = $shipping->load($shippingId);	

			if(!$shipping->delete()){
				throw new Exception("Record Not Found..!! :(");	
			}
			$session->setFailure("Request Deleted Successfully..!! :)");
		} catch (Exception $e) {
			$session->setFailure($e->getMessage());	
		}
 
 	$this->gridAction();
	}
}
?>