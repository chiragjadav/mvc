<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
class Category extends \Controller\Core\Admin {
	public function __construct() {	
		parent::__construct();
	}
	public function indexAction()
	{
		$this->renderLayout();
	}
	public function gridAction() {
			$grid = \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
			
			$this->responseGrid($grid);
	}

	public function formAction() {
		try {


			$category =  \Mage::getModel('Model\Category');
			if($id = $this->getRequest()->getGet('categoryId')) 
			{
				$category = $category->load($id);
				if(!$category)
				{
					throw new \Exception("Record Not Found", 1);
				}
			}

			$form = \Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($category)->toHtml();
			//$leftSide = \Mage::getBlock('Block\Admin\Category\Edit\Tabs')->toHtml();	
			$this->responseGrid($form);
				
		} catch (\Exception $e) {
			 echo $e->getMessage();
		}
	}
	public function saveAction() {
		try{
			
			$category = \Mage::getModel('Model\Category');
			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request.");
			}
			date_default_timezone_set("Asia/Calcutta");
			if($categoryId = $this->getRequest()->getGet('categoryId'))
			{
				$category->load($categoryId);
				$pathId = $category->pathId;
				if(!$category)
				{
					throw new Exception("Record Not Found", 1);
				}
				$this->getMessage()->setSuccess('Record Updated Successfully..!! :)');	

				$categoryData = $this->getRequest()->getPost('category');		
				$category->setData($categoryData);
				$pathId = $category->pathId;
				$category->updatePathId();
				$category->updateChildrenPathIds($pathId);

			}  else {
				$this->getMessage()->setSuccess('Record Inserted Successfully..!! :)');
				$categoryData = $this->getRequest()->getPost('category');		
			
				$category->setData($categoryData);
				$id = $category->save();
				$category->load($id);
				$category->updatePathId();
			}

		}catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$this->gridAction();
	}
	public function deleteAction() {
		try {
			
			$category = \Mage::getModel('Model\Category');
	        $categoryId = $this->getRequest()->getGet('categoryId');
	        if(!$categoryId)
	        {
	        	throw new Exception("Error Processing Request");
	        }
	        $category->load($categoryId);
	        $parentId = $category->parentId;
			$pathId = $category->pathId;	
			$category->updateChildrenPathIds($pathId,$parentId,$categoryId);
	        if(!$category->delete()){
	        	throw new Exception("Record Not Fountd");	
	        }
			$this->gridAction();
		} catch (Exception $e) {
			 $this->getMessage()->setFailure($e->getMessage());
		}
	}
	
}
?>