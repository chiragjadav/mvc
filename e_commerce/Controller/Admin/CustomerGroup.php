<?php 
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');		
class CustomerGroup extends \Controller\Core\Admin
{
	public function __construct()
	{
		parent::__construct();
	}
	public function gridAction()
	{
		try {

			$grid = \Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
			$this->responseGrid($grid);

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function formAction() 
	{
		try {
			$customerGroup =  \Mage::getModel('Model\CustomerGroup');
			if($id = $this->getRequest()->getGet('groupId')) 
			{
				$customerGroup = $customerGroup->load($id);
				if(!$customerGroup)
				{
					throw new \Exception("Record Not Found", 1);
				}
			}
			$form = \Mage::getBlock('Block\Admin\CustomerGroup\Edit')->setTableRow($customerGroup)->toHtml();
			//$leftSide = \Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs')->toHtml();

			$this->responseGrid($form);
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function saveAction() {
		try{
			$session = \Mage::getModel('Model\Admin\Message');
			$customerGroup = \Mage::getModel('Model\CustomerGroup');
			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request..!!  :(");
			}
			date_default_timezone_set("Asia/Calcutta");
			if($groupId = $this->getRequest()->getGet('groupId'))
			{
				$customerGroup->load($groupId);

				if(!$customerGroup)
				{
					throw new Exception("Record Not Found..!!  :(", 1);
				}
				$session->setSuccess('Record Updated Successfully..!! :)');	
			} else {
				$session->setSuccess('Record Inserted Successfully..!! :)');	
			}
			$customerGroup->createdDate = Date("Y-m-d H:i:s");
			$customerGroupData = $this->getRequest()->getPost('customerGroup');		
			$customerGroup->setData($customerGroupData);
			$customerGroup->save();
		}catch(Exception $e) {
			$session->setFailure($e->getMessage());
		}
		$this->gridAction();
	}
	public function deleteAction() {
		try {
			$session = \Mage::getModel('Model\Admin\Message');
			$customerGroup = \Mage::getModel('Model\CustomerGroup');
	        $groupId = $this->getRequest()->getGet('groupId');
	        if(!$groupId)
	        {
	        	throw new Exception("Invalid Request..!!  :(");
	        }
	        $customerGroup = $customerGroup->load($groupId);
	        if(!$customerGroup->delete())
	        {
	        	throw new Exception("Record Not Found..!!  :(", 1);
	        }
	        $session->setSuccess("Request Deleted Successfully..!! :)");
		} catch (Exception $e) {
			 $session->setFailure($e->getMessage());
		}
		$this->gridAction();
	}
}
?>