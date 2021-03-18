<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
	// protected $attribute = null;
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Attribute\Edit\Tabs'));
		//$this->setTemplate('View/Admin/attribute/edit.php');
	}
	/*public function getTabContent()
	{
		// echo '<pre>';
		$tabBlock = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs');
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
	public function setAttribute($attribute = null)
	{
		if(!$attribute)
		{
			$attribute = \Mage::getModel('Model\Attribute');
		}
		$this->attribute = $attribute;
		return $this;
	}
	public function getAttribute()
	{
		if(!$this->attribute)
		{
			$this->setAttribute();
		}
		return $this->attribute;
	}
	public function getFormUrl()
	{
		return $this->getModelUrl()->getUrl('save',null);
	}*/
}
?>