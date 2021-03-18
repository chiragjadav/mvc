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


	public function optionAction()
	{
		$attribute = \Mage::getModel('Model\Attribute');
		$attributeId = $this->getRequest()->getGet('attributeId');
		$attribute->load($attributeId);

		$optionGrid = \Mage::getBlock('Block\Admin\Attribute\Option\Grid')->setAttribute($attribute)->toHtml();
		
		$this->responseGrid($optionGrid);
	}

	public function saveOptionAction()
	{
		
		$attributeId = $this->getRequest()->getGet('attributeId');
		$optionData = $this->getRequest()->getPost();
		
		foreach ($optionData['exist'] as $optionId => $option) {
			$query = "SELECT * FROM attribute_option
			WHERE `attributeId` = '$attributeId'
			AND `optionId` = '$optionId'";

			$attributeOption = \Mage::getModel('Model\Attribute\Option');
			$attributeOption->fetchRow($query);
			$attributeOption->name = $option['name'];
			$attributeOption->sortOrder = $option['sortOrder'];
			$attributeOption->save();
		}
		foreach ($optionData['new'] as $attributeId => $option) {
			$attributeOption = \Mage::getModel('Model\Attribute\Option');
			$attributeOption->attributeId = $attributeId;
			$attributeOption->name = $option['name'];
			$attributeOption->sortOrder = $option['sortOrder'];
			$attributeOption->save();
		}
		$this->redirect('grid');
	}

	public function saveAction() {
		try{
			$session = \Mage::getModel('Model\Admin\Message');
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
				$session->setSuccess('Record Updated Successfully..!! :)');	
				$attributeData = $this->getRequest()->getPost('attribute');
				$attribute->setData($attributeData);
			} else 
			{
				$session->setSuccess('Record Inserted Successfully..!! :)');	
				$attributeData = $this->getRequest()->getPost('attribute');
				$attribute->setData($attributeData);
				$table = $attribute->entityTypeId;			
				$adapter = \Mage::getModel('Model\Attribute')->getAdapter();
				echo $query = "ALTER TABLE `{$table}` ADD `{$attribute->code}` $attribute->backendType(20);";
				$adapter->update($query);
			}
			$attribute->save();
			
		}catch(Exception $e) {
			$session->setFailure($e->getMessage());
		}
		$this->gridAction();
	}
	public function deleteAction() {
		try{
			$session = \Mage::getModel('Model\Admin\Message');
			$attribute = \Mage::getModel('Model\Attribute');
        	$attributeId = $this->getRequest()->getGet('attributeId');
			 if (!$attributeId) {
                throw new Exception("Invalid Request..!! :(");
            }	
			$attribute = $attribute->load($attributeId);	

			if(!$attribute->delete()){
				throw new Exception("Record Not Found..!! :(");	
			}
			$session->setFailure("Request Deleted Successfully..!! :)");
		} catch (Exception $e) {
			$session->setFailure($e->getMessage());	
		}
 
 	$this->gridAction();
	}
	public function deleteOptionAction()
	{
		echo "wow";
	}
	
}