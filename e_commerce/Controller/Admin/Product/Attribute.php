<?php 
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');
class Attribute extends \Controller\Core\Admin {
	public function saveAction()
	{
		$attribute = $this->getRequest()->getPost('product');
		$productId = $this->getRequest()->getGet('productId');
		
		$product = \Mage::getModel('Model\Product')->load($productId);
		foreach ($attribute as $key => $value) {
			$product->$key = $value;
		}
		$product->save();
		//$grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
		//this->responseGrid($grid);
	}
}
?>