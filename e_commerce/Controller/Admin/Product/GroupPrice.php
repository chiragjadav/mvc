<?php 
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');
class GroupPrice extends \Controller\Core\Admin {
	public function indexAction()
	{
		try {
			$productId = (int)$this->getRequest()->getGet('productId');
			$product = \Mage::getModel('Model\Product')->load($productId);
			if(!$product)
			{
				throw new Exception("Record Not Found", 1);
			}			
			$grid= \Mage::getBlock('Block\Admin\Product\Edit\Tabs\GroupPrice')->setProduct($product)->toHtml();
			$this->responseGrid($grid);
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function saveAction()
	{
		$groupData = $this->getRequest()->getPost('groupPrice');
		$productId = $this->getRequest()->getGet('productId');

		if(array_key_exists('exist',$groupData))
		{
			foreach ($groupData['exist'] as $groupId => $price) {
	     	$query = "SELECT * FROM product_group_price 
			WHERE `productId`='{$productId}' 
			AND `customerGroupId` = '{$groupId}'";
			$groupPrice = \Mage::getModel('Model\Product\GroupPrice');
			$groupPrice->fetchRow($query);
			$groupPrice->price = $price;
			$groupPrice->save();
			}	
		}
		if(array_key_exists('new',$groupData))
		{
			foreach ($groupData['new'] as $groupId => $price) {
			$groupPrice = \Mage::getModel('Model\Product\GroupPrice');
			$groupPrice->customerGroupId = $groupId;
			$groupPrice->productId = $productId;
			$groupPrice->price = $price;
			$groupPrice->save();
			}	
		}
		
		
		$this->indexAction();
	}
}
 ?>