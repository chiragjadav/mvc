<?php
namespace Block\Admin\Category;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Category\Edit\Tabs'));
		//$this->setTemplate('View/Admin/Category/edit.php');
	}
/*	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock('Block\Admin\Category\Edit\Tabs');
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
	public function setCategory($category = null)
	{
		if(!$category)
		{
			$category = \Mage::getModel('Model\Category');
		}

		$this->category= $category;
		return $this;
	}
	public function getCategory()
	{
		if(!$this->category)
		{
			$this->setCategory();
		}
		return $this->category;
	}
	public function getFormUrl()
	{
		return $this->getModelUrl()->getUrl('save',null);
	}*/
}
?>