<?php
namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $admins = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/Admin/grid.php');
	}
	public function setAdmins($admins=null) 
	{
		try {
			if(!$this->admins)
			{
				$admins = \Mage::getModel('Model\Admin');
				$this->admins = $admins->fetchAll();	
			
			}
			return $this;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getAdmins() 
	{
		if(!$this->admins)
		{
			$this->setAdmins();
		}
		return $this->admins;
	}

}
?>