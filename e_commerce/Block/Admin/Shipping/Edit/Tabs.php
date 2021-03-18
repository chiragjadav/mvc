<?php 
namespace Block\Admin\Shipping\Edit;
// \Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{/*
	
	protected $defaultTab = null;
	public function __construct()
	{
		$this->setTemplate('View/Admin/Shipping/edit/tabs.php');
		$this->prepareTab();

	}*/

	public function prepareTab()
	{
		$this->addTabs('shipping',['label' => 'Shipping Information','block' => 'Block\Admin\Shipping\Edit\Tabs\Form']);
		//$this->addTabs('media',['label' => 'Media','block' => 'Block\Admin\Shipping\Edit\Tabs\Media']);
		$this->setDefaultTab('shipping');
		return $this;
	}

	
/*
	public function getTab($key)
	{
		if(!array_key_exists($key, $this->tabs))
		{
			return null;
		}
		return $this->tabs[$key];
	}*/
}
?>