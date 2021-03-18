<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	
	// protected $product = null;

	public function __construct()
	{

		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Product\Edit\Tabs'));
		//$this->setTemplate('View/Admin/Product/edit.php');
	}

	/*public function getTabContent()
	{
		$tabBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
		$tabs = $tabBlock->getTabs(); 

		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());

		if(!array_key_exists($tab, $tabs))
		{
			return null;
		}

		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
		
	}
	
	public function setProduct($product = null) 
	{
		if(!$product) 
		{
			$product =  \Mage::getModel('Model\Product');
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
	}
	public function getFormUrl()
	{
		return $this->getModelUrl()->getUrl('save',null);
	}*/
}

?>