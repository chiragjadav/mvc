<?php
namespace Block\Admin\Customer\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\tabs');

class Tabs extends \Block\Core\Edit\tabs
{
	/*protected $tabs = [];
	protected $defaultTab = null;
	public function __construct()
	{
		$this->setTemplate('View/Admin/Customer/edit/tabs.php');
		$this->prepareTab();
	}*/

	public function prepareTab()
	{
		$this->addTabs('customer',['label' => 'Customer Information', 'block' => 'Block\Admin\Customer\Edit\Tabs\Form']);
		$this->addTabs('address', ['label' => 'Address', 'block' => 'Block\Admin\Customer\Edit\Tabs\Address']);
		$this->setDefaultTab('customer');
	}


}
?>