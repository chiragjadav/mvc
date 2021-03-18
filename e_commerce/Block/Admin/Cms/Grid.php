<?php
namespace Block\Admin\Cms;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $cms = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/Cms/grid.php');
	}
	public function setCms($cms=null) 
	{
		try {
			if(!$this->cms)
			{
				$cms = \Mage::getModel('Model\Cms');
				$this->cms = $cms->fetchAll();	
				
			}
			return $this;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getCms() 
	{
		if(!$this->cms)
		{
			$this->setCms();
		}
		return $this->cms;
	}

}
?>