<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Product\Edit');

class Form extends \Block\Admin\Product\Edit
{
	protected $product = null;
	function __construct()
	{
		$this->setTemplate('View/Admin/product/edit/tabs/form.php');		
	}

	/*public function setProduct($product = null) 
	{
		if($product)
		{
			$this->product = $product;
		}
		$product =  \Mage::getModel('Model\Product');
		if($id = $this->getRequest()->getGet('productId')) 
		{
			$product = $product->load($id);
		}
		$this->product = $product;
		return $this;
	}
	public function getProduct() 
	{
		if(!$this->product) 
		{
			$this->setProduct();
		}
		return $this->product;
	}*/
}

?>