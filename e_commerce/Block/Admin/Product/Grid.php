<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{

	protected $products = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/Product/grid.php');
	}
/*	public function getTabContent()
	{
		// echo '<pre>';
		$tabBlock = Mage::getBlock('Block_Admin_Product_Form_Tabs');
		$tabs = $tabBlock->getTabs(); 

		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());

		if(!array_key_exists($tab, $tabs))
		{
			return null;
		}

		$blockClassName = $tabs[$tab]['block'];
		$block = Mage::getBlock($blockClassName);
		 $block->toHtml();
		
	}*/
	public function setProducts($products = null)
	{
		if(!$this->products) 
		{
			$product = \Mage::getModel('Model\Product');
			$this->products = $product->fetchAll();
			
		}	
		return $this;
	}
	public function getProducts() 
	{
		if(!$this->products) 
		{
			$this->setProducts();
		}
		return $this->products;
	}
}

?>