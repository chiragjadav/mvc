<?php 
namespace Controller;
\Mage::loadFileByClassName('Controller\Core\Customer');
class Home extends Core\Customer
{
	public function indexAction()
	{
		$layout = $this->getLayout();
		$grid = \Mage::getBlock('Block\Home\Index');
		$layout->getContent()->addChild($grid);
		$this->renderLayout();
	}
	
	public function pageAction()
	{
		$pager = \Mage::getController('Controller\Core\Pager');
		echo '<pre>';

		$product = \Mage::getModel('Model\Product');
		$query = "SELECT * FROM `product`";
		$productCount = $product->getAdapter()->fetchOne($query);

		$pager->setTotalRecords(80);
		$pager->setRecordPerPage(10);
		$pager->setCurrentPage($_GET['p']);
		$pager->calculate();
		print_r($pager);
	}
}


 ?>