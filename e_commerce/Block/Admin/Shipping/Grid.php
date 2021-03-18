<?php 
namespace Block\Admin\Shipping;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $shippings = [];	
	public function __construct()
	{
		$this->setTemplate('View/Admin/Shipping/grid.php');
	}
	public function setShippings($shippings = null) {
		try {
			if(!$this->shippings)
			{
				$shippings = \Mage::getModel('Model\Shipping');
				$this->shippings = $shippings->fetchAll();

			}
			return $this;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getShippings() {
		if(!$this->shippings)
		{
			$this->setShippings();
		}
		return $this->shippings;
	}
}
 ?>