<?php 
namespace Block\Admin\Dashboard;
\Mage::loadFileByClassName('Block\Core\Template');

class Dashboard extends \Block\Core\Template
{

	public function __construct()
	{
		$this->setTemplate('View/Admin/Dashboard/dashboard.php');
	}

}
 ?>
