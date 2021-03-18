<?php 
namespace Block\Admin\Attribute\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
/*	protected $tabs = [];
	protected $defaultTab = null;
	public function __construct()
	{
		$this->setTemplate('View/Admin/Attribute/edit/tabs.php');
		$this->prepareTab();

	}
*/
	public function prepareTab()
	{
		$this->addTabs('attribute',['label' => 'Attribute Information','block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
		$this->addTabs('option',['label' => 'Option','block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
		
		$this->setDefaultTab('attribute');
		return $this;
	}

/*	public function setDefaultTab($defaultTab)
	{
		$this->defaultTab = $defaultTab;

		return $this;
	}

	public function getDefaultTab()
	{
		return $this->defaultTab;
	}

	public function setTabs(array $tabs = [])
	{
		$this->tabs = $tabs;
		return $this;
	}

	public function getTabs()
	{
		return $this->tabs;
	}

	public function addTabs($key, $tab = [])
	{
		$this->tabs[$key] = $tab;
		return $this;
	}

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