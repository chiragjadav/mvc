<?php
namespace Block\Admin\Attribute\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Attribute\Edit');

class Option extends \Block\Admin\Attribute\Edit
{
	protected $option = null;
	public function __construct()
	{
		$this->setTemplate('View/Admin/Attribute/edit/tabs/option.php');
	}
/*	public function setAttribute(\Model\Attribute $option) 
	{
		try {
			$this->option = $option;
			return $this;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}*/
	public function setOption($option = null)
	{
		if(!$option)
		{
			$attributeId = $this->getRequest()->getGet('attributeId');
			$option = \Mage::getModel('Model\Attribute')->load($attributeId);
		}
		$this->option = $option;
		return $this;
	}
	public function getOption() 
	{
		if(!$this->option)
		{
			$this->setOption();
		}
		return $this->option;
	}

}
?>