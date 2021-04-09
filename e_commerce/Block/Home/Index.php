<?php 
namespace Block\Home;
\Mage::LoadFileByClassName('Block\Core\Layout');

class Index extends \Block\Core\Layout
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('View\Home\index.php');
	}
	/*public function prepareChildren()
	{
		\Mage::loadFileByClassName('Block\Home\Index\Banner');
		$this->addChild(new \Block\Home\Index\Banner(),'banner');
	}*/
}
 ?>