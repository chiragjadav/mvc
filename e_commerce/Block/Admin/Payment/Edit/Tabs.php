<?php 
namespace Block\Admin\Payment\Edit;
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
		$this->addTabs('payment',['label' => 'Payment Information','block' => 'Block\Admin\Payment\Edit\Tabs\Form']);
		//$this->addTabs('media',['label' => 'Media','block' => 'Block\Admin\Shipping\Edit\Tabs\Media']);
		$this->setDefaultTab('payment');
		return $this;
	}
}