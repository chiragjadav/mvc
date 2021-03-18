<?php 
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');		

class Cms extends \Controller\Core\Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		try {

			$grid = \Mage::getBlock('Block\Admin\Cms\Grid')->toHtml();
			$this->responseGrid($grid);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function formAction() 
	{
		try {
			$cms =  \Mage::getModel('Model\Cms');
			if($id = $this->getRequest()->getGet('pageId')) 
			{
				$cms = $cms->load($id);
				if(!$cms)
				{
					throw new \Exception("Record Not Found", 1);
				}
			}
			$form = \Mage::getBlock('Block\Admin\Cms\Edit')->setTableRow($cms)->toHtml();
			
			$this->responseGrid($form);

		} catch (Exception $e) {
			echo $e->getMessage();
			$this->redirect('grid',null,null,true);	
		}
	}
	public function saveAction() {
		try{
			$session = \Mage::getModel('Model\Admin\Message');
			$cms = \Mage::getModel('Model\Cms');
			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request..!!  :(");
			}
			date_default_timezone_set("Asia/Calcutta");
			

			if($pageId = $this->getRequest()->getGet('pageId'))
			{
				$cms = $cms->load($pageId);
				if(!$cms)
				{
					throw new Exception("Record Not Found..!!  :(", 1);
				}
				$session->setSuccess('Record Updated Successfully..!! :)');	
			} else 
			{
				$cms->createdDate = Date("Y-m-d H:i:s");
				$session->setSuccess('Record Inserted Successfully..!! :)');	
			}
			$cmsData = $this->getRequest()->getPost('cms');
			$cms->setData($cmsData);
			$cms->save();
		
		}catch(Exception $e) {
			$session->setFailure($e->getMessage());
		}
			$this->gridAction();
	}
	public function deleteAction() {
		try {
			$session = \Mage::getModel('Model\Admin\Message');
			$cms = \Mage::getModel('Model\Cms');
	        $pageId = $this->getRequest()->getGet('pageId');
	        if(!$pageId)
	        {
	        	throw new \Exception("Invalid Request..!!  :(");
	        }
	        $cms = $cms->load($pageId);
	        if(!$cms->delete())
	        {
	        	throw new \Exception("Record Not Found..!!  :(", 1);
	        }
	        $session->setSuccess("Request Deleted Successfully..!! :)");
		} catch (\Exception $e) {
			 $session->setFailure($e->getMessage());
		}
	        $this->redirect('grid',null,null,true);	
	}
}

?>