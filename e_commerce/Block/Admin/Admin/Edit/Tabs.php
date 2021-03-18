<?php 
namespace Block\Admin\Admin\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{

	public function prepareTab()
	{
		$this->addTabs('admin',['label' => 'Admin Information','block' => 'Block\Admin\Admin\Edit\Tabs\Form']);
		$this->addTabs('media',['label' => 'Media','block' => 'Block\Admin\Admin\Edit\Tabs\Media']);
		
		$this->setDefaultTab('admin');
		return $this;
	}

	
}
?>