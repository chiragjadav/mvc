<?php 
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');		

class Admin extends \Controller\Core\Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		try {

			$grid = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
			$this->responseGrid($grid);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function formAction() 
	{
		try {
			$admin = \Mage::getModel('Model\Admin');
			if($id = $this->getRequest()->getGet('adminId'))
			{
				$admin = $admin->load($id);
				if(!$admin)
				{
					throw new Exception("Record not found", 1);
					
				}
			}

			$form = \Mage::getBlock('Block\Admin\Admin\Edit')->setTableRow($admin)->toHtml();
			
			$this->responseGrid($form);

		} catch (Exception $e) {
			echo $e->getMessage();
			
		}
	}
	public function saveAction() {
		try{
			
			$admin = \Mage::getModel('Model\Admin');
			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request..!!  :(");
			}
			date_default_timezone_set("Asia/Calcutta");
			
			if($adminId = $this->getRequest()->getGet('adminId'))
			{
				$admin = $admin->load($adminId);
				if(!$admin)
				{
					throw new Exception("Record Not Found..!!  :(", 1);
				}
				$this->getMessage()->setSuccess('Record Updated Successfully..!! :)');	
			} else 
			{
				$this->getMessage()->setSuccess('Record Inserted Successfully..!! :)');	
			}
			$admin->createdDate = Date("Y-m-d H:i:s");
			$adminData = $this->getRequest()->getPost('admin');		
			$admin->setData($adminData);
			$admin->save();
		
		}catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
			$this->gridAction();
	}
	public function deleteAction() {
		try {
			
			$admin = \Mage::getModel('Model\Admin');
	        $adminId = $this->getRequest()->getGet('adminId');
	        if(!$adminId)
	        {
	        	throw new Exception("Invalid Request..!!  :(");
	        }
	        $admin = $admin->load($adminId);
	        if(!$admin->delete())
	        {
	        	throw new Exception("Record Not Found..!!  :(", 1);
	        }
	        $this->getMessage()->setSuccess("Request Deleted Successfully..!! :)");
		} catch (Exception $e) {
			 $this->getMessage()->setFailure($e->getMessage());
		}
	        $this->redirect('grid',null,null,true);	
	}
}

?>