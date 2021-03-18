<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\Core\Template');

class Layout extends Template
{
	public function __construct(\Controller\Core\Admin $controller = Null)
	{
		$this->setController($controller);
		$this->setTemplate('View/core/layout/oneColumn.php');
		$this->prepareChildren();
	}
	public function prepareChildren()
	{
		\Mage::loadFileByClassName('Block\Core\Layout\Header');
		$this->addChild(new \Block\Core\Layout\Header(),'header');
		
		\Mage::loadFileByClassName('Block\Core\Layout\Message');
		$this->addChild(new \Block\Core\Layout\Message(),'message');

		\Mage::loadFileByClassName('Block\Core\Layout\Left');
		$this->addChild(new \Block\Core\Layout\Left(),'left');
		
		\Mage::loadFileByClassName('Block\Core\Layout\Content');
		$this->addChild(new \Block\Core\Layout\Content(),'content');

		\Mage::loadFileByClassName('Block\Core\Layout\Right');
		$this->addChild(new \Block\Core\Layout\Right(),'right');

		\Mage::loadFileByClassName('Block\Core\Layout\Footer');
		$this->addChild(new \Block\Core\Layout\Footer(),'footer');
	}

	public function getContent()
	{
		return $this->getChild('content');
	}
	public function getLeft()
	{
		return $this->getChild('left');
	}
	public function getRight()
	{
		return $this->getChild('right');
	}
	public function getHeader()
	{
		return $this->getChild('header');
	}
}
?>