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
		} catch (\Exception $e) {
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
				$this->getMessage()->setSuccess('Record Updated Successfully..!! :)');	
			} else {
				$this->getMessage()->setSuccess('Record Inserted Successfully..!! :)');
			} 
			$shipping->createdDate = Date("Y-m-d H:i:s");
			$shippingData = $this->getRequest()->getPost('shipping');		
			$shipping->setData($shippingData);
			$shipping->save();

			$grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
			$this->responseGrid($grid);

		}catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		
	}
	public function deleteAction() {
		try{
			
			$shipping = \Mage::getModel('Model\Shipping');
        	$shippingId = $this->getRequest()->getGet('shippingId');
			 if (!$shippingId) {
                throw new \Exception("Invalid Request..!! :(");
            }	
			$shipping = $shipping->load($shippingId);	

			if(!$shipping->delete()){
				throw new \Exception("Record Not Found..!! :(");	
			}
			$this->getMessage()->setFailure("Request Deleted Successfully..!! :)");
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());	
		}
 
 	$this->gridAction();
	}
	public function testAction()
	{
		$query = "SELECT * FROM `shipping` WHERE `shippingId`='1'";
		$shipping = \Mage::getModel('Model\Shipping')->fetchRow($query);
		echo "<pre>";
	//	print_r($shipping->shippingId = '123');
		print_r($shipping);
	}
}

?>