<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Index extends \Controller\Core\Admin {
	public function indexAction() 
	{
		try {
			$layout = $this->getLayout();
			$block = \Mage::getBlock('Block\Admin\Dashboard\Dashboard');
			$content = $layout->getContent();
			$content->addChild($block);
			$this->renderLayout();		
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
}

?>