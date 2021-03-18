<?php
namespace Block\Admin\Cms;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	
	protected $cms = null;
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Cms\Edit\Tabs'));
		//$this->setTemplate('View/Admin/cms/edit.php');
	}
/*	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock('Block\Admin\Cms\Edit\Tabs');
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
	public function getFormUrl()
	{
		return $this->getModelUrl()->getUrl('save',null);
	}
*/}
?>