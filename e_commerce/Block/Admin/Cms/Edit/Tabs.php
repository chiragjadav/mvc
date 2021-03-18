<?php 
namespace Block\Admin\Cms\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
/*	protected $tabs = [];
	protected $defaultTab = null;
	public function __construct()
	{
		$this->setTemplate('View/Admin/Cms/edit/tabs.php');
		$this->prepareTab();

	}
*/
	public function prepareTab()
	{
		$this->addTabs('cms',['label' => 'Cms Information','block' => 'Block\Admin\Cms\Edit\Tabs\Form']);
		
		$this->setDefaultTab('cms');
		return $this;
	}


}
?>