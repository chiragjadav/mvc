<?php 
namespace Controller\Admin;

class ConfigGroup extends \Controller\Core\Admin
{
	public function gridAction()
	{
		try {
			$block = \Mage::getBlock('Block\Admin\ConfigGroup\Grid')->toHtml();
			$this->responseGrid($block);	

		} catch (\Exception $e) {
			
		}
	}
	public function formAction()
	{
		try {
			
			$configGroup =  \Mage::getModel('Model\Config\Group');
			if($id = $this->getRequest()->getGet('groupId')) 
			{
				$configGroup = $configGroup->load($id);
				if(!$configGroup)
				{
					throw new \Exception("Record Not Found", 1);
				}
			}
			
			$form = \Mage::getBlock('Block\Admin\ConfigGroup\Edit')->setTableRow($configGroup)->toHtml();
			$this->responseGrid($form);
		} catch (\Exception $e) {
			
		}
	}

	public function saveAction()
	{
		try {
			$configGroup = \Mage::getModel('Model\Config\Group');
			if(!$this->getRequest()->isPost())	
			{
				throw new \Exception("Invalid Request", 1);
			}
			date_default_timezone_set("Asia/Calcutta");
			if($configGroupId = $this->getRequest()->getGet('groupId'))
			{
				$configGroup = $configGroup->load($configGroupId);
				if(!$configGroup)
				{
					throw new \Exception("Record not found .. :(", 1);
					
				}
				$this->getMessage()->setSuccess('Recored updated successfully :)');
			} else {
				$this->getMessage()->setSuccess('Record Inserted successfully');
			}	
			$configGroup->createdDate = Date("Y-m-d H:i:s");
			$configGroupName = $this->getRequest()->getPost('configGroup');
			$configGroup->name = $configGroupName ;
			$configGroup->save();
			$this->gridAction();
		} catch (\Exception $e) {
			
		}
		
	}
}
?>