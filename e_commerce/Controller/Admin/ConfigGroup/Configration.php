<?php 
namespace Controller\Admin\ConfigGroup;

class Configration extends \Controller\Core\Admin
{
	
	public function saveAction()
	{
		$groupId = $this->getRequest()->getGet('groupId');
		$configData = $this->getRequest()->getPost();
		$newData = $this->getRequest()->getPost('new');

		foreach ($configData['exist'] as $configId => $config) {
			$query = "SELECT * FROM config
			WHERE `groupId` = '$groupId'
			AND `configId` = '$configId'";

			$configration = \Mage::getModel('Model\Configration');
			$configration = $configration->fetchRow($query);
			$configration->title = $config['title'];
			$configration->code = $config['code'];
			$configration->value = $config['value'];
			$configration->save();
		}
		if($newData){
            for ($i=0; $i < sizeof($newData['title'])-1; $i++) {
                $data = array_column($newData,$i);
                $configration = \Mage::getModel('Model\Configration');
                $configration->title = $data[0];
                $configration->code = $data[1];
                $configration->value = $data[2];
                $configration->groupId = $groupId;
              	$configration->save();
            }
        }
	}
}

?>