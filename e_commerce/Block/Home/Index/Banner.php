<?php
namespace Block\Home\Index;
\Mage::loadFileByClassName('Block\Core\Template');
class Banner extends \Block\Core\Template
{
	
	public function __construct()
	{
		$this->setTemplate('View/Home/index/banner.php');
	}
}

?>