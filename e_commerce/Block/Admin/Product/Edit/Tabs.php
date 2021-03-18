<?php 
namespace Block\Admin\Product\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	
	public function prepareTab()
	{
		$this->addTabs('product',['label' => 'Product Information','block' => 'Block\Admin\Product\Edit\Tabs\Form']);
		$this->addTabs('media',['label' => 'Media','block' => 'Block\Admin\Product\Edit\Tabs\Media']);
		$this->addTabs('attribute',['label' => 'Attribute','block' => 'Block\Admin\Product\Edit\Tabs\Attribute']);
		$this->addTabs('groupPrice',['label' => 'Group Price','block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);
		
		$this->setDefaultTab('product');
		return $this;
	}

}
?>