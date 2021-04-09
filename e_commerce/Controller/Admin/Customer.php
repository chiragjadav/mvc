<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Customer extends \Controller\Core\Admin {

	public function __construct() {
		
		Parent::__construct();
	}
	public function gridAction() {
		try {

			$grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
			$this->responseGrid($grid);

		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}		
	}
	public function formAction() {
		try {
			$customer =  \Mage::getModel('Model\Customer');
			if($id = $this->getRequest()->getGet('customerId')) 
			{
				$customer = $customer->load($id);
				if(!$customer)
				{
					throw new \Exception("Record Not Found", 1);
				}
			}
			
			$form = \Mage::getBlock('Block\Admin\Customer\Edit')->setTableRow($customer)->toHtml();
			//$leftSide = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs')->toHtml();

			$this->responseGrid($form);

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	
	}
	public function saveAction() {
		try{

			$customer = \Mage::getModel('Model\Customer');

			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request.");
			}
			date_default_timezone_set("Asia/Calcutta");

			if($customerId = $this->getRequest()->getGet('customerId'))
			{
				/*print_r($customersId)
				die();*/
				$tab = $this->getRequest()->getGet('tab');
			
					if($tab == 'address')
					{
						$customer = $customer->load($customerId); 
						if(!$customer)
						{
							throw new Exception("Record Not Found", 1);
						}
						$addressBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\Address')->setTableRow($customer);

						$billingData = $this->getRequest()->getPost('billing');
						$shippingData = $this->getRequest()->getPost('shipping');
							

							$address = $addressBlock->getBilling();
							$address->setData($billingData);
							$address->customerId = $customerId;
							$address->addressType = 'Billing';	
							$address->save();
						
							$address = $addressBlock->getShipping();
							$address->setData($shippingData);
							$address->addressType = 'Shipping';			
							$address->customerId = $customerId;
							$address->save();
							
					} else {
						$customer = $customer->load($customerId); 
						if(!$customer)
						{
							throw new Exception("Record Not Found", 1);
						}	
						$this->getMessage()->setSuccess('Record Updated Successfully..!! :)');
						$customerData = $this->getRequest()->getPost('customer');		
						$customer->setData($customerData);
						$customer->save();
					}
			}
			else {
				$customer->createdDate = Date("Y-m-d H:i:s");
				$customer->updatedDate = Date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Record Inserted Successfully..!! :)');
				$customerData = $this->getRequest()->getPost('customer');		
				$customer->setData($customerData);
				$customer->save();
			} 
		$this->gridAction();
			
		}catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}
	public function deleteAction() {
		try {
			$session = \Mage::getModel('Model\Admin\Message');
	       	$customer = \Mage::getModel('Model\Customer');
	        $customerId = $this->getRequest()->getGet('customerId');
	        if(!$customerId) {
	        	throw new Exception("Invalid Request..!! :(", 1);
	        	
	        }
	        // $CustomerAddress = \Mage::getModel('Model\CustomerAddress');
	        // $CustomerAddress->deleteCustomerAddress($customerId);
	        $customer->load($customerId);	

			if(!$customer->delete()){
				throw new \Exception("Record Not Found..!! :(");	
			}
			$session->setFailure("Request Deleted Successfully..!! :)");
	       	
		} catch (Exception $e) {
			$session->setFailure($e->getMessage());
		}
		$this->gridAction();	   
	}
}
?>