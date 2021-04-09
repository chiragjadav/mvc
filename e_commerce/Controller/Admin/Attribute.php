<?php 
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');		

class Attribute extends \Controller\Core\Admin
{
	public function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		try {
			$grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
			$this->responseGrid($grid);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function formAction() 
	{
		try {
			$attribute =  \Mage::getModel('Model\Attribute');
			if($id = $this->getRequest()->getGet('attributeId')) 
			{
				$attribute = $attribute->load($id);
				if(!$attribute)
				{
					throw new \Exception("Record Not Found", 1);
				}
			}
			
			$form = \Mage::getBlock('Block\Admin\Attribute\Edit')->setTableRow($attribute)->toHtml();
			//$leftSide = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs')->toHtml();
			$this->responseGrid($form);

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	public function saveAction() {
		try{
			
			$attribute = \Mage::getModel('Model\Attribute');
			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request..!!  :(");
			}
			date_default_timezone_set("Asia/Calcutta");
			
			if($attributeId = $this->getRequest()->getGet('attributeId'))
			{
				$attribute = $attribute->load($attributeId);
				if(!$attribute)
				{
					throw new Exception("Record Not Found..!!  :(", 1);
				}
				$this->getMessage()->setSuccess('Record Updated Successfully..!! :)');	
				$attributeData = $this->getRequest()->getPost('attribute');
				$attribute->setData($attributeData);
			} else 
			{
				$this->getMessage()->setSuccess('Record Inserted Successfully..!! :)');	
				$attributeData = $this->getRequest()->getPost('attribute');
				$attribute->setData($attributeData);
				$table = $attribute->entityTypeId;			
				$adapter = \Mage::getModel('Model\Attribute')->getAdapter();
				$query = "ALTER TABLE `{$table}` ADD `{$attribute->code}` $attribute->backendType(20);";
				$adapter->update($query);
			}
			$attribute->save();
			
		}catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$this->gridAction();
	}
	public function deleteAction() {
		try{
			
			$attribute = \Mage::getModel('Model\Attribute');
        	$attributeId = $this->getRequest()->getGet('attributeId');
			 if (!$attributeId) {
                throw new Exception("Invalid Request..!! :(");
            }	
			$attribute = $attribute->load($attributeId);	

			if(!$attribute->delete()){
				throw new Exception("Record Not Found..!! :(");	
			}
			$this->getMessage()->setFailure("Request Deleted Successfully..!! :)");
		} catch (Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());	
		}
 
 	$this->gridAction();
	}
	public function filterAction()
	{
		try {
			$filters = $this->getRequest()->getPost('filters');
			$filterModel = \Mage::getModel('Model\Admin\Filter');
			$filterModel->setFilters($filters);	
			$this->getMessage()->setSuccess('Record Updated Successfully..!! :)');
		} catch (Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());	
		}
		$this->gridAction();
	}

	public function testAction()
	{
		try {
			echo "<pre>";
			$query = "SELECT * FROM `attribute` WHERE `entityTypeId` = 'product'";
			$attributes = \Mage::getModel('Model\Attribute')->fetchAll($query);
			//print_r($attributes);

			foreach ($attributes->getData() as $key => $attribute) {
				//Method 1: /*$options = \Mage::getModel($attribute->backendModel)->setAttribute($attribute)->getOptions(); */
				print_r($attribute->getOptions());
			}

		} catch (Exception $e) {
			
		}
	}
	
}