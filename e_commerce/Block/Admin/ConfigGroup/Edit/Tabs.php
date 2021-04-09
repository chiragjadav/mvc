<?php 
namespace Block\Admin\ConfigGroup\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
	

	public function prepareTab()
	{
		$this->addTabs('information',['label' => 'Config Information','block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Form']);
		$this->addTabs('configration',['label' => 'Configration','block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Configration']);
		
		$this->setDefaultTab('information');
		return $this;
	}

	
}
?>