<?php
namespace Controller\Admin\Attribute;
\Mage::loadFileByClassName('Controller\Core\Admin');
class Option extends \Controller\Core\Admin
{
/*	public function optionAction()
	{
		$attribute = \Mage::getModel('Model\Attribute');
		$attributeId = $this->getRequest()->getGet('attributeId');
		$attribute->load($attributeId);

		$optionGrid = \Mage::getBlock('Block\Admin\Attribute\Option\Grid')->setAttribute($attribute)->toHtml();
		
		$this->responseGrid($optionGrid);
	}*/

	public function saveAction()
	{
		
		$attributeId = $this->getRequest()->getGet('attributeId');
		$optionData = $this->getRequest()->getPost();
		$newData = $this->getRequest()->getPost('new');
		
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
		if($newData){
            for ($i=0; $i < sizeof($newData['name'])-1; $i++) {
                $data = array_column($newData,$i);
                $option = \Mage::getModel('Model\Attribute\Option');
                $option->name = $data[0];
                $option->sortOrder = $data[1];
                $option->attributeId = $attributeId;
                $option->save();
            }
        }



		/*foreach ($optionData['new'] as $attributeId => $option) {
			$attributeOption = \Mage::getModel('Model\Attribute\Option');
			$attributeOption->attributeId = $attributeId;
			$attributeOption->name = $option['name'];
			$attributeOption->sortOrder = $option['sortOrder'];
			$attributeOption->save();
		}*/

		/*$grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
		$this->responseGrid($grid);*/
	}

	public function deleteOptionAction()
	{
		echo "wow";
	}
}
?>