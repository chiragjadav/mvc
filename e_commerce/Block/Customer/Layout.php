<?php 
namespace Block\Customer;
\Mage::loadFileByClassName('Block\Core\Layout');
class Layout extends \Block\Core\Layout
{
	
	public 	function __construct()
	{
		parent :: __construct();
		$this->setTemplate('View\Customer\layout.php');
	}
	public function prepareChildren()
	{
		\Mage::loadFileByClassName('Block\Customer\Layout\Header');
		$this->addChild(new \Block\Customer\Layout\Header(),'header');
		
		\Mage::loadFileByClassName('Block\Customer\Layout\Message');
		$this->addChild(new \Block\Customer\Layout\Message(),'message');

		\Mage::loadFileByClassName('Block\Customer\Layout\Left');
		$this->addChild(new \Block\Customer\Layout\Left(),'left');
		
		\Mage::loadFileByClassName('Block\Customer\Layout\Content');
		$this->addChild(new \Block\Customer\Layout\Content(),'content');

		\Mage::loadFileByClassName('Block\Customer\Layout\Right');
		$this->addChild(new \Block\Customer\Layout\Right(),'right');

		\Mage::loadFileByClassName('Block\Customer\Layout\Footer');
		$this->addChild(new \Block\Customer\Layout\Footer(),'footer');
	}
}

 ?>